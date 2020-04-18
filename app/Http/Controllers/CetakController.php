<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\BarangExport;

use App\Exports\JurusanExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;

use PDF;

use App\Barang;

use App\Ruangan;

use App\User;

use App\Fakultas;

use App\Jurusan;


class CetakController extends Controller
{
	// Export data barang

	public function export_pdfBarang()
    {
    	$barang = Barang::all();
    	$ruangan = Ruangan::all();
    	$user = User::all();
 
    	$pdf = PDF::loadview('barang.barang_pdf',['barang'=>$barang,'ruangan' => $ruangan, 'user' => $user]);
    	return $pdf->stream();
    }


    // Export data jurusan

    public function export_excelJurusan()
    {
        return Excel::download(new JurusanExport, 'DataJurusan.xlsx');
    }

    public function export_pdfJurusan()
    {
        $jurusan = Jurusan::all();
        $fakultas = Fakultas::all();
 
        $pdf = PDF::loadview('jurusan.jurusan_pdf',['jurusan'=>$jurusan,'fakultas' => $fakultas]);
        return $pdf->stream();
    }

}
