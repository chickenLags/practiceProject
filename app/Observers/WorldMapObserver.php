<?php

namespace App\Observers;

use App\Models\WorldMap;

class WorldMapObserver
{
    /**
     * Handle the WorldMap "created" event.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return void
     */
    public function created(WorldMap $worldMap)
    {
        //
    }

    /**
     * Handle the WorldMap "updated" event.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return void
     */
    public function updated(WorldMap $worldMap)
    {
        //

    }

    /**
     * Handle the WorldMap "deleted" event.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return void
     */
    public function deleted(WorldMap $worldMap)
    {
        //
    }

    /**
     * Handle the WorldMap "restored" event.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return void
     */
    public function restored(WorldMap $worldMap)
    {
        //
    }

    /**
     * Handle the WorldMap "force deleted" event.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return void
     */
    public function forceDeleted(WorldMap $worldMap)
    {
        //
    }

    /**
     * Handle the WorldMap "retrieved" event.
     *
     * @param  \App\Models\WorldMap  $worldMap
     * @return void
     */
    public function retrieved(WorldMap $worldMap)
    {
        //
    }
}
