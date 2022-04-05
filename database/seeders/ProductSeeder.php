<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            Product::create(
                ['nameProduct' => 'Cherry Úc | Size 28 – 30', 'idCategory' => 2, 'description' => 'Xuất xứ: Úc
                    Mùa vụ: Cherry Úc có vụ mùa từ cuối tháng Mười đến cuối tháng Hai tùy thuộc vào sự thay đổi khí hậu.']
            );
        };
    }
}
