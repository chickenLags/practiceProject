<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PerlinNoise;
use App\Models\Chunk;
use App\Models\Player;
use App\Models\User;
use App\Models\WorldMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class WorldMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return \Illuminate\Http\Response
     */
    public function show(WorldMap $worldMap1) : View
    {
        $user = Auth::user();
        $worldMap = WorldMap::aroundPlayer($user->player)->first();
        $worldMap->assureAllChunks($user->player);
        $worldMap->sortChunks();

        return view('world-map', [
            'worldMap' => $worldMap,
            'chunks' => $worldMap->chunks,
            'player' => $user->player,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return \Illuminate\Http\Response
     */
    public function edit(WorldMap $worldMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorldMap  $worldMap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorldMap $worldMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorldMap $worldMap)
    {
        //
    }
}
