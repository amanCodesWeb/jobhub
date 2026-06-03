<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development',     'description' => 'Frontend, backend, full-stack web dev roles'],
            ['name' => 'Mobile Development',   'description' => 'iOS, Android, cross-platform mobile roles'],
            ['name' => 'Data Science',         'description' => 'Data analysis, ML, AI, big data roles'],
            ['name' => 'DevOps & Cloud',       'description' => 'Infrastructure, CI/CD, cloud engineering roles'],
            ['name' => 'Design & UX',          'description' => 'UI design, UX research, product design roles'],
            ['name' => 'Marketing',            'description' => 'Digital marketing, SEO, content strategy roles'],
            ['name' => 'Sales',                'description' => 'B2B, B2C sales, account management roles'],
            ['name' => 'Customer Support',     'description' => 'Technical support, customer success roles'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($cat['name'])],
                $cat
            );
        }
    }
}
