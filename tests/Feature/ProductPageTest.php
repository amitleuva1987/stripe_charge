<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest_can_not_visit_product_detail_page()
    {
        $response = $this->get('/product/1');
        $response->assertRedirect('/login');
    }

    public function test_users_can_visit_product_detail_page()
    {
        $this->seed();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/product/1');
        $response->assertStatus(200);
    }
}
