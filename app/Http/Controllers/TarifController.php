<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // mengambil data dari table tarifs
        $tarifs = DB::table('tarifs')->paginate(10);

        // mengirim data dari table tarifs ke view index
        return view('dashboard', ['tarifs' => $tarifs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  method untuk
    public function tambah()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tarifs')->insert([
            'kodetarif' => $request->kodetarif,
			'voltase' => $request->voltase,
			'biaya' => $request->biaya
        ]);

        return redirect('/tarif');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(tarif $tarifs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data tarif berdasarkan id yang dipilih
		$tarif = DB::table('tarifs')->where('id',$id)->get();
		// passing data tarif yang didapat ke view edit.blade.php
		return view('edit',['tarifs' => $tarif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // update data tarif
		DB::table('tarifs')->where('id',$request->id)->update([
			'kodetarif' => $request->kodetarif,
			'voltase' => $request->voltase,
			'biaya' => $request->biaya,
		]);
		// alihkan halaman ke halaman tarif
		return redirect('/tarif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    // method untuk hapus data tarif
	public function hapus($id)
	{
		// menghapus data tarif berdasarkan id yang dipilih
		DB::table('tarifs')->where('id',$id)->delete();

		// alihkan halaman ke halaman tarif
		return redirect('/tarif');
	}
}
