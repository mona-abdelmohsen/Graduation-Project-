@extends('layouts.master')
@section('title')
    المناطق
@endsection
@section('css')
@endsection
@section('content')
<div class="row">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
 @endif
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between" >
             <button type="button" class="btn btn" data-toggle="modal" data-target="#exampleModalCenter" style="background:none;">
              <div class="header-title">
                <a class="btn ripple btn-warning" data-target="#modaldemo1" data-toggle="modal" href="">اضافة منطقة</a>
            </div>
            </button>
             <!---------------------------------------- Modal add --------------------------------------------------------------------- -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">اضافة منطقة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{  route('regions.store')  }}" method="POST">
                      @csrf

                      <div class="form-row endd">
                        
                        <div class="form-group col ">
                          <label for="inputPassword4">اسم المنطقة</label>
                          <input name='name'type="text" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                      </div>
                      
                      
                      <div class="form-row  endd" >
                        
                        <div class="form-group col ">
                          <label for="inputState">اسم الفرع</label>
                          <select  name="branch_id"id="inputState" class="form-control">
                            <option selected disabled>... اختر</option>
                            @foreach ($branches as $branch )
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button class="btn ripple btn-success endd" type="submit" >اضافة</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                      </div>
                    </form>
                  </div>
            
                </div>
              </div>
            </div>

          </div>
          <div class="card-body px-0">
             <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                   <thead>
                      <tr class="ligth">
                          <th>#</th>
                         <th>اسم المنطقة</th>
                         <th>الفرع</th>
                         <th>العمليات</th>
                      </tr>
                   </thead>
                   <tbody>
                    <?php $i=1 ?>
                    @foreach ( $regions as $region )
                                            <tr>
                         <td>{{ $i++ }} </td>
                         <td>{{ $region->name }}</td>
                         <td>{{ $region->branch->name }} </td>
                         <td>
                         <button type="button" class="btn btn" data-toggle="modal" data-target="#edit{{ $region->id }}">
                          <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#">
                            <span class="btn-inner">
                               <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>
                            </span>
                         </a>
                        </button>
                        
                        <!---------------------------------------- Modal upadte --------------------------------------------------------------------- -->
                        <div class="modal fade" id="edit{{ $region->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">تعديل المنطقة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('regions.update',$region->id) }}" method="POST">
                                  @csrf
                                  @method('patch')
                                  <div class="form-row endd">
                                    
                                    <div class="form-group col ">
                                      <label for="inputPassword4">اسم المنطقة</label>
                                      <input name="name" type="text"  value="{{ $region->name }}" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                  </div>
                                  
                                  
                                  <div class="form-row  endd" >
                                    
                                    <div class="form-group col ">
                                      <label for="inputState">اسم الفرع</label>
                                      <select name="branch_id" id="inputState" class="form-control" value="{{ $region->branch->name }}">
                                        <option selected value="{{ $branch->id }}" >{{ $region->branch->name }}</option>

                                        @foreach ($branches as $branch )
                                              <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn ripple btn-success endd" type="submit" >تعديل</button>
                                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                          <button type="button" class="btn btn" data-toggle="modal" data-target="#delete{{ $region->id }}">
                            <a class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                              <span class="btn-inner">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                 </svg>
                              </span>
                           </a> 
                          </button>
                          
                        <!---------------------------------------- Modal delete --------------------------------------------------------------------- -->
                        <div class="modal fade" id="delete{{ $region->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">حذف المنطقة</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('regions.destroy','test') }}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <div class="form-row endd">
                                      
                                      <div class="form-group col ">
                                        <p class="text-danger">هل انت متاكد من حذف هذه المنطقة ؟</p>
                                        <label for="inputPassword4">اسم المنطقة</label>
                                        <input  name="name" value="{{ $region->name }}" type="text" class="form-control" id="inputPassword4" placeholder="">
                                        <input  name="id" value="{{ $region->id }}" type="hidden" class="form-control" id="inputPassword4" placeholder="">

                                      </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                      <button class="btn ripple btn-danger endd" type="submit" >حذف</button>
                                      <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                    </div>
                                  </form>
                                </div>
                          
                              </div>
                            </div>
                          </div>
                            </div>
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