<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    public function index() {

        $posts = Post::all();
        $archives = Post::onlyTrashed()->get();

        return view('dashboard.posts.index', [
            'title' => 'Artikel Blog',
        ], compact('posts', 'archives'));
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            "title" => "Tambah Artikel",
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' =>  'required|max:255',
            'slug'  =>  'required|unique:posts',
            'category_id'   =>  'required',
            'image' => 'image|file|max:1024',
            'tags'  => 'required',
            'source' =>  'nullable',
            'copyright' =>  'nullable',
            'body' => 'required',
            'meta_desc' => 'required',
            'keywords' => 'required|max:255',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post->images');
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 400);

        try {
            $post = Post::create($validatedData);
        } catch (Throwable $e) {
            report($e);
     
            return false;
        }

        // $tags = explode(",", $request->tags);

        $post->tag($request->tags);

        // $post->attachTags($request->tags);

        return redirect('/dashboard/posts')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Post $post)
    {
        // $post = Post::with('tagged');
        return view('dashboard.posts.show', [
            "title" => "Preview Artikel",
            'post'  => $post
        ]);
    }

    public function edit(Post $post)
    {
        // $array1 = $post->tags->pluck('name');
        // foreach ($array1 as $key => $arg) {
        //     $results = $arg;
        // }
        // $tags = explode(',', $post->tags->count());
        // dd($tags);
        // $array1 = $post->tags->pluck('name');
        // foreach ($array1 as $key => $arg) {
        //     $results[] = $arg;
        // }
        // $tags = implode(',', $results);
        return view('dashboard.posts.edit', [
            "title" => "Edit Artikel",
            'post' => $post,
            // 'tag'   => $tags,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' =>  'required|max:255',
            'category_id'   =>  'required',
            'image' => 'image|file|max:1024',
            'source' =>  'nullable',
            'copyright' =>  'nullable',
            'body' => 'required',
            'meta_desc' => 'required',
            'keywords' => 'required|max:255',
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);


        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post->images');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 400);

        Post::where('id', $post->id)->update($validatedData);

        // $tags = explode(",", $post->tags);

        $post->retag($request->tags);

        return redirect('/dashboard/posts')->with('success', 'Artikel berhasil diperbaharui!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard/posts')->with('success', 'Artikel berhasil diarsipkan!');
    }

    public function restore($id) 
    {
        // $training->restore();
        Post::where('id', $id)->withTrashed()->restore();

        return redirect('/dashboard/posts')->with('success', 'Artikel berhasil direstore!');
    }


    // public function destroy(Post $post)
    // {
    //     if($post->image) {
    //         Storage::delete($post->image);
    //     }
    //     Post::destroy($post->id);

    //     return redirect('/dashboard/posts')->with('success', 'Artikel berhasil dihapus!');
    // }

    public function forceDelete($id) {

        $post = Post::onlyTrashed()->findOrFail($id);
    
        if($post->image){
            Storage::delete($post->image);
        }

        $post->untag();
        
        $post->forceDelete();

        return redirect('/dashboard/posts')->with('success', 'Artikel berhasil dihapus!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
    
    public function upload(Request $request) {
        $image = $request->file('upload');
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();

        $imageName = $fileName . '-' . time() . '.' . $extension;
        $path = $request->file('upload')->storeAs('uploads', $imageName);
        $url = Storage::url($path);
        
        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }
}
