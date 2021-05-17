<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//inscription
Route::post('inscription', 'UserController@inscription');
//login
Route::post('login', 'UserController@login');


//get all medecin
 Route::get('medecin', 'MedecinController@getMedecin');
//get specific medecin
Route::get('medecin/{id}', 'MedecinController@getMedecinid');
//add new medecin

Route::post('addmedecin', 'MedecinController@addMedecin');
// delete medecin
Route::delete('deletemedecin/{id}', 'MedecinController@deleteMedecin');
//update medecin
route::get('updatemedecin/{id}','MedecinController@updateMedecin');


//get all patient
Route::get('patient', 'PatientController@getPatient');
//get specific patient
Route::get('patient/{id}', 'PatientController@getPatientid');
//add new patient

Route::post('addpatient', 'PatientController@addPatient');
// delete patient
Route::delete('deletepatient/{id}', 'PatientController@deletePatient');
//update patient
route::get('updatepatient/{id}','PatientController@updatePatient');
//insert photo
