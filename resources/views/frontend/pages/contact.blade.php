@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])
@section('main-section')
  <main class="co-main co-page">

    <!-- ================= PAGE HEADER ================= -->
    @include('frontend.common.banner')

    <!-- ================= CHANNELS ================= -->
    <section class="co-section co-ct-channels-wrap">
      <div class="container co-container">
        <div class="co-ct-channels">
          <a href="mailto:chaasogobalmedia9@gmail.com?subject=समाचार टिप" class="co-ct-channel">
            <span class="co-pg-ic"><i class="bi bi-lightning-charge"></i></span>
            <h2>समाचार टिप</h2>
            <p>तपाईंको वरिपरि भइरहेको घटना वा जानकारी गोप्य रूपमै पठाउनुहोस्।</p>
            <span class="co-ct-channel-cta">टिप पठाउनुहोस् <i class="bi bi-arrow-right"></i></span>
          </a>
          <a href="mailto:chaasogobalmedia9@gmail.com?subject=विज्ञापन" class="co-ct-channel">
            <span class="co-pg-ic"><i class="bi bi-megaphone"></i></span>
            <h2>विज्ञापन</h2>
            <p>ब्यानर, प्रायोजित सामग्री वा अभियानका लागि दर र प्याकेज सोध्नुहोस्।</p>
            <span class="co-ct-channel-cta">दर सोध्नुहोस् <i class="bi bi-arrow-right"></i></span>
          </a>
          <a href="mailto:chaasogobalmedia9@gmail.com?subject=सुधार अनुरोध" class="co-ct-channel">
            <span class="co-pg-ic"><i class="bi bi-flag"></i></span>
            <h2>सुधार / गुनासो</h2>
            <p>प्रकाशित सामग्रीमा त्रुटि देखे लिङ्कसहित जानकारी दिनुहोस्।</p>
            <span class="co-ct-channel-cta">जानकारी दिनुहोस् <i class="bi bi-arrow-right"></i></span>
          </a>
        </div>
      </div>
    </section>

    <!-- ================= FORM + INFO ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-ct-grid">

          <form class="co-ct-form" id="coContactForm" novalidate>
            <div class="co-ct-form-head">
              <h2>सन्देश पठाउनुहोस्</h2>
              <p><span class="co-ct-req">*</span> चिन्ह भएका विवरण अनिवार्य छन्।</p>
            </div>

            <fieldset class="co-ct-topics">
              <legend>विषय</legend>
              <label><input type="radio" name="topic" value="general" checked><span><i class="bi bi-chat-dots"></i> सामान्य</span></label>
              <label><input type="radio" name="topic" value="tip"><span><i class="bi bi-lightning-charge"></i> समाचार टिप</span></label>
              <label><input type="radio" name="topic" value="ads"><span><i class="bi bi-megaphone"></i> विज्ञापन</span></label>
              <label><input type="radio" name="topic" value="fix"><span><i class="bi bi-flag"></i> सुधार / गुनासो</span></label>
            </fieldset>

            <div class="co-ct-row">
              <div class="co-ct-field">
                <label for="ctName">पूरा नाम <span class="co-ct-req">*</span></label>
                <input id="ctName" name="name" type="text" autocomplete="name" placeholder="तपाईंको नाम" required>
                <small class="co-ct-err">कृपया नाम लेख्नुहोस्।</small>
              </div>
              <div class="co-ct-field">
                <label for="ctEmail">इमेल <span class="co-ct-req">*</span></label>
                <input id="ctEmail" name="email" type="email" autocomplete="email" placeholder="you@example.com" required>
                <small class="co-ct-err">मान्य इमेल ठेगाना लेख्नुहोस्।</small>
              </div>
            </div>

            <div class="co-ct-row">
              <div class="co-ct-field">
                <label for="ctPhone">फोन <span class="co-ct-opt">(ऐच्छिक)</span></label>
                <input id="ctPhone" name="phone" type="tel" autocomplete="tel" placeholder="९८XXXXXXXX">
              </div>
              <div class="co-ct-field">
                <label for="ctSubject">शीर्षक <span class="co-ct-req">*</span></label>
                <input id="ctSubject" name="subject" type="text" placeholder="छोटो शीर्षक" required>
                <small class="co-ct-err">शीर्षक लेख्नुहोस्।</small>
              </div>
            </div>

            <div class="co-ct-field">
              <label for="ctMsg">सन्देश <span class="co-ct-req">*</span></label>
              <textarea id="ctMsg" name="message" rows="6" maxlength="1000" placeholder="तपाईंको कुरा यहाँ लेख्नुहोस्…" required minlength="20"></textarea>
              <div class="co-ct-field-foot">
                <small class="co-ct-err">कम्तीमा २० अक्षरको सन्देश लेख्नुहोस्।</small>
                <small class="co-ct-count" id="ctCount">0 / 1000</small>
              </div>
            </div>

            <label class="co-ct-check">
              <input type="checkbox" name="consent" required>
              <span>मेरो विवरण यो सन्देशको जवाफ दिन मात्र प्रयोग गर्न सहमत छु। <a href="#">प्राइवेसी पोलिसी</a></span>
            </label>

            <div class="co-ct-submit">
              <button type="submit" class="co-btn"><i class="bi bi-send"></i> सन्देश पठाउनुहोस्</button>
              <p class="co-ct-note"><i class="bi bi-lock"></i> तपाईंको पहिचान गोप्य राखिन्छ।</p>
            </div>

            <div class="co-ct-done" id="coContactDone" hidden>
              <span class="co-pg-ic"><i class="bi bi-check2"></i></span>
              <div>
                <strong>धन्यवाद! सन्देश प्राप्त भयो।</strong>
                <p>हाम्रो टिमले छिट्टै तपाईंलाई इमेलमार्फत जवाफ दिनेछ।</p>
              </div>
            </div>
          </form>

          <aside class="co-ct-side">
            <div class="co-ct-info">
              <h2>न्युजरुम</h2>
              <ul>
                <li>
                  <span class="co-pg-ic"><i class="bi bi-geo-alt"></i></span>
                  <div><small>ठेगाना</small>Newbaneshwar 10, Kathmandu, Nepal 4460</div>
                </li>
                <li>
                  <span class="co-pg-ic"><i class="bi bi-envelope"></i></span>
                  <div><small>इमेल</small><a href="mailto:chaasogobalmedia9@gmail.com">chaasogobalmedia9@gmail.com</a></div>
                  <button type="button" class="co-ct-copy" data-copy-text="chaasogobalmedia9@gmail.com" aria-label="इमेल कपी गर्नुहोस्"><i class="bi bi-copy"></i><span>कपी भयो</span></button>
                </li>
                <li>
                  <span class="co-pg-ic"><i class="bi bi-clock"></i></span>
                  <div><small>कार्यालय समय</small>आइतबार – शुक्रबार, बिहान १० – साँझ ६</div>
                </li>
                <li>
                  <span class="co-pg-ic"><i class="bi bi-patch-check"></i></span>
                  <div><small>सूचना विभाग दर्ता नं.</small>2423/077-78</div>
                </li>
              </ul>
              <div class="co-ct-follow">
                <span>फलो गर्नुहोस्</span>
                <div class="co-tm-social">
                  <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
            <div class="co-ct-map">
              <iframe title="चासो अनलाइन कार्यालयको नक्सा" src="https://maps.google.com/maps?q=New%20Baneshwor%2C%20Kathmandu&z=15&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <a href="https://maps.google.com/?q=New+Baneshwor,+Kathmandu" target="_blank" rel="noopener" class="co-ct-map-link"><i class="bi bi-sign-turn-right"></i> दिशा हेर्नुहोस्</a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- ================= FAQ ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">प्रायः सोधिने प्रश्न</h2><span class="co-hatch"></span>
        </div>
        <div class="co-ct-faq">
          <details class="co-ct-q" open>
            <summary>समाचार टिप पठाउँदा मेरो नाम खुल्छ?<i class="bi bi-plus-lg"></i></summary>
            <p>खुल्दैन। स्रोतको गोपनीयता हाम्रो पत्रकारिताको मूल सिद्धान्त हो। तपाईंको अनुमतिबिना नाम वा सम्पर्क विवरण कहीँ प्रकाशित गरिँदैन।</p>
          </details>
          <details class="co-ct-q">
            <summary>प्रकाशित समाचारमा त्रुटि भए के गर्ने?<i class="bi bi-plus-lg"></i></summary>
            <p>समाचारको लिङ्क र त्रुटिको विवरणसहित “सुधार / गुनासो” विषय छानेर सन्देश पठाउनुहोस्। पुष्टि भएपछि सुधार गरी नोट राखिन्छ।</p>
          </details>
          <details class="co-ct-q">
            <summary>विज्ञापनको दर कति छ?<i class="bi bi-plus-lg"></i></summary>
            <p>स्थान, आकार र अवधि अनुसार दर फरक हुन्छ। “विज्ञापन” विषयमा सन्देश पठाउनुभयो भने हाम्रो बजार टिमले पूरा प्याकेज पठाउनेछ।</p>
          </details>
          <details class="co-ct-q">
            <summary>लेख वा विचार प्रकाशनका लागि पठाउन सकिन्छ?<i class="bi bi-plus-lg"></i></summary>
            <p>सकिन्छ। ८००–१२०० शब्दको मौलिक लेख, छोटो परिचय र तस्बिरसहित इमेल गर्नुहोस्। सम्पादकीय टिमले छनोट गरेमा जानकारी दिइनेछ।</p>
          </details>
        </div>
      </div>
    </section>
  </main>
@endsection