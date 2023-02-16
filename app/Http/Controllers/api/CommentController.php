<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\comment as commentResource;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends BaseController
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
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment): RedirectResponse
    {
        //
    }
}
