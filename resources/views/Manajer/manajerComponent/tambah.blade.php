@extends('Manajer.index')
@section('content')
    <div class="main-menu">
        {{-- Title Page --}}
        <div class="title-buat">
            <img src="/assets/img/title/TambahMenu.png" alt="Tambah Menu">
        </div>

        {{-- Form Edit --}}
        <div class="content-create">
            <form action="{{ route('manajer.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label>Display</label>
                <input type="file" name="avatar" placeholder="" onchange="previewImage()">
                <br>

                {{-- Name Product --}}
                <label>Nama Menu</label>
                <div class="icon-input">
                    <i class="fas fa-coffee"></i>
                </div>
                <input class="input-text" type="text" name="name" placeholder="" value="{{ old('name') }}" required>
                @error('name')
                <p class="invalid">{{ $message }}</p>
            @enderror
                {{-- Price --}}
                <label>Harga</label>
                <div class="icon-input">
                    <i class="fas fa-tags"></i>
                </div>
                <input class="input-text" type="text" name="harga" placeholder="" value="{{ old('harga') }}" required>
                @error('harga')
                <p class="invalid">{{ $message }}</p>
            @enderror
                {{-- Qyt --}}
                <label>Kuantitas</label>
                <div class="icon-input">
                    <i class="fas fa-list-ol"></i>
                </div>
                <input class="input-text" type="number" name="qty" placeholder="" value="{{ old('qty') }}" required>
                @error('qty')
                <p class="invalid">{{ $message }}</p>
            @enderror
                {{-- Employee --}}
                <label>Deskripsi</label>
                <div class="textarea-input">
                    <textarea name="deskripsi" id=""  value="{{ old('deskripsi') }}"></textarea>
                    @error('deskripsi')
                    <p class="invalid">{{ $message }}</p>
                @enderror
                </div>

        </div>

        {{-- Button Action --}}
        <div class="button-input">
            <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
            <button class="btn-submit">Tambahkan</button>
        </div>
    </form>
    </div>
@endsection
