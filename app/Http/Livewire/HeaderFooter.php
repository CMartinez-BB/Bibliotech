<?php

namespace App\Http\Livewire;

use App\Models\Headers;
use Livewire\Component;

class HeaderFooter extends Component
{
    public function render()
    {

        // Header
        $header = Headers::first();
        if ($header) {
            $encabezado = public_path('storage/logos/' . $header->header);
            $type = pathinfo($encabezado, PATHINFO_EXTENSION);
            $data = file_get_contents($encabezado);
            $base64Header = 'data:/image/' . $type . ';base64,' . base64_encode($data);
        }

        // Footer
        $footer = Headers::first();
        if ($footer) {
            $pie = public_path('storage/logos/' . $footer->footer);
            $type = pathinfo($pie, PATHINFO_EXTENSION);
            $data = file_get_contents($pie);
            $base64Footer = 'data:/image/' . $type . ';base64,' . base64_encode($data);

        }

        return view('livewire.header-footer', [
            'base64Header' => $base64Header,
            'base64Footer' => $base64Footer,
        ]);
    }
}