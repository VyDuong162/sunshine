<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hinhanh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedbigInteger('sp_ma')->comment('Mã sản phẩm');
            $table->unsignedtinyInteger('ha_stt')->default('1')->comment('Số thứ tự# STT hình ảnh của sản phẩm');
            $table->string('ha_ten', 150)->comment('Tên hình ảnh');
            $table->primary(['sp_ma', 'ha_stt']);
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE'); 
        });
        DB::statement("ALTER TABLE `cusc_hinhanh` comment 'Hình ảnh sản phẩm # các hình ảnh chi tiết của sản phẩm'");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hinhanh');
    }
}
