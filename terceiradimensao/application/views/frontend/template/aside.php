<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Inscreva-se</h4>

        <?php
        if(isset($_GET['inscricao']) && $_GET['inscricao'] == 'sucesso') { ?>

            <div class="alert alert-success">
                Sua inscrição foi feita com sucesso
            </div>

        <?php }
        echo validation_errors('<div class="alert alert-danger">', '</div>');
        echo form_open('home/inserir');
        ?>
        <div class="form-group">
            <div style="margin-top: 15px;">
                <input type="text" name="txt-nome" id="txt-nome" class="form-control" placeholder="Digite seu Nome">
            </div>
            <div style="margin-top: 15px;">
                <input type="text" name="txt-email" id="txt-email" class="form-control" placeholder="Digite seu Email">
            </div>

            <input type="hidden" name="status" value="1">

            <button style="margin-top: 15px;" type="submit" class="btn btn-default btn-block">Enviar</button>
        </div>
        <?php
        echo form_close();
        ?>

    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categorias do Blog</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                 <?php foreach($categorias as $categoria) { ?>

                    <li>
                        <a href="<?php echo base_url('categoria/'.$categoria->id.'/'.limpar($categoria->titulo)) ?>"> 
                            <?= $categoria->titulo ?> 
                        </a>
                    </li>

                <?php } ?>

            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>



<!-- Blog Categories Well -->
<div class="well">
    <h4>Autores do Blog</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

             <?php foreach($autoresAside as $autor) { ?>

                <li>
                    <a href="<?php echo base_url('autor/'.$autor->id.'/'.limpar($autor->nome)) ?>"> 
                        <?= $autor->nome ?> 
                    </a>
                </li>

            <?php } ?>

        </ul>
    </div>
</div>
<!-- /.row -->
</div>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Artigos Recentes</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

             <?php foreach($postagemAside as $artigo) { ?>

                <li>
                    <a href="<?php echo base_url('postagem/'.$artigo->id.'/'.limpar($artigo->titulo)) ?>"> 
                        <?= $artigo->titulo ?> 
                    </a>
                </li>

            <?php } ?>

        </ul>
    </div>
</div>
<!-- /.row -->
</div>





</div>