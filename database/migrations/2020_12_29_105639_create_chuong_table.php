<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuong', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->INTIncrements('chuong_id');
            $table->string('chuong_so)', 50);
            $table->string('chuong_ten', 256);
            $table->text('chuong_noidung');
            $table->unsignedTinyInteger('truyen_id');
            $table->foreign('truyen_id')->references('truyen_id')->on('truyen')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `chuong`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuong');
    }
}
