<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\BarangExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;

use PDF;

use App\Barang;

use App\Ruangan;

use App\User;

class CetakController extends Controller
{
    public function export_excelBarang()
	{
		return Excel::download(new BarangExport, 'Barang.xlsx');
	}

	public function export_pdfBarang()
    {
    	$barang = Barang::all();
    	$ruangan = Ruangan::all();
    	$user = User::all();
 
    	$pdf = PDF::loadview('barang.barang_pdf',['barang'=>$barang,'ruangan' => $ruangan, 'user' => $user]);
    	return $pdf->stream();
    }
}
