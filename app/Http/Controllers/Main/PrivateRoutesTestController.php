<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class PrivateRoutesTestController extends Controller
{
  public function test()
  {
    return response()->json(['you' => 'are authenticated']);
  }
}
