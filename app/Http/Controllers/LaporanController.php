<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $filter = request('to') && request('from') ? ['date' => [
            'from' => request('from'),
            'to' => request('to'),
        ]] : ['date' => null];

        $from = request('from') ?? Transaksi::first()->date;
        $to = request('to') ?? Transaksi::latest()->first()->date;

        return view('Manajer.manajerComponent.laporan', [
            'transaksi' => Transaksi::filter($filter)->latest()->get(),
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function print($from, $to)
    {
        $filter = ['date' => [
            'from' => $from,
            'to' => $to
        ]];
        $transaksi = Transaksi::filter($filter)->latest()->get();
        $pdf = PDF::loadView('Manajer.manajerComponent.cetak', [
            'transaksi' => $transaksi
        ]);
        return $pdf->stream('Laporan Transaksi Tanggal ' . $from . ' Sampai ' . $to . '.pdf');
    }
}
