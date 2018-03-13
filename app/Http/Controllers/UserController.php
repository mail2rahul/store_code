<?php

namespace App\Http\Controllers;

/*use Illuminate\Http\Request;
use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator,Hash;
use Illuminate\Support\Facades\Password;*/

use Illuminate\Http\Request;

use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator,Hash;

use JWTAuth;

class UserController extends Controller
{
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $credentials = $request->only('first_name', 'email', 'password', 'gender');

        $rules = [
            'first_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'gender'=> 'required',
            'password'=> 'required'

        ];

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $name = $request->first_name;
        $email = $request->email;
        $password = $request->password;
        $gender= $request->gender;

        User::create(['first_name' => $name, 'gender' => $gender, 'email' => $email, 'password' => Hash::make($password)]);
        return response()->json(['success'=> true], 201);
    }

    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true,  'token' => $token ]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        //$this->validate($request, ['token' => 'required']);
        //dd('fsfs');

        try {
             JWTAuth::invalidate($request->input('token'));
            //JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."],200);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        //$input = $request->all();
        $user = JWTAuth::toUser($request->input('token'));
        return response()->json(['result' => $user],200);
    }




}
