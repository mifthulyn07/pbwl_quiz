<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbGolonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_golongan', function (Blueprint $table) {
            $table->tinyInteger('gol_id')->autoIncrement();
            $table->string("gol_kode");
            $table->string("gol_nama");
            $table->timestamp("created_at", $precision = 0);
            $table->dateTime("updated_at", $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_golongan');
    }
}
