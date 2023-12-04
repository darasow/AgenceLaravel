<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Listing\ListingProprieteRequest;
use App\Models\Propriete;
use Illuminate\Http\Request;

class ControllerProprieteListing extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListingProprieteRequest $request)
    {
        $query = Propriete::query()->with('options');
        
        if($validated = $request->validated('prix'))
        {
            $query = $query->where('prix', '>=', $validated);
        } 
        if($validated = $request->validated('surface'))
        {
            $query = $query->where('surface', '>=', $validated);
        } 
        if($validated = $request->validated('titre'))
        {
            $query = $query->where('titre', 'like', "%{$validated}%");
        } 
        if($validated = $request->validated('ville'))
        {
            $query = $query->where('ville', 'like', "%{$validated}%");
        } 
         
        return View("listing.index", ['proprietes' => $query->paginate(10), 'input' => $request->validated()]);
    }

    public function show(string $slug, Propriete $propriete)
    {
        $slugePropriete = $propriete->getSlug();

        if($slug != $slugePropriete)
        {
            return to_route("listing.show", ['slug' => $slugePropriete,'propriete' => $propriete]);
        }
        return View("listing.show", ['slug' => $slugePropriete,'propriete' => $propriete]);

    }

    
}
