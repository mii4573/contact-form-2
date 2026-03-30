<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          ['content' => '商品お届けについて'],
          ['content' => '商品交換について'],
          ['content' => '商品トラブル'],
          ['content' => 'ショップへお問い合わせ'],
          ['content' => 'その他'],
        ];
        
        foreach ($categories as $category) {
           Category::create($category); 
        }
    }   
}