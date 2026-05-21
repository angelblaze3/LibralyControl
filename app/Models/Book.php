<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory; // Permite usar factories para generar datos de prueba

    // fillable define que columnas pueden ser asignadas masivamente
    // Por seguridad, cualquier columna NO listada aqui es ignorada en create() o update()
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'genre',
        'published_year',
        'copies',
    ];
}
