<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "usuario";
    protected $primaryKey = 'idUsuario';
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
        return $this->senha;
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'idUsuario', 'id');
    }

    // public static function buscarUsuario($id){
    //     return self::where('idUsuario', $id)->first();    
    // }
}
