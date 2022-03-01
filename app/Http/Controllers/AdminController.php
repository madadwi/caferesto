<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::latest()->get()[0]->getRoleNames()->first());
        return view('Admin.adminComponent.data', [
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name');
        return view('Admin.adminComponent.tambah', [
            'roles' => $roles
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
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'role' => ['required']
        ]);

        $validatedData['password'] = bcrypt($request->password);


        //? Memasukkan data ke dalam database
        $user = User::create($validatedData);

        //? Memberikan role pada user
        $user->syncRoles([$request->role]);

        //? Redirect ke dashboard user dengan session success
        return to_route('data.index')->with('message', 'Berhasil Menambah Data Baru!');
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
        $user = User::find($id);
        $roles = Role::all()->pluck('name');

        return view('Admin.adminComponent.edit', [
            'user' => $user,
            'roles' => $roles
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
        $user = User::find($id);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
        ];

        if ($request->password) {
            $rules['password'] = [Rules\Password::defaults()];
        }

        if ($request->email !== $user->email) {
            $rules['email'] = ['string', 'email', 'max:255', 'unique:users'];
        }


        $validatedData = $request->validate($rules);

        $user->syncRoles([$request->role]);

        $user->update($validatedData);

        return to_route('data.index')->with('message', 'Udah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return to_route('data.index')
            ->with('message', 'Berhasil Hapus !');
    }
}
