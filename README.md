# CUSTUMERS API
## Requerimientos
Para utilizar este API solo será necesario tener instalado PHP con la versión para laravel 9.19, MySQL y composer en la máquina.
Para instalar todo lo necesario se deberá correr el siguiente comando:
> composer install

Además será necesario crear el archivo .env con las variables por default que vienen en un poryecto laravel. Cabe mencionar que la variable APP_DEBUG del archivo .env, afecta el log del sistema, si este
se encuentra como falso, solamente las peticiones de entrada serán registradas, en caso contrario las
peticiones de entreda y salida serán registradas.

Para la creación de las tablas en base de datos será necesario correr el comando:
> php artisan migrate

Para usar el servicio se deberá correr el comando:
> php artisan serve

Para generar la clave que laravel utiliza para datos sensibles se deberá ejecutar el siguiente comando:
> php artisan key:generate

Para crear las tablas será necesario ejecutar el siguiente comando:
> php artisan migrate

Adicionalmente para poblar algunas tablas se podrá ejecutar el comando:
> php artisan db:seed

## Rutas
### Nota
El parámetro Authorization deberá ir en la cabecera de la petición

### Login
> /api/login

### Método
1. POST

#### Parámetros
1. email -> formato email
2. password -> Formato alfanumérico

### Logout
> /api/logout

### Método
1. POST

#### Parámetros
1. access_token -> token que se generó al momento de ingresar

### Registro
> /api/register

### Método
1. POST

#### Parámetros
1. email -> este deberá ser único en el sistema
2. password -> Formato alfanumérico

### Lista de custumers
> /api/custumers

### Método
1. GET

#### Parámetros
1. Authorization -> token que se generó al momento de ingresar

### Eliminar custumer
> /api/custumers/{dni}

### Método
1. DELETE

#### Parámetros
1. Authorization -> token que se generó al momento de ingresar
2. dni -> número que identifica al registro

### Búsqueda
> /api/custumers/find/{busqueda}

### Método
1. GET

#### Parámetros
1. Authorization -> token que se generó al momento de ingresar
2. busqueda -> Correo o DNI del registro a buscar

### Registro de custumer
> /api/custumers

### Método
1. POST

#### Parámetros
1. Authorization -> token que se generó al momento de ingresar
2. dni -> formato numérico
3. email -> formato de correo
4. id_reg -> formato númerico
5. id_com -> formato númerico
6. name -> texto con espacios
7. last_name -> texto con espacios
8. address -> formato alfanúmerico con espacios además de los caracteres . , #

#### Nota
El campo id_reg y id_con deberán tener relación en la tabla communes, además de estar activos en su respectiva tabla

