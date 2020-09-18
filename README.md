# TecnoIF

Repositório do Projeto "Plataforma web para gerenciamento de projetos atendidos pela TecnoIF" - Trabalho de Conclusão de 
Curso - IFMS TEC INFO JD.

O projeto, possuí como objetivo a criação de uma plataforma web que possa auxiliar as atividades de seleção, 
acompanhamento e documentação dos empreendimentos assessorados pelas equipes gestoras da TecnoIF, que é a Incubadora 
de empresas do IFMS, que busca incentivar o empreendedorismo, remediar possiveis fatores internos e externos, que possam 
prejudicar a geração consolidação de empresas. Para realizar o proposto, será utilizado o framework Laravel na versão 6.18.40.
                                                                  

## Como usar

1. [Requisitos](#1-requisitos)
2. [Instalação](#2-instalação)
3. [Acesso](#3-acesso)

## 1. Requisitos

- PHP >= 7.2.0
- BCMath PHP
- Ctype PHP
- Fileinfo PHP
- JSON PHP
- PHP Mbstring
- OpenSSL PHP
- PDO PHP
- Tokenizer PHP
- PHP XML
- Composer >= 1.7.0
- MariaDB >= 10.4.0 ou MySQL >= 5.6.0


## 2. Instalação

**2.1.** Clone o repositório:

```bash
    git clone https://github.com/202020202021/TecnoIF.git
```

**2.2.** Vá até a pasta local que foi criada contendo o projeto:

```bash
    cd TecnoIF
```

**2.3.** Instalação das dependências do projeto com composer:
```bash
    composer install
```

**2.4.** Faça uma cópia do arquivo `.env.example` e renomeie para `.env`:

**2.6.** Crie um banco de dados no MariaDB ou MySQL.

> Sugestão de definição de collation: **utf8mb4_general_ci**


**2.7.** Configure a conexão com os dados do banco de dados no arquivo `.env`:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=NOMEDOBANCO
    DB_USERNAME=USUARIO
    DB_PASSWORD=SENHA


**2.5.** Criação de nova chave de criptografia:
```bash    
    php artisan key:generate
```

**2.7.** Geração do cache das configurações da aplicação:
```
    composer build
```

**2.8.** Criação das tabelas e inserção dos dados no banco de dados:

```bash
    php artisan migrate:fresh --force --seed    
```

**2.9.** Iniciar o servidor da aplicação
```
    php artisan serve
```

## 3. Acesso

> Caso a instalação tenha sido realizada em um host local, troque o domínio por **localhost:8000** ou **127.0.0.1:8000**.

**3.1.** Acesso à área pública da aplicação:

> **URL:** http://domínio/


**3.1.** Acesso à área privada da aplicação:

> **URL:** http://domínio/admin <br/> 

Criar Usuario pelo terminal usando tinker:

```bash

 php artisan tinker

```

No tinker: 

```bash

>>> $user = new \App\User;
>>> $user->email = 'admin@admin.edu';
>>> $user->password = Hash::make('tecnoif'); # altere 'tecnoif' para uma senha forte
>>> $user->name = 'Administrator Name';
>>> $user->save();
>>> exit() # sair do tinker

```
