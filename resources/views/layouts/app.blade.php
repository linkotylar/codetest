@include('layouts.header')

    @if(!Request::is('/'))
        <div class="wrapper">
        @include('layouts.nav')
        @include('layouts.menu')
    @endif


    @yield('content')

    @if(!Request::is('/'))
        </div>
    @endif

@include('layouts.footer')
    
 