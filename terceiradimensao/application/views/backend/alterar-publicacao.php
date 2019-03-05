<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?php echo 'Administrar '. $subtitulo ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Alterar '. $subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            foreach($publicacoes as $publicacao) {
                            echo form_open('Admin/publicacao/salvar_alteracoes/'.md5($publicacao->id));
                            ?>
                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control" name="select-categoria" id="select-categoria">
                                    <?php
                                    foreach($categorias as $categoria) {
                                        ?>
                                        <option value="<?php echo $categoria->id ?>" <?php if($categoria->id == $publicacao->categoria){ echo 'selected'; }?>> <?php echo $categoria->titulo ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="txt-titulo" id="txt-titulo" class="form-control" placeholder="Digite o Título" value="<?php echo $publicacao->titulo ?>">
                            </div>
                            <div class="form-group">
                                <label>Subtítulo</label>
                                <input type="text" name="txt-subtitulo" id="txt-subtitulo" class="form-control" placeholder="Digite o Subtítulo" value="<?php echo $publicacao->subtitulo ?>">
                            </div>
                            <div class="form-group">
                                <label>Conteúdo</label>
                                <textarea type="text" name="txt-conteudo" id="txt-conteudo" class="form-control" rows="10"> <?php echo $publicacao->conteudo ?> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Data</label>
                                <input type="datetime-local" name="txt-data" id="txt-data" class="form-control" placeholder="Digite a Data" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($publicacao->data)) ?>">
                            </div>
                            <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $publicacao->id ?>">
                            <button type="submit" class="btn btn-default">Alterar</button>
                            <?php
                            echo form_close();
                            ?>
                            </div>

                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo 'Imagem de destaque do '. $subtitulo ?>
                    </div>

                    <style type="text/css">
                        img {
                            width: 350px;
                        }
                    </style>

                    <div class="panel-body">

                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col-lg-8 col-lg-offset-1">
                                <?php
                                if($publicacao->img == 1) {
                                    echo img('assets/frontend/img/publicacao/'.md5($publicacao->id).'.jpg');
                                } else {
                                    echo img('assets/frontend/img/semFoto2.png');
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <?php
                                $divOpen = '<div class="form-group">';
                                $divClose = '</div>';

                                echo form_open_multipart('Admin/publicacao/nova_foto');
                                echo form_hidden('id', md5($publicacao->id));
                                echo $divOpen;
                                $imagem = array('name' => 'userfile', 'id' => 'userfile', 'class' => 'form-control');
                                //sempre tem que utilizar este nome para upload de arquivos no codeigniter
                                echo form_upload($imagem); 
                                echo $divClose;
                                echo $divOpen;
                                $botao = array('name' => 'btn_adicionar', 'id' => 'btn_adicionar', 'class' => 'form-control btn btn-default', 'value' => 'Adicionar nova Imagem');
                                echo form_submit($botao);
                                echo $divClose;
                                echo form_close();
                            }
                            ?>

                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
