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
                            foreach($usuarios as $usuario) {
                            echo form_open('Admin/usuarios/salvar_alteracoes/'.md5($usuario->id).'/'.$usuario->user);
                                ?>
                                <div class="form-group">
                                    <label>Nome do Usuário</label>
                                    <input type="text" name="txt-nome" id="txt-nome" class="form-control" placeholder="Digite o Nome do Usuário" value="<?php echo $usuario->nome ?>">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" name="txt-email" id="txt-email" class="form-control" placeholder="Digite o Email do Usuário" value="<?php echo $usuario->email ?>">
                                </div>
                                <div class="form-group">
                                    <label>Histórico</label>
                                    <textarea type="text" name="txt-historico" id="txt-historico" class="form-control"> <?php echo $usuario->historico ?> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" name="txt-user" id="txt-user" class="form-control" placeholder="Digite o User do Usuário" value="<?php echo $usuario->user ?>">
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" name="txt-senha" id="txt-senha" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar Senha</label>
                                    <input type="password" name="txt-confir-senha" id="txt-confir-senha" class="form-control">
                                </div>
                                <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $usuario->id ?>">
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
                    <div class="panel-body">

                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col-lg-3 col-lg-offset-3">
                                <?php
                                if($usuario->img == 1) {
                                    echo img('assets/frontend/img/usuarios/'.md5($usuario->id).'.jpg');
                                } else {
                                    echo img('assets/frontend/img/semFoto.png');
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <?php
                                $divOpen = '<div class="form-group">';
                                $divClose = '</div>';

                                echo form_open_multipart('Admin/usuarios/nova_foto');
                                echo form_hidden('id', md5($usuario->id));
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
