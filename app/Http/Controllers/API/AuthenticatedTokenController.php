<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticatedTokenController extends Controller
{
    public function create(Request $request)
    {
        $email = trim($request->post('email'));
        $password = trim($request->post('password'));

        if (!$email || !$password)
        {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Email/Password required'
                ]
            ]);
        }

        $user = User::where('email', $email)->first();

        if (!$user)
        {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Invalid credentials!'
                ]
            ]);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Invalid credentials!'
                ]
            ]);
        }
            $token = $user->createToken('auth_token');
            $token = $token->plainTextToken;

        return response()->json([
            'success' => true,
            'data'  => [
                'token' => $token
            ]
        ]);
    }
}
