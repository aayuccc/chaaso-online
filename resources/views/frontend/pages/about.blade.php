@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])
@section('main-section')
  <main class="co-main co-page">

    <!-- ================= PAGE HEADER ================= -->
    @include('frontend.common.banner')

    <!-- ================= STORY ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-ab-story">
          <div class="co-ab-story-text">
            <span class="co-pg-eyebrow"><i class="bi bi-bookmark-star"></i> हाम्रो कथा</span>
            <h2 class="co-pg-lead">समाचार केवल सूचना होइन, <em>सरोकार</em> हो।</h2>
            <p>चासो अनलाइन २०७७ सालमा सूचना विभागमा दर्ता भई सुरु भएको डिजिटल समाचार पोर्टल हो। राजनीति, अर्थतन्त्र, समाज, स्वास्थ्य, प्रविधि, खेलकुददेखि मनोरञ्जनसम्मका विषयलाई हामी छिटो, भरपर्दो र सरल भाषामा प्रस्तुत गर्छौं।</p>
            <p>काठमाडौंको नयाँ बानेश्वरस्थित न्युजरुमबाट सञ्चालित हाम्रो टिम देशभरका संवाददातासँग मिलेर गाउँदेखि सिंहदरबारसम्मका आवाजलाई समान महत्त्व दिन्छ। हाम्रो लक्ष्य स्पष्ट छ — पाठकलाई सही सूचना दिनु र सार्वजनिक बहसलाई स्वस्थ बनाउनु।</p>
            <div class="co-ab-sign">
              <img src="assets/images/np/woman1.jpg" alt="" width="52" height="52" loading="lazy">
              <div>
                <strong>Amrita Bhandari</strong>
                <span>प्रधान सम्पादक</span>
              </div>
            </div>
          </div>
          <div class="co-ab-mosaic">
            <div class="co-img co-ab-mosaic-a"><img src="assets/images/np/team.jpg" alt="चासो अनलाइनको न्युजरुम" loading="lazy"></div>
            <div class="co-img co-ab-mosaic-b"><img src="assets/images/np/press.jpg" alt="पत्रकार सम्मेलनमा रिपोर्टिङ" loading="lazy"></div>
            <div class="co-img co-ab-mosaic-c"><img src="assets/images/np/conf.jpg" alt="सम्पादकीय बैठक" loading="lazy"></div>
            <div class="co-ab-badge">
              <i class="bi bi-patch-check-fill"></i>
              <span><small>सूचना विभाग दर्ता नं.</small>2423/077-78</span>
            </div>
          </div>
        </div>

        <ul class="co-ab-figures mt-5">
          <li><strong>२४/७</strong><span>लगातार अपडेट हुने न्युजरुम</span></li>
          <li><strong>७७</strong><span>जिल्लासम्म पुग्ने संवाददाता सञ्जाल</span></li>
          <li><strong>१०+</strong><span>विषयगत डेस्क र श्रेणी</span></li>
          <li><strong>१००%</strong><span>प्रकाशनअघि तथ्य जाँच</span></li>
        </ul>
      </div>
    </section>

    <!-- ================= VALUES ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">हाम्रा मूल्य</h2><span class="co-hatch"></span>
        </div>
        <div class="co-ab-values">
          <article class="co-ab-value">
            <span class="co-ab-value-no">०१</span>
            <span class="co-pg-ic"><i class="bi bi-shield-check"></i></span>
            <h3>तथ्यमा आधारित</h3>
            <p>हरेक समाचार कम्तीमा दुई स्वतन्त्र स्रोतबाट पुष्टि गरेर मात्र प्रकाशन गरिन्छ।</p>
          </article>
          <article class="co-ab-value">
            <span class="co-ab-value-no">०२</span>
            <span class="co-pg-ic"><i class="bi bi-symmetry-vertical"></i></span>
            <h3>निष्पक्ष र सन्तुलित</h3>
            <p>कुनै दल, समूह वा व्यापारिक स्वार्थप्रति झुकाव नराखी सबै पक्षको कुरा समेटिन्छ।</p>
          </article>
          <article class="co-ab-value">
            <span class="co-ab-value-no">०३</span>
            <span class="co-pg-ic"><i class="bi bi-people"></i></span>
            <h3>जनसरोकार पहिलो</h3>
            <p>सनसनी होइन, पाठकको दैनिक जीवनसँग जोडिएका विषयलाई प्राथमिकता दिइन्छ।</p>
          </article>
          <article class="co-ab-value">
            <span class="co-ab-value-no">०४</span>
            <span class="co-pg-ic"><i class="bi bi-arrow-repeat"></i></span>
            <h3>पारदर्शी सुधार</h3>
            <p>गल्ती भए खुला रूपमा स्वीकार गरी सुधार र स्पष्टीकरण सार्वजनिक गरिन्छ।</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ================= EDITORIAL PROCESS ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">समाचार कसरी बन्छ?</h2><span class="co-hatch"></span>
        </div>
        <ol class="co-ab-steps">
          <li>
            <span class="co-ab-step-dot"><i class="bi bi-broadcast"></i></span>
            <h3>सूचना संकलन</h3>
            <p>संवाददाता, पाठकका टिप र आधिकारिक स्रोतबाट सूचना आउँछ।</p>
          </li>
          <li>
            <span class="co-ab-step-dot"><i class="bi bi-search"></i></span>
            <h3>तथ्य जाँच</h3>
            <p>स्रोत, तथ्यांक र तस्बिरको सत्यता छुट्टै डेस्कले पुष्टि गर्छ।</p>
          </li>
          <li>
            <span class="co-ab-step-dot"><i class="bi bi-pencil-square"></i></span>
            <h3>सम्पादन</h3>
            <p>भाषा, सन्दर्भ र सन्तुलन सम्पादकले दोस्रो पटक हेर्छन्।</p>
          </li>
          <li>
            <span class="co-ab-step-dot"><i class="bi bi-send-check"></i></span>
            <h3>प्रकाशन</h3>
            <p>स्पष्ट शीर्षक र स्रोत उल्लेखसहित पाठकसम्म पुग्छ।</p>
          </li>
        </ol>
      </div>
    </section>

    <!-- ================= COVERAGE ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">हामी के कभर गर्छौं</h2><span class="co-hatch"></span>
        </div>
        <div class="co-ab-cover">
          <a href="#"><i class="bi bi-newspaper"></i><span>समाचार</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="category.html"><i class="bi bi-bank"></i><span>राजनीति</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-graph-up-arrow"></i><span>अर्थ वाणिज्य</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-cup-hot"></i><span>जीवनशैली</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-globe2"></i><span>विश्वव्यापी</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-heart-pulse"></i><span>स्वास्थ्य</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-cpu"></i><span>प्रविधि</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-mortarboard"></i><span>शिक्षा</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-trophy"></i><span>खेलकुद</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-grid"></i><span>विविध</span><i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>
    </section>

    <!-- ================= EDITOR'S NOTE + NEXT STEPS ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-ab-close">
          <blockquote class="co-quote-card co-ab-quote">
            <i class="bi bi-quote" aria-hidden="true"></i>
            <p>हामी पाठकको विश्वासलाई सबैभन्दा ठूलो पूँजी मान्छौं। छिटो हुनु राम्रो हो, तर सही हुनु अनिवार्य हो।</p>
            <cite class="co-ab-cite">
              <img src="assets/images/np/woman1.jpg" alt="" width="44" height="44" loading="lazy">
              <span><strong>Amrita Bhandari</strong>प्रधान सम्पादक, चासो अनलाइन</span>
            </cite>
          </blockquote>
          <div class="co-pg-links">
            <a href="team.html" class="co-pg-link">
              <span class="co-pg-ic"><i class="bi bi-people"></i></span>
              <span><strong>हाम्रो टिम</strong><small>न्युजरुमका अनुहारहरूलाई चिन्नुहोस्</small></span>
              <i class="bi bi-arrow-right"></i>
            </a>
            <a href="contact.html" class="co-pg-link">
              <span class="co-pg-ic"><i class="bi bi-chat-dots"></i></span>
              <span><strong>सम्पर्क</strong><small>समाचार टिप, विज्ञापन वा सुझाव पठाउनुहोस्</small></span>
              <i class="bi bi-arrow-right"></i>
            </a>
            <a href="#" class="co-pg-link">
              <span class="co-pg-ic"><i class="bi bi-megaphone"></i></span>
              <span><strong>विज्ञापन</strong><small>लाखौं पाठकसम्म तपाईंको ब्रान्ड पुर्‍याउनुहोस्</small></span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection