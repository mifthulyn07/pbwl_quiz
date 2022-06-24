<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->integer('pel_id')->autoIncrement();
            $table->tinyInteger("pel_id_gol");
            $table->string("pel_no");
            $table->string("pel_nama");
            $table->text("pel_alamat");
            $table->string("pel_hp");
            $table->string("pel_ktp");
            $table->string("pel_seri");
            $table->integer("pel_meteran");
            $table->enum("pel_aktif", ['Y', 'N']);
            $table->integer("pel_id_user");
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
        Schema::dropIfExists('tb_pelanggan');
    }
}
