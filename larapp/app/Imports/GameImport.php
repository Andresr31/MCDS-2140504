<?php

namespace App\Imports;

use App\Category;
use App\Game;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class GameImport implements ToModel
{
    public function model(array $row)
    {
        return new Game([
            'name' => $row[0],
            'description' => $row[1],
            'price' => $row[2],
            'user_id' => Auth::user()->id,
            'category_id' => Category::where('name',$row[3])->first()->id,
        ]);
    }
}
