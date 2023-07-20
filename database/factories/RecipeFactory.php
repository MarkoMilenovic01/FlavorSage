<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){

        $allCookingTechniques = ['Boiling', 'Frying', 'Roasting', 'Grilling', 'Slicing', 'Decorating', 'Preparing the sauce', 'Poaching'];
        $randomSubArray1 = Arr::random($allCookingTechniques, 3);

        $foodIngredients = [
            'Salt',
            'Pepper',
            'Garlic',
            'Onion',
            'Olive Oil',
            'Butter',
            'Lemon',
            'Chicken',
            'Beef',
            'Pork',
            'Tomato',
            'Basil',
            'Thyme',
            'Rosemary',
            'Cumin',
            'Coriander',
            'Paprika',
            'Cinnamon',
            'Ginger',
            'Turmeric',
            'Cardamom',
            'Chili Powder',
            'Cayenne Pepper',
            'Mustard',
            'Mayonnaise',
            'Ketchup',
            'Soy Sauce',
            'Fish Sauce',
            'Vinegar',
            'Sugar',
            'Honey',
            'Milk',
            'Cream',
            'Yogurt',
            'Cheese',
            'Eggs',
            'Flour',
            'Rice',
            'Pasta',
            'Bread',
            'Quinoa',
            'Lentils',
            'Beans',
            'Chickpeas',
            'Spinach',
            'Kale',
            'Lettuce',
            'Cucumber',
            'Carrot',
            'Broccoli',
            'Cauliflower',
            'Mushroom',
            'Zucchini',
            'Bell Pepper',
            'Potato',
            'Sweet Potato',
            'Avocado',
            'Banana',
            'Apple',
            'Orange',
            'Strawberry',
            'Blueberry',
            'Raspberry',
            'Mango',
            'Pineapple',
            'Watermelon',
            'Grapes',
            'Peach',
            'Pear',
            'Coconut',
            'Almonds',
            'Walnuts',
            'Cashews',
            'Peanuts',
            'Pistachios',
            'Hazelnuts',
            'Sunflower Seeds',
            'Chia Seeds',
            'Flaxseeds',
            'Oats',
            'Granola',
            'Chocolate',
            'Vanilla',
            'Cocoa Powder',
            'Honey',
            'Maple Syrup',
            'Caramel',
            'Ice Cream',
            'Cake',
            'Pie',
            'Cookies',
            'Brownies',
            'Cupcakes',
            'Pancakes',
            'Waffles',
            'Smoothie',
            'Juice',
            'Coffee',
            'Tea'
            // Add more food ingredients as needed // CHATGPT generated (Hteo sam da fetchujem sa nekog sajta JSON i da odatle biram random key value ali nisam naso nijedan
            // Ukoliko nadjes top.
        ];
        $randomSubArray2 = Arr::random($foodIngredients, mt_rand(2, 10));

        return [
            'cook' => $this->faker->name(),
            'title' => $this->faker->sentence(),
            'tags' => implode(',', $randomSubArray1),
            'email' => $this->faker->companyEmail(),
            'ingredients' => implode(',', $randomSubArray2),
            'difficulty' => mt_rand(1,10),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
