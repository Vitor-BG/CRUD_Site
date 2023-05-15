<?php
if (isset($_POST['logar'])) {

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "select * 
              from usuario
             where email = '{$email}'
               and senha = '{$senha}'";
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');
  $resultado = mysqli_query($conexao, $sql);

  $numLinhas = mysqli_num_rows($resultado);
  if ($numLinhas > 0) {
    $linha = mysqli_fetch_array($resultado);
    session_start();
    $_SESSION['id'] = $linha['id'];
    $_SESSION['nome'] = $linha['nome'];
    $_SESSION['email'] = $linha['email'];
    header("location: HomePage.php");
  } else {
    $mensagem = "Usuário/Senha inválidos.";
    header("location: HomePage.php?mensagem={$mensagem}");
  }

}
if (isset($_POST['voltar'])) {
  $retorno = "Tem certeza que deseja voltar?";

}
if (isset($_POST['sair'])) {
  require_once('Sair.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3e3aefa8b5.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:#B0C4DE">
  <?php include('navbar.php'); ?>
  <div class="container pt-3">
    <?php if (isset($sucesso)): ?>
      <div class="alert alert-success p-3" role="alert">
        <?= $sucesso ?><a href="UsuarioListar.php"><i class="fa-solid fa-list"></i></a>
      </div>
    <?php endif; ?>
  </div>
  <div class="container pt-3">
    <?php if (isset($retorno)): ?>
      <div class="alert alert-danger p-3" role="alert">
        <?= $retorno ?>
        <a href="HomePage.php" class="alert-link">VOLTAR MESMO ASSIM</a>
      </div>
    <?php endif; ?>
  </div>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <div class="container pt-3" style="color:black">
    <div class="card" style="background-color:#778899">
      <div class="card-body">
        <h2 class="card-title">
          Login
        </h2>
      </div>
    </div>
  </div>
  <form class="pt-3" method="post" style="color:black">
    <div class="container">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="email" placeholder="seuemail@email.com">
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input name="senha" type="password" class="form-control" id="senha" placeholder="SuaSenha">
      </div>
      <br>
      <button name="logar" type="submit" class="btn btn-primary btn-lg">Entrar</button>
      <button name="voltar" type="submit" class="btn btn-danger btn-lg">Voltar<i
          class="fa-solid fa-rotate-left ps-2"></i></button>
    </div>
  </form>
  </div>
  <?php include('Footer2.php'); ?>
</body>

</html>