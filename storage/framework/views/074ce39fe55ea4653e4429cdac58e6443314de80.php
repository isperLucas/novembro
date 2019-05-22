<?php $__env->startSection('pagina_titulo', $registro->nome ); ?>

<?php $__env->startSection('pagina_conteudo'); ?>

<div class="container">
    <div class="row">
        <h3><?php echo e($registro->nome); ?></h3>
        <div class="divider"></div>
        <div class="section col s12 m6 l4">
            <div class="card small">
                <img class="col s12 m12 l12 materialboxed" data-caption="<?php echo e($registro->nome); ?>" src="<?php echo e($registro->imagem); ?>" alt="<?php echo e($registro->nome); ?>" title="<?php echo e($registro->nome); ?>">
            </div>
        </div>
        <div class="section col s12 m6 l6">
            <h4 class="left col l6"> R$ <?php echo e(number_format($registro->valor, 2, ',', '.')); ?> </h4>
            <form method="POST" action="<?php echo e(route('carrinho.adicionar')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value=2>
                <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>   
            </form>
        </div>
        <div class="section col s12 m6 l6">
            <?php echo $registro->descricao; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Thay\Projeto Novembro\blog\resources\views/home/produto.blade.php ENDPATH**/ ?>