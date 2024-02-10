<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Models\ArtProject;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        $projects = ArtProject::all();
        $partnerId = $partners->isNotEmpty() ? $partners->first()->id : null;
        return view('admin.partners' , compact('partners' , 'projects' , 'partnerId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.partners');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $partner = Partner::create($request->all());
        $partner->addMediaFromRequest('logo')->toMediaCollection('images');
        $partner->save();
        return redirect('partners')->with('status','The Partner Has Been Created Successfully!');
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
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->back()->with('status','The Partner Deleted Successfully');
    }
}
