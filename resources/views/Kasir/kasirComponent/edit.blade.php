@extends('Kasir.index')
@section('content')

<div class="main-menu">
    {{-- Title Page --}}
    <div class="title-edit">
        <img src="/assets/img/title/Edit.png" alt="Edit">
    </div>

    {{-- Form Edit --}}
    <div class="content-create">
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- Name --}}
            <label>Nama Pelanggan</label>
            <div class="icon-input">
                <i class="fas fa-users"></i>
            </div>
            <input class="input-text" type="text" name="pelanggan" placeholder="" value="{{ old('pelanggan', $transaksi->pelanggan) }}" required>
            @error('pelanggan')
            <p class="invalid"><em>{{ $message }}</em></p>
        @enderror


            {{-- Product --}}
            <label>Menu Pesanan</label>
            <div class="icon-input">
                <i class="fas fa-coffee"></i>
            </div>
            <select class="input-text" type="text" name="menu">
                <option selected disabled>- Pilih -</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}" {{ old('menu') || $transaksi->menu_id === $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
            </select>
            @error('menu')
                <p class="invalid">{{ $message }}</p>
            @enderror

            {{-- Qyt --}}
            <label>Kuantitas</label>
            <div class="icon-input">
                <i class="fas fa-list-ol"></i>
            </div>
            <input class="input-text" type="number" name="qty" placeholder="" value="{{ old('qty', $transaksi->qty) }}" required>
            @error('qty')
            <p class="invalid"><em>{{ $message }}</em></p>
        @enderror

            {{-- Employee --}}
            <label>Pegawai</label>
            <div class="icon-input">
                <i class="fas fa-user-check"></i>
            </div>
            <input class="input-text" type="text" name="pegawai" placeholder="" value="{{ old('pegawai', $transaksi->pegawai) }}" required>
            @error('pegawai')
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

@endsection
