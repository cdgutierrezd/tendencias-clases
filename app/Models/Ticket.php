<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'estado',
        'fecha_creacion',
        'fecha_cierre'
    ];

    //Relación con cliente(N:1)
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    //Relación con comentarios(1:N)
    public function comentarios(){
        return $this->hasMany(Comentario::class,'ticket_id');
    }

}
