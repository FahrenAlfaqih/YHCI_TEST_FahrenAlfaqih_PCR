<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('email')->unique(); 
            //unique() agar users memiliki email yang unik dengan users yang lain, untuk mencegah duplikasi saat pengecekan email
            $table->timestamps();
            //timestamps() agar mendapatkan informasi kapan data users teregistrasi atau kapan data users di updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
