<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PembelianController extends Controller
{

    public function index()
    {
        //dd('index');
        $Pembelian = DB::table('v_pembelian')->get();
        return view('Pembelian.index', compact('Pembelian'));  //passing parameter asosiasi 
    }

    public function create()
    {
        $barang = DB::table('xtb_barang') -> get();
        $suplier = DB::table('xtb_suplier') ->get();
        // dd('create');
        return view('Pembelian.create', compact('barang', 'suplier'));
    }

    public function store(Request $request)     //: RedirectResponse
    {
        // dd('store');
        try {
            $query = DB::table('tbl_beli_barang')->insert([
                'nofak_beli' => $request->nofak_beli,
                'tgl_beli' => $request->tgl_beli,
                'kode_barang' => $request->kode_barang,
                'jumlah_beli' => $request->jumlah_beli,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'user_id' => $request->user_id,
                'id_suplier' => $request->id_suplier
            ]);


            return  redirect('Pembelian')->with('status', 'Data Pembelian berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('Pembelian')->with('status', $ex);
        }
    }

    public function show()
    {
        $Pembelian = DB::table('v_pembelian')->get();
        return view('Pembelian.show', compact('Pembelian'));
    }


    public function edit(string $nofak_beli)
    //: Response
    {
        $barang = DB::table('xtb_barang') -> get();
        $suplier = DB::table('xtb_suplier') ->get();

        // dd('edit');
        $Pembelian = DB::table('v_pembelian')->where('nofak_beli', $nofak_beli)->first();
        return  view('Pembelian/edit', compact('Pembelian', 'barang', 'suplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nofak_beli)
    // : RedirectResponse
    {
        // dd('update'); 
        try {
            $affected = DB::table('tbl_beli_barang')->where('nofak_beli', $nofak_beli)
                ->update([
                    'nofak_beli' => $request->nofak_beli,
                    'tgl_beli' => $request->tgl_beli,
                    'kode_barang' => $request->kode_barang,
                    'jumlah_beli' => $request->jumlah_beli,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                    'user_id' => $request->user_id,
                    'id_suplier' => $request->id_suplier
                ]);
            return  redirect('Pembelian')->with('status', 'Data Pembelian berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('Pembelian')->with('status', 'Data Pembelian gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nofak_beli)
    // : RedirectResponse
    {
        // dd('delete');
        $pembelian = DB::table('tbl_beli_barang')->where('nofak_beli', $nofak_beli)->delete();
        return  redirect('Pembelian')->with('status', 'Data Pembelian berhasil dihapus..');
    }
}
