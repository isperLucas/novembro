<!DOCTYPE html>
<html>
<head>
    <title>Loja virtual - <?php echo $__env->yieldContent('pagina_titulo'); ?></title>

    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="/css/styles.css" rel="stylesheet">

</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper light-blue row">
                <a href="<?php echo e(route('index')); ?>" class="brand-logo col offset-l1">Loja virtual</a>
                <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo e(route('carrinho.compras')); ?>">Minhas compras</a></li>
                    <li><a href="<?php echo e(route('carrinho.index')); ?>">Carrinho</a></li>
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Entrar</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Cadastre-se</a></li>
                    <?php else: ?>
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown-user">
                                Olá <?php echo e(Auth::user()->name); ?>!<i class="material-icons right">arrow_drop_down</i>
                            </a>
                            <ul id="dropdown-user" class="dropdown-content">
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo e(url('/logout')); ?>"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <?php echo $__env->yieldContent('pagina_conteudo'); ?>

        <?php if(!Auth::guest()): ?>
            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" class="hide">
                <?php echo e(csrf_field()); ?>

            </form>
        <?php endif; ?>
    </main>
    <footer class="page-footer blue">
        <div class="footer-copyright">
            <div class="container">
                Desenvolvido para Curso de carrinho de compras com Laravel
            </div>
        </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script type="text/javascript">
        $( document ).ready(function(){
            $(".button-collapse").sideNav();
            $('select').material_select();
        });
    </script>
</body>
</html><?php /**PATH C:\Users\Thay\Projeto Novembro\blog\resources\views/layout.blade.php ENDPATH**/ ?>