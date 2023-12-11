# Foco Challenge 2023
Esta aplicação se encontra em produção, [Clique aqui](https://foco-challenge.jpdevs.cloud) para acessar o deploy.

- A collection do insomnia com todas as rotas da api pode ser encontrada em `public/collections/main`


- Os arquivos XML podem ser encontrados em 

    - `public/xml/new.xml`

    - `public/xml/modify.xml`

    - `public/xml/cancel.xml`

    
## O Problema

O Hotel Pousada Missanga enfrenta o desafio de integrar dados provenientes do canal Expedia diretamente em seu sistema
interno. Para resolver esse problema, será necessário o desenvolvimento de uma aplicação eficiente capaz de ler arquivos
XML fornecidos pela Expedia e realizar a persistência desses dados no banco de dados do hotel.

## Solução Proposta

Foi desenvolvida uma aplicação simples e fácil de usar para atender às necessidades específicas do Hotel Pousada
Missanga. Esta solução permitirá a integração perfeita de dados provenientes da Expedia, garantindo que as informações
relevantes sejam devidamente armazenadas no banco de dados do hotel.

### Funcionalidades da Aplicação

1. **Leitura de Arquivos XML:** A aplicação é capaz de processar e extrair informações dos arquivos XML fornecidos pela
   Expedia.

2. **Persistência no Banco de Dados:** Após a leitura bem-sucedida, os dados são persistidos no banco de dados do Hotel
   Pousada Missanga de forma eficiente e segura.

3. **Edição e inserção manual de reservas:** A aplicação também conta com a opção de inserir/editar as reservas
   manualmente, em caso de erros
4. ***Acesso a api:*** A aplicação disponibiliza uma API com endpoints bem definidos, permitindo que outras aplicações
   ou sistemas integrem-se facilmente.

## Integração

Siga as instruções abaixo para integrar a aplicação em seu ambiente local:

1. **Instalação:**
    - Clone o repositório: `git clone https://github.com/JpDevs/foco-challenge-2023`
    - Acesse o diretório: `cd foco-challenge`
    - Instale as dependências: `composer install`
    - Crie um banco de dados localmente em sua máquina

2. **Configuração:**
    - Copie o arquivo .env.example para .env e edite o mesmo, inserindo os dados de conexão da sua database
    ````
   cp .env.example .env
   nano .env
   ````
    ````dotenv
    DB_CONNECTION=mysql
    DB_HOST=seu_host
    DB_PORT=3306
    DB_DATABASE=nomedobanco
    DB_USERNAME=root
    DB_PASSWORD=suasenha
   ````

3. **Rode as migrations:**
    - Após criar e se conectar ao banco de dados, rode as migrations para que as tabelas possam ser
      criadas: `php artisan migrate:fresh`

4. **Startando a aplicação:**
    - Após seguir todos os passos indicados, basta rodar o comando `php artisan serve` e sua aplicação estará disponível
      em http://localhost:8000.

# Docucumentação da api

## Base endpoint

O endpoint base para todas as solicitações é: `/api/bookings`

## Reservas

### Index

- **Endpoint:** `/api/bookings`
- **Método:** GET
- **Descrição:** Retorna uma lista de todas as reservas disponíveis no banco de dados.
- **Parâmetros de Consulta:**
    - Nenhum

#### Exemplo de Solicitação

```bash
curl -X GET https://foco-challenge.jpdevs.cloud/api/bookings
```

#### Exemplo de Resposta

```json

{
    "id": 1,
    "booking_code": "1830752105",
    "booking_holder": "Felipe Wicks",
    "holder_email": "fw@m.expediapartnercentral.com",
    "holder_phone": "0 0 6191521720",
    "adults": 2,
    "kids": 0,
    "check_in": "2021-09-16",
    "check_out": "2021-09-17",
    "status": "1",
    "created_at": "2023-12-11T19:49:13.000000Z",
    "updated_at": "2023-12-11T19:49:13.000000Z"
}
```

### Show

- **Endpoint:** `/api/bookings/{id}`
- **Método:** GET
- **Descrição:** Retorna os dados relacionados a uma reserva em especifico
- **Parâmetros de Consulta:**
    - ID (deverá ser passado na URL)

#### Exemplo de Solicitação

```bash
curl -X GET https://foco-challenge.jpdevs.cloud/api/bookings/1
```

#### Exemplo de Resposta

```json

{
    "id": 1,
    "booking_code": "1830752105",
    "booking_holder": "João Pedro",
    "holder_email": "jp@m.expediapartnercentral.com",
    "holder_phone": "0 0 6191521720",
    "adults": 2,
    "kids": 0,
    "check_in": "2021-09-16",
    "check_out": "2021-09-17",
    "status": "1",
    "created_at": "2023-12-11T19:18:05.000000Z",
    "updated_at": "2023-12-11T19:18:30.000000Z"
}

```

### Create

- **Endpoint:** `/api/bookings/create`
- **Método:** GET
- **Descrição:** Retorna os dados externos necessários para a criação de uma nova reserva.
- **Parâmetros de Consulta:**
    - Nenhum

#### Exemplo de Solicitação

```bash
curl -X GET https://foco-challenge.jpdevs.cloud/api/bookings/create
```

#### Exemplo de Resposta

```json

{
    "status": {
        "1": "pending",
        "2": "confirmed",
        "3": "retrieved",
        "0": "cancel"
    }
}
```

### Edit

- **Endpoint:** `/api/bookings/{id}/edit`
- **Método:** GET
- **Descrição:** Retorna os dados atuais do registro e também os dados externos necessários para poder editar o mesmo.
- **Parâmetros de Consulta:**
    - ID (deverá ser passado na URL)

#### Exemplo de Solicitação

```bash
curl -X GET https://foco-challenge.jpdevs.cloud/api/bookings/1/edit
```

#### Exemplo de Resposta

```json
{
    "booking": {
        "id": 1,
        "booking_code": "1830752105",
        "booking_holder": "Felipe Wicks",
        "holder_email": "fw@m.expediapartnercentral.com",
        "holder_phone": "0 0 6191521720",
        "adults": 2,
        "kids": 0,
        "check_in": "2021-09-16",
        "check_out": "2021-09-17",
        "status": "1",
        "created_at": "2023-12-11T19:18:05.000000Z",
        "updated_at": "2023-12-11T19:18:05.000000Z"
    },
    "status": {
        "1": "pending",
        "2": "confirmed",
        "3": "retrieved",
        "0": "cancel"
    }
}
```

### Store

- **Endpoint:** `/api/bookings`
- **Método:** POST
- **Descrição:** Persiste uma nova reserva manualmente no sistema.
- **Parâmetros da Request:**

```json
{
    "booking_holder": "João",
    "holder_phone": "+557777777777",
    "holder_email": "joaopedro@jpdevs.com.br",
    "adults": 1,
    "kids": 2,
    "check_in": "2023-12-11",
    "check_out": "2023-12-13",
    "status": 1
}
```

#### Exemplo de Solicitação

```bash
curl -X POST -H "Content-Type: application/json" -d '{
    "booking_holder": "João",
    "holder_phone": "+557777777777",
    "holder_email": "joaopedro@jpdevs.com.br",
    "adults": 1,
    "kids": 2,
    "check_in": "2023-12-11",
    "check_out": "2023-12-13",
    "status": 1
}' https://foco-challenge.jpdevs.cloud/api/bookings

```

#### Exemplo de Resposta

```json
[
    {
        "booking_holder": "João Pe asdsdasd sdro",
        "holder_phone": "1234555",
        "holder_email": "joaopedro@jpdevs.com.br",
        "adults": 1,
        "kids": 2,
        "check_in": "2023-12-11",
        "check_out": "2023-12-13",
        "status": 1,
        "booking_code": "65775ff0106c1",
        "updated_at": "2023-12-11T19:16:00.000000Z",
        "created_at": "2023-12-11T19:16:00.000000Z",
        "id": 1
    }
]
```

### Update

- **Endpoint:** `/api/bookings/{id}`
- **Método:** PUT
- **Descrição:** Atualiza um registro.
- **Parâmetros de Consulta:**
    - ID (deverá ser passado na URL)

```json
{
    "booking_holder": "Jp",
    "holder_phone": "1234555",
    "holder_email": "joaopedro@jpdevs.com.br",
    "adults": 1,
    "kids": 2,
    "check_in": "2023-12-11",
    "check_out": "2023-12-13",
    "status": 3
}
```

#### Exemplo de Solicitação

```bash
curl -X PUT -H "Content-Type: application/json" -d '{
    "booking_holder": "Jp",
    "holder_phone": "1234555",
    "holder_email": "joaopedro@jpdevs.com.br",
    "adults": 1,
    "kids": 2,
    "check_in": "2023-12-11",
    "check_out": "2023-12-13",
    "status": 3
}' https://foco-challenge.jpdevs.cloud/api/bookings/1
```

### Destroy

- **Endpoint:** `/api/bookings/{id}`
- **Método:** DELETE
- **Descrição:** Deleta um registro.
- **Parâmetros de Consulta:**
    - ID (deverá ser passado na URL)

#### Exemplo de Solicitação

```bash
curl -X PUT -H "Content-Type: application/json" -d '{
    "booking_holder": "Jp",
    "holder_phone": "1234555",
    "holder_email": "joaopedro@jpdevs.com.br",
    "adults": 1,
    "kids": 2,
    "check_in": "2023-12-11",
    "check_out": "2023-12-13",
    "status": 3
}' https://foco-challenge.jpdevs.cloud/api/bookings/1
```

### Store XML

- **Endpoint:** `/api/bookings/xml/upload`
- **Método:** POST
- **Descrição:** Insere uma nova reserva com base em um arquivo xml.
- **Parâmetros de Consulta:**
  - Arquivo XML

#### Exemplo de Solicitação

```bash
curl -X POST -H "Content-Type: application/xml" --data-binary "@caminho/do/seu/arquivo.xml" https://foco-challenge.jpdevs.cloud/api/bookings/xml/upload
```

#### Exemplo de Resposta

```json
{
    "booking_code": {
        "0": "1830752105"
    },
    "booking_holder": "Felipe Wicks",
    "holder_email": {
        "0": "fw@m.expediapartnercentral.com"
    },
    "holder_phone": "0 0 6191521720",
    "adults": {
        "0": "2"
    },
    "kids": {
        "0": "0"
    },
    "check_in": {
        "0": "2021-09-16"
    },
    "check_out": {
        "0": "2021-09-17"
    },
    "status": 1,
    "updated_at": "2023-12-11T19:49:13.000000Z",
    "created_at": "2023-12-11T19:49:13.000000Z",
    "id": 1
}
```

### Update XML

- **Endpoint:** `/api/bookings/{id}/xml`
- **Método:** POST
- **Descrição:** Atualiza uma reserva a partir de um arquivo XML
- **Parâmetros de Consulta:**
  - Arquivo XML

#### Exemplo de Solicitação

```bash
curl -X POST -H "Content-Type: application/xml" --data-binary "@caminho/do/seu/arquivo.xml" https://foco-challenge.jpdevs.cloud/api/bookings/xml/upload
```
