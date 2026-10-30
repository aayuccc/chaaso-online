@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
  <main class="co-main">


    <!-- ================= 1. मुख्य समाचार ================= -->
    <section class="co-section co-headline">
      <div class="container co-container">
        <!-- Highlights: any number of [headline][optional image] pairs. Desktop: each headline pins, its image slides away behind it, the next headline covers it -->
        <div class="co-lead-stack" id="coLeadStack">
          <article class="co-lead">
            <span class="co-tag co-tag-red">मुख्य समाचार</span>
            <h1 class="co-lead-title"><a href="#">‘Feel the Xtreme’ अभियानसहित एभरेष्ट होटेलमा भव्य पत्रकार सम्मेलन,
                राष्ट्रिय क्रिकेट खेलाडीहरूको उपस्थिति</a></h1>
            <div class="co-meta co-meta-center"><span class="co-meta-author"><i class="bi bi-person"></i> चासो
                संवाददाता</span><span><i class="bi bi-clock-history"></i> असोज १८, २०८३</span></div>
          </article>
          <a href="#" class="co-lead-media co-img">
            <img src="assets/images/np/crowd2.jpg"
              alt="‘Feel the Xtreme’ अभियानसहित एभरेष्ट होटेलमा भव्य पत्रकार सम्मेलन, राष्ट्रिय क्रिकेट खेलाडीहरूको उपस्थिति">
          </a>

          <article class="co-lead">
            <span class="co-tag co-tag-red">मुख्य समाचार</span>
            <h2 class="co-lead-title"><a href="#">२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन सरकारको आग्रह</a>
            </h2>
            <div class="co-meta co-meta-center"><span class="co-meta-author"><i class="bi bi-person"></i> चासो
                संवाददाता</span><span><i class="bi bi-clock-history"></i> असोज २६, २०८३</span></div>
          </article>

          <article class="co-lead">
            <span class="co-tag co-tag-red">मुख्य समाचार</span>
            <h2 class="co-lead-title"><a href="#">सेयर बजार २६०० विन्दु पार, एकै दिन ६ अर्ब २८ करोडभन्दा बढीको
                कारोबार</a></h2>
            <div class="co-meta co-meta-center"><span class="co-meta-author"><i class="bi bi-person"></i> चासो
                संवाददाता</span><span><i class="bi bi-clock-history"></i> असोज २६, २०८३</span></div>
          </article>
          <a href="#" class="co-lead-media co-img">
            <img src="assets/images/np/stock2.jpg"
              alt="सेयर बजार २६०० विन्दु पार, एकै दिन ६ अर्ब २८ करोडभन्दा बढीको कारोबार" loading="lazy">
          </a>
        </div>

        <!-- <article class="co-lead-split">
          <a href="#" class="co-lead-split-media co-img">
            <img src="assets/images/np/car.jpg" alt="म्याक्स टाइगरको ‘एनर्जाइज्ड दशैं धमाका’, क्यानमै छ कार, बाइक र स्कुटरको सरप्राइज">
            <span class="co-tag co-tag-amber co-tag-abs">अटो</span>
          </a>
          <div class="co-lead-split-body">
            <span class="co-tag co-tag-red">विशेष</span>
            <h2 class="co-title-xl"><a href="#">म्याक्स टाइगरको ‘एनर्जाइज्ड दशैं धमाका’, क्यानमै छ कार, बाइक र स्कुटरको सरप्राइज</a></h2>
            <p class="co-excerpt">दशैंको अवसर पारेर म्याक्स टाइगरले उपभोक्ताका लागि विशेष योजना सार्वजनिक गरेको छ, जसअन्तर्गत क्यानभित्रै कार, बाइक र स्कुटर जित्ने अवसर छ।</p>
            <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १८, २०८३</span></div>
          </div>
        </article> -->

        <!-- latest strip -->
        <!-- <div class="co-latest">
          <div class="co-latest-head"><span class="co-live-dot"></span> ताजा अपडेट</div>
          <ol class="co-latest-list">
            <li><a href="#">२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह</a><span>१ घण्टा अघि</span></li>
            <li><a href="#">सामान्य प्रशासनमन्त्री राजकुमार गुप्ताद्वारा राजीनामा</a><span>२ घण्टा अघि</span></li>
            <li><a href="#">खै कहाँ छन् जिवी राई ? किन खोज्दैनन् सरकार ?</a><span>३ घण्टा अघि</span></li>
            <li><a href="#">सुनको भाउले फेरि कीर्तिमान, चाँदीमा सामान्य गिरावट</a><span>४ घण्टा अघि</span></li>
          </ol>
        </div> -->

        <!-- Ad slot -->
        <a href="#" class="co-ad-banner">
          <span class="co-ad-label">विज्ञापन</span>
          <div class="co-ad-inner">
            <div class="co-ad-text">
              <strong>तपाईंको ब्रान्ड, लाखौं पाठकसम्म</strong>
              <span>चासो अनलाइनमा विज्ञापनका लागि आजै सम्पर्क गर्नुहोस्</span>
            </div>
            <span class="co-ad-cta">सम्पर्क गर्नुहोस् <i class="bi bi-arrow-right"></i></span>
          </div>
        </a>
      </div>
    </section>

    <!-- ================= 2. राजनीति ================= -->
    <section class="co-section co-politics">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">राजनीति</h2><span class="co-hatch"></span>
          <a href="category.html" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-pol">
          <a href="#" class="co-overlay co-pol-hero">
            <img src="assets/images/np/vote.jpg" alt="मतपेटिका">
            <span class="co-tag co-tag-red co-tag-abs">कांग्रेस</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-lg"><span class="co-mark">नेपाली कांग्रेसको वडा अधिवेशन सुरु: उत्साह र
                  एकताका साथ सहभागी हुन दीपक खड्काको अपिल</span></h3>
              <div class="co-meta co-meta-light"><span>चासो संवाददाता</span><span>असोज १५, २०८३</span></div>
            </div>
          </a>

          <div class="co-pol-mid">
            <article class="co-pol-card">
              <a href="#" class="co-pol-card-img co-img">
                <img src="assets/images/np/man1.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-blue co-tag-abs">रास्वपा</span>
              </a>
              <h3 class="co-title-md"><a href="#">रास्वपा दोलखाको पालिका संयोजक र विभागहरू तोकिए, प्रचार प्रमुखमा
                  ओमकृष्ण आचार्य</a></h3>
              <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १४, २०८३</span></div>
            </article>
            <article class="co-pol-card">
              <a href="#" class="co-pol-card-img co-img">
                <img src="assets/images/np/meeting.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-amber co-tag-abs">संसद</span>
              </a>
              <h3 class="co-title-md"><a href="#">ओली नआएपछि शीर्ष नेताहरुको बैठक बस्न सकेन, संसद आज नचल्ने</a></h3>
              <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १२, २०८३</span></div>
            </article>
          </div>

          <div class="co-pol-list">
            <article class="co-pol-item">
              <a href="#" class="co-pol-thumb co-img">
                <img src="assets/images/np/nepal2.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-green">काठमाडौं</span>
              </a>
              <div>
                <h3 class="co-title-sm"><a href="#">युद्धलाई समयमै गोलीगठ्ठा दिने विश्वले किसानलाई मल-इन्धन दिन सकेन :
                    बालेन शाह</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १३, २०८३</span></div>
              </div>
            </article>
            <article class="co-pol-item">
              <a href="#" class="co-pol-thumb co-img">
                <img src="assets/images/np/man2.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-red">एमाले</span>
              </a>
              <div>
                <h3 class="co-title-sm"><a href="#">एमालेको केन्द्रीय कमिटी बैठक सुरु, महाधिवेशनको मिति टुंगो लगाउने
                    तयारी</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १२, २०८३</span></div>
              </div>
            </article>
            <article class="co-pol-item">
              <a href="#" class="co-pol-thumb co-img">
                <img src="assets/images/np/group.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-amber">आन्दोलन</span>
              </a>
              <div>
                <h3 class="co-title-sm"><a href="#">शिक्षक महासंघको आन्दोलन तेस्रो दिनमा, सरकारसँग वार्ता असफल</a></h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज ११, २०८३</span></div>
              </div>
            </article>
            <article class="co-pol-item">
              <a href="#" class="co-pol-thumb co-img">
                <img src="assets/images/np/woman1.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-blue">माओवादी</span>
              </a>
              <div>
                <h3 class="co-title-sm"><a href="#">माओवादी केन्द्रले संघीय संरचना पुनरावलोकनको प्रस्ताव अघि सार्यो</a>
                </h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १०, २०८३</span></div>
              </div>
            </article>
            <article class="co-pol-item">
              <a href="#" class="co-pol-thumb co-img">
                <img src="assets/images/np/press.jpg" alt="" loading="lazy">
                <span class="co-tag co-tag-green">सरकार</span>
              </a>
              <div>
                <h3 class="co-title-sm"><a href="#">मन्त्रिपरिषद् बैठकले सात विधेयक संसदमा पेश गर्ने निर्णय गर्यो</a>
                </h3>
                <div class="co-meta"><span class="co-meta-author">चासो संवाददाता</span><span>असोज १०, २०८३</span></div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-wide" data-ad-slot="after-politics">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--voltride" rel="sponsored noopener"><img class="co-cr-img"
              src="assets/images/ads/ev.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i
                  class="bi bi-lightning-charge-fill"></i> VoltRide EV</span><span class="co-cr-copy"><strong>दशैं अफर:
                  ०% ब्याजमा इलेक्ट्रिक कार</strong><small>५ वर्ष ब्याट्री वारेन्टी · निःशुल्क होम
                  चार्जर</small></span><span class="co-cr-cta">टेस्ट ड्राइभ बुक गर्नुहोस् <i
                  class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>
    <!-- ================= 3. अर्थ वाणिज्य + जीवनशैली ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            <div class="co-section-head">
              <h2 class="co-section-title">अर्थ वाणिज्य</h2><span class="co-hatch"></span>
              <a href="#" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="co-econ-top co-grow">
              <a href="#" class="co-overlay co-econ-feature">
                <img src="assets/images/np/traffic.jpg" alt="सवारी">
                <span class="co-tag co-tag-red co-tag-abs">व्यापार</span>
                <div class="co-overlay-body">
                  <h3 class="co-mark-title co-mark-md"><span class="co-mark">कोरला नाकाबाट ११ अर्ब १ करोड ९५ लाखको
                      कारोबार, २ हजारभन्दा बढी विद्युतीय गाडी भित्रिए</span></h3>
                  <div class="co-meta co-meta-light"><span>चासो संवाददाता</span><span>पुस ८, २०८२</span></div>
                </div>
              </a>
              <div class="co-mini-list">
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/bank.jpg"
                      alt="चिनियाँ अदालतमा नबिल बैंकको जीत, ठेकेदारविरुद्धको मुद्दा जित्दै १ अर्बभन्दा बढी रकम फिर्ता"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">चिनियाँ अदालतमा नबिल बैंकको जीत, ठेकेदारविरुद्धको मुद्दा जित्दै
                        १ अर्बभन्दा बढी रकम फिर्ता</a></h3>
                    <div class="co-meta"><span><i class="bi bi-clock-history"></i> पुस ६, २०८२</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/stock1.jpg"
                      alt="हप्ताको पहिलो दिन शेयर बजार दोहोरो अङ्कले ओरालो, नेप्से १९.९२ अङ्कले घट्यो"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">हप्ताको पहिलो दिन शेयर बजार दोहोरो अङ्कले ओरालो, नेप्से १९.९२
                        अङ्कले घट्यो</a></h3>
                    <div class="co-meta"><span><i class="bi bi-clock-history"></i> पुस ६, २०८२</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/stock2.jpg"
                      alt="लगातारको वृद्धिमा ‘ब्रेक’, नेप्से १० अङ्कले घट्दा पनि कारोबार रकममा उत्साह"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">लगातारको वृद्धिमा ‘ब्रेक’, नेप्से १० अङ्कले घट्दा पनि कारोबार
                        रकममा उत्साह</a></h3>
                    <div class="co-meta"><span><i class="bi bi-clock-history"></i> पुस ३, २०८२</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/stock4.jpg"
                      alt="नेपालको शेयर बजारमा लगातार चौथो दिन वृद्धि, नेप्से ९.६१ अङ्कले बढ्यो"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">नेपालको शेयर बजारमा लगातार चौथो दिन वृद्धि, नेप्से ९.६१ अङ्कले
                        बढ्यो</a></h3>
                    <div class="co-meta"><span><i class="bi bi-clock-history"></i> मङ्सिर ११, २०८२</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/gold.jpg"
                      alt="सुनको भाउले फेरि कीर्तिमान, चाँदीमा सामान्य गिरावट"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">सुनको भाउले फेरि कीर्तिमान, चाँदीमा सामान्य गिरावट</a></h3>
                    <div class="co-meta"><span><i class="bi bi-clock-history"></i> मङ्सिर १०, २०८२</span></div>
                  </div>
                </article>
              </div>
            </div>
            <div class="co-trio">
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/stock3.jpg"
                    alt="सेयर बजारमा तेस्रो दिन पनि वृद्धि: नेप्से ५.३२ अंक बढ्यो, कारोबार रकम भने घट्यो"><span
                    class="co-tag co-tag-green co-tag-abs">सेयर</span></a>
                <h3 class="co-title-md"><a href="#">सेयर बजारमा तेस्रो दिन पनि वृद्धि: नेप्से ५.३२ अंक बढ्यो, कारोबार
                    रकम भने घट्यो</a></h3>
                <div class="co-meta"><span>मङ्सिर ९, २०८२</span></div>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/gold.jpg"
                    alt="सेयर बजार २६०० विन्दु पार, ६ अर्ब २८ करोडभन्दा बढीको कारोबार"><span
                    class="co-tag co-tag-amber co-tag-abs">बजार</span></a>
                <h3 class="co-title-md"><a href="#">सेयर बजार २६०० विन्दु पार, ६ अर्ब २८ करोडभन्दा बढीको कारोबार</a>
                </h3>
                <div class="co-meta"><span>मङ्सिर ७, २०८२</span></div>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/meeting2.jpg"
                    alt="अन्तरिम अवधिका लागि सात लाख विद्युतीय राहदानी खरिद गर्ने सरकारी निर्णय"><span
                    class="co-tag co-tag-blue co-tag-abs">सरकार</span></a>
                <h3 class="co-title-md"><a href="#">अन्तरिम अवधिका लागि सात लाख विद्युतीय राहदानी खरिद गर्ने सरकारी
                    निर्णय</a></h3>
                <div class="co-meta"><span>मङ्सिर ५, २०८२</span></div>
              </article>
            </div>
          </div>

          <div class="co-split-aside">
            <div class="co-section-head">
              <h2 class="co-section-title">जीवनशैली</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <a href="#" class="co-overlay co-aside-feature">
              <img src="assets/images/np/music.jpg" alt="">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">म्याक्स टाइगरको ‘एनर्जाइज्ड दशैं धमाका’,
                    क्यानमै छ कार, बाइक र स्कुटरको सरप्राइज</span></h3>
              </div>
            </a>
            <ol class="co-num-list co-grow co-spread">
              <li><a href="#">एनपीएलको जोश बढाउँदै एक्स्ट्रीम: ७ टोली, ७ गेट</a></li>
              <li><a href="#">आदिवासी जनजातिको जलवायु तथा वन शासनमा सहभागिता विषयक प्रदेशस्तरीय कार्यशाला सम्पन्न</a>
              </li>
              <li><a href="#">प्रिन्सपन कार्कीको ‘फूल जस्तै रानीलाई’ सार्वजनिक</a></li>
              <li><a href="#">विकटताको पहाडमा थुनिएको ताम्चा: जहाँ राज्य पुग्दैन, तर अभावले श्वास फेर्छ!</a></li>
              <li><a href="#">लुम्बिनीको १२ वटा क्षेत्र मध्ये ८ मा रास्वपा अगाडि</a></li>
              <li><a href="#">जसपा नेपालले फागुन १ गते घोषणापत्र सार्वजनिक गर्ने</a></li>
            </ol>
            <div class="co-ad co-ad-rect" data-ad-slot="aside-lifestyle">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--gurans" rel="sponsored noopener"><img class="co-cr-img"
                  src="assets/images/ads/coffee.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                    class="co-cr-brand"><i class="bi bi-cup-hot-fill"></i> Gurans Café</span><span
                    class="co-cr-copy"><strong>दोस्रो कफी बिल्कुलै निःशुल्क</strong><small>हरेक बिहान ७ देखि १०
                      बजेसम्म</small></span><span class="co-cr-cta">मेनु हेर्नुहोस् <i
                      class="bi bi-arrow-right"></i></span></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad-pair">
          <div class="co-ad co-ad-half" data-ad-slot="after-economy-1">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--pahadpay" rel="sponsored noopener"><img class="co-cr-img"
                src="assets/images/ads/phone.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-wallet2"></i> PahadPay</span><span class="co-cr-copy"><strong>बिल
                    भुक्तानीमा १०% क्यासब्याक</strong><small>बिजुली, पानी, इन्टरनेट — एकै एपमा</small></span><span
                  class="co-cr-cta">एप डाउनलोड <i class="bi bi-arrow-right"></i></span></span></a>
          </div>
          <div class="co-ad co-ad-half" data-ad-slot="after-economy-2">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--sunrise" rel="sponsored noopener"><img class="co-cr-img"
                src="assets/images/ads/house.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-house-heart-fill"></i> Sunrise Homes</span><span
                  class="co-cr-copy"><strong>काठमाडौंमा आफ्नै घर, किस्ताबन्दीमा</strong><small>२०% डाउन पेमेन्टमा बुकिङ
                    खुला</small></span><span class="co-cr-cta">साइट भ्रमण <i
                    class="bi bi-arrow-right"></i></span></span></a>
          </div>
        </div>
      </div>
    </div>
    <!-- ================= 4. खेलकुद + शिक्षा ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            <div class="co-section-head">
              <h2 class="co-section-title">खेलकुद</h2><span class="co-hatch"></span>
              <a href="#" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="co-sport-grid">
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/cricket2.jpg"
                    alt="एनपीएलमा काठमान्डु गोर्खाज प्लेअफमा प्रवेश, पोखरा एभेन्जर्स १३ रनले पराजित"><span
                    class="co-tag co-tag-red co-tag-abs">एनपीएल</span></a>
                <h3 class="co-title-md"><a href="#">एनपीएलमा काठमान्डु गोर्खाज प्लेअफमा प्रवेश, पोखरा एभेन्जर्स १३ रनले
                    पराजित</a></h3>
                <div class="co-meta"><span>मङ्सिर २०, २०८२</span></div>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/cricket3.jpg"
                    alt="गुल्सन झाको आक्रामक पारीमा कर्णालीले काठमान्डुलाई दियो १५० रनको लक्ष्य"><span
                    class="co-tag co-tag-red co-tag-abs">एनपीएल</span></a>
                <h3 class="co-title-md"><a href="#">गुल्सन झाको आक्रामक पारीमा कर्णालीले काठमान्डुलाई दियो १५० रनको
                    लक्ष्य</a></h3>
                <div class="co-meta"><span>मङ्सिर १८, २०८२</span></div>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/cricket1.jpg"
                    alt="रबि बोपाराको तेस्रो लगातार अर्धशतक, चितवन राइनोजले विराटनगर किंग्सलाई १७५ रनको लक्ष्य"><span
                    class="co-tag co-tag-red co-tag-abs">एनपीएल</span></a>
                <h3 class="co-title-md"><a href="#">रबि बोपाराको तेस्रो लगातार अर्धशतक, चितवन राइनोजले विराटनगर
                    किंग्सलाई १७५ रनको लक्ष्य</a></h3>
                <div class="co-meta"><span>मङ्सिर १७, २०८२</span></div>
              </article>
              <div class="co-ad co-ad-infeed" data-ad-slot="in-feed-sports">
                <span class="co-ad-tag">विज्ञापन</span>
                <a href="#" class="co-ad-box co-cr co-cr-h co-cr--kickon" rel="sponsored noopener"><img
                    class="co-cr-img" src="assets/images/ball.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                      class="co-cr-brand"><i class="bi bi-dribbble"></i> KickOn Sports</span><span
                      class="co-cr-copy"><strong>खेलकुद सामग्रीमा ३०% सम्म छुट</strong><small>जर्सी, बल, जुत्ता — सबै
                        एकै ठाउँमा</small></span><span class="co-cr-cta">किनमेल गर्नुहोस् <i
                        class="bi bi-arrow-right"></i></span></span></a>
              </div>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/cricket5.jpg"
                    alt="एनपीएलमा लुम्बिनी लायन्सका खेलाडीलाई शतकमा १ लाख, अर्धशतकमा ५० हजार पुरस्कार"><span
                    class="co-tag co-tag-amber co-tag-abs">पुरस्कार</span></a>
                <h3 class="co-title-md"><a href="#">एनपीएलमा लुम्बिनी लायन्सका खेलाडीलाई शतकमा १ लाख, अर्धशतकमा ५० हजार
                    पुरस्कार</a></h3>
                <div class="co-meta"><span>मङ्सिर १५, २०८२</span></div>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/group.jpg"
                    alt="एनपीएलमा विराटनगर किङ्ग्सको उत्कृष्ट प्रदर्शन: पूर्वदेखि देशभर फैलिएको उत्साह"><span
                    class="co-tag co-tag-blue co-tag-abs">समर्थक</span></a>
                <h3 class="co-title-md"><a href="#">एनपीएलमा विराटनगर किङ्ग्सको उत्कृष्ट प्रदर्शन: पूर्वदेखि देशभर
                    फैलिएको उत्साह</a></h3>
                <div class="co-meta"><span>मङ्सिर १४, २०८२</span></div>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/cricket4.jpg"
                    alt="दृष्टिविहीन महिला टी-२० विश्वकपको उपाधि भारतलाई, फाइनलमा नेपाल पराजित"><span
                    class="co-tag co-tag-green co-tag-abs">विश्वकप</span></a>
                <h3 class="co-title-md"><a href="#">दृष्टिविहीन महिला टी-२० विश्वकपको उपाधि भारतलाई, फाइनलमा नेपाल
                    पराजित</a></h3>
                <div class="co-meta"><span>मङ्सिर १२, २०८२</span></div>
              </article>
            </div>
          </div>

          <div class="co-split-aside">
            <div class="co-section-head">
              <h2 class="co-section-title">शिक्षा</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <div class="co-mini-list co-mini-list-aside co-grow co-spread">
              <article class="co-mini">
                <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/kids.jpg"
                    alt="काठमाडौं र इटहरीको सफलतापछि झापाको दमकमा खुल्यो युरो किड्स"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">काठमाडौं र इटहरीको सफलतापछि झापाको दमकमा खुल्यो युरो किड्स</a>
                  </h3>
                  <div class="co-meta"><span>असोज ११, २०८३</span></div>
                </div>
              </article>
              <article class="co-mini">
                <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/class.jpg"
                    alt="बिजय शाहीको नाम गिनिज बुकमा दर्ता: १ मिनेटमा १५० नम्बर याद गर्दै बनाए विश्वकीर्तिमान"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">बिजय शाहीको नाम गिनिज बुकमा दर्ता: १ मिनेटमा १५० नम्बर याद गर्दै
                      बनाए विश्वकीर्तिमान</a></h3>
                  <div class="co-meta"><span>भदौ ५, २०८३</span></div>
                </div>
              </article>
              <article class="co-mini">
                <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/students.jpg"
                    alt="त्रिभुवन विश्वविद्यालयको नीति तथा कार्यक्रम पारित, जग्गा संरक्षण र सुधारमा जोड"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">त्रिभुवन विश्वविद्यालयको नीति तथा कार्यक्रम पारित, जग्गा संरक्षण र
                      सुधारमा जोड</a></h3>
                  <div class="co-meta"><span>मङ्सिर ११, २०८२</span></div>
                </div>
              </article>
              <article class="co-mini co-hide-md">
                <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/man3.jpg"
                    alt="पचास हजार राशिको मनराम–एसकाज पत्रकारिता पुरस्कार वरिष्ठ पत्रकार पोखरेललाई"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">पचास हजार राशिको मनराम–एसकाज पत्रकारिता पुरस्कार वरिष्ठ पत्रकार
                      पोखरेललाई</a></h3>
                  <div class="co-meta"><span>मङ्सिर ८, २०८२</span></div>
                </div>
              </article>
            </div>
            <div class="co-ad co-ad-rect" data-ad-slot="aside-education">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--apex" rel="sponsored noopener"><img class="co-cr-img"
                  src="assets/images/ads/college.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                    class="co-cr-brand"><i class="bi bi-mortarboard-fill"></i> Apex College</span><span
                    class="co-cr-copy"><strong>भर्ना खुल्यो — २०८३/८४</strong><small>BBA · BIT · BSc CSIT ·
                      MBA</small></span><span class="co-cr-cta">आजै आवेदन दिनुहोस् <i
                      class="bi bi-arrow-right"></i></span></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= 5. प्रदेश + पर्यटन ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            <div class="co-section-head co-section-head-tabs">
              <h2 class="co-section-title">प्रदेश</h2><span class="co-hatch co-hatch-sm"></span>
              <div class="co-tabs" role="tablist" aria-label="प्रदेश छान्नुहोस्">
                <span class="co-tabs-pill" aria-hidden="true"></span>
                <button class="co-tab is-active" type="button" role="tab" aria-selected="true">कोशी</button>
                <button class="co-tab" type="button" role="tab" aria-selected="false">मधेश</button>
                <button class="co-tab" type="button" role="tab" aria-selected="false">बागमती</button>
                <button class="co-tab" type="button" role="tab" aria-selected="false">गण्डकी</button>
                <button class="co-tab" type="button" role="tab" aria-selected="false">लुम्बिनी</button>
                <button class="co-tab" type="button" role="tab" aria-selected="false">कर्णाली</button>
                <button class="co-tab" type="button" role="tab" aria-selected="false">सुदूरपश्चिम</button>
              </div>
            </div>
            <div class="co-province" id="coProvince">
              <article class="co-province-feature">
                <a href="#" class="co-img co-province-media"><img src="assets/images/np/temple.jpg"
                    alt="मेची भन्सारले पहिलो महिनामा १ अर्ब २६ करोडभन्दा बढी राजस्व संकलन"><span
                    class="co-tag co-tag-red co-tag-abs co-province-label">कोशी</span></a>
                <h3 class="co-title-lg"><a href="#">मेची भन्सारले पहिलो महिनामा १ अर्ब २६ करोडभन्दा बढी राजस्व संकलन</a>
                </h3>
                <div class="co-meta"><span class="co-meta-author">झापा संवाददाता</span><span>कात्तिक ५, २०८२</span>
                </div>
              </article>
              <div class="co-mini-list">
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/nepal1.jpg"
                      alt="मौद्रिक नीति कार्यान्वयनमा : शेयर कर्जा र घर किन्नेलाई सहज"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">मौद्रिक नीति कार्यान्वयनमा : शेयर कर्जा र घर किन्नेलाई सहज</a>
                    </h3>
                    <div class="co-meta"><span>साउन २, २०८२</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/team.jpg"
                      alt="महाधिवेशनमा रेशु तामाङको नेतृत्वलाई युवाको साथ"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">महाधिवेशनमा रेशु तामाङको नेतृत्वलाई युवाको साथ</a></h3>
                    <div class="co-meta"><span>जेठ १२, २०८२</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/man2.jpg"
                      alt="कोशी प्रदेशका मन्त्री राम राना उपस्थित कार्यक्रम बहिष्कार"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">कोशी प्रदेशका मन्त्री राम राना उपस्थित कार्यक्रम बहिष्कार</a>
                    </h3>
                    <div class="co-meta"><span>कात्तिक २८, २०८१</span></div>
                  </div>
                </article>
                <article class="co-mini">
                  <a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/trek.jpg"
                      alt="प्रेम सन्जय लिम्बुको नेतृत्वमा पर्यटकिय गन्तव्य बन्दै सङ्खुवासभाको नुन्ढाकी"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="#">प्रेम सन्जय लिम्बुको नेतृत्वमा पर्यटकिय गन्तव्य बन्दै
                        सङ्खुवासभाको नुन्ढाकी</a></h3>
                    <div class="co-meta"><span>पुस २१, २०७९</span></div>
                  </div>
                </article>
              </div>
            </div>
            <div class="co-trio co-trio-sm co-province-more" id="coProvinceMore">
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/nepal2.jpg"
                    alt="लुम्बिनीको १२ वटा क्षेत्र मध्ये ८ मा रास्वपा अगाडि"><span
                    class="co-tag co-tag-green co-tag-abs co-province-label">कोशी</span></a>
                <h3 class="co-title-sm"><a href="#">लुम्बिनीको १२ वटा क्षेत्र मध्ये ८ मा रास्वपा अगाडि</a></h3>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/meeting2.jpg"
                    alt="रास्वपा दोलखाको पालिका संयोजक र विभागहरू तोकिए, प्रचार प्रमुखमा ओमकृष्ण आचार्य"><span
                    class="co-tag co-tag-blue co-tag-abs co-province-label">कोशी</span></a>
                <h3 class="co-title-sm"><a href="#">रास्वपा दोलखाको पालिका संयोजक र विभागहरू तोकिए, प्रचार प्रमुखमा
                    ओमकृष्ण आचार्य</a></h3>
              </article>
              <article class="co-card">
                <a href="#" class="co-card-media co-img"><img src="assets/images/np/nepal3.jpg"
                    alt="विकटताको पहाडमा थुनिएको ताम्चा: जहाँ राज्य पुग्दैन, तर अभावले श्वास फेर्छ!"><span
                    class="co-tag co-tag-amber co-tag-abs co-province-label">कोशी</span></a>
                <h3 class="co-title-sm"><a href="#">विकटताको पहाडमा थुनिएको ताम्चा: जहाँ राज्य पुग्दैन, तर अभावले श्वास
                    फेर्छ!</a></h3>
              </article>
            </div>
          </div>

          <div class="co-split-aside">
            <div class="co-section-head">
              <h2 class="co-section-title">पर्यटन</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <a href="#" class="co-overlay co-aside-feature">
              <img src="assets/images/np/mtn.jpg" alt="हिमाल">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">मुस्ताङ, म्याग्दी, बागलुङ र पर्वतमा पर्यटकको
                    भीड, होटलहरू भरिभराउ</span></h3>
              </div>
            </a>
            <ul class="co-bullet-list co-grow co-spread">
              <li><a href="#">वर्षाका कारण यस वर्ष जलजला पुग्न सकेनन् पर्यटक</a></li>
              <li><a href="#">लाङटाङ पदयात्रामा गएका भक्तपुरका चार जना बेपत्ता</a></li>
              <li><a href="#">सुनको भाउले फेरि कीर्तिमान, चाँदीमा सामान्य गिरावट</a></li>
            </ul>
            <div class="co-ad co-ad-rect" data-ad-slot="aside-tourism">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--skyyatra" rel="sponsored noopener"><img
                  class="co-cr-img" src="assets/images/ads/plane.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                    class="co-cr-brand"><i class="bi bi-airplane-fill"></i> Sky Yatra</span><span
                    class="co-cr-copy"><strong>काठमाडौं–पोखरा रु. ३,९९९ बाट</strong><small>सीमित सिट · अहिले नै बुक
                      गर्नुहोस्</small></span><span class="co-cr-cta">टिकट बुक गर्नुहोस् <i
                      class="bi bi-arrow-right"></i></span></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="before-tech">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--techhub" rel="sponsored noopener"><img class="co-cr-img"
              src="assets/images/ads/laptop.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                class="co-cr-brand"><i class="bi bi-laptop"></i> TechHub</span><span class="co-cr-copy"><strong>दशैं
                  सेल: ल्यापटपमा रु. २०,००० सम्म छुट</strong><small>EMI सुविधा उपलब्ध</small></span><span
                class="co-cr-cta">अफर हेर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>
    <!-- ================= 6. सूचना प्रविधि ================= -->
    <section class="co-section co-band-soft">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">सूचना प्रविधि</h2><span class="co-hatch"></span>
          <a href="#" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-tech-grid">
          <a href="#" class="co-overlay co-tech-card co-tech-big">
            <img src="assets/images/np/phone.jpg" alt="स्मार्टफोन">
            <span class="co-tag co-tag-blue co-tag-abs">सामाजिक सञ्जाल</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-lg"><span class="co-mark">ताइवानमा लोकप्रिय चिनियाँ सामाजिक सञ्जाल
                  ‘रेडनोट’ एक वर्षका लागि प्रतिबन्ध</span></h3>
              <div class="co-meta co-meta-light"><span>असोज ९, २०८३</span></div>
            </div>
          </a>
          <a href="#" class="co-overlay co-tech-card">
            <img src="assets/images/np/border.jpg" alt="">
            <span class="co-tag co-tag-red co-tag-abs">सिस्टम</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">यातायात विभागको सिस्टम डाउन हुँदा लाइसेन्स
                  छपाइमा ढिलाइ, KU ले आधिकारिक पत्र पर्खँदै</span></h3>
            </div>
          </a>
          <a href="#" class="co-overlay co-tech-card">
            <img src="assets/images/np/power.jpg" alt="प्रसारणलाइन">
            <span class="co-tag co-tag-amber co-tag-abs">ऊर्जा</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">एमसीए–नेपालको ४०० केभी प्रसारणलाइन क्षेत्र
                  वरिपरि संरचना निर्माण र रुख रोप्न निषेध</span></h3>
            </div>
          </a>
          <a href="#" class="co-overlay co-tech-card co-tech-wide">
            <img src="assets/images/np/server.jpg" alt="">
            <span class="co-tag co-tag-green co-tag-abs">पूर्वाधार</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">मन्त्री घिसिङद्वारा बाढीपीडित बीपी राजमार्गको
                  अनुगमन, चाँडो सञ्चालनका लागि निर्देशन</span></h3>
            </div>
          </a>
        </div>
      </div>
    </section>


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-wide" data-ad-slot="after-tech">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--beatbox" rel="sponsored noopener"><img class="co-cr-img"
              src="assets/images/ads/headphones.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                class="co-cr-brand"><i class="bi bi-headphones"></i> BeatBox Audio</span><span
                class="co-cr-copy"><strong>सुन्नुहोस् फरक — नयाँ वायरलेस हेडफोन</strong><small>४० घण्टा ब्याट्री · नोइज
                  क्यान्सलिङ</small></span><span class="co-cr-cta">अर्डर गर्नुहोस् <i
                  class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>
    <!-- ================= 7. अन्तरवार्ता + विचार ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            <div class="co-section-head">
              <h2 class="co-section-title">अन्तरवार्ता</h2><span class="co-hatch"></span>
              <a href="#" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
            </div>
            <article class="co-interview co-grow">
              <div class="co-interview-body">
                <i class="bi bi-quote co-interview-quote"></i>
                <h3 class="co-interview-title"><a href="#">मरणोपरान्त आँखा दान गरेका भिमबहादुरको डा. रुइतद्वारा
                    प्रशंसा</a></h3>
                <p>“आँखा दान गर्नु भनेको अर्को व्यक्तिलाई संसार देखाउनु हो। भिमबहादुरजीको निर्णयले धेरैलाई प्रेरणा
                  दिनेछ।”</p>
                <div class="co-interview-foot">
                  <div class="co-meta co-meta-light"><span><i class="bi bi-clock-history"></i> असोज ११, २०८३</span>
                  </div>
                  <a href="#" class="co-btn-light">पूरा पढ्नुहोस् <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
              <a href="#" class="co-interview-media co-img"><img src="assets/images/np/oldman.jpg"
                  alt="मरणोपरान्त आँखा दान गरेका भिमबहादुरको डा. रुइतद्वारा प्रशंसा"></a>
            </article>
            <div class="co-ad co-ad-infeed co-ad-under" data-ad-slot="under-interview">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-h co-cr--careshield" rel="sponsored noopener"><img
                  class="co-cr-img" src="assets/images/ads/family.jpg" alt="" loading="lazy"><span
                  class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-shield-check"></i> CareShield
                    बीमा</span><span class="co-cr-copy"><strong>परिवारको सुरक्षा, भविष्यको भरोसा</strong><small>मासिक
                      रु. ५०० बाट जीवन बीमा</small></span><span class="co-cr-cta">योजना हेर्नुहोस् <i
                      class="bi bi-arrow-right"></i></span></span></a>
            </div>
          </div>

          <div class="co-split-aside">
            <div class="co-section-head">
              <h2 class="co-section-title">विचार</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <div class="co-opinion-card co-grow co-spread">
              <article class="co-opinion">
                <img class="co-opinion-avatar" src="assets/images/np/woman1.jpg" alt="">
                <div>
                  <h3 class="co-title-sm"><a href="#">"नेपाली Gen Z को क्रान्ति: रवि लामिछाने प्रधानमन्त्रीको रूपमा
                      उपयुक्त होइन"</a></h3><span class="co-opinion-author"><i class="bi bi-pen"></i> Srijana
                    phuyal</span>
                </div>
              </article>
              <article class="co-opinion">
                <img class="co-opinion-avatar" src="assets/images/np/man3.jpg" alt="">
                <div>
                  <h3 class="co-title-sm"><a href="#">युवाहरू सडकमा</a></h3><span class="co-opinion-author"><i
                      class="bi bi-pen"></i> Srijana phuyal</span>
                </div>
              </article>
              <article class="co-opinion">
                <img class="co-opinion-avatar" src="assets/images/np/man1.jpg" alt="">
                <div>
                  <h3 class="co-title-sm"><a href="#">सामान्य प्रशासनमन्त्री राजकुमार गुप्ताद्वारा राजीनामा</a></h3>
                  <span class="co-opinion-author"><i class="bi bi-pen"></i> Chaaso Online</span>
                </div>
              </article>
              <article class="co-opinion">
                <img class="co-opinion-avatar" src="assets/images/np/man2.jpg" alt="">
                <div>
                  <h3 class="co-title-sm"><a href="#">प्रकाशमानलाई कांग्रेस सांसदको सुझाव– सहरी विकास मन्त्रालयको नाम
                      फेर्नुहोस्</a></h3><span class="co-opinion-author"><i class="bi bi-pen"></i> Chaaso Online</span>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad-pair">
          <div class="co-ad co-ad-half" data-ad-slot="before-video-1">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--momo" rel="sponsored noopener"><img class="co-cr-img"
                src="assets/images/ads/momo.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-fire"></i> MoMo Magic</span><span class="co-cr-copy"><strong>१
                    प्लेट किन्दा १ प्लेट निःशुल्क</strong><small>हरेक शुक्रबार · सबै शाखामा</small></span><span
                  class="co-cr-cta">अर्डर गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
          </div>
          <div class="co-ad co-ad-half" data-ad-slot="before-video-2">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--yatra" rel="sponsored noopener"><img class="co-cr-img"
                src="assets/images/np/trek.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-compass"></i> Yatra Treks</span><span
                  class="co-cr-copy"><strong>अन्नपूर्ण बेस क्याम्प — ७ दिने प्याकेज</strong><small>गाइड, बास र खाना
                    सहित</small></span><span class="co-cr-cta">बुक गर्नुहोस् <i
                    class="bi bi-arrow-right"></i></span></span></a>
          </div>
        </div>
      </div>
    </div>
    <!-- ================= 8. भिडियो (dark) ================= -->
    <section class="co-section co-video">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">भिडियो</h2><span class="co-hatch"></span>
          <a href="#" class="co-more">सबै भिडियो <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-video-grid">
          <!-- Each playlist item: data-youtube="VIDEO_ID" (demo IDs for now) + data-date. Play opens the popup player. -->
          <div class="co-video-player" id="coVideoPlayer">
            <img src="assets/images/np/press.jpg" alt="" class="co-video-thumb">
            <button class="co-video-play" type="button" aria-label="भिडियो हेर्नुहोस्"><i
                class="bi bi-play-fill"></i></button>
            <div class="co-overlay-body">
              <span class="co-tag co-tag-red">भिडियो</span>
              <h3 class="co-mark-title co-mark-lg"><span class="co-mark co-video-title">जनार्दन शर्माकै नजिर पछ्याउँदै
                  सुधन गुरुङको गृह मन्त्रालयमा कमब्याक, आजै शपथ</span></h3>
            </div>
          </div>
          <div class="co-playlist">
            <button class="co-playlist-item is-active" type="button" data-date="असोज १५, २०८३" data-thumb="assets/images/np/press.jpg"
              data-youtube="M7lc1UVf-VE">
              <span class="co-playlist-thumb"><img src="assets/images/np/press.jpg" alt=""><i
                  class="bi bi-play-circle-fill"></i></span>
              <span class="co-playlist-title">जनार्दन शर्माकै नजिर पछ्याउँदै सुधन गुरुङको गृह मन्त्रालयमा कमब्याक, आजै
                शपथ</span>
            </button>
            <button class="co-playlist-item" type="button" data-date="असोज १४, २०८३" data-thumb="assets/images/np/conf.jpg" data-youtube="aqz-KE-bpKQ">
              <span class="co-playlist-thumb"><img src="assets/images/np/conf.jpg" alt=""><i
                  class="bi bi-play-circle-fill"></i></span>
              <span class="co-playlist-title">नगरप्रमुख बालेन शाहको टिम कडा रुपमा प्रस्तुत, जनप्रतिनिधिलाई समेत
                सास्ती</span>
            </button>
            <button class="co-playlist-item" type="button" data-date="असोज १२, २०८३" data-thumb="assets/images/np/nepal3.jpg" data-youtube="ScMzIvxBSi4">
              <span class="co-playlist-thumb"><img src="assets/images/np/nepal3.jpg" alt=""><i
                  class="bi bi-play-circle-fill"></i></span>
              <span class="co-playlist-title">विकटताको पहाडमा थुनिएको ताम्चा: जहाँ राज्य पुग्दैन, तर अभावले श्वास
                फेर्छ!</span>
            </button>
            <button class="co-playlist-item" type="button" data-date="असोज १४, २०८३" data-thumb="assets/images/np/flood.jpg" data-youtube="jNQXAC9IVRw">
              <span class="co-playlist-thumb"><img src="assets/images/np/flood.jpg" alt=""><i
                  class="bi bi-play-circle-fill"></i></span>
              <span class="co-playlist-title">२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह</span>
            </button>
          </div>
        </div>
      </div>
    </section>


    <!-- Video popup: opened from the video section's play button, list is built from the playlist -->
    <dialog class="co-vmodal" id="coVideoModal" aria-labelledby="coVmTitle">
      <div class="co-vm">
        <div class="co-vm-main">
          <div class="co-vm-frame" id="coVmFrame"></div>
          <div class="co-vm-info">
            <div class="co-vm-meta">
              <span class="co-vm-live"><i class="bi bi-play-btn-fill"></i> चासो TV</span>
              <span id="coVmDate"></span>
            </div>
            <h2 class="co-vm-title" id="coVmTitle"></h2>
            <div class="co-vm-actions">
              <a href="#" class="co-vm-act" aria-label="Facebook मा सेयर गर्नुहोस्"><i class="bi bi-facebook"></i></a>
              <a href="#" class="co-vm-act" aria-label="X मा सेयर गर्नुहोस्"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="co-vm-act" aria-label="WhatsApp मा सेयर गर्नुहोस्"><i class="bi bi-whatsapp"></i></a>
              <button type="button" class="co-vm-act co-vm-copy" id="coVmCopy" aria-label="लिङ्क कपी गर्नुहोस्"><i class="bi bi-link-45deg"></i><span>कपी भयो</span></button>
              <a href="#" class="co-vm-yt" id="coVmYt" target="_blank" rel="noopener"><i class="bi bi-youtube"></i> YouTube मा हेर्नुहोस्</a>
            </div>
          </div>
        </div>
        <aside class="co-vm-side">
          <div class="co-vm-side-head">
            <strong>अन्य भिडियो</strong>
            <span id="coVmCount"></span>
            <button type="button" class="co-vm-close" data-vm-close aria-label="बन्द गर्नुहोस्" autofocus><i class="bi bi-x-lg"></i></button>
          </div>
          <div class="co-vm-list" id="coVmList"></div>
        </aside>
      </div>
    </dialog>

    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="after-video">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--colornest" rel="sponsored noopener"><img class="co-cr-img"
              src="assets/images/ads/paint.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                class="co-cr-brand"><i class="bi bi-palette-fill"></i> ColorNest Paints</span><span
                class="co-cr-copy"><strong>यस दशैं घरलाई नयाँ रङ</strong><small>१०+ वर्ष टिकाउ ·
                  वाटरप्रुफ</small></span><span class="co-cr-cta">रङ छान्नुहोस् <i
                  class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>
    <!-- ================= 9. सेयर / अटो / कृषि ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-tri-cols">
          <div class="co-tri-col">
            <div class="co-section-head">
              <h2 class="co-section-title">सेयर</h2><span class="co-hatch co-hatch-sm"></span>
              <a href="#" class="co-more co-more-icon" aria-label="सेयर थप"><i class="bi bi-arrow-right"></i></a>
            </div>
            <a href="#" class="co-overlay co-tri-feature">
              <img src="assets/images/np/stock1.jpg" alt="">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">हप्ताको पहिलो दिन शेयर बजार दोहोरो अङ्कले
                    ओरालो, नेप्से १९.९२ अङ्कले घट्यो</span></h3>
              </div>
            </a>
            <div class="co-mini-list co-mini-list-sm">
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/stock2.jpg"
                    alt="नेपालको शेयर बजारमा लगातार चौथो दिन वृद्धि, कारोबार रकम ६ अर्ब ६९ करोड नाघ्यो"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">नेपालको शेयर बजारमा लगातार चौथो दिन वृद्धि, कारोबार रकम ६ अर्ब ६९
                      करोड नाघ्यो</a></h3>
                </div>
              </article>
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/stock4.jpg"
                    alt="सेयर बजार २६०० विन्दु पार, ६ अर्ब २८ करोडभन्दा बढीको कारोबार"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">सेयर बजार २६०० विन्दु पार, ६ अर्ब २८ करोडभन्दा बढीको कारोबार</a>
                  </h3>
                </div>
              </article>
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/stock3.jpg"
                    alt="शेयर बजारमा सुधार: नेप्से ९.७८ अंकले बढ्यो, कारोबार रकम ३ अर्ब ९४ करोड"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">शेयर बजारमा सुधार: नेप्से ९.७८ अंकले बढ्यो, कारोबार रकम ३ अर्ब ९४
                      करोड</a></h3>
                </div>
              </article>
            </div>
          </div>
          <div class="co-tri-col">
            <div class="co-section-head">
              <h2 class="co-section-title">अटो</h2><span class="co-hatch co-hatch-sm"></span>
              <a href="#" class="co-more co-more-icon" aria-label="अटो थप"><i class="bi bi-arrow-right"></i></a>
            </div>
            <a href="#" class="co-overlay co-tri-feature">
              <img src="assets/images/np/bike.jpg" alt="">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">चुनावका लागि ७ लाख मतदाताले उपत्यका छाड्दै,
                    ५० प्रतिशत सवारी थपियो</span></h3>
              </div>
            </a>
            <div class="co-mini-list co-mini-list-sm">
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/car.jpg"
                    alt="म्याक्स टाइगरको ‘एनर्जाइज्ड दशैं धमाका’, क्यानमै छ कार, बाइक र स्कुटर"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">म्याक्स टाइगरको ‘एनर्जाइज्ड दशैं धमाका’, क्यानमै छ कार, बाइक र
                      स्कुटर</a></h3>
                </div>
              </article>
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/traffic.jpg"
                    alt="कोरला नाकाबाट २ हजारभन्दा बढी विद्युतीय गाडी भित्रिए"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">कोरला नाकाबाट २ हजारभन्दा बढी विद्युतीय गाडी भित्रिए</a></h3>
                </div>
              </article>
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/ktm.jpg"
                    alt="१९ जनाको रगत झरेपछि पनि नरोकेर सडकमा उत्रिए युवा : कलंकी–बानेश्वरमा प्रदर्शन"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">१९ जनाको रगत झरेपछि पनि नरोकेर सडकमा उत्रिए युवा :
                      कलंकी–बानेश्वरमा प्रदर्शन</a></h3>
                </div>
              </article>
            </div>
          </div>
          <div class="co-tri-col">
            <div class="co-section-head">
              <h2 class="co-section-title">कृषि</h2><span class="co-hatch co-hatch-sm"></span>
              <a href="#" class="co-more co-more-icon" aria-label="कृषि थप"><i class="bi bi-arrow-right"></i></a>
            </div>
            <a href="#" class="co-overlay co-tri-feature">
              <img src="assets/images/np/farm1.jpg" alt="">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">यस बर्षको राष्ट्रिय धान दिवसको नारा तय</span>
                </h3>
              </div>
            </a>
            <div class="co-mini-list co-mini-list-sm">
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/farm2.jpg"
                    alt="सामाजिक सुरक्षा कोषबाट उपचार सुविधा विस्तार"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">सामाजिक सुरक्षा कोषबाट उपचार सुविधा विस्तार</a></h3>
                </div>
              </article>
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/rice2.jpg"
                    alt="ओली नआएपछि शीर्ष नेताहरुको बैठक बस्न सकेन, संसद आज नचल्ने"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">ओली नआएपछि शीर्ष नेताहरुको बैठक बस्न सकेन, संसद आज नचल्ने</a></h3>
                </div>
              </article>
              <article class="co-mini"><a href="#" class="co-mini-thumb co-img"><img src="assets/images/np/protest.jpg"
                    alt="जानकी मेडिकल कलेजद्वारा धान रोपण कार्यक्रम सम्पन्न : स्वास्थ्य सेवा र कृषिलाई जोड्दै"></a>
                <div>
                  <h3 class="co-title-sm"><a href="#">जानकी मेडिकल कलेजद्वारा धान रोपण कार्यक्रम सम्पन्न : स्वास्थ्य
                      सेवा र कृषिलाई जोड्दै</a></h3>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-wide" data-ad-slot="before-photo">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--lakebreeze" rel="sponsored noopener"><img class="co-cr-img"
              src="assets/images/ads/resort.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                class="co-cr-brand"><i class="bi bi-water"></i> Lake Breeze Resort</span><span
                class="co-cr-copy"><strong>पोखरामा परिवारसँग बिदा — २५% छुट</strong><small>पोखरी, स्पा र हिमाल
                  दृश्य</small></span><span class="co-cr-cta">अहिले बुक गर्नुहोस् <i
                  class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>
    <!-- ================= 10. फोटो फिचर (dark carousel) ================= -->
    <section class="co-section co-photo" id="photo-feature">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">फोटो फिचर</h2><span class="co-hatch"></span>
          <div class="co-carousel-nav">
            <button class="co-carousel-btn" type="button" data-dir="-1" aria-label="अघिल्लो"><i
                class="bi bi-arrow-left"></i></button>
            <button class="co-carousel-btn" type="button" data-dir="1" aria-label="अर्को"><i
                class="bi bi-arrow-right"></i></button>
          </div>
        </div>
        <div class="co-carousel" id="coPhotoCarousel">
          <a href="story.html?s=0" class="co-overlay co-photo-card">
            <img src="assets/images/np/hotel1.jpg" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ५</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">"कुलेखानी ड्यामसाईड होटल: प्राकृतिक सौन्दर्य र
                  पर्यटकको आकर्षणको केन्द्र"</span></h3>
            </div>
          </a>
          <a href="story.html?s=1" class="co-overlay co-photo-card">
            <img src="assets/images/np/hotel2.jpg" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ४</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">आन्तरिक तथा बाह्य पर्यटकको रोजाई बन्दै -
                  कुलेखानी ड्यामसाईड होटल</span></h3>
            </div>
          </a>
          <a href="story.html?s=2" class="co-overlay co-photo-card">
            <img src="assets/images/np/nepal1.jpg" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ५</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">मुस्ताङ, म्याग्दी, बागलुङ र पर्वतमा पर्यटकको
                  भीड</span></h3>
            </div>
          </a>
          <a href="story.html?s=3" class="co-overlay co-photo-card">
            <img src="assets/images/np/hotelnight.jpg" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ४</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै,
                  रोयल भिल्ला रिर्सोट</span></h3>
            </div>
          </a>
          <a href="story.html?s=4" class="co-overlay co-photo-card">
            <img src="assets/images/np/nepal3.jpg" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ३</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">बौद्धका प्रार्थना चक्र: आस्था र सम्पदाको जीवन्त
                  झलक</span></h3>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- ================= 11. छुटाउनुभयो कि ? ================= -->
    <section class="co-section co-missed">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">छुटाउनुभयो कि ?</h2><span class="co-hatch"></span>
        </div>
        <div class="row g-4">
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="assets/images/np/group.jpg"
                  alt="आदिवासी जनजातिको जलवायु तथा वन शासनमा सहभागिता विषयक प्रदेशस्तरीय कार्यशाला सम्पन्न"><span
                  class="co-tag co-tag-green co-tag-abs">समाज</span></a>
              <h3 class="co-title-md"><a href="#">आदिवासी जनजातिको जलवायु तथा वन शासनमा सहभागिता विषयक प्रदेशस्तरीय
                  कार्यशाला सम्पन्न</a></h3>
            </article>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="assets/images/np/man1.jpg"
                  alt="खै कहाँ छन् जिवी राई ? किन खोज्दैनन् सरकार ?"><span
                  class="co-tag co-tag-red co-tag-abs">समाचार</span></a>
              <h3 class="co-title-md"><a href="#">खै कहाँ छन् जिवी राई ? किन खोज्दैनन् सरकार ?</a></h3>
            </article>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="assets/images/np/flood.jpg"
                  alt="२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह"><span
                  class="co-tag co-tag-blue co-tag-abs">मौसम</span></a>
              <h3 class="co-title-md"><a href="#">२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह</a></h3>
            </article>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="assets/images/np/hotelnight.jpg"
                  alt="पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै, रोयल भिल्ला रिर्सोट"><span
                  class="co-tag co-tag-amber co-tag-abs">पर्यटन</span></a>
              <h3 class="co-title-md"><a href="#">पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै, रोयल भिल्ला रिर्सोट</a>
              </h3>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="before-footer">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--novanet" rel="sponsored noopener"><img class="co-cr-img"
              src="assets/images/ads/router.jpg" alt="" loading="lazy"><span class="co-cr-in"><span
                class="co-cr-brand"><i class="bi bi-wifi"></i> NovaNet फाइबर</span><span class="co-cr-copy"><strong>३००
                  Mbps इन्टरनेट, मासिक रु. ९९९ मात्र</strong><small>निःशुल्क जडान · २४ घण्टा सेवा</small></span><span
                class="co-cr-cta">अहिले जडान गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>
  </main>
@endsection
