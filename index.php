
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bioequivalentes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="assets/ico/favicon.png" />

  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-static-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.html">Bioequivalentes</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="/">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>Bioequivalentes</h1>
    <p class="lead">Un Bioequivalente es un medicamento que ha comprobado mediante estudios científicos, que tiene el mismo efecto que el producto farmacéutico original. Su eficacia está certificada por el Instituto de Salud Pública.</p>
    <p>La información aquí expuesta fue obtenida a través del portal de Datos Abiertos del Estado, <a href="http://datos.gob.cl/datasets/ver/1303">más información</a> </p>
    <p>Para más información visita: <a href="http://www.ispch.cl/medicamentos-bioequivalentes" target="_blank">Medicamentos Bioequivalentes, MinSal</a></p>
  </div>
</header>


  <div class="container">

    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <?php
          $info = file_get_contents('/json.php');
          $aData = json_decode( $info );
          $search  = array('Á', 'É', 'Í', 'Ó', 'Ú', '(', ')');
          $replace = array('A', 'E', 'I', 'O', 'U', '', '');

          foreach($aData as $key => $data) {
            $key = str_replace($search,$replace, $key);
            ?>
            <li><a href="#<?php echo str_replace(' ', '', $key) ?>"><i class="icon-chevron-right"></i> <?php echo $key ?></a></li>
            <?php
          }
          ?>
        </ul>
      </div>
      <div class="span9">        
        <?php
        foreach($aData as $key => $data) {
          $key = str_replace($search,$replace, $key);
        ?>
        <section id="<?php echo str_replace(' ', '', $key) ?>">
          <div class="page-header">
            <h1><?php echo $key ?></h1>
          </div>
          <?php
          foreach($data as $d) {
            ?>
            <div class="row">
              <h2><?php echo $d->{"Producto"} ?></h2>
              <p class="leader">Uso / Tratamiento: <?php echo $d->{"Uso / Tratamiento"} ?></p>
              <p>Principio Activo: <?php echo $d->{"Principio Activo"} ?></p>
              <p>Titular: <span class="label label-warning"><?php echo $d->{"Titular"} ?></span></p>
              <?php $aProd = explode(' ', $d->{"Producto"})  ?>
              <p>Precio (?): <a href="http://www.preciosderemedios.cl/resultado_busq.php?pattern=<?php echo urlencode($aProd[0]) ?>&item=product" target="_blank"><?php echo $aProd[0] ?></a></p>
              <a href="#overview">Subir</a>
            </div>
            <?php
          }
          ?>

        </section>
        <?php
        }
        ?>
      </div>
    </div>

  </div>



    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <p>Programado por <a href="http://twitter.com/jgarrido" target="_blank">@jgarrido</a>.</p>
        <p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <p><a href="http://glyphicons.com">Glyphicons Free</a> licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
