<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// seed تم عمله عشان لما الادمن يكريت يوزر يتعمل اسم مستخدم وباسور تلاقى لما اعمل 
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Nour elhoude',
            'email'=>'admin@rscoder.com',
            'password'=>bcrypt('123456'),
            'roles_name'=>'ادمن',
            'gender'=>'انثى',
            // 'image_path'=>'user icon 3.png'
       ]);
        $role = Role::create(['name'=>'ادمن']);
        $permissions=Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
