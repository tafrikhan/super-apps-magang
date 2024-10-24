<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->primary();
        //     $table->foreignId('user_id')->nullable()->index();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('user_agent')->nullable();
        //     $table->longText('payload');
        //     $table->integer('last_activity')->index();
        // });


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('instansi_id'); // Foreign key ke instansis
            $table->unsignedBigInteger('penugasan_id'); // Foreign key ke penugasans
            $table->unsignedBigInteger('mentor_id')->nullable(); // Foreign key ke mentors, nullable jika tidak ada
            $table->date('start_date'); // Tanggal mulai
            $table->date('end_date'); // Tanggal selesai
            $table->enum('role', ['user', 'admin', 'mentor']);
            $table->timestamps();

            $table->foreign('instansi_id')->references('id')->on('instansis')->onDelete('cascade');
            $table->foreign('penugasan_id')->references('id')->on('penugasans')->onDelete('cascade');
            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('set null'); // Jika mentor dihapus, set null
        });
    }

    public function down()
    {
        // Schema::dropIfExists('sessions');
        // Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
