<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * Register a new user and generate an access token.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate an access token for the user
        $token = $user->createToken('AuthToken')->accessToken;
        
        // Return success response with token
        return response()->json([
            'token' => $token, 
            'message' => 'User registered successfully'
        ], 200);
    } 

    //Login Api (POST)
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Checking User Login

        if ( Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
           $user = Auth::user();

           $token = $user->createToken('myToken')->accessToken;
           return response()->json([
            'status' => true,
            'token' => $token, 
            'message' => 'User logged in  successfully'
        ], 200);
        }else{
            return response()->json([
                'status' => false, 
                'message' => 'Inavlid login details'
            ], 405);
        }
       

    }

     //Profile Api (GET)
     public function profile(Request $request){
        $user  = Auth::user();
        return response()->json([
            'status' => true,
            'message' => 'Profile Information successfully',
            'data' => $user,
        ], 200);
     }
      //Logout Api (GET)
    public function logout(){
        
        auth()->user()->token()->revoke();
        return response()->json([
            'status' => true,
            'message' => 'Profile  Logout successfully',
        ], 200);
    }
}
