<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medecin;

class MedecinController extends Controller
{
    public function getMedecin(){
        return response()->json(Medecin::all(), 200);
            }
            public function getMedecinid($id){
            $medecin = Medecin::find($id);
            if(is_null($medecin)){
                return response()->json(['message'=> 'medecin non trouvé'], 404);

            }
            return  response()->json($medecin::find($id), 200);

            }
            public function addMedecin(request $request){
                $medecin = Medecin::create($request->all());
                return response($medecin, 201);

            }
            public function deleteMedecin(request $request, $id){
            $medecin= Medecin::find($id);
            if(is_null($medecin)){
                return response()->json(['message'=> 'medecin non trouvé'], 404);
            }
            //si il existe ->deleteMedecin
            $medecin->delete();
            return response()->json(null, 204);
            }
            public function updateMedecin(request $request, $id){
                $medecin = Medecin:: find($id);
                if (is_null($medecin)) {
                    return response()->json(['message'=> 'medecin non trouvé'], 404);
                }
                $medecin = update($request->all());
                return response()->json(null, 204);
            }
}
