<?php
//Faz logout do sistema
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    session_unset();
    session_destroy();
    
    $mensagem = "Você foi deslogado com sucesso!";
    header("location: HomePage.php?mensagem={$mensagem}");
}
?>