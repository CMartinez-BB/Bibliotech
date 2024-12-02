<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LibroPrestamo;
use App\Models\Categoria;

class ResultsGraphic extends Component
{
    public $cantidadPrestamos = [];
    public $carreras = [];

    public $prestamosPorCarrera=[];
    public $presCarrera = [];
    public $PPC = []; // Iniciar prestamos en ceros
    public $categorias = [];

    

    public function mount()
    {
        $this->cantidadPrestamos = LibroPrestamo::count();
        $this->carrera = Categoria::count();
        $this->categorias = Categoria::all();
        $this->PPC = array_fill_keys($this->categorias->pluck('id')->toArray(), 0);
        

        // Obtener prestamos por libro y categoria
        $prestamosPorCategoria = LibroPrestamo::join('libros', 'libro_prestamo.libro_id', '=', 'libros.id')
            ->selectRaw('libros.categoria_id, COUNT(*) as total')
            ->groupBy('libros.categoria_id')
            ->get();


        // Rellenar los PPC
        foreach ($prestamosPorCategoria as $registro) {
            $this->PPC[$registro->categoria_id] = $registro->total;
        }


        // Obtener los nombres por categoria
        foreach ($this->categorias as $categoria){
            $this->presCarrera[$categoria->categoria] = LibroPrestamo::whereHas('libro', function ($query) use ($categoria){
                $query->where('categoria_id', $categoria->id);
            })->count();
        }
    }

    public function render()
    {
        return view('livewire.librarian.others.results-graphic');
    }



}