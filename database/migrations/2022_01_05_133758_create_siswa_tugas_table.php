<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_tugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_tugas");
            $table->foreign("id_tugas")->references('id')->on('tugas')->onDelete("cascade");
            $table->unsignedBigInteger("id_siswa");
            $table->foreign("id_siswa")->references('id')->on('penggunas')->onDelete("cascade");
            $table->string('file_upload');
            $table->float('nilai')->nullable();
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
        Schema::dropIfExists('siswa_tugas');
    }
}
