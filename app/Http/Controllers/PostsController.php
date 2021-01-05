<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;




class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if(request()->has('sort')){
            $posts = Post::select("*")->orderBy('title', request()->query('sort'))->paginate(5);
        }else{
            $posts = Post::orderBy('updated_at', 'desc')->paginate(5);
        }
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required'
         
        ]);

        
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->tags = $request->input('tags');
        $post->save();
            
        DB::table('category_post')->insertOrIgnore([
            ['category_id' => $request->input('category_id'), 'post_id' => $post->id]
        ]);
        
        return  redirect('/posts'.'/'.$post->id)->with('success', 'Post Created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);

        return view('posts.show')->with('post',$post);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find($id);

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->categories()->attach($request->categories_id);
        $post->tags = $request->input('tags');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/posts')-> with('success', 'Post removed');

    }

    public function publish($id)
    {
        DB::update('UPDATE posts SET publish = 1 WHERE id = '.$id);

        return  redirect('/posts'.'/'.$id)->with('success','Post Published');
    }


    public function uploadImage(Request $request){


        try{ 

            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $imageName = time().'.'.$request->file('file')->extension();  
            $path = '/images/editor/'.$imageName;
            $request->file('file')->move(public_path('images/editor'), $imageName);
    
            return response($path);


        }catch(Throwable $e){
            dd($e);
        }

  
        
    }


}
