<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.account.create');
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
            'role' => 'required',
            'name' => 'required',
            'username' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);
        $slug = Str::of($request->name . ' ' . $request->username)->slug('-');

        $account = new user;
        $account->role = $request->role;
        $account->name = $request->name;
        $account->slug = $slug;
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->remember_token = Str::random(60);
        $account->save();
        return redirect('/admin/account/')->with('status', 'Data Berhasil Ditambahkan');
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
    public function edit(User $user)
    {
        return view('admin.account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $ubah = User::findorfail($user->id);
        // dd($ubah->id);
        if ($request->password == null) {
            $dt = [
                'role' => $request->role,
                'name' => $request->name,
                'username' => $request->username,
            ];
        } else {
            $dt = [
                'role' => $request->role,
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ];
        }
        $ubah->update($dt);
        if (Auth::user()->role == '0') {
            return redirect('/admin/account')->with('status', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('edit-profile', Auth::user()->id)->with('status', 'Data Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/account')->with('status', 'Data Berhasil Dihapus');
    }
}
