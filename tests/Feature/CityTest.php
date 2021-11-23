<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityTest extends TestCase
{
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
        $response = $this->get('/api/cities/1');

        $response->assertStatus(200);
    }
}
