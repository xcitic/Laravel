<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignaturesController extends Controller
{

    /**
     * Display homepage
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
      return view('signatures.index');
    }

    public function create()
    {
      return view('signatures.sign');
    }
}
