<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = Auth::user();

        if ($user->rol == 1) {
            $libros_en_existencia = Libro::where('cantidad', '>', 0)->count();
            return view('administrator.index', [
                'libros_en_existencia' => $libros_en_existencia,
            ]);
        } elseif ($user->rol == 2) {
            return redirect()->route('admin.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Libro $libro)
    {
        //
        return view('home.show', [
            'libro' => $libro,
        ]);
    }

    public function search()
    {
        $libros_en_existencia = Libro::where('cantidad', '>', 0)->count();
        return view('home.search', [
            'libros_en_existencia' => $libros_en_existencia,
        ]);
    }

    public function showLibros()
    {
        $libros = Libro::with('autores')->get();
        return view('administrator.show', ['libros' => $libros]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
        return view('administrator.edit', [
            'libro' => $libro,
        ]);
    }

    public function print()
    {
        return view('administrator.print');
    }
}
