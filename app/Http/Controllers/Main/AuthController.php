<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    if (!Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
      return response()->json(['message' => 'Invalid credentials']);
    }

    $user = $request->user();
    $tokenResult = $user->createToken($user->email);

    return [
      'token' => [
        'access_token' => $tokenResult->accessToken,
        'expires_in' => $tokenResult->token->expires_at->timestamp,
        'token_type' => 'Bearer',
      ],
      'user' => $user,
    ];
  }

  public function logout()
  {
    if (auth('api')->check()) {
      request()->user('api')->token()->revoke();
    }

    return response()->json(null, 204);
  }
}
