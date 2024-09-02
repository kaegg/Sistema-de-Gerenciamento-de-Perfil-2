<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory, Notifiable;

    protected $table = "usuario";
    protected $fillable = [
        "email",
        "senha",
        "nome"
    ];

    protected $hidden = [
        'senha',
    ];

    public static function criarUsuario($data){
        return self::create([
            "email" => $data["email"],
            "senha" => Hash::make($data["senha"]),
            "nome" => $data["nome"]
        ]);
    }

    public function getAuthPassword()
    {
        return $this->senha; // Retorna o valor da senha para autenticação
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'idUsuario', 'id');
    }
}
