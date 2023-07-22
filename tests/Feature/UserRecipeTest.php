<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;

class UserRecipeTest extends TestCase{
    use RefreshDatabase, WithFaker;

    protected $user;

    protected function setUp(): void{
        parent::setUp();

        // Napravi user-a s kojim ces da pravis, editujes, brises recepte
        $this->user = User::factory()->create();
    }

    public function test_user_can_register(){
      
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
        ];
    
       
        $response = $this->post('/users', $userData);
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

        public function test_user_can_login(){
           
            $loginData = [
                'email' => $this->user->email,
                'password' => 'password'
            ];

           
            $response = $this->post('/authenticate', $loginData);
           
            $this->assertAuthenticatedAs($this->user);
        }

        public function test_user_can_logout(){
          
            $response = $this->actingAs($this->user)
                            ->post('/logout');

         
            
            $this->assertGuest();
        }

        public function test_user_can_create_recipe(){
            
            $recipeData = Recipe::factory()->create(['user_id' => $this->user->id]);
        
            $response = $this->actingAs($this->user)
                             ->post('/recipes', $recipeData->toArray());
        
            $this->assertDatabaseHas('recipes', $recipeData->toArray());
        }


        public function test_user_can_edit_recipe()
        {
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
                'ingredients' => $originalRecipeData['ingredients']
            ];
        
         
            $response = $this->actingAs($this->user)
                             ->put("/recipes/{$recipe->id}", $updatedRecipeData);
        
          
            $this->assertDatabaseHas('recipes', $updatedRecipeData);
        }

        public function test_user_can_delete_recipe(){
         
            $recipe = Recipe::factory()->create(['user_id' => $this->user->id]);

           
            $response = $this->actingAs($this->user)
                            ->delete("/recipes/{$recipe->id}");

        
           
            $this->assertDatabaseMissing('recipes', ['id' => $recipe->id]);
        }

}