<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('settings')->insert([
            'commission_rate' => 10,
        ]);

        DB::table('categories')->insert([
           'title' => 'الشاحنات',
        ]);
        DB::table('categories')->insert([
            'title' => 'الدفارات',
        ]);
        DB::table('categories')->insert([
            'title' => 'الثلاجات',
        ]);
        DB::table('categories')->insert([
            'title' => 'الشفاطات',
        ]);
        DB::table('categories')->insert([
            'title' => 'البكاسي',
        ]);

    }
}
