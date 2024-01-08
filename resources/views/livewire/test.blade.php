<div wire:poll>
    <body>
        <div class="container-fluid" style="margin-top: -50px;">
            <div class="all mt-5 all-R">
                <div class="container w-75 left-R">
                    <div class="parent parent-profile text-light" style="margin-top: 10px;">
                        <div class="left-profile">
                            <i class="fas fa-arrow-left arrow"></i>
    
                        </div>
                        <div class="center">
                            <div>
                                <img class="image" src="profiles/{{auth()->user()->image_path}}" alt="photo">
                            </div>
                            <h5 class="my-1 mx-1" style="color:black">{{auth()->user()->name}}</h5>
                        </div>
                        <div class="right-profile">
                            <i class="far fa-trash-alt trash"></i>
                        </div>
                    </div>
                    <hr class="">
                    @if(isset($messages))
                    @forelse ($messages as $message)

                    @if ($message->reciver_id==Text )

                    <div class="message my-2" >
                        {{$message->message}}
                    </div>
                    <span class="time_date">
                        {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                    @endif

                    @if ($message->sender_id == auth()->user()->id)

                    <div class="message  ms-auto my-2" style="background:#BD5D14"; >
                        {{$message->message}}
                    </div>
                    <span class="my-2 time_date  ">
                        {{ $message->created_at->diffForHumans(null, false, false) }}
                    </span>
                    @endif
                
                    
                    @empty
                            <h5 style="text-align: center;color:red"> لاتوجد رسائل سابقة</h5>
                    @endforelse
                    <hr class="text-white">
                   <form wire:submit.prevent="sendMessage">

                    <div class="row"style="">
                        <div class="col-11">
                            <div class="form-floating">
                                <input type="text"   wire:model.defer="Text" >

                                <textarea  onkeydown='scrollDown()' wire:model.defer="messageText" class="form-control " placeholder="اكتب رسالتك"  id="floatingTextarea2" style="m-height: 25px;text-align: end; background-color: gray;color:white" ></textarea>
                            </div>

                        </div>
                        <div  class="col-1">
                            <button class="btn  btn-send" style="background:#BD5D14;color:#fff;">Send</button>
                        </div>
                    </div>
                    </form>
                   
                    @else
                    <h5 style="text-align: center;color:black">قم بتحديد الشخص الذى تريد التواصل معه
                    </h5>
                        @endif


                </div>
                
    
                <div class="container w-25 right-R">
                    <div class="parent-right">
                        <div class="message-icon">
                            <div>
                                
                            </div>
                            <div>
                                <h6 class="">الرسائل</h6>
                            </div>
    
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-white"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-white"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-white"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">
                                        
                                    </h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-white"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <form wire:submit.prevent="addTodo">

                                        <div class="row"style="">
                                            <div class="col-11">
                                                <div class="form-floating">
                                                    <input   value="2" wire:model.defer="Text" class="form-control " placeholder="اكتب رسالتك"  id="floatingTextarea2" style="m-height: 25px;text-align: end; background-color: gray;color:white" >
                                                </div>
                                            </div>
                                            <div  class="col-1">
                                                <button class="btn  btn-send" style="background:#BD5D14;color:#fff;">Send</button>
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-success"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-success"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-white"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-success"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2" >User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-success"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2" >User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-success"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-success"></i>
                            </div> -->
                        </div>
                        <div class="under-message">
                            <div class="photo-name">
                                <div>
                                    <img class="image" src="images/1096890.png" alt="photo">
                                </div>
                                <div>
                                    <h6 class=" mx-2">User name</h6>
                                </div>
                            </div>
    
                            <!-- <div>
                                <i class="fas fa-circle text-white"></i>
                            </div> -->
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    
    
    
        
      </body>
    
    
</div>
