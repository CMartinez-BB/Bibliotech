<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Libro;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('home.index');
    }

    public function view(Categoria $category)
    {
        return view('home.category', [
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
        return view('home.show', [
            'libro' => $libro,
        ]);
    }

    public function find()
    {
        $libros_en_existencia = Libro::where('cantidad', '>', 0)->count();
        return view('home.search', [
            'libros_en_existencia' => $libros_en_existencia,
        ]);
    }

    public function statusLoans()
    {
        return view('administrator.loans.ViewStatus');
    }
}