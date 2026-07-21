<x-mail::message>
@component('mail::message')
# Hello!

You are receiving this email because we received a password reset request for your account.

<x-mail::button :url="route('reset.password.get', $token)">
Reset Password
</x-mail::button>

If you did not request a password reset, no further action is required.

Regards,<br>
Arsa Consultant

<hr>
If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: {{ url(route('reset.password.get', $token)) }}
</x-mail::message>
