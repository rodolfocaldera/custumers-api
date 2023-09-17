# CUSTUMERS API
## Requerimientos
Para utilizar este API solo será necesario tener instalado PHP y composer en la máquina.
Para instalar todo lo necesario se deberá correr el siguiente comando:
> composer install

Para la creación de las tablas en base de datos será necesario correr el comando:
> php artisan migrate

Para usar el servicio se deberá correr el comando
> php artisan serve

## Rutas
### Login
> /login

### Método
1. POST

#### Parámetros
1. email -> formato email
2. password

### Logout
> /logout

### Método
1. POST

#### Parámetros
1. access_token -> token que se generó al momento de ingresar

### Registro
> /register

### Método
1. POST

#### Parámetros
1. email -> este deberá ser único en el sistema
2. password 