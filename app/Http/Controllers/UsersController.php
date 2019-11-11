<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $denuncia = new Denuncia();
        $denuncia->fill($request->all());
        $denuncia->user()->associate(Auth::user());
        $denuncia->save();

        return redirect(route('users.show', compact('user')));
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $user->fill($request->all());
        $user->save();

        return redirect(route('users.show', $user->id));
    }

}