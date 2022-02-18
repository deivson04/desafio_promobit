<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function create()
    {
        $tags = Tag::all();
        
        
       return view('tag',compact('tags'));   
        
    }

    
    public function store(Request $request)
    {
        
        $tags = new Tag;
 
        $tags->nome = $request->nome;
 
        $tags->save();
    
       return redirect('cadastrar_tag');
    }

    
    public function edit($id)
    {
        $tag = Tag::find($id);
        
        return view('editar_tag', compact('tag'));
    
    }

    
    public function update(Request $request)
    {
        $tag = Tag::find($request->id_tag);

        $tag->nome = $request->nome;
        
        $tag->save();
        
        return redirect('cadastrar_tag');
    }

   
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        
        return redirect('cadastrar_tag');
    }
}
