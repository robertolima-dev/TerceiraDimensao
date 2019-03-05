
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>">Terceira Dimensão</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
                  <ul class="dropdown-menu">

                    <?php foreach($categorias as $categoria) { ?>

                        <li><a href="<?php echo base_url('categoria/'.$categoria->id.'/'.limpar($categoria->titulo)) ?>"> <?= $categoria->titulo ?> </a></li>

                    <?php } ?>
                    
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('sobrenos') ?>">Sobre Nós</a>
            </li>
            <li>
                <a href="<?php echo base_url('contato') ?>">Contato</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>