<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Labreport;

class LabreportsController extends Controller
{
    //Get Officers Information.
    public function getOfficersInfo() {
        return response()->json(Officer::all(), 200);
        return Officer::all();
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
