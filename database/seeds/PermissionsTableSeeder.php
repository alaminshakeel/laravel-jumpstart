<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPermissions = $this->getAllPermissions();

        $permArray = [];
        foreach ($allPermissions as $permission){
            $permArray[] = $permission;
        }

        $permissions = [
          ['user_base','Can see User Module'],
          ['user_create','Can Create User'],
          ['user_edit','Can Edit User'],
          ['user_delete','Can Delete User'],
          ['user_view','Can see User Details'],
          ['role_base','Can see Role Module'],
          ['role_create','Can Create Role'],
          ['role_edit','Can Edit Role'],
          ['role_delete','Can Delete Role'],
          ['role_view','Can see Role Details'],
        ];

        foreach ($permissions as $permission){
            if(!in_array($permission[0],$permArray)){
                $p =  new \App\Permission;
                $p->name = $permission[0];
                $p->label = $permission[1];
                $p->save();
            }
        }

    }


    public function getAllPermissions(){
        return \App\Permission::pluck('name');
    }
}
