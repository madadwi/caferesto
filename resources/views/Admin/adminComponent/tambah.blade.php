@extends('Admin.index')
@section('content')
    <form action="{{ route('data.store') }}" method="post" class="main-menu">

        {{-- Title Page --}}
        <div class="title-tambahUser">
            <img src="/assets/img/title/TambahUser.png" alt="Tambah User">
        </div>

        {{-- Form Tambah Data User --}}
        <div class="content-create">
            <div>
                @csrf
                {{-- Name --}}
                <label>Nama</label>
                <div class="icon-input">
                    <i class="fas fa-user"></i>
                </div>
                <input class="input-text" type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="invalid">{{ $message }}</p>
                @enderror

                {{-- Username --}}
                <label>Email</label>
                <div class="icon-input">
                    <i class="fas fa-address-book"></i>
                </div>
                <input class="input-text" type="text" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="invalid">{{ $message }}</p>
                @enderror

                {{-- Password --}}
                <label>Password</label>
                <div class="icon-input">
                    <i class="fas fa-key"></i>
                </div>
                <input class="input-text" type="password" name="password" placeholder="" required>
                @error('password')
                    <p class="invalid">{{ $message }}</p>
                @enderror

                {{-- Role --}}
                <div>
                    <label>Role</label>

                    <div class="role-input">
                        <label class="role-logo"><i class="fas fa-info-circle"></i></label>
                        @foreach ($roles as $role)
                            <label for="{{ $role }}">{{ $role }}</label>
                            <input id="{{ $role }}" type="radio" name="role" @checked($role===old('role'))
                                value="{{ $role }}">
                        @endforeach
                        @error('role')
                            <p class="invalid">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </div>


        {{-- Button Action --}}
        <div class="button-input">
            <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
            <button class="btn-submit">Tambahkan</button>
        </div>
    </form>
@endsection
