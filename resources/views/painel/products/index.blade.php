@extends('site.tamplate.tamplate1')

@section('content')
    <h1>Listagem dos produtos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
            </tr>
        @endforeach
    </table>
@endsection