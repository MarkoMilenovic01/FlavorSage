<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function usersAndCount(){
        $data = DB::table('users AS u')
        ->select('u.id AS user_id', 'u.name AS user_name', DB::raw('COUNT(r.id) AS recipe_count'))
        ->leftJoin('recipes AS r', 'u.id', '=', 'r.user_id')
        ->groupBy('u.id', 'u.name')
        ->get();

        return $data;
    }
}
