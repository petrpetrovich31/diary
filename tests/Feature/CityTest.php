<?php

namespace Tests\Feature;

use App\Models\City\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test api method of cities
     */
    public function test_api_cities(): void
    {
        $response = $this->get('/api/cities');
        $response->assertStatus(200);
    }

    /**
     * Test api method of city
     */
    public function test_api_city(): void
    {
        $city = City::factory()->create();

        $response = $this->get('/api/cities/' . $city->id);
        $response->assertStatus(200);

        $response = $this->get('/api/cities/'. ++$city->id);
        $response->assertStatus(404);
    }
}
