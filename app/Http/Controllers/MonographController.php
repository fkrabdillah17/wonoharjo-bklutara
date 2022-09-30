<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Monograph;
use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MonographController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::all();
        // $sub_categories = Sub_category::all();
        $monographs = monograph::all();
        return view('admin.monograph.index', [
            "monographs" => $monographs,
            // "categories" => $categories,
            // "sub_categories" => $sub_categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.monograph.create', compact('categories'));
    }
    public function create_category()
    {
        // $categories = DB::table('categories')->pluck("categories", "id");
        $monographs = monograph::all();
        $categories = Category::all()->sortBy("category");
        $sub_categories = Sub_category::all()->sortBy("sub_category");
        return view('admin.monograph.create_category', [
            "monographs" => $monographs,
            "categories" => $categories,
            "sub_categories" => $sub_categories,
        ]);
    }

    public function Filter($id)
    {
        echo json_encode(sub_category::where('category_id', $id)->get());
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
            'editor' => 'required',
            'category' => 'required',
            'sub_category' => 'required|unique:monographs,sub_category_id',
        ]);

        $monograph = new monograph;
        $monograph->category_id = $request->category;
        $monograph->sub_category_id = $request->sub_category;
        $monograph->content = $request->editor;
        $monograph->save();
        return redirect('/admin/monograph/')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function store_category(Request $request)
    {
        // dd($request->all());
        $sub = new sub_category;
        $category = new category;
        if ($request->options == "category") {
            $request->validate([
                'category' => 'required|unique:categories,category',
            ]);
            $category->category = $request->category;
            $category->save();
        } else {
            $request->validate([
                'tag' => 'required',
                'sub_category' => 'required|unique:sub_categories,sub_category',
            ]);
            $sub->category_id = $request->tag;
            $sub->sub_category = $request->sub_category;
            $sub->save();
        }
        return redirect('/admin/monograph/create-category')->with('status', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function show(Monograph $monograph)
    {
        return view('admin.monograph.show', compact('monograph'));
    }
    public function show_category(Category $category)
    {
        $sub_category = Sub_category::all();
        return view('admin.monograph.show_category', [
            'category' => $category,
            'sub_category' => $sub_category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function edit(Monograph $monograph)
    {
        return view('admin.monograph.edit', compact('monograph'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monograph $monograph)
    {
        // dd($request->all());
        $ubah = Monograph::findorfail($monograph->id);
        $dt = [
            'content' => $request->editor,
        ];
        $ubah->update($dt);
        return redirect('/admin/monograph')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monograph $monograph)
    {
        Monograph::destroy($monograph->id);
        return redirect('/admin/monograph')->with('status', 'Data Berhasil Dihapus');
    }
    public function destroy_category(Category $category)
    {
        // dd($category);
        DB::table('sub_categories')->where('category_id', $category->id)->delete();
        Category::destroy($category->id);
        return redirect('/admin/monograph/create-category')->with('status', 'Kategori Berhasil Dihapus');
    }
    public function destroy_sub_category(Sub_category $sub_category)
    {
        // dd($sub_category);
        Sub_category::destroy($sub_category->id);
        return redirect('/admin/monograph/create-category')->with('status', 'Sub Kategori Berhasil Dihapus');
    }
}
