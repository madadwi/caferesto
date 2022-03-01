@extends('Kasir.index')
@section('content')
    <div class="main-menu">
        <div class="title-keranjang">
            {{-- Title Page --}}
            <img src="/assets/img/title/Keranjang.png" alt="Keranjang">

            {{-- Button Tambah --}}
            <a href="{{ route('transaksi.create') }}"><i class="fa-solid fa-circle-plus"></i> Tambahkan</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        {{-- Table Content --}}
        <div class="content-table">
            <table>
                <tr>
                    {{-- Table Header --}}
                    <th width="50px">No</th>
                    <th width="300px">Nama Pelanggan</th>
                    <th>Menu</th>
                    <th width="70px">Qyt</th>
                    <th>Total</th>
                    <th width="200px">Pegawai</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="150px">Aksi</th>
                </tr>
                @forelse ($transaksi as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->pelanggan }}</td>
                        <td>{{ $row->menu->name }}</td>
                        <td>{{ $row->qty }}</td>
                        <td>{{ $row->total }}</td>
                        <td>{{ $row->pegawai }}</td>
                        <td>{{ $row->date }}</td>
                        <td>{{ $row->status }}</td>
                        <td style="display: flex; gap: 0.25rem;">
                            <a href="{{ route('transaksi.edit', $row->id) }}" class="edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('transaksi.destroy', $row->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="{{ route('transaksis.bayar', $row->id) }}" class="buy"><i class="fas fa-cash-register"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">GAADAAAAAAAAAAAA</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
