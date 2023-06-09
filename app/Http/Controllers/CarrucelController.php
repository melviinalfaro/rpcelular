<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrucelController extends Controller
{
    public function create() {
        return view('carrucel');
    }
}
