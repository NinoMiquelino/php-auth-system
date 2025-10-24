<?php
require_once 'AuthManager.php';

// Cria a instância do gerenciador de autenticação (inicia a sessão)
$authManager = new AuthManager();

// --- Lógica de Login ---
if (isset($_POST['action']) && $_POST['action'] === 'login') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($authManager->login($username, $password)) {
        // Redireciona para a área restrita
        header('Location: ../public/restricted.php'); 
        exit;
    } else {
        // Falha no login: Redireciona de volta com uma mensagem de erro
        header('Location: ../public/login.html?error=1'); 
        exit;
    }
}

// --- Lógica de Logout ---
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $authManager->logout();
    // Redireciona para a página de login
    header('Location: ../public/login.html?logged_out=1'); 
    exit;
}

// Se o script for acessado sem ação específica, redireciona
header('Location: ../public/login.html');
exit;
