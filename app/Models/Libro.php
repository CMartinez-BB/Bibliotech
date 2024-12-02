<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha' => 'datetime:d-m-Y',
    ];

    protected $fillable = [
        'titulo',
        'edicion',
        'autores_id',
        'tomo',
        'paginas',
        'categoria_id',
        'estante_id',
        'fecha',
        'cantidad',
        'isbn',
        'descripcion',
        'imagen',
        'user_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'libros_id', 'autores_id');
    }

    public function estante()
    {
        return $this->belongsTo(Estante::class);
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'alumnno_id', 'libro_id', 'prestamo_id');
    }
    public function prestamos()
    {
        return $this->belongsToMany(Prestamo::class, 'libro_prestamo');
    }
}
