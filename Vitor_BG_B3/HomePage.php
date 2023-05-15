<?php require_once('verificacao.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Inicial</title>
  <style>
    #footer {
      position: fixed;
      padding: 0px 0px 0px 0px;
      bottom: 0;
      width: 100%;
      height: 150px;
    }
  </style>
  <script src="https://kit.fontawesome.com/3e3aefa8b5.js" crossorigin="anonymous"></script>
</head>

<body background="https://listenx.com.br/blog/wp-content/uploads/2020/08/divulgar-o-supermercado.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <div style="background-color:#B0C4DE">
    <?php include('navbar.php'); ?>
    <div class="container mt-4 pb-3">
      <h1 class="mx-5" style="color:black">Mercadinho Bem Bão</h1>
      <h2 class="mx-5" style="color:black">Temos tudo o que você precisa de bem e de bão.</h2>
    </div>
    <div class="container mt-4 pb-3">
      <h1 class="mx-5" style="color:red">Essa página é apenas um esboço sem funcionalidade criado para um maior
        realismo. Releve-a</h1>
    </div>
    <?php include('Footer2.php'); ?>
</body>

</html>