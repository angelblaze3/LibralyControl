<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Fillable como atributo PHP — equivalente a protected $fillable = [...]
// Agregamos 'role' para que pueda asignarse al crear o actualizar un usuario
#[Fillable(['name', 'email', 'password', 'role'])]

// Hidden oculta estos campos cuando el modelo se convierte a JSON o array
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convierte el string de DB a objeto Carbon
            'password' => 'hashed',            // Hashea automaticamente al asignar
        ];
    }

    // Helper para verificar si el usuario es admin
    // Lo usaremos en middleware y vistas: auth()->user()->isAdmin()
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
