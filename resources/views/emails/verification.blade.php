@component('mail::message')
# Verifikasi Email

Kode verifikasi Anda adalah: {{ $verificationCode }}

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent