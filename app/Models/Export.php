<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;


    public function usersAndRecipes(){
        $data = DB::table('users')
                ->join('recipes', 'user_id', '=', 'users.id')
                ->select('users.email', 'users.name', 'recipes.title')
                ->get();
                
        return $data;
    }
}
