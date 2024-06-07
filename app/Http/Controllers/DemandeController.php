<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;


class DemandeController extends Controller
{
    public function listDemandes(){
        $demandes = Demande::get();
        return view ("demandes/demandesList",compact("demandes"));
    }

    public function demandesform(){

        return view ("demandes/demande");
    }


    public function create_demande(Request $request)
    {

        Demande::create([
            'objet' => $request->objet ,
            'description' => $request->description,
            'lieux' => $request->lieux,
            'type'=> $request->type,
            'date'=> $request->date,
            'user_id'=> $request->userid,
            'etat'=> "initier",
        ]);

        return back()->with('successful','Demande Cree');
    }


    public function show($id)
    {

        $demande = Demande::findOrFail($id);

        return view('demandes/demandedetails', compact('demande'));
    }


    public function update_demande(Request $request)
    {

        $demandeUpdate =[
            'objet' => $request->objet ,
            'description' => $request->description,
            'lieux' => $request->lieux,
            'type'=> $request->type,
            'date'=> $request->date,
            'user_id'=> $request->userid,
            'etat'=> $request->etat,
        ];
        Demande::updateOrCreate(
            [
                'id'=>$request->demandeid
            ],
            $demandeUpdate,
        );
        return redirect()->route('demande.show',['id'=>$request->demandeid])->with('successful','Demande Modifiee');
    }



    public function delete_demande(Request $request)

    {

        Demande::destroy($request->demandeid);
        return redirect()->route('demandes');
    }
}
