<?php $__env->startSection('pagina_titulo', 'HOME'); ?>
<?php $__env->startSection('pagina_conteudo'); ?>

<div class="container">
	<div class="row">

	<?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col s12 m6 l4">
			<div class="card medium">
				<div class="card-image">
					<img src="<?php echo e($registro->imagem); ?>">
				</div>
				<div class="card-content">
					<span class="card-title grey-text text-darken-4 truncate" title="<?php echo e($registro->nome); ?>"><?php echo e($registro->nome); ?></span>
					<p>R$ <?php echo e(number_format($registro->valor, 2, ',', '.')); ?></p>
				</div>
				<div class="card-action">
					<a class="blue-text" href="<?php echo e(route('produto', $registro->id)); ?>">Veja mais informações</a>
				</div>
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Thay\Projeto Novembro\blog\resources\views/home/index.blade.php ENDPATH**/ ?>