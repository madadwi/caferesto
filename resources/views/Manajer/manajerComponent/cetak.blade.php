<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            text-align: center
        }

        th, td {
            border: 1px solid black;
        }

        th, td, p {
            font-size: 11px;
        }

        th {
            padding: 0.5rem 1rem;
        }

        td {
            padding: 1rem
        }

        div {
            display: flex;
            align-items: center;
            flex-direction: column;
            text-align: center
        }
    </style>
</head>

<body>
    <div>
        <img width="150" src="{{ asset('logo.png') }}" alt="Logo" class="rz-logo">
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat molestiae error veniam deserunt ad doloremque, eum velit iste blanditiis deleniti nihil labore, omnis animi debitis culpa officia dolorum aliquam? Ducimus.
        </p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Menu</th>
                <th>Qyt</th>
                <th>Total</th>
                <th>Pegawai</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</body>

</html>
