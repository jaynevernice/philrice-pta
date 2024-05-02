@component('mail::message')
Hello {{ $user->name }},

<p>It seems you've forgotten your password. No worries, it happens to the best of us! To reset your password and regain access to your email account, please click the button below:</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Password
@endcomponent

{{-- <p>If you did not request this password reset, please ignore this email. Your account security is important to us.</p> --}}
<p>In case you have any issues recovering your password, please contact philrice.tmsd@gmail.com</p>

{{-- Thanks,<br> --}}
-{{ config('app.name') }}

@endcomponent