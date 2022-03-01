@extends('Manajer.index')

@section('content')
    <div class="main-menu">
        {{-- Title Page --}}
        <div class="title-editUser">
            <img src="/assets/img/title/EditMenu.png" alt="Edit Menu" enctype="multipart/form-data">
        </div>

        {{-- Form Edit --}}
        <div class="content-create">
            <form action="{{ route('manajer.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{-- Pisture Product --}}
                <label for="avatar">Display</label>
                <input type="file" name="avatar" id="avatar">
                @error('avatar')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror

                <br>

                {{-- Name Product --}}
                <label for="name">Nama Menu</label>
                <div class="icon-input">
                    <i class="fas fa-coffee"></i>
                </div>
                <input class="input-text" type="text" name="name" id="name" value="{{ old('name', $menu->name) }}"
                    required>
                @error('name')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror


                {{-- Price --}}
                <label for="harga">Harga</label>
                <div class="icon-input">
                    <i class="fas fa-tags"></i>
                </div>
                <input class="input-text" type="number" name="harga" id="harga"
                    value="{{ old('harga', $menu->harga) }}" required>
                @error('harga')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror


                {{-- Qyt --}}
                <label for="qty">Kuantitas</label>
                <div class="icon-input">
                    <i class="fas fa-list-ol"></i>
                </div>
                <input class="input-text" type="number" name="qty" id="qty" value="{{ old('qty', $menu->qty) }}"
                    required>
                @error('qty')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror

                {{-- Employee --}}
                <label for="deskripsi">Deskripsi</label>
                <div class="textarea-input">
                    <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="invalid"><em>{{ $message }}</em></p>
                    @enderror
                </div>

                {{-- Button Action --}}
                <div class="button-input">
                    <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
                    <button class="btn-submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
