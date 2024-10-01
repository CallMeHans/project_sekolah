<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index()
    {
        //dd('index');
        $barang = DB::table('v_barang')->get();
        return view('barang.index', compact('barang'));  //passing parameter asosiasi 
    }
    
    public function create()
    {
        //return viw('barang/create')
        $jenis = DB::table('xtb_jenis_barang') -> get();

        // dd('create');
        return view('barang/create', compact('jenis'));
    }

    public function store(Request $request)     //: RedirectResponse
    {
        // dd('store');
        try {
            $query = DB::table('xtb_barang')->insert([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'satuan' => $request->satuan,
                'stok' => $request->stok,
                'harga_jual' => $request->harga_jual,
                'id_jenis' => $request->id_jenis,
                'user_id' => $request->user_id
            ]);


            return  redirect('barang')->with('status', 'Data barang berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('barang')->with('status', $ex);
        }
    }

    public function show()
    {
        $barang = DB::table('v_barang')->get();  
        return view('barang.show',compact('barang'));  
    }


    public function edit(string $kode_barang)
    //: Response
    {
        $jenis = DB::table('xtb_jenis_barang') -> get();
        // dd('edit');
        $barang = DB::table('v_barang')->where('kode_barang', $kode_barang)->first();
        return  view('barang/edit', compact('barang', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_barang)
    // : RedirectResponse
    {
        // dd('update'); 
        try {
            $affected = DB::table('xtb_barang')->where('kode_barang', $kode_barang)
                ->update([
                    'kode_barang' => $request->kode_barang,
                    'nama_barang' => $request->nama_barang,
                    'satuan' => $request->satuan,
                    'stok' => $request->stok,
                    'harga_jual' => $request->harga_jual,
                    'id_jenis' => $request->id_jenis,
                    'user_id' => $request->user_id
                ]);
            return  redirect('barang')->with('status', 'Data barang berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('barang')->with('status', 'Data barang gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_barang)
    // : RedirectResponse
    {
        // dd('delete');
        $barang = DB::table('xtb_barang')->where('kode_barang', $kode_barang)->delete();
        return  redirect('barang')->with('status', 'Data barang berhasil dihapus..');
    }
}
