@extends('site.tamplate.tamplate1')

@section('content')

    <h1>Bem-vindo {{$nome}}</h1>

    @if($nome == 'Sérgio')
        <p>É você</p>
    @endif

    @foreach($data as $d)
        Número: {{$d}} <br />
    @endforeach

    @include('site.includes.footer')

@endsection