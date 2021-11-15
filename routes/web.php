<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\loginController;
use \App\Http\Controllers\adminController;
use \App\Http\Controllers\etudiantController;
use \App\Http\Controllers\profController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [loginController::class,'inscriptionForm']);


Route::get('/adminHome', function(){
	return view('home.Admin.home');
})->name('homeAdmin')->middleware('is_Admin');
Route::get('/profHome', function(){
	return view('home.Prof.home');
})->name('homeProf')->middleware('is_Enseignant');
Route::get('/etudiantHome', function(){
	return view('home.Etudiant.home');
})->name('homeEtudiant')->middleware('is_Etudiant');




//------------------------------------USER : gestion des comptes question 3------------------------------------

Route::get('/inscription', [loginController::class,'inscriptionForm'])->name('inscriptionForm');
Route::post('/inscription',[loginController::class,'inscription'])->name('inscription');

Route::get('/login', [loginController::class, 'loginForm'])->name('loginForm');
Route::post('/login',[loginController::class, 'login'])->name('login');

ROute::get('/logout',[loginController::class, 'logout'])->name('logout');

Route::get('changeMDP', [loginController::class, 'changeMDPForm'])->name('changeMDPForm');
Route::post('changeMDP',[loginController::class, 'postChangeMDP'])->name('postChangeMDP');

Route::get('/modification', [loginController::class, 'modificationForm'])->name('modificationForm');
Route::post('/modification',[loginController::class, 'modifier'])->name('modification');


//4.1.1.2 et 4.1.1.3


Route::get('/admin/filtre/ADMIN', [adminController::class, 'filtrerAdmin'])->name('filtreAdmin')->middleware('is_Admin');
Route::get('/admin/filtre/PROFESSEUR', [adminController::class, 'filtrerProfesseur'])->name('filtreProf')->middleware('is_Admin');
Route::get('/admin/filtre/ETUDIANT', [adminController::class, 'filtrerEtudiant'])->name('filtreEtu')->middleware('is_Admin');

Route::get('/admin/rechercheUser', [adminController::class, 'rechercherUser'])->name('rechercheUser')->middleware('is_Admin');



//-------------------------------------ADMIN :: (4.2.1) & (4.2.3) & (4.3.1) & (4.3.2)--------------------------------------------------

Route::get('/admin/listeCours', [adminController::class, 'listerCours'])->name('listeCoursAdmin')->middleware('is_Admin');

Route::get('/admin/creationCours', [adminController::class,'creerCoursForm'])->name('creationCoursForm')->middleware('is_Admin'); 
Route::post('/admin/creationCours',[adminController::class,'creerCours'])->name('creationCours')->middleware('is_Admin');


Route::get('admin/listFormation', [adminController::class, 'listerFormation'])->name('listeFormation')->middleware('is_Admin');

Route::get('/admin/creationFormation', [adminController::class,'ajouterFormationForm'])->name('ajouteFormation')->middleware('is_Admin');
Route::post('/admin/creationFormation',[adminController::class,'ajouterFormation'])->name('ajouteFormation')->middleware('is_Admin');

//------4.1.2 & 4.1.3------------
//4.1.2 : changement le type des users (de Null -> autres) OU Suprrime demande
Route::get('/admin/listeUserNull', [adminController::class, 'listerUserNull'])->name('listeUserNull')->middleware('is_Admin');

Route::get('/admin/changeType/{id}', [adminController::class, 'changerTypeForm'])->name('changeTypeForm')->middleware('is_Admin');
Route::post('/admin/changeType/{id}',[adminController::class, 'changeType'])->name('changeType')->middleware('is_Admin');

Route::get('/Admin/refuseType/{id}', [adminController::class, 'refuserType'])->name('refuseType')->middleware('is_Admin');

//4.1.3 : assosication d'un prof au cours 
Route::get('/admin/listeProf', [adminController::class, 'listerProf'])->name('listeProf')->middleware('is_Admin');
Route::get('/admin/associerProfAvecCours/{id}', [adminController::class,'choisirCourAssocier'])->name('associationCours')->middleware('is_Admin');
Route::get('/admin/associerIDCours/{id}/{id_cours}', [adminController::class, 'associerCours'])->name('associerDefCours')->middleware('is_Admin');

//4.1.4: Création d’un utilisateur.
Route::get('/admin/creationUser', [adminController::class, 'creerUserForm'])->name('creationUserFormAdmin')->middleware('is_Admin');
Route::post('/admin/creationUser', [adminController::class, 'creerUser'])->name('creationUserAdmin')->middleware('is_Admin');

//4.1.5 et 4.1.6 
Route::get('admin/listeUsers', [adminController::class, 'listerUser'])->name('listeUser')->middleware('is_Admin');

Route::get('admin/modificationUsers/{user_id}', [adminController::class, 'modifierUserForm'])->name('modificationUserFormAdmin')->middleware('is_Admin');
Route::post('amdin/modificationUsers/{user_id}',[adminController::class, 'modifierUser'])->name('modificationUserAdmin')->middleware('is_Admin');

