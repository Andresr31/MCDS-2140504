<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'           => 'Xbox Series x',
            'description'    => 'Nueva consola de Microsoft',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name'           => 'Nintendo Switch',
            'description'    => 'Nueva consola de Nintendo',
            'created_at' => now(),
        ]);

        $cat = new Category;
        $cat->name = 'Play Station 5';
        $cat->description = 'Nueva Consola de Sony';
        $cat->save();

    }

    
}
