<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();        
        $role_recipe_creator = Role::where('name', 'recipe_creator')->first();
        

        $userAdmin = new User();
        $userAdmin->name = 'iawEK';
        $userAdmin->email = 'elikohon@gmail.com';
        $userAdmin->password = bcrypt('iawwek2021');
        $userAdmin->save();
        $userAdmin->roles()->attach($role_admin);
        $userAdmin->roles()->attach($role_user);
        $userAdmin->roles()->attach($role_recipe_creator);

        $user = new User();
        $user->name = 'Diego';
        $user->email = 'dcm@cs.uns.edu.ar';
        $user->password = bcrypt('diegoiaw2021');
        $user->save();
        $user->roles()->attach($role_user);

        $userCreator = new User();
        $userCreator->name = 'Creador-Recetas';
        $userCreator->email = 'cr@iaw.com';
        $userCreator->password = bcrypt('1234');
        $userCreator->save();
        $userCreator->roles()->attach($role_recipe_creator);


    }
}
