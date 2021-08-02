<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officer;

class OfficersController extends Controller
{
    //Get Officers Information.
    public function getOfficersInfo() {
        return response()->json(Officer::all(), 200);
        return Officer::all();
    }

    //Get Officers Information By Id.
    public function getOfficersInfoById($id) {
        $officer = Officer::find($id);
        if(is_null($officer)) {
            return response()->json(['message' => 'Member Not Found!'], 404);
        }
        return response()->json($officer::find($id), 200);
    }

    //Add New Officer.
    public function addOfficer(Request $request) {
        $officer = new Officer;
        $officer = Officer::create($request->all());
        if($request->hasFile('profile')) {
            $completeFileName = $request->file('profile')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_', $fileNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('profile')->storeAs('public/officers', $comPic);
            $officer->profile = $comPic;
        }
        if($officer->save() ) {
            return ['status' => true, 'message' => 'File Uploaded Successfully!'];
        } else {
            return ['status' => false, 'message' => 'Error Occured in file uploading!'];
        }
        if($officer) {
            $response['status'] = 1;
            $response['message'] = 'New member added successfully!';
            $response['code'] = 200;
        }
        return response()->json($response);
    }

    //Delete Officer.
    public function deleteOfficer(Request $request, $id) {
        $officer = Officer::find($id);
        if(is_null($officer)) {
            $response['status'] = 0;
            $response['message'] = 'Member does not exist!';
            $response['code'] = 404;
            return response()->json($response);
        }
        else if($officer) {
            $officer->delete();
            $response['status'] = 1;
            $response['message'] = 'Officer removed successfully!';
            $response['code'] = 200;
            return response()->json($response);
        }
    }

    /**
     *  For Futrue Development => There is a issue with updating fields!
     */
    //Update Officer Information.
    /*public function updateOfficer(Request $request, $id) {
        $officer = new Officer;
        $officer = Officer::find($id);
        if(is_null($officer)) {
            $response['status'] = 0;
            $response['message'] = 'Member does not exist!';
            $response['code'] = 404;
            return response()->json($response);
        }
        if($request->hasFile('profile')) {
            $completeFileName = $request->file('profile')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_', $fileNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('profile')->storeAs('public/officers', $comPic);
            $officer->profile = $comPic;
        }
        if($officer->save() ) {
            return ['status' => true, 'message' => 'File Uploaded Successfully!'];
        } else {
            return ['status' => false, 'message' => 'Error Occured in file uploading!'];
        }
        if($officer) {
            $officer -> update($request->all());
            $response['status'] = 1;
            $response['message'] = 'Officer details updated successfully!';
            $response['code'] = 200;
            return response()->json($response);
        }
    }*/
}
