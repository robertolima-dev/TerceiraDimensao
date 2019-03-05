<head>
    <style type="text/css">
        h1, h2, h3, h4, h5, p, span {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?= $titulo ?> 
                <small>> <?= $subtitulo ?> </small>
            </h1>

            <?php foreach($postagemAside as $destaque) { ?>

                <h2>
                    <a style="text-decoration: none;" href="<?= base_url('postagem/'.$destaque->id.'/'.limpar($destaque->titulo))?>"> <?= $destaque->titulo ?></a>
                </h2>
                <p class="lead">
                    por <a style="text-decoration: none;" href="<?php echo base_url('autor/'.$destaque->idautor.'/'.limpar($destaque->nome)) ?>"> <?php echo $destaque->nome ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo postadoem($destaque->data) ?> </p>
                <hr>
                <?php
                if($destaque->img == 1) {
                    $fotoPub = base_url('assets/frontend/img/publicacao/'.md5($destaque->id).'.jpg');
                    ?>
                    <img class="img-responsive" src="<?php echo $fotoPub ?>" alt="">
                    <hr>
                    <?php
                }
                ?>
                <p> <?= substr($destaque->conteudo, 0, 200) ?>... </p>
                <a class="btn btn-primary" href="<?= base_url('postagem/'.$destaque->id.'/'.limpar($destaque->titulo))?>">Leia mais <span class="glyphicon glyphicon-chevron-right"></span></a>

                <div style="margin-top: 80px;">
                    <hr>
                </div>

            <?php } ?>

        </div>