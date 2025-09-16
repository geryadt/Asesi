<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Undangan', 'description' => 'Undangan rapat, koordinasi, dll.'],
            ['name' => 'Pengumuman', 'description' => 'Surat-surat terkait pengumuman'],
            ['name' => 'Nota Dinas', 'description' => 'Surat dinas resmi'],
            ['name' => 'Pemberitahuan', 'description' => 'Surat pemberitahuan atau informasi'],
        ];
        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
