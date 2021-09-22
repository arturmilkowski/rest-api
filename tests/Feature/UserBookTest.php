<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\{User, Book};

class UserBookTest extends TestCase
{
    use RefreshDatabase;

    // API tests /////////////////////////////////////////////////////////////

    /**
     * User's book index test.
     *
     * @return void
     */
    public function testApiUserBookIndex(): void
    {
        $this->withoutExceptionHandling();

        $users = User::factory(3)
            ->has(Book::factory()->count(3))
            ->create();
            $response = $this->actingAs($users[0]);
        $response = $this->getJson(route('users.books.index', $users[0]));

        $response->assertStatus(200);
    }

    /**
     * Attach the book to the user.
     *
     * @return void
     */
    public function testApiBookAttach(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $book = Book::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->getJson(route('users.books.attach', [$user, $book]));
        
        $response->assertStatus(200)->assertJson(['data' => ['success' => true]]);
    }

    /**
     * Detach the book from the user.
     *
     * @return void
     */
    public function testApiBookDetach(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $book = Book::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->getJson(route('users.books.detach', [$user, $book]));

        $response->assertStatus(200)->assertJson(['data' => ['success' => true]]);
    }
}
