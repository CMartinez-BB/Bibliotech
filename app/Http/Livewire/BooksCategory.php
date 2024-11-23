<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class BooksCategory extends Component
{
    public $categorias;
    public $icons = [];

    public function mount()
    {
        $this->categorias = Categoria::all();

        $this->icons = [
            1 => ['src' => asset('imgs/icons/LOGO-ISC.png'), 'alt' => 'Icon sistemas'],
            2 => ['src' => asset('imgs/icons/Logo-contador.png'), 'alt' => 'Icon contabilidad'],
            3 => ['src' => asset('imgs/icons/logo-IMCT (1).png'), 'alt' => 'Icon mecatronica'],
            4 => ['src' => asset('imgs/icons/Logo-electromecanica.jpg'), 'alt' => 'Icon electromecanica'],
            5 => ['src' => asset('imgs/icons/LOGO-IGEM.png'), 'alt' => 'Icon gestion empresarial'],
            6 => ['src' => asset('imgs/icons/Logo-industrial.jpg'), 'alt' => 'Icon industrial'],
            7 => ['src' => asset('imgs/icons/Logo-IEL.jpg'), 'alt' => 'Icon automotriz'],
            8 => ['src' => asset('imgs/icons/revista.png'), 'alt' => 'Icon revista'],
            9 => ['src' => asset('imgs/icons/cd-video.png'), 'alt' => 'Icon CD y video'],
        ];
    }

    public function render()
    {
        return view('livewire.public-views.books-category', [
            'categorias' => $this->categorias,
            'icons' => $this->icons
        ]);
    }
}
