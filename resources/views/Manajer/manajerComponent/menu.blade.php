@extends('Manajer.index')
@section('content')
    <div class="main-menu">
        <div class="title-menu">
            {{-- Title Page --}}
            <img src="/assets/img/title/Menu.png" alt="menu">
            {{-- Search --}}
            <form action="/menu" >
            <input type="text" class="form-control" placeholder="Search.." title="Search" onkeyup="myFunction()" name="search">
            </form>
        </div>

        <div class="row row-cols-2 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-4">
            @foreach ($manajer as $row)
                <div class="col">
                    {{-- Card Menu --}}
                    <div class="card">
                        {{-- Image Product --}}
                        <img src="{{ asset('storage/' . $row->avatar) }}" alt="" class="card-img-top">
                        {{-- Info Product --}}
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $row->name }}</h4>
                            <p class="card-text">{{ $row->deskripsi }}</p>
                            <p class="harga"><i
                                    class="fa-solid fa-tags"></i>{{ number_format($row->harga, 2, ',', '.') }}</p>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
