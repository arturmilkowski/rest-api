<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{User, Book};

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create instance of User Model test.
     *
     * @return void
     */
    public function testUserCanBeInstantiated(): void
    {
        $user = User::factory()->make();
        
        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * User has many books test.
     *
     * @return void
     */
    public function testUserHasManyBooks(): void
    {
        $user = User::factory()
            ->has(Book::factory()->count(3))
            ->create();
        
        $this->assertInstanceOf(Collection::class, $user->books);
    }
}
