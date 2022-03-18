<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeticaoRequest;
use App\Models\Peticao;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PeticaoController extends Controller
{
    public function view(){
        return view('page.peticao');
    }

    public function create(PeticaoRequest $request){
        $peticao = new Peticao($request->input());
        $peticao->save();
    }

    public function list(Request $request){
        $peticao = Peticao::when($request->titulo,function(Builder $query) use($request){
                    $query->where('titulo','like',"%$request->titulo%");
                })
                ->when($request->destinatario,function(Builder $query) use($request){
                    $query->where('destinatario','like',"%$request->destinatario%");
                })
                ->get();

        return response($peticao);
    }

    public function update(PeticaoRequest $request){
        $peticao = Peticao::find($request->id);
        $peticao->fill($request->input());
        $peticao->update();
    }

    public function delete(Request $request){
        $peticao = Peticao::find($request->id);
        $peticao->delete();
    }

}
