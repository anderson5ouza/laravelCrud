<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as domPDF; 

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::orderBy('created_at', 'DESC')->paginate(1);

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $regras = [
            'categoria' => 'required|min:5',
            'descricao' => 'required|min:5|max:50'
        ];

        $mensagens = [
            'required'      => 'O campo :attribute é obrigatório!',
            'min'           => 'O campo :attribute deve ter pelo menos 5 caracteres!',
            'descricao.max' => 'O campo :attribute deve ter no máximo 50 caracteres!'
        ];
        
        $request->validate($regras, $mensagens);

        Categoria::create($request->all());

        return redirect()->route('categorias')->with('sucesso', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
  
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
  
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $regras = [
            'categoria' => 'required|min:5',
            'descricao' => 'required|min:5|max:50'
        ];

        $mensagens = [
            'required'      => 'O campo :attribute é obrigatório!',
            'min'           => 'O campo :attribute deve ter pelo menos 5 caracteres!',
            'descricao.max' => 'O campo :attribute deve ter no máximo 50 caracteres!'
        ];

        $categoria = Categoria::findOrFail($id);
        
        $request->validate($regras, $mensagens);

        $categoria->update($request->all());
  
        return redirect()->route('categorias')->with('sucesso', 'Categoria alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $categoria = Categoria::findOrFail($id);
        
        $categoria->delete();

        return redirect()->route('categorias')->with('sucesso', 'Categoria removida com sucesso!');
    }

    public function pdf()
    {
        $categorias = Categoria::orderBy('created_at', 'DESC')->get();

        $pdf = domPDF::loadView('categorias.pdf', compact('categorias'));

        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'verdana']);

        $pdf->setPaper('a4', 'portrait');
        
        //download
        //return $pdf->download('relatorio-categorias.pdf');

        return $pdf->stream('relatorio-categorias.pdf');
    }
}
