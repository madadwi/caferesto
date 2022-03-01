@extends('Admin.index')
@section('content')

<div class="main-menu">
    <div class="title-datauser">
        {{-- Title Page --}}
        <img src="/assets/img/title/DataUser.png" alt="Data User">

        {{-- Button Tambah Data --}}
        <a href="{{ route('data.create') }}" class="tambah"><i class="fas fa-user-plus"></i> Tambahkan</a>
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
                <th>Nama</th>
                <th>Email</th>
                {{-- <th>Password</th> --}}
                <th>Role</th>
                <th width="100px">Aksi</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()[0] }}</td>
                    <td>
                        {{-- Button Action --}}
                        <form method="POST" action="{{ route('data.destroy', $user->id) }}">
                            <a href="{{ route('data.edit', $user->id) }}" class="edit"><i class="fas fa-edit"></i></a>
                            <button class="delete"><i class="fas fa-trash-alt"></i></button>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
