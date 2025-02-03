<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::paginate(3);
        return view('evenement',compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenement = new Evenement();
       return view('addEvenement',compact('evenement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|max:100',
            'prix' => 'required|numeric|max:500000',
        ]);

        $event = new Evenement();
        $event->libelle = $request['libelle'];
        $event->prix = $request['prix'];
        $event->description = $request['description'];
        $event->date = $request['dateEvenement'];
        $event->lieu = $request['lieu'];
        $event->save();
        return redirect('listEvenement')->with('message','Evenement ajoute avec succes');
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
        $evenement = Evenement::find($id);
        return view('addEvenement',compact('evenement'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $event = Evenement::find($request['id']);
        $event->libelle = $request['libelle'];
        $event->prix = $request['prix'];
        $event->description = $request['description'];
        $event->date = $request['dateEvenement'];
        $event->lieu = $request['lieu'];
        $event->save();
        return to_route('listEvenement');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Evenement::find($id);
        $event->delete();
        return redirect('listEvenement')->with('message','Evenement supprime avec succes');

    }
}
