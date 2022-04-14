<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function addnewlead(Request $request){

        return view('newlead');

   }

}
