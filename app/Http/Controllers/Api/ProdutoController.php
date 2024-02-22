<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Services\ProdutoServices;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{

    public function __construct(protected ProdutoServices $produtoService) 
    { 

    }  

    public function index()
    {
        $dadosProdutos = $this->produtoService->getAll();
        
        return ProdutoResource::collection($dadosProdutos);
    }

    public function store(ProdutoRequest $produtoRequest, int $produtoId = 0)
    {
        if ($produtoId) {
            if ( !$produtoId = $produtoRequest->id ) {
                return Response::HTTP_NOT_FOUND;
            }
    
            $produto = $this->produtoService->update($produtoRequest, $produtoId);
    
            return new ProdutoResource($produto);
        }

        $produto = $this->produtoService->create($produtoRequest);

        return new ProdutoResource($produto);
    }

    public function show(int $produtoId)
    {
        if ( !$produto = $this->produtoService->getById($produtoId) ) {
            return Response::HTTP_NOT_FOUND;
        }
        return new ProdutoResource($produto);
    }

    public function destroy(int $produtoId)
    {
        if ( !$produto = $this->produtoService->getById($produtoId) ) {
            return Response::HTTP_NOT_FOUND;
        }

        $produto->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
