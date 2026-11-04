<h1>New Contact Form Submission</h1>
<p><strong>Contact Subject:</strong> {{ $contactData['contactsubject'] }}</p>
<p><strong>Name:</strong> {{ $contactData['name'] }}</p>
<p><strong>Email:</strong> {{ $contactData['email'] }}</p>
<p><strong>Phone:</strong> {{ $contactData['phone'] }}</p>
<p><strong>Subject:</strong> {{ $contactData['msgtitle'] ?: 'Not specified' }}</p>
<p><strong>Message:</strong></p>
<p style="white-space: pre-line;">{{ $contactData['message'] }}</p>
