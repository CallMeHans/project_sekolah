<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suplier = DB::table('xtb_suplier')->get();
        return view('suplier/index', compact('suplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suplier/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd('store');
        try {
            $query = DB::table('xtb_suplier')->insert([
                'id_suplier' => $request->id_suplier,
                'nama_suplier' => $request->nama_suplier,
                'alamat_suplier' => $request->alamat_suplier,
                'telepon_suplier' => $request->telepon_suplier
            ]);

            return redirect('suplier')->with('status', 'suplier berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('suplier')->with('status', $ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $suplier = DB::table('xtb_suplier')->get();
        return view('suplier.show', compact('suplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_suplier)
    {
        //dd('edit)
        $suplier = DB::table('xtb_suplier')->where('id_suplier', $id_suplier)->
        first();
        return view('suplier/edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_suplier)
    {
        //dd('update')
        try {
            $affected = DB::table('xtb_suplier')->where('id_suplier', $id_suplier)
                ->update([
                    'nama_suplier' => $request->nama_suplier,
                    'alamat_suplier' => $request->alamat_suplier,
                    'telepon_suplier' => $request->telepon_suplier
                ]);
            return  redirect('suplier')->with('status', 'Data Suplier berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('suplier')->with('status', 'Data Suplier gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_suplier)
    {
        //
        $suplier = DB::table('xtb_suplier')->where('id_suplier', $id_suplier)->delete();
        return redirect('suplier')->with('status', 'Data suplier berhasil dihapus..');
    }
}
