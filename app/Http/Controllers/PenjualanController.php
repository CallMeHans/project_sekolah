<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('index');
        $Penjualan = DB::table('v_jual')->get();
        return view('Penjualan.index', compact('Penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = DB::table('xtb_barang') -> get();
        // dd('create');
        return view('Penjualan.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('store');
        try {
            $query = DB::table('tbl_jual_barang')->insert([
                'nofak_jual' => $request->nofak_jual,
                'tgl_jual' => $request->tgl_jual,
                'kode_barang' => $request->kode_barang,
                'jumlah_jual' => $request->jumlah_jual,
                'harga_jual' => $request->harga_jual,
                'harga_jual' => $request->harga_jual,
                'user_id' => $request->user_id
            ]);


            return  redirect('Penjualan')->with('status', 'Data Penjualan berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('Penjualan')->with('status', $ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // dd('show')
        $Penjualan = DB::table('v_jual')->get();
        return view('Penjualan.show', compact('Penjualan', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nofak_jual)
    {
        $barang = DB::table('xtb_barang') -> get();
        // dd('edit');
        $Penjualan = DB::table('v_jual')->where('nofak_jual', $nofak_jual)->first();
        return  view('Penjualan/edit', compact('Penjualan', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nofak_jual)
    {
        // dd('update'); 
        try {
            $affected = DB::table('tbl_jual_barang')->where('nofak_jual', $nofak_jual)
                ->update([
                    'nofak_jual' => $request->nofak_jual,
                    'tgl_jual' => $request->tgl_jual,
                    'kode_barang' => $request->kode_barang,
                    'jumlah_jual' => $request->jumlah_jual,
                    'harga_jual' => $request->harga_jual,
                    'harga_jual' => $request->harga_jual,
                    'user_id' => $request->user_id
                ]);
            return  redirect('Penjualan')->with('status', 'Data Penjualan berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('Penjualan')->with('status', 'Data Penjualan gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nofak_jual)
    {
        // dd('delete');
        $Penjualan = DB::table('tbl_jual_barang')->where('nofak_jual', $nofak_jual)->delete();
        return  redirect('Penjualan')->with('status', 'Data Penjualan berhasil dihapus..');
    }
}
