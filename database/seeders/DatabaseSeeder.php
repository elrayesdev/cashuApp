<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $role = new Role(['title'=>'Super Admin', 'code'=>'SUPER']);
        $role->save();

        $role = new Role(['title'=>'Admin', 'code'=>'ADMIN']);
        $role->save();

        $role = new Role(['title'=>'Sales', 'code'=>'SALES']);
        $role->save();

        $role = new Role(['title'=>'Back Office', 'code'=>'BACK']);
        $role->save();
    }
}
