<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_kelas");
            $table->foreign("id_kelas")->references('id')->on('kelas')->onDelete("cascade");
            $table->unsignedBigInteger("id_mapel");
            $table->foreign("id_mapel")->references('id')->on('mapels')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_mapels');
    }
}
