<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Monograph;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Profile;
use App\Models\Information;
use Illuminate\Support\Str;

class VisitorController extends Controller
{
    public function home()
    {
        $slider = Information::all();
        $count = Information::all()->count();
        $news = News::all()->sortDesc()->take(3);
        return view('user.index', [
            'slider' => $slider,
            'count' => $count,
            'news' => $news,
            'title' => "Beranda"
        ]);
    }
    public function visi_misi()
    {
        $kategori = News::all()->unique('tag');
        $news = News::latest()->take(5)->get();
        $data = Profile::where('tag', 'visimisi')->get();
        // dd($news);
        return view('user.visimisi', [
            'data' => $data,
            'title' => "Visi Misi",
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function sejarah()
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = Profile::where('tag', 'sejarah')->get();
        return view('user.sejarah', [
            'data' => $data,
            'title' => "Sejarah",
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function struktur_organisasi()
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = Profile::where('tag', 'struktur')->get();
        return view('user.struktur', [
            'title' => "Struktur Organisasi",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function berita()
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = News::latest()->paginate(5);
        return view('user.berita', [
            'title' => "Berita",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function show_berita(news $data)
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        // $data = News::where('slug', $news->slug);
        return view('user.show_berita', [
            'title' => "Berita",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function kategori_berita($tag)
    {
        $data = News::where('tag', $tag)->paginate(5);
        // dd($data);
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        // $data = News::where('slug', $news->slug);
        return view('user.kategori_berita', [
            'title' => "Berita",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news,
            'kategori' => $tag
        ]);
    }
    public function usaha_desa()
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = Business::paginate(5);
        return view('user.usaha', [
            'title' => "Usaha Desa",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function show_usaha_desa(business $data)
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        return view('user.show_usaha', [
            'title' => "Usaha Desa",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news
        ]);
    }
    public function monografi()
    {
        $category = Category::all();
        $sub_category = Sub_category::all();
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = Monograph::all();
        return view('user.monografi', [
            'title' => "Monografi",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news,
            'maintag' => $category,
            'subtag' => $sub_category
        ]);
    }
    public function galeri_foto()
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = Gallery::where('tag', 'Foto')->latest()->paginate(4);
        return view('user.foto', [
            'title' => "Galeri Foto",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news,
        ]);
    }
    public function galeri_video()
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');
        $data = Gallery::where('tag', 'Video')->latest()->paginate(6);
        return view('user.video', [
            'title' => "Galeri Video",
            'data' => $data,
            'tag' => $kategori,
            'news' => $news,
        ]);
    }
    public function search(Request $request)
    {
        $news = News::latest()->take(5)->get();
        $kategori = News::all()->unique('tag');

        $key = trim($request->keyword);

        $data = News::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('content', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();
        $countdata = $data->count();
        $data2 = Business::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('description', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        $countdata2 = $data2->count();
        // dd($countdata);
        // dd($key);

        return view('user.search', [
            'title' => "Pencarian",
            'key' => $key,
            'data' => $data,
            'data2' => $data2,
            'tag' => $kategori,
            'news' => $news,
            'countdata' => $countdata,
            'countdata2' => $countdata2,
        ]);
    }
}
