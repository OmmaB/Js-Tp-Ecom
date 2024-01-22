<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auteurs = Auteur::all();
        return view('auteurs.all',compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auteurs.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Auteur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
        ]);
        return redirect()->route('auteurs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $auteur = Auteur::find($id);
        // return $auteur;
        return view('auteurs.one',compact('auteur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $auteur = Auteur::findOrFail($id);
        return view('auteurs.modify',compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Auteur::where('id',$id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
        ]);
        return redirect()->route('auteurs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Auteur::destroy($id);
        return redirect()->route('auteurs.index');
    }
}
