<?php

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
        $categories = [
            ['id' => 1, 'name' => 'TV & Home Theather'],
            ['id' => 2, 'name' => 'Tablets & E-Readers'],
            ['id' => 3, 'name' => 'Computers', 'children' => [
                ['id' => 4, 'name' => 'Laptops', 'children' => [
                    ['id' => 5, 'name' => 'PC Laptops'],
                    ['id' => 6, 'name' => 'Macbooks (Air/Pro)']
                ]],
                ['id' => 7, 'name' => 'Desktops', 'children' => [
                    // These will be created
                    ['name' => 'Towers Only'],
                    ['name' => 'Desktop Packages'],
                    ['name' => 'All-in-One Computers'],
                    ['name' => 'Gaming Desktops']
                ]]
                // This one, as it's not present, will be deleted
                // ['id' => 8, 'name' => 'Monitors'],
            ]],
            ['id' => 9, 'name' => 'Cell Phones']
        ];

        Category::buildTree($categories); // => true
    }
}
