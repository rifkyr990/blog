<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['nama_kategori' => "Teknologi"]);
        Category::create(['nama_kategori' => "Bisnis"]);
        Category::create(['nama_kategori' => "Politik"]);
    }
}
