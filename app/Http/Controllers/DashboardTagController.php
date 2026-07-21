<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardTagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('dashboard.tags.index', [
            'title' => "Tag Blog",
            'tags'  => $tags
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:tags',
            'keywords'   =>  'required',
            'meta_desc'   =>  'required',
        ]);

        Tag::create($validatedData);

        return redirect()->back()->with('success','Data berhasil ditambahkan!');
    }

    public function update(Request $request, Tag $tag, $id) {

        $rules = [
            'name' =>  'required|max:255',
            'meta_desc' => 'nullable',
            'keywords'  => 'nullable',
            // 'status' => 'required'
        ];
        
        if($request->slug != $tag->slug) {
            $rules['slug'] = 'required|unique:tags';
        }

        $validatedData = $request->validate($rules);

        Tag::where('id', $tag->id)->update($validatedData);

        return redirect()->back()->with('success','Data berhasil diperbaharui!');
        // $validatedData = $request->validate([
    }

    public function destroy(Tag $tag) {

        Tag::destroy($tag->id);

        return redirect('/dashboard/posts')->with('success', 'Tag berhasil dihapus!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Tag::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
