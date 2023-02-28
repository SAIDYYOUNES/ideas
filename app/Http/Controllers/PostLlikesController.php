<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\postLlikes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class PostLlikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(post $post, Request $request)
    {
        // $request->validate([
            
        // ]);

        
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            return response(null, 409); // Conflict status code (user has already liked the post)
        }

        // Create a new like for the post and the authenticated user
        $postLike = new postlLikes();
        $postLike->user_id = auth()->id();
        $postLike->post_id = $post->id;
        $postLike->save();

        return  Redirect::back(); // No content status code (successful like)
    }

    /**
     * Display the specified resource.
     */
    public function show(postLlikes $postLlikes): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(postLlikes $postLlikes): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, postLlikes $postLlikes): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        postLlikes::where('post_id',$post)->where('user_id',auth()->id())->delete();
        return  Redirect::back(); 
    }
}
