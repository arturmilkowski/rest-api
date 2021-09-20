<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanBeInstantiated(): void
    {
        // $response = $this->get('/');
        // $response->assertStatus(200);
        
        $user = User::factory()->make();
        dd($user);
        $this->assertInstanceOf(User::class, $user);
    }
}
