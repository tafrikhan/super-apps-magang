<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimWebTable extends Migration
{
    public function up()
    {
        Schema::create('tim_web', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_artikel')->default(0);
            $table->integer('jumlah_kata')->default(0);
            $table->text('keterangan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tim_web');
    }
}
