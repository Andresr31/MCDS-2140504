<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 
        'image', 
        'description',
        'user_id',
        'category_id',
        'slider',
        'price'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function scopeNames($games, $q) {
        if (trim($q)) {
            $games->where('name','LIKE',"%$q%")
                  ->orWhere('description','LIKE',"%$q%");
        }
    }

}
