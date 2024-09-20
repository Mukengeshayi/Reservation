<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes= User::paginate(4);
        return view('pages.employe.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
    $validatedData = $request->validated();
    User::create([
        'name' => $validatedData['name'],
        'firstname' => $validatedData['firstname'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'role' => $validatedData['role'],
    ]);
        return redirect()->route('employés.index')->with('success', 'Employé créée avec succès.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
