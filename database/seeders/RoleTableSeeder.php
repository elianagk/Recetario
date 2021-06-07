<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder {
    public function run() {
        $roleAdmin = new Role();
        $roleAdmin ->name = 'admin';
        $roleAdmin ->description = 'Administrator';
        $roleAdmin ->save();        
        
        $roleUser = new Role();
        $roleUser->name = 'user';
        $roleUser->description = 'User';
        $roleUser->save();

        $roleCreateRecipe = new Role();
        $roleCreateRecipe->name = 'recipe_creator';
        $roleCreateRecipe->description = 'Recipe Creator Only';
        $roleCreateRecipe->save();


    }
}