<?php

use Illuminate\Database\Seeder;

class MauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $faker = Faker\Factory::create('vi_VN');
        $colors = ["Xanh","Đỏ","Vàng","Cam","Hồng","Trắng","Tím"];
        sort($colors);
        $today= new DateTime('2018-01-01 08:00:00');
        for($i=1; $i <= count($colors);$i++ ){
            array_push($list, [
                'm_ten' =>$colors[$i-1],
                'm_taoMoi'=> $today->format('Y-m-d H-i-s'),
                'm_capNhat'=> $today->format('Y-m-d H-i-s'),
                'm_trangThai' => 2
            ]);    
        }
        DB::table('cusc_mau')->insert($list);
    }
}
