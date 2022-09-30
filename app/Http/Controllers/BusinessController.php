<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = business::all();
        return view('admin.business.index', compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.business.create');
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
        // Validation
        $request->validate([
            'tag' => 'required',
            'field' => 'required',
            'title' => 'required|unique:businesses,title',
            'category' => 'required',
            'editor' => 'required',
            'whatsapp' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->instagram == null && $request->facebook == null) {
            $instagram = "-";
            $facebook = "-";
            // dd($facebook, $instagram);
        } else if ($request->instagram != null && $request->facebook == null) {
            $instagram = $request->instagram;
            $facebook = "-";
        } else if ($request->instagram == null && $request->facebook != null) {
            $instagram = "-";
            $facebook = $request->facebook;
        } else {
            $facebook = $request->facebook;
            $instagram = $request->instagram;
        }
        // dd($facebook, $instagram);

        $slug = Str::of($request->title)->slug('-');
        // Save
        $business = new business;
        $business->slug = $slug;
        $business->tag = $request->tag;
        $business->field = $request->field;
        $business->category = $request->category;
        $business->title = $request->title;
        $business->description = $request->editor;
        $business->address = $request->address;
        $business->whatsapp = $request->whatsapp;
        $business->instagram = $instagram;
        $business->facebook = $facebook;
        $item = $request->thumbnail;
        $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
        $business->thumbnail = $imageName;
        $item->move(public_path() . '/assets/img/business', $imageName);
        $business->save();
        return redirect('/admin/business')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('admin.business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('admin.business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        // dd($request->all());
        // Cek Judul
        if ($request->title != $request->oldTitle) {
            $title = 'required|unique:businesses,title';
        } else {
            $title = 'required';
        }
        // dd($request->all());
        $slug = Str::of($request->title)->slug('-');
        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'tag' => 'required',
                'field' => 'required',
                'title' => $title,
                'category' => 'required',
                'editor' => 'required',
                'whatsapp' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $ubah = Business::findorfail($business->id);
            $awal = $ubah->thumbnail;

            $dt = [
                'thumbnail' => $awal,
                'slug' => $slug,
                'tag' => $request->tag,
                'field' => $request->field,
                'category' => $request->category,
                'title' => $request->title,
                'address' => $request->address,
                'whatsapp' => $request->whatsapp,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'description' => $request->editor,
            ];
            $request->thumbnail->move(public_path() . '/assets/img/business', $awal);
            $ubah->update($dt);
        } else {
            $request->validate([
                'tag' => 'required',
                'field' => 'required',
                'title' => $title,
                'category' => 'required',
                'editor' => 'required',
                'whatsapp' => 'required'
            ]);
            $ubah = Business::findorfail($business->id);
            $dt = [
                'title' => $request->title,
                'slug' => $slug,
                'content' => $request->editor,
                'tag' => $request->tag,
                'field' => $request->field,
                'category' => $request->category,
                'title' => $request->title,
                'address' => $request->address,
                'whatsapp' => $request->whatsapp,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'description' => $request->editor,
            ];
            $ubah->update($dt);
        }
        return redirect('/admin/business')->with('status', 'Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        if (File::exists(public_path('assets/img/business/' . $business->thumbnail))) {
            File::delete(public_path('assets/img/business/' . $business->thumbnail));
            Business::destroy($business->id);
        } else {
            dd('File does not exists.');
        }
        return redirect('/admin/business')->with('status', 'Data Berhasil Dihapus');
    }
}
