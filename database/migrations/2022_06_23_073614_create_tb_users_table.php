<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->integer('user_id')->autoIncrement();
            $table->string("user_email");
            $table->string("user_password");
            $table->string("user_nama");
            $table->text("user_alamat");
            $table->string("user_hp");
            $table->string("user_pos");
            $table->tinyInteger("user_role");
            $table->tinyInteger("user_aktif");
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
        Schema::dropIfExists('tb_users');
    }
}
