<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Etudiant;
use App\Ecolage;
use App\Paiement;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = DB::select('select * from v_etudiant_ecolage');
        // $etudiants = Etudiant::all();
        return view('index',compact('etudiants'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'sexe' => $request->sexe,
            'adresse' => $request->adresse,
            'image' => $request->image
        ]);
        $id_nouveau_etudiant = Etudiant::where('nom',$request->nom)->where('prenom',$request->prenom)->where('adresse',$request->adresse)->value('id');
        $janvier = $request->janvier;
        $fevrier = $request->fevrier;
        $mars = $request->mars;
        $avril = $request->avril;
        $mai = $request->mai;
        // dd($var, $var1, $var2, $var3, $var4);                                                                                                              
        $zero = 0;
        Ecolage::create([
            'janvier' => $janvier or $zero,
            'fevrier' => $fevrier or $zero,
            'mars' => $mars or $zero,
            'avril' => $avril or $zero,
            'mai' => $mai or $zero,
        ]);
        $dernier_ecolage_id = DB::select('select id from ecolages order by id DESC limit 1');
        // dd($dernier_ecolage_id);
        Paiement::create([
            'etudiant_id' => $id_nouveau_etudiant,
            'ecolage_id' => $dernier_ecolage_id[0]->id
        ]);
        // $etudiants = DB::select('select * from v_etudiant_ecolage');
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $modif = Etudiant::findOrFail($id);
            return view('afficher',compact('modif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Etudiant::where('id',$id)->update([
            'nom' => $request->nom_modif,
            'prenom' => $request->prenom_modif,
            'age' => $request->age_modif,
            'sexe' => $request->sexe_modif,
            'adresse' => $request->adresse_modif,
            'image' => $request->image_modif
        ]);
        return redirect('/');
    }

    public function modifier($id)
    {
        //donnée deja compacté
        $modif = Etudiant::findOrFail($id);
        // dd($modif);
        //donnée type tableau
        return view('modifier',compact('modif'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ecolage_id = Paiement::where('etudiant_id',$id)->value('ecolage_id');
        Paiement::where('etudiant_id',$id)->delete();
        Etudiant::where('id',$id)->delete();
        Ecolage::where('id',$ecolage_id)->delete();
        return back();
    }
}
