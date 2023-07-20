<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cook' ,
        'title',
        'email' ,
        'location',
        'difficulty',
        'tags',
        'ingredients',
        'description'
    ];

    public function scopeFilter($query){
        if(request('difficulty') ?? false){
            $query->where('difficulty' , '=', request('difficulty'));
        }

        if(request('tag') ?? false){
            $query->where('tags', 'LIKE', '%'. request('tag') .'%');
        }

        if(request('search') ?? false){
            $query->where('tags', 'LIKE', '%'. request('search') .'%')
                ->orWhere('ingredients', 'LIKE' ,'%'.request('search').'%')
                ->orWhere('description', 'LIKE', '%'.request('search').'%')
                ->orWhere('title', 'LIKE', '%' .request('search').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
