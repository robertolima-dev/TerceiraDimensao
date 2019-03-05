
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
                    <?php echo 'Adicionar novo '. $subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                            
                            if($this->session->userLogado->perfil == 1) {
                                echo validation_errors('<div class="alert alert-danger">', '</div>');
                                echo form_open('Admin/usuarios/inserir');
                                ?>
                                <div class="form-group">
                                    <label>Nome do Usuário</label>
                                    <input type="text" name="txt-nome" id="txt-nome" class="form-control" placeholder="Digite o Nome do Usuário" value="<?php echo set_value('txt-nome') ?>">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" name="txt-email" id="txt-email" class="form-control" placeholder="Digite o Email do Usuário" value="<?php echo set_value('txt-email') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Histórico</label>
                                    <textarea type="text" name="txt-historico" id="txt-historico" class="form-control"> <?php echo set_value('txt-historico') ?> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" name="txt-user" id="txt-user" class="form-control" placeholder="Digite o User do Usuário" value="<?php echo set_value('txt-user') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Perfil</label>
                                    <select name="txt-perfil" class="form-control">
                                        <option value="2">Usuário</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" name="txt-senha" id="txt-senha" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar Senha</label>
                                    <input type="password" name="txt-confir-senha" id="txt-confir-senha" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-default">Cadastrar</button>
                                <?php
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

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Alterar '. $subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <style type="text/css">
                                img {
                                    width: 60px;
                                }
                            </style>

                            <?php
                            $this->table->set_heading('Foto', 'Nome do Usuario', 'Alterar', 'Excluir');
                            foreach($usuarios as $usuario) {
                                if($this->session->userLogado->perfil == 2) {
                                    if($usuario->id == $this->session->userLogado->id) {

                                        $nomeUsuario = $usuario->nome;

                                        if($usuario->img == 1) {
                                            $fotoUsuario = img('assets/frontend/img/usuarios/'.md5($usuario->id).'.jpg');
                                        } else {
                                            $fotoUsuario = img('assets/frontend/img/semFoto.png');
                                        }

                                        $alterar = anchor(base_url('Admin/usuarios/alterar/'.md5($usuario->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');

                                        $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$usuario->id.'"><i class="fa fa-remove fa-fw"></i> Excluir</button>';

                                        echo $modal= ' 
                                        <div class="modal fade excluir-modal-'.$usuario->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel2">Exclusão de Publicação</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja Excluir o(a) Usuário(a) '.$usuario->nome.'?</h4>
                                                        <p>Após Excluido(a), o(a) usuário(a) <b>'.$usuario->nome.'</b> não ficará mais disponível no Sistema.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <a type="button" class="btn btn-primary" href="'.base_url("Admin/usuarios/excluir/".md5($usuario->id)).'">Excluir</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>';

                                        $this->table->add_row($fotoUsuario, $nomeUsuario, $alterar, $excluir);

                                    }
                                }
                            }


                            $this->table->set_heading('Foto', 'Nome do Usuario', 'Alterar', 'Excluir');
                            foreach($usuarios as $usuario) {
                                if($this->session->userLogado->perfil == 1) {

                                    $nomeUsuario = $usuario->nome;

                                    if($usuario->img == 1) {
                                        $fotoUsuario = img('assets/frontend/img/usuarios/'.md5($usuario->id).'.jpg');
                                    } else {
                                        $fotoUsuario = img('assets/frontend/img/semFoto.png');
                                    }

                                    $alterar = anchor(base_url('Admin/usuarios/alterar/'.md5($usuario->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');

                                    $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$usuario->id.'"><i class="fa fa-remove fa-fw"></i> Excluir</button>';

                                    echo $modal= ' 
                                    <div class="modal fade excluir-modal-'.$usuario->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2">Exclusão de Publicação</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Deseja Excluir o(a) Usuário(a) '.$usuario->nome.'?</h4>
                                                    <p>Após Excluido(a), o(a) usuário(a) <b>'.$usuario->nome.'</b> não ficará mais disponível no Sistema.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <a type="button" class="btn btn-primary" href="'.base_url("Admin/usuarios/excluir/".md5($usuario->id)).'">Excluir</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>';

                                    $this->table->add_row($fotoUsuario, $nomeUsuario, $alterar, $excluir);

                                }
                            }
                            $this->table->set_template(array(
                                'table_open' => '<table class="table table-striped">'
                            ));
                            echo $this->table->generate();
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



