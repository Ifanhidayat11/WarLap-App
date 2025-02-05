<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.kategori.index', [
            'title'     => 'APM | Kategori',
            'header'        =>'Kategori',
            'breadcrumb1'   =>'Kategori',
            'breadcrumb2'   =>'Index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kategori.create', [
            'title'     => 'APM | Kategori',
            'header'        =>'Kategori',
            'breadcrumb1'   =>'Kategori',
            'breadcrumb2'   =>'create'
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
        return view('pages.admin.kategori.edit', [
            'title'     => 'APM | Kategori',
            'header'        =>'Kategori',
            'breadcrumb1'   =>'Kategori',
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
