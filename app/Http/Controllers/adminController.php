<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Cour;
use App\Models\Formation;
use App\Models\User;


class adminController extends Controller
{
    public function creerCoursForm(){
        $user = DB::table('users')->where('type', '=', 'professeur')->get();
        $formation = DB::table('formations')->get();
    	return view('Admin.creationCoursForm', ['user'=>$user, 'formation'=>$formation]);
    }

    public function creerCours(Request $request){
    	$valid = $request->validate([
    		'intitule'=>'required',
            'id'=>'required',
            'idFormation'=>'required'
    	]);

    	$cours = new Cour();
    	$cours->intitule = $valid['intitule'];
    	$cours->user_id  = $valid['id'];
        $cours->formation_id = $valid['idFormation'];

    	$cours->save();
    	$request->session()->flash('etat','ajouté sucessful');
    	return redirect()->route('listeCoursAdmin');

    }

    public function listerCours(){
    	$cours = DB::table('cours')->get();
    	return view('Admin.listeCours', ['cours' => $cours]);
    }

    public function listerFormation(){
    	$formation = DB::table('formations')->get();
    	return view('Admin.listeFormation', ['formation'=>$formation]);	
    }

    public function ajouterFormationForm(){
    	return view('Admin.creationFormationForm');
    }

    public function ajouterFormation(Request $request){
    	$valid = $request->validate([
    		'intitule'=>'required'
    	]);

    	$formation = new Formation();
    	$formation->intitule = $valid['intitule'];

    	$formation->save();
    	$request->session()->flash('etat','ajouté sucessful');
    	return redirect()->route('listeFormation');
    }

    public function listerUserNull(){
    	$user = DB::table('users')->where('type','=', NULL)->get();
    	return view('Admin.listeUserNull', ['users'=>$user]);
    }

    public function changerTypeForm($id){
    	 $user = User::findOrFail($id);
    	 return view('Admin.changeTypeForm',['users'=>$user]);
    }

    public function changeType(Request $request, $id){
    	$user = User::findOrFail($id);
    	$valid = $request->validate([
   		'nouveau_type' => 'required|alpha'
   	]);
    	$user->type = $valid['nouveau_type'];

    	$user->save();

    	$request->session()->flash('etat','changement type sucessful');
    	return view('home.Admin.home');
    }

    public function refuserType(Request $request,$id){
    	$user = User::findOrFail($id);

    	$user->delete();
    	$request->session()->flash('etat','refuse demande sucessful');
    	return view('home.Admin.home');
    }

    public function listerProf(){
         $prof = DB::table('users')->where('type', 'professeur')->get();
         return view('Admin.listeProf', ['prof'=>$prof]);
     }
    public function choisirCourAssocier($id){
         $prof = User::findOrFail($id);
       
         $cours = DB::table('cours')->get();
         return view('Admin.listeCoursAssocier', ['prof'=>$prof, 'cours'=>$cours]);
     }
    public function associerCours(Request $request, $id, $id_cours){
         $profID = User::findOrFail($id);
         $coursID = Cour::findOrFail($id_cours);
         $prof = $profID->id;
         $cours = $coursID->id;

         $requet = DB::table('cours_users')->where('user_id', '=', $id)->where('cours_id', '=', $id_cours)->first();

         if($requet == null){

            $add = DB::insert('insert into cours_users(cours_id, user_id) value(?, ?)', [$cours, $prof]);

            $request->session()->flash('etat','Association sucessful');
            return view('home.Admin.home');  
        }
        else{
            echo "L'association a déjà fait<br>";
            echo "Veuillez choisir un autre professeur ou un autre cours ne sont pas associé pour faire cette opération";
        }
    }


    public function rechercherCours(Request $request){
        $cours = DB::table('cours')->where('intitule', 'like', '%'.$request->cours_intitule.'%')->get();
    
        return view('Admin.rechercheIntitule', ['cours'=>$cours]);
    }

    public function modifierCoursForm($id_cours){
        $user = DB::table('users')->where('type', '=', 'professeur')->get();
        $formation = DB::table('formations')->get();
        $cours = Cour::findOrFail($id_cours);
        //print_r($id_cours);
        return view ('Admin.modificationCours', ['cours'=>$cours, 'formation'=>$formation, 'user'=>$user]);

    }

    public function modifierCours(Request $request, $id_cours){
        $cours = Cour::findOrFail($id_cours);
        $valid = $request->validate([
            'intitule'=>'required',
            'id'=>'required',
            'idFormation'=>'required'
        ]);

        $cours->intitule = $valid['intitule'];
        $cours->user_id = $valid['id'];
        $cours->formation_id = $valid['idFormation'];

        $cours->save();
        $request->session()->flash('etat', 'modification Réussite');
        return redirect()->route('listeCoursAdmin');


    }

    public function supprimerCours(Request $request, $id_cours){
        $cours = Cour::findOrFail($id_cours);

        $cours_user = DB::table('cours_users')->where('cours_users.cours_id', '=', $id_cours);
        $plannings = DB::table('plannings')->where('plannings.cours_id', '=', $id_cours);
        $cours_user->delete();
        $plannings->delete();
        $cours->delete();
        $request->session()->flash('etat', 'suppression Réussite');

        return redirect()->route('listeCoursAdmin');
    }

    public function modifierFormationForm($id_formation){
        $formation = Formation::findOrFail($id_formation);
        return view('Admin.modificationFormation',['formation'=>$formation]);
    }

