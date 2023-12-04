<?php

namespace App\Http\Controllers\Acceuill;

use App\Http\Controllers\Controller;
use App\Models\Propriete;
use Illuminate\Http\Request;

class ControllerAcceuil extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $propriete = Propriete::Vendu()->recent()->limit(4)->get();
        // dd($propriete->first()->vendu);

        return View('acceuil', ['proprietes' => $propriete]);
    }

}
