<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
            /**
     * Store User Information
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        // store user information
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => "member",
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone_number' => $request->phone_number,
        ]);

        if ($user) {

            return array(
                'status' => 'success',
                'message' => 'User created succesfully!',
            );
        }

        return array(
            'status' => 'failed',
            'message' => 'User registration failed!',
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (auth()->attempt($credentials)) {
            $user = Auth::user();

            $accessToken = $request->user()->createToken('authToken')->plainTextToken;

            $userData = User::find($user->id);

            return array(
                'status' => "success",
                'access_token' => $accessToken,
                'user_id' => $userData->id,
                'name' => $userData->name,
                'email' => $userData->email,
                'gender' => $userData->gender,
                'dob' => $userData->dob,
                'phone_number' => $userData->phone_number,
            );
        }

        return array(
            'status' => "failed",
        );
    }
}
