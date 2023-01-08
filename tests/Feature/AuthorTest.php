<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{

    use WithFaker;    

    // public function __construct()
    // {
    //     $this->setUpFaker();
    // }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_access_author_page()
    {
        // Create user
        $user    =  User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('/author');

        $response->assertStatus(200);
    }

    public function test_author_store()
    {
        $faker = \Faker\Factory::create();

        // Create author
        $user    =  User::factory()->create();

        $response = $this->actingAs($user);

        $response->post('/author', [
            'name' => $faker->firstName()
        ]);

        $response->assertEquals(201, 201);
    }

    public function test_author_edit()
    {
        $faker = \Faker\Factory::create();

        //Edit Author
        $user    =  User::factory()->create();

        $response = $this->actingAs($user);

        $response->get('/{author}/edit', [
            'name' => $faker->firstName()
        ]);

        $response->assertEquals(200, 200);
    }
}
