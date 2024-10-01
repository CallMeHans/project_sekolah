<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenjualanController extends Controller
{
    
    
     
    public function index()
    {
        $penjualan = DB::table('v_penjualan')->get();
        return view ('penjualan/index', compact('penjualan'));
    }

    
  
    public function create()

    {   
        $barang = DB::table('xtb_barang')->get();
        return view('penjualan/create', compact('barang'));
    }

    
   
    public function store(Request $request)
    {
    try{
        $query=DB::table('tbl_jual_barang')->insert([
            'nofak_jual' => $request -> nofak_jual,
            'tgl_jual' => $request -> tgl_jual,
            'kode_barang' => $request -> kode_barang,
            'jumlah_jual' => $request -> jumlah_jual,
            'harga_jual' => $request -> harga_jual,
            'user_id' => $request -> user_id,
        ]);
        return redirect('penjualan') -> with ('status', 'penjualan berhasil ditambah ..');
    }
    catch (\Illuminate\Database\QueryException $ex){
        return redirect('penjualan') -> with ('status',$ex);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
        $penjualan = DB::table('v_penjualan')->get();
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit(string $penjualan)
    {
        $barang = DB::table('xtb_barang')->get();
    
        $penjualan = DB::table('v_penjualan')->where('nofak_jual', $penjualan )-> first();
        return view('penjualan/edit', compact('penjualan','barang'));
    }

   
    public function update(Request $request, string $penjualan)
    {
        try{
            $affected = DB::table('tbl_jual_barang')->where('nofak_jual',$penjualan)->update([
            'nofak_jual' => $request -> nofak_jual,
            'tgl_jual' => $request -> tgl_jual,
            'kode_barang' => $request -> kode_barang,
            'jumlah_jual' => $request -> jumlah_jual,
            'harga_jual' => $request -> harga_jual,
            'user_id' => $request -> user_id,
            ]
            );
            return redirect('penjualan')-> with ('status', 'penjualan berhasil diubah..');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return redirect('penjualan')-> with ('status', 'penjualan gagal ditabmah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $penjualan)
    {
        $penjualan = DB::table('tbl_jual_barang')->where('nofak_jual', $penjualan)->delete();      
        return  redirect('penjualan')-> with ('status', 'Data penjualan berhasil dihapus..');
    }
}