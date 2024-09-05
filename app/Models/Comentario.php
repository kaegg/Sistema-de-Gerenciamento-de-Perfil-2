<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = "comentario";
    protected $primaryKey = 'idComentario';
    protected $fillable = [
        "comentario",
        "idUsuario"
    ];

    public static function criarComentario($data){
        return self::create([
            "comentario" => $data["comentario"],
            "idUsuario" => $data["idUsuario"],
            "like" => 0,
            "deslike" => 0
        ]);
    }

    public static function buscaTodosComentarios(){
        
        return self::orderBy('created_at', 'desc')->get();
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
