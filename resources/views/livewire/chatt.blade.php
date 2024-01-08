<div wire:poll>

    <body>
        <div class="container-fluid" style="margin-top: -50px;">
            <div class="all mt-5 all-R">
                <div class="container w-75 left-R" id="chat">
                    <div class="parent parent-profile text-light"style="margin-top: 0px;position:fixed;width: 70%;height: 65px;background:white">
                        <div class="left-profile">
                            <a href="{{ route('home') }}"> <i class="fas fa-arrow-left arrow"></i></a>

                        </div>
                        <div class="center">
                            @if (@isset($reciver))
                                <div>
                                    <img class="image" src="profiles/{{ $reciver->image_path }}" alt="photo">
                                </div>
                                <h5 class="my-1 mx-1" style="color:black">{{ $reciver->name }}</h5>
                            @endif
                        </div>
                        <div class="right-profile">
                            {{-- <i class="far fa-trash-alt trash"></i> --}}
                        </div>
                    </div>
                    <hr class="" style="margin-top: 65px;position:fixed;width: 70%;">
                    <div style="margin-top: 90px;">
                        @if (!isset($error))
                            @forelse ($messages as $message)
                                {{-- reciver --}}

                                     

                                @if ($message->reciver_id == auth()->user()->id && $message->sender_id == $Text)
                                    <div class="" style="display:flex">
                                        <div>
                                            <img class="image" src="profiles/{{ auth()->user()->image_path }}" alt="photo">
                                        </div>
                                        <h5 class="" style="color:black; margin-left:5px;font-size:16px;margin-top:5px">{{ auth()->user()->name }}</h5>
                                    </div>

                                    <div class="message">
                                        {{ $message->message }}
                                    </div>

                                    <span class="time_date" style="margin-bottom:10px">
                                        {{ $message->created_at->diffForHumans(null, false, false) }}
                                    </span>
                                @endif
                                {{-- sender --}}

                                @if ($message->sender_id == auth()->user()->id && $message->reciver_id == $Text)
                                    <div class="message  ms-auto my-2" style="background:#BD5D14";>
                                        {{ $message->message }}
                                    </div>
                                    <span class="time_date"  style="margin-left:87% !important">
                                        {{ $message->created_at->diffForHumans(null, false, false) }}
                                    </span>
                                @endif


                            @empty
                                <h5 style="text-align: center;color:red"> لاتوجد رسائل سابقة</h5>
                            @endforelse
                            <hr class="text-white">
                            <form wire:submit.prevent="sendMessage">

                                <div class="row "style="">
                                    <div class="col-11">
                                        <div class="form-floating">
                                            <input type="hidden" wire:model.defer="Text">

                                            <textarea onkeydown='scrollDown()' wire:model.defer="messageText" class="form-control " placeholder="اكتب رسالتك"
                                                id="floatingTextarea2" style="m-height: 25px;text-align: end; background-color: gray;color:white"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-1">
                                        <button class="btn  btn-send" style="background:#BD5D14;color:#fff;">إرسال</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <h5 style="text-align: center;color:black">قم بتحديد الشخص الذى تريد التواصل معه
                            </h5>

                        @endif
                    </div>

                </div>



                <div class="container w-25 right-R">
                    <div style="text-align: right;">
                        <button id="bt1"
                            style="border:none;background-color: #BD5D14;border-radius: 20px;padding: 10px;width:100px">الرسائل</button>
                        {{-- <button id="bt2"
                            style="border:none;background-color: #BD5D14;border-radius: 20px;padding: 10px;;width:130px">المديرين</button> --}}
                    </div>
                    <div class="parent-right">
                        <div class="message-icon">
                            <div>
                                <input
                                    style="width: 270px;
                                padding: 5px;
                                border: 2px solid#ddd;
                                border-radius: 20px;
                                outline:none;
                            text-align:right
                                "type="text"
                                    wire:model="searchTerm" placeholder="البحث عن الأشخاص" />

                            </div>


                        </div>
                        <div id="nav1">

                            @if (isset($users))
                                @forelse ($users as $user)
                                    <div class="under-message">

                                        <div class="photo-name">

                                            <div>
                                                <button wire:click="addTodo({{ $user->id }})"
                                                    style="border:none;background:white ;outline:none">
                                                    <img class="image" src="profiles/{{ $user->image_path }}"
                                                        alt="photo">
                                                </button>
                                            </div>
                                            <div>
                                                <button wire:click="addTodo({{ $user->id }})"
                                                    style="border:none;background:white ;outline:none">
                                                    <h6 class=" mx-2">{{ $user->name }}</h6>
                                                    <p class="mx-2">{{ $user->roles_name }}
                                                        @if ($user->roles_name == 'مدير')
                                                            <small>(
                                                                <?php $branches = \App\Models\branch::where('user_id', $user->id)->get();
                                                                ?>
                                                                @foreach ($branches as $branch)
                                                                    {{ $branch->name }}
                                                                @endforeach

                                                                )
                                                            </small>
                                                        @endif
                                                    </p>
                                                </button>

                                            </div>

                                        </div>
                                    </div>

                                @empty
                                    لا يوجد نتائج لعملية البحث
                                @endforelse
                                <hr>

                            @endif
                            <?php $friend1 = 0; ?>
                            <?php $friend2 = 0; ?>

                            @for ($i = 0; $i < count($chat_with); $i++)
                                @if ($chat_with[$i]->reciver_id == Auth::user()->id)
                                    @if ($chat_with[$i]->sender_id != $friend1)
                                        <div class="under-message">
                                            <?php $friend1 = $chat_with[$i]->sender_id; ?>
                                            <div class="photo-name">

                                                <div>
                                                    <button wire:click="addTodo({{ $chat_with[$i]->sender_id }})"
                                                        style="border:none;background:white ;outline:none">
                                                        <img class="image"
                                                            src="profiles/{{ $chat_with[$i]->SenderMe->image_path }}"
                                                            alt="photo">
                                                    </button>
                                                </div>
                                                <div>
                                                    <button wire:click="addTodo({{ $chat_with[$i]->sender_id }})"
                                                        style="border:none;background:white ;outline:none">
                                                        <h6 class=" mx-2">{{ $chat_with[$i]->SenderMe->name }}</h6>
                                                        <p class="mx-2">{{ $chat_with[$i]->SenderMe->roles_name }}
                                                            @if ($chat_with[$i]->SenderMe->roles_name == 'مدير')
                                                            <small>
                                                            (
                                                                    <?php $branches = \App\Models\branch::where('user_id', $chat_with[$i]->sender_id)->get(); ?>
                                                                    <?php $i = 1; ?>
                                                                    @foreach ($branches as $branch)
                                                                        {{ $branch->name }}
                                                                    @endforeach
                                                                    )
                                                                </small>
                                                            @endif
                                                        </p>
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endfor
                        </div>
                    </div>

                                </div>

                                <!-- <div>
                                    <i class="fas fa-circle text-success"></i>
                                </div> -->
                            </div>
                            {{-- <div class="under-message">
                                <div class="photo-name">
                                    <div>
                                        <img class="image" src="images/1096890.png" alt="photo">
                                    </div>
                                    <div>
                                        <h6 class=" mx-2">User name</h6>
                                    </div>
                                </div> --}}

                                <!-- <div>
                                    <i class="fas fa-circle text-white"></i>
                                </div> -->
                            </div>

                        </div>
                </div>
            </div>
        </div>
</div>




</body>


</div>
<script src="{{ url('assets/js/jquery-3.6.2.js') }}"></script>

{{-- <script>
    $("#bt1").click(function() {
        $("#nav1").show(500);
        $("#nav2").hide(500);

    })
    $("#bt2").on("click", function() {
        $("#nav2").show(500);
        $("#nav1").hide(500);
    })
</script> --}}
<script src="{{ url('assets/js/all.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assetsjs/bootstrap.bundle.min.js.map') }}"></script>
