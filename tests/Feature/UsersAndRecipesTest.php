<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersAndRecipesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;

    public function setUp() : void{
        parent::setUp();

        $this->user = User::factory()->create();
    }


    public function test_user_can_register(){
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->post('/users', $userData);


        $this->assertDatabaseHas('users', ['email' => $userData['email']]);

    }

    
    public function test_user_can_login(){
        
        $loginData = [
            'email' => $this->user->email,
            'password' => 'password', 
        ];

        
        $response = $this->post('/authenticate', $loginData);

        $this->assertAuthenticatedAs($this->user);
     }


     public function test_user_can_logout(){
    
        $response = $this->actingAs($this->user)
                        ->post('/logout');

    
        $response->assertStatus(302); 
        $this->assertGuest();
    }

    public function test_user_can_create_recipe(){
        $recipe = Recipe::factory()->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)
        ->post('/recipes', $recipe->toArray());

        $this->assertDatabaseHas('recipes', $recipe->toArray());
    }

    public function test_user_can_delete_recipe(){  
        $recipe = Recipe::factory()->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)
                        ->delete("/recipes/{$recipe->id}");

    
        $this->assertDatabaseMissing('recipes', ['id' => $recipe->id]);
    }

        public function test_user_can_edit_recipe(){
            $recipe = Recipe::factory()->create(['user_id' => $this->user->id]);

            $originalRecipeData = $recipe->toArray();

            $updatedRecipeData = [
                'title' => 'Updated Recipe Title',
                'description' => 'Updated recipe description.',
                'cook' => $originalRecipeData['cook'],
                'email' => $originalRecipeData['email'],
                'location' => $originalRecipeData['location'],
                'difficulty' => $originalRecipeData['difficulty'],
                'tags' => $originalRecipeData['tags'],
                'ingredients' => $originalRecipeData['ingredients'],
            ];

            $response = $this->actingAs($this->user)
                            ->put("/recipes/{$recipe->id}", $updatedRecipeData);

            

            $this->assertDatabaseHas('recipes', $updatedRecipeData);
    }
}
