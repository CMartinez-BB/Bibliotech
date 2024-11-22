<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\Libro;
use App\Models\Estante;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\UserActivity;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CrearLibro extends Component
{

    public $titulo;
    public $autores;
    public $edicion;
    public $tomo;
    public $categoria;
    public $fecha;
    public $cantidad;
    public $paginas;
    public $estante;
    public $isbn;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'autores' => 'required|string',
        'edicion' => 'required|string',
        'tomo' => 'nullable|string',
        'paginas' => 'nullable|string',
        'categoria' => 'required|integer',
        'estante' => 'nullable|integer',
        'fecha' => 'required|date',
        'cantidad' => 'required|integer',
        'isbn' => 'required|string|unique:libros,isbn',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|max:1024',
    ];



    public function crearLibro()
    {
        $datos = $this->validate();
        // Convert to lowercase
        $datos = array_map('strtolower', $datos);
        $autores = explode(',', $datos['autores']);
        $autores_ids = [];
        foreach ($autores as $autor) {
            $autor = Autor::firstOrCreate(['autor' => $autor]);
            $autores_ids[] = $autor->id;
        }

        // Guardar imagen
        $imagen = $this->imagen->store('public/libros');
        $datos['imagen'] = str_replace('public/libros/', '', $imagen);

        // Verificar si el ISBN ya existe en la base de datos
        if (Libro::where('isbn', $datos['isbn'])->exists()) {
            // Crear mensaje de error
            session()->flash('error', 'El ISBN ya existe en la base de datos.');

            // Redirigir al formulario
            return redirect()->back();
        }


        // Crear el libro
        $libro = Libro::create([
            'titulo' => $datos['titulo'],
            'edicion' => $datos['edicion'],
            'tomo' => $datos['tomo'],
            'paginas' => $datos['paginas'],
            'categoria_id' => $datos['categoria'],
            'estante_id' => $datos['estante'],
            'fecha' => $datos['fecha'],
            'cantidad' => $datos['cantidad'],
            'isbn' => $datos['isbn'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        // Adjuntar autores al libro
        foreach ($autores_ids as $autor_id) {
            DB::table('autor_libro')->insert([
                'libros_id' => $libro->id,
                'autores_id' => $autor_id,
            ]);
        }

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Creación de un nuvo lirbo',
            'description' => 'Se ha creado el libro ' . $libro->titulo . ' por ' . auth()->user()->name . ' ' . auth()->user()->apellido_patero . ' ' . auth()->user()->apellido_matero,
        ]);
        // Crear mensaje de éxito
        session()->flash('message', 'Libro creado con éxito');

        // Redirigir al dashboard
        return redirect()->route('dashboard');
    }

    public function render()
    {
        // DB
        $categorias = Categoria::all();
        $estantes = Estante::all();
        return view('livewire.librarian.crear-libro', [
            'categorias' => $categorias,
            'estantes' => $estantes
        ]);
    }
}
