<div wire:poll>
    {{-- Be like water. --}}
    <form class="d-flex" role="search" >
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
        {{-- <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search"
            style="color:white;"> --}}
            <input class="form-control me-2" style="color:white;" type="text" wire:model="searchTerm" placeholder="البحث عن الأشخاص" />
            {{-- <a href="{{ route('home') }}"> --}}
                <img src="{{ asset('assets/images/WhatsApp_Image_2022-11-05_at_10.22.15_PM-removebg-preview.png') }}"
                    alt="">
                </a>
    </form>
    {{-- search results --}}
    @if (isset($users))
    <div class="p-0 sub-drop dropdown-menu dropdown-menu-end show"
                        style="background:#BD5D14 !important; border-radius:10px ;margin-left:800px">
                        <div class="m-0 shadow-none card" style="width: 300px;background:#BD5D14 !important;">
                            <div
                                class="py-3 card-header d-flex justify-content-between bg-primary"style="background:#BD5D14 !important;">
                                <div class="header-title" style="display:flex">
                                    <h5 class="mb-0 text-white" style="margin-left:170px;width:150px "> نتائج البحث </h5>
                                </div>
                            </div>
                            @foreach ($users as $user)
                                <div class="p-0 card-body"
                                    style="border: 1px solid #c9c6c6; margin-bottom:10px;background:white !important; border-radius:10px">
                                    <a href="{{ route('show_profile', $user->id) }}"
                                        class="iq-sub-card" style="text-decoration: none;color:black">

                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <h6 class="mb-0 "
                                                    style="margin-top:10px;font-family: cairo; padding-left: 25px;padding-top:10px;">

                                                    <span style="font-size:20px; ">
                                                        {{ $user->name }}
                                                    </span>

                                                    <span style="margin-left:100px">
                                                        <small>{{ $user->roles_name }}</small>
                                                    </span>
                                                </h6>
                                                {{-- <div
                                                    class="d-flex justify-content-between align-items-center"style="margin-left:70px">
                                                    <small class="float-end font-size-12">

                                                </div> --}}
                                            </div>

                                            <img class="p-1 avatar-40 rounded-pill bg-soft-primary"
                                                style="border-radius:50%;width:40px;heigth:40px; margin-right:10px"
                                                src="../profiles/{{ $image = $user->image_path }}"
                                                alt="" style="border-radius:50%;">

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{-- <a class="mb-0 text-white"href="{{ route('notify.edit', 'markAll') }}">قراءة الكل </a> --}}
                        </div>
                    </div>
            {{-- @foreach ($users as $user)
                <h4>{{$user->name}}</h4>
            @endforeach --}}
            @endif
</div>
