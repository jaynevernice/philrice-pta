@component('mail::message')
Hello {{ $new_user->name }},

<p>Welcome to the {{ config('app.name') }}!</p>
<br>
<p>You now have an account on the {{ config('app.name') }} which organizes and manages training-related information for the Philippine Rice Research Institute.</p>
<br>
<p>To confirm your account's creation, all you need to do is click on the button below:</p>
<br>
{{-- <p>Here is your PhilRice ID: <strong>{{ $new_user->philrice_id }}</strong></p> --}}

@component('mail::button', ['url' => url('verify/'.$new_user->remember_token)])
Verify Account
@endcomponent

<p>If you have any questions or concerns, contact philrice.tmsd@gmail.com</p>

Thanks,<br>
{{ config('app.name') }}

@endcomponent