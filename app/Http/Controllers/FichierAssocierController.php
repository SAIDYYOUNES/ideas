<?php

namespace App\Http\Controllers;

use App\Models\fichier_associer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FichierAssocierController extends Controller
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
    public function show(fichier_associer $fichier_associer): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fichier_associer $fichier_associer): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fichier_associer $fichier_associer): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fichier_associer $fichier_associer): RedirectResponse
    {
        //
    }
}
