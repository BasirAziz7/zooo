<?php

namespace App\Http\Controllers;
use App\Mail\SudahTambah;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Models\haiwan;
use Illuminate\Http\Request;

class HaiwanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $response = Http::get('https://swapi.dev/api/starships/?page=1');
        $response_json = $response->json();
        
        $haiwans = Haiwan::all();
        return view('haiwan.index',[
            'haiwans'=> $haiwans,
            'dataAPI'=> $response_json['results']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('haiwan.create');
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
            'jenis'=> 'required',
            'harga'=> 'required', 
        ]);
 
        $haiwan = new Haiwan;
        $haiwan ->nama = $request->nama;
        $haiwan ->jenis= $request->jenis;
        $haiwan ->harga= $request->harga;
        
       
        
        $haiwan->save(); 
        $recipient=["basiraziz7@gmail.com"];
        Mail::to($recipient)->send(new SudahTambah());
        return redirect('/haiwans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\haiwan  $haiwan
     * @return \Illuminate\Http\Response
     */
    public function show(haiwan $haiwan)
    {
        return view('haiwan.show', [
            'haiwan'=> $haiwan

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\haiwan  $haiwan
     * @return \Illuminate\Http\Response
     */
    public function edit(haiwan $haiwan)
    {
        return view('haiwan.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\haiwan  $haiwan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, haiwan $haiwan)
    {
        $haiwan ->nama = $request->nama;
        $haiwan ->jenis= $request->jenis;
        $haiwan ->harga= $request->harga;
        $haiwan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\haiwan  $haiwan
     * @return \Illuminate\Http\Response
     */
    public function destroy(haiwan $haiwan)
    {
        //
    }
}
