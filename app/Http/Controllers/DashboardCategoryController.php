<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    public function index() {
        return view('dashboard.categories.index', [
            'title' => 'Kategori Blog',
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => "Tambah Kategori Blog",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:categories',
            'meta_desc' => 'nullable',
            'keywords'  => 'nullable',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => "Edit Kategori Blog",
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name'      => 'required|max:255',
            'meta_desc' => 'nullable',
            'keywords'  => 'nullable',
        ];
        
        if($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil diperbaharui!');
    }

    public function destroy(Category $category)
    {
        try {
            Category::destroy($category->id);

            return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus!');
        } catch (Exception $e) {
            report($e);

            return back()->with('error', 'Kategori tidak dapat dihapus karena terdapat relasi dengan Artikel, ubah Kategori pada Artikel terlebih dahulu!');
        }
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
