<?php $__env->startSection('pagina_titulo', 'Carrinho'); ?>
<?php $__env->startSection('pagina_conteudo'); ?>

<div class="container">
	<div class="row">
		<h3>Carrinho de Compras</h3>
		<hr>
		<?php if(Session::has('mensagem-sucesso')): ?>
            <div class="card-panel green">
                <strong><?php echo e(Session::get('mensagem-sucesso')); ?></strong>
            </div>
        <?php endif; ?>
        <?php if(Session::has('mensagem-falha')): ?>
            <div class="card-panel red">
                <strong><?php echo e(Session::get('mensagem-falha')); ?></strong>
            </div>
        <?php endif; ?>
		<?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<h5 class="col l6 s12 m6">Pedido: <?php echo e($pedido->id); ?> </h5>
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
					<?php
						$total_pedido = 0;
					?>
					<?php $__currentLoopData = $pedido->pedido_produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido_produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<tr>
						<td><img src="#"></td>
						<td class="center-align"> 
							<div class="center-align">
								<a class="col l4 s4 m4" href="#">
									<i class="material-icons small">remove_circle_outline</i>
								</a>
								<span class="col l4 s4 m4"><?php echo e($pedido_produto->qtd); ?></span>
								<a class="col l4 s4 m4" href="#">
									<i class="material-icons small">add_circle_outline</i>
								</a>
							</div>
							<a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar Produto</a>
						</td>
						<td> <?php echo e($pedido_produto->produto->nome); ?> </td>
						<td> <?php echo e(number_format($pedido_produto->produto->valor, 2, ",", ".")); ?> </td>
						<td> <?php echo e(number_format($pedido_produto->descontos, 2, ",", ".")); ?> </td>
						<?php
							$total_produto = $pedido_produto->produto->valor - $pedido_produto->descontos;

							$total_pedido += $total_produto;
						?>
						<td>R$ <?php echo e(number_format($total_pedido, 2, ",", ".")); ?> </td>
					</tr>	

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<h5>Não a pedidos no carrinho</h5>	
		<?php endif; ?>	
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Thay\Projeto Novembro\blog\resources\views/carrinho/index.blade.php ENDPATH**/ ?>