<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class PagesController extends Controller
{
    public function index(){

        $posts = Post::orderBy('updated_at', 'desc')->paginate(5);
        
        return view('pages.index')->with('posts',$posts);
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function search(Request $request){

        $input = $request->input('search');
 
        $posts = Post::where(
            'title', 'LIKE', '%' .$input .'%'
        )->orWhere('body', 'LIKE', '%' .$input .'%')->get();
 
        return view('posts.search')->with('posts',$posts);
 
     }

    public function category($category){

        $posts = DB::select('SELECT a.id, a.title, a.body, a.created_at, a.tags, c.category, d.name  FROM neos_antras.posts a
        INNER JOIN neos_antras.category_post b
           ON b.post_id = a.id
        INNER JOIN neos_antras.categories c
        ON b.category_id = c.id 
        INNER JOIN neos_antras.users d 
        ON d.id = a.user_id
        WHERE c.category = "'.$category.'";
        ');

        return view('categories.category', compact('posts', 'category'));
    }

    public function tags($category){

        $posts = DB::select('SELECT a.id, a.title, a.body, a.created_at, a.tags, c.category, d.name  FROM neos_antras.posts a
        INNER JOIN neos_antras.category_post b
           ON b.post_id = a.id
        INNER JOIN neos_antras.categories c
        ON b.category_id = c.id 
        INNER JOIN neos_antras.users d 
        ON d.id = a.user_id
        WHERE a.tags LIKE "%'.$category.'%";
        ');

        return view('categories.category', compact('posts','category'));
    }

}
