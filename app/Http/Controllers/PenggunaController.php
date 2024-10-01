<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengguna = DB::table('users')->get();
        return view('pengguna/index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengguna/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    protected function store(Request $request)
    {
        try {
            //dd($request['level_akses]);
            $query = DB::table('users')->insert([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'level_akses' => $request['level_akses']
            ]);

            return redirect('pengguna')->with( 'status', 'pengguna berhasil ditambah...');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect( 'pengguna')->with( 'status', $ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengguna $pengguna)
    {
        //
    }
}