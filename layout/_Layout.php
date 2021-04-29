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
      <script src="../../assets/script/site.js"></script>
      <title>Sistema de Elecciones</title>
    </head>
    <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Sistema de Elecciones</a>
        </div>
      </nav>
      <main class="bg-white">
EOF;

    echo $content;
  }

  function bottomContent(){
    $content = <<<EOF
    
      </main>
    </body>
    </html>
EOF;
  
    echo $content;
  }

?>
