<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\LibroPrestamo;
use App\Models\Prestamo;
use App\Exports\LibroPrestamoExport;
use Maatwebsite\Excel\Facades\Excel;

class MetodosTrimestres extends Component
{

    public $plazo;
    public $categoria;
    public $found = null;


    public function updated($propertyName)
    {
        // Emitir el evento solo si cambian los filtros `plazo` o `categoria`
        if (in_array($propertyName, ['plazo', 'categoria'])) {
            $this->emit('loans', $this->categoria ?? 0, $this->plazo ?? 0);
        }
    }

    public function export()
    {
        return Excel::download(new LibroPrestamoExport, 'prestamos-trimestre.xlsx');
    }

    public function render()
    {
        $libroPrestamo = LibroPrestamo::select('created_at')->get();
        $categorias = categoria::select('id', 'categoria')->take(6)->get();

        return view('livewire.search-components.metodos-trimestres', [
            'categorias' => $categorias,
            'prestamos' => $libroPrestamo,
            'found' => $this->found,
            'plazo' => $this->plazo,

        ]);
    }
}
