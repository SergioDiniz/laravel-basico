<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index (){
        return 'Página Home';
    }

    public function contato (){
        return 'Página de Contato';
    }

    public function categoria ($id = 1){
        return "Categoria: {$id}";
    }
}
