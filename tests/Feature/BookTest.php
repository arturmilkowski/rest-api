<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{User, Book};

class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create instance of book model test.
     *
     * @return void
     */
    public function testBookCanBeInstantiated(): void
    {
        $book = Book::factory()->make();

        $this->assertInstanceOf(Book::class, $book);
    }

    /**
     * Book belongs to many user test.
     *
     * @return void
     */
    public function testBookBelongsToManyUsers(): void
    {
        // $book = Book::factory()->create();
        $books = Book::factory()->count(3)->create();
        $user = User::factory()
            ->count(3)
            ->hasAttached($books)
            ->create();
        
        $this->assertInstanceOf(Collection::class, $books[0]->users);
    }

    // API tests /////////////////////////////////////////////////////////////

    /**
     * Book index test.
     *
     * @return void
     */
    public function testApiBookIndex(): void
    {
        $this->withoutExceptionHandling();

        Book::factory()->count(3)->create();
        $response = $this->getJson(route('books.index'));

        $response->assertStatus(200);
    }

    /**
     * Book store test.
     *
     * @return void
     */
    public function testApiBookStore(): void
    {
        $this->withoutExceptionHandling();

        $book = Book::factory()->make();
        $response = $this->postJson(route('books.store'), $book->toArray());
        
        $response
            ->assertStatus(201)
            ->assertJson(
                [
                    'data' => [
                        'created' => true,
                        'book' => [
                            'title' => $book->title,
                            'short_description' => $book->short_description,
                            'description' => $book->description,
                        ]
                    ]
                ]
            );
    }

    /**
     * Book show test.
     *
     * @return void
     */
    public function testApiBookShow(): void
    {
        $this->withoutExceptionHandling();

        $book = Book::factory()->create();
        $response = $this->getJson(route('books.show', $book));

        $response->assertStatus(200);
        $response->assertJson(
            [
                'data' => [
                    'id' => $book->id,
                    'title' => $book->title,
                    'short_description' => $book->short_description,
                    'description' => $book->description,
                ]
            ]
        );
    }

    /**
     * Book update test.
     *
     * @return void
     */
    public function testApiBookUpdate(): void
    {
        $this->withoutExceptionHandling();

        $book = Book::factory()->create();
        $book1 = Book::factory()->make();
        $response = $this->putJson(
            route('books.update', $book),
            $book1->toArray()
        );

        $response->assertStatus(200);
        $response->assertJson(
            [
                'data' => [
                    'updated' => true,
                    'book' => [
                        'id' => $book->id,
                        'title' => $book1->title,
                        'short_description' => $book1->short_description,
                        'description' => $book1->description,
                    ]
                ]
            ]
        );
    }

    /**
     * Book delete test.
     *
     * @return void
     */
    public function testApiBookDestroy(): void
    {
        $this->withoutExceptionHandling();

        $book = Book::factory()->create();
        $response = $this->deleteJson(route('books.destroy', $book));

        $response->assertStatus(200);
        $response->assertJson(['data' => ['deleted' => true]]);
    }
}
