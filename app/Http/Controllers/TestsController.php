<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestsController extends Controller
{
    //Get all tests information of all tests.
    public function getTestInfo() {
        return response()->json(Test::all(), 200);
        return Test::all();
    }
    
    //Get tests information by id.
    public function getTestInfoById($id) {
        $test = Test::find($id);
        if(is_null($test)) {
            return response()->json(['message' => 'Test Not Found!'], 404);
        }
        return response()->json($test::find($id), 200);
    }

    //Add new test.
    public function addTest(Request $request) {
        $test = Test::create($request->all());
        if($test) {
            $response['status'] = 1;
            $response['message'] = 'New test added uccessfully!';
            $response['code'] = 200;
        }
        //return response($test, 201);
        return response()->json($response);
    }
    
    //Delete test.
    public function deleteTest(Request $request, $id) {
        $test = Test::find($id);
        if(is_null($test)) {
            $response['status'] = 0;
            $response['message'] = 'Test does not exist!';
            $response['code'] = 404;
            return response()->json($response);
        }
        else if($test) {
            $test->delete();
            $response['status'] = 1;
            $response['message'] = 'Test deleted uccessfully!';
            $response['code'] = 200;
            return response()->json($response);
        }
    }

    //Update test.
    public function updateTest(Request $request, $id) {
        $test = Test::find($id);
        if(is_null($test)) {
            $response['status'] = 0;
            $response['message'] = 'Test does not exist!';
            $response['code'] = 404;
            return response()->json($response);
        }
        else if($test) {
            $test -> update($request->all());
            $response['status'] = 1;
            $response['message'] = 'Test updated uccessfully!';
            $response['code'] = 200;
            return response()->json($response);
        }
    }
}
