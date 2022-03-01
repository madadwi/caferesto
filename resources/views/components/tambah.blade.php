@extends('Admin.index')
@section('content')

<div class="main-menu">
    {{-- Title Page --}}
    <div class="title-tambahUser">
        <img src="{{ asset('img/title/TambahUser.png') }}" alt="Tambah User">
    </div>

    {{-- Form Tambah Data User --}}
    <div class="content-create">
        <form action="" method="">
            {{-- Name --}}
            <label>Nama</label>
            <div class="icon-input">
                <i class="fas fa-user"></i>
            </div>
            <input class="input-text" type="text" name="" placeholder="" required>

            {{-- Username --}}
            <label>Username</label>
            <div class="icon-input">
                <i class="fas fa-address-book"></i>
            </div>
            <input class="input-text" type="text" name="" placeholder="" required>

            {{-- Password --}}
            <label>Password</label>
            <div class="icon-input">
                <i class="fas fa-key"></i>
            </div>
            <input class="input-text" type="number" name="" placeholder="" required>

            {{-- Role --}}
            <div>
                <label>Role</label>
                <div class="role-input">
                    <label class="role-logo"><i class="fas fa-info-circle"></i></label>

                    <label for="mgr">Manager</label>
                    <input id="mgr" type="radio" name="role">

                    <label for="adm">Admin</label>
                    <input id="adm" type="radio" name="role">

                    <label for="ksr">Kasir</label>
                    <input id="ksr" type="radio" name="role">
                </div>
            </div>
        </form>
    </div>

    {{-- Button Action --}}
    <div class="button-input">
        <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
        <button class="btn-submit">Tambahkan</button>
    </div>
</div>

@endsection