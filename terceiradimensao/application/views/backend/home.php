<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?php echo $subtitulo ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php
    /*
    echo '<pre>';
    print_r($this->session->userLogado->perfil);
    echo '</pre>';

    echo '<pre>';
    print_r($this->session->userdata());
    echo '</pre>';
    */
    ?>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $subtitulo ?>
               </div>
               <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Bem Vindo ao Sistema <?php echo $this->session->userdata('userLogado')->nome ?>! </h2>
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