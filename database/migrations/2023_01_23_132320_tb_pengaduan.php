<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pengadu');
            $table->string('tipe_pengadu');
            $table->unsignedBigInteger('category_id');
            $table->string('idpengaduan');
            $table->string('judul_pengaduan');
            $table->text('detail_pengaduan');
            $table->date('tgl_pengaduan');
            $table->text('bukti_pengaduan');
            $table->enum('status', ['success', 'process', 'reject']);
            $table->string('tanggapan_pengaduan');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('tb_category');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengaduan');
    }
};
