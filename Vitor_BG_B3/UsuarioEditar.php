<?php require_once('verificacao.php'); ?>
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');
$id = $_POST['id'];
if (isset($_POST['alterar'])) {
  $diretorio = "fotos/";
  $arquivoLocal = $_FILES['foto']['tmp_name'];
  $arquivoDestino = $diretorio . $_FILES['foto']['name'];
  if (!move_uploaded_file($arquivoLocal, $arquivoDestino)) {
    echo "Erro ao enviar arquivo.";
  }
  $nomeArquivo = $_FILES['foto']['name'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $sexo = $_POST['sexo'];

  $sql = "update usuario 
            set nome = '{$nome}', 
            email = '{$email}',
            sexo = '{$sexo}',
            foto = '{$nomeArquivo}'
          where id = {$id}";
  mysqli_query($conexao, $sql);
  $sucesso = "Registro alterado com sucesso. Clique para ver a lista de registros. ";
}

if (isset($_POST['voltar'])) {
  $retorno = "Tem certeza que deseja voltar? Suas alterações serão perdidas.";
}

$sql = "select * from usuario where id = {$id}";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edição de Usuário</title>
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
          EDIÇÃO DE USUÁRIO
        </h2>
      </div>
    </div>
  </div>
  <form class="pt-3 pb-5 mb-5" method="post" style="color:black" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
    <div class="container">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control" id="nome" value="<?= $linha['nome'] ?>">
      </div>
      <div class="mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <input name="sexo" type="text" class="form-control" id="sexo" placeholder="Homem" value="<?= $linha['sexo'] ?>">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email" value="<?= $linha['email'] ?>">
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto do Ususário</label>
        <input name="foto" type="file" class="form-control" id="foto">
      </div>
      <div>
        <label for="id_grupousuario"> Grupo de Usuário</label>
        <select name="id_grupousuario" id="id_grupousuario" class="form-control">
          <option value=""> Selecione... </option>
          <?php
          $sql = "select * from grupousuario order by nome";
          $resultado = mysqli_query($conexao, $sql);

          while ($linha = mysqli_fetch_array($resultado)) {
            $id = $linha['id'];
            $descricao = $linha['nome'];

            $selecionado = "";
            if ($id == $linha['grupousuario_id']) {
              $selecionado = "selected";
            }
            echo "<option value='{$id}'>{$descricao}</option>";
          }
          ?>
        </select>
      </div>
      <br>
      <button href="UsuarioListar.php" name="alterar" type="submit" class="btn btn-primary btn-lg">Alterar<i
          class="fa-solid fa-floppy-disk ps-2"></i></button>
      <button name="voltar" type="submit" class="btn btn-danger btn-lg">Voltar<i
          class="fa-solid fa-rotate-left ps-2"></i></button>

  </form>
  </div>
  <?php include('Footer2.php'); ?>
</body>

</html>