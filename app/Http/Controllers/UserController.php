<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function new(Request $request)
    {
        echo 'Criar novo usuário';
    }

    public function edit(Request $request)
    {
        echo 'Editar usuário';
    }

    public function delete(Request $request)
    {
        echo 'Deletar usuário';
    }
}
