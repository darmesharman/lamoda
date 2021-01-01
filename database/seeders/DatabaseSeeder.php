<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Item::factory(5)->create();
        \App\Models\Material::factory(5)->create();
        \App\Models\Review::factory(8)->create();

        $materials = \App\Models\Material::all();
        \App\Models\Item::all()->each(function ($item) use ($materials) {
            $item->materials()->attach(
                $materials->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

        $permission = new Permission();
        $permission->name = 'no-limit';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'user-permission';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'role-permission';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'item-permission';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'category-permission';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'material-permission';
        $permission->save();


        $role = new Role();
        $role->name = 'admin';
        $role->save();

        $role->permissions()->attach(Permission::where('name', 'no-limit')->first());
    }
}
