<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dieta del plato</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mdb.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cyp.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/misestilos.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sweetalert.css">

    <script  src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/mdb.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/TweenMax.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/CSSPlugin.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/TweenLite.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/categorias.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/choose-your-plate-spanish.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/cyp.js') ?>"></script>



    <script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

</head>

<body>

<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark green">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx12" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Dieta del Plato</a>
        <div class="collapse navbar-collapse" id="collapseEx12">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/">Administrador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="linkpaciente" href="<?php echo base_url(); ?>paciente">Paciente</a>
                </li>
                
            </ul>
            
        </div>
    </div>
</nav>
<!--/.Navbar-->
<!--<div class="container">-->
<!--    <div class="col-xs-3">-->
<!--        --><?php //$this->load->view('users/login_view'); ?>
<!--    </div>-->
<!---->
    <div class="col-xs-12">
        <?php $this->load->view($main_view); ?>
    </div>
</div>
</body>
</html>