Route::get('admin/suppressionUser/{user_id}', [adminController::class, 'supprimerUser'])->name('suppressionUserAdmin')->middleware('is_Admin');

//4.2.2 Recherche par intitulé
Route::get('/admin/rechercheCours', [adminController::class, 'rechercherCours'])->name('rechercheCours')->middleware('is_Admin');
//4.2
Route::get('/admin/modificationCours/{id_cours}', [adminController::class, 'modifierCoursForm'])->name('modificationCoursFormAdmin')->middleware('is_Admin');
Route::post('/admin/modificationCours/{id_cours}',[adminController::class, 'modifierCours'])->name('modificationCoursAdmin')->middleware('is_Admin');

Route::get('/admin/suppressionCours/{id_cours}', [adminController::class, 'supprimerCours'])->name('suppressionCoursAdmin')->middleware('is_Admin');

//** 4.2.7 *** 




//4.3.3
Route::get('/admin/modificationFormation/{id_formation}', [adminController::class, 'modifierFormationForm'])->name('modificationFormationFormAdmin')->middleware('is_Admin');
Route::post('/admin/modificationFormation/{id_formation}',[adminController::class, 'modifierFormation'])->name('modificationFormationAdmin')->middleware('is_Admin');

//4.3.4
Route::get('/admin/suppressionFormation/{id_formation}', [adminController::class, 'supprimerFormation'])->name('suppressionFormationAdmin')->middleware('is_Admin');



//-----------------------------------------------ETUDIANT------------------------------------
//1.1
Route::get('/etu/listeCours', [etudiantController::class, 'listerTousCours'])->name('listeTousCours')->middleware('is_Etudiant');

//1.2.2
Route::get('/etu/listeCoursInscrit', [etudiantController::class, 'listerCoursInscrit'])->name('listeCoursInscrit')->middleware('is_Etudiant');
Route::get('/etu/Désinscription/{cours_id}', [etudiantController::class, 'désinscrireCours'])->name('desinscriptionCours')->middleware('is_Etudiant');

//1.2
Route::get('/etu/inscriptionCours', [etudiantController::class, 'inscriptionCoursEtuForm'])->name('inscriptionCoursEtuForm')->middleware('is_Etudiant');
Route::post('/etu/inscriptionCours',[etudiantController::class, 'inscriptionCoursEtu'])->name('inscriptionEtu')->middleware('is_Etudiant');

Route::get('/etu/rechercheCours', [etudiantController::class, 'rechercherCoursEtudiant'])->name('rechercheCoursEtudiant')->middleware('is_Etudiant');


//1.3
Route::get('/etu/planning/integral', [etudiantController::class, 'listerPlanningIntegral'])->name('planningEtuIntegral')->middleware('is_Etudiant');

Route::get('/etu/planning/parCours/{id_cours}', [etudiantController::class, 'listerPlanningCours'])->name('planningEtuCours')->middleware('is_Etudiant');

Route::get('/etu/planning/parSemaine', [etudiantController::class, 'listerPlanningSemaine'])->name('planningEtuSemaine')->middleware('is_Etudiant');//??????????????????????




//------------------------------------------------PROFESSEUR----------------------------------
//2.1
Route::get('/prof/listeCoursRespo', [profController::class, 'listerCoursRespo'])->name('listeCoursRespo')->middleware('is_Enseignant');


//2.2 encore des question en 2.2 ??????????????????????????????????????????? ne sont pas logique 
Route::get('/prof/planning/integral', [profController::class,'listerPlanningIntegral'])->name('planningProfIntegral')->middleware('is_Enseignant');
Route::get('/prof/planning/integral/responsable', [profController::class,'listerPlanningIntegralRespo'])->name('planningProfIntegralRespo')->middleware('is_Enseignant');


Route::get('/prof/planning/parCours/{id_cours}', [profController::class,'listerPlanningCours'])->name('planningProfCours')->middleware('is_Enseignant');

Route::get('/prof/planning/parSemaine', [profController::class, 'listerPlanningSemaine'])->name('planningProfSemaine')->middleware('is_Enseignant'); 
Route::get('/prof/planning/parSemaineRespo', [profController::class, 'listerPlanningSemaineRespo'])->name('planningProfSemaineRespo')->middleware('is_Enseignant'); 


//2.3
Route::get('/prof/creationSeance', [profController::class, 'creerSeanceForm'])->name('creationSeanceForm')->middleware('is_Enseignant');
Route::post('/prof/creationSeance',[profController::class, 'creerSeance'])->name('creationSeance')->middleware('is_Enseignant');

Route::get('/prof/misAjour/seance/{id_planning}', [profController::class, 'mettreAjourSeanceForm'])->name('misAjourForm')->middleware('is_Enseignant');
Route::post('/prof/misAjour/seance/{id_planning}', [profController::class, 'mettreAjourSeance'])->name('misAjour')->middleware('is_Enseignant');

Route::get('/prof/suppression/seance/{id_planning}', [profController::class, 'supprimerSeance'])->name('suppressionSeance')->middleware('is_Enseignant');

 //????????????????????                     2.3.4                  ????????????

