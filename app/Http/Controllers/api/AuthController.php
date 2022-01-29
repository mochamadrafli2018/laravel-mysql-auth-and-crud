<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        //Validate data with laravel built in Validator
        $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                // check if email is already exist or not with unique:table_name
                'email' => 'required|string|email|max:255|unique:user_db',
                'password' => 'required|string|min:8',
                'gender' => 'required|string',
                // role can be assign as 'admin' or 'member'
                'role' => 'string'
            ],
            [
                'nama.required' => 'Name can not empty!',
                'email.required' => 'Email can not empty!',
                'password.required' => 'Password can not empty!',
                'gender.required' => 'Gender can not empty',
            ]
        );
        // check if email already exist
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages(),
                'error'    => $validator->errors()
            ],400);
        }
        // create new user data
        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->password), // Hash::make($request->get('password')),
            'gender' => $request->input('gender'),
            'role' => $request->input('role')
        ]);
        // if create new user success
        if ($newUser) {
            return response()->json([
                'success' => true,
                'newuser' => $newUser 
            ], 200);
        } 
        else {
            return response()->json([
                'success' => false,
                'message' => 'Fail to save new user',
            ], 500);
        }
    }

    public function signIn(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|password',
        ], [
            'email.required' => 'Email can not empty!',
            'password.required' => 'Password can not empty!',
        ]);
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All input data must be filled',
                'data'    => $validator->errors()
            ],401);
        }
        else {
            // user authentication
            $credentials = $request->only('email', 'password');
    
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
           return response()->json(compact('token'));
        }
    }

    public function getAuthenticatedUser()
    {
        // user authorization
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }

    public function logout(Request $request)
    {
        // return 'logout';
        // return $request->token;
        $this->validate($request, ['token' => 'required']);
        try {
            // JWTAuth::invalidate($request->input('token'));
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['success' => true, 'message' => 'Success logout']);
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
        return 'test';
    }

}
