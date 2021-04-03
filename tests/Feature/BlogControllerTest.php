<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('blog.index'));

        $response->assertStatus(200)
            ->assertViewIs('blog.index');
    }

    public function testGuestCreate()
    {
        $response = $this->get(route('blog.create'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthCreate()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('blog.create'));

        $response->assertStatus(200)
            ->assertViewIs('blog.create');
    }
}
