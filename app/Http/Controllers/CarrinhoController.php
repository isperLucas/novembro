<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;

class CarrinhoController extends Controller
{
    function _construct()
    {
    	//obriga a estar logado
    	$this->middleware('auth');
    }

    public function index()
    {
    	$pedidos = Pedido::where([
    		'status' => 'RE',
    		'user_id' => Auth::id()
    	])->get();

    	return view('carrinho.index', compact('pedidos'));
    }

    public function adicionar()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $id_produto = $req->input('id');

        $produto = Produto::find($id_produto);

        if (empty($produto->id)) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa Loja');
            return redirect()->route('carrinho.index');
        }

        $id_usuario = Auth::id();

        $id_pedido = Pedido::consultaId([
            'user_id' => $id_usuario,
            'status' => 'RE' // Reservada
        ]);

        if (empty($id_pedido)) {
            $pedido_novo = Pedido::create([
                'user_id' => $id_usuario,
                'status' => 'RE'
            ]);

            $id_pedido = $pedido_novo->id;
        }

        PedidoProduto::create([
            'pedido_id' => $id_pedido,
            'produto_id' => $id_produto,
            'valor' => $produto->valor,
            'status' => 'RE'
        ]);

        $req->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('carrinho.index');
    }
}
