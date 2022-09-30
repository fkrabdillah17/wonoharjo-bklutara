<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(auth::user()->name);
        // Validation
        $request->validate([
            'tag' => 'required',
            'title' => 'required|unique:news,title',
            'editor' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slug = Str::of($request->title)->slug('-');
        // Save
        $news = new news;
        $news->slug = $slug;
        $news->tag = $request->tag;
        $news->title = $request->title;
        $news->author = Auth::user()->name;
        $news->content = $request->editor;
        $item = $request->thumbnail;
        $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
        $news->thumbnail = $imageName;
        $item->move(public_path() . '/assets/img/news', $imageName);
        $news->save();
        return redirect('/admin/news')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        // Cek Judul
        if ($request->title != $request->oldTitle) {
            $title = 'required|unique:news,title';
        } else {
            $title = 'required';
        }
        // dd($request->all());
        $slug = Str::of($request->title)->slug('-');
        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'title' => $title,
                'editor' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $ubah = News::findorfail($news->id);
            $awal = $ubah->thumbnail;

            $dt = [
                'slug' => $slug,
                'thumbnail' => $awal,
                'title' => $request->title,
                'content' => $request->editor,
                'author' => Auth::user()->name,
            ];
            $request->thumbnail->move(public_path() . '/img', $awal);
            $ubah->update($dt);
        } else {
            $request->validate([
                'title' => $title,
                'editor' => 'required'
            ]);
            $ubah = News::findorfail($news->id);
            $dt = [
                'slug' => $slug,
                'title' => $request->title,
                'content' => $request->editor,
                'author' => Auth::user()->name,
            ];
            $ubah->update($dt);
        }


        return redirect('/admin/news')->with('status', 'Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (File::exists(public_path('assets/img/news/' . $news->thumbnail))) {
            File::delete(public_path('assets/img/news/' . $news->thumbnail));
            News::destroy($news->id);
        } else {
            dd('File does not exists.');
        }
        return redirect('/admin/news')->with('status', 'Data Berhasil Dihapus');
    }
}
