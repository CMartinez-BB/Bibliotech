<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use App\Models\LibroPrestamo;

class MetodosTabla extends Component
{
    public $found = false;
    public $plazo;
    public $categoria;
    public $statusMessage = '';
    public $libroPrestamos = [];

    protected $listeners = ['loans' => 'buscar'];

    protected $trimestres = [
        1 => [1, 2, 3],
        2 => [4, 5, 6],
        3 => [7, 8, 9],
        4 => [10, 11, 12]
    ];


    public function getAllLoans()
    {
        return LibroPrestamo::with(['libro.categoria'])
            ->selectRaw('libro_id, COUNT(*) as total_prestamos')
            ->groupBy('libro_id')
            ->with(['libro' => function ($query) {
                $query->with('categoria');
            }])
            ->orderByDesc('total_prestamos')
            ->get();
    }

    public function getFilterdLoans($categoria = null, $plazo = null)
    {
        $months = $plazo && isset($this->trimestres[$plazo]) ? $this->trimestres[$plazo] : null;

        return LibroPrestamo::with(['libro.categoria'])
            ->when($categoria, function ($query) use ($categoria) {
                // Filtered by category
                $query->whereHas('libro.categoria', function ($q) use ($categoria) {
                    $q->where('id', $categoria);
                });
            })
            ->when($months, function ($query) use ($months) {
                // Filtered by trimestre
                $query->whereIn(\DB::raw('MONTH(created_at)'), $months);
            })
            ->selectRaw('libro_id, COUNT(*) as total_prestamos')
            ->groupBy('libro_id')
            ->orderByDesc('total_prestamos')
            ->get();
    }

    public function buscar($categoria, $plazo)
    {
        $this->categoria = $categoria;
        $this->plazo = $plazo;


        if ($categoria == 0 || $plazo == 0) {
            $this->libroPrestamos = [];
            $this->statusMessage = 'Por favor, selecciona una categoría y un trimestre para realizar la búsqueda.';
            $this->emit('hideAlert');
            $this->found = false;
            return;
        }

        $this->libroPrestamos = $this->getFilterdLoans(
            $categoria,
            $plazo
        );

        if ($this->libroPrestamos->isEmpty()) {
            $this->statusMessage = 'No se encontraron resultados con los filtros aplicados.';
            $this->emit('hideAlert');
            $this->found = false;
        } else {
            $this->statusMessage = 'Se encontraron resultados.';
            $this->found = true;
        }


        if ($this->statusMessage) {
            $this->emit('hideAlert');
        }
    }

    public function render()
    {
        if (empty($this->libroPrestamos)) {
            $this->libroPrestamos = $this->getAllLoans();
        }

        return view(
            'livewire.librarian.others.metodos-tabla',
            [
                'libroPrestamos' => $this->libroPrestamos
            ]
        );
    }
}
