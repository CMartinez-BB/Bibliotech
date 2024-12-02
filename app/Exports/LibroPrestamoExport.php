<?php

namespace App\Exports;

use App\Models\LibroPrestamo;
// Import Headings
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LibroPrestamoExport implements FromCollection, WithHeadings//para que se vean los encabezados hay que importar lo withheadings sin ellos no se ven
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LibroPrestamo::with('libro', 'alumno', 'prestamo.user')
            ->get()
            ->map(function($libroPrestamo) {
                $siglas = strtoupper($libroPrestamo->alumno->carrera); // Convertir a mayúsculas
                $siglasConPuntos = implode('.', str_split($siglas)); // Insertar puntos entre cada letra
                return [
                'Carrera' =>$siglasConPuntos,//usar las siglas con puntos
                'Libro' => $libroPrestamo->libro->titulo,
                'Cantidad' => $libroPrestamo->prestamo->cantidad,
                'Bibliotecario' => $libroPrestamo->prestamo->user->name
               ];
            });
    }

    public function headings(): array
    {
        // Encabezados de la tabla
        return [
            'Carrera',
            'Libro',
            'Cantidad',
            'Bibliotecario'
        ];
    }
}
