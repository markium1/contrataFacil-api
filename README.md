# ContrataFácil API

Bem-vindo à documentação da API ContrataFácil API! Esta API permite realizar diversas operações relacionadas a Cadastro e consultas de Prestadores de Serviços e os Serviços.

## Instalação do projeto

Aqui vai estar o passo-a-passo de como instalar e rodar a API localmente

### 1. Requisitos

**Tenha o PHP instalado (pode ser o XAMPP ou MAMPP)** [Link para o XAMPP](https://www.apachefriends.org/pt_br/download.html)

**Tenha o Composer instalado** [Link Composer](https://getcomposer.org/download/)

### 2. Clone o projeto

`git clone https://github.com/markium1/contrataFacil-api`

### 3. Dentro da pasta do projeto execute os seguintes comandos para iniciar e configurar o projeto

-   **Instalar Dependências**

Abra um terminal ou prompt de comando e navegue até a pasta do projeto clonado. Em seguida, execute o seguinte comando para instalar as dependências do projeto listadas no arquivo composer.json

`composer install`

-   **Configurar o Arquivo .env**

Faça uma cópia do arquivo .env.example na mesma pasta e renomeie-a para .env. Abra o arquivo .env e configure as informações de conexão com o banco de dados e outras configurações específicas do seu ambiente.

`cp .env.example .env`

-   **Gerar a Chave de Criptografia**

Execute o comando para gerar a chave de criptografia do Laravel no arquivo .env

`php artisan key:generate`

-   **Criar o Banco de Dados**
    Se você configurou as informações de conexão com o banco de dados no arquivo .env, execute o seguinte comando para criar o banco de dados vazio

`php artisan migrate`

-   **Iniciar o Servidor de Desenvolvimento**

Execute o servidor de desenvolvimento do Laravel para iniciar o projeto

`php artisan serve`

-   **Acessar o Projeto**

Seu projeto estará disponível na URL: localhost:8000

## Endpoints Principais

Aqui estão alguns dos principais endpoints da API:

### 1. Cadastro Prestadores e Serviços

**Endpoint Prestador:** `/api/prestador`

**Endpoint Servico:** `/api/servico`

Descrição: Realiza o de um prestador ou serviço.

Método: POST

Parâmetros:

**Prestador**

-   `nome` (string): O nome do prestador.
-   `telefone` (string): O telefone do prestador.
-   `email`(string): O email do prestador.
-   `foto`(string): Uma foto do prestador.

**Serviço**

-   `nome` (string): O nome do serviço.
-   `descricao` (string): A descrição.
-   `valor`(string): O email do prestador.
-   `prestador_id`(int): ID do prestador de serviço.

Resposta de Sucesso:

```json
{
    "resultado": "Cadastrado com Sucesso"
}
```

Resposta de Erro:

```json
{
    "resultado": "Erro ao efetuar o cadastro"
}
```

### 2. Buscar Prestadores e Serviços

**Endpoint Prestador:** `/api/prestador`

**Endpoint Servico:** `/api/servico`

Descrição: Realiza o de um prestador ou serviço.

Método: GET

Parâmetros (opcionais):

**Prestador**

-   `/api/prestador?page={num_page}` Para buscar por uma pagina específica
-   `/api/prestador?term={term}` Para filtrar por um termo

**Serviço**

-   `/api/servico?page={num_page}` Para buscar por uma pagina específica
-   `/api/servico?term={term}` Para filtrar por um termo

Resposta de Sucesso Prestador:

```json
{
    "data": [
        {
            "id": 2,
            "nome": "MARCOS",
            "telefone": "9999999",
            "email": "Marcos@gmail",
            "foto": "foto",
            "created_at": "2023-08-04T18:06:07.000000Z",
            "updated_at": "2023-08-04T18:06:07.000000Z"
        }
    ]
}
```

Resposta de Sucesso Serviço:

```json
{
    "data": [
        {
            "id": 2,
            "nome": "Limpador de estofados",
            "descricao": "Limpar os mais variados tipos de estofados, sejam sofás, colchões, bancos de carro...",
            "valor": "150.00",
            "prestador_id": 1,
            "created_at": "2023-08-04T12:52:05.000000Z",
            "updated_at": "2023-08-04T12:52:05.000000Z",
            "prestador": {
                "id": 1,
                "nome": "Renata",
                "telefone": "9999999",
                "email": "renata@gmail",
                "foto": "foto",
                "created_at": "2023-08-04T12:51:34.000000Z",
                "updated_at": "2023-08-04T12:51:34.000000Z"
            }
        }
    ]
}
```
