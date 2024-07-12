<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    // Konsumen
    public function konsumenHome()
    {
        return view('konsumen.home');
    }


    public function kasirHome()
    {
        return view('kasir.home');
    }


    public function baristaHome()
    {
        return view('barista.home');
    }


    public function ownerHome()
    {
        return view('owner.home');
    }







}
