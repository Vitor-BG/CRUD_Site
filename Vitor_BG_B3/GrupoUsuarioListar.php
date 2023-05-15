<?php require_once('verificacao.php'); ?>
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');

if (isset($_POST['id'])) {
  $sql = "delete from grupousuario where id = " . $_POST['id'];
  mysqli_query($conexao, $sql);
  $mensagem = " Registro excluído com sucesso.";
}

$sql = "select * from grupousuario";
$resultado = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($resultado);
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Grupo de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3e3aefa8b5.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:#B0C4DE">
  <?php include('navbar.php'); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <div class="container pt-4" style="color:black">


    <div class="card" style="background-color:#778899">
      <div class="card-body">
        <h1 class="card-title pb-2">Listagem de Grupos de Usuários Cadastrados</h1>
        <a href="GrupoUsuarioCadastrar.php" class="pe-2"><button type="button" class="btn btn-primary"><i
              class="fa-solid fa-circle-plus pe-1"></i> Novo</button></a>
        <a href="HomePage.php"><button type="button" class="btn btn-primary"><i class="fa-solid fa-house"></i>
            Início</button></a>
        <p class="mt-3">
          <?= $qtd ?> registros foram encontrados.
        </p>
      </div>
    </div>

    <?php if (isset($mensagem)): ?>
      <div class="alert alert-success mt-4 " role="alert">
        <?= $mensagem ?>
      </div>
    <?php endif; ?>

    <table class="table mt-4 mb-4" style="color:black">
      <thead>
        <tr style="background-color:#778899">
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
          ?>
          <tr>
            <td>
              <?= $linha['id'] ?>
            </td>
            <td>
              <?= $linha['nome'] ?>
            </td>
            <td class="d-flex">
              <form action="GrupoUsuarioEditar.php" method="post">
                <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                <button name="editar" value="editar" type="submit" class="btn btn-success"><i
                    class="fa-regular fa-pen-to-square"></i> Editar</button>
              </form>
              <form action="GrupoUsuarioListar.php" method="post" onsubmit="return confirm('Deseja realmente excluir?')">
                <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                <button name="excluir" value="excluir" type="submit" class="btn btn-danger ms-1"><i
                    class="fa-solid fa-trash-can"></i> Excluir</button>
              </form>
            </td>
          </tr>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
    <a href="GrupoUsuarioListar.php"><button name="topo" value="Voltar ao Topo" type="submit"
        class="btn btn-warning mb-3"><i class="fa-solid fa-arrow-up"></i> Voltar ao Topo</button></a>
  </div>
  <?php include('Footer.php'); ?>
</body>

</html>