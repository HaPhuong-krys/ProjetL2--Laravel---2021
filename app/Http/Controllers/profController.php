<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
//use Carbon\Carbon;

use App\Models\Cour;
use App\Models\Formation;
use App\Models\User;
use App\Models\Planning;

class profController extends Controller
{
   public function listerCoursRespo(){
   	$id_prof = Auth::id();

   	$cours = DB::table('cours')->where('user_id', '=', $id_prof)->get();

   	if($cours->isEmpty()){
   		return view('Prof.nonResponsable');
   	}
   	else
   		return view('Prof.listeCoursRespo',['cours'=>$cours]);
   }

   public function listerPlanningIntegral(){
   	$planning = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->select('plannings.*', 'cours.intitule')
   	->get();

   	return view('Prof.listePlanningIntegral', ['planning'=>$planning]);
   }

   public function listerPlanningIntegralRespo(){
    $id_prof = Auth::id();
    $planning = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->where('cours.user_id', '=',$id_prof)
    ->select('plannings.*', 'cours.intitule')
    ->get();

    $planningEnsei = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->join('cours_users','cours_users.cours_id', '=', 'plannings.cours_id')
    ->select('plannings.*', 'cours.intitule')
    ->where('cours_users.user_id', '=', $id_prof)->get();
   return view('Prof.listePlanningIntegralRespo', ['planning'=>$planning, 'planningEnsei'=>$planningEnsei]);

   }

   public function listerPlanningCours(Request $request, $id_cours){
   	$planning = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->select('plannings.*', 'cours.intitule')
   	->where('plannings.cours_id', '=', $id_cours)
   	->get();

    $coursPrecise = DB::table('cours')->where('cours.id', '=', $id_cours)->first();

   	//print_r($planning);
   	return view('Prof.listePlanningCours', ['planning'=>$planning, 'coursPrecise'=>$coursPrecise]);
   }



   public function listerPlanningSemaine(Request $request){
  	
  	$semaine_choisi = $request->semaine;
  	$year_choisi = $request->year;

  	$day = new DateTime();
  	$day->setISODate($year_choisi, $semaine_choisi);
  	$ret['week_start'] = $day->format('Y-m-d');
  	$retOrdre['START'] = $day->format('d-m-Y');

  	$day->modify('+6 days');

  	$ret['week_end'] = $day->format('Y-m-d');
  	$retOrdre['END'] = $day->format('d-m-Y');
  	//print_r($ret);
  	// print_r("Début de la semaine :", $ret['week_start']);
  	// print_r("Fin de la semaine :", $ret['week_end']);

  	$planning = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->select('plannings.*', 'cours.intitule')
  		->where('date_debut','>=', $ret['week_start'])->where('date_debut', '<=', $ret['week_end'])->get();

  	$planning1 = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->select('plannings.*', 'cours.intitule')
  		->where('date_debut','>=', $ret['week_start'])->where('date_debut', '<=', $ret['week_end'])->first();
  	
  	if ($planning1 == null) {
  		echo "Debur de la semaine: ";
  		print_r($retOrdre['START']);
  		echo "<br>";
  		echo "Fin de la semaine: ";
  		print_r($retOrdre['END']);

  		echo "<br>";
  		echo "Il n'y a aucune cours ou planning correspond à la semaine que vous recherchez<br>";
  		echo "Veuillez noter que la date est fait en ordre calendrier normal, pas en ordre de l'année scolaire<br>";
  		echo "Par exemple la semaine entre 19/04/2021 et 25/04/2021 est de la semaine 16 en ordre calendrier";
  		//echo "<a href="{{route('planningProfIntegral')}}">Retournez</a>";

  	}
  	else
  		//echo "string2";
  		return view('Prof.listePlanningSemaine', ['planning'=>$planning, 'year'=>$year_choisi, 'semaine'=>$semaine_choisi, 'retOrdre'=>$retOrdre]);
   }



