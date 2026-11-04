<?php

use App\Helpers\SettingHelper;
use App\Mail\ContactMail;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

new class extends Component {
    public $contactsubject = '';
    public $name = '';
    public $email = '';
    public $phone = '';
    public $msgtitle = '';
    public $message = '';
    public $successMessage = '';
    public $errorMessage = '';
    public $messageType = ''; // 'success' or 'error'
    public $showMessage = false;

    protected $rules = [
        'contactsubject' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'msgtitle' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ];

    protected $messages = [
        'contactsubject.required' => 'Please enter a subject for your message.',
        'contactsubject.max' => 'The subject cannot exceed 255 characters.',
        'name.required' => 'Please enter your full name.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'phone.required' => 'Please enter your phone number.',
        'msgtitle.required' => 'Please enter a message title.',
        'msgtitle.max' => 'The message title cannot exceed 255 characters.',
        'message.required' => 'Please enter your message.',
        'message.max' => 'Your message cannot exceed 2000 characters.',
    ];

    public function submit()
    {
        $validated = $this->validate();

        $contactData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'msgtitle' => $validated['msgtitle'],
            'message' => $validated['message'],
            'contactsubject' => $validated['contactsubject'],
        ];

        Post::create([
            'user_id' => 1,
            'post_title' => 'Contact Form',
            'post_content' => json_encode($contactData),
            'slug' => 'contact-form-' . uniqid(),
            'post_status' => 'publish',
            'post_type' => 'contact-form',
            'menu_order' => 0,
        ]);

        $notificationFailed = false;
        try {
            $adminEmail = SettingHelper::get_field('admin_email_address') ?? 'aayusha@webtech.com.np';
            Mail::to($adminEmail)->send(new ContactMail($contactData));
        } catch (\Throwable $exception) {
            Log::error('Contact form notification email could not be sent.', [
                'email' => $contactData['email'],
                'exception' => $exception,
            ]);
            $notificationFailed = true;
        }

        $this->successMessage = $notificationFailed
            ? 'Your message was received, but our team notification could not be sent. We will follow up with you.'
            : 'धन्यवाद! सन्देश प्राप्त भयो। हाम्रो टिमले छिट्टै तपाईंलाई इमेलमार्फत जवाफ दिनेछ।';
        $this->messageType = $notificationFailed ? 'warning' : 'success';
        $this->errorMessage = '';
        $this->showMessage = true;

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->travelers = '';
        $this->message = '';
    }
};
?>          
          @php
          $contactsubjects =['सामान्य','समाचार','विज्ञापन','सुधार / गुनासो'];
          @endphp
          <form class="co-ct-form" id="coContactForm" wire:submit="submit" novalidate>
            @if ($showMessage)
                <div class="alert alert-{{ $messageType }}" role="status">
                  {{ $successMessage }}
                </div>
            @endif
            <div class="co-ct-form-head">
              <h2>सन्देश पठाउनुहोस्</h2>
              <p><span class="co-ct-req">*</span> चिन्ह भएका विवरण अनिवार्य छन्।</p>
            </div>

            <fieldset class="co-ct-topics" wire:model="contactsubject">
              <legend>विषय</legend>
              @foreach ($contactsubjects as $subject)
              <label><input type="radio" name="topic" value="{{ $subject }}" {{ $contactsubject === $subject ? 'checked' : '' }}><span><i class="bi bi-chat-dots"></i> {{ $subject }}</span></label>
              @endforeach
            </fieldset>

            <div class="co-ct-row">
              <div class="co-ct-field">
                <label for="ctName">पूरा नाम <span class="co-ct-req">*</span></label>
                <input id="ctName" name="name" type="text" autocomplete="name" placeholder="तपाईंको नाम" wire:model="name" required>
                <small class="co-ct-err">कृपया नाम लेख्नुहोस्।</small>
                @error('name')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
              </div>
              <div class="co-ct-field">
                <label for="ctEmail">इमेल <span class="co-ct-req">*</span></label>
                <input id="ctEmail" name="email" type="email" autocomplete="email" placeholder="you@example.com" wire:model="email" required>
                <small class="co-ct-err">मान्य इमेल ठेगाना लेख्नुहोस्।</small>
                @error('email')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="co-ct-row">
              <div class="co-ct-field">
                <label for="ctPhone">फोन <span class="co-ct-opt">(ऐच्छिक)</span></label>
                <input id="ctPhone" name="phone" type="tel" autocomplete="tel" wire:model="phone" placeholder="९८XXXXXXXX">
                @error('phone')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
              </div>
              <div class="co-ct-field">
                <label for="ctSubject">शीर्षक <span class="co-ct-req">*</span></label>
                <input id="ctSubject" name="subject" type="text" wire:model="msgtitle" placeholder="छोटो शीर्षक" required>
                <small class="co-ct-err">शीर्षक लेख्नुहोस्।</small>
                @error('msgtitle')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="co-ct-field">
              <label for="ctMsg">सन्देश <span class="co-ct-req">*</span></label>
              <textarea id="ctMsg" name="message" rows="6" maxlength="1000" wire:model="message" placeholder="तपाईंको कुरा यहाँ लेख्नुहोस्…" required minlength="20"></textarea>
              <div class="co-ct-field-foot">
                <small class="co-ct-err">कम्तीमा २० अक्षरको सन्देश लेख्नुहोस्।</small>
                <small class="co-ct-count" id="ctCount">0 / 1000</small>
              </div>
                @error('message')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <label class="co-ct-check">
              <input type="checkbox" name="consent" required>
              <span>मेरो विवरण यो सन्देशको जवाफ दिन मात्र प्रयोग गर्न सहमत छु। <a href="#">प्राइवेसी पोलिसी</a></span>
            </label>

            <div class="co-ct-submit">
              <button type="submit" class="co-btn"><i class="bi bi-send"></i> सन्देश पठाउनुहोस्</button>
              <p class="co-ct-note"><i class="bi bi-lock"></i> तपाईंको पहिचान गोप्य राखिन्छ।</p>
            </div>

            <span wire:loading class="text-center align-self-center">
                <svg width="20" height="20" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="5" cy="5" r="4" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-dasharray="12" stroke-dashoffset="12">
                        <animate attributeName="stroke-dashoffset" values="0;24" dur="1s"
                            repeatCount="indefinite" />
                    </circle>
                </svg>
            </span>

            <!-- <div class="co-ct-done" id="coContactDone" hidden>
              <span class="co-pg-ic"><i class="bi bi-check2"></i></span>
              <div>
                
              </div>
            </div> -->
          </form>