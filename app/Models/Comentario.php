<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = "comentario";
    protected $fillable = [
        "comentario",
        "idUsuario"
    ];

    public static function buscaTodosComentarios(){
        return self::all();
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
