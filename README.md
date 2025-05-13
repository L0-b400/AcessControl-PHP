Sistema web desenvolvido em PHP com foco em controle de acesso, listagem de usuários, 
separação de ambientes (desenvolvimento e produção) e conexão segura com banco de dados via PDO.

Tecnologias e Ferramentas:

  PHP - Como linguagem de programação (8.3 Nativo):
    Linguagem principal usada para processar requisições, autenticação, controle de sessões e acesso ao banco de dados.
    
  PDO - (PHP Data Objects):
    Lib do PHP para interação segura com bancos de dados (usando prepared statements).

  Composer - PHP:
    Gerenciador de dependências para PHP. Comando típico usado (composer require vlucas/phpdotenv)
    
  Gerenciamento de Ambiente - dotenv (vlucas/phpdotenv):
    Biblioteca usada para carregar variáveis de ambiente a partir de arquivos .env.
    Usado para definir configurações específicas de ambiente (dev/prod), como credenciais de banco de dados e configuração da aplicação.
    
  Banco de Dados - MySQL / MariaDB:
    Banco de dados relacional, acessado via PDO com credenciais definidas em .env.
    
  Front-end (indiretamente mencionado):
    HTML + PHP + CSS + JS
    Geração de páginas dinâmicas com mensagens, listagens e redirecionamentos via PHP.

   Gerenciamento de Sessões - PHP:
    PHP Sessions (session_start())
    Utilizado para controlar autenticação de usuários e manter dados persistentes durante a navegação.

  Controle de Acesso - PHP:
    Validação de Sessão
    Proteção de rotas com verificação do tipo de usuário via $_SESSION['usuario_tipo'].

Boas práticas aplicadas ate o momento:
  - Uso de .env para proteger credenciais.
  - Separação de responsabilidades (ex: config/db.php só para conexão).
  - PDO com tratamento de exceções.
  - Operador de coalescência nula ?? para valores padrão.
  - Controle de acesso por sessão.

Funcionalidades:
  - Login com controle de sessão
  - Painel com listagem de usuários
  - Redirecionamento e mensagens de erro
  - Separação de ambientes (dev/prod)
  - Conexão segura via PDO com tratamento de exceções

Segurança aplicada:
  - Uso de variáveis de ambiente para esconder credenciais
  - Prepared statements com PDO
  - Verificação de sessão para proteger rotas
  - Separação de ambientes para evitar erros em produção

Instalação:

  1- git clone https://github.com/seu-usuario/seu-projeto.git
  2- composer install
  3- Crie o arquivo .env com base no modelo acima.
  4- Configure o banco de dados MySQL - Importe o sec_users.sql

Exemplo de .env para a etapa numero 3:
  APP_ENV=dev
  
  # Ambiente de Desenvolvimento
  DB_HOST=127.0.0.1
  DB_USER=root
  DB_PASS=
  DB_NAME=sec_users
  
  # Ambiente de Produção
  DB_HOST_PROD=seu_host_prod
  DB_USER_PROD=seu_usuario_prod
  DB_PASS_PROD=sua_senha_prod
  DB_NAME_PROD=seu_banco_prod




