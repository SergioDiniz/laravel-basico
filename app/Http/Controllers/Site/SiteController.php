<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
