<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProprieteFormRequest;
use App\Models\Option;
use App\Models\Propriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerPropriete extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.proprietes.index', [
        'proprietes' => Propriete::orderBy('created_at', 'desc')->paginate(2),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propriete = Propriete::make();
        $propriete->fill([
            'titre' => 'Maison',
            'description' => 'Maison de VIP',
            'prix' => 5000,
            'surface' => 40,
            'nombreDePiece' => 10,
            'nombreDeChambre' => 5,
            'ville' => 'mamou',
            'etage' => 0,
            'codePostale' => 34000,
            'vendu' => false,
            'adresse' => 'telico'
        ]);
        // dd(Option::pluck('nom', 'id')); // permet de creer un tableau dont la cle est l'id et valeur est nom
        return view('admin.proprietes.form', ['propriete' => $propriete, 'options' => Option::pluck('nom', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProprieteFormRequest $request)
    {
       $data = $request->validated();
       $propriete = Propriete::create($data);
       $propriete->options()->sync($data['options']);
       return to_route("admin.propriete.index")->with("success", 'Propriete ajouter avec succes');

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
    public function edit(Propriete $propriete)
    {
        return view('admin.proprietes.form', ['propriete' => $propriete,'options' => Option::pluck('nom', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProprieteFormRequest $request, Propriete $propriete)
    {   
        $data = $request->validated();
        $propriete->update($data);
        $propriete->options()->sync($data['options']);
        return to_route("admin.propriete.index")->with("success", 'Propriete modifier avec succes');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propriete $propriete)
    {
        $propriete->delete(); // forceDelete() pour forcer la suppression
        // restore() pour restorer les chose supprimer en remetant le deletin_at a null
        return to_route("admin.propriete.index")->with("success", 'Propriete supprimer avec succes');

    }
}
