<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks = Track::paginate(5);
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
//        dd($request->all());
        ####
        $request->validate(["name"=>"required|unique:tracks,name",
            "description"=>"min:4"]);
        $track = Track::create($request->all());
        return to_route('tracks.show',$track);
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //

        return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
    }
}
