<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as domPDF; 

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with(['categoria'])->orderBy('created_at', 'DESC')->paginate(1);

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('categoria', 'ASC')->get();

        return view('produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $regras = [
            'categoria_id' => 'exists:categorias,id',
            'codigo'       => 'required|unique:produtos|max:10',
            'produto'      => 'required|min:5|max:60',
            'descricao'    => 'required',
            'disponivel'   => 'required|boolean', 
            'preco'        => 'required|numeric|between:0,999.999',
            'quantidade'   => 'required|integer'
        ];

        $mensagens = [
            'categoria_id.exists' => 'Selecione uma categoria!',
            'codigo.unique'       => 'O código informado já foi utilizado',
            'codigo.max'          => 'O código deve ter no máximo 10 caracteres!',
            'required'            => 'O campo :attribute é obrigatório!',
            'min'                 => 'O campo :attribute deve ter pelo menos 5 caracteres!',
            'produto.max'         => 'O campo :attribute deve ter no máximo 60 caracteres!',
            'disponivel.boolean'  => 'O campo disponível não é válido',
            'preco.numeric'       => 'O preço deve ser um número decimal',
            'preco.between'       => 'O preço deve ser entre 0 e 999.999',
            'quantidade.integer'  => 'A quantidade deve ser definida'
        ];
        
        $produtoDados = $request->validate($regras, $mensagens);

        if ($request->hasFile('imagem')) {

            $pathImagem = Storage::disk('public')->put('images/produtos', request()->file('imagem'));
            $produtoDados['imagem'] = $pathImagem;
        }

        //dd($produtoDados);

        Produto::create($produtoDados);

        return redirect()->route('produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::with(['categoria'])->findOrFail($id);

        //dd($produto);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categorias = Categoria::orderBy('categoria', 'ASC')->get();

        $produto = Produto::with(['categoria'])->findOrFail($id);
  
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $regras = [
            'categoria_id' => 'exists:categorias,id',
            'codigo'       => 'required|unique:produtos,codigo,'.$id.'|max:10',
            'produto'      => 'required|min:5|max:60',
            'descricao'    => 'required',
            'disponivel'   => 'required|boolean', 
            'preco'        => 'required|numeric|between:0,999.999',
            'quantidade'   => 'required|integer'
        ];

        $mensagens = [
            'categoria_id.exists' => 'Selecione uma categoria!',
            'codigo.unique'       => 'O código informado já foi utilizado',
            'codigo.max'          => 'O código deve ter no máximo 10 caracteres!',
            'required'            => 'O campo :attribute é obrigatório!',
            'min'                 => 'O campo :attribute deve ter pelo menos 5 caracteres!',
            'produto.max'         => 'O campo :attribute deve ter no máximo 60 caracteres!',
            'disponivel.boolean'  => 'O campo disponível não é válido',
            'preco.numeric'       => 'O preço deve ser um número decimal',
            'preco.between'       => 'O preço deve ser entre 0 e 999.999',
            'quantidade.integer'  => 'A quantidade deve ser definida'
        ];
        
        $produtoDados = $request->validate($regras, $mensagens);

        $produto = Produto::findOrFail($id);

        $imagemAtual = $produto->imagem;


        //enviou nova imagem
        if ($request->hasFile('imagem')) {

            $pathImagem = Storage::disk('public')->put('images/produtos', request()->file('imagem'));
            $produtoDados['imagem'] = $pathImagem;
            
            if($imagemAtual){
               Storage::disk('public')->delete($imagemAtual);
            }   

        }else{

            //apenas quer remover a imagem
            if ($request->input('remover_imagem')) {
                Storage::disk('public')->delete($imagemAtual);
                $produtoDados['imagem'] = '';
            }

        }

        $produto->update($produtoDados);
  
        return redirect()->route('produtos')->with('sucesso', 'Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);

        $hasImage = $produto->imagem;

        if($hasImage){
            Storage::disk('public')->delete($hasImage);
        }

        $produto->delete();

        return redirect()->route('produtos')->with('sucesso', 'Produto removido com sucesso!');
    }

    public function pdf()
    {
        $produtos = Produto::with(['categoria'])->orderBy('created_at', 'DESC')->get();

        $pdf = domPDF::loadView('produtos.pdf', compact('produtos'));

        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'verdana']);

        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->stream('relatorio-produtos.pdf');
    }
}
