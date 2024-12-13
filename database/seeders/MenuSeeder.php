<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'id' => '1',
                'name' => 'Ais Jelly Limau',
                'price' => '4.00',
                'status' => 'Available',
                'image_path' => '1734019678.jpg',
            ],
            [
                'id' => '2',
                'name' => 'Rench Fries',
                'price' => '5.00',
                'status' => 'Available',
                'image_path' => '1734019768.jpg',
            ],
            [
                'id' => '3',
                'name' => 'Mee Kari',
                'price' => '5.00',
                'status' => 'Available',
                'image_path' => '1734019794.png',
            ],
            [
                'id' => '4',
                'name' => 'Mee Kari Special',
                'price' => '7.00',
                'status' => 'Unavailable',
                'image_path' => '1734019823.jpg',
            ],
            [
                'id' => '5',
                'name' => 'Salad',
                'price' => '5.00',
                'status' => 'Available',
                'image_path' => '1734019858.jpg',
            ],
            [
                'id' => '6',
                'name' => 'Mojito',
                'price' => '4.00',
                'status' => 'Available',
                'image_path' => '1734019883.jpg',
            ],
            [
                'id' => '7',
                'name' => 'Mojito Lemon',
                'price' => '5.00',
                'status' => 'Unavailable',
                'image_path' => '1734019926.jpg',
            ],
            [
                'id' => '8',
                'name' => 'Mojito Watermelon',
                'price' => '6.00',
                'status' => 'Available',
                'image_path' => '1734020017.png',
            ],
            [
                'id' => '9',
                'name' => 'Nasi Lemak Telur',
                'price' => '5.00',
                'status' => 'Unavailable',
                'image_path' => '1734020058.jpg',
            ],
            [
                'id' => '10',
                'name' => 'Nasi Lemak Ayam',
                'price' => '8.00',
                'status' => 'Available',
                'image_path' => '1734020095.png',
            ],
            [
                'id' => '11',
                'name' => 'Oden',
                'price' => '5.00',
                'status' => 'Available',
                'image_path' => '1734020137.jpg',
            ],
            [
                'id' => '12',
                'name' => 'Sandwich',
                'price' => '4.00',
                'status' => 'Available',
                'image_path' => '1734020137.jpg',
            ],
        ];
        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
