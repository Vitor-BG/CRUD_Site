<?php require_once('verificacao.php'); ?>
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');
if (isset($_POST['cadastrar'])) {

  $nome = $_POST['nome'];
  $cpfcnpj = $_POST['cpfcnpj'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $endereco = $_POST['endereco'];
  $numero = $_POST['numero'];
  $cidade = $_POST['cidade'];
  $id_estado = $_POST['id_estado'];
  $status = $_POST['status'];
  $sql = "insert into cliente (nome, cpfcnpj, email, telefone, endereco, numero, cidade, id_estado, status) 
                values ('{$nome}', '{$cpfcnpj}', '{$email}', '{$telefone}', '{$endereco}', '{$numero}', '{$cidade}', '{$id_estado}', '{$status}')";

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
  <title>Cadastro Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3e3aefa8b5.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:#B0C4DE">
  <?php include('navbar.php'); ?>


  <div class="container pt-3">
    <?php if (isset($sucesso)): ?>
      <div class="alert alert-success p-3" role="alert">
        <?= $sucesso ?><a href="ClienteListar.php"><i class="fa-solid fa-list"></i></a>
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
          CADASTRO DE CLIENTE
        </h2>
      </div>
    </div>
  </div>
  <form class="pt-3" method="post" style="color:black">
    <div class="container">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control" id="nome" placeholder="João da Silva">
      </div>
      <div class="mb-3">
        <label for="cpfcnpj" class="form-label">CPF/CNPJ</label>
        <input name="cpfcnpj" type="text" class="form-control" id="cpfcnpj" placeholder="000.000.000-00">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="nome@email.com">
      </div>
      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input name="telefone" type="text" class="form-control" id="telefone" placeholder="(44) 99999-9999">
      </div>
      <div class="mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Rua das Flores, Zona 5">
      </div>
      <div class="mb-3">
        <label for="numero" class="form-label">Número</label>
        <input name="numero" type="text" class="form-control" id="numero" placeholder="123">
      </div>
      <div class="mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Umuarama">
      </div>
      <div class="mb-3">
        <label for="id_estado"> Estado</label>
        <select name="id_estado" id="id_estado" class="form-control">
          <option value=""> Selecione... </option>
          <?php
          $sql = "select * from estado order by nome";
          $resultado = mysqli_query($conexao, $sql);

          while ($linha = mysqli_fetch_array($resultado)) {
            $id = $linha['id'];
            $descricao = $linha['nome'];
            echo "<option value='{$id}'>{$descricao}</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input name="status" type="text" class="form-control" id="status"
          placeholder="S ou N (S para ativo, N para inativo)">
      </div>
      <br>
      <button name="cadastrar" type="submit" class="btn btn-primary btn-lg">Salvar<i
          class="fa-solid fa-floppy-disk ps-2"></i></button>
      <button name="voltar" type="submit" class="btn btn-danger btn-lg">Voltar<i
          class="fa-solid fa-rotate-left ps-2"></i></button>
  </form>
  </div>
  <br>
  <?php include('Footer.php'); ?>
</body>

</html>