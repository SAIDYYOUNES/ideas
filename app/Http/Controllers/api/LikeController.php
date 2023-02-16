<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\like as likeResource;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeController extends BaseController
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
    public function show(like $like): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(like $like): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, like $like): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(like $like): RedirectResponse
    {
        //
    }
}
