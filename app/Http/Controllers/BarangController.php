<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;

use App\Ruangan;

use App\User;

use Maatwebsite\Excel\Facades\Excel;

use App\Exports\BarangExport;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
             ->orWhere('nama_ruangan', 'LIKE', '%'.$request->search.'%')
             ->orWhere('total', 'LIKE', '%'.$request->search.'%')
             ->orWhere('broken', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'id_ruangan', '=', 'barang.ruangan_id')->orderBy('id_barang', 'asc')->paginate(5);

        $ruangan = Ruangan::all();
        $user = User::all();


        return view('barang.index', compact('dataBarang', 'ruangan', 'user'));
    }

    public function export(Request $request){
        return Excel::download(new BarangExport, date("Y-m-d").'-Data Barang'.'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataruangan = Ruangan::all()->sortBy('nama_ruangan');

        return view('barang.create', compact('dataruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|max:2048',
            'nama_barang' => 'required|max:50',
            'ruangan_id' => 'required',
            'total' => 'required|numeric',
            'broken' => 'required|numeric',
            'created_by' => 'required',
        ]);


        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        $barang->ruangan_id = $request->ruangan_id;
        $barang->image = $new_name;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data Added Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        $ruangan = \App\Ruangan::all();

        $barang = Barang::findOrFail($id_barang);

        return view('barang.edit', compact('barang'))->with('ruangan', $ruangan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {

        $request->validate([
            'image' => 'image|max:2048',
            'nama_barang' => 'required|max:50',
            'ruangan_id' => 'required',
            'total' => 'required|numeric',
            'broken' => 'required|numeric',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);


        $barang = Barang::find($id_barang);
        $barang->nama_barang = $request->input('nama_barang');
        $barang->ruangan_id = $request->input('ruangan_id');
        $barang->total = $request->input('total');
        $barang->broken = $request->input('broken');
        $barang->created_by = $request->input('created_by');
        $barang->updated_by = $request->input('updated_by');
        $barang->save();

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $barang->image = $request->file('image')->getClientOriginalName();
        }

        $barang->save();
      
        return redirect()->route('barang.index')->with('success', 'Data is Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_barang)
    {
        $data = Barang::findOrFail($id_barang);
        $data->delete();

        return redirect()->route('barang.index');
    }
}
