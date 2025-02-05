<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.pegawai.index', [
            'title'     => 'APM | Pegawai',
            'header'        =>'Pegawai',
            'breadcrumb1'   =>'Pegawai',
            'breadcrumb2'   =>'Index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pegawai.create', [
            'title'     => 'APM | Pegawai',
            'header'        =>'Pegawai',
            'breadcrumb1'   =>'Pegawai',
            'breadcrumb2'   =>'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.admin.pegawai.edit' ,[
            'title'     => 'APM | Pegawai',
            'header'        =>'Pegawai',
            'breadcrumb1'   =>'Pegawai',
            'breadcrumb2'   =>'Edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
