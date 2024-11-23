<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class RenderBooks extends Component
{
    public $category;

    public function render()
    {

        $booksCategory = Libro::where('categoria_id', $this->category->id)->paginate(12);
        // dd($booksCategory);
        return view('livewire.public-views.render-books', [
            'booksCategory' => $booksCategory
        ]);
    }
}
