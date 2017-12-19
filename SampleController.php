<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapRequest;

class SampleController extends Controller
{
  public function cap()
  {
    return view('sample.cap');
  }

  public function capPost(CapRequest $request)
  {

    /* 認証に成功した後の処理を記述する */

    return view('sample.cap', ['status' => true]);
  }
}