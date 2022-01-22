<?php

namespace Tests\Feature;

use App\Models\Place\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaceTest extends TestCase
{
    /**
     * Test api method of places
     */
    public function test_api_places(): void
    {
        $response = $this->get('/api/places');

        $response->assertStatus(200);
    }

    /**
     * Test api method of place
     */
    public function test_api_place(): void
    {
        $place = Place::factory()->create();

        $response = $this->get('/api/places/' . $place->id);
        $response->assertStatus(200);

        $response = $this->get('/api/places/' . ++$place->id);
        $response->assertStatus(404);
    }
}
