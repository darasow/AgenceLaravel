<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginProprieteRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerAuthenticate extends Controller
{
      public function login()
      {
        return view("auth.login");
      }
      public function profile()
      {
        return view("profile.edit", ['user' => Auth::user()]);
      }
      public function dologin(LoginProprieteRequest $request)
      {
         $credenChield = $request->validated();
         if(Auth::attempt($credenChield))
         {
            $request->session()->regenerate();
            return redirect()->intended(route("admin.propriete.index"));
         }
         
         return back()->withErrors([
            'email' => 'Information incorrecte'
         ])->onlyInput('email');
      }
      public function logout()
      {
           Auth::logout();
           return to_route('auth.login')->with("success", "Vous êtes maintenant déconnecté");
      }
}
