<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();                                    // Primary key autoincremental
            $table->string('title');                         // Titulo del libro
            $table->string('author');                        // Autor
            $table->string('isbn')->unique();                // ISBN unico por libro
            $table->string('genre')->nullable();             // Genero, puede ser null
            $table->integer('published_year')->nullable();   // Año de publicacion, puede ser null
            $table->integer('copies')->default(1);           // Copias disponibles, minimo 1
            $table->timestamps();                            // created_at y updated_at automaticos
        });
    }

    public function down(): void
    {
        // Si hacemos rollback, eliminamos la tabla completa
        Schema::dropIfExists('books');
    }
};
