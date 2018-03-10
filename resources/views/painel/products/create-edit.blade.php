@extends('painel.templates.template')

@section('content')
    <div class="col-lg-offset-3 col-lg-6">
        <h1>Formulário de Cadastro</h1>

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>
            </div>
        @endif

        @if (isset($product))
            <form action="{{route('produtos.update', $product->id)}}" method="post">        
                {!! method_field('PUT') !!}
        @else
            <form action="{{route('produtos.store')}}" method="post">
        @endif

            {!! csrf_field() !!}
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Nome: " value="{{ $product->name or old('name')}}">
            </div>
            <div class="form-group">
                <label>Número</label>
                <input type="number" class="form-control" name="number" placeholder="Número: " value="{{$product->number or old('number')}}">
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="category">
                    <option value="" selected disabled hidden>Selecione uma opção</option>
                    @foreach ($categories as $categoria)
                        <option value="{{$categoria}}" 
                            @if ( (isset($product) && $product->category == $categoria ) or old('category') == $categoria)
                                selected
                            @endif
                        >{{ucfirst($categoria)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="description" class="form-control" cols="30" rows="4">{{$product->description or old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="active" value="1"
                        @if ((isset($product) && $product->active == '1' ) or old('active'))
                            checked
                        @endif
                    > Ativo?
                </label>
            </div>
            
            <button class="btn btn-primary" type="submit">Enviar</button>

        </form>
    </div>
@endsection