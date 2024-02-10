<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $projects = ArtProject::where('status' , 1)->with('users')->get();
        return view('user.home' , compact('projects'));
    }

    public function store(Request $request)
    {
       
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artProject = ArtProject::with('partner')->findOrFail($id);
    return view('user.details', compact('artProject'));
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
}
