<?php

//migratie die wat velden aan de users tabel toevoegd om op de profielpagina weer te geven

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
        Schema::table('users', function (Blueprint $table) {
        $table->date('birthday')->nullable();
        $table->text('about_me')->nullable();
        $table->string('profile_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['birthday', 'about_me', 'profile_picture']);
        });
    }
};
