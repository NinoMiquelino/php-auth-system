<?php

class AuthManager {
    private PDO $pdo;

    public function __construct() {
        // Inicia a sessão na classe
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Configura a conexão PDO (reutiliza a lógica do projeto anterior)
        $dbFile = __DIR__ . '/users.sqlite';
        try {
            $this->pdo = new PDO("sqlite:" . $dbFile);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Falha de conexão com o banco de dados de usuários.");
        }
    }

    /**
     * Tenta autenticar o usuário.
     * @return bool True se a autenticação for bem-sucedida.
     */
    public function login(string $username, string $password): bool {
        
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false; // Usuário não encontrado
        }

        // CRUCIAL: Verifica a senha hasheada
        if (password_verify($password, $user['password_hash'])) {
            // Sucesso: Define as variáveis de sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['logged_in'] = true;
            return true;
        }

        return false; // Senha incorreta
    }

    /**
     * Encerra a sessão do usuário.
     */
    public function logout(): void {
        session_unset();     // Remove todas as variáveis de sessão
        session_destroy();   // Destrói a sessão
        // Também pode remover o cookie de sessão para garantir
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }

    /**
     * Verifica se o usuário está logado.
     * @return bool
     */
    public function isLoggedIn(): bool {
        return ($_SESSION['logged_in'] ?? false) === true;
    }
    
    /**
     * Retorna o nome de usuário atual, se logado.
     * @return string|null
     */
     public function getUsername(): ?string {
         return $_SESSION['username'] ?? null;
     }
}
