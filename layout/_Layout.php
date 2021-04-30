<?php

function topContent()
{
  $content = <<<EOF

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--Bootstrap-->
      <link rel="stylesheet" href="../../assets/plugin/css/bootstrap.min.css">
      <script src="../../assets/plugin/js/bootstrap.min.js"></script>
      <title>Sistema de Elecciones</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Elecciones</a>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 50px;">
          <a class="navbar-brand" href="../candidatos/">Candidatos</a>
          <a class="navbar-brand" href="../ciudadanos/">Ciudadanos</a>
          <a class="navbar-brand" href="../partidos/">Partidos</a>
          <a class="navbar-brand" href="../puestos/">Puestos</a>
          <a class="navbar-brand" href="../usuarios/">Usuarios</a>
        </div>
      </div>
    </nav>
    <main class="bg-white">
EOF;

  echo $content;
}

function bottomContent()
{
  $content = <<<EOF
    
      </main>
    <script src="../../assets/script/site.js"></script>
    </body>
    </html>
EOF;

  echo $content;
}

?>