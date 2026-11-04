// Photo feature detail page (photo.html)
// Reads the photos straight from the article markup, so the CMS only outputs
// <figure class="co-pf-shot"><img><figcaption?></figure> — everything else is built here.
document.addEventListener("DOMContentLoaded", () => {
  const main = document.getElementById("pfMain");
  if (!main) return;

  const $ = (id) => document.getElementById(id);
  const toNe = (n) => String(n).replace(/\d/g, (d) => "०१२३४५६७८९"[d]);
  const pad = (n) => toNe(String(n).padStart(2, "0"));

  const shots = [...main.querySelectorAll(".co-pf-shot")];
  const photos = shots.map((fig) => {
    const img = fig.querySelector("img");
    const cap = fig.querySelector("figcaption");
    return { fig, src: img.getAttribute("src"), alt: img.alt, cap: cap ? cap.innerHTML.trim() : "" };
  });
  const total = photos.length;

  document.querySelectorAll("[data-pf-total]").forEach((el) => {
    el.textContent = el.closest(".co-pf-rail") ? pad(total) : toNe(total);
  });

  // ---------- each photo: clickable frame, number chip, blurred fill for tall/square images ----------
  photos.forEach((p, i) => {
    const img = p.fig.querySelector("img");
    const frame = document.createElement("button");
    frame.type = "button";
    frame.className = "co-pf-frame";
    frame.dataset.pfOpen = i;
    frame.setAttribute("aria-label", `तस्बिर ${toNe(i + 1)} ठूलो गरी हेर्नुहोस्`);
    frame.style.setProperty("--pf-src", `url("${img.src}")`); // absolute, so it does not resolve against the stylesheet
    img.replaceWith(frame);
    frame.append(img);
    frame.insertAdjacentHTML(
      "beforeend",
      `<span class="co-pf-no">${pad(i + 1)}<small>/${pad(total)}</small></span>` +
        `<span class="co-pf-zoom" aria-hidden="true"><i class="bi bi-arrows-angle-expand"></i></span>`
    );
    p.fig.id = `photo-${i + 1}`;
    p.fig.classList.toggle("has-cap", !!p.cap);
  });

  const thumb = (p, i, cls, extra = "") =>
    `<button type="button" class="${cls}" data-pf-open="${i}" aria-label="तस्बिर ${toNe(i + 1)}"><img src="${p.src}" alt="" loading="lazy">${extra}</button>`;

  // ---------- head mosaic: first five photos ----------
  const mosaic = $("pfMosaic");
  if (mosaic) {
    if (total < 3) mosaic.hidden = true;
    else {
      const shown = photos.slice(0, 5);
      mosaic.dataset.n = shown.length;
      mosaic.innerHTML = shown
        .map((p, i) => {
          const last = i === shown.length - 1;
          const more = last ? `<span class="co-pf-mosaic-more"><i class="bi bi-grid-3x3-gap"></i> सबै ${toNe(total)} तस्बिर</span>` : "";
          return thumb(p, i, `co-pf-tile${i === 0 ? " is-lead" : ""}`, more);
        })
        .join("");
    }
  }

  // ---------- end-of-story contact sheet ----------
  const sheet = $("pfSheet");
  if (sheet) sheet.innerHTML = photos.map((p, i) => thumb(p, i, "co-pf-sheet-item", `<span>${pad(i + 1)}</span>`)).join("");

  // ---------- desktop rail: thumbnails that follow the reader ----------
  const rail = $("pfRail");
  const now = $("pfNow");
  let railItems = [];
  if (rail) {
    rail.innerHTML = photos
      .map((p, i) => `<li><a href="#photo-${i + 1}" aria-label="तस्बिर ${toNe(i + 1)}"><img src="${p.src}" alt="" loading="lazy"></a></li>`)
      .join("");
    railItems = [...rail.querySelectorAll("a")];
    railItems.forEach((a, i) => {
      a.addEventListener("click", (e) => {
        e.preventDefault();
        photos[i].fig.scrollIntoView({ behavior: "smooth", block: "center" });
      });
    });
  }

  let active = -1;
  const onScroll = () => {
    const mid = window.innerHeight / 2;
    let best = 0;
    let dist = Infinity;
    photos.forEach((p, i) => {
      const r = p.fig.getBoundingClientRect();
      const d = Math.abs(r.top + r.height / 2 - mid);
      if (d < dist) { dist = d; best = i; }
    });
    if (best === active) return;
    active = best;
    if (now) now.textContent = pad(best + 1);
    railItems.forEach((a, i) => {
      a.classList.toggle("is-on", i === best);
      a.classList.toggle("is-seen", i < best);
    });
    if (rail) rail.style.setProperty("--pf-progress", total > 1 ? best / (total - 1) : 1);
  };
  let ticking = false;
  window.addEventListener("scroll", () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(() => { onScroll(); ticking = false; });
  }, { passive: true });
  onScroll();

  // ---------- lightbox ----------
  const lb = $("pfLb");
  if (!lb) return;
  const lbImg = $("pfLbImg");
  const lbBg = $("pfLbBg");
  const lbCap = $("pfLbCap");
  const lbCount = $("pfLbCount");
  const strip = $("pfLbStrip");
  let cur = 0;

  strip.innerHTML = photos.map((p, i) => thumb(p, i, "co-pf-lb-thumb")).join("");
  const stripItems = [...strip.children];

  function show(i) {
    cur = (i + total) % total;
    const p = photos[cur];
    lbImg.classList.remove("is-in");
    void lbImg.offsetWidth; // restart the fade
    lbImg.src = p.src;
    lbImg.alt = p.alt;
    lbImg.classList.add("is-in");
    lbBg.src = p.src;
    lbCap.innerHTML = p.cap;
    lbCap.hidden = !p.cap;
    lbCount.innerHTML = `${pad(cur + 1)}<small> / ${pad(total)}</small>`;
    stripItems.forEach((b, j) => b.classList.toggle("is-on", j === cur));
    stripItems[cur].scrollIntoView({ block: "nearest", inline: "center" });
  }

  function open(i) {
    show(i);
    if (!lb.open) lb.showModal();
    document.documentElement.classList.add("co-pf-locked");
  }

  lb.addEventListener("close", () => {
    document.documentElement.classList.remove("co-pf-locked");
    photos[cur].fig.scrollIntoView({ block: "center" });
  });

  document.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-pf-open]");
    if (btn) open(Number(btn.dataset.pfOpen));
  });
  $("pfLbClose").addEventListener("click", () => lb.close());
  $("pfLbPrev").addEventListener("click", () => show(cur - 1));
  $("pfLbNext").addEventListener("click", () => show(cur + 1));

  lb.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") show(cur - 1);
    if (e.key === "ArrowRight") show(cur + 1);
  });

  // swipe left / right on the photo
  const stage = $("pfLbStage");
  let x0 = null;
  stage.addEventListener("pointerdown", (e) => { x0 = e.clientX; });
  stage.addEventListener("pointerup", (e) => {
    if (x0 === null) return;
    const dx = e.clientX - x0;
    x0 = null;
    if (Math.abs(dx) > 50) show(cur + (dx < 0 ? 1 : -1));
  });
});
