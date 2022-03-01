@extends('Admin.index')
@section('content')
    <form action="{{ route('data.update', $user->id) }}" method="post" class="main-menu">
        {{-- Title Page --}}
        <div class="title-editUser">
            <img src="/assets/img/title/EditUser.png" alt="Edit User">
        </div>

        {{-- Form Edit Data User --}}
        <div class="content-create">
            <div>
                @method('PUT')
                @csrf
                {{-- Name --}}
                <label>Nama</label>
                <div class="icon-input">
                    <i class="fas fa-user"></i>
                </div>
                <input class="input-text" type="text" name="name" value="{{ $user->name }}" required>
                @error('name')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror

                {{-- Username --}}
                <label>Email</label>
                <div class="icon-input">
                    <i class="fas fa-address-book"></i>
                </div>
                <input class="input-text" type="email" name="email" value="{{ $user->email }}" required>
                @error('email')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror

                {{-- Password --}}
                <label>Password</label>
                <div class="icon-input">
                    <i class="fas fa-key"></i>
                </div>
                <input class="input-text" type="password" name="password">
                @error('password')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror

                {{-- Role --}}
                <div>
                    <label>Role</label>
                    <div class="role-input">
                        <label class="role-logo"><i class="fas fa-info-circle"></i></label>

                        @foreach ($roles as $role)
                            <label for="{{ $role }}">{{ $role }}</label>
                            <input id="{{ $role }}" type="radio" name="role"
                                @checked($role===$user->getRoleNames()[0]) value="{{ $role }}">
                        @endforeach
                    </div>
                    @error('role')
                        <p class="invalid"><em>{{ $message }}</em></p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Button Action --}}
        <div class="button-input">
            <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
            <button class="btn-submit">Edit</button>
        </div>
    </form>
@endsection
