<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //تم عمله لتثبيت الصلاحيات
    public function run()
    {
        $permissions=[
            'انشاء بوست',
            'التحكم فى البوست',

            'المستخدمين',

            'الفروع',

            'المناطق',

             'الاراء',
             'عرض الأراء',

             'مشكلات المدير',
             'مشكلات الأدمن',

             'تقارير المدير',
             'تقارير الأدمن',

             'اصحاب السكن',

             
             'التواصل مع المدير',
             
             'لوحة التحكم',

             'تعديل البيانات',
             
             'مستخدم',
             

             
        ];
        foreach( $permissions  as $permission){
            Permission::create(['name'=> $permission]);
        }
    }
    //php artisan make:seed --class=PermissionTableSeeder
}
     
