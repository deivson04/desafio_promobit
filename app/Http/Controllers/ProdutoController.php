<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Tag;
use App\Models\Produto_Tag;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produto = Produto::all();
        $tags = Tag::all();
        
        return view('produto',compact('produto','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Tag::find($id);
        
        return view('editar_tag', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($request->id_name);

        $produto->name = $request->name;
        
        $produto->save();
        
        return redirect('cadastrar_produto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        
        return redirect('cadastrar_produto');
    }
}