    Public function modifierFormation(Request $request, $id_formation){
        $formation = Formation::findOrFail($id_formation);
        $valid = $request->validate([
            'intitule' =>'required'
        ]);

        $formation->intitule = $valid['intitule'];

        $formation->save();
        $request->session()->flash('etat', 'modification Réussite');
        return redirect()->route('listeFormation');
    }

    public function supprimerFormation(Request $request, $id_formation){
        $formation = Formation::findOrFail($id_formation);
        $coursLier =  DB::table('cours')-> where('cours.formation_id', '=', $id_formation);
        $etudiantLier = DB::table('users')->where('users.formation_id', '=', $id_formation)->get();
        
        $coursLierParcours =  DB::table('cours')-> where('cours.formation_id', '=', $id_formation)->get();
        $coursLierFirst =  DB::table('cours')-> where('cours.formation_id', '=', $id_formation)->first();
        $etudiantLierFirst = DB::table('users')->where('users.formation_id', '=', $id_formation)->first();
        
         if($coursLierFirst == null && $etudiantLierFirst == null)
        {
            $formation->delete();
        }

        else{
        //     //$coursLier->delete();
        //     foreach ($etudiantLier as $etudiantLier) {
        //      $idEtud = $etudiantLier->id;
        //      $cours_user = DB::table('cours_users')->where('cours_users.user_id', '=', $idEtud);

        //      $cours_user->delete();
        //      //$coursLier->delete();

        //      DB::table('users')->where('users.id', '=', $idEtud)->update(['formation_id'=> NULL]);
        //     }

        //     $coursLier->delete();
        //     $formation->delete();
        // }

                //$coursLier->delete();

            foreach ($etudiantLier as $etudiantLier) {
                $idEtud = $etudiantLier->id;
                DB::table('users')->where('users.id', '=', $idEtud)->update(['formation_id'=> NULL]);

            }
            foreach ($coursLierParcours as $coursLierParcours) {
             $idCour = $coursLierParcours->id;
             $cours_user = DB::table('cours_users')->where('cours_users.cours_id', '=', $idCour);

             //print_r($idCour);
             $cours_user->delete();
             //$coursLier->delete();

            // DB::table('users')->where('users.id', '=', $idEtud)->update(['formation_id'=> NULL]);
            }

            $coursLier->delete();
            $formation->delete();
        }




        $request->session()->flash('etat', 'suppression Réussite');

        return redirect()->route('listeFormation');

    }

    public function creerUserForm(){
        $formation = DB::table('formations')->get();
        return view('Admin.creationUserForm', ['formation' => $formation]);
    }
    public function creerUser(Request $request){
        $valid = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'login' => 'required|max:40',
            'mdp' => 'required|min:6|max:20|confirmed',
            'type' => 'required'
        
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
        $user->type = $request->type;
      
        $user->formation_id = $request->formation_id;
        $user->type = $request->type;
        $user->save();
      
        //Auth::login($user);
        $request->session()->flash('etat', 'Creation Réussite');

        return redirect()->route('homeAdmin');
        
      }
      else
        echo "Votre login existe dans notre base de donné, Veuillez choisir une autre login";

    }

    public function listerUser(){
        $user_id = Auth::id();
        $user = DB::table('users')->where('users.id', '<>', $user_id)->get();
        return view('Admin.listeUser', ['user'=> $user]);
    }

    public function modifierUserForm($user_id){
        $user = User::findOrFail($user_id);
        $formation = DB::table('formations')->get();
        return view('Admin.modificationUserForm', ['user'=>$user, 'formation'=>$formation]);
    }

    public function modifierUser(Request $request, $user_id){
        $user = User::findOrFail($user_id);
        $valid = $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'login'=>'required',
            'mdp'=>'required',
            'type'=>'required',
        ]);



        $user->nom = $valid['nom'];
        $user->prenom = $valid['prenom'];
        $user->login = $valid['login'];
        $user->mdp = Hash::make($request->mdp);
        $user->formation_id = $request->formation_id;
        $user->type = $valid['type'];

        $user->save();
        $request->session()->flash('etat', 'modification Réussite');
        return redirect()->route('listeUser');

    }

    public function supprimerUser(Request $request, $user_id){
        $user = User::findOrFail($user_id);

        $user->delete();
        $request->session()->flash('etat', 'Suppression Réussite');
        return redirect()->route('listeUser');

    }

    public function rechercherUser(Request $request){
         $user = DB::table('users')->where('nom', 'like', '%'.$request->user.'%')
         ->orWhere('prenom', 'like', '%'.$request->user.'%')
         ->orWhere('login', 'like', '%'.$request->user.'%')
         // ->where('prenom', 'like', '%'.$request->user.'%')
         // ->where('login', 'like', '%'.$request->user.'%')
         ->get();

         return view('Admin.listeUser', ['user'=> $user]);

    }

    public function filtrerAdmin(){
        $user = DB::table('users')->where('type', '=', 'admin')->get();
        return view('Admin.listeUser', ['user' => $user]);

    }

    public function filtrerProfesseur(){
        $user = DB::table('users')->where('type', '=', 'professeur')->get();
        return view('Admin.listeUser', ['user' => $user]);

    }

    public function filtrerEtudiant(){
        $user = DB::table('users')->where('type', '=', 'etudiant')->get();
        return view('Admin.listeUser', ['user' => $user]);

    }
    
}
