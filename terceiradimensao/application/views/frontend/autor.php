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

            <?php foreach($autores as $autor) { ?>


                <div class="col-md-4">

                    <?php
                    if($autor->img == 1) {
                        $mostraImg = 'assets/frontend/img/usuarios/'.md5($autor->id).'.jpg';
                    } else {
                        $mostraImg = 'assets/frontend/img/semFoto.png';
                    }
                    ?>
                    <img class="img-responsive img-circle" src="<?= base_url($mostraImg) ?>" alt="">
                    
                </div>
                <div class="col-md-8 ">

                    <h2> <?php echo $autor->nome ?> </h2> 
                    <hr>
                    <p> <?php echo $autor->historico ?> </p>
                    <hr>
                </div>


            <?php } ?>

        </div>