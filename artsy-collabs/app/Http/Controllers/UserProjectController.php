<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProjectRequest;
use App\Mail\ProjectStatusUpdated;
use App\Models\ArtProject;
use App\Models\ArtProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userProjects = User::with('artProjects')->get();
        return view('admin.userproject' , compact('userProjects'));
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
    public function store(StoreUserProjectRequest $request)
    {
        $project = ArtProject::findOrFail($request->project_id);
        $project->users()->syncWithoutDetaching($request->user_id);
    
        return redirect()->back()->with('status', 'User assigned to project successfully.');
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
    $request->validate([
        'status' => 'required|in:0,1,2', 
        'project_id' => 'required|exists:art_projects,id', 
        'user_id' => 'required|exists:users,id',
    ]);

    $userProject = ArtProjectUser::where('art_project_id', $request->project_id)
        ->where('user_id', $request->user_id)
        ->firstOrFail();

    $userProject->response_status = $request->status;
    $userProject->save();

    $user = $userProject->user;

    if ($user) {
        Mail::to($user)->send(new ProjectStatusUpdated($userProject));
    }

    return redirect()->back()->with('status', 'Response status updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
    
}
