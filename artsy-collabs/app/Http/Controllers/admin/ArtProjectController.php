<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\ArtProject;
use App\Models\Partner;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artProject = ArtProject::all();
        $projects = ArtProject::onlyTrashed()->get();
        return view('admin.projects', compact('artProject' , 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.projetcs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $projectData = $request->validated();

        if (Auth::check() && Auth::user()->role->id == 1) {
            $projectData['status'] = array_search('Accepted', ArtProject::STATUS_LABELS);
        } else {
            $projectData['status'] = array_search('Pending', ArtProject::STATUS_LABELS);
        }

        $project = ArtProject::create($projectData);
        $project->addMediaFromRequest('cover')->toMediaCollection('images');

        return redirect()->route('projects.index')->with('status', 'The Project has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
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
        try {
            $this->authorize('update', $project);
            $request->validate([
                'partner_id' => 'required|exists:partners,id',
            ]);
    
            $project->partner_id = $request->input('partner_id');
            $project->save();
    
            return redirect()->route('partners.index')->with('status', 'The Project has been Assined to The Partner successfully');
        } catch (AuthorizationException $e) {
            return abort( 403);
        }
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = ArtProject::find($id);
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'The Project has been deleted successfully');
    }

    public function restore(string $id)
    {
        $project = ArtProject::withTrashed()->find($id);

        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Project not found.');
        }

        $project->restore();

        return redirect()->route('projects.index')->with('status', 'The Project has been restored successfully');
    }
 

}
