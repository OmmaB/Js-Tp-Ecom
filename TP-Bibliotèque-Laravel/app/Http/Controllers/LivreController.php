<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;
use App\Models\Livre;
use Illuminate\Support\Facades\DB;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $livres = DB::table('livres')->paginate(10);
        $livres = Livre::all();
        // return $livres;
        return view('livres.all',compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::get();
        //return $auteurs;
        return view('livres.new',compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $livre = new Livre();
        $livre->titre = $request->titre;
        $livre->auteur_id = $request->auteur_id;
        $livre->publier = $request->publier;
        $livre->nombreDePages = $request->nombreDePages;
        $livre->save();
        return redirect()->route('livres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.one',compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $auteurs = Auteur::get();
        $livre = Livre::findOrFail($id);
        // return $livre;
        return view('livres.modify',compact('livre','auteurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // return $request;
        // $livre = Livre::where('id',$id);
        // $livre->titre = $request->titre;
        // $livre->auteur_id = $request->auteur_id;
        // $livre->publier = $request->publier;
        // $livre->nombreDePages = $request->nombreDePages;
        // $livre->save();
        Livre::where('id',$id)->update([
            'titre'=>$request->titre,
            'auteur_id'=>$request->auteur_id,
            'publier'=>$request->publier,
            'nombreDePages'=>$request->nombreDePages,
        ]);
        return redirect()->route('livres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Livre::where('id',$id)->delete();
        return redirect()->route('livres.index');
    }
}
