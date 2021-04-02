<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Hamcrest\Util;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{

    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }


    public function create()
    {
        //C'est du front
        return view('utilisateurs.create');
    }


    public function store(Request $request)
    {
        //C'est du back

        //Ici c'est la sécurité
        $request->validate([
            'nom' => 'required|min:2|max:255|regex:/^[A-Za-z]+$/|nullable',
            'prenom' => 'required|min:2|max:255|regex:/^[A-Za-z]+$/'
        ]);



        //On va créer le nouvel utilisateur
        $utilisateur = new Utilisateur(
            [
                'nom' => $request->get('nom'),
                'prenom' => $request->get('prenom')
            ]
        );

        //On va le stocker 
        $utilisateur->save();


        //On va redigirer l'utilisateur vers une autre page
        return back();

    }


    public function show(Utilisateur $utilisateur)
    {
        //
    }


    public function edit($id)
    {
        $utilisateur = Utilisateur::find($id);
        return view('utilisateurs.edit',compact('utilisateur'));
    }


    public function update(Request $request, $id)
    {
         //C'est du back

        //Ici c'est la sécurité
        $request->validate([
            'nom' => 'required|min:2|max:255|regex:/^[A-Za-z]+$/|nullable',
            'prenom' => 'required|min:2|max:255|regex:/^[A-Za-z]+$/'
        ]);

        $utilisateur = Utilisateur::find($id);

        $utilisateur->nom = $request->get('nom');
        $utilisateur->prenom = $request->get('prenom');

        $utilisateur->save();

        return redirect('/utilisateurs');

    }


    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id);

        $utilisateur->delete();

        return back();
    }
}