  public function listerPlanningSemaineRespo(Request $request){
    $user_id = Auth::id();

    $semaine_choisi = $request->semaine;
    $year_choisi = $request->year;

    $day = new DateTime();
    $day->setISODate($year_choisi, $semaine_choisi);
    $ret['week_start'] = $day->format('Y-m-d');
    $retOrdre['START'] = $day->format('d-m-Y');

    $day->modify('+6 days');

    $ret['week_end'] = $day->format('Y-m-d');
    $retOrdre['END'] = $day->format('d-m-Y');
    //print_r($ret);
    // print_r("Début de la semaine :", $ret['week_start']);
    // print_r("Fin de la semaine :", $ret['week_end']);

    $planning = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->select('plannings.*', 'cours.intitule')
      ->where('date_debut','>=', $ret['week_start'])
      ->where('date_debut', '<=', $ret['week_end'])
      ->where('cours.user_id', '=', $user_id)
      ->get();

    $planning1 = DB::table('plannings')->join('cours', 'plannings.cours_id', '=', 'cours.id')->select('plannings.*', 'cours.intitule')
      ->where('date_debut','>=', $ret['week_start'])
      ->where('date_debut', '<=', $ret['week_end'])
      ->where('cours.user_id', '=', $user_id)
      ->first();
    
    if ($planning1 == null) {
      echo "Debur de la semaine: ";
      print_r($retOrdre['START']);
      echo "<br>";
      echo "Fin de la semaine: ";
      print_r($retOrdre['END']);

      echo "<br>";
      echo "Il n'y a aucune cours ou planning correspond à la semaine que vous recherchez<br>";
      echo "Veuillez noter que la date est fait en ordre calendrier normal, pas en ordre de l'année scolaire<br>";
      echo "Par exemple la semaine entre 19/04/2021 et 25/04/2021 est de la semaine 16 en ordre calendrier";
      //echo "<a href="{{route('planningProfIntegral')}}">Retournez</a>";

    }
    else
      //echo "string2";
      return view('Prof.listePlanningSemaine', ['planning'=>$planning, 'year'=>$year_choisi, 'semaine'=>$semaine_choisi, 'retOrdre'=>$retOrdre]);
   }




   public function creerSeanceForm(){
      $cours = DB::table('cours')->get();
   		return view('Prof.creationSeanceForm', ['cours'=>$cours]);
   }

   public function creerSeance(Request $request){
   	$valid = $request->validate([
    		'cours_id'=>'required',
    		'date_debut'=>'required',
    		'date_fin'=>'required'
    	]);

   	$planning = new Planning();

   	$planning->cours_id = $valid['cours_id'];
   	$planning->date_debut = $valid['date_debut'];
   	$planning->date_fin = $valid['date_fin'];

   	$planning->save();
   	$request->session()->flash('etat','creation seance succesfull');

   	return redirect()->route('planningProfIntegral');
   }

   public function mettreAjourSeanceForm($id_planning){
   	$planning = Planning::findOrFail($id_planning);

   	return view('Prof.misAjourSeanceForm', ['planning'=>$planning]);
   }

   public function mettreAjourSeance(Request $request, $id_planning){
   	$planning = Planning::findOrFail($id_planning);

   	$valid = $request->validate([
           'cours_id'=>'required',
    		'date_debut'=>'required',
    		'date_fin'=>'required'
         ]);

   	$planning->cours_id = $valid['cours_id'];
   	$planning->date_debut = $valid['date_debut'];
   	$planning->date_fin = $valid['date_fin'];

   	$planning->save();
   	$request->session()->flash('etat', 'modification Réussite');

   	return redirect()->route('planningProfIntegral');

   }

   public function supprimerSeance(Request $request, $id_planning){
   	$planning = Planning::findOrFail($id_planning);
   	$planning->delete();

   	$request->session()->flash('etat', 'suppression Réussite');
   	return redirect()->route('planningProfIntegral');
   }
   
}
