<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump( $request->input('text'));
        $request->validate(
            [
                'text' => 'required',
                  
            ]
        );
        commentaire::create(
            [
                'text' => $request->input('text'),
               'post_id'=>$request->input('post_id'),
                'user_id' => auth()->user()->id,
                'like' => 2,

            ]
        );
        return redirect('/posts/'.$request->input('slug'));
    }

    /**
     * Display the specified resource.
     */
    public function show(commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commentaire $commentaire)
    {
        //
    }
}
