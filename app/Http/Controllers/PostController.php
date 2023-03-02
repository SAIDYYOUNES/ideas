<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        // var_dump($posts);
        return view('post.index', ['posts' => $posts]);
    }
  
    public function search(Request $request){
        
        $search = $request->input('search');
    
        $posts = Post::query()
            ->where('description', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%")
            ->get();
    
        
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('post.create')->with('categories',category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'img' => 'required',
                'file' => 'required',
                'slug' => 'required',
                'description' => 'required',
                'categories' => 'required',
            ]
        );
        
        $image = $request->slug.'-'.$image=uniqid().'.'.$request->img->extension();
        $request->file('img')->move(public_path('img'),$image);
        // dd();
        // dd($request->file('file'));
        $post = new post;
        $post->file = $image;
        $post->fichier = $request->input('file');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        
        $post->user_id= auth()->user()->id;
        
        $post->save();
        
        $post->categories()->attach($request->input('categories'));
        $post->save();

        return redirect('/posts');
    }

    public function show($slug)
    {
        return view('post.show')->with('post', post::where('slug', $slug)->first());
    }
    public function category($category)
    {
        return view('post.index')->with('posts', category::find($category)->posts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        return view('post.edit')->with('post', post::where('slug', $slug)->first());
    }

   
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                
                'img' => 'required',
                'file' => 'required',
                'slug' => 'required',
                'description' => 'required',
                // 'categories' => 'required',
            ]
        );
        
        $imageupdate = $request->slug.'-'.uniqid().'.'.$request->img->extension();
        $request->file('img')->move(public_path('img'),$imageupdate);
        $update_post=post::findorfail($id);
        $update_post->file = $imageupdate;
        $update_post->slug =$request->input('slug');
        $update_post->description = $request->input('description');
        $update_post->fichier = $request->input('file');
        // $update_post->category= $request->input('category');
        $update_post->save();
        return redirect('/posts/'.$update_post->slug)->with('message','post updated')
        ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect('/posts')->with('message','post deleted');
    }
}