<?php

namespace App\Http\Controllers\artist;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\ArtProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $user = auth()->user();
        
        $projects = $user->artProjects->filter(function ($project) {
            return $project->pivot->response_status === 1;
        });    
        
        return view('user.profile', compact('projects' ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create.projetcs');
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
        
        return redirect()->route('Profile.index')->with('status','The Project has been created successfully Wait till The Support Team Accept Your Project');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        $projects = $user->artProjects()->wherePivot('response_status', 1)->get();
    
        return view('admin.profile', compact('projects', 'user'));
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
