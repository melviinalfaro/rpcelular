<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrucel;

class AdminInicioController extends Controller
{
    public function index() {

        $carruceles = Carrucel::all();

        return view('inicio', compact('carruceles'));
    }
}
