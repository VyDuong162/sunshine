<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KhachHangTableSeeder::class);
        $this->call(LoaiTableSeeder::class);
        $this->call(ThanhToanTableSeeder::class);
        $this->call(ChuDeTableSeeder::class);
        $this->call(XuatXuTableSeeder::class);
        $this->call(MauTableSeeder::class); 
        $this->call(QuyenTableSeeder::class);
        $this->call(NhanVienTableSeeder::class);
        $this->call(KhuyenMaiTableSeeder::class);
        $this->call(NhaCungCapTableSeeder::class);   
        $this->call(SanPhamTableSeeder::class);
        $this->call(HinhAnhTableSeeder::class);
        $this->call(ChuDeSanPhamTableSeeder::class);
        $this->call(KhuyenMaiSanPhamTableSeeder::class);
        $this->call(MauSanPhamTableSeeder::class);
        $this->call(VanChuyenTableSeeder::class);
        $this->call(PhieuNhapTableSeeder::class);
        $this->call(DonHangTableSeeder::class); 
        $this->call(GopYTableSeeder::class);
        $this->call(ChiTietNhapTableSeeder::class);
        $this->call(HoaDonSiTableSeeder::class);
        $this->call(HoaDonLeTableSeeder::class);
        $this->call(ChiTietDonHangTableSeeder::class);
        
       
        // $this->call(UsersTableSeeder::class);
    }
}
