<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateReportController extends Controller
{
    public function index()
    {
        return view('pages.admin.generatereport.index', [
            'title'     => 'APM | Generate Report',
            'header'        =>'Generate Report',
            'breadcrumb1'   =>'Generate Report',
            'breadcrumb2'   =>'Index'
        ]);
    }

    public function periode()
    {
        return view('pages.admin.generatereport.generateperiode', [
            'title'     => 'APM | Generate Report',
            'header'        =>'Generate Report',
            'breadcrumb1'   =>'Generate Report',
            'breadcrumb2'   =>'Periode'
        ]);
    }

    public function rekap()
    {
        return view('pages.admin.generatereport.generaterekap', [
            'title'     => 'APM | Generate Report',
            'header'        =>'Generate Report',
            'breadcrumb1'   =>'Generate Report',
            'breadcrumb2'   =>'Rekap'
        ]);
    }
}
