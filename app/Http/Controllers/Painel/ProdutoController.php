<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{

    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $title = "Listagem dos Produtos";
        // $products = $this->product->all();
        $products = $this->product->paginate(1);
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo produto.';
        $categories =  ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        // $request->all() // $request->only(['name']) // $request->expect(['name']) // $request->input('name')

        // pegando os dados
        $dataForm = $request->all();
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        // validando pelo Request ProductFormRequest

        // validaando
        // $this->validate($request, $this->product->rules, $this->product->validateMessages);
        // outra forma de fazer
        // $validate = validator($dataForm, $this->product->rules, $this->product->validateMessages);
        // if( $validate->fails()){
        //     return redirect()
        //             ->route('produtos.create-edit')
        //             ->withErrors($validate)
        //             ->withInput();
        // }

        // salvando
        $created = $this->product->create($dataForm);

        if($created) return redirect()->route('produtos.index');
        else return redirect()->route('produtos.create-edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        $title = "Editando produto {$product->name}";
        $categories =  ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        $produto = $this->product->find($id); 
        $update = $produto->update($dataForm);

        if($update) return redirect()->route('produtos.index');
        else return redirect()->route('produtos.edit', $id)->with(['errors'=>'Erro ao tentar atualizar produto']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        $delete = $product->delete();
        if($update) return redirect()->route('produtos.index');
        else return 'Erro ao deletar';
    }

    public function tests(){
        
        // $prod = $this->product;
        // $prod->name = 'nome';
        // $prod->save(); // returna o objeto salvo

        $insert  =  $this->product->create([
                        'name'          =>  'Nome do Produto',
                        'number'        =>  '123654',
                        'active'        =>  true,
                        'category'      =>  'eletronicos',
                        'description'   =>  'Descrição do produto'
                    ]);

        if($insert)
            return "Inserido com Sucesso, ID: {$insert->id}";
        else 
            return 'Falha ao Inserir';
        

        // $this->product->find(1) // ID
        // $this->product->where('name', 'Produto') // coluna
        // $this->product->find(1)->update(['name'=>'nome 2']) 
        // $this->product->find(1)->delete() 
        // $this->product->destroy(1) // pode passar um array: [1, 2, 3]

    }
}
