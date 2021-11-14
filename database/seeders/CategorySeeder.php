<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categries = [
            "Development",
            "Business", "Finance & Accouting",
            "IT Solfware", "Office Productivity",
            "Personal Development",
            "Design",
            "Marketing",
            "LifeStyle",
            "Photography & Video",
            "Health & Fitness",
            "Music",
            "Teaching & Academics",
        ];

        foreach ($categries as $category) {
            Category::create([
                "name" => $category
            ]);
        }
    }
}
