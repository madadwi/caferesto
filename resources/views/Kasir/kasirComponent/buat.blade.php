@extends('Kasir.index')
@section('content')
    <form action="{{ route('transaksi.store') }}" method="post" class="main-menu">
        {{-- Title Page --}}
        <div class="title-buat">
            <img src="/assets/img/title/Buat.png" alt="Buat">
        </div>

        {{-- Form Edit --}}
        <div class="content-create">
            @csrf
            {{-- Name --}}
            <label>Nama Pelanggan</label>
            <div class="icon-input">
                <i class="fas fa-users"></i>
            </div>
            <input class="input-text" type="text" name="pelanggan" value="{{ old('pelanggan') }}">
            @error('pelanggan')
                <p class="invalid">{{ $message }}</p>
            @enderror

            {{-- Product --}}
            <label>Menu Pesanan</label>
            <div class="icon-input">
                <i class="fas fa-coffee"></i>
            </div>
            <select class="input-text" type="text" name="menu">
                <option selected disabled>- Pilih -</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}" {{ old('menu') === $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
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
            <input class="input-text" type="number" name="qty" value="{{ old('qty') }}">
            @error('qty')
                <p class="invalid">{{ $message }}</p>
            @enderror

            {{-- Employee --}}
            <label>Pegawai</label>
            <div class="icon-input">
                <i class="fas fa-user-check"></i>
            </div>
            <input class="input-text" type="text" name="pegawai" value="{{ old('pegawai', auth()->user()->name) }}"
                value="{{ old('pelanggan') }}">
            @error('pegawai')
                <p class="invalid">{{ $message }}</p>
            @enderror
        </div>

        {{-- Button Action --}}
        <div class="button-input">
            <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
            <button class="btn-submit">Tambahkan</button>
        </div>
    </form>
@endsection
