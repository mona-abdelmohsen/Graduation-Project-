
<x-mail::message>
<img src="http://127.0.0.1:8000/assets/images/logo sakany.png" style="text-align:center">
<h6>لقد تم الأطلاع على مشكلتك ونقترح الحل الأتى </h6>

<div >
    <p class="mb-0">{{ $msg }}</p>
</div>
<x-mail::button :url="'http://127.0.0.1:8000/'" class="btn btn-warning">
زيارة الموقع
</x-mail::button>

شكرا لزيارتك الموقع الخاص بنا,<br>
{{ $sender }}
</x-mail::message>
@include('layouts.scripts-js')