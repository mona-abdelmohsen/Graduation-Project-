<nav class="navbar bg-body-tertiary"  style="position: fixed;width: 100%;margin-top: 0px; z-index:10 !important;">
    <div class="container-fluid"  style="width: 1000px;">
        <div class="left-side">
            <a href="{{ url('/' . ($page = 'logout')) }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                <i class="fa-sharp fa-solid fa-arrow-left"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
            @if (Auth::user()->roles_name == 'صاحب السكن')
                <a class="navbar-brand"
                    href="{{ route('show_profile', Auth::user()->id) }}">{{ Auth::user()->name }}
                </a>
                <a href="{{ route('show_profile', Auth::user()->id) }}"> <img
                        src="../profiles/{{Auth::user()->image_path}}" alt="" style="border-radius:50%;">
                </a>
            @else
                <a class="navbar-brand">{{ Auth::user()->name }} </a>
                <a> <img src="../profiles/{{Auth::user()->image_path}}" alt="" style="border-radius:50%;" >
                </a>
            @endif

            <a href="{{ route('chat.index') }}"><i class="fa-solid fa-message" style="color:#BD5D14; font-size:23px ;margin-bottom:-5px"></i></a>
        </div>

        {{-- search --}}

        <livewire:search />

    </div>
</nav>
