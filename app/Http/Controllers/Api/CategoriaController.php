<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Services\CategoriaServices;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{

    public function __construct(protected CategoriaServices $categoriaService) 
    { 

    }   

    public function index()
    {
        $dadosCategorias = $this->categoriaService->getAll();
        
        return CategoriaResource::collection($dadosCategorias);
    }

    public function store(CategoriaRequest $categoriaRequest, int $categoriaId = 0)
    {
        if ($categoriaId) {
            
            if (!$categoriaId = $categoriaRequest->id) {
                return Response::HTTP_NOT_FOUND;
            }
            
            $categoria = $this->categoriaService->update($categoriaRequest, $categoriaId);
    
            return new CategoriaResource($categoria);
        }

        $categoria = $this->categoriaService->create($categoriaRequest);

        return new CategoriaResource($categoria);
    }

    public function show(int $categoriaId)
    {
        if ( !$categoria = $this->categoriaService->getById($categoriaId) ) {
            return Response::HTTP_NOT_FOUND;
        }
        return new CategoriaResource($categoria);
    }

    public function destroy(int $categoriaId)
    {
        if ( !$this->categoriaService->delete($categoriaId) ) {
            return Response::HTTP_NOT_FOUND;
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
