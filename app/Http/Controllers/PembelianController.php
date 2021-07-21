<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelian.index',[
            'pembelians'=> $pembelians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'id'  => 'required',
            'tarikh'=> 'required',
            'haiwan'=> 'required', 
        ]);
 
        $pembelian = new Pembelian;
        $pembelian ->id = $request->id;
        $pembelian ->tarikh= $request->tarikh;
        $pembelian ->haiwan= $request->haiwan;
        
       
        
        $pembelian->save(); 
        return redirect('/pembelians'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(pembelian $pembelian)
    {
        return view('pembelian.show', [
            'pembelian'=> $pembelian

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(pembelian $pembelian)
    {
        return view('pembelian.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembelian $pembelian)
    {
        $pembelian ->id = $request->id;
        $pembelian ->tarikh= $request->tarikh;
        $pembelian ->haiwan= $request->haiwan;
        $pembelian->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembelian $pembelian)
    {
        //
    }
}
