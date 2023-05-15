<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$nome = "Logar";
if (isset($_SESSION['nome'])) {
    $nome = $_SESSION['nome'];
    $conexaof = mysqli_connect('127.0.0.1', 'root', '', 'vitor_bg');
    $sqlf = "select foto from usuario where id =" . $_SESSION['id'];
    $resultadof = mysqli_query($conexaof, $sqlf);
    $linhaf = mysqli_fetch_array($resultadof);
mysqli_close($conexaof);
}

if (isset($_POST['sair'])) {

    session_destroy();
    $mensagem = "Você foi deslogado com sucesso!";
    header("location: HomePage.php?mensagem={$mensagem}");
}
// var_dump($_SESSION)
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3e3aefa8b5.js" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark pe-5">
    <div class="container-fluid">
        <div class="container-fluid me-5">
            <a class="navbar-brand" href="HomePage.php"><i class="fa-solid fa-house me-2"></i> Mercadinho Bem Bão</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="container-fluid ms-5">
            <div class="collapse navbar-collapse ms-5 pe-3" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Usuários
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="UsuarioCadastrar.php"><i
                                        class="fa-solid fa-pencil me-1"></i> Cadastrar Novo Usuário</a></li>
                            <li><a class="dropdown-item" href="UsuarioListar.php"><i class="fa-solid fa-list me-1"></i>
                                    Listar Usuários</a></li>
                            <li><a class="dropdown-item" href="UsuarioLogar.php"><i
                                        class="fa-solid fa-right-to-bracket me-1"></i> Logar Usuário</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="collapse navbar-collapse ms-5 pe-3" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Grupo de usuários
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="GrupoUsuarioCadastrar.php"><i
                                            class="fa-solid fa-pencil me-1"></i> Cadastrar Novo Grupo de Usuários</a>
                                </li>
                                <li><a class="dropdown-item" href="GrupoUsuarioListar.php"><i
                                            class="fa-solid fa-list me-1"></i> Listar Grupos de Usuários</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse ms-5 pe-3" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Clientes
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="ClienteCadastrar.php"><i
                                                class="fa-solid fa-pencil me-1"></i> Cadastrar Novo Cliente</a></li>
                                    <li><a class="dropdown-item" href="ClienteListar.php"><i
                                                class="fa-solid fa-list me-1"></i> Listar Clientes</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="collapse navbar-collapse ms-5 pe-3" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Produtos
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="ProdutoCadastrar.php"><i
                                                    class="fa-solid fa-pencil me-1"></i> Cadastrar Produto</a></li>
                                        <li><a class="dropdown-item" href="ProdutoListar.php"><i
                                                    class="fa-solid fa-list me-1"></i> Listar Produtos</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="collapse navbar-collapse ms-5 pe-3" id="navbarNavDarkDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Categoria de Produtos
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li><a class="dropdown-item" href="categoriaProdutoCadastrar.php"><i
                                                        class="fa-solid fa-pencil me-1"></i> Cadastrar nova Categoria de
                                                    Produto</a></li>
                                            <li><a class="dropdown-item" href="categoriaProdutoListar.php"><i
                                                        class="fa-solid fa-list me-1"></i> Listar Categorias de
                                                    Produtos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="collapse navbar-collapse ms-5 pe-3" id="navbarNavDarkDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Estados
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li><a class="dropdown-item" href="estadoCadastrar.php"><i
                                                            class="fa-solid fa-pencil me-1"></i> Cadastrar Novo
                                                        Estado</a></li>
                                                <li><a class="dropdown-item" href="estadoListar.php"><i
                                                            class="fa-solid fa-list me-1"></i> Listar Estados</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <a class="navbar-brand ms-5 ms-3" <?php if ($nome == "Logar"): ?> href="UsuarioLogar.php"<?php endif; ?>>        
                                    <?php if ($nome == "Logar"):?> <i class="fa-solid fa-person me-2"></i> <?php endif; ?>
                                     <?php if ($nome == "Logar"): echo $nome;?><?php else: ?>
                                        <?php if (!$linhaf['foto']):?> <img class= "rounded-circle me-3" src="fotos/Default.jpg" width="50" height="50"></i> <?php endif; ?>
                                            <?php if ($linhaf['foto']):?> <img class= "rounded-circle me-3" src="fotos/<?= $linhaf['foto'] ?>" width="50" height="50"></i> <?php endif; ?>
                                        <?php echo $nome; ?>
                                        <?php endif; ?>
                                        </a>

                                <button class="navbar-toggler ms-5 ms-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <a name="sair" id="sair" class="navbar-brand ms-5" href="Sair.php"><i
                                        class="fa-sharp fa-solid fa-door-open me-2"></i></i> Sair</a>
                                <button name="sair" id="sair" class="navbar-toggler" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
                                    aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
</nav>