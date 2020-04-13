<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\BarangExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;

use App\Barang;

use App\Ruangan;

use App\User;

class CetakController extends Controller
{
    public function export_excel()
	{
		return Excel::download(new BarangExport, 'Barang.xlsx');
	}
}
