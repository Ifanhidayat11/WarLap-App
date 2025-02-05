<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.masyarakat.index', [
            'title'     => 'APM | Masyarakat',
            'header'        =>'Masyarakat',
            'breadcrumb1'   =>'Masyarakat',
            'breadcrumb2'   =>'Index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.masyarakat.create', [
            'title'     => 'APM | Masyarakat',
            'header'        =>'Masyarakat',
            'breadcrumb1'   =>'Masyarakat',
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
        return view('pages.admin.masyarakat.edit', [
            'title'     => 'APM | Masyarakat',
            'header'        =>'Masyarakat',
            'breadcrumb1'   =>'Masyarakat',
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
