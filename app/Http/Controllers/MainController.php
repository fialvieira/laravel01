<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): void
    {
        echo '<p>Main Controller - index</p>';
    }

    public function about(): void
    {
        echo '<p>About Controller - about</p>';
    }

    public function contact(): void
    {
        echo '<p>Contact Controller - contact</p>';
    }
}
