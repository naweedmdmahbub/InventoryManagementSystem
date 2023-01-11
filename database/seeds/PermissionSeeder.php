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
//        Schema::disableForeignKeyConstraints();
//        DB::table('model_has_roles')->truncate();
//        DB::table('role_has_permissions')->truncate();
//        DB::table('roles')->truncate();
//        DB::table('permissions')->truncate();
//        Schema::enableForeignKeyConstraints();
//
//
        // $role1 = Role::create(['name' => 'Admin']);
        // $role2 = Role::create(['name' => 'Project Coordinator']);
        // $role3 = Role::create(['name' => 'Chief Accountant']);

        // $role4 = Role::create(['name' => 'Project Manager#1']);
        // $role5 = Role::create(['name' => 'Site Engineer#1']);
        // $role6 = Role::create(['name' => 'Site Accountant#1']);
        // $role7 = Role::create(['name' => 'Site Supervisor#1']);
        // $role8 = Role::create(['name' => 'Subcontractor#1']);
        // $role9 = Role::create(['name' => 'Labourer#1']);
        // $role4 = Role::create(['name' => 'Project Manager#2']);
        // $role5 = Role::create(['name' => 'Site Engineer#2']);
        // $role6 = Role::create(['name' => 'Site Accountant#2']);
        // $role7 = Role::create(['name' => 'Site Supervisor#2']);
        // $role8 = Role::create(['name' => 'Subcontractor#2']);
        // $role9 = Role::create(['name' => 'Labourer#2']);

        $role1 = Role::find(1);
        $role2 = Role::find(2);

//        Permission::create(['name' => 'users.create']);
//        Permission::create(['name' => 'users.view']);
//        Permission::create(['name' => 'users.edit']);
//        Permission::create(['name' => 'users.delete']);
//        Permission::create(['name' => 'roles.create']);
//        Permission::create(['name' => 'roles.view']);
//        Permission::create(['name' => 'roles.edit']);
//        Permission::create(['name' => 'roles.delete']);
//        Permission::create(['name' => 'categories.create']);
//        Permission::create(['name' => 'categories.view']);
//        Permission::create(['name' => 'categories.edit']);
//        Permission::create(['name' => 'categories.delete']);
//        Permission::create(['name' => 'units.create']);
//        Permission::create(['name' => 'units.view']);
//        Permission::create(['name' => 'units.edit']);
//        Permission::create(['name' => 'units.delete']);
//        Permission::create(['name' => 'products.create']);
//        Permission::create(['name' => 'products.view']);
//        Permission::create(['name' => 'products.edit']);
//        Permission::create(['name' => 'products.delete']);
//        Permission::create(['name' => 'projects.create']);
//        Permission::create(['name' => 'projects.view']);
//        Permission::create(['name' => 'projects.edit']);
//        Permission::create(['name' => 'projects.delete']);
//        Permission::create(['name' => 'structures.create']);
//        Permission::create(['name' => 'structures.view']);
//        Permission::create(['name' => 'structures.edit']);
//        Permission::create(['name' => 'structures.delete']);
//        Permission::create(['name' => 'works.create']);
//        Permission::create(['name' => 'works.view']);
//        Permission::create(['name' => 'works.edit']);
//        Permission::create(['name' => 'works.delete']);


//        $role1->givePermissionTo('users.create');
//        $role1->givePermissionTo('users.view');
//        $role1->givePermissionTo('users.edit');
//        $role1->givePermissionTo('users.delete');
//        $role1->givePermissionTo('roles.create');
//        $role1->givePermissionTo('roles.view');
//        $role1->givePermissionTo('roles.edit');
//        $role1->givePermissionTo('roles.delete');
//        $role1->givePermissionTo('categories.create');
//        $role1->givePermissionTo('categories.view');
//        $role1->givePermissionTo('categories.edit');
//        $role1->givePermissionTo('categories.delete');
//        $role1->givePermissionTo('units.create');
//        $role1->givePermissionTo('units.view');
//        $role1->givePermissionTo('units.edit');
//        $role1->givePermissionTo('units.delete');
//        $role1->givePermissionTo('products.create');
//        $role1->givePermissionTo('products.view');
//        $role1->givePermissionTo('products.edit');
//        $role1->givePermissionTo('products.delete');
    //    $role1->givePermissionTo('projects.create');
    //    $role1->givePermissionTo('projects.view');
    //    $role1->givePermissionTo('projects.edit');
    //    $role1->givePermissionTo('projects.delete');
    //    $role1->givePermissionTo('structures.create');
    //    $role1->givePermissionTo('structures.view');
    //    $role1->givePermissionTo('structures.edit');
    //    $role1->givePermissionTo('structures.delete');
    //    $role1->givePermissionTo('works.create');
    //    $role1->givePermissionTo('works.view');
    //    $role1->givePermissionTo('works.edit');
    //    $role1->givePermissionTo('works.delete');


       Permission::create(['name' => 'invoices.create']);
       Permission::create(['name' => 'invoices.view']);
       Permission::create(['name' => 'invoices.edit']);
       Permission::create(['name' => 'invoices.delete']);
       Permission::create(['name' => 'orders.create']);
       Permission::create(['name' => 'orders.view']);
       Permission::create(['name' => 'orders.edit']);
       Permission::create(['name' => 'orders.delete']);

       $role1->givePermissionTo('invoices.create');
       $role1->givePermissionTo('invoices.view');
       $role1->givePermissionTo('invoices.edit');
       $role1->givePermissionTo('invoices.delete');
       $role1->givePermissionTo('orders.create');
       $role1->givePermissionTo('orders.view');
       $role1->givePermissionTo('orders.edit');
       $role1->givePermissionTo('orders.delete');

//        $role2->givePermissionTo('users.view');

        // User::find(1)->assignRole($role1);
        // User::find(2)->assignRole($role2);

//        $role1 = Role::find(1);


    }
}
