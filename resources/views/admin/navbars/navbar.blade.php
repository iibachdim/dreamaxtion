@auth()
    @include('admin.navbars.navs.auth')
@endauth

@guest()
    @include('admin.navbars.navs.guest')
@endguest
