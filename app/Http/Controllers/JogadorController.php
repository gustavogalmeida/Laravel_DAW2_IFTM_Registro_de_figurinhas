<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;
use App\Models\Clube;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogador = new Jogador();
        $jogadors = Jogador::All();
        $clubes = Clube::All();
        
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadors" => $jogadors,
            "clubes" => $clubes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $jogador = Jogador::Find($request->get("id"));
        } else {
            $jogador = new Jogador ();
        }

        $jogador->nome = $request->get("nome");
        $jogador->clube_id = $request->get("clube_id");
        $jogador->posicao = $request->get("posicao");
        $jogador->possuo = $request->get("possuo");
        $jogador->data = $request->get("data");
        $jogador->save();

        $request->session() ->flash("status", "salvo");

        return redirect("/jogador");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
