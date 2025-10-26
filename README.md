<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

# Todo List Application

Este projeto é uma **aplicação de lista de tarefas** desenvolvida com **Laravel**. A aplicação permite que os usuários gerenciem suas tarefas, com funcionalidades de **criação**, **edição**, **listagem** e **exclusão**.

## Funcionalidades Implementadas

A aplicação oferece as seguintes funcionalidades principais:

1. **Cadastro de Tarefas**: 
   - Cada tarefa possui **título**, **descrição** e **status** ("pendente" ou "concluída").
   - O título é obrigatório e não pode ultrapassar **255 caracteres**.

2. **Listagem de Tarefas**:
   - Exibe uma lista paginada de tarefas com a opção de **filtrar** por status (pendente ou concluída).

3. **Edição de Tarefas**:
   - Permite editar o título, descrição e status das tarefas.

4. **Exclusão de Tarefas**:
   - Permite excluir uma tarefa, sendo possível **restaurá-la** por meio de **soft delete**.

5. **Autenticação de Usuário**:
   - Utiliza o **Laravel Breeze** para autenticação, permitindo que apenas usuários autenticados possam gerenciar as tarefas.

## Caminhos das Rotas e Endpoints

A aplicação está configurada com as seguintes rotas principais:

### **Rotas de Tarefas**:
- **GET /tasks**: Exibe a lista de tarefas.
- **GET /tasks/create**: Exibe o formulário para criar uma nova tarefa.
- **POST /tasks**: Cria uma nova tarefa.
- **GET /tasks/{task}**: Exibe os detalhes de uma tarefa específica.
- **GET /tasks/{task}/edit**: Exibe o formulário para editar uma tarefa existente.
- **PUT/PATCH /tasks/{task}**: Atualiza uma tarefa existente.
- **DELETE /tasks/{task}**: Exclui uma tarefa (soft delete).

### **Rotas de Autenticação**:
- **GET /login**: Página de login.
- **POST /login**: Ação para efetuar o login.
- **GET /register**: Página de registro de usuário.
- **POST /register**: Ação para registrar um novo usuário.
- **GET /dashboard**: Página do dashboard, acessível apenas por usuários autenticados.
- **POST /logout**: Ação para sair da conta do usuário.

## Comandos Executados

Aqui estão os comandos utilizados para configurar a aplicação:

1. **Instalar o Laravel**:
    ```bash
    composer create-project --prefer-dist laravel/laravel todo-list-app
    ```

2. **Instalar o Laravel Breeze (Autenticação)**:
    ```bash
    php artisan breeze:install
    ```

3. **Instalar as Dependências e Compilar os Assets**:
    ```bash
    npm install
    npm run dev
    ```

4. **Criar Modelo e Migração para Tarefa**:
    ```bash
    php artisan make:model Task -m
    ```

5. **Criar Controlador de Tarefas**:
    ```bash
    php artisan make:controller TaskController --resource
    ```

6. **Executar as Migrações no Banco de Dados**:
    ```bash
    php artisan migrate
    ```

7. **Configuração de Rotas**:
    - As rotas RESTful para o controlador de tarefas foram configuradas com `Route::resource()` no arquivo `routes/web.php`.

8. **Iniciar o Servidor de Desenvolvimento**:
    ```bash
    php artisan serve
    ```

9. **Testar as Funcionalidades**:
    - A aplicação foi testada utilizando o navegador e o **Postman** para garantir o funcionamento das rotas e a autenticação.

## Estrutura do Projeto

Aqui está a estrutura de arquivos e diretórios do projeto:

```plaintext
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── TaskController.php
│   │   └── Requests/
│   │       └── TaskRequest.php
│   ├── Models/
│   │   └── Task.php
│   └── Providers/
├── database/
│   ├── migrations/
│   │   └── 2025_10_26_173457_create_tasks_table.php
├── resources/
│   ├── views/
│   │   ├── tasks/
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   └── layouts/
│   │       └── app.blade.php
├── routes/
│   ├── web.php
├── tests/
│   └── Feature/
│       └── TaskTest.php

```
## 💻 Como Rodar o Projeto

Siga os passos abaixo para ter o projeto rodando localmente na sua máquina.

### 1. Clone o repositório:
    git clone https://github.com/Eduardolimzz/todo-list-app.git
    cd todo-list-app

### 2. Instale as dependências:
    composer install
    npm install
    npm run dev
    
### 3. Crie o banco de dados:
    Crie o banco de dados no MySQL e configure as variáveis no arquivo .env com suas credenciais.

### 4. Execute as migrações:
    php artisan migrate

### 5. Inicie o servidor:
    php artisan serve

Agora, a aplicação estará rodando em http://127.0.0.1:8000.

---

##  Contribuição

Caso queira contribuir para este projeto, fique à vontade para abrir **issues** ou **pull requests**. Qualquer melhoria ou sugestão será bem-vinda!

---

##  Licença

### **Explicações e Melhorias**:

- **Melhoria na estrutura**: Organizei o conteúdo de forma clara, separando as funcionalidades da aplicação, comandos executados, e estrutura de pastas.
- **Informações úteis**: Mantenha sempre links úteis, como o link para o Laravel e links dos testes do Laravel, badge de status e versão do framework.
- **Instruções para rodar**: Expliquei os passos para rodar o projeto localmente, desde o clone do repositório até a execução no servidor.
- **Contribuição**: Instruções claras para que outras pessoas possam contribuir no projeto.
