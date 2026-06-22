<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Proyecto de Gestión de Empleados, Cargos y Funciones de Cargo

## Autor

**Breiner Bermúdez Hernández**

## Descripción

Este proyecto permite realizar operaciones CRUD sobre los siguientes módulos:

* Empleados
* Cargos
* Funciones de Cargo

Además, incluye un endpoint especial para consultar los detalles completos de un empleado, incluyendo:

* Nombre
* Apellido
* Cargo
* Salario
* Funciones asociadas a su cargo

Todas las rutas principales están protegidas mediante **Laravel Sanctum**.

### Rutas públicas

* `POST /api/register`
* `POST /api/login`

---

# Requisitos

Antes de instalar el proyecto, asegúrate de tener instalado:

* PHP 8.3 o superior
* Composer
* MySQL
* Node.js y NPM
* Git
* Laravel compatible con la versión del proyecto
* Postman, Insomnia o curl para probar la API

## Tecnologías utilizadas

* Laravel `^13.8`
* Laravel Sanctum `^4.0`
* PHP `^8.3`

---

# Instalación del Proyecto

## 1. Clonar el repositorio

```bash
git clone https://github.com/breiner-bh/projecto-de-luisca-rds.git
```

Ingresar a la carpeta del proyecto:

```bash
cd projecto-de-luisca-rds
```

---

## 2. Instalar dependencias de Composer

```bash
composer install
```

---

## 3. Instalar dependencias de Node.js

```bash
npm install
```

Este comando instala las dependencias de frontend definidas en el archivo `package.json`.

---

## 4. Crear el archivo `.env`

Laravel utiliza un archivo `.env` para almacenar la configuración local.

Linux / Git Bash:

```bash
cp .env.example .env
```

PowerShell:

```powershell
Copy-Item .env.example .env
```

---

## 5. Generar la clave de la aplicación

```bash
php artisan key:generate
```

---

## 6. Configurar la base de datos

Abrir el archivo `.env` y configurar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=
```

Modificar los valores según tu entorno:

* `DB_DATABASE`: nombre de tu base de datos.
* `DB_USERNAME`: usuario de MySQL.
* `DB_PASSWORD`: contraseña de MySQL.

---

## 7. Crear la base de datos

Ingresar a MySQL y ejecutar:

```sql
CREATE DATABASE db_3066552;
```

---

## 8. Ejecutar las migraciones

```bash
php artisan migrate
```

Este comando crea todas las tablas necesarias.

---

## 9. Ejecutar los seeders

```bash
php artisan db:seed
```

Para recrear completamente la base de datos:

```bash
php artisan migrate:fresh --seed
```

> ⚠️ Este comando elimina todas las tablas y vuelve a crearlas. Úsalo únicamente si no necesitas conservar los datos actuales.

---

# Ejecutar el proyecto

Levantar el servidor:

```bash
php artisan serve
```

La aplicación quedará disponible en:

```text
http://127.0.0.1:8000
```

URL base de la API:

```text
http://127.0.0.1:8000/api
```

---

# Autenticación

Para acceder a las rutas protegidas necesitas un token.

Puedes obtenerlo de dos formas:

1. Registrando un usuario.
2. Iniciando sesión.

Guarda el token generado porque será necesario para consumir las rutas protegidas.

---

# Registro de usuario

### Endpoint

```http
POST /api/register
```

### Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/register \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
  "name":"breiner",
  "email":"hernandez@example.com",
  "password":"12345678"
}'
```

### Respuesta esperada

```json
{
  "success": true,
  "token": "1|xxxxxxxxxxxxxxxxxxxxxxxx",
  "message": "Usuario creado"
}
```

---

# Inicio de sesión

### Endpoint

```http
POST /api/login
```

### Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/login \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
  "email":"hernandez@example.com",
  "password":"12345678"
}'
```

### Respuesta esperada

```json
{
  "success": true,
  "token": "4|xxxxxxxxxxxxxxxxxxxx",
  "message": "Usuario ha iniciado sesión correctamente"
}
```

---

# Cerrar sesión

### Endpoint

```http
POST /api/logout
```

### Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/logout \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
```

### Respuesta

```json
{
  "success": true,
  "message": "Cierre de sesión exitosa"
}
```

---

# Uso del Token

Ejemplo:

