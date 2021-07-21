<?php

namespace App\Http\Controllers;

use App\Models\kedai;
use Illuminate\Http\Request;

class KedaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kedais = Kedai::all();
        return view('kedais.index',[
            'kedais'=> $kedais
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kedai.create');
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
           
            'nama'  => 'required',
            'lokasi'=> 'required',
            'notel'=> 'required', 
        ]);
 
        $kedai = new Kedai;
        $kedai ->nama= $request->nama;
        $kedai ->lokasi= $request->lokasi;
        $kedai ->notel= $request->notel;
        
       
        
        $kedai->save(); 
        return redirect('/kedais'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kedai  $kedai
     * @return \Illuminate\Http\Response
     */
    public function show(kedai $kedai)
    {
        return view('kedai.show', [
            'kedai'=> $kedai
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kedai  $kedai
     * @return \Illuminate\Http\Response
     */
    public function edit(kedai $kedai)
    {
        return view('kedai.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kedai  $kedai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kedai $kedai)
    {
        $kedai ->nama= $request->nama;
        $kedai ->lokasi= $request->lokasi;
        $kedai ->notel= $request->notel;
        $kedai->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kedai  $kedai
     * @return \Illuminate\Http\Response
     */
    public function destroy(kedai $kedai)
    {
        //
    }
}
