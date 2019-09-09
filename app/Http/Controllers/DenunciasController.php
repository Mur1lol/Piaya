<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Denuncia;
use Auth;

class DenunciasController extends Controller
{
    public function index() {
        $denuncias = Denuncia::all();
        return view('denuncias.index', compact('denuncias'));
    }

    public function create() {
        return view('denuncias.create');
    }

    public function store(Request $request) {
        $denuncia = new Denuncia();
        $denuncia->fill($request->all());
        $denuncia->save();

        return redirect(route('denuncias.index'));
    }

    public function gerarRelatorio($problema) {
        if($problema == "0") { $denuncias = Denuncia::all(); }
        else { $denuncias = Denuncia::where('problema', 'like', $problema)->orderBy('local')->get(); }

        return \PDF::loadView('denuncias.relatorio', compact('denuncias'))
                ->setPaper('A4', 'portrait')
                ->stream('relatorio_denuncias.pdf');
    }

    public function grafico() {

        $lava = new Lavacharts;
        $denuncias = $lava->DataTable();

        $lixo = Denuncia::where('problema', 'like', 'Descarte incorreto de lixo ou residuos')->count();
        $luz = Denuncia::where('problema', 'like', 'Uso inadequado da luz')->count();
        $agua = Denuncia::where('problema', 'like', 'Problemas relacionados a agua')->count();

        $denuncias->addStringColumn('Problemas')
                ->addNumberColumn('Nr. denuncias')
                ->addRow(['Lixo', $lixo])
                ->addRow(['Luz', $luz])
                ->addRow(['Água', $agua]);
 

        $lava->PieChart('Dados', $denuncias, [
            'title'  => 'Total de Denuncias / Problemas',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0], //0.2
                ['offset' => 0], //0.25
                ['offset' => 0]  //0.3
            ]
        ]);

        // Invoca a View
        return view('denuncias.grafico', compact('lava'))
            ->with('tipo', 'PieChart');
    }
}