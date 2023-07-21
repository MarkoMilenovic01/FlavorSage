<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_USER = 0;
    const ROLE_MANAGER = 1;
    const ROLE_ADMIN = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipes(){
        return $this->hasMany(Recipe::class, 'user_id');
    }
    
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isManager()
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isUser()
    {
        return $this->role === self::ROLE_USER;
    }

    public function usersAndRecipes(){
        $data = DB::table('users')
                ->join('recipes', 'user_id', '=', 'users.id')
                ->select('users.email', 'users.name', 'recipes.title')
                ->get();
                
        return $data;
    }

   

}

