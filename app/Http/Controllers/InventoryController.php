<?php

namespace App\Http\Controllers;

use App\Models\Headers;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\UserActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use ZipArchive;

class InventoryController extends Controller
{
    // Set the footer to print
    public function update()
    {
        return view('administrator.piepagina');
    }
    public function printInventory()
    {
        $perPage = 90; // Tamaño óptimo de cada PDF
        $totalLibros = Libro::count();
        $totalPages = ceil($totalLibros / $perPage);

        // Ruta temporal para almacenar archivos PDF
        $pdfPath = sys_get_temp_dir() . '/pdfs/';
        if (!file_exists($pdfPath)) {
            mkdir($pdfPath, 0777, true);
        }

        $zip = new ZipArchive();
        $zipName = 'reportes_inventario.zip';
        $zipPath = sys_get_temp_dir() . '/' . $zipName;

        if ($zip->open($zipPath, ZipArchive::CREATE) !== true) {
            exit("No se pudo abrir el archivo ZIP");
        }

        // Obtén los encabezados
        $headers = Headers::first();
        $base64Header = '';
        $base64Footer = '';

        if ($headers) {
            $headerPath = public_path('storage/logos/' . $headers->header);
            $footerPath = public_path('storage/logos/' . $headers->footer);

            $base64Header = $this->getBase64Image($headerPath);
            $base64Footer = $this->getBase64Image($footerPath);
        }

        for ($page = 1; $page <= $totalPages; $page++) {
            $libros = Libro::with('autores', 'usuario')->latest()->skip(($page - 1) * $perPage)->take($perPage)->get();

            $pdf = PDF::loadView('pdf.inventory_2', [
                'libros' => $libros,
                'count' => $totalLibros,
                'base64Header' => $base64Header,
                'base64Footer' => $base64Footer,
            ])
                ->setPaper('a4', 'portrait')
                ->set_option('isHtml5ParserEnabled', true)
                ->set_option('isRemoteEnabled', true)
                ->set_option('isPhpEnabled', true);

            $pdfFileName = "reporte_de_inventario_pagina_{$page}.pdf";
            $pdfFilePath = $pdfPath . $pdfFileName;

            $pdf->save($pdfFilePath);
            $zip->addFile($pdfFilePath, $pdfFileName);
        }

        $zip->close();

        // Borrar archivos PDF temporales
        foreach (glob($pdfPath . '*.pdf') as $file) {
            unlink($file);
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    private function getBase64Image($filePath)
    {
        if (file_exists($filePath)) {
            $type = pathinfo($filePath, PATHINFO_EXTENSION);
            $data = file_get_contents($filePath);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        return '';
    }

    // public function printInventory()
    // {
    //     $perPage = 90; // Tamaño óptimo de cada PDF
    //     $totalLibros = Libro::count();
    //     $totalPages = ceil($totalLibros / $perPage);

    //     // Ruta temporal para almacenar archivos PDF
    //     $pdfPath = sys_get_temp_dir() . '/pdfs/';
    //     if (!file_exists($pdfPath)) {
    //         mkdir($pdfPath, 0777, true);
    //     }

    //     $zip = new ZipArchive();
    //     $zipName = 'reportes_inventario.zip';
    //     $zipPath = sys_get_temp_dir() . '/' . $zipName;

    //     if ($zip->open($zipPath, ZipArchive::CREATE) !== true) {
    //         exit("No se pudo abrir el archivo ZIP");
    //     }

    //     for ($page = 1; $page <= $totalPages; $page++) {
    //         $libros = Libro::with('autores', 'usuario')->latest()->skip(($page - 1) * $perPage)->take($perPage)->get();
    //         $headers = Headers::first();

    //         $pdf = PDF::loadView('pdf.inventory_2', ['libros' => $libros, 'count' => $totalLibros, 'headers' => $headers])
    //             ->setPaper('a4', 'portrait')
    //             ->set_option('isHtml5ParserEnabled', true)
    //             ->set_option('isRemoteEnabled', true)
    //             ->set_option('isPhpEnabled', true);

    //         $pdfFileName = "reporte_de_inventario_pagina_{$page}.pdf";
    //         $pdfFilePath = $pdfPath . $pdfFileName;

    //         $pdf->save($pdfFilePath);
    //         $zip->addFile($pdfFilePath, $pdfFileName);
    //     }

    //     $zip->close();

    //     // Borrar archivos PDF temporales
    //     foreach (glob($pdfPath . '*.pdf') as $file) {
    //         unlink($file);
    //     }

    //     UserActivity::create([
    //         'user_id' => auth()->user()->id,
    //         'activity' => 'Actualización de inventario',
    //         'description' => 'Exportación de inventario realizada' . ' por ' . auth()->user()->name . ' ' . auth()->user()->last_name,
    //     ]);

    //     return response()->download($zipPath)->deleteFileAfterSend(true);
    // }

    public function printLoans()
    {
        $loans = Prestamo::with('user', 'alumnos', 'libros', 'tipo_prestamo')->latest()->get();

        // Encabezados
        $headers = Headers::first();
        $count = $loans->count();

        $pdf = PDF::loadView('pdf.loans', ['loans' => $loans, 'count' => $count, 'headers' => $headers])->setPaper('a4', 'portrait')
            ->set_option('isPhpEnabled', true);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Actualización de prestamos',
            'description' => 'Exportación de prestamos realizada' . ' por ' . auth()->user()->name . ' ' . auth()->user()->last_name,
        ]);
        return $pdf->stream('reporte_de_prestamos.pdf');
    }
}
