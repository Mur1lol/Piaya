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

    public function gerarRelatorio($id) {

        // Todos os Alunos
        if($id == 0) { $denuncias = Denuncia::all(); }
        // Um Aluno Específico
        else { $denuncias = Denuncia::where('id', '=', $id)->get(); }

        return \PDF::loadView('denuncias.relatorio', compact('denuncias'))
                ->setPaper('A4', 'portrait')
                ->stream('relatorio_denuncias.pdf');
    }
}