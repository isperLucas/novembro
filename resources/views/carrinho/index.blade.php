@extends('layout')
@section('pagina_titulo', 'Carrinho')
@section('pagina_conteudo')

<div class="container">
	<div class="row">
		<h3>Carrinho de Compras</h3>
		<hr>
		@if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">
                <strong>{{ Session::get('mensagem-falha') }}</strong>
            </div>
        @endif
		@forelse ($pedidos as $pedido)
			<h5 class="col l6 s12 m6">Pedido: {{ $pedido->id }} </h5>
			<table>
				<thead>
					<th></th>
					<th class="center-align">Qtd</th>
					<th>Produto</th>
					<th>Valor Unit.</th>
					<th>Desconto(s)</th>
					<th>Total</th>
				</thead>
				<tbody>
					@php
						$total_pedido = 0;
					@endphp
					@foreach($pedido->pedido_produtos as $pedido_produto)

					<tr>
						<td><img src="#"></td>
						<td class="center-align"> 
							<div class="center-align">
								<a class="col l4 s4 m4" href="#">
									<i class="material-icons small">remove_circle_outline</i>
								</a>
								<span class="col l4 s4 m4">{{ $pedido_produto->qtd }}</span>
								<a class="col l4 s4 m4" href="#">
									<i class="material-icons small">add_circle_outline</i>
								</a>
							</div>
							<a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar Produto</a>
						</td>
						<td> {{ $pedido_produto->produto->nome }} </td>
						<td> {{ number_format($pedido_produto->produto->valor, 2, ",", ".") }} </td>
						<td> {{ number_format($pedido_produto->descontos, 2, ",", ".") }} </td>
						@php
							$total_produto = $pedido_produto->produto->valor - $pedido_produto->descontos;

							$total_pedido += $total_produto;
						@endphp
						<td>R$ {{ number_format($total_pedido, 2, ",", ".") }} </td>
					</tr>	

					@endforeach
				</tbody>
			</table>
		@empty
			<h5>Não a pedidos no carrinho</h5>	
		@endforelse	
	</div>
</div>

@endsection