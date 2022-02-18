<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Tag;
use App\Models\Produto_Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
   
    public function create()
    {
        $produto = Produto::all();
        $tags = Tag::all();
        
        return view('produto',compact('produto','tags'));
    }

   
    public function store(Request $request)
    {   
            
        $produto = new Produto;
  
        $produto->name = $request->name;
 
        $produto->save();
        
        for($i = 0; $i < count($request->tags); $i++){
            $produto_tag = new Produto_Tag;   
            $produto_tag->produto_id = $produto->id;
            $produto_tag->tag_id = $request->tags[$i];
            $produto_tag->save();
        }
           return redirect('cadastrar_produto');
    }

   
    public function edit($id)
    {
        $produto = Produto::find($id);
        
        return view('editar_produto', compact('produto'));
    }

    
    public function update(Request $request)
    {
        $produto = Produto::find($request->id_produto);

        $produto->name = $request->name;
       
        $produto->save();
        $messag = "Atualizado com sucesso";
        return redirect('cadastrar_produto')->with('$messag');
    }

    
    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        
        return redirect('cadastrar_produto');
    }


    public function buscarRelatorio(){    
        
          $produtos = "SELECT 
          produto__tags.produto_id,
          produtos.name AS produto,
          produto__tags.tag_id,
          tags.nome AS tag
          FROM produtos
          INNER JOIN produto__tags
              ON produto__tags.produto_id = produtos.id
          INNER JOIN tags
              ON tags.id = produto__tags.tag_id";
          $produt = DB::select($produtos);
        return view('/buscarRelevancia', compact('produt'));
          
    }












}
