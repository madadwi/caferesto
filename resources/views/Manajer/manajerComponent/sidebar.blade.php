<div id="mySidenav" class="sidenav">
    {{-- (X) Close Button --}}
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    {{-- Logo on Sidebar --}}
    <div class="my-logo">
        <img src="/assets/img/logo/10.png" alt="Logo" class="rz-logo">
    </div>

    {{-- List Menu --}}
    <div class="menu-sidenav">
        <a href="{{ url("/manajer") }}"><li class="list {{ Request::is('manajer/menu') ? 'active' : '' }}"><i class="fas fa-coffee"></i>&ensp;Menu</li></a>
        <a href="/menu"><li class="list {{ Request::is('manajer/data','manajer/tambah','manajer/edit') ? 'active' : '' }}"><i class="fa-solid fa-server"></i>&ensp;Data Menu</li></a>
        <a href="/laporan"><li class="list {{ Request::is('manajer/laporan') ? 'active' : '' }}"><i class="fa-solid fa-book"></i>&ensp;Laporan</li></a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        ><li class="{{ Request::is('admin/data','admin/edit','admin/tambah') ? 'active' : '' }}"><i class="fas fa-users"></i>&ensp;Logout</li></a>
        <form action="{{ route('logout') }}" id="logout-form" method="post">
            @csrf
        </form>
    </div>
</div>
