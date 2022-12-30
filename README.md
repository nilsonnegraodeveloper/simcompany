# Instruções para rodar o Projeto

Clonar o projeto:<br>
**git clone https://github.com/nilsonnegraodeveloper/simcompany.git && cd simcompany**

Copiar o .env.example como nosso .env principal:<br>
**cp .env.example .env**

Usar este comando para construir e executar os containers:<br>
**docker-compose up --build -d**

Dar permissão de escrita na pasta storage:<br>
**chmod 777 -R storage**

Rodar o container em modo bash:<br>
**docker exec -it Laravel_php /bin/sh**

Instalar as dependências do aplicativo:<br>
**composer install ou composer update caso dê erro**

Gerar a chave do aplicativo:<br>
**php artisan key:generate**

Rodar as migrations:<br>
**php artisan migrate**

Popular o banco com dados para teste:<br>
**php artisan db:seed**

Para sair do modo bash:<br>
**digitar "exit" e dar enter**

Url da aplicação:<br>
**http://localhost:8000**

Usuário para logar:<br>
**Email: teste@teste.com**<br>
**Senha: 123456**

### Acessar o BD do container via PgAdmin:
Com o container rodando executar este comando dentro da pasta do projeto:<br>
**docker ps (copiar o CONTAINER ID da imagem postgres:12.3-alpine)**

Depois executar este comando para pegar o IP:<br>
**docker inspect CONTAINER_ID | grep IPAddress (substituir o "CONTAINER_ID" do comando pelo ID que foi copiado na etapa anterior)**

Copie o IP (IPAddress):<br>

Abra o PgAdmin:<br>
**Em Servers, clicar com botão direito, Register-> Server**<br>
**NAME: docker**<br>
**HOST: IPAddress (foi copiado na etapa anterior)**<br>
**PORT: 5432**<br>
**DATABASE: postgres**<br>
**USERNAME: postgres**<br>
**PASSWORD: (deixar em branco)**<br>

## SOBRE A ENTREGA:
**O que foi implementado:**
- Sistema para Cadastro de contas Bancárias;
- Autenticação no Sistema com validação de Senha(pelo menos uma letra maiúscula, uma letra minúscula, um número, um caracter especial (@#$%&*()_+=) e no mínimo 8 caracteres);
- Tela de Registro, uma vez registrado já loga automático no sistema;
- Dashboard com informações do total de contas, total de saques e depositos;
- Validação do CPF com Biblioteca Validator Docs - Brasil;
- Relatórios com dompdf sem filtro;
- Só é possivel encerrar uma conta com o saldo zerado;
- Na tela de Sacar no combo só é listado as contas que tem saldo maior que zero;
- Tela de Perfil para visualizar, editar os dados (não é possível editar o CPF) e ou trocar a senha;
- Máscaras de CPF e Monetária para os campos;
- DataTable para listar as contas do usuário;
- Possibilidade de filtrar uma conta (através do DataTable);
- Utilizado o Docker na aplicação;

**O que não foi implementado ou ficou em andamento:**
 - Relatórios por período;
 - Gráfico;
 - TDD.

**TECH STACK E DEPENDÊNCIAS:**
- PHP 8.0;
- DomPdf;
- Geekcom/validator-docs 3.7;
- Laravel 8.83.26;
- PostgreSQL;
- Composer 2.3.5;
- Template Bootstrap Gentelella Admin disponível em: https://colorlib.com/wp/free-bootstrap-admin-dashboard-templates/ e https://github.com/ColorlibHQ/gentelella; 
- Bootstrap 4; 
- HTML5; 
- CSS; 
- JavaScript; 
- Jquery - Plugins: DataTables, Mask e MaskMoney;

