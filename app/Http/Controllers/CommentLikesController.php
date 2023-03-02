<?php

namespace App\Http\Controllers;

use App\Models\commentLikes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

    class CommentLikesController extends Controller
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
    public function store(Request $request)
    {
        $commentLike = new commentLikes();
        $commentLike->user_id = auth()->id();
        $commentLike->commentaire_id = $request->input('comment_id');
        $commentLike->save();

        return  Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(commentLikes $commentLikes): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commentLikes $commentLikes): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commentLikes $commentLikes): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($comment)
    {
        commentLikes::where('commentaire_id',$comment)->where('user_id',auth()->id())->delete();
        return  Redirect::back(); 
    }
}
