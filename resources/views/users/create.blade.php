@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
إضافة مستخدم
@stop


@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
       

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-warning btn-sm" href="{{ route('users.index') }}">رجوع</a>
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('users.store','test')}}" method="post">
                    {{csrf_field()}}

                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label style="margin: 10px 0 10px 0">اسم المستخدم: <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name" required="" type="text" autocomplete="off">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label style="margin: 10px 0 10px 0">البريد الالكتروني: <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                            </div>
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label style="margin: 10px 0 10px 0">كلمة المرور: <span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="password" required="" type="password">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label style="margin: 10px 0 10px 0"> تاكيد كلمة المرور: <span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="confirm-password" required="" type="password">
                        </div>
                    </div>

                     <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="fnWrapper">
                                <label style="margin: 10px 0 10px 0">نوع المستخدم: <span class="text-danger">*</span></label>
                                <select name="gender" id="select-beast" class="form-control custom-select">
                                    <option selected disabled>...اختر النوع </option>
                                    <option value="انثى">انثى</option>
                                    <option value="ذكر"> ذكر</option>
                                </select>
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="fnWrapper">
                                    <label style="margin: 10px 0 10px 0">صلاحية المستخدم<span class="text-danger">*</span></label>
                                    <select  name="roles_name" id="select-beast" class="form-control custom-select" \>
                                        <option selected disabled>اختر صلاحية المستخدم </option>
                                        @foreach ($roles as $role )
                                        <option value="{{$role}}">{{$role}}</option>
                                        @endforeach
                                      </select>
                                   
                            </div>
                            <input type="hidden" name="image_path" value='d/avtar_5.png'>
                     </div>
                      
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin: 10px 0 10px 0">
                        <button class="btn btn-warning" type="submit">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection