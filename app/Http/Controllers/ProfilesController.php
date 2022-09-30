<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cek Duplikat Data
        $visimisi = Profile::where('tag', 'visimisi')->count();
        $sejarah = Profile::where('tag', 'sejarah')->count();
        if ($visimisi == 1 || $sejarah == 1) {
            return redirect()->back()->with('status', 'Data Sudah Ada');
        }
        // dd($sejarah);
        // Validation
        if ($request->tag == "sejarah" || $request->tag == "visimisi") {
            $request->validate([
                'tag' => 'required',
                'editor' => 'required',
                'title' => 'required',
            ]);
        } else {
            $request->validate([
                'tag' => 'required',
                'title' => 'required',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        }
        // Save
        $profile = new profile;
        $profile->tag = $request->tag;
        $profile->title = $request->title;
        if ($request->tag == "sejarah" || $request->tag == "visimisi") {
            $profile->content = $request->editor;
        } else {
            $item = $request->file;
            $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
            $profile->content = $imageName;
            $item->move(public_path() . '/assets/img/profile', $imageName);
        }
        $profile->save();
        return redirect('/admin/profile')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('admin.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        // dd($request->all());
        if ($request->tag == "sejarah" || $request->tag == "visimisi") {
            Profile::where('id', $profile->id)
                ->update([
                    'title' => $request->title,
                    'content' => $request->editor
                ]);
            return redirect('/admin/profile')->with('status', 'Data Berhasil DiUbah');
        } else {
            if ($request->hasFile('file')) {
                $ubah = Profile::findorfail($profile->id);
                $awal = $ubah->content;

                $dt = [
                    'content' => $awal,
                ];
                $request->file->move(public_path() . '/assets/img/profile', $awal);
                $ubah->update($dt);
                return redirect('/admin/profile')->with('status', 'Data Berhasil DiUbah');
            }
            // $item = $request->thumbnailLama;
            // $imageName = $item;
            // $profile->content = $imageName;
            // $item->move(public_path() . '/img', $imageName);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        if ($profile->tag == "sejarah" || $profile->tag == "visimisi") {
            Profile::destroy($profile->id);
        } else {
            if (File::exists(public_path('assets/img/profile/' . $profile->content))) {
                File::delete(public_path('assets/img/profile/' . $profile->content));
                Profile::destroy($profile->id);
            } else {
                dd('File does not exists.');
            }
        }

        return redirect('/admin/profile')->with('status', 'Data Berhasil Dihapus');
    }
}
