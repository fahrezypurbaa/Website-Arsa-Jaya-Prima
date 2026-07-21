<?php

namespace App\Http\Controllers;

use Alirezasedghi\LaravelTOC\TOCGenerator;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOMeta;

use App\Http\Requests\StorePostRequest;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Http\Requests\UpdatePostRequest;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
      
        SEOMeta::addKeyword(['Artikel K3']);
        SEOTools::setTitle('Artikel K3 | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Kumpulan Artikel tentang K3 atau health and safety seperti budaya keselamatan, perilaku K3, SMK3, APD, Risiko Industri Kimia, CSMS dll');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $title = '';

        if (request('kategori')) {
            $category = Category::firstWhere('slug', request('kategori'));
            $title = ' in ' . $category->name;
            SEOTools::setDescription($category->meta_desc);
        }

        if (request('tags')) {
            $tags = Tag::firstWhere('slug', request('tags'));
            $title = ' in ' . $tags->name;
        }

        $categories = Cache::remember('category_post_page', 60, function () {
            return Category::all();
        });

        $posts = Post::latest()->filter(request(['search', 'kategori', 'tags']))->paginate(6)->withQueryString();
        return view('posts', [
            "title" => "Blog" . $title,
            "active" => 'posts',
            'categories' => $categories,
            'list_post' => Post::latest()->take(4)->get(),
            "tags" => Tag::where('count', '>', 0)->get(),
            "posts" => $posts
        ]);
    }

    public function fetch(Tag $tag)
    {
        $slug = $tag->slug;
        $posts = Post::withAnyTag([$slug])->paginate(5)->withQueryString();

        return view('posts', [
            "title" => "Blog",
            "active" => 'posts',
            'categories' => Category::all(),
            'list_post' => Post::latest()->take(5)->get(),
            "tags" => Tag::where('count', '>', 0)->get(),
        ], compact('posts'));
    }

    public function show(Post $post)
    {
        SEOMeta::addKeyword([$post->keywords]);
        SEOTools::setTitle($post->title, 'Arsa Training & Consulting');
        SEOTools::setDescription($post->meta_desc);
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage("https://www.arsatraining.com/storage/{$post->image}", ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::twitter()->addValue('card', 'summary_large_image');
        SEOTools::twitter()->addValue('title', $post->name);
        SEOTools::twitter()->addValue('description', $post->meta_desc);
        SEOTools::twitter()->addValue('image', 'https://www.arsatraining.com/storage/'.$post->thumbnail);
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        OpenGraph::addProperty('type', 'article');
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
      
          $options = [
            'list_type' => 'ol',             
            'toc_class' => 'custom-toc',    
            'internal_list_class' => 'nested-toc', 
            'toc_item_class' => 'toc-item',  
            'toc_link_class' => 'toc-link',  
            'heading_class' => 'heading',   
        ];

        $tocGenerator = new TOCGenerator($post->body, $options);
        $toc = $tocGenerator->generateTOC();
        $processedHtml = $tocGenerator->getProcessedHtml();

        return view('post', [
            "title" => $post->title,
            "active" => 'posts',
            "post" => $post,
            'toc' => $toc,
            'content' => $processedHtml,
            'categories' => Category::all(),
            'list_post' => Post::with('author')->latest()->take(5)->get(),
            "tags" => Tag::where('count', '>', 0)->get()
        ]);
    }
}
