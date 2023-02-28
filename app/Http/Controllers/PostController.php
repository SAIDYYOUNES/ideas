<?php

namespace App\Http\Controllers;

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
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'file' => 'required',
                'slug' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]
        );
        post::create(
            [
                'file' => $request->input('file'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'category' => $request->input('category'),
                'user_id' => auth()->user()->id,

            ]
        );
        return redirect('/posts');
    }

    public function show($slug)
    {
        return view('post.show')->with('post', post::where('slug', $slug)->first());
    }
    public function category($category)
    {
        return view('post.index')->with('posts', post::where('category', $category)->get());
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
                'file' => 'required',
                'slug' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]
        );
        $update_post=post::findorfail($id);
        $update_post->file = $request->input('file');
        $update_post->slug =$request->input('slug');
        $update_post->description = $request->input('description');
        $update_post->category= $request->input('category');
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