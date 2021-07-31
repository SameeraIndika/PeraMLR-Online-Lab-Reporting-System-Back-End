<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
//use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function register(Request $request) {

        $admin = Admin::where('email', $request['email'])->first();

        if($admin) {
            $response['status'] = 0;
            $response['message'] = 'Email Already Exists!';
            $response['code'] = 409;
        }

        else {
            $admin = Admin::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $response['status'] = 1;
            $response['message'] = 'Admin account created successfully!';
            $response['code'] = 200;
        }
        return response()->json($response);
    }

    public function login(Request $request) {
        $credentials = $request -> only('email', 'password');
        try {
            if(!JWTAuth::attempt($credentials)) {
                $response['status'] = 0;
                $response['code'] = 401;
                $response['data'] = null;
                $response['message'] = 'Email or Password is incorrect';
                return response()->json($response);
            }
        } catch(JWTException $e) {
            $response['data'] = null;
            $response['code'] = 500;
            $response['message'] = 'Could not Create Token';
            return response()->json($response);
        }

        $admin = auth()->user();
        $data['token'] = auth()->claims([
            'admin_id' => $admin->id,
            'email' => $admin->email
        ])->attempt($credentials);

        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['message'] = 'Admin Login Successfull';
        return response()->json($response);
    }
}
