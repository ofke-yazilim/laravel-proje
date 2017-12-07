<?php

namespace App\Http\Controllers\test1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    //
    public function index($id=12){
        return $id;
    }
}
