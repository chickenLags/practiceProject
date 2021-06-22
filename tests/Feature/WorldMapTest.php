<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorldMapTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shouldReachWorldMap()
    {
        $this->get('/world-map')
            ->assertStatus(302);
    }

    public function test_shouldShowWorldMap()
    {
        $this->get('/world-map')
            ->assertSee('.grid-item');
    }
}
