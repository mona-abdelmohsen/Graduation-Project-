@extends('layouts.master')
@section('title')
  المستخدمين
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"  style="padding-top: 40px">
            <h4>إدرة المستخدمين</h4>
        </div>
        <div class="pull-right"style="padding-top: 10px;margin-bottom: 10px" >
            <a class="btn btn-success" href="{{ route('users.create') }}">إضافة مستخدم</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>#</th>
   <th>الأسم</th>
   <th>الأيميل</th>
   <th>نوع المستخدم</th>
   <th width="280px">العمليات</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td >
      
      @if (!empty($user->getRoleNames()))
          @foreach ($user->getRoleNames() as $v)
              <label class="badge btn-success">{{ $v }}</label>
          @endforeach
      @endif
  </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">عرض</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{{-- {!! $data->render() !!} --}}


@endsection
