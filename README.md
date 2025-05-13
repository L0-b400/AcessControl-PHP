Sistema de Controle de Acesso em PHP
Sistema web desenvolvido em PHP com foco em controle de acesso, listagem de usuários, separação de ambientes (desenvolvimento e produção) e conexão segura com banco de dados via PDO.

Tecnologias e Ferramentas
PHP 8.3 Nativo: 
  Linguagem principal usada para processar requisições, autenticação, controle de sessões e acesso ao banco de dados.

PDO (PHP Data Objects):
  Biblioteca para interação segura com bancos de dados, usando prepared statements para proteger contra SQL Injection.
  
Composer: 
  Gerenciador de dependências para PHP. Comando típico usado: composer require vlucas/phpdotenv.
  
dotenv (vlucas/phpdotenv):
  Biblioteca para carregar variáveis de ambiente a partir de arquivos .env. Usada para configurar o ambiente de desenvolvimento e produção (credenciais,     
  configurações da aplicação, etc.).

MySQL / MariaDB:
  Banco de dados relacional utilizado, acessado de forma segura via PDO.

HTML + PHP + CSS + JS:
  Tecnologias utilizadas para a geração de páginas dinâmicas, com listagens, mensagens de erro e redirecionamentos via PHP.

PHP Sessions:
  Usado para controlar a autenticação dos usuários e manter dados persistentes durante a navegação.

Segurança Aplicada
- Variáveis de ambiente: Credenciais e configurações sensíveis são armazenadas em variáveis de ambiente, mantidas em arquivos .env.
- Prepared statements com PDO: Protege contra ataques de SQL Injection.
- Verificação de sessão: Protege as rotas e páginas com base no status de autenticação e tipo de usuário.
- Separação de ambientes: Configuração para diferentes ambientes (desenvolvimento e produção), evitando erros de configuração em produção.

Funcionalidades
- Login com controle de sessão: Permite autenticação de usuários e controle de sessão durante a navegação.
- Painel com listagem de usuários: Interface para visualização dos usuários cadastrados.
- Redirecionamento e mensagens de erro: Redirecionamento automático e exibição de mensagens de erro quando necessário.
- Separação de ambientes (dev/prod): Configuração separada para os ambientes de desenvolvimento e produção, garantindo que as credenciais e as configurações sejam adequadas para cada ambiente.
- Conexão segura via PDO com tratamento de exceções: Conexão ao banco de dados de forma segura, com tratamento de erros.

Boas Práticas Aplicadas:
- Uso de variáveis de ambiente para proteger credenciais sensíveis.
- Separação de responsabilidades: Por exemplo, a conexão com o banco de dados está isolada em config/db.php.
- PDO com tratamento de exceções: A conexão com o banco de dados usa prepared statements para prevenir ataques de SQL Injection.
- Operador de coalescência nula ??: Usado para definir valores padrão em variáveis.
- Controle de acesso por sessão: O acesso a determinadas rotas é restrito com base no tipo de usuário.

Ideias Futuras de Melhorias por Área:

SEGURANÇA:
1-  Melhoria:
      Hashear senhas com password_hash() (se não feito) 
    Benefício: 
      Segurança robusta contra roubo de senhas.
      
2-  Melhoria:
      Forçar HTTPS (SSL)
    Benefício:
      Criptografa todo o tráfego com o sistema.
      
3-  Melhoria:
      Validação de entrada com Respect\Validation ou Valitron
    Benefício:
      Evita ataques de XSS e SQLi.
      
4-  Melhoria:
      Rate limiting e bloqueio de IPs
    Benefício:
      Evita ataques de força bruta (BrutForce).
      
5-  Melhoria: 
      MFA - Dois fatores de autenticação (2FA)
    Benefício:
      Camada extra de segurança no login.
      
ARQUITETURA E CÓDIGO
1-  Melhoria: 
      Estrutura MVC (Model-View-Controller)	
    Benefício:  
      Separação clara entre dados, lógica e visual.
      
2-  Melhoria: 
      Organizar o projeto em camadas (services, controllers, models, views) 
    Benefício: 
      Escalabilidade e manutenção facilitadas.
      
3-  Melhoria: 
      Injeção de dependência (ex: PHP-DI)	
    Benefício:
      Testes e modularidade mais fáceis.
      
4-  Melhoria:
      Utilizar namespaces corretamente	
    Benefício:
      Evita conflitos e melhora a legibilidade.

FUNCIONALIDADES
1-  Melhoria:
      Sistema de permissões com níveis customizados.
    Benefício:
      Maior controle e flexibilidade.

2-  Melhoria:
      Histórico de alterações (log por credencial).
    Benefício:
      Auditoria mais detalhada.

3-  Melhoria:
      Busca avançada e filtros (por categoria, usuário, data).
    Benefício:
      Melhor usabilidade em bases grandes.

4-  Melhoria:
      Backup automático do banco de dados.
    Benefício:
      Segurança contra perda de dados.
      
5-  Melhoria:
      Editor rico de texto nas observações (ex: Trix ou TinyMCE).
    Benefício:
      Melhor anotação de credenciais.
      
6-  Melhoria:
      Notificações por email (ex: alteração de senha, novos acessos).
    Benefício:
      Transparência e controle.

INTERFACE / USABILIDADE - UI/UX
1-  Melhoria:
      Design responsivo 100% com Tailwind ou Bootstrap 5.
    Benefício:
      Interface moderna e mobile-friendly.

2-   Melhoria:
      Feedback visual nas ações (ex: Toasts com sucesso/erro).
    Benefício:
      Melhor experiência do usuário.

3-  Melhoria:
      Páginas com carregamento assíncrono (AJAX).
    Benefício:
      Mais fluidez sem recarregar páginas.

4-  Melhoria:
      Modo escuro automático por horário/sistema.
    Benefício:
      Experiência personalizada.




Instalação
1- git clone https://github.com/L0-b400/AcessControl-PHP.git
2- composer install
3- Crie o arquivo .env com base no modelo abaixo (arquivo separado por "()" somente para exemplificar):
 .env:(
    APP_ENV=dev
  
    DB_HOST=000.0.0.0
    DB_USER=root
    DB_PASS=
    DB_NAME=sec_users
    ###
    APP_ENV=prod
    DB_HOST_PROD=seu_host_prod
    DB_USER_PROD=seu_usuario_prod
    DB_PASS_PROD=sua_senha_prod
    DB_NAME_PROD=seu_banco_prod
  )
4- Configure o banco de dados e importe o sec_users.sql
