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

                <?php if($subtitulo != '') { ?>
                    <small>> <?= $subtitulo ?> </small>
                <?php } else { 
                    foreach($subtitulodb as $dbtitulo) { ?>
                        <small>> <?= $dbtitulo->titulo ?> </small>
                    <?php } 
                }?>
            </h1>

            <div class="col-md-12 "> 

                <p>
                    Terceira Dimensão é um portal de conteúdo, nossa missão é colaborar com o desenvolvimento, a educação e o aprendizado de todos. 
                </p>
                <p>
                    Tratamos diversos temas, sem preconceito ou distinção. Apenas priorizamos o interesse e o compromisso dos colaboradores em gerar conteúdo de valor dentro de suas especialidades.
                </p>
                <p>
                    <a href="<?php echo base_url('contato') ?>">
                        Para ser um Colaborador Terceira Dimensão, clique aqui e entre em contato.
                    </a>
                </p>
                <p>
                    <b>Sejam todos bem-vindos!</b>
                    Acompanhe tudo o que está acontecendo na Terceira Dimensão!
                </p>

            </div>
            <br>
            <h1 class="page-header">
                Nossos autores
            </h1>

            <div class="col-md-12 row">

                <?php foreach($autores as $autor) { ?>

                    <div class="col-md-4 col-xs-6">

                        <?php
                        if($autor->img == 1) {
                            $mostraImg = 'assets/frontend/img/usuarios/'.md5($autor->id).'.jpg';
                        } else {
                            $mostraImg = 'assets/frontend/img/semFoto.png';
                        }
                        ?>
                        <img class="img-responsive img-circle" src="<?= base_url($mostraImg) ?>" alt="">
                        
                        <h4 class="text-center">
                            <a href="<?php echo base_url('autor/'.$autor->id.'/'.limpar($autor->nome)) ?>"> <?php echo $autor->nome ?> </a>
                        </h4> 
                    </div>
                    
                <?php } ?>

            </div>


        </div>