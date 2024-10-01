<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Parser\Handler\StringHandler;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jenis = DB::table('xtb_jenis_barang')->get();
        return view('jenis/index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jenis/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd('store');
        try {
            $query = DB::table('xtb_jenis_barang')->insert([
                'id_jenis' => $request->id_jenis,
                'jenis_barang' => $request->jenis_barang
            ]);

            return redirect('jenis')->with('status', 'jenis berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('jenis')->with('status', $ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $jenis = DB::table('xtb_jenis_barang')->get();
        return view('jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_jenis)
    {
        //dd('edit')
        $jenis = DB::table('xtb_jenis_barang')->where('id_jenis', $id_jenis)->first();
        return view('jenis/edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id_jenis)
    {
        // dd('update'); 
        try {
            $affected = DB::table('xtb_jenis_barang')->where('id_jenis', $id_jenis)
                ->update([
                    'jenis_barang' => $request->jenis_barang
                ]);
            return  redirect('jenis')->with('status', 'Data jenis berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('jenis')->with('status', 'Data jenis gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jenis)
    {
        //
        $jenis = DB::table('xtb_jenis_barang')->where('id_jenis', $id_jenis)->delete();
        return redirect('jenis')->with('status', 'Data jenis berhasil dihapus..');
    }
}
