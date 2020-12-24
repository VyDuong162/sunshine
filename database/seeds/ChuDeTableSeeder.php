<?php

use Illuminate\Database\Seeder;

class ChuDeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $faker    = Faker\Factory::create('vi_VN');
        $types = ['Sinh nhật','Tiệc cưới','Giáng sinh','Khai trương'];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'cd_ma'      => $i,
                'cd_ten'     => $types[$i-1],
                'cd_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'cd_capNhat' => $today->format('Y-m-d H:i:s'),
                'cd_trangThai' => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('cusc_chude')->insert($list);
    }
}
