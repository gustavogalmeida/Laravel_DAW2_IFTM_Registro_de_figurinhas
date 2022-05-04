<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if($request->get("id") != ""){
            $clube = Clube::Find($request->get("id"));
        } else {
            $clube = new Clube();
        }
        $clube->nome = $request->get("nome");
        $clube->escudo = $request->get("escudo");
        $clube->save();
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

    public function destroy($id)
    {
        Clube::destroy($id);
        return redirect("/clube");
    }
}
