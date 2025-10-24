<?php
// ATENÇÃO: Execute este script UMA ÚNICA VEZ para criar o banco de dados.

$dbFile = __DIR__ . '/users.sqlite';

try {
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 1. Cria a tabela de usuários
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL
    )");
    
    // 2. Insere um usuário padrão
    $username = 'admin';
    $password = 'senha123';
    
    // CRUCIAL: HASHING da senha usando BCRYPT (padrão moderno e seguro)
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); 

    // Verifica se o usuário já existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    
    if ($stmt->fetchColumn() == 0) {
        $stmt = $pdo->prepare(
            "INSERT INTO users (username, password_hash) VALUES (:username, :hash)"
        );
        $stmt->execute([
            ':username' => $username,
            ':hash' => $passwordHash
        ]);
        
        echo "✅ Banco de dados 'users.sqlite' criado com sucesso.\n";
        echo "✅ Usuário de teste criado:\n";
        echo "   - Usuário: admin\n";
        echo "   - Senha:   senha123\n";
        
    } else {
        echo "ℹ️ Banco de dados e usuário já existem. Nenhuma alteração feita.\n";
    }

} catch (PDOException $e) {
    die("❌ Erro ao inicializar o banco de dados: " . $e->getMessage() . "\n");
}
