<?php

namespace App\Http\Controllers;

use App\Models\salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = salle::all();
        return view('pages.salle.index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.salle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(salle $salle)
    {
        return view('pages.salle.edit', compact('salle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salle $salle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salle $salle)
    {
        //
    }
}
