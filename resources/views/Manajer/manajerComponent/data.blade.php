@extends('Manajer.index')
@section('content')
    <div class="main-menu">
        <div class="title-datauser">
            {{-- Title Page --}}
            <img src="/assets/img/title/DataMenu.png" alt="Data Menu">

            {{-- Button Tambah Data --}}
            <a href="{{ route('manajer.create') }}" class="tambah"><i class="fa-solid fa-circle-plus"></i>
                Tambahkan</a>
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
                    <th width="110px">Display</th>
                    <th>Nama Menu</th>
                    <th width="180px">Harga</th>
                    <th width="60">Qyt</th>
                    <th>Sisa</th>
                    <th>Deskripsi</th>
                    <th width="100px">Aksi</th>
                </tr>
                @foreach ($manajer as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $row->avatar) }}" alt="" id="myImg"></td>
                        <td>{{ $row->name }}</td>
                        <td>Rp{{ number_format($row->harga, 2, ',', '.') }}</td>
                        <td>{{ $row->qty }}</td>
                        <td>{{ $row->sesa }}</td>
                        <td class="desc">{{ $row->deskripsi }}</td>
                        <td>
                            <form method="POST" action="{{ route('manajer.destroy', $row->id) }}">
                                <a href="{{ route('manajer.edit', $row->id) }}" class="edit"><i
                                        class="fas fa-edit"></i></a>
                                <button class="delete"><i class="fas fa-trash-alt"></i></button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
        </div>
    </div>
@endsection
