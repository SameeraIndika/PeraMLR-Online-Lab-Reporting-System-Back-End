<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Labreport;

class LabreportsController extends Controller
{
    //Get Labreports.
    public function getLabreports() {
        return response()->json(Labreport::all(), 200);
        return Labreport::all();
    }

    //Add Labreports.
    public function addLabReport(Request $request) {
        $labreport = Labreport::create($request->all());
        if($labreport) {
            $response['status'] = 1;
            $response['message'] = 'New test added successfully!';
            $response['code'] = 200;
        }
        //return response($test, 201);
        return response()->json($response);
    }
}
