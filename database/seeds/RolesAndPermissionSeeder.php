<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'approve-tutor']);
        Permission::create(['name' => 'delete-tutor']);
        Permission::create(['name' => 'view-all-subscriptions']);
        Permission::create(['name' => 'edit-tutor']);
 
        // create roles
        $Admin = Role::create(['name' => 'admin']);
        $Tutor = Role::create(['name' => 'tutor']);
        $Client = Role::create(['name' => 'client']);

        //assign permissions
        $Admin->givePermissionTo('approve-tutor');
        $Admin->givePermissionTo('delete-tutor');
        $Admin->givePermissionTo('view-all-subscriptions');
        $Admin->givePermissionTo('edit-tutor');
 
    }
}
