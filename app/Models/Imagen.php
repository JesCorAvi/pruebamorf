<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'url'
    ];
    protected $table = "imagenes";

    public function comentarios(): MorphMany
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

}
