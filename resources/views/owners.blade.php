@extends('layouts.master')
@section('title')
اصحاب السكن
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                 <h5 class="text text-success">قائمة اصحاب السكن
                 </h5>
               </div>
           </div>
          <div class="card-body px-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">الأسم</th>
                  <th scope="col">الأيميل</th>
                  <th scope="col">التلفون</th>
                  <th scope="col">العنوان</th>
                  <th scope="col">العمليات
                </th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?>
                @foreach ($owners as  $owner)
                <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $owner->name }}</td>
                  <td>{{ $owner->email }}</td>
                  <td>{{ $owner->phone }}</td>
                  <td>{{ $owner->address }}</td>

                  <td>
                      <a  href="{{ route('delete_owner',$owner->id) }}" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                        <span class="btn-inner">
                           <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                              <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </span>
                     </a>
                    
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
       </div>
    </div>
 </div>
</div>   
@endsection