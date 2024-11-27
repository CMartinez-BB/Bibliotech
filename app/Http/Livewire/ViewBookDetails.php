<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\Tipo_prestamo;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ViewBookDetails extends Component
{

    public $libro_id;
    public $user_biblio;
    public $fecha_inicial;
    public $titulo;
    public $autores;
    public $identificacion;
    public $fecha_limite;
    public $cantidad;
    public $cantidad_libros;

    public $isbn;
    public $tipo_prestamo;
    public $type_loan_id;
    public $folio;
    public $found = null;
    protected $listeners = ['leerDatos' => 'isb', 'dataFolio' => 'mount_folio'];

    // calculate loan days
    public function calculateLoanDays($days)
    {
        $days = Carbon::parse($days)->addWeekdays(3);

        if ($days->isSunday()) {
            $days->addDays(1);
        }

        return $days->format('d-m-Y');
    }

    public function mount_folio($datos)
    {
        $this->folio = $datos['folio'];
    }

    public function searchIsbn($isbn)
    {
        $isbn = $this->isbn = Libro::where('isbn', 'LIKE', '%' . $this->isbn . '%')->get();
        return $isbn;
    }

    // Set the datas for the view with the isbn
    public function isb($isbn)
    {
        $this->isbn = $isbn;
        if (empty($this->isbn)) {
            return;
        };

        // Se vincula el libro que se esta buscando, el $this->isbn = almacena el resultado del libro buscado, por cuestiones
        // de funcionalidad no cambiar el nombre de la variable
        $this->isbn = $this->searchIsbn($isbn);

        if ($this->isbn->isEmpty()) {
            $this->found = true;
            $this->emit('loand', $this->found);
            return;
        }

        //concatenating variables to the front-end
        $datos = $this->isbn[0];

        $this->libro_id = $datos->id;
        $this->user_biblio = auth()->user()->name;
        $this->fecha_inicial = Carbon::now()->format('d-m-Y');
        $this->titulo = $datos->titulo;
        $this->autores = $datos->autores[0]->autor;
        $this->folio;
        $this->fecha_limite = $this->calculateLoanDays($this->fecha_inicial);
        $this->identificacion = $datos->isbn;
        $this->cantidad = $datos->cantidad;
        $this->emit('dataBook', [
            'id' => $this->libro_id,
            'fecha_inicio' => $this->fecha_inicial,
            'fecha_limite' => $this->fecha_limite,
            'folio' => $this->folio,
            'cantidad' => $this->cantidad,
        ]);
        $this->found = false;
        $this->emit('loand', $this->found);
    }

    // Set the datas for the view with the type of loan
    public function type_loan($type_loan_id)
    {
        $this->type_loan_id = $type_loan_id;
        $this->emit('dataLoan', [
            'type_loan' => $this->type_loan_id,
        ]);
    }

    //  Set total number books
    public function total_books($cantidad_libros)
    {
        $this->cantidad = $cantidad_libros;

        $this->emit('total_books', [
            'cantidad_libros' => $this->cantidad,
        ]);
    }

    public function render()
    {
        $tipo_prestamos = Tipo_prestamo::all();
        return view('livewire.librarian.view-book-details', [
            'tipo_prestamos' => $tipo_prestamos,
            'isbn' => $this->isbn,
        ]);
    }
}
