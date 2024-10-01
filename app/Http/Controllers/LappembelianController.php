<?php

namespace App\Http\Controllers;

use App\Models\Lappembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LappembelianController extends Controller
{

    public function index()
    {
        return view('lappembelian/create');
    }


    public function show(Request $request)
    {

        $tgbeli = $request->tgbeli;
        $bulan_beli = $request->bulan_beli;
        $tahun = $request->tahun;


        $tanggal = DB::table('v_pembelian')
            ->select('tgl_beli', 'tgbeli', 'bulan_beli', 'tahun')
            ->distinct()
            ->where('tgbeli', $tgbeli)
            ->where('bulan_beli', $bulan_beli)
            ->where('tahun', $tahun)
            ->get();

        $beli = DB::table('v_pembelian')
            ->where('tgbeli', $tgbeli)
            ->where('bulan_beli', $bulan_beli)
            ->where('tahun', $tahun)
            ->get();

        return view('lappembelian/tampiltgl', compact('beli', 'tanggal'));
        
    }
}
