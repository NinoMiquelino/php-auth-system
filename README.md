## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

## 🔐 PHP Secure Login System (PDO, Hashing, Sessions)
​
![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/php-auth-system?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/php-auth-system?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/php-auth-system)

Este projeto é um exercício crucial focado nos pilares da Segurança e Autenticação em PHP: Hashing de senhas, gerenciamento de sessões e controle de acesso a páginas restritas.

Ele integra o uso de Programação Orientada a Objetos (POO) e PDO (PHP Data Objects) para garantir que todas as operações sejam seguras e robustas.

---

## 🔒 Recursos de Segurança e Tecnologia

- **Hashing Seguro (password_hash):** As senhas não são armazenadas em texto simples. Utilizamos a função `password_hash()` com o algoritmo BCRYPT (o padrão recomendado) para hashear a senha antes de salvar no banco.  
- **Verificação Segura (password_verify):** A função `password_verify()` é usada para comparar a senha fornecida pelo usuário com o hash armazenado, prevenindo ataques de timing e garantindo a segurança.  
- **Gerenciamento de Sessão:** O fluxo de login e logout utiliza as funções nativas de sessão do PHP (`session_start()`, `$_SESSION`, `session_destroy()`) para rastrear o estado do usuário.  
- **Controle de Acesso:** A página `restricted.php` verifica o status da sessão antes de renderizar qualquer conteúdo, redirecionando o usuário não autenticado.  
- **POO com PDO:** Uma classe `AuthManager` encapsula toda a lógica de segurança e comunicação com o banco de dados SQLite, mantendo o código limpo e organizado.
  
---

## 🧠 Tecnologias utilizadas

- **Backend:** PHP 7.4+ (POO, Sessões, password_hash/password_verify)  
- **Segurança:** PDO (Statements Preparados) para comunicação segura com o banco de dados  
- **Banco de Dados:** SQLite (arquivo único para armazenar usuários e hashes)  
- **Frontend:** HTML e Tailwind CSS

---

## 🧩 Estrutura do Projeto

```
php-auth-system/
├── login.html
├── restricted.php
├── AuthManager.php
├── init_db.php
├── app.php
└── users.sqlite
```
---

## ⚙️ Configuração e Instalação

​Pré-requisitos

​Um ambiente de servidor web com PHP.
​A extensão PDO SQLite precisa estar habilitada no seu php.ini.
​1. Estrutura e Banco de Dados

1. Crie a estrutura de pastas conforme o diagrama do projeto.

2. Crie o banco de dados e o usuário de teste:
​Abra o terminal na pasta raiz do projeto (/php-auth-system) e execute o script de inicialização:

```bash
php src/init_db.php
```

Este comando criará o arquivo src/users.sqlite e inserirá o usuário de teste com a senha hasheada.

3. Defina as permissões: Garanta que a pasta src/ (onde o users.sqlite será criado) tenha permissão de escrita para o usuário do servidor web (ex: chmod 777 src/).

2. Executar o Servidor
​Utilize o servidor embutido do PHP para testes (a partir da raiz do projeto):

```bash
php -S localhost:8001
```

- Acesse: A página de login inicial é http://localhost:8001/public/login.html.

1. ​Acesso Inicial: Abra login.html.

​2. Credenciais de Teste:
​Usuário: admin
​Senha: senha123

​3. Tentativa de Acesso Direto: Tente acessar http://localhost:8001/public/restricted.php diretamente. Você será redirecionado para a página de login com uma mensagem de "Acesso negado".

4. ​Login com Sucesso: Insira as credenciais de teste. O app.php verificará o hash, iniciará a sessão e redirecionará para a restricted.php.
​
5. Logout: Clique no botão "Sair (Logout)". O app.php destruirá a sessão e o redirecionará de volta para o login.html.

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/php-auth-system/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/php-auth-system/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---
