// Photo feature story player (story.html?s=<index>)
document.addEventListener("DOMContentLoaded", () => {
  const IMG = "assets/images/np/";
  const DURATION = 6000; // ms per photo
  const HOLD = 220; // press longer than this = pause instead of tap

  // Same order as the homepage "फोटो फिचर" carousel
  const STORIES = [
    {
      title: "कुलेखानी ड्यामसाईड होटल: प्राकृतिक सौन्दर्य र पर्यटकको आकर्षणको केन्द्र",
      place: "कुलेखानी, मकवानपुर",
      date: "असोज २४, २०८३",
      slides: [
        { img: "hotel1.jpg", cap: "जलाशयको किनारमा बनेको काठको होटल, जहाँबाट कोठाबाटै ताल देखिन्छ।" },
        { img: "hotel3.jpg", cap: "साँझ परेपछि पोखरी र आँगन झिलिमिली बत्तीले सजिन्छन्।" },
        { img: "hotel2.jpg", cap: "खुला पोखरीसहितको रेस्टुरेन्ट सप्ताहन्तमा भरिभराउ हुन्छ।" },
        { img: "mtn.jpg", cap: "मौसम सफा भएका दिन होटलबाटै हिमशृङ्खला देख्न सकिन्छ।" },
        { img: "ktm.jpg", cap: "सूर्यास्तसँगै रातो हुने हिमाल हेर्न पर्यटक छतमा जम्मा हुन्छन्।" },
      ],
    },
    {
      title: "आन्तरिक तथा बाह्य पर्यटकको रोजाई बन्दै - कुलेखानी ड्यामसाईड होटल",
      place: "कुलेखानी, मकवानपुर",
      date: "असोज २२, २०८३",
      slides: [
        { img: "hotel2.jpg", cap: "काठमाडौंबाट करिब तीन घण्टाको दूरीमा रहेको होटल अहिले सप्ताहन्तको गन्तव्य बनेको छ।" },
        { img: "hotel3.jpg", cap: "यस वर्ष विदेशी पाहुनाको संख्या अघिल्लो वर्षभन्दा दोब्बर पुगेको सञ्चालक बताउँछन्।" },
        { img: "hotel1.jpg", cap: "स्थानीय परिकार र अर्गानिक तरकारी होटलको मुख्य आकर्षण हो।" },
        { img: "mtn.jpg", cap: "छोटो पदयात्रा र डुंगा सयरका प्याकेज पनि उपलब्ध छन्।" },
      ],
    },
    {
      title: "मुस्ताङ, म्याग्दी, बागलुङ र पर्वतमा पर्यटकको भीड",
      place: "मुस्ताङ",
      date: "असोज २०, २०८३",
      slides: [
        { img: "nepal1.jpg", cap: "दशैंअघि नै मुस्ताङ जाने सडकमा पर्यटकको चाप बढेको छ।" },
        { img: "trek.jpg", cap: "अन्नपूर्ण सर्किटका पदमार्गमा विदेशी पदयात्रीको लर्को।" },
        { img: "mtn.jpg", cap: "सफा आकाशसँगै हिमालको दृश्यले पर्यटक लोभिएका छन्।" },
        { img: "nepal3.jpg", cap: "गुम्बाका प्रार्थना चक्र घुमाउँदै आन्तरिक पर्यटक।" },
        { img: "ktm.jpg", cap: "होटल व्यवसायीका अनुसार कात्तिक मसान्तसम्मका कोठा बुक भइसकेका छन्।" },
      ],
    },
    {
      title: "पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै, रोयल भिल्ला रिर्सोट",
      place: "सौराहा, चितवन",
      date: "असोज १८, २०८३",
      slides: [
        { img: "hotelnight.jpg", cap: "खजुरका रूखले घेरिएको रिसोर्टको पोखरी साँझमा झनै सुन्दर देखिन्छ।" },
        { img: "hotel3.jpg", cap: "परिवारसँग आउनेका लागि बालबालिकाको छुट्टै खेल क्षेत्र।" },
        { img: "hotel2.jpg", cap: "रातिको खाना पोखरी छेउमै खुला आकाशमुनि।" },
        { img: "hotel1.jpg", cap: "जंगल सफारी र थारू संस्कृति अवलोकनका प्याकेज लोकप्रिय छन्।" },
      ],
    },
    {
      title: "बौद्धका प्रार्थना चक्र: आस्था र सम्पदाको जीवन्त झलक",
      place: "बौद्ध, काठमाडौं",
      date: "असोज १६, २०८३",
      slides: [
        { img: "nepal3.jpg", cap: "बिहानैदेखि श्रद्धालु प्रार्थना चक्र घुमाउँदै स्तूपको परिक्रमा गर्छन्।" },
        { img: "nepal2.jpg", cap: "माथिबाट हेर्दा घना बस्तीबीच सेतो बौद्ध स्तूप।" },
        { img: "temple.jpg", cap: "नजिकैको स्वयम्भूमा पनि उत्तिकै भीड — लुङदार झण्डाले सजिएको स्तूप।" },
      ],
    },
  ];

  const $ = (id) => document.getElementById(id);
  const frame = $("stFrame");
  const media = $("stMedia");
  const layers = media.querySelectorAll("img");
  const bg = $("stBg");
  const bars = $("stBars");
  const pauseBtn = $("stPause");
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const qs = new URLSearchParams(location.search);
  let si = Math.min(Math.max(parseInt(qs.get("s"), 10) || 0, 0), STORIES.length - 1);
  let pi = 0;
  let elapsed = 0;
  let last = 0;
  let paused = false;
  let front = 0; // which <img> layer is visible

  const toNe = (n) => String(n).replace(/\d/g, (d) => "०१२३४५६७८९"[d]);

  // ---------- render ----------
  function buildBars() {
    bars.innerHTML = STORIES[si].slides.map(() => "<span><i></i></span>").join("");
  }

  function paintBars(progress) {
    bars.querySelectorAll("i").forEach((el, i) => {
      el.style.transform = `scaleX(${i < pi ? 1 : i === pi ? progress : 0})`;
    });
  }

  function setPeek(btn, story) {
    btn.hidden = !story;
    if (!story) return;
    btn.querySelector("img").src = IMG + story.slides[0].img;
    btn.querySelector(".co-st-peek-title").textContent = story.title;
  }

  function showSlide() {
    const story = STORIES[si];
    const slide = story.slides[pi];
    const src = IMG + slide.img;

    // crossfade between the two image layers
    const next = layers[1 - front];
    next.src = src;
    next.alt = slide.cap;
    next.classList.remove("is-on");
    void next.offsetWidth; // restart the slow zoom
    next.classList.add("is-on");
    layers[front].classList.remove("is-on");
    front = 1 - front;
    bg.src = src;

    $("stTitle").textContent = story.title;
    $("stDate").textContent = story.date;
    $("stCount").textContent = toNe(pi + 1) + " / " + toNe(story.slides.length);
    $("stPlace").textContent = story.place;
    $("stCap").textContent = slide.cap;
    $("stCredit").textContent = "तस्बिर: चासो अनलाइन";
    document.title = story.title + " — चासो अनलाइन";

    $("stPrev").disabled = si === 0 && pi === 0;
    elapsed = 0;
    paintBars(0);

    // warm the cache for the next photo
    const upcoming = story.slides[pi + 1] || (STORIES[si + 1] && STORIES[si + 1].slides[0]);
    if (upcoming) new Image().src = IMG + upcoming.img;
  }

  function showStory(index, slide = 0) {
    si = index;
    pi = slide;
    buildBars();
    setPeek($("stPeekPrev"), STORIES[si - 1]);
    setPeek($("stPeekNext"), STORIES[si + 1]);
    history.replaceState(null, "", "?s=" + si);
    if (!reduceMotion) {
      frame.classList.remove("is-switch");
      void frame.offsetWidth;
      frame.classList.add("is-switch");
    }
    showSlide();
  }

  // ---------- navigation ----------
  function next() {
    if (pi < STORIES[si].slides.length - 1) {
      pi++;
      showSlide();
    } else if (si < STORIES.length - 1) {
      showStory(si + 1);
    } else {
      close();
    }
  }

  function prev() {
    if (pi > 0) {
      pi--;
      showSlide();
    } else if (si > 0) {
      showStory(si - 1);
    } else {
      elapsed = 0;
    }
  }

  function setPaused(on) {
    paused = on;
    frame.classList.toggle("is-paused", on);
    pauseBtn.innerHTML = on ? '<i class="bi bi-play-fill"></i>' : '<i class="bi bi-pause-fill"></i>';
    pauseBtn.setAttribute("aria-label", on ? "चलाउनुहोस्" : "रोक्नुहोस्");
  }

  // Back to the homepage photo section. When we came from the homepage, history.back()
  // restores the exact scroll position; otherwise jump to the section anchor.
  function close() {
    let fromHome = false;
    try { fromHome = sessionStorage.getItem("co-story-from") === "home"; } catch (e) { }
    if (fromHome && history.length > 1) history.back();
    else location.href = "index.html#photo-feature";
  }

  // ---------- timer ----------
  function tick(now) {
    const dt = last ? now - last : 0;
    last = now;
    if (!paused) {
      elapsed += dt;
      if (elapsed >= DURATION) next();
      else paintBars(elapsed / DURATION);
    }
    requestAnimationFrame(tick);
  }

  // ---------- input ----------
  let downAt = 0;
  let holdTimer = 0;
  let held = false;
  let startX = 0;
  let startY = 0;
  const tap = $("stTap");

  tap.addEventListener("pointerdown", (e) => {
    downAt = Date.now();
    startX = e.clientX;
    startY = e.clientY;
    held = false;
    holdTimer = setTimeout(() => { held = true; setPaused(true); }, HOLD);
  });

  tap.addEventListener("pointerup", (e) => {
    clearTimeout(holdTimer);
    const dx = e.clientX - startX;
    const dy = e.clientY - startY;
    if (held) {
      setPaused(false);
    }
    // swipe: down = close, sideways = change story
    if (dy > 90 && Math.abs(dy) > Math.abs(dx)) return close();
    if (Math.abs(dx) > 60 && Math.abs(dx) > Math.abs(dy)) {
      if (dx < 0 && si < STORIES.length - 1) showStory(si + 1);
      else if (dx > 0 && si > 0) showStory(si - 1);
      return;
    }
    if (held || Date.now() - downAt > HOLD) return;
    const r = tap.getBoundingClientRect();
    if (e.clientX - r.left < r.width / 3) prev();
    else next();
  });

  tap.addEventListener("pointercancel", () => {
    clearTimeout(holdTimer);
    if (held) setPaused(false);
  });

  $("stPrev").addEventListener("click", prev);
  $("stNext").addEventListener("click", next);
  $("stPeekPrev").addEventListener("click", () => si > 0 && showStory(si - 1));
  $("stPeekNext").addEventListener("click", () => si < STORIES.length - 1 && showStory(si + 1));
  pauseBtn.addEventListener("click", () => setPaused(!paused));
  document.querySelectorAll("[data-story-close]").forEach((b) => b.addEventListener("click", close));

  const shareBtn = $("stShare");
  shareBtn.addEventListener("click", () => {
    const url = location.href;
    if (navigator.share) {
      navigator.share({ title: STORIES[si].title, url }).catch(() => { });
      return;
    }
    const done = () => {
      shareBtn.classList.add("is-done");
      setTimeout(() => shareBtn.classList.remove("is-done"), 1600);
    };
    if (navigator.clipboard) navigator.clipboard.writeText(url).then(done, done);
    else done();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowRight") next();
    else if (e.key === "ArrowLeft") prev();
    else if (e.key === "Escape") close();
    else if (e.key === " " && e.target === document.body) {
      e.preventDefault();
      setPaused(!paused);
    }
  });

  // pause while the tab is hidden
  document.addEventListener("visibilitychange", () => {
    if (document.hidden) setPaused(true);
  });

  showStory(si);
  requestAnimationFrame(tick);
});
