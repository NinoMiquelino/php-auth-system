<?php
// CRUCIAL: Este script DEVE ser PHP para verificar a sessão.
require_once __DIR__ . '/../src/AuthManager.php';

$authManager = new AuthManager();

// 1. Verifica se o usuário está logado
if (!$authManager->isLoggedIn()) {
    // 2. Se não estiver logado, redireciona para a página de login
    header('Location: login.html?unauthorized=1'); 
    exit;
}

// 3. Se estiver logado, continua a execução e obtém o nome de usuário
$username = $authManager->getUsername();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: ui-sans-serif, system-ui; } </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-3xl bg-white p-10 rounded-xl shadow-2xl text-center">
        <h1 class="text-4xl font-extrabold text-green-700 mb-4">Bem-vindo à Área Restrita!</h1>
        
        <p class="text-xl text-gray-600 mb-8">
            Você está logado como: <span class="font-semibold text-indigo-600"><?php echo htmlspecialchars($username); ?></span>
        </p>
        
        <div class="bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-8" role="alert">
            <p class="font-bold">Segurança:</p>
            <p>Seu acesso foi validado pelo PHP usando <code class="font-mono">session_start()</code> e verificação de senha com <code class="font-mono">password_verify()</code>.</p>
        </div>
        
        <a href="../src/app.php?action=logout" 
           class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg">
            Sair (Logout)
        </a>
        
        <p class="mt-6 text-sm text-gray-500">Se você tentar acessar esta página diretamente sem login, será redirecionado.</p>
    </div>

</body>
</html>
