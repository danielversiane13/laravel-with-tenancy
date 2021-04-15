<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  protected User $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function index()
  {
    $users = $this->user->all();

    return response()->json([
      'users' => $users
    ]);
  }

  public function store(Request $request)
  {
    $user = $this->user->create($request->all());

    return response()->json($user);
  }

  public function show(User $user)
  {
    return response()->json($user);
  }

  public function update(Request $request, User $user)
  {
    $user->update($request->all());

    return response()->json($user);
  }

  public function destroy(User $user)
  {
    $user->delete();

    return response()->json(null, 204);
  }
}
