<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListaRequest;
use App\Models\Lista;

class ListController extends Controller
{
    public function index(Lista $lista)
    {
        $listas = $lista->all();

        return view('site.listas.index', compact('listas'));
    }

    public function create()
    {
        return view('site.listas.create');
    }

    public function store(ListaRequest $request, Lista $lista)
    {
        $lista->createRegister($request->all());

        return redirect()->route('listas');
    }

    public function edit(int $id)
    {
        if ( !$lista = Lista::getById($id) ) {
            return redirect()->route('listas');
        }

        return view('site.listas.edit', compact('listing'));
    }

    public function update(ListaRequest $request, int $id)
    {
        if ( !$lista = Lista::getById($id) ) {
            return redirect()->route('listing');
        }

        $lista->update($request->all());

        return redirect()->route('listas');
    }

    public function destroy(int $id)
    {
        if ( !$listing = Lista::getById($id) ) {
            return redirect()->route('listing');
        }

        Lista::deleteRegister($id);
        
        return redirect()->route('listas');
    }
}
