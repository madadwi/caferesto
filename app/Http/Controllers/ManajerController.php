<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class ManajerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manajer.manajerComponent.data', [
            'manajer' => Menu::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Manajer.manajerComponent.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'harga' => ['required', 'max:255', 'string'],
            'qty' => ['required', 'max:255', 'string'],
            'deskripsi' => ['required', 'max:255', 'string'],
            'avatar' => ['required', 'file', 'image', 'max:2048'],
        ]);

        $validatedData['avatar'] = $request->file('avatar')->store('post-image');
        $validatedData['sesa'] = $request->qty;

        //? Memasukkan data ke dalam database
        Menu::create($validatedData);

        //? Redirect ke dashboard user dengan session success
        return to_route('manajer.index')->with('message', 'Berhasil Menambah Data Baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menu = Menu::firstWhere('id', $id);
        return view('Manajer.manajerComponent.edit', [
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        $rules = [
            'name' => ['required', 'max:255', 'string'],
            'harga' => ['required', 'max:255', 'string'],
            'qty' => ['required', 'max:255', 'string'],
            'deskripsi' => ['required'],
        ];

        if ($request->avatar) {
            $rules['avatar'] = ['image', 'max:2048'];
        }

        $validatedData = $request->validate($rules);

        if ($request->avatar) {
            $validatedData['avatar'] = $request->file('avatar')->store('post-image');
            Storage::delete($menu->avatar);
        }

        $validatedData['sesa'] = $request->qty;

        $menu->update($validatedData);

        return to_route('manajer.index')->with('message', 'Berhasil Edit Data Baru!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $menu = Menu::find($id);

            Storage::delete($menu->avatar);

            $menu->delete();

            return to_route('manajer.index')
                ->with('message', 'Berhasil Hapus !');
    }
}
