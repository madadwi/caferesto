<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Kasir.kasirComponent.keranjang', [
            'transaksi' => Transaksi::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kasir.kasirComponent.buat', [
            'menus' => Menu::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'pelanggan' => ['required'],
            'menu' => ['required'],
            'qty' => ['required', 'numeric'],
            'pegawai' => ['required']

        ];

        if ($request->menu) {
            $menu = Menu::find($request->menu);
            array_push($rules['qty'], 'max:' . $menu->sesa);
        }

        $validatedData = $request->validate($rules);

        if ($request->menu) {
            $menu = Menu::find($request->menu);
            $menu->sesa -= $request->qty;
            $menu->save();

            $validatedData['total'] = $menu->harga * $request->qty;
            $validatedData['menu_id'] = $request->menu;
            $validatedData['date'] = date('Y-m-d');
            unset($validatedData['menu']);

            Transaksi::create($validatedData);

            return to_route('transaksi.index')->with('message', 'Berhasil transaksi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('Kasir.kasirComponent.edit', [
            'transaksi' => $transaksi,
            'menus' => Menu::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $rules = [
            'pelanggan' => ['required'],
            'menu' => ['required'],
            'qty' => ['required', 'numeric'],
            'pegawai' => ['required'],

        ];

        if ($request->menu) {
            $menu = Menu::find($request->menu);
            array_push($rules['qty'], 'max:' . $menu->sesa);
        }

        $validatedData = $request->validate($rules);

        if ($request->menu) {
            $menu = Menu::find($request->menu);
            $validatedData['total'] = $menu->harga * $request->qty;
            $validatedData['menu_id'] = $request->menu;
          
            unset($validatedData['menu']);

            $transaksi->update($validatedData);

            $menu->sesa = $menu->qty - array_sum(Transaksi::where('menu_id', $menu->id)->get()->pluck('qty')->toArray());
            $menu->save();

            return to_route('transaksi.index')->with('message', 'Berhasil edit transaksi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return to_route('transaksi.index')->with('message', 'Berhasil hapus transaksi');
    }

    public function bayar($id)
    {
        return view('Kasir.kasirComponent.bayar', [
            'transaksi' => Transaksi::find($id),
            'menus' => Menu::latest()->get()
        ]);
    }

    public function buat(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $validatedData = $request->validate([
            'beli' => ['required', 'numeric', 'min:' . $transaksi->total]
        ]);

        $validatedData['status'] = 'Dibayar';
        $validatedData['kembali'] = $request->beli - $transaksi->total;

        $transaksi->update($validatedData);

        return to_route('transaksi.index')->with('message', 'Berhasil bayar');
    }
}
