<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->INTIncrements('truyen_id');
            $table->string('truyen_ma)', 50);
            $table->string('truyen_ten', 256);
            $table->string('truyen_hinhdaidien', 100);
            $table->string('truyen_loai', 100);
            $table->string('truyen_theloai');
            $table->string('truyen_tacgia', 250);
            $table->text('truyen_mota');
            $table->timestamp('truyen_ngaydang');
        });
        DB::statement("ALTER TABLE `truyen`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen');
    }
}
