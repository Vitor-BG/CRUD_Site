<?php require_once('verificacao.php'); ?>
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');
if (isset($_POST['cadastrar'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $sexo = $_POST['sexo'];
  $diretorio = "fotos/";

    $arquivoLocal = $_FILES['foto']['tmp_name'];
    $arquivoDestino = $diretorio . $_FILES['foto']['name'];

    if (!move_uploaded_file($arquivoLocal, $arquivoDestino)) {
      echo "Erro ao enviar arquivo.";
    }

  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
  $sql = "insert into usuario (nome, email, senha, sexo, foto) 
                values ('{$nome}', '{$email}', '{$senha}','{$sexo}', '{$_FILES['foto']['name']}')";

  mysqli_query($conexao, $sql);
  mysqli_close($conexao);
  $sucesso = "Registro inserido com sucesso. Clique para ver a lista de registros. ";
}
if (isset($_POST['voltar'])) {
  $retorno = "Tem certeza que deseja voltar? Seus dados serão perdidos.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro Usuário</title>
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
          CADASTRO DE USUÁRIO
        </h2>
      </div>
    </div>
  </div>


  <form class="pt-3" method="post" style="color:black"  enctype="multipart/form-data">
    <div class="container">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control" id="nome" placeholder="João Silva">
      </div>
      <div class="mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <input name="sexo" type="text" class="form-control" id="sexo" placeholder="Homem">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="email" placeholder="nome@email.com">
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha super forte">
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
            echo "<option value='{$id}'>{$descricao}</option>";
          }
          ?>
        </select>
      </div>
      <br>

      <div>
        <button name="cadastrar" type="submit" class="btn btn-primary btn-lg">Salvar<i
            class="fa-solid fa-floppy-disk ps-2"></i></button>
        <button name="voltar" type="submit" class="btn btn-danger btn-lg">Voltar<i
            class="fa-solid fa-rotate-left ps-2"></i></button>
      </div>
  </form>
  </div>

  <?php include('Footer2.php'); ?>
</body>

</html>