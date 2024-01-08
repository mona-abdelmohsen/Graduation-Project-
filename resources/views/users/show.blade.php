@extends('layouts.master')
@section('title')
  عرض المستخدم
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            {{-- <h2> Show User</h2> --}}
        </div>
        <div class="pull-right" style="padding-top: 40px">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
        </div>
    </div>
</div>


<div class="row" style="padding-top: 20px">
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الأسم:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الأيميل:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الصلاحيات:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v) 
                    <label class="">{{ $v}}</label>
                @endforeach
             @endif
        </div>
    </div>
</div>
@endsection