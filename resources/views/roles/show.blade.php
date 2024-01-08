@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left" style="padding-top: 40px">
            <h4>عرض الصلاحية</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('roles.index') }}"> رجوع</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الأسم:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الصلاحيات:</strong>
            <div class="table-responsive" style="padding-top: 20px">
                <table class="table table-bordered">
                    <tbody>
                        @if(!empty($rolePermissions))
                           @foreach($rolePermissions as $v)
                        <tr class="">
                            <td class="">
                                <label class="label label-success">{{ $v->name }}</label>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
</div>
@endsection