<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactProprieteRequest;
use App\Mail\ProprieteContactMail;
use App\Models\Propriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControllerContact extends Controller
{
      public function contact(Propriete $propriete, ContactProprieteRequest $request)
      {
         Mail::send(new ProprieteContactMail($propriete, $request->validated()));
         return back()->with("success", "Votre message a bien ete envoyer");
      }
}
