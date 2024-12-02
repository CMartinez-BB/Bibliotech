<?php

namespace App\Http\Livewire;

use Maatwebside\Excel;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Alumno;
use App\Models\registroentradas;

class MetodoBusqueda extends Component
{
   
   public $sexo;
   public $carrera;
   public $corte;
   public $fechainicio;
   public $fechafin;
   

   public function searchWord(){
      $this->emit('busqueda', $this->carrera, $this->sexo, $this->corte, $this->fechainicio, $this->fechafin);
     
    }
  
 
    public function render()
    {
      $categorias = Categoria::select('id', 'categoria')->take(7)->get();
        return view('livewire.metodo-busqueda', [
          'categorias'=> $categorias
        ]);
           
    }

    public function export(){
      return Excel::download(new EntradasExport, 'entradas.xlsx')
  ;}

   
}