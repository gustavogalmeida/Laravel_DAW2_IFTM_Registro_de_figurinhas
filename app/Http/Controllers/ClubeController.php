<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class ClubeController extends Controller
{
    public function index()
    {
        $clube = new Clube();
        $clubes = Clube::All();


        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "nome"=> "required|max:100",
            "escudo"=> "required"
        ], [
            "nome.required"=> "O campo é obrigatório.",
            "nome.max"=> "O campo nome aceita no máximo :max caracteres.",
            "escudo.required"=> "O escudo é obrigatório."
        ]);
        if($request->get("id") != ""){
            $clube = Clube::Find($request->get("id"));
        } else {
            $clube = new Clube();
        }
        $clube->nome = $request->get("nome");
        $clube->escudo = $request->get("escudo");

        $clube->escudo = $request->file("escudo")->store("/public/clube");

        $clube->save();
        $request->Session()->flash("status", "salvo");
        
        return redirect("/clube");
    }

    public function edit($id)
    {
        $clube = Clube::Find($id);
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
        ]);
    }

    public function destroy($id, Request $request)
    {
        Clube::destroy($id);
        $request->Session()->flash("status", "excluido");
        return redirect("/clube");
    }
}
