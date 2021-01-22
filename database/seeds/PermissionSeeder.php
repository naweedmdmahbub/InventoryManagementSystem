<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();


        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Manager']);

        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.view']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.view']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.view']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.delete']);
        Permission::create(['name' => 'units.create']);
        Permission::create(['name' => 'units.view']);
        Permission::create(['name' => 'units.edit']);
        Permission::create(['name' => 'units.delete']);
        Permission::create(['name' => 'products.create']);
        Permission::create(['name' => 'products.view']);
        Permission::create(['name' => 'products.edit']);
        Permission::create(['name' => 'products.delete']);

        $role1->givePermissionTo('users.create');
        $role1->givePermissionTo('users.view');
        $role1->givePermissionTo('users.edit');
        $role1->givePermissionTo('users.delete');
        $role1->givePermissionTo('roles.create');
        $role1->givePermissionTo('roles.view');
        $role1->givePermissionTo('roles.edit');
        $role1->givePermissionTo('roles.delete');
        $role1->givePermissionTo('categories.create');
        $role1->givePermissionTo('categories.view');
        $role1->givePermissionTo('categories.edit');
        $role1->givePermissionTo('categories.delete');
        $role1->givePermissionTo('units.create');
        $role1->givePermissionTo('units.view');
        $role1->givePermissionTo('units.edit');
        $role1->givePermissionTo('units.delete');
        $role1->givePermissionTo('products.create');
        $role1->givePermissionTo('products.view');
        $role1->givePermissionTo('products.edit');
        $role1->givePermissionTo('products.delete');

        $role2->givePermissionTo('users.view');

        User::find(1)->assignRole($role1);
        User::find(2)->assignRole($role2);

//        $role1 = Role::find(1);


    }
}
