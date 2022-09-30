<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Information::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->title == "Welcome Slider") {
            $request->validate([
                'title' => 'required|unique:information,title',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'titles' => 'required',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        }
        if ($request->title == "Welcome Slider") {
            $titles = "Welcome Slide";
        } else {
            $titles = $request->titles;
        }

        // Save
        $slider = new information;
        $slider->title = $request->title . "-" . $titles;
        $item = $request->file;
        $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
        $slider->file = $imageName;
        $item->move(public_path() . '/assets/img/slider', $imageName);
        $slider->save();
        return redirect('/admin/slider')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('admin.slider.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('admin.slider.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $ubah = Information::findorfail($information->id);
        $awal = $ubah->file;
        $dt = [
            'file' => $awal,
        ];
        $request->file->move(public_path() . '/assets/img/slider', $awal);
        $ubah->update($dt);
        return redirect('/admin/slider')->with('status', 'Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        if (File::exists(public_path('assets/img/slider/' . $information->file))) {
            File::delete(public_path('assets/img/slider/' . $information->file));
            Information::destroy($information->id);
        } else {
            dd('File does not exists.');
        }
        return redirect('/admin/slider')->with('status', 'Data Berhasil Dihapus');
    }
}
