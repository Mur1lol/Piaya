<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Solicitacao;
use Auth;

class UsersController extends Controller
{
    public function index() {
        $solicitacaos = Solicitacao::where('titulo', 'like', 'Solicitacao para Administrador')->orderBy('user_id')->get();
        return view('users.index', compact('solicitacaos'));
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $solicitacao = new Solicitacao();
        $solicitacao->fill($request->all());
        $solicitacao->user()->associate(Auth::user());
        $solicitacao->save();

        return redirect(route('users.show', Auth::user()->id));
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function redirect(Request $request, User $user) {
        $user->fill($request->all());
        $user->save();

        return redirect(route('users.create'));
    }

    public function update(Request $request, User $user) {
        $user->fill($request->all());
        $user->save();

        return redirect(route('users.show', Auth::user()->id));
    }

    public function updateUser(Request $request, User $user) {
        $user->fill($request->all());
        $user->save();

        return redirect(route('users.index'));
    }

}
