<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListaRequest;
use App\Http\Resources\ListaResource;
use App\Models\Lista;
use Illuminate\Http\Response;

class ListaController extends Controller
{

    public function __construct(protected Lista $listaRepository) 
    { 

    }   

    public function index()
    {
        $dados = $this->listaRepository->paginate();
        
        return ListaResource::collection($dados);
    }

    public function store(ListaRequest $request, int $id = 0)
    {
        if ($id) {
            if ( !$lista = $this->listaRepository->findOrfail($id) ) {
                return Response::HTTP_NOT_FOUND();
            }
    
            $lista->update($request->validated());
    
            return new ListaResource($lista);
        }

        $categoria = $this->listaRepository->create($request->validated());

        return new ListaResource($categoria);
    }

    public function show(int $id)
    {
        if ( !$lista = $this->listaRepository->findOrfail($id) ) {
            return Response::HTTP_NOT_FOUND();
        }
        return new ListaResource($lista);
    }

    public function destroy(int $id)
    {
        if ( !$lista = $this->listaRepository->findOrfail($id) ) {
            return Response::HTTP_NOT_FOUND();
        }

        $lista->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
