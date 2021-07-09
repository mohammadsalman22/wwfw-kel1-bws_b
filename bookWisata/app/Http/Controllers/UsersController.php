<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $array = $request->only([
            'name', 'email', 'password'
        ]);

        $array['password'] = bcrypt($array['password']);

        $users = User::create($array);
        return redirect()->route('admin.index')->with('success_message', 'Berhasil menambah user baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        if (!$users) return redirect()->route('backend.admin.index')->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        
        return view('backend.admin.edit', [
            'users' => $users
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|confirmed'
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;

        if ($request->password) $users->password = bcrypt($request->password);
            $users->save();

        return redirect()->route('admin.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $users = User::find($id);

        if ($id == $request->user()->id) return redirect()->route('admin.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');

        if ($users) $users->delete();

        return redirect()->route('admin.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
