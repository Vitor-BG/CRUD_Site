<?php
//Verificar se o usuário está logado ou não para dar acesso à área restrita
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//Verifica se existe um usuário logado
if (!isset($_SESSION['id'])):
    // Redireciona para a página de login, pois não existe usuário ativo
    $msg = "Sessão expirada. Faça o login novamente para continuar.";
    header("location: UsuarioLogar.php?mensagem={$msg}");
endif;
?>