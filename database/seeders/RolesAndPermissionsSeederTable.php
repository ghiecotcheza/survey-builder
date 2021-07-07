<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // protected $permissionsByRole = [
    //     [
    //         'user'     => ['make survey', 'edit survey', 'delete survey'],
    //         'guest'    => ['view survey', 'answer survey']

    //     ], [

    //         'name'     => 'guest',

    //     ]
    // ];

    protected $permissionsByRole = [
       'user'  => [
            'make survey',
            'edit survey'
        ],
        'guest' => [
            'view survey',
            'answer survey'
        ]
    ];

    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // foreach($permissionsByRole as $role => $permissions) {
            
        // }

        // create permissions
        // Permission::create(['name' => 'make survey']);
        // Permission::create(['name' => 'edit survey']);
        // Permission::create(['name' => 'delete survey']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('make survey');
        $role1->givePermissionTo('edit survey');
        $role1->givePermissionTo('delete survey');

        $role2 = Role::create(['name' => 'guest']);
        $role2->givePermissionTo('answer survey');
        
    }
}
