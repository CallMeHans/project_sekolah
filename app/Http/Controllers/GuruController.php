<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = DB::table('xtb_guru')->get();  
        return view('guru/index', compact('gurus'));  
    }

    public function create() 
    {
        return view('guru/create');   
    }

    public function store(Request $request)
    {
        try 
        {
            DB::table('xtb_guru')->insert([
                'nip' => $request->nip,  
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon
            ]);

            return redirect('guru')->with('status', 'Guru berhasil ditambah..'); 
        } 
        catch(\Illuminate\Database\QueryException $ex) 
        {  
            return redirect('guru')->with('status', 'Gagal menambah guru: ' . $ex->getMessage()); 
        } 
    }

    public function show(string $nip) 
    {
        $guru = DB::table('xtb_guru')->where('nip', $nip)->first();  
        return view('guru/show', compact('guru'));
    }

    public function edit(string $nip) 
    {
        $guru = DB::table('xtb_guru')->where('nip', $nip)->first();   
        return view('guru/edit', compact('guru'));   
    }

    public function update(Request $request, string $nip) 
    {
        try 
        { 
            $affected = DB::table('xtb_guru')->where('nip', $nip)
                ->update([ 
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon
                ]);

            return redirect('guru')->with('status', 'Guru berhasil diubah..'); 
        } 
        catch(\Illuminate\Database\QueryException $ex) 
        {  
            return redirect('guru')->with('status', 'Gagal mengubah guru: ' . $ex->getMessage()); 
        } 
    }

    public function destroy(string $nip)
    {
        DB::table('xtb_guru')->where('nip', $nip)->delete();      
        return redirect('guru')->with('status', 'Data guru berhasil dihapus..');
    }
}
