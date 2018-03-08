<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct(){
        // $this->middleware('auth');
        // $this->middleware('auth')
        //      ->only(['contato', 'categoria']);
//        $this->middleware('auth')
//             ->except('index');
    }
    
    public function index() {
//        return 'Página Home';
        $nome = 'Sérgio';
        $data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return view('site.home.bemvindo', compact('nome', 'data'));
    }

    public function contato() {
        return view('site.contato.contato', ['title'=>'Página de Contato']);
    }
    
    public function categoria($id = 1) {
        return "Categoria: {$id}";
    }
}
