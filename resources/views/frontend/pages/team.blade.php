@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])
@section('main-section')
  <main class="co-main co-page">

    <!-- ================= PAGE HEADER ================= -->
    @include('frontend.common.banner')

    <!-- ================= LEADERSHIP ================= -->
    <section class="co-section">
      <div class="container co-container">
        <article class="co-tm-lead">
          <div class="co-img co-tm-lead-photo"><img src="assets/images/np/woman1.jpg" alt="Amrita Bhandari"></div>
          <div class="co-tm-lead-body">
            <span class="co-pg-eyebrow"><i class="bi bi-award"></i> नेतृत्व</span>
            <h2 class="co-tm-lead-name">Amrita Bhandari</h2>
            <span class="co-tm-lead-role">प्रधान सम्पादक</span>
            <p>डेढ दशकभन्दा लामो पत्रकारिता अनुभव भएकी भण्डारी चासो अनलाइनको सम्पादकीय नीति र न्युजरुम सञ्चालनको नेतृत्व गर्छिन्। राजनीति, लैंगिक समानता र सुशासनका विषयमा उनका रिपोर्ट चर्चित छन्।</p>
            <ul class="co-tm-lead-facts">
              <li><i class="bi bi-briefcase"></i> १५+ वर्ष पत्रकारितामा</li>
              <li><i class="bi bi-pen"></i> सम्पादकीय नीति र गुणस्तर</li>
              <li><i class="bi bi-translate"></i> नेपाली, अंग्रेजी</li>
            </ul>
            <div class="co-tm-lead-foot">
              <a href="mailto:chaasogobalmedia9@gmail.com" class="co-btn"><i class="bi bi-envelope"></i> सम्पर्क गर्नुहोस्</a>
              <div class="co-tm-social">
                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>

    <!-- ================= NEWSROOM ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head co-tm-head">
          <h2 class="co-section-title">न्युजरुम</h2><span class="co-hatch"></span>
          <div class="co-tm-filter" role="group" aria-label="डेस्क अनुसार छान्नुहोस्">
            <button type="button" class="is-active" aria-pressed="true" data-desk="all">सबै</button>
            <button type="button" aria-pressed="false" data-desk="edit">सम्पादकीय</button>
            <button type="button" aria-pressed="false" data-desk="report">रिपोर्टिङ</button>
            <button type="button" aria-pressed="false" data-desk="digital">डिजिटल</button>
            <button type="button" aria-pressed="false" data-desk="manage">व्यवस्थापन</button>
          </div>
        </div>

        <div class="co-tm-grid" id="coTeamGrid">
          <article class="co-tm-card" data-desk="edit">
            <div class="co-img co-tm-photo"><img src="assets/images/np/man2.jpg" alt="रमेश अधिकारी" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">सम्पादकीय</span>
              <h3>रमेश अधिकारी</h3>
              <p>कार्यकारी सम्पादक</p>
              <div class="co-tm-social"><a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="edit">
            <div class="co-img co-tm-photo"><img src="assets/images/p1.jpg" alt="सुजन श्रेष्ठ" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">सम्पादकीय</span>
              <h3>सुजन श्रेष्ठ</h3>
              <p>समाचार सम्पादक</p>
              <div class="co-tm-social"><a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="report">
            <div class="co-img co-tm-photo"><img src="assets/images/w2.jpg" alt="प्रतिभा गुरुङ" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">रिपोर्टिङ</span>
              <h3>प्रतिभा गुरुङ</h3>
              <p>वरिष्ठ संवाददाता · राजनीति</p>
              <div class="co-tm-social"><a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="report">
            <div class="co-img co-tm-photo"><img src="assets/images/p2.jpg" alt="विकास थापा" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">रिपोर्टिङ</span>
              <h3>विकास थापा</h3>
              <p>संवाददाता · अर्थ वाणिज्य</p>
              <div class="co-tm-social"><a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="report">
            <div class="co-img co-tm-photo"><img src="assets/images/p3.jpg" alt="अनिल राई" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">रिपोर्टिङ</span>
              <h3>अनिल राई</h3>
              <p>संवाददाता · खेलकुद</p>
              <div class="co-tm-social"><a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="report">
            <div class="co-img co-tm-photo"><img src="assets/images/np/man1.jpg" alt="दिनेश पौडेल" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">रिपोर्टिङ</span>
              <h3>दिनेश पौडेल</h3>
              <p>संवाददाता · स्वास्थ्य र शिक्षा</p>
              <div class="co-tm-social"><a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="digital">
            <div class="co-img co-tm-photo"><img src="assets/images/np/oldman.jpg" alt="हरि कार्की" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">डिजिटल</span>
              <h3>हरि कार्की</h3>
              <p>फोटो पत्रकार</p>
              <div class="co-tm-social"><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="digital">
            <div class="co-img co-tm-photo"><img src="assets/images/w1.jpg" alt="सृष्टि महर्जन" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">डिजिटल</span>
              <h3>सृष्टि महर्जन</h3>
              <p>सोसल मिडिया र भिडियो</p>
              <div class="co-tm-social"><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="digital">
            <div class="co-img co-tm-photo"><img src="assets/images/np/man3.jpg" alt="प्रकाश भट्ट" loading="lazy"></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">डिजिटल</span>
              <h3>प्रकाश भट्ट</h3>
              <p>वेब तथा प्रविधि प्रमुख</p>
              <div class="co-tm-social"><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
          <article class="co-tm-card" data-desk="manage">
            <div class="co-tm-photo co-tm-initials" aria-hidden="true"><span>सक</span></div>
            <div class="co-tm-info">
              <span class="co-tm-desk">व्यवस्थापन</span>
              <h3>सरिता केसी</h3>
              <p>विज्ञापन तथा बजार व्यवस्थापक</p>
              <div class="co-tm-social"><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a><a href="#" aria-label="इमेल"><i class="bi bi-envelope"></i></a></div>
            </div>
          </article>
        </div>
        <p class="co-tm-empty" id="coTeamEmpty" hidden>यस डेस्कमा अहिले कुनै सदस्य छैनन्।</p>
      </div>
    </section>

    <!-- ================= JOIN ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-tm-join">
          <div class="co-tm-join-text">
            <span class="co-pg-eyebrow"><i class="bi bi-stars"></i> करियर</span>
            <h2 class="co-pg-lead">हाम्रो टिममा <em>जोडिनुहोस्</em></h2>
            <p>जिज्ञासु, तथ्यप्रति इमानदार र कथा भन्न रुचाउने साथीहरूको खोजीमा छौं। तलका पदमा रुचि भए बायोडाटा र कामका नमुना इमेल गर्नुहोस्।</p>
            <a href="mailto:chaasogobalmedia9@gmail.com?subject=करियर" class="co-btn"><i class="bi bi-send"></i> आवेदन पठाउनुहोस्</a>
          </div>
          <ul class="co-tm-jobs">
            <li>
              <div><strong>प्रदेश संवाददाता</strong><span><i class="bi bi-geo-alt"></i> कोशी / लुम्बिनी</span></div>
              <span class="co-tm-job-type">पूर्णकालीन</span>
            </li>
            <li>
              <div><strong>भिडियो सम्पादक</strong><span><i class="bi bi-geo-alt"></i> काठमाडौं</span></div>
              <span class="co-tm-job-type">पूर्णकालीन</span>
            </li>
            <li>
              <div><strong>पत्रकारिता इन्टर्न</strong><span><i class="bi bi-geo-alt"></i> काठमाडौं</span></div>
              <span class="co-tm-job-type">३ महिना</span>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </main>
@endsection