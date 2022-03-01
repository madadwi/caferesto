<div id="mySidenav" class="sidenav">
    {{-- (X) Close Button --}}
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    {{-- Logo on Sidebar --}}
    <div class="my-logo">
        <img src="/assets/img/logo/10.png" alt="Logo" class="rz-logo">
    </div>

    {{-- Menu Sidebar --}}
    <div class="menu-sidenav">
        <a href="{{ url("/admin/data") }}"><li class="{{ Request::is('admin/data','admin/edit','admin/tambah') ? 'active' : '' }}"><i class="fas fa-users"></i>&ensp;User</li></a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        ><li><i class="fas fa-users"></i>&ensp;Logout</li></a>
        <form action="{{ route('logout') }}" id="logout-form" method="post">
            @csrf
        </form>

    </div>
</div>
