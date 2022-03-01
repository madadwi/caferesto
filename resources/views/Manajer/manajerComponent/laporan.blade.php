@extends('Manajer.index')
@section('content')
    <div class="main-menu">
        {{-- Title Page --}}
        <div class="title-keranjang">
            <img src="/assets/img/title/Laporan.png" alt="Laporan">
        </div>

        <div class="filter">
            <form action="" method="get">
                {{-- Filter --}}
                <label>Filter :&emsp;</label>
                <input class="input-date" type="date" name="from" value="{{ request('from') }}" required>

                <label>&ensp;sampai&ensp;</label>
                <input class="input-date" type="date" name="to" value="{{ request('to') }}" required>

                <button class="btn-submit">Terapkan</button>
            </form>
        </div>

        <div class="print">
            <a target="_blank" rel="noopener noreferrer" href="{{ route('laporan.print', [$from, $to]) }}"><i class="fas fa-print"></i> PDF</a>
        </div>

        {{-- Table Content --}}
        <div class="content-table table-laporan">
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">GAADAAAAAAAAAAAA</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
