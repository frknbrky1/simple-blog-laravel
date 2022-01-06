<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Genel', 'Eğlence', 'Bilişim', 'Gezi', 'Teknoloji', 'Sağlık', 'Spor', 'Günlük Yaşam'];
        foreach($categories as $category) {
            $slug = Str::slug($category, '-');
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
