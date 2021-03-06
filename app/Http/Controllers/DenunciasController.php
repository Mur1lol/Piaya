<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Denuncia;
use App\User;
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
        $denuncia->user()->associate(Auth::user());
        $denuncia->save();

        return redirect(route('denuncias.index'));
    }

    public function update(Request $request, Denuncia $denuncia) {
        $denuncia->fill($request->all());
        $denuncia->save();

        return redirect(route('denuncias.index'));
    }


    public function gerarRelatorio($problema) {
        if($problema == "Todos") { 
            $denuncias = Denuncia::all(); 
        }
        elseif ($problema == "Todos - Ativos") {
            $denuncias = Denuncia::where('status', 'like', '0')->orderBy('local')->get();
        }
        elseif ($problema == "Lixo - Ativos") {
            $denuncias = Denuncia::where('problema', 'like', 'Descarte incorreto de lixo ou residuos')->where('status', 'like', '0')->orderBy('local')->get();
        }
        elseif ($problema == "Agua - Ativos") {
            $denuncias = Denuncia::where('problema', 'like', 'Problemas relacionados a agua')->where('status', 'like', '0')->orderBy('local')->get();
        }
        elseif ($problema == "Luz - Ativos") {
            $denuncias = Denuncia::where('problema', 'like', 'Uso inadequado da luz')->where('status', 'like', '0')->orderBy('local')->get();
        }
        else { 
            $denuncias = Denuncia::where('problema', 'like', $problema)->orderBy('local')->get();
        }

        return \PDF::loadView('denuncias.relatorio', compact('denuncias'))
                ->setPaper('A4', 'portrait')
                ->stream('relatorio_denuncias.pdf');
    }

    public function grafico($opcao) {
        switch ($opcao) {
            case 'problema - ativo':
                return self::pizzaProblemaAtivo();
                break;

            case 'local':
                return self::pizzaLocal();
                break;

            case 'local - ativo':
                return self::pizzaLocalAtivo();
                break;
            
            default:
                return self::pizzaProblema();
                break;
        }
    }

    public static function pizzaProblema() {

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

        $denuncia = Denuncia::all();

        return view('denuncias.grafico', compact('lava', 'denuncia'))
            ->with('tipo', 'PieChart');
    }

    public static function pizzaProblemaAtivo() {

        $lava = new Lavacharts;
        $denuncias = $lava->DataTable();

        $lixo = Denuncia::where('problema', 'like', 'Descarte incorreto de lixo ou residuos')->where('status', 'like', '0')->count();
        $luz = Denuncia::where('problema', 'like', 'Uso inadequado da luz')->where('status', 'like', '0')->count();
        $agua = Denuncia::where('problema', 'like', 'Problemas relacionados a agua')->where('status', 'like', '0')->count();

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

        $denuncia = Denuncia::where('status', 'like', '0')->get();

        return view('denuncias.grafico', compact('lava', 'denuncia'))
            ->with('tipo', 'PieChart');
    }

    public static function pizzaLocal() {

        $lava = new Lavacharts;
        $denuncias = $lava->DataTable();

        $sala01   = Denuncia::where('local', '=', 'sala 01')->count();
        $sala02   = Denuncia::where('local', '=', 'sala 02')->count();
        $sala03   = Denuncia::where('local', '=', 'sala 03')->count();
        $sala04   = Denuncia::where('local', '=', 'sala 04')->count();
        $sala05   = Denuncia::where('local', '=', 'sala 05')->count();
        $sala06   = Denuncia::where('local', '=', 'sala 06')->count();
        $sala07   = Denuncia::where('local', '=', 'sala 07')->count();
        $sala08   = Denuncia::where('local', '=', 'sala 08')->count();
        $sala09   = Denuncia::where('local', '=', 'sala 09')->count();
        $sala10   = Denuncia::where('local', '=', 'sala 10')->count();
        $sala11   = Denuncia::where('local', '=', 'sala 11')->count();
        $sala12   = Denuncia::where('local', '=', 'sala 12')->count();
        $banheiro = Denuncia::where('local', '=', 'banheiro')->count();
        $quadra   = Denuncia::where('local', '=', 'quadra')->count();
        $lab1     = Denuncia::where('local', '=', 'Laboratorio 1 - Informatica')->count();
        $lab2     = Denuncia::where('local', '=', 'Laboratorio 2 - Informatica')->count();
        $lab3     = Denuncia::where('local', '=', 'Laboratorio 3 - Informatica')->count();
        $lab4     = Denuncia::where('local', '=', 'Laboratorio 4 - Informatica')->count();
        $lab5     = Denuncia::where('local', '=', 'Laboratorio 5 - Informatica')->count();
        $labBio   = Denuncia::where('local', '=', 'Laboratorio Biologia')->count();
        $labQui   = Denuncia::where('local', '=', 'Laboratorio Quimica')->count();
        $labFis   = Denuncia::where('local', '=', 'Laboratorio Fisica')->count();  

        $denuncias->addStringColumn('Locais')
                ->addNumberColumn('Nr. denuncias')
                ->addRow(['Sala 01', $sala01])
                ->addRow(['Sala 02', $sala02])
                ->addRow(['Sala 03', $sala03])
                ->addRow(['Sala 04', $sala04])
                ->addRow(['Sala 05', $sala05])
                ->addRow(['Sala 06', $sala06])
                ->addRow(['Sala 07', $sala07])
                ->addRow(['Sala 08', $sala08])
                ->addRow(['Sala 09', $sala09])
                ->addRow(['Sala 10', $sala10])
                ->addRow(['Sala 11', $sala11])
                ->addRow(['Sala 12', $sala12])
                ->addRow(['Banheiro', $banheiro])
                ->addRow(['Quadra', $quadra])
                ->addRow(['Laboratório 1 - Informática', $lab1])
                ->addRow(['Laboratório 2 - Informática', $lab2])
                ->addRow(['Laboratório 3 - Informática', $lab3])
                ->addRow(['Laboratório 4 - Informática', $lab4])
                ->addRow(['Laboratório 5 - Informática', $lab5])
                ->addRow(['Laboratorio Biologia', $labBio])
                ->addRow(['Laboratorio Química', $labQui])
                ->addRow(['Laboratorio Física', $labFis]);
 

        $lava->PieChart('Dados', $denuncias, [
            'title'  => 'Total de Denuncias / Locais',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0], //0.2
                ['offset' => 0], //0.25
                ['offset' => 0]  //0.3
            ]
        ]);

        $denuncia = Denuncia::all();

        return view('denuncias.grafico', compact('lava', 'denuncia'))
            ->with('tipo', 'PieChart');
    }

    public static function pizzaLocalAtivo() {

        $lava = new Lavacharts;
        $denuncias = $lava->DataTable();

        $sala01   = Denuncia::where('local', '=', 'sala 01')->where('status', 'like', '0')->count();
        $sala02   = Denuncia::where('local', '=', 'sala 02')->where('status', 'like', '0')->count();
        $sala03   = Denuncia::where('local', '=', 'sala 03')->where('status', 'like', '0')->count();
        $sala04   = Denuncia::where('local', '=', 'sala 04')->where('status', 'like', '0')->count();
        $sala05   = Denuncia::where('local', '=', 'sala 05')->where('status', 'like', '0')->count();
        $sala06   = Denuncia::where('local', '=', 'sala 06')->where('status', 'like', '0')->count();
        $sala07   = Denuncia::where('local', '=', 'sala 07')->where('status', 'like', '0')->count();
        $sala08   = Denuncia::where('local', '=', 'sala 08')->where('status', 'like', '0')->count();
        $sala09   = Denuncia::where('local', '=', 'sala 09')->where('status', 'like', '0')->count();
        $sala10   = Denuncia::where('local', '=', 'sala 10')->where('status', 'like', '0')->count();
        $sala11   = Denuncia::where('local', '=', 'sala 11')->where('status', 'like', '0')->count();
        $sala12   = Denuncia::where('local', '=', 'sala 12')->where('status', 'like', '0')->count();
        $banheiro = Denuncia::where('local', '=', 'banheiro')->where('status', 'like', '0')->count();
        $quadra   = Denuncia::where('local', '=', 'quadra')->where('status', 'like', '0')->count();
        $lab1     = Denuncia::where('local', '=', 'Laboratorio 1 - Informatica')->where('status', 'like', '0')->count();
        $lab2     = Denuncia::where('local', '=', 'Laboratorio 2 - Informatica')->where('status', 'like', '0')->count();
        $lab3     = Denuncia::where('local', '=', 'Laboratorio 3 - Informatica')->where('status', 'like', '0')->count();
        $lab4     = Denuncia::where('local', '=', 'Laboratorio 4 - Informatica')->where('status', 'like', '0')->count();
        $lab5     = Denuncia::where('local', '=', 'Laboratorio 5 - Informatica')->where('status', 'like', '0')->count();
        $labBio   = Denuncia::where('local', '=', 'Laboratorio Biologia')->where('status', 'like', '0')->count();
        $labQui   = Denuncia::where('local', '=', 'Laboratorio Quimica')->where('status', 'like', '0')->count();
        $labFis   = Denuncia::where('local', '=', 'Laboratorio Fisica')->where('status', 'like', '0')->count();  

        $denuncias->addStringColumn('Locais')
                ->addNumberColumn('Nr. denuncias')
                ->addRow(['Sala 01', $sala01])
                ->addRow(['Sala 02', $sala02])
                ->addRow(['Sala 03', $sala03])
                ->addRow(['Sala 04', $sala04])
                ->addRow(['Sala 05', $sala05])
                ->addRow(['Sala 06', $sala06])
                ->addRow(['Sala 07', $sala07])
                ->addRow(['Sala 08', $sala08])
                ->addRow(['Sala 09', $sala09])
                ->addRow(['Sala 10', $sala10])
                ->addRow(['Sala 11', $sala11])
                ->addRow(['Sala 12', $sala12])
                ->addRow(['Banheiro', $banheiro])
                ->addRow(['Quadra', $quadra])
                ->addRow(['Laboratório 1 - Informática', $lab1])
                ->addRow(['Laboratório 2 - Informática', $lab2])
                ->addRow(['Laboratório 3 - Informática', $lab3])
                ->addRow(['Laboratório 4 - Informática', $lab4])
                ->addRow(['Laboratório 5 - Informática', $lab5])
                ->addRow(['Laboratorio Biologia', $labBio])
                ->addRow(['Laboratorio Química', $labQui])
                ->addRow(['Laboratorio Física', $labFis]);
 

        $lava->PieChart('Dados', $denuncias, [
            'title'  => 'Total de Denuncias / Locais',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0], //0.2
                ['offset' => 0], //0.25
                ['offset' => 0]  //0.3
            ]
        ]);

        $denuncia = Denuncia::where('status', 'like', '0')->get();

        return view('denuncias.grafico', compact('lava', 'denuncia'))
            ->with('tipo', 'PieChart');
    }
}