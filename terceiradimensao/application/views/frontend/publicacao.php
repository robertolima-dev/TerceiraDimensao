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

            <?php 

            foreach($postagem as $destaque) { 

                ?>

                <h1> <?php echo $destaque->titulo ?> </h1>
                <p class="lead">
                    por <a style="text-decoration: none;" href="<?php echo base_url('autor/'.$destaque->idautor.'/'.limpar($destaque->nome)) ?>"> <?php echo $destaque->nome ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo postadoem($destaque->data) ?> </p>
                <p><i> <?php echo $destaque->subtitulo ?> </i></p>
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
                <p> <?= $destaque->conteudo ?> </p>

                <hr>

                <div style="margin-bottom: 30px;">
                    <h4>Deixe seu Comentário!</h4>
                </div>

                <?php
                echo validation_errors('<div class="alert alert-danger">', '</div>');
                echo form_open('postagens/comentario');
                ?>

                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="txt-nome" id="txt-nome" class="form-control" placeholder="Digite seu Nome" value="<?php echo set_value('txt-nome') ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="txt-email" id="txt-email" class="form-control" placeholder="Digite seu Email" value="<?php echo set_value('txt-email') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Comentário</label>
                        <textarea type="text" name="txt-comentario" id="txt-comentario" class="form-control" rows="5"> <?php echo set_value('txt-comentario') ?> </textarea>
                    </div>

                    <?php foreach($postagem as $destaque) { ?>
                        <input type="hidden" name="id_postagem" value="<?php echo $destaque->id ?>">
                        <input type="hidden" name="titulo_postagem" value="<?php echo $destaque->titulo ?>">
                    <?php } ?>

                    <input type="hidden" name="status" value="1">

                    <button type="submit" class="btn btn-default">Enviar Comentário</button>
                </div>

                <?php
                echo form_close();
                ?>

                <hr>

                <div style="margin-bottom: 30px;">
                    <h4>Comentários:</h4>
                </div>

                <?php foreach($comentarios as $comentario) { 
                    if($comentario->id_postagem == $destaque->id && $comentario->status == 1) { ?>

                        <div class="well">
                            <span><b> <?php echo $comentario->nome ?></b></span> | 
                            <span><a href="mailto:<?php echo $comentario->email ?>"><?php echo $comentario->email ?></a></span>
                            <hr>
                            <p>
                                <?php echo $comentario->comentario ?>
                            </p>
                        </div>

                    <?php } 
                } ?>

            </div>

            <?php } ?>