<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('profile_photo')->nullable(); // Menambahkan kolom profile_photo
        });
    }
    
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('profile_photo'); // Menghapus kolom profile_photo
        });
    }
    
};
