<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'User One',
            'email' => 'userone@gmail.com',
            'password' => Hash::make('password'),
        ]);
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        //Category
        $category = ['T shirt','Hat','Mobile','Electronic','Ear Phone'];
        foreach ($category as $c){
            Category::create([
                'slug' => Str::slug($c),
                'name' => $c,

            ]);
        }

        //brand
        $brand = ['Apple','Samsung','Huawei'];
        foreach ($brand as $c){
            Brand::create([
                'slug' => Str::slug($c),
                'name' => $c,

            ]);
        }

        //color
        $color = ['red','green','blue','black'];
        foreach ($color as $c){
            Color::create([
                'slug' => Str::slug($c),
                'name' => $c,

            ]);
        }

        //supplier
        Supplier::create([
            'name' => 'Mg Mg',
            'image' => 'supplier.png'
        ]);
    }
}
