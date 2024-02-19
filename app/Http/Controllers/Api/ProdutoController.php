<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{

    public function __construct(protected Produto $produtoRepository) 
    { 

    }  

    public function index()
    {
        $dados = $this->produtoRepository->paginate();
        
        return ProdutoResource::collection($dados);
    }

    public function store(ProdutoRequest $request, int $id = 0)
    {
        if ($id) {
            if ( !$produto = $this->produtoRepository->findOrfail($id) ) {
                return Response::HTTP_NOT_FOUND();
            }
    
            $produto->update($request->validated());
    
            return new ProdutoResource($produto);
        }

        $produto = $this->produtoRepository->create($request->validated());

        return new ProdutoResource($produto);
    }

    public function show(int $id)
    {
        if ( !$produto = $this->produtoRepository->findOrfail($id) ) {
            return Response::HTTP_NOT_FOUND();
        }
        return new ProdutoResource($produto);
    }

    public function destroy(int $id)
    {
        if ( !$produto = $this->produtoRepository->findOrfail($id) ) {
            return Response::HTTP_NOT_FOUND();
        }

        $produto->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
