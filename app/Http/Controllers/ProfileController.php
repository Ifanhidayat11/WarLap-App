<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.profile.index', [
            'title'     => 'APM | Profile',
            'header'        =>'Profile',
            'breadcrumb1'   =>'Profile',
            'breadcrumb2'   =>'Index'
        ]);
    }

    public function detail()
    {
        return view('pages.admin.profile.editprofile', [
            'title'     => 'APM | Profile',
            'header'        =>'Profile',
            'breadcrumb1'   =>'Profile',
            'breadcrumb2'   =>'Detail'
        ]);
    }
}
