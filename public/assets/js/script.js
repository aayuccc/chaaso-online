document.addEventListener("DOMContentLoaded", () => {
  // Light / dark theme toggle (initial theme is set inline in <head> to avoid a flash)
  const root = document.documentElement;
  const themeBtns = document.querySelectorAll("[data-theme-toggle]");
  const syncThemeBtns = () => {
    const dark = root.getAttribute("data-theme") === "dark";
    themeBtns.forEach((btn) => {
      btn.setAttribute("aria-checked", dark);
    });
  };
  themeBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const next = root.getAttribute("data-theme") === "dark" ? "light" : "dark";
      root.setAttribute("data-theme", next);
      try { localStorage.setItem("co-theme", next); } catch (e) {}
      syncThemeBtns();
    });
  });
  syncThemeBtns();

  // Search overlay (nav + mobile buttons, "/" shortcut)
  const searchBox = document.getElementById("coSearch");
  if (searchBox) {
    const input = searchBox.querySelector(".co-so-input");
    let opener = null;
    const setSearch = (open) => {
      if (open === !searchBox.hidden) return;
      searchBox.hidden = !open;
      document.body.classList.toggle("co-so-open", open);
      if (open) { opener = document.activeElement; input.focus(); }
      else if (opener) opener.focus();
    };
    document.querySelectorAll("[data-search-open]").forEach((btn) => btn.addEventListener("click", () => setSearch(true)));
    searchBox.querySelectorAll("[data-search-close]").forEach((el) => el.addEventListener("click", () => setSearch(false)));
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setSearch(false);
      const typing = /input|textarea|select/i.test(e.target.tagName) || e.target.isContentEditable;
      if (e.key === "/" && !typing && searchBox.hidden) { e.preventDefault(); setSearch(true); }
    });
  }

  // Stacking highlights: each headline pins, its image fades as it slides under, the next headline covers it
  const stack = document.getElementById("coLeadStack");
  if (stack) {
    const items = [...stack.children];
    const heads = items.filter((el) => el.classList.contains("co-lead"));
    const desktop = window.matchMedia("(min-width: 992px)");
    const still = window.matchMedia("(prefers-reduced-motion: reduce)");
    const nav = document.getElementById("coNavbar");
    const clamp = (v) => Math.min(Math.max(v, 0), 1);
    // headline k sits above its own image but below every later headline
    let k = 0;
    items.forEach((el) => {
      if (el.classList.contains("co-lead")) { k += 1; el.style.zIndex = 2 * k; }
      else el.style.zIndex = 2 * k - 1;
    });
    const measure = () => {
      stack.style.setProperty("--co-stack-top", `${nav ? nav.offsetHeight : 0}px`);
      stack.style.removeProperty("--co-pin-h");
      // every later headline is at least as tall as the tallest, so it fully covers the one before
      stack.style.setProperty("--co-pin-h", `${Math.max(...heads.map((h) => h.offsetHeight))}px`);
    };
    const onStack = () => {
      const off = !desktop.matches || still.matches;
      heads.forEach((head, i) => {
        const media = head.nextElementSibling && head.nextElementSibling.classList.contains("co-lead-media") ? head.nextElementSibling : null;
        const next = heads[i + 1];
        if (off) {
          head.style.transform = head.style.opacity = "";
          if (media) media.style.opacity = "";
          return;
        }
        const bottom = head.getBoundingClientRect().bottom;
        if (media) {
          const m = media.getBoundingClientRect();
          media.style.opacity = 1 - clamp((bottom - m.top) / m.height);
        }
        if (next) {
          const p = clamp((bottom - next.getBoundingClientRect().top) / head.offsetHeight);
          head.style.transform = `scale(${1 - p * 0.05})`;
          head.style.opacity = 1 - p * 0.6;
        }
      });
    };
    measure();
    onStack();
    window.addEventListener("resize", () => { measure(); onStack(); });
    window.addEventListener("scroll", onStack, { passive: true });
    window.addEventListener("load", () => { measure(); onStack(); });
    if (document.fonts) document.fonts.ready.then(() => { measure(); onStack(); });
  }

  // Article page: text size (A- / A+), remembered per browser
  const artBody = document.getElementById("coArtBody");
  if (artBody) {
    const sizes = [16, 17, 19, 21, 23];
    let idx = 2;
    try { const saved = Number(localStorage.getItem("co-art-size")); if (sizes.includes(saved)) idx = sizes.indexOf(saved); } catch (e) {}
    const resets = document.querySelectorAll("[data-font-reset]");
    const apply = () => {
      if (window.innerWidth > 575 || idx !== 2) artBody.style.setProperty("--co-art-size", `${sizes[idx]}px`);
      else artBody.style.removeProperty("--co-art-size");
      resets.forEach((btn) => { btn.disabled = idx === 2; });
    };
    apply();
    document.querySelectorAll("[data-font]").forEach((btn) => {
      btn.addEventListener("click", () => {
        idx = Math.min(Math.max(idx + Number(btn.dataset.font), 0), sizes.length - 1);
        apply();
        try { localStorage.setItem("co-art-size", sizes[idx]); } catch (e) {}
      });
    });
    resets.forEach((btn) => {
      btn.addEventListener("click", () => {
        idx = 2;
        apply();
        try { localStorage.removeItem("co-art-size"); } catch (e) {}
      });
    });
  }

  // Article page: floating reading bar (under the sticky nav) with progress ring
  const readbar = document.getElementById("coReadbar");
  const cover = document.querySelector(".co-cover-panel");
  const body = document.getElementById("coArtBody");
  if (readbar && cover && body) {
    const ring = document.getElementById("coRing");
    const nav = document.getElementById("coNavbar");
    const onRead = () => {
      // sit just below the sticky menu bar (hidden on mobile, so 0 there)
      const navH = nav && nav.offsetParent !== null ? nav.getBoundingClientRect().bottom : 0;
      readbar.style.setProperty("--co-readbar-top", `${Math.max(navH, 0)}px`);
      const on = cover.getBoundingClientRect().bottom < navH && body.getBoundingClientRect().bottom > 120;
      readbar.classList.toggle("is-on", on);
      readbar.setAttribute("aria-hidden", !on);
      readbar.querySelectorAll("a, button").forEach((el) => { el.tabIndex = on ? 0 : -1; });
      const r = body.getBoundingClientRect();
      const p = Math.min(Math.max((window.innerHeight * 0.5 - r.top) / r.height, 0), 1);
      if (ring) ring.style.strokeDashoffset = 97.4 * (1 - p);
    };
    onRead();
    window.addEventListener("scroll", onRead, { passive: true });
    window.addEventListener("resize", onRead);
  }

  // Article page: copy link
  document.querySelectorAll("[data-copy-link]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const done = () => {
        btn.classList.add("is-copied");
        setTimeout(() => btn.classList.remove("is-copied"), 1600);
      };
      if (navigator.clipboard) navigator.clipboard.writeText(location.href).then(done, done);
      else done();
    });
  });

  // Breaking ticker: duplicate the group so the loop is seamless
  const track = document.querySelector(".co-ticker-track");
  if (track) {
    const clone = track.querySelector(".co-ticker-group").cloneNode(true);
    // Visual duplicate only: hide from assistive tech and keep its links out of the tab order
    clone.setAttribute("aria-hidden", "true");
    // Swap links for plain spans so the hidden copy has nothing focusable
    clone.querySelectorAll("a").forEach((a) => {
      const span = document.createElement("span");
      span.className = a.className;
      span.innerHTML = a.innerHTML;
      a.replaceWith(span);
    });
    track.appendChild(clone);
  }

  // Sticky nav state + back-to-top button
  const navbar = document.getElementById("coNavbar");
  const toTop = document.getElementById("coToTop");
  const onScroll = () => {
    const y = window.scrollY;
    if (navbar) {
      const stuck = navbar.getBoundingClientRect().top <= 0 && y > 0;
      navbar.classList.toggle("is-stuck", stuck);
      const navLogo = navbar.querySelector(".co-nav-logo");
      if (navLogo) navLogo.tabIndex = stuck ? 0 : -1;
    }
    if (toTop) toTop.classList.toggle("is-visible", y > 600);
  };
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();
  if (toTop) toTop.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));

  // Nav dropdown (click/tap toggle; desktop also opens on hover via CSS)
  const closeDropdowns = (except) => {
    document.querySelectorAll(".co-nav-dropdown.is-open").forEach((dd) => {
      if (dd === except) return;
      dd.classList.remove("is-open");
      dd.querySelector(".co-nav-dropdown-toggle").setAttribute("aria-expanded", "false");
    });
  };
  document.querySelectorAll(".co-nav-dropdown").forEach((dd) => {
    const toggle = dd.querySelector(".co-nav-dropdown-toggle");
    toggle.addEventListener("click", (e) => {
      e.stopPropagation();
      const open = dd.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", open);
    });
  });
  document.addEventListener("click", (e) => {
    document.querySelectorAll(".co-nav-dropdown.is-open").forEach((dd) => {
      if (!dd.contains(e.target)) closeDropdowns();
    });
  });
  document.addEventListener("keydown", (e) => { if (e.key === "Escape") closeDropdowns(); });

  // Nav active state (demo for placeholder "#" links; real links navigate normally)
  document.querySelectorAll('a.co-nav-link[href="#"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      document.querySelectorAll(".co-nav-link").forEach((l) => l.classList.remove("is-active"));
      link.classList.add("is-active");
    });
  });

  // Offcanvas menu active state (same: only placeholder links)
  document.querySelectorAll('a.co-oc-link[href="#"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      document.querySelectorAll(".co-oc-link").forEach((l) => l.classList.remove("is-active"));
      link.classList.add("is-active");
    });
  });

  // Mobile sticky bottom ad
  const stickyAd = document.getElementById("coStickyAd");
  if (stickyAd) {
    document.body.classList.add("has-sticky-ad");
    stickyAd.querySelector(".co-ad-close").addEventListener("click", () => {
      stickyAd.remove();
      document.body.classList.remove("has-sticky-ad");
    });
  }

  // Footer newsletter
  const newsForm = document.querySelector(".co-fnews-form");
  if (newsForm) {
    const field = newsForm.querySelector(".co-fnews-field");
    const input = newsForm.querySelector(".co-fnews-input");
    const msg = newsForm.querySelector(".co-fnews-msg");
    newsForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value.trim());
      field.classList.toggle("is-invalid", !ok);
      msg.classList.toggle("is-error", !ok);
      msg.textContent = ok ? "धन्यवाद! तपाईंको इमेल सब्स्क्राइब भयो।" : "कृपया सही इमेल ठेगाना लेख्नुहोस्।";
      if (ok) newsForm.reset();
    });
  }

  // Province tabs (demo: rotates the stories; wire to real data per province)
  const province = document.getElementById("coProvince");
  const tabs = document.querySelectorAll(".co-tab");
  if (province && tabs.length) {
    const more = document.getElementById("coProvinceMore");
    const labels = document.querySelectorAll(".co-province-label");
    const list = province.querySelector(".co-mini-list");
    const pill = document.querySelector(".co-tabs-pill");
    const movePill = () => {
      const active = document.querySelector(".co-tab.is-active");
      if (!pill || !active) return;
      pill.style.width = `${active.offsetWidth}px`;
      pill.style.transform = `translateX(${active.offsetLeft}px)`;
    };
    movePill();
    window.addEventListener("resize", movePill);
    if (document.fonts) document.fonts.ready.then(movePill);
    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        if (tab.classList.contains("is-active")) return;
        tabs.forEach((t) => { t.classList.remove("is-active"); t.setAttribute("aria-selected", "false"); });
        tab.classList.add("is-active");
        tab.setAttribute("aria-selected", "true");
        movePill();
        tab.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });
        province.classList.add("is-switching");
        if (more) more.classList.add("is-switching");
        setTimeout(() => {
          labels.forEach((l) => { l.textContent = tab.textContent; });
          list.appendChild(list.firstElementChild);
          if (more) more.appendChild(more.firstElementChild);
          province.classList.remove("is-switching");
          if (more) more.classList.remove("is-switching");
        }, 250);
      });
    });
  }

  // Video playlist
  const player = document.getElementById("coVideoPlayer");
  if (player) {
    const thumb = player.querySelector(".co-video-thumb");
    const title = player.querySelector(".co-video-title");
    const playBtn = player.querySelector(".co-video-play");
    const items = document.querySelectorAll(".co-playlist-item");
    let current = document.querySelector(".co-playlist-item.is-active");

    const reset = () => {
      const frame = player.querySelector("iframe");
      if (frame) frame.remove();
      player.classList.remove("is-playing");
    };

    items.forEach((item) => {
      item.addEventListener("click", () => {
        items.forEach((i) => i.classList.remove("is-active"));
        item.classList.add("is-active");
        current = item;
        reset();
        thumb.style.opacity = 0;
        setTimeout(() => {
          thumb.src = item.dataset.thumb;
          title.textContent = item.querySelector(".co-playlist-title").textContent;
          thumb.style.opacity = 1;
        }, 200);
        if (window.innerWidth < 992) player.scrollIntoView({ behavior: "smooth", block: "center" });
      });
    });

    // ---------- popup player ----------
    const modal = document.getElementById("coVideoModal");
    if (modal && typeof modal.showModal === "function") {
      const vmFrame = document.getElementById("coVmFrame");
      const vmTitle = document.getElementById("coVmTitle");
      const vmDate = document.getElementById("coVmDate");
      const vmList = document.getElementById("coVmList");
      const vmYt = document.getElementById("coVmYt");
      const vmCopy = document.getElementById("coVmCopy");
      const toNe = (n) => String(n).replace(/\d/g, (d) => "०१२३४५६७८९"[d]);
      const videos = [...items].map((item) => ({
        id: item.dataset.youtube || "",
        thumb: item.dataset.thumb,
        date: item.dataset.date || "",
        title: item.querySelector(".co-playlist-title").textContent.replace(/\s+/g, " ").trim(),
      }));
      let playing = 0;

      document.getElementById("coVmCount").textContent = toNe(videos.length) + " भिडियो";
      vmList.innerHTML = videos.map((v, i) => `
        <button type="button" class="co-vm-item" data-index="${i}">
          <span class="co-vm-thumb"><img src="${v.thumb}" alt="" loading="lazy"><i class="bi bi-play-fill"></i>
            <span class="co-vm-now"><span class="co-vm-eq"><i></i><i></i><i></i></span> हेर्दै</span></span>
          <span class="co-vm-item-text"><strong>${v.title}</strong><small>${v.date}</small></span>
        </button>`).join("");
      const listItems = vmList.querySelectorAll(".co-vm-item");

      const play = (index) => {
        playing = index;
        const v = videos[index];
        vmTitle.textContent = v.title;
        vmDate.textContent = v.date;
        vmYt.href = v.id ? "https://www.youtube.com/watch?v=" + encodeURIComponent(v.id) : "#";
        vmYt.hidden = !v.id;
        if (v.id) {
          vmFrame.innerHTML = `<iframe src="https://www.youtube-nocookie.com/embed/${encodeURIComponent(v.id)}?autoplay=1&rel=0&modestbranding=1" title="${v.title.replace(/"/g, "&quot;")}" allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe>`;
        } else {
          // no video id yet: show the thumbnail with a note instead of a broken player
          vmFrame.innerHTML = `<img src="${v.thumb}" alt=""><span class="co-vm-soon"><i class="bi bi-camera-video-off"></i> भिडियो छिट्टै उपलब्ध हुनेछ</span>`;
        }
        listItems.forEach((el, i) => {
          el.classList.toggle("is-active", i === index);
          el.setAttribute("aria-current", i === index ? "true" : "false");
        });
        const active = listItems[index];
        if (active) active.scrollIntoView({ block: "nearest", behavior: "smooth" });
      };

      const open = () => {
        const index = Math.max([...items].indexOf(current), 0);
        modal.showModal();
        document.documentElement.classList.add("co-vm-lock");
        play(index);
      };

      const close = () => modal.close();

      modal.addEventListener("close", () => {
        vmFrame.innerHTML = ""; // stops playback
        document.documentElement.classList.remove("co-vm-lock");
        // keep the homepage player in sync with what was last watched
        if (items[playing] && items[playing] !== current) items[playing].click();
      });

      playBtn.addEventListener("click", open);
      player.addEventListener("click", (e) => {
        if (e.target.closest(".co-video-play")) return;
        open();
      });
      listItems.forEach((el) => el.addEventListener("click", () => play(Number(el.dataset.index))));
      modal.querySelectorAll("[data-vm-close]").forEach((b) => b.addEventListener("click", close));
      // click on the dark backdrop closes
      modal.addEventListener("click", (e) => {
        if (e.target === modal) close();
      });

      vmCopy.addEventListener("click", () => {
        const v = videos[playing];
        const url = v.id ? "https://www.youtube.com/watch?v=" + v.id : location.href;
        const done = () => {
          vmCopy.classList.add("is-done");
          setTimeout(() => vmCopy.classList.remove("is-done"), 1600);
        };
        if (navigator.clipboard) navigator.clipboard.writeText(url).then(done, done);
        else done();
      });
    }
  }

  // Photo feature carousel
  const carousel = document.getElementById("coPhotoCarousel");
  if (carousel) {
    // opening a story: remember where we were so closing it lands back here
    carousel.querySelectorAll(".co-photo-card").forEach((card) => {
      card.addEventListener("click", () => {
        try {
          sessionStorage.setItem("co-story-from", "home");
          sessionStorage.setItem("co-story-scroll", String(carousel.scrollLeft));
        } catch (e) { }
      });
    });
    const restoreCarousel = () => {
      let x = null;
      try {
        x = sessionStorage.getItem("co-story-scroll");
        sessionStorage.removeItem("co-story-scroll");
        sessionStorage.removeItem("co-story-from");
      } catch (e) { }
      if (x !== null) carousel.scrollTo({ left: Number(x), behavior: "instant" });
    };
    restoreCarousel();
    window.addEventListener("pageshow", (e) => { if (e.persisted) restoreCarousel(); });

    document.querySelectorAll(".co-carousel-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const card = carousel.querySelector(".co-photo-card");
        const step = card ? card.getBoundingClientRect().width + 24 : carousel.clientWidth;
        const dir = Number(btn.dataset.dir);
        const atEnd = carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 4;
        if (dir > 0 && atEnd) carousel.scrollTo({ left: 0 });
        else carousel.scrollBy({ left: dir * step });
      });
    });
  }

  // Team page: filter members by desk
  const teamGrid = document.getElementById("coTeamGrid");
  if (teamGrid) {
    const filterBtns = document.querySelectorAll(".co-tm-filter button");
    const empty = document.getElementById("coTeamEmpty");
    filterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        const desk = btn.dataset.desk;
        filterBtns.forEach((b) => {
          b.classList.toggle("is-active", b === btn);
          b.setAttribute("aria-pressed", b === btn ? "true" : "false");
        });
        let shown = 0;
        teamGrid.querySelectorAll(".co-tm-card").forEach((card) => {
          const match = desk === "all" || card.dataset.desk.split(" ").includes(desk);
          card.hidden = !match;
          if (match) shown++;
        });
        if (empty) empty.hidden = shown > 0;
      });
    });
  }

  // Contact page: copy email
  document.querySelectorAll("[data-copy-text]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const done = () => {
        btn.classList.add("is-done");
        setTimeout(() => btn.classList.remove("is-done"), 1600);
      };
      if (navigator.clipboard) navigator.clipboard.writeText(btn.dataset.copyText).then(done, done);
      else done();
    });
  });

  // Contact page: form validation (front-end only, no backend yet)
  const contactForm = document.getElementById("coContactForm");
  if (contactForm) {
    const msg = contactForm.querySelector("#ctMsg");
    const count = document.getElementById("ctCount");
    const doneBox = document.getElementById("coContactDone");
    const check = (el) => {
      const wrap = el.closest(".co-ct-field, .co-ct-check");
      const ok = el.type === "checkbox" ? el.checked : el.value.trim() !== "" && el.checkValidity();
      if (wrap) wrap.classList.toggle("is-invalid", !ok);
      return ok;
    };
    const required = contactForm.querySelectorAll("[required]");
    if (msg && count) {
      const update = () => { count.textContent = msg.value.length + " / " + msg.maxLength; };
      msg.addEventListener("input", update);
      update();
    }
    required.forEach((el) => {
      el.addEventListener(el.type === "checkbox" ? "change" : "blur", () => check(el));
      el.addEventListener("input", () => {
        if (el.closest(".is-invalid")) check(el);
      });
    });
    contactForm.addEventListener("submit", (e) => {
      e.preventDefault();
      let first = null;
      required.forEach((el) => {
        if (!check(el) && !first) first = el;
      });
      if (first) {
        first.focus();
        return;
      }
      contactForm.reset();
      if (msg && count) count.textContent = "0 / " + msg.maxLength;
      if (doneBox) {
        doneBox.hidden = false;
        doneBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
        setTimeout(() => { doneBox.hidden = true; }, 6000);
      }
    });
  }

  // 404 page: back button (falls back to the homepage when there is no history)
  document.querySelectorAll("[data-go-back]").forEach((btn) => {
    btn.addEventListener("click", () => {
      if (history.length > 1) history.back();
      else location.href = "index.html";
    });
  });
});
