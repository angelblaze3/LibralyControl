<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Modificamos la tabla users existente
        Schema::table('users', function (Blueprint $table) {
            // enum limita los valores posibles a solo 'user' o 'admin'
            // default('user') significa que todo registro nuevo sera usuario normal
            // after('email') coloca la columna despues del campo email
            $table->enum('role', ['user', 'admin'])->default('user')->after('email');
        });
    }

    public function down(): void
    {
        // down() es el rollback — deshace lo que hizo up()
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
