<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use Illuminate\Http\Request;

class UpdateStatusController extends Controller
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
    public function create()
    {
        //
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
    public function update(Request $request, ArtProject $project)
    {
 
    
        $request->validate([
            'status' => 'required',
        ]);
        $project = ArtProject::findOrFail($request->project_id); 
        $project->status = $request->status; 
        $project->save();
    
        return redirect()->route('projects.index')->with('status', 'The Project has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
