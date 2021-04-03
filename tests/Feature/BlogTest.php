<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $blog = Blog::factory()->create();

        $result = $blog->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $blog = Blog::factory()->create();
        $user = User::factory()->create();
        $blog->likes()->attach($user);

        $result = $blog->isLikedBy($user);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        $blog = Blog::factory()->create();
        $user = User::factory()->create();
        $another = User::factory()->create();
        $blog->likes()->attach($another);

        $result = $blog->isLikedBy($user);

        $this->assertFalse($result);
    }
}
