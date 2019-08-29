<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;
use Auth;

class DenunciasController extends Controller
{
    public function index() {
        $denuncias = Denuncia::all();
        return view('denuncias.index', compact('denuncias'));
    }
}