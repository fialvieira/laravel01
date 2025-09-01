<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return 'Hello, this is the index method!';
    }

    public function about(Request $request)
    {
        return 'Hello, this is the about method!';
    }

    public function mostrarValor($valor)
    {
        return "O valor é: " . $valor;
    }

    public function mostrarValores($valor1, $valor2)
    {
        return "Os valores são: " . $valor1 . " e " . $valor2;
    }

    public function mostrarValores2(Request $request, $valor1, $valor2)
    {
        return "Os valores são: " . $valor1 . " e " . $valor2;
    }

    public function mostrarValorOpcional($valor = null)
    {
        if ($valor) {
            return "O valor é: " . $valor;
        }
        return "Nenhum valor foi fornecido.";
    }

    public function mostrarValorOpcional2($valor1, $valor2 = null)
    {
        if ($valor2) {
            return "Os valores são: " . $valor1 . " e " . $valor2;
        }
        return "O valor é: " . $valor1 . ". Nenhum segundo valor foi fornecido.";
    }

    public function showPosts($user_id, $post_id)
    {
        return "User ID: " . $user_id . ", Post ID: " . $post_id;
    }

}
