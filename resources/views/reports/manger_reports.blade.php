@extends('layouts.master')
@section('title')
    التقارير
@endsection
@section('content')
    <div class="row-mr-4">

        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('manger_reports.store') }}" method="POST">
                    @csrf
                    <div class="form-row">


                        <div class="form-group col-md-4-">
                            <label for="branch_id" class="xxx">الفرع</label>
                            <select id="branch_id" name="branch_id" class="form-select SlectBox"
                                aria-label="Default select example" onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')">
                                <option selected disabled>... اختر الفرع</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id')
                                <div class="alert alert-danger text-danger"
                                    style="background: white;border:none ;margin-bottom:0px">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="region_id" class="xxx">المنطقة</label>
                            <select id="region_id" class="form-control" name="region_id" class="form-select form-control"
                                aria-label="Default select example">
                                <option selected>... اختر المنطقة</option>

                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState" class="xxx">حالة السكن</label>
                            <select name="status" id="inputState" class="form-control">

                                <option value="الكل" selected>الكل</option>
                                <option value="تم التسكين">تم التسكين</option>
                                <option value="لم تسكن">لم تسكن</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">من</label>
                            <input type="date" id="inputState" class="form-control" value="{{ $from_date ?? '' }}"
                                name="from_date">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">الي</label>
                            <input type="date" id="inputState" class="form-control" value="{{ $to_date ?? '' }}"
                                name="to_date">
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary endd">بحث</button>
                    </div>

                </form>



                @if (@isset($appartments))
                <div class="card-body px-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">طالبات / طلاب</th>
                                <th scope="col">اسم الفرع</th>
                                <th scope="col">اسم المنطقة</th>
                                <th scope="col">حالة السكن</th>
                                <th scope="col">سعر الغرفة</th>
                                <th scope="col">الغرف المتاحة</th>
                                <th scope="col">تاريخ عرض السكن</th>
                                <th scope="col">تاريخ آخر تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Str::length($appartments) > 2)
                                <?php $i = 0; ?>
                                @foreach ($appartments as $appartment)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>

                                        <td>{{ $appartment->type }}</td>

                                        <td>{{ $appartment->Branch->name }}</td>
                                        <td>{{ $appartment->Region->name }}</td>
                                        <td>{{ $appartment->status }}</td>
                                        <td>{{ $appartment->price }}</td>
                                        <td>{{ $appartment->room_num }}</td>
                                        <td>{{ $appartment->created_at }}</td>
                                        <td>{{ $appartment->updated_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" style="text-align: center">لاتوجد نتائج تطابق عملية البحث</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
            @endif
            </div>
        </div>
    </div>
    </div>
    
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="branch_id"]').on('change', function() {
                var branchId = $(this).val();
                if (branchId) {
                    $.ajax({
                        url: "{{ URL::to('post') }}/" + branchId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="region_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="region_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
