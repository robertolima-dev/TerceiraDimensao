<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?php echo 'Administrar '. $subtitulo ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Adicionar nova '. $subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('Admin/publicacao/inserir');
                            ?>
                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control" name="select-categoria" id="select-categoria">
                                    <?php
                                    foreach($categorias as $categoria) {
                                        ?>
                                        <option value="<?php echo $categoria->id ?>"> <?php echo $categoria->titulo ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="txt-titulo" id="txt-titulo" class="form-control" placeholder="Digite o Título" value="<?php echo set_value('txt-titulo') ?>">
                            </div>
                            <div class="form-group">
                                <label>Subtítulo</label>
                                <input type="text" name="txt-subtitulo" id="txt-subtitulo" class="form-control" placeholder="Digite o Subtítulo" value="<?php echo set_value('txt-titulo') ?>">
                            </div>
                            <div class="form-group">
                                <label>Conteúdo</label>
                                <textarea type="text" name="txt-conteudo" id="txt-conteudo" class="form-control" rows="10"> <?php echo set_value('txt-conteudo') ?> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Data</label>
                                <input type="datetime-local" name="txt-data" id="txt-data" class="form-control" placeholder="Digite a Data" value="<?php echo set_value('txt-data') ?>">
                            </div>
                            <input type="hidden" name="txt-usuario" id="txt-usuario" value="<?php echo $this->session->userdata('userLogado')->id ?>">
                            <button type="submit" class="btn btn-default">Cadastrar</button>
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

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Alterar '. $subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <style type="text/css">
                                img {
                                    width: 120px;
                                }
                            </style>

                            <?php
                            $this->table->set_heading('Foto', 'Título', 'Data', 'Alterar', 'Excluir');
                            foreach($publicacoes as $publicacao) {
                                if($this->session->userLogado->perfil == 2) {
                                    if($publicacao->user == $this->session->userLogado->id) {

                                        $titulo = $publicacao->titulo;
                                        $data = postadoem($publicacao->data);

                                        if($publicacao->img == 1) {
                                            $fotoPub = img('assets/frontend/img/publicacao/'.md5($publicacao->id).'.jpg');
                                        } else {
                                            $fotoPub = img('assets/frontend/img/semFoto2.png');
                                        }

                                        $alterar = anchor(base_url('Admin/publicacao/alterar/'.md5($publicacao->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');

                                        $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$publicacao->id.'"><i class="fa fa-remove fa-fw"></i> Excluir</button>';

                                        echo $modal= ' 
                                        <div class="modal fade excluir-modal-'.$publicacao->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel2">Exclusão de Publicação</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja Excluir a Publicação '.$publicacao->titulo.'?</h4>
                                                        <p>Após Excluida, a publicação <b>'.$publicacao->titulo.'</b> não ficará mais disponível no Sistema.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <a type="button" class="btn btn-primary" href="'.base_url("Admin/publicacao/excluir/".md5($publicacao->id)).'">Excluir</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>';

                                        $this->table->add_row($fotoPub, $titulo, $data, $alterar, $excluir);
                                    }
                                }
                            }

                            $this->table->set_heading('Foto', 'Título', 'Data', 'Alterar', 'Excluir');
                            foreach($publicacoes as $publicacao) {
                                if($this->session->userLogado->perfil == 1) {

                                    $titulo = $publicacao->titulo;
                                    $data = postadoem($publicacao->data);

                                    if($publicacao->img == 1) {
                                        $fotoPub = img('assets/frontend/img/publicacao/'.md5($publicacao->id).'.jpg');
                                    } else {
                                        $fotoPub = img('assets/frontend/img/semFoto2.png');
                                    }

                                    $alterar = anchor(base_url('Admin/publicacao/alterar/'.md5($publicacao->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');

                                    $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$publicacao->id.'"><i class="fa fa-remove fa-fw"></i> Excluir</button>';

                                    echo $modal= ' 
                                    <div class="modal fade excluir-modal-'.$publicacao->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2">Exclusão de Publicação</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Deseja Excluir a Publicação '.$publicacao->titulo.'?</h4>
                                                    <p>Após Excluida, a publicação <b>'.$publicacao->titulo.'</b> não ficará mais disponível no Sistema.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <a type="button" class="btn btn-primary" href="'.base_url("Admin/publicacao/excluir/".md5($publicacao->id)).'">Excluir</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>';

                                    $this->table->add_row($fotoPub, $titulo, $data, $alterar, $excluir);

                                }
                            }



                            $this->table->set_template(array(
                                'table_open' => '<table class="table table-striped">'
                            ));
                            echo $this->table->generate();
                            echo '<div class="paginacao">'.$links_paginacao.'</div>';
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
