<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_db_seeder_works()
    {
        $this->assertDatabaseCount('products', 0);
        $this->seed();
        $this->assertDatabaseCount('products', 10);
    }
}
