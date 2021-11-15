<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

use App\Models\Cour;
use App\Models\Formation;
use App\Models\User;
use App\Models\CourUser;
use App\Models\Planning;

class etudiantController extends Controller
{
    public function inscriptionCoursEtuForm(){
        $user_formation = Auth::user()->formation_id;
        
    	$cours = DB::table('cours')->join('formations','cours.formation_id', '=', 'formations.id')->select('cours.*')
        ->where('cours.formation_id', '=', $user_formation)
        ->get();
    	return view('Etudiant.inscriptionCoursForm', ['cours'=>$cours]);
    }

    public function inscriptionCoursEtu(Request $request){
        $user_id = Auth::id();
    	$valid = $request->validate([
    		'id'=>'required'
    	]);
        $cours_etu = DB::table('cours_users')->where('cours_users.user_id', '=', $user_id)->where('cours_users.cours_id', '=', $request->id)->first();
       
        if($cours_etu == null){


    	   $cour_user = new CourUser();
    	   $cour_user->cours_id = $valid['id'];
    	   $cour_user->user_id = Auth::id();

    	   $cour_user->save();
    	   $request->session()->flash('etat','inscription sucessful');
    	   return view('home.Etudiant.home');
       }
       else
            echo "vous vous etes deja inscrit sur ce cours";
    }

    public function listerTousCours(){
    	//$id = Auth::id();
    	// $cours = DB::table('cours')->join('cours_users', 'cours.id', '=','cours_users.cours_id')
     //    ->select('cours_users.cours_id','cours.id', 'cours.intitule')
    	// ->where('cours_users.user_id', '=', $id)
     //    ->get();

        $user_formation = Auth::user()->formation_id;
        $cours = DB::table('cours')->join('formations','cours.formation_id', '=', 'formations.id')->select('cours.*')
        ->where('cours.formation_id', '=', $user_formation)
        ->get();
       
    	return view('Etudiant.listeTousCours', ['cours'=>$cours]);

    }

    public function listerCoursInscrit(){
        $id = Auth::id();
        $cours = DB::table('cours')->join('cours_users', 'cours.id', '=','cours_users.cours_id')
        ->select('cours_users.cours_id','cours.id', 'cours.intitule')
        ->where('cours_users.user_id', '=', $id)
        ->get();

       

        return view('Etudiant.listeCoursInscrit', ['cours'=>$cours]);

    }


    public function désinscrireCours(Request $request, 	$cours_id){
    	//$coursDelete = CourUser::findOrFail($cours_id);
    	$id = Auth::id();
    	$coursDelete = DB::table('cours_users')->where('cours_users.user_id', '=', $id)->where('cours_users.cours_id','=', $cours_id);

    	$coursDelete->delete();

    	$request->session()->flash('etat','Désinscription sucessful');
    	//return view('home.Etudiant.home');
    	$cours = DB::table('cours')->join('cours_users', 'cours.id', '=','cours_users.cours_id')->select('cours_users.cours_id','cours.id', 'cours.intitule')   
    	->where('cours_users.user_id', '=', $id)->get();
    	return view('Etudiant.listeCoursInscrit', ['cours'=>$cours]);
    }


    public function rechercherCoursEtudiant(Request $request){
        $cours = DB::table('cours')->where('intitule', 'like', '%'.$request->cours_intitule.'%')->get();
    
        return view('Etudiant.rechercheIntitule', ['cours'=>$cours]);

    }

    public function listerPlanningIntegral(){
        $id = Auth::id();
        $cours = DB::table('cours_users')->join('plannings', 'cours_users.cours_id','=','plannings.cours_id')->join('cours', 'cours.id','=', 'cours_users.cours_id')
        ->select('plannings.*', 'cours.intitule')
        ->where('cours_users.user_id','=', $id)->get();
         return view('Etudiant.listePlanningIntegral', ['cours'=>$cours]);
        //print_r($cours);

    }

    public function listerPlanningCours(Request $request, $id_cours){
        $id = Auth::id();
        $cours = DB::table('cours')->join('cours_users', 'cours.id', '=','cours_users.cours_id')->join('plannings', 'cours.id', '=', 'plannings.cours_id')
        ->select('plannings.*', 'cours.intitule')
        ->where('cours_users.user_id','=', $id)->where('cours.id', '=', $id_cours)
        ->get();
        $coursPrecise = DB::table('cours')-> where('id', '=', $id_cours)->first();
    
        return view('Etudiant.listePlanningCours', ['cours'=>$cours, 'coursPrecise'=>$coursPrecise]);
    }

    public function listerPlanningSemaine(Request $request){
        $id = Auth::id();

        $semaine_choisi = $request->semaine;
        $year_choisi = $request->year;

        $day = new DateTime();
        $day->setISODate($year_choisi, $semaine_choisi);
        $ret['week_start'] = $day->format('Y-m-d');
        $retOrdre['START'] = $day->format('d-m-Y');

        $day->modify('+6 days');

        $ret['week_end'] = $day->format('Y-m-d');
        $retOrdre['END'] = $day->format('d-m-Y');

        $planning = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->join('cours_users', 'cours.id', '=','cours_users.cours_id')
        ->select('plannings.*', 'cours.intitule')
        ->where('cours_users.user_id','=', $id)
        ->where('date_debut','>=', $ret['week_start'])->where('date_debut', '<=', $ret['week_end'])->get();

        return view('Etudiant.listePlanningSemaine', ['planning'=>$planning, 'year'=>$year_choisi, 'semaine'=>$semaine_choisi, 'retOrdre'=>$retOrdre]);
    }
}
