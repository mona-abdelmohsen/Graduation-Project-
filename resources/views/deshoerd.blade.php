@extends('layouts.master')
@section('css')
@section('title')
    لوحة التحكم
@endsection
@endsection
@section('content')

 <div class="row">
   <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="bg-info text-white rounded p-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 20 20"
                          fill="currentColor">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd" />
                      </svg>
                  </div>
                  <div class="text-end">
                      مستخدم
                      <h2 class="counter">{{ \App\Models\User::where('roles_name', 'مستخدم')->count() }}</h2>
                  </div>
              </div>

          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="bg-warning text-white rounded p-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 20 20"
                          fill="currentColor">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd" />
                      </svg>
                  </div>
                  <div class="text-end">
                      مدير
                      <h2 class="counter">{{ \App\Models\User::where('roles_name', 'مدير')->count() }}</h2>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="bg-success text-white rounded p-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 20 20"
                          fill="currentColor">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd" />
                      </svg>
                  </div>
                  <div class="text-end">
                      صاحب سكن
                      <h2 class="counter">{{ \App\Models\User::where('roles_name', 'صاحب السكن')->count() }}</h2>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
   <div class="card">
       <div class="card-body">
           <div class="d-flex justify-content-between align-items-center">
               <div class="bg-warning text-white rounded p-3">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 20 20"
                       fill="currentColor">
                       <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                           clip-rule="evenodd" />
                   </svg>
               </div>
               <div class="text-end">
                   كل المستخدمين
                   <h2 class="counter">{{ \App\Models\User::all()->count() }}</h2>
               </div>
           </div>
       </div>
   </div>
</div>
 </div>
 <div class="row">
<div class="col-xl-4 mb-30">
    <div class="card card-statistics h-100" style="background-color: white !important">
        <div class="card-body" width="75%">
            <h5 class="card-title">إحصائيات بنسبة الغرف التى تم تسكينها بكل فرع</h5>
            {!! $chartjs1->render() !!}

        </div>

    </div>
</div>
<div class="col-xl-8 mb-30">
    <div class="card h-100" style="background-color: white !important">
        <div class="card-body">
            <h5 class="card-title">إحصائيات بنسبة الغرف المتاحة بكل فرع</h5>

            {!! $chartjs2->render() !!}

        </div>
    </div>
</div>
 </div>
         
@endsection
