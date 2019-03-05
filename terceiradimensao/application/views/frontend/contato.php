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
            </h1>

            <div class="col-12">
                <?php
                if(isset($_GET['contato']) && $_GET['contato'] == 'sucesso') { ?>

                    <div class="alert alert-success">
                        Sua Mensagem foi enviada com sucesso
                    </div>

                <?php } ?>

                <?php 
                echo validation_errors('<div class="alert alert-danger">', '</div>');
                echo form_open('contato/inserir');
                ?>
                <div class="form-group">
                    <div style="margin-top: 15px;">
                        <label>Nome:</label>
                        <input type="text" name="txt-nome" id="txt-nome" class="form-control" placeholder="Digite seu Nome">
                    </div>
                    <div style="margin-top: 15px;">
                        <label>Email:</label>
                        <input type="text" name="txt-email" id="txt-email" class="form-control" placeholder="Digite seu Email">
                    </div>

                    <div style="margin-top: 15px;">
                        <label>Mensagem:</label>
                        <textarea type="text" name="txt-mensagem" class="form-control" placeholder="Mensagem" rows="8"></textarea>
                    </div>

                    <input type="hidden" name="txt-status" value="0">

                    <button style="margin-top: 15px;" type="submit" class="btn btn-default">Enviar</button>
                </div>
                <?php
                echo form_close();
                ?>

            </div>

        </div>