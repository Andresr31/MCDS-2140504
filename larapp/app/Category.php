<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'image', 
        'description',
    ];

    public function games(){
        return $this->hasMany('App\Game');
    }

    public function scopeNames($categories, $q) {
        if (trim($q)) {
            $categories->where('name','LIKE',"%$q%")
                  ->orWhere('description','LIKE',"%$q%");
        }
    }
    
}
