<x-mail::message>
# Introduction
<img src="http://127.0.0.1:8000/assets/images/WhatsApp_Image_2022-11-05_at_10.22.15_PM-removebg-preview.png" style="text-align:center">

مرحبا بك فى موقع سكنى لقد تم تعيينك كمدير يمكنك تسجيل الدخول من خلال
الأيميل وكلمة المرور الخاص بك 

:الأيميل  {{ $username }}
:كلمة المرور {{ $password }}

<x-mail::button :url="'http://127.0.0.1:8000/'" color="warning">
زيارة الموقع
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

