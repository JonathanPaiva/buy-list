<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListaRequest;
use App\Http\Resources\ListaResource;
use App\Services\ListaServices;
use Illuminate\Http\Response;

class ListaController extends Controller
{

    public function __construct(protected ListaServices $listaServices) 
    { 

    }   

    public function index()
    {
        $dadosListas = $this->listaServices->getAll();
        
        return ListaResource::collection($dadosListas);
    }

    public function store(ListaRequest $listaRequest, int $listaId = 0)
    {
        if ($listaId) {

            if (!$listaId = $listaRequest->id) {
                return Response::HTTP_NOT_FOUND;
            }
            
            $lista = $this->listaServices->update($listaRequest, $listaId);
    
            return new ListaResource($lista);
        }

        $lista = $this->listaServices->create($listaRequest);

        return new ListaResource($lista);
    }

    public function show(int $listaId)
    {
        if ( !$lista = $this->listaServices->getById($listaId) ) {
            return Response::HTTP_NOT_FOUND;
        }
        return new ListaResource($lista);
    }

    public function destroy(int $listaId)
    {
        if ( !$this->listaServices->delete($listaId) ) {
            return Response::HTTP_NOT_FOUND;
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
