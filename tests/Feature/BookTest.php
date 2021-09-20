<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Book;

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
        $book = Book::factory()->create();
        
        $this->assertInstanceOf(Collection::class, $book->users);
    }
}
