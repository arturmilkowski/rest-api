<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{User, Book};

class UserTest extends TestCase
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
        $this->actingAs($user);

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
        $this->actingAs($user);

        $this->assertInstanceOf(Collection::class, $user->books);
    }


    // API tests /////////////////////////////////////////////////////////////

    /**
     * User index test.
     *
     * @return void
     */
    public function testApiUserIndex(): void
    {
        $this->withoutExceptionHandling();

        $users = User::factory()->count(3)->create();
        $response = $this->actingAs($users[0]);
        $response = $this->getJson(route('users.index'));

        $response->assertStatus(200);
    }

    /**
     * User store test.
     *
     * @return void
     */
    public function testApiUserStore(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->make();
        $response = $this->actingAs($user);
        $user->makeVisible(['password']);
        $response = $this->postJson(route('users.store'), $user->toArray());
        
        $user->makeHidden(['password']); 
        $response
            ->assertStatus(201)
            ->assertJson(
                [
                    'data' => [
                        'created' => true,
                        'user' => [
                            'slug' => $user->slug,
                            'firstname' => $user->firstname,
                            'lastname' => $user->lastname,
                        ]
                    ]
                ]
            );
    }

    /**
     * User show test.
     *
     * @return void
     */
    public function testApiUserShow(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->getJson(route('users.show', $user));

        $response->assertStatus(200);
        $response->assertJson(
            [
                'data' => [
                    'id' => $user->id,
                    'slug' => $user->slug,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                ]
            ]
        );
    }

    /**
     * User update test.
     *
     * @return void
     */
    public function testApiUserUpdate(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $user1 = User::factory()->make();
        $response = $this->actingAs($user);
        $response = $this->putJson(
            route('users.update', $user),
            $user1->toArray()
        );

        $response->assertStatus(200);
        $response->assertJson(
            [
                'data' => [
                    'updated' => true,
                    'user' => [
                        'id' => $user->id,
                        'slug' => $user1->slug,
                        'firstname' => $user1->firstname,
                        'lastname' => $user1->lastname,
                    ]
                ]
            ]
        );
    }

    /**
     * User delete test.
     *
     * @return void
     */
    public function testApiUserDestroy(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->deleteJson(route('users.destroy', $user));

        $response->assertStatus(200);
        $response->assertJson(['data' => ['deleted' => true]]);
    }
}
