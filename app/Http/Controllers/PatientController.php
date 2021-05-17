<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{ 
    public function getPatient(){ 
    return response()->json(Patient::all(), 200);
}
public function getPatientid($id){
$Patient = Patient::find($id);

if(is_null($Patient)){
    return response()->json(['message'=> 'Patient non trouvé'], 404);

}
return  response()->json($Patient::find($id), 200);

}
public function addPatient(request $request){
    $Patient = Patient::create($request->all());
  
   

    return response($Patient, 201);
    /*
    function photo(){
        $image=new Patient;
        if ($request->hasFile('photo')){
            $path=$request->file('photo')->getClientOriginalName();
            $file=pathinfo($path, PATHINFO_FILENAME);
            $extention=$request->file('photo')->getClientOriginalExtension();
            $compile= str_replace('','_',$path).'-'.rand().'_'.time().'.'.$extention;
            $imgpath=file('photo')->storeAs('public/posts',$compile);
            $image->photo=$compile;
        }
    }*/

}

public function deletePatient(request $request, $id){
$Patient= Patient::find($id);
if(is_null($Patient)){
    return response()->json(['message'=> 'Patient non trouvé'], 404);
}
//si il existe ->deletePatient
$Patient->delete();
return response()->json(null, 204);
}
public function updatePatient(request $request, $id){
    $Patient = Patient:: find($id);
    if (is_null($Patient)) {
        return response()->json(['message'=> 'Patient non trouvé'], 404);
    }
    $Patient = update($request->all());
    return response()->json(null, 204);
}
}
