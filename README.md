# Sistema de Gerenciamento de Leads

Este é um sistema de CRM desenvolvido em Laravel para gerenciamento de leads captados. O sistema inclui funcionalidades de front-end e back-end, integração com APIs e persistência de dados em um banco MySQL.

## Requisitos

### Front-End:
- Tela de login.
- Página de listagem de leads com operações de adicionar, listar, editar e excluir.

### Back-End:
- Utilização das ferramentas de autenticação do Laravel.
- Implementação de APIs para CRUD de leads.

### Persistência de Dados:
- Utilização de banco de dados MySQL.
- Modelagem das tabelas para representar as entidades.

### Segurança:
- Autenticação e autorização básicas.
- Armazenamento seguro de senhas com criptografia.

### Testes:
- Testes unitários para as principais funcionalidades.
- Testes de integração para garantir interações corretas.


## Como Executar o Projeto Localmente
1. Clone este repositório: `git clone https://gitlab.com/alexandrenoguez/Pixerama-CRM-laravel`
2. O docker deve estar instalado, configurado e com as permissões de conectar ao docker daemon socket.
3. Configure o arquivo `.env` com as credenciais do banco de dados se necessário.
4. Inicialize os containers: `docker-compose up -d`
5. Acessar o container com o comando `docker-compose exec app bash`
6. Rodar o comando `composer install` para baixar as dependências.
7. Rodar o comando `php artisan migrate` para criar as tabelas do banco.
8. Rode o comando `exit` para sair do container
9. Rodar o comando `npm i` para baixar as dependências.
10. Inicialize a aplicação: `npm run dev`
11. Após finalizar, a aplicação pode ser acessada em `http://localhost:8989`

# Notas
- Deve ter node 18+ instalado
- Deve ter docker instalado e configurado
- Composer não é necessário instalação, pode ser executado de dentro do container
- Para fins de facilitar a execução, irei subir meu .env para configuração das variáveis de ambiente.
- Este projeto foi originalmente enviado para o gitlab. Caso queira ver o andamento e nomenclatura usadas para o desenvolvimento verifique o repositório <a href="https://gitlab.com/alexandrenoguez/Pixerama-CRM-laravel/" target="_blank">Pixerama CRM Laravel</a>

## Tecnologias Utilizadas
- Laravel
- MySQL
- HTML
- CSS (Bootstrap)
- JavaScript (jQuery)

## Desafios futuros
- Adicionar camadas de service, repository e utilizar DTOs.
- Adicionar make:controller LeadApiController --api para uso de api rest.
- Adicionar novos testes unitários
- Melhoras formas de validar os dados das Request utilizando artisan make:resource e configurando antes de persistir no banco.
- Traduzir os erros dos validadores de formulário do template breeze

---

© Alexandre Noguez - 2024
