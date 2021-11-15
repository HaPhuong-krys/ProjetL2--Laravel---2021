<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\formation;
use Session;



class loginController extends Controller
{

    public function pageAccueil(){
      $formation = DB::table('formations')->get();
      return view('layout.pageAccueil', ['formation'=>$formation]);
    }

    public function inscriptionForm(){
      $formation = DB::table('formations')->get();
    	return view('home.inscriptionForm', ['formation'=>$formation]);
    }

    public function inscription(Request $request){
    	$valid = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
   			    'login' => 'required|max:40',
   		     	'mdp' => 'required|min:6|max:20|confirmed'
        
    	],[
    		'login.required' => 'le champs contient maximum 40 charactères',
    		'mdp.required' => 'le champs contient minimun 6 et maximum 20 charactères',
    	]);

      $login = DB::table('users')->where('login', '=', $request->login)->first();
      if ($login == null) {
        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
    	  $user->login = $request->login;
    	  $user->mdp = Hash::make($request->mdp);
      
        $user->formation_id= $request->formation_id;
        $user->save();
      
        Auth::login($user);

        return view('home.homeNull');
      }
      else
        echo "Votre login existe dans notre base de donné, Veuillez choisir une autre login";

    }


    public function loginForm(){
    	return view('home.loginForm');
    }

    public function login(Request $request){
    	$valid = $request->validate([
    		'login' => 'required|max:40',
    		'mdp' => 'required|min:6|max:20'
    	]);
    	$credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];

    	if (Auth::attempt($credentials)) {
    		 $request->session()->regenerate();
             $request->session()->flash('etat','login sucessful'); 

           	$user = Auth::user();
           	if ($user->type == "admin") {
           		return view('home.Admin.home');
           	}
           	else if ($user->type == "etudiant") {
           		return view('home.Etudiant.home');
           	}
           	else if($user->type == "professeur"){
            	return view('home.Prof.home');
           	}
  	     	return view('home.homeNull');
    	}
    	else{
    		return back()->withErrors([
            'login' => "Votre login ou votre mot de pass saisis ne sont pas corrects. Veuillez assurer que vous avez entré de bons authentification",
        ]);
    		
    	}
    }


    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      $request->session()->flash('etat','déconnexion sucessful');

      return view('layout.master');
    }

    public function changeMDPForm(){
    	return view('changeMDPForm');
    }

    public function postChangeMDP(Request $request){
    	 $valid = $request->validate([
            'ancien_mdp'=>'required|string',
            'nouveau_mdp'=>'required|string|min:3|max:20',
            'confirm_mdp' => 'required|same:nouveau_mdp'
         ]);

         User::where('id',Auth::user()->id) -> update([
            'mdp' => Hash::make($request->nouveau_mdp)
         ]);

          $request->session()->flash('etat','changement sucessful');

          $user = Auth::user();
          if ($user->type == "admin") {
          	return view('home.Admin.home');
          }
          else if ($user->type == "etudiant") {
           	return view('home.Etudiant.home');
          }
          else if($user->type == "professeur"){
            return view('home.Prof.home');
          }
  	      return view('home.homeNull');
    }

    public function modificationForm(){
    	//$user = Auth::user();
    	return view('modificationInfoForm');
    }

    public function modifier(Request $request){
    	$user = Auth::user();

    	$valid = $request->validate([
   		'nom' => 'required|alpha|max:40',
   		'prenom' => 'required|max:40',
   		'login' => 'required|alpha|max:40'
   	]);

      $user_changer = DB::table('users')->where('login', '=', $request->login)->first();
      if($user_changer == null){


   		     $user->nom = $valid['nom'];
   		     $user->prenom = $valid['prenom'];
   		     $user->login = $valid['login'];

   		     $user->save();

   		     $request->session()->flash('etat','changement sucessful');

   		     if ($user->type == "admin") {
          	   return view('home.Admin.home');
            }
          else if ($user->type == "etudiant") {
           	  return view('home.Etudiant.home');
            }
          else if($user->type == "professeur"){
              return view('home.Prof.home');
            }
  	       return view('home.homeNull');
      }

      else
        echo "Votre login existe dans notre base de donné, Veuillez choisir une autre login";

    } 
}
