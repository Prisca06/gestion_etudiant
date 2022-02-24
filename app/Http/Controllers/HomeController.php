<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use Illuminate\Support\Facades\DB;

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
        $etudiants = DB::select('select * from v_etudiant_ecolage');
        // $etudiants = Etudiant::all();
        return view('index',compact('etudiants'));
    }
}
