@extends('layouts.master')
@section('title')
  الأراء
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"  style="padding-top: 40px;padding-bottom:30px">
            <h4>إراء المستخدمين</h4>
        </div>
        
    </div>
</div>
<div class="row">

@foreach ($comments as $comment)
<div class="col-lg-5">
  <div class="card">
     <div class="card-body">
        <div class=" text-center pb-3">
           <img src="profiles/{{$comment->user->image_path }}" style="border-radius: 50%" alt="User-Profile" class="theme-color-default-img img-fluid avatar-80 mb-4">
           <div>
              <h5 class="mb-3">{{  $comment->user->name }}</h5>
           </div>
           <p>{{ $comment->comments }}</p>
           @for ($i = 1; $i <= $comment->star_rating; $i++)
           ⭐
       @endfor  
              </div>
        
</div>
</div>
</div>
@endforeach


</div>
{{-- 
<table class="table table-striped">
    <thead>
      <tr >
        <th scope="col">#</th>
        <th scope="col">الأسم</th>
        <th scope="col">نوع المستخدم</th>
        <th width="280px" scope="col">التعليق</th>
        <th scope="col">التقييم</th>
      </tr>
    </thead>
    <tbody>
        <?php $c=1 ?>
  @foreach ($comments as $comment)
      <tr>
        <th scope="row">{{ $c++ }}</th>
        <td >{{  $comment->user->name }}</td>
        <td  >{{  $comment->user->roles_name}}</td>
        <td  > {{ $comment->comments }}</td>
        <td  >
            @for ($i = 1; $i <= $comment->star_rating; $i++)
                ⭐
            @endfor  
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table> --}}


{{-- {!! $data->render() !!} --}}


@endsection
