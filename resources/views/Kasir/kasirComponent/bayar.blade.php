@extends('Kasir.index')
@section('content')

<div class="main-menu">
    {{-- Title Page --}}
    <div class="title-edit">
        <img src="/assets/img/title/Bayar.png" alt="Edit">
    </div>

    {{-- Form Edit --}}
    <div class="content-create">
        <form action="{{ route('transaksis.buat', $transaksi->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Name --}}
            <label>Status</label>
            <div class="icon-input">
                <i class="fas fa-users"></i>
            </div>
            <input class="input-text" type="text" name="status" disabled value="{{ old('status', $transaksi->status) }}" required>
            @error('status')
                <p class="invalid"><em>{{ $message }}</em></p>
            @enderror

            <label>Nama Pelanggan</label>
            <div class="icon-input">
                <i class="fas fa-users"></i>
            </div>
            <input class="input-text" type="text" name="pelanggan" disabled value="{{ old('pelanggan', $transaksi->pelanggan) }}" required>
            @error('pelanggan')
                <p class="invalid"><em>{{ $message }}</em></p>
            @enderror


            {{-- Product --}}
            <label>Menu Pesanan</label>
            <div class="icon-input">
                <i class="fas fa-coffee"></i>
            </div>
            <select class="input-text" type="text" name="menu" disabled>
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
            <input class="input-text" type="number" name="qty" disabled value="{{ old('qty', $transaksi->qty) }}" required>
            @error('qty')
                <p class="invalid"><em>{{ $message }}</em></p>
            @enderror

            {{-- Employee --}}
            <label>Pegawai</label>
            <div class="icon-input">
                <i class="fas fa-user-check"></i>
            </div>
            <input class="input-text" type="text" name="pegawai" disabled value="{{ old('pegawai', $transaksi->pegawai) }}" required>
            @error('pegawai')
                <p class="invalid"><em>{{ $message }}</em></p>
            @enderror

            <label>Harga</label>
            <div class="icon-input">
                <i class="fas fa-money-bill"></i>
            </div>
            <input class="input-text" type="text" name="total" disabled value="{{ old('total', number_format($transaksi->total, 2, ',', '.')) }}" required>
            @error('total')
                <p class="invalid"><em>{{ $message }}</em></p>
            @enderror

            @if ($transaksi->status === 'Dibayar')
                <label>Beli</label>
                <div class="icon-input">
                    <i class="fas fa-money-bill-1"></i>
                </div>
                <input class="input-text" type="text" name="beli" disabled value="{{ old('beli', number_format($transaksi->beli, 2, ',', '.')) }}" required>
                @error('beli')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror

                <label>Kembali</label>
                <div class="icon-input">
                    <i class="fas fa-money-bill-1-wave"></i>
                </div>
                <input class="input-text" type="text" name="beli" disabled value="{{ old('beli', number_format($transaksi->kembali, 2, ',', '.')) }}" required>
                @error('beli')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror
            @else
                <label>Beli</label>
                <div class="icon-input">
                    <i class="fas fa-money-bill-1"></i>
                </div>
                <input class="input-text" type="text" name="beli" value="{{ old('beli') }}" required>
                @error('beli')
                    <p class="invalid"><em>{{ $message }}</em></p>
                @enderror
            @endif

    </div>

    {{-- Button Action --}}
    <div class="button-input">
        <a href="{{ URL::previous() }}" class="btn-back"><i class="fas fa-angle-left"></i> Kembali</a>
        <button class="btn-submit">Bayar</button>
    </div>
</form>
</div>

@endsection
