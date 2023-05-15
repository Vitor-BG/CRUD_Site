<?php require_once('verificacao.php'); ?>
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');
$email = isset($_POST['email']) ? $_POST['email'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$id_grupousuario = isset($_POST['id_grupousuario']) ? $_POST['id_grupousuario'] : '';
if (isset($_POST['id'])) {
  $sql = "delete from usuario where id = " . $_POST['id'];
  mysqli_query($conexao, $sql);
  $mensagem = " Registro excluído com sucesso.";
}

$where = "";
if ($nome != '') {
  $where .= " and usuario.nome like '%" . $nome . "%' ";
}
if ($email != '') {
  $where .= " and email = '" . $email . "' ";
}
if ($id_grupousuario != null) {
  $where .= " and usuario.grupousuario_id = '" . $id_grupousuario . "' ";
}
$sql = "select usuario.*, grupousuario.nome as grupousuario_nome 
          from usuario 
        left join grupousuario on grupousuario.id = usuario.grupousuario_id
        where 1 = 1 " . $where;
$resultado = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($resultado);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Usuários</title>
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
        <h1 class="card-title pb-2">Listagem de Usuários Cadastrados</h1>
        <a href="UsuarioCadastrar.php" class="pe-2"><button type="button" class="btn btn-primary"><i
              class="fa-solid fa-circle-plus pe-1"></i> Novo</button></a>
        <a href="HomePage.php"><button type="button" class="btn btn-primary"><i class="fa-solid fa-house"></i>
            Início</button></a>
        <p class="mt-3">
          <?= $qtd ?> registros foram encontrados.
        </p>
      </div>
    </div>

    <div class="card mt-4" style="background-color:#98AFBA">
      <form class="pt-3" method="post" style="color:black">
        <div class="container">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" placeholder="João Silva">
          </div>
          <div class="mb-1">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="nome@email.com">
          </div>
          <div class="mb-1 mt-3">
            <label for="id_grupousuario"> Grupo de Usuário</label>
            <select name="id_grupousuario" id="id_grupousuario" class="form-control">
              <option value=""> Selecione... </option>
              <?php
              $sql = "select * from grupousuario order by nome";
              $resultadoGrupo = mysqli_query($conexao, $sql);

              while ($linhaGrupo = mysqli_fetch_array($resultadoGrupo)) {
                $id = $linhaGrupo['id'];
                $descricao = $linhaGrupo['nome'];
                echo "<option value='{$id}'>{$descricao}</option>";
              }
              ?>
            </select>
          </div>
          <br>
          <div>
            <button name="cadastrar" type="submit" class="btn btn-primary btn-lg mb-3">Filtrar<i
                class="fa-sharp fa-solid fa-magnifying-glass ps-2"></i></button>
          </div>
        </div>
      </form>
    </div>

    <?php if (isset($mensagem)): ?>
      <div class="alert alert-success mt-4 " role="alert">
        <?= $mensagem ?>
      </div>
    <?php endif; ?>

    <table class="table mt-4" style="color:black">
      <thead>
        <tr style="background-color:#778899">
        <th scope="col">Foto</th>
        <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Grupo de Usuário</th>
          <th scope="col">Sexo</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
          ?>
          <tr>
          <td>
          <?php if (empty($linha['foto'])):
          ?>
           <img src="fotos/Default.jpg" width="50" height="50">
          <?php else: ?>  
          <img src="fotos/<?= $linha['foto'] ?>" width="50" height="50">
          <?php endif ?>
          </td>
            <td>
              <?= $linha['id'] ?>
            </td>
            <td>
              <?= $linha['nome'] ?>
            </td>
            <td>
              <?= $linha['email'] ?>
            </td>
            <td>
              <?= $linha['grupousuario_nome'] ?>
            </td>
            <td>
              <?= $linha['sexo'] ?>
            </td>
            <td class="d-flex">
              <form action="UsuarioEditar.php" method="post">
                <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                <button name="editar" value="editar" type="submit" class="btn btn-success"><i
                    class="fa-regular fa-pen-to-square"></i> Editar</button>
              </form>
              <form action="UsuarioListar.php" method="post" onsubmit="return confirm('Deseja realmente excluir?')">
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
    <a href="UsuarioListar.php"><button name="topo" value="Voltar ao Topo" type="submit" class="btn btn-warning mb-3"><i
          class="fa-solid fa-arrow-up"></i> Voltar ao Topo</button></a>
  </div>
  <?php include('Footer.php'); ?>
</body>

</html>