<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['placement'] = Placement::all();
        return view("admin.managePlacements", $data);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['placement'] = Placement::all();
        return view("admin.addPlacements", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'company_name' => 'required',
            'image' => 'required|image',
        ]);
        
        $filename = $request->image->getClientOriginalName();
        $request->image->move(\public_path('cover/'),$filename);
        $data['image'] = $filename;
        Placement::create($data);
        return redirect()->route("placement.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function show(Placement $placement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function edit(Placement $placement)
    {
        $data['placement'] = $placement;
        return view("admin.editPlacements",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Placement $placement)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'company_name' => 'required',
        ]);
        $filename = $request->image->getClientOriginalName();
        $request->image->move(\public_path('cover/'),$filename);
        $placement['image'] = $filename;
        $placement->name = $request->name;
        $placement->position = $request->position;
        $placement->company_name = $request->company_name;
        $placement->save();
        return redirect()->route("placement.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Placement $placement)
    {
        $placement->delete();
        return redirect()->route("placement.index");
    }
}
