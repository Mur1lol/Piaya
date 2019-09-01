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

    public function gerarRelatorio($problema) {
        if($problema == "0") { $denuncias = Denuncia::all(); }
        else { $denuncias = Denuncia::where('problema', 'like', $problema)->orderBy('local')->get(); }

        return \PDF::loadView('denuncias.relatorio', compact('denuncias'))
                ->setPaper('A4', 'portrait')
                ->stream('relatorio_denuncias.pdf');
    }
}