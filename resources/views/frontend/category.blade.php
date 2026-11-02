@extends('frontend.layouts.app', ['payload' => $cat, 'payloadMeta' => $catMeta, 'title' => $cat->name])


@section('main-section')
  <main class="co-main">

    <!-- ================= CATEGORY HEADER ================= -->
    <section class="co-cat-hero">
      <div class="container co-container">
        <nav class="co-crumbs" aria-label="ब्रेडक्रम्ब">
          <a href="index.html"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
          <i class="bi bi-chevron-right" aria-hidden="true"></i>
          <span aria-current="page">राजनीति</span>
        </nav>
        <div class="co-cat-head">
          <div>
            <h1 class="co-cat-title">राजनीति</h1>
            <p class="co-cat-desc">सरकार, संसद, राजनीतिक दल र निर्वाचनसँग जोडिएका ताजा समाचार, विश्लेषण र अन्तर्वार्ता।</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= FEATURED ================= -->
    <section class="co-section co-cat-featured">
      <div class="container co-container">
        <div class="co-cat-top">
          <article class="co-cat-lead">
            <a href="news.html" class="co-cat-lead-media co-img"><img src="assets/images/np/vote.jpg" alt="नेपाली कांग्रेसको वडा अधिवेशन सुरु"><span class="co-tag co-tag-red co-tag-abs">कांग्रेस</span></a>
            <h2 class="co-title-xl"><a href="news.html">नेपाली कांग्रेसको वडा अधिवेशन सुरु: उत्साह र एकताका साथ सहभागी हुन दीपक खड्काको अपिल</a></h2>
            <p class="co-excerpt">देशभरका वडामा एकैसाथ सुरु भएको अधिवेशनमा कार्यकर्ताको उल्लेख्य सहभागिता देखिएको छ। नेतृत्वले गुटबन्दी त्यागेर पार्टी एकतामा जोड दिन आग्रह गरेको छ।</p>
            <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १५, २०८३</span><span><i class="bi bi-book"></i> ६ मिनेट</span></div>
          </article>
          <div class="co-cat-side">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="assets/images/np/nepal2.jpg" alt="लुम्बिनीको १२ वटा क्षेत्र मध्ये ८ मा रास्वपा अगाडि" loading="lazy"><span class="co-tag co-tag-green co-tag-abs">निर्वाचन</span></a>
              <h3 class="co-title-md"><a href="news.html">लुम्बिनीको १२ वटा क्षेत्र मध्ये ८ मा रास्वपा अगाडि</a></h3>
              <div class="co-meta"><span>असोज १४, २०८३</span></div>
            </article>
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="assets/images/np/meeting2.jpg" alt="युद्धलाई समयमै गोलीगठ्ठा दिने विश्वले किसानलाई मल-इन्धन दिन सकेन : बालेन शाह" loading="lazy"><span class="co-tag co-tag-blue co-tag-abs">काठमाडौं</span></a>
              <h3 class="co-title-md"><a href="news.html">युद्धलाई समयमै गोलीगठ्ठा दिने विश्वले किसानलाई मल-इन्धन दिन सकेन : बालेन शाह</a></h3>
              <div class="co-meta"><span>असोज १३, २०८३</span></div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="category-top">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--sunrise" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/house.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-house-heart-fill"></i> Sunrise Homes</span><span class="co-cr-copy"><strong>काठमाडौंमा आफ्नै घर, किस्ताबन्दीमा</strong><small>२०% डाउन पेमेन्टमा बुकिङ खुला</small></span><span class="co-cr-cta">साइट भ्रमण <i class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>

    <!-- ================= LIST + SIDEBAR ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">

            <div class="co-cat-list">
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/man1.jpg" alt="रास्वपा दोलखाको पालिका संयोजक र विभागहरू तोकिए, प्रचार प्रमुखमा ओमकृष्ण आचार्य" loading="lazy"><span class="co-tag co-tag-blue co-tag-abs">रास्वपा</span></a>
                <h3 class="co-title-md"><a href="news.html">रास्वपा दोलखाको पालिका संयोजक र विभागहरू तोकिए, प्रचार प्रमुखमा ओमकृष्ण आचार्य</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १४, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/meeting.jpg" alt="ओली नआएपछि शीर्ष नेताहरुको बैठक बस्न सकेन, संसद आज नचल्ने" loading="lazy"><span class="co-tag co-tag-amber co-tag-abs">संसद</span></a>
                <h3 class="co-title-md"><a href="news.html">ओली नआएपछि शीर्ष नेताहरुको बैठक बस्न सकेन, संसद आज नचल्ने</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १२, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/man2.jpg" alt="एमालेको केन्द्रीय कमिटी बैठक सुरु, महाधिवेशनको मिति टुंगो लगाउने तयारी" loading="lazy"><span class="co-tag co-tag-red co-tag-abs">एमाले</span></a>
                <h3 class="co-title-md"><a href="news.html">एमालेको केन्द्रीय कमिटी बैठक सुरु, महाधिवेशनको मिति टुंगो लगाउने तयारी</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १२, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/press.jpg" alt="मन्त्रिपरिषद् बैठकले सात विधेयक संसदमा पेश गर्ने निर्णय गर्यो" loading="lazy"><span class="co-tag co-tag-green co-tag-abs">सरकार</span></a>
                <h3 class="co-title-md"><a href="news.html">मन्त्रिपरिषद् बैठकले सात विधेयक संसदमा पेश गर्ने निर्णय गर्यो</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १०, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/woman1.jpg" alt="माओवादी केन्द्रले संघीय संरचना पुनरावलोकनको प्रस्ताव अघि सार्यो" loading="lazy"><span class="co-tag co-tag-blue co-tag-abs">माओवादी</span></a>
                <h3 class="co-title-md"><a href="news.html">माओवादी केन्द्रले संघीय संरचना पुनरावलोकनको प्रस्ताव अघि सार्यो</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १०, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/group.jpg" alt="शिक्षक महासंघको आन्दोलन तेस्रो दिनमा, सरकारसँग वार्ता असफल" loading="lazy"><span class="co-tag co-tag-amber co-tag-abs">आन्दोलन</span></a>
                <h3 class="co-title-md"><a href="news.html">शिक्षक महासंघको आन्दोलन तेस्रो दिनमा, सरकारसँग वार्ता असफल</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ९, २०८३</span></div>
              </article>
              <div class="co-ad co-ad-infeed" data-ad-slot="category-infeed">
                <span class="co-ad-tag">विज्ञापन</span>
                <a href="#" class="co-ad-box co-cr co-cr-h co-cr--pahadpay" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/phone.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-phone-fill"></i> PahadPay</span><span class="co-cr-copy"><strong>बिल भुक्तानीमा ५% क्यासब्याक</strong><small>बिजुली, पानी, इन्टरनेट — सबै एकै एपमा</small></span><span class="co-cr-cta">एप डाउनलोड <i class="bi bi-arrow-right"></i></span></span></a>
              </div>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/nepal3.jpg" alt="कांग्रेस केन्द्रीय समितिको बैठक बस्दै, विधान संशोधनमा छलफल हुने" loading="lazy"><span class="co-tag co-tag-red co-tag-abs">कांग्रेस</span></a>
                <h3 class="co-title-md"><a href="news.html">कांग्रेस केन्द्रीय समितिको बैठक बस्दै, विधान संशोधनमा छलफल हुने</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ८, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/vote.jpg" alt="निर्वाचन आयोगले उपनिर्वाचनको मतदाता नामावली अद्यावधिक सुरु गर्यो" loading="lazy"><span class="co-tag co-tag-green co-tag-abs">निर्वाचन</span></a>
                <h3 class="co-title-md"><a href="news.html">निर्वाचन आयोगले उपनिर्वाचनको मतदाता नामावली अद्यावधिक सुरु गर्यो</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ७, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/man3.jpg" alt="बागमती प्रदेशसभाले स्थानीय तह सबलीकरण विधेयक पारित गर्यो" loading="lazy"><span class="co-tag co-tag-blue co-tag-abs">प्रदेश</span></a>
                <h3 class="co-title-md"><a href="news.html">बागमती प्रदेशसभाले स्थानीय तह सबलीकरण विधेयक पारित गर्यो</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ७, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/meeting2.jpg" alt="राष्ट्रिय सभाको समिति बैठकले सूचना प्रविधि विधेयकमा संशोधन सुझायो" loading="lazy"><span class="co-tag co-tag-amber co-tag-abs">संसद</span></a>
                <h3 class="co-title-md"><a href="news.html">राष्ट्रिय सभाको समिति बैठकले सूचना प्रविधि विधेयकमा संशोधन सुझायो</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ६, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/ktm.jpg" alt="महानगरले फुटपाथ व्यवस्थापनका लागि नयाँ कार्यविधि लागू गर्ने" loading="lazy"><span class="co-tag co-tag-green co-tag-abs">काठमाडौं</span></a>
                <h3 class="co-title-md"><a href="news.html">महानगरले फुटपाथ व्यवस्थापनका लागि नयाँ कार्यविधि लागू गर्ने</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ५, २०८३</span></div>
              </article>
              <article class="co-card co-cat-card">
                <a href="news.html" class="co-card-media co-img"><img src="assets/images/np/team.jpg" alt="युवा नेताहरूको भेलाले दलभित्र पुस्तान्तरणको माग उठायो" loading="lazy"><span class="co-tag co-tag-red co-tag-abs">युवा</span></a>
                <h3 class="co-title-md"><a href="news.html">युवा नेताहरूको भेलाले दलभित्र पुस्तान्तरणको माग उठायो</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ५, २०८३</span></div>
              </article>
            </div>

            <nav class="co-pager" aria-label="पृष्ठहरू">
              <a href="#" class="co-pager-btn is-disabled" aria-disabled="true"><i class="bi bi-arrow-left"></i> अघिल्लो</a>
              <div class="co-pager-pages">
                <a href="#" class="is-active" aria-current="page">१</a>
                <a href="#">२</a>
                <a href="#">३</a>
                <span>…</span>
                <a href="#">६२</a>
              </div>
              <a href="#" class="co-pager-btn">अर्को <i class="bi bi-arrow-right"></i></a>
            </nav>
          </div>

          <aside class="co-split-aside">
            <div class="co-ad co-ad-square" data-ad-slot="category-aside-sq-1">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--voltride" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/ev.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-lightning-charge-fill"></i> VoltRide EV</span><span class="co-cr-copy"><strong>दशैं अफर: ०% ब्याजमा इलेक्ट्रिक कार</strong><small>५ वर्ष ब्याट्री वारेन्टी · निःशुल्क होम चार्जर</small></span><span class="co-cr-cta">टेस्ट ड्राइभ <i class="bi bi-arrow-right"></i></span></span></a>
            </div>

            <div class="co-ad co-ad-square" data-ad-slot="category-aside-sq-2">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--techhub" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/laptop.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-laptop"></i> TechHub</span><span class="co-cr-copy"><strong>ल्यापटपमा १५% सम्म छुट</strong><small>सजिलो किस्ता · २ वर्ष वारेन्टी</small></span><span class="co-cr-cta">अहिले किन्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
            </div>

            <div class="co-ad co-ad-rect" data-ad-slot="category-aside">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--skyyatra" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/plane.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-airplane-fill"></i> Sky Yatra</span><span class="co-cr-copy"><strong>काठमाडौं–पोखरा रु. ३,९९९ बाट</strong><small>सीमित सिट · अहिले नै बुक गर्नुहोस्</small></span><span class="co-cr-cta">टिकट बुक गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
            </div>

            <!-- fills the rest of the sidebar: stays in view while the list scrolls -->
            <div class="co-ad co-ad-sticky co-aside-sticky" data-ad-slot="category-aside-sticky">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--lakebreeze" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/resort.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-water"></i> Lake Breeze Resort</span><span class="co-cr-copy"><strong>पोखरामा परिवारसँग बिदा — २५% छुट</strong><small>नास्ता सहित · ३ रात बस्दा १ रात निःशुल्क</small></span><span class="co-cr-cta">बुक गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  </main>
@endsection
