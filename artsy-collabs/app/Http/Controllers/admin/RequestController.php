<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProjectRequest;
use App\Models\ArtProject;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendRequest(StoreUserProjectRequest $request){
        $project = ArtProject::findOrFail($request->project_id);
        $project->users()->syncWithoutDetaching(Auth::user());
    
        return back()->with('status', 'Request sent successfully. Wait Till The Support Team Accept Your Request');
    }

    /**
     * Show the form for creating a new resource.
     */
    }