```bash
curl http://127.0.0.1:8000/api/empleados \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
```

---

# Resumen de Endpoints

| Módulo          | Método    | Ruta                            | Protegida | Descripción         |
| --------------- | --------- | ------------------------------- | --------- | ------------------- |
| Auth            | POST      | `/api/register`                 | No        | Registrar usuario   |
| Auth            | POST      | `/api/login`                    | No        | Iniciar sesión      |
| Auth            | POST      | `/api/logout`                   | Sí        | Cerrar sesión       |
| Empleados       | GET       | `/api/empleados`                | Sí        | Listar empleados    |
| Empleados       | POST      | `/api/empleados`                | Sí        | Crear empleado      |
| Empleados       | GET       | `/api/empleados/{id}`           | Sí        | Buscar empleado     |
| Empleados       | GET       | `/api/detalle_de_empleado/{id}` | Sí        | Detalle completo    |
| Empleados       | PUT/PATCH | `/api/empleados/{id}`           | Sí        | Actualizar empleado |
| Empleados       | DELETE    | `/api/empleados/{id}`           | Sí        | Eliminar empleado   |
| Cargos          | GET       | `/api/cargos`                   | Sí        | Listar cargos       |
| Cargos          | POST      | `/api/cargos`                   | Sí        | Crear cargo         |
| Cargos          | GET       | `/api/cargos/{id}`              | Sí        | Buscar cargo        |
| Cargos          | PUT/PATCH | `/api/cargos/{id}`              | Sí        | Actualizar cargo    |
| Cargos          | DELETE    | `/api/cargos/{id}`              | Sí        | Eliminar cargo      |
| Funciones Cargo | GET       | `/api/FuncionesCargo`           | Sí        | Listar funciones    |
| Funciones Cargo | POST      | `/api/FuncionesCargo`           | Sí        | Crear función       |
| Funciones Cargo | GET       | `/api/FuncionesCargo/{id}`      | Sí        | Buscar función      |
| Funciones Cargo | PUT/PATCH | `/api/FuncionesCargo/{id}`      | Sí        | Actualizar función  |
| Funciones Cargo | DELETE    | `/api/FuncionesCargo/{id}`      | Sí        | Eliminar función    |

---

# Flujo recomendado para probar la API

1. Clonar el repositorio.
2. Ejecutar `composer install`.
3. Ejecutar `npm install`.
4. Crear el archivo `.env`.
5. Configurar la base de datos.
6. Ejecutar:

```bash
php artisan key:generate
```

7. Ejecutar:

```bash
php artisan migrate --seed
```

8. Levantar el servidor:

```bash
php artisan serve
```

9. Registrar un usuario o iniciar sesión.
10. Guardar el token.
11. Consumir las rutas protegidas usando:

```http
Authorization: Bearer TU_TOKEN_AQUI
```

Orden recomendado:

1. Crear/Listar cargos.
2. Crear funciones de cargo.
3. Crear empleados.
4. Consultar detalle de empleado.

---

# Errores comunes

## Token inválido o ausente

Respuesta:

```json
{
  "message": "Unauthenticated."
}
```

### Solución

Enviar correctamente:

```http
Authorization: Bearer TU_TOKEN_AQUI
```

---

## Email duplicado

Laravel devolverá un error de validación.

### Solución

* Utilizar otro correo.
* Iniciar sesión con el usuario existente.

---

## ID no encontrado

Ejemplo:

```json
{
  "success": false,
  "message": "Empleado no encontrado o no existe"
}
```

### Solución

Verificar que el ID exista previamente.

---

## Error de base de datos

Posibles causas:

* Base de datos inexistente.
* Credenciales incorrectas.
* Migraciones no ejecutadas.
* `id_cargo` inexistente.

### Solución

```bash
php artisan migrate --seed
```

Verificar:

```env
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=
```

---

# Pruebas

Ejecutar todas las pruebas:

```bash
php artisan test
```

Ejecutar pruebas específicas:

```bash
php artisan test --filter=CargoTest
```

```bash
php artisan test --filter=FuncionesCargoTest
```

```bash
php artisan test --filter=EmpleadoTest
```

Las pruebas cubren operaciones de:

* Crear
* Consultar
* Actualizar
* Eliminar

para los módulos de Empleados, Cargos y Funciones de Cargo.
