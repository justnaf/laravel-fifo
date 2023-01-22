<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use PDF;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        // dd($data);
        //dd($data);
        $this->data['barang'] = $data;
        return view('barang.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->harga_jual = $request->harga_jual;
        //dd($hewan->nama_hewan);
        $saveBarang = $barang->save();

        //dd($saveHewan);
        if ($saveBarang == true) {
            return redirect()->route('barang.index')->with('success', 'Data Barang berhasil ditambah!');
        }else{
            return redirect()->route('barang.edit')->with('validationErrors', 'Coba Dicek Lagi Cuy');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::find($id);
        //dd($data);
        $this->data['barang'] = $data;
        return view('barang.detail', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = Barang::find($id);
        //dd($data);
        $this->data['barang'] = $data;

        //dd($this->data);
        return view('barang.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //dd($barang->id);
        $barang = Barang::find($barang->id);
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->harga_jual = $request->harga_jual;

        $updatebarang = $barang->save();
        //dd($updatehewan);
        if ($updatebarang == true) {
            return redirect()->route('barang.index')->with('success','Data barang berhasil diubah!');
        } else {
            return redirect()->route('barang.edit')->with('validationErrors','Data Gak Bisa Diapain');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $deleteData = $barang->delete();
        //dd($deleteData);


        if ($deleteData == true) {
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
        } else {
            return redirect()->route('barang.index')->with('ValidationErrors','Data Gak Bisa Diapain');
        }
    }

}
