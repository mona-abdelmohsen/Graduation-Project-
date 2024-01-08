<x-mail::message>

مرحبا بك فى موقع سكنى لقد تم تعيينك كمدير يمكنك تسجيل الدخول من خلال
الأيميل وكلمة المرور الخاص بك

:الأيميل  {{ $username }}
<br>
:كلمة المرور {{ $password }}

<x-mail::button :url="'http://127.0.0.1:8000/'" color="warning">
زيارة الموقع
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

