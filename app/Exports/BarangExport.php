<?php

namespace App\Exports;

use App\User;
use App\Barang;
use App\Ruangan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          return DB::table('Barang')
            ->select('barang.id_barang','barang.image', 'barang.nama_barang', 'ruangan.nama_ruangan', 'barang.total', 'barang.broken', 'user1.name as created_by', 'user2.name as updated_by', 'barang.created_at', 'barang.updated_at')
            ->leftJoin('users as user1', 'user1.id', '=', 'barang.created_by')
            ->leftJoin('users as user2', 'user2.id', '=', 'barang.updated_by')
            ->leftJoin('ruangan', 'ruangan.id_ruangan', '=', 'barang.ruangan_id')
            ->orderBy('id_barang')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Image',
            'Barang',
            'Ruangan',
            'Total',
            'Rusak',
            'Dibuat Oleh',
            'Diupdate Oleh',
            'Created at',
            'Updated at'
        ];
    }
}