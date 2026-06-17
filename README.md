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

Creador : Breiner Bermudez Hernandez

desgarda y instalacion del proyecto:

entrar a github
ya estan adentro del github buscar en el cuadro que dise: Find a repository

colocar lo sigiente: projecto-de-luisca-rds hacerle click al nombre

despues que cargue el proyecto dale click al boton verde que dice: <> Code   

copiar el enlace: https://github.com/breiner-bh/projecto-de-luisca-rds.git 

en el escritorio del computador precionar click derecho y seleccionar la opcion que dice:

abrir en terminal 

despues que carque y que aparesca la linea parecida a :

PS C:\Users\herna\OneDrive\Desktop\trabajos de luiscarlos de github>

coloca : git clone https://github.com/breiner-bh/projecto-de-luisca-rds.git

esperar a que se descarge el proyecto y todos sus archivo 

despues abrir Visual Studio code

despues arrastrar la carpeta visual studio code o
estando dentro del Visual Studio code precionar las teclas Ctrl + O la tecla "o"

buscar donde dice escritorio la carpeta con el nombre: projecto-de-luisca-rds y darle al boton que dice Abrir.

despues que ya que tenga la carpeta abierta en Visual Studio code 

despues tiene que seleccionar el archivo que tiene por nombre de: .env.example

debe de copiar y pegar ese acrchivo despues debera de cambiarle el nombre 
.env copy.example por:
.env

y estadonde dentro de ese archo debe de buscar 

DB_CONNECTION=sql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel     
# DB_USERNAME=root
# DB_PASSWORD=

debe de cambiarlo por :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=242530*

despues en el escritorio de su computador debe de abrir MySQL Workbench

ingresar su contraseña y despues que ingrese por conpleto a MySQL 
colocar: create database db_3066552 para poder crear la base de dato en MySQL y debe de recargar MySQL despues debe de dirigirse a Visual Studio Code 

y despues debe de precionar las teclas:  Ctrl + J que eso abrirar la terninal en visual estudio code

despues escribir en la linea que aparece en la terminal de visual estudio :

PS C:\Users\herna\OneDrive\Desktop\trabajos de luiscarlos de github\projecto-de-luisca-rds>

debe escribir : composer install 

y darle a enter o la tecla que dice intro

y esperar a que carge debe de colocar en la misma linea despues de que carge el composer install debe en la linea que le sige de colocar: 

php artisan migrate 

despues debe de colocar: php artisan test

si por alguna razondo de aparece un error parecido a: 

FAILED  Tests\Feature\CargoTest > example                                          MissingAppKeyException   
No application encryption key has been specified.

no debe de preocuparce debe de colocar en la lina: 

PS C:\Users\herna\OneDrive\Desktop\trabajos de luiscarlos de github\projecto-de-luisca-rds>

debe de colocar : php artisan key:generate

darle a enter

y despues le debe de aparecer un mensaje parecido a:

INFO Application key set successfully.

despues debe de colocar el comando: php artisan config:clear

despues le debe de aparecer otro mensaje parecido a:

INFO Configuration cache cleared successfully.

luego debe de colocar el comando:

php artisan cache:clear

despues le debe de aparecer otro mensaje parecido a:

INFO  Application cache cleared successfully.

<<<<<<< HEAD
despues debes de verificar en el archivo .env y debes bucar:
=======
despues debes de de verificar en el archivo .env y debes bucar:
>>>>>>> f96ac54 (mejoramiento de los avances del proyecto)
 
 APP_KEY=

y debes de aparecer algo por ejemplo:

APP_KEY=base64:F6YhAKaqa/2cbSLXP6HVjiucNfd/87Bpik6kIuwXfEo=

entoces la clabe ya existe y despues debe de colocar en la terminal de Visual Studio Code 
debes de colocar nuevamente el comando de:

php artisan test

<<<<<<< HEAD
y todo debe de aparecer con chulitos verdes que significara OK.
=======
y todo debe de aparecer con culitos verdes que significara OK.
>>>>>>> f96ac54 (mejoramiento de los avances del proyecto)



despues debes de el comando de:
<<<<<<< HEAD

php artisan tinker

=======
php artisan tinker
>>>>>>> f96ac54 (mejoramiento de los avances del proyecto)
despues te va aparecer una
">"
debes de agregar lo siguiente:

App\Models\User::first();

y te va aparecer:

= null

y va aparecer otra:
">"
y tienes que agregar: use App\Models\User;

y tambien tienes que agregar: use Illuminate\Support\Facedes\Hash;

te aparecera otra:

">"

debes agregar User::create([
    . 'name' => 'Breiner',
    . 'email' => 'breiner@gmail.com',
    . 'password' => bcrypt('123456'),
    . ]);

<<<<<<< HEAD
despues de darle enter o intro y te va aparecer algo parecido a:
=======
despues de darle enter o intro te va aparecer algo parecido a:
>>>>>>> f96ac54 (mejoramiento de los avances del proyecto)

= App\Models\User {#1582
    name: "Breiner",
    email: "breiner@gmail.com",
    #password: "\$2y\$12\$pVoOYmOcuDmaNpH84NbqHeQftZQtAwoB6V5weVmIC5LQKhQ84MWjO",
    updated_at: "2026-06-16 04:41:13",
    created_at: "2026-06-16 04:41:13",
    id: 1,
  }

despues te va a parecer un: 

">"

tienes que agrearle lo sigiente: exit

y te debe aparecer un mesaje:

INFO  Goodbye.

despues debes de correr el comando de: php artisan serve

despues de eso tienes que abrir una nueva terminal pero de Git Bash para abrirlo desde donde estas tienes que darle a

la flecha que esta en el signo de "+" y debes de seleccionar Git Bash.

despues que se habra la terminal de Git Bash tienes que agregar la siguiente linea de comando:

curl -X POST "http://127.0.0.1:8000/api/login" -H "Content-Type: application/json" -d '{"email":"breiner@gmail.com","password":"123456"}'

despues de eso te debe de carcar una llave token por ejemplo:

{"token":"1|SZNZleZoxOQzRsldli4PlA0Iqh1d3QfP1zJiTZHX1b53dcea"}

despues tendras que colocar el siguiente comando:

curl -X POST "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer TU_TOKEN" \
-H "Content-Type: application/json" \
-d '{"nombre":"Breiner","apellido":"Bermudez","fecha_de_nacimiento":"2003-06-24","fecha_de_ingreso":"2026-07-15","salario":300000,"estado":"activo","id_cargo":1}'

y tendrias que cambiar lo que dice TU_TOKEN por 1|SZNZleZoxOQzRsldli4PlA0Iqh1d3QfP1zJiTZHX1b53dcea

que en el caso de este ejemplo la llave token seria: 1|SZNZleZoxOQzRsldli4PlA0Iqh1d3QfP1zJiTZHX1b53dcea

despues de hacer este cambio tendrias que darle a enter y esto lo que tendria que hacer es crear y agregar el usuario
<<<<<<< HEAD
creado a la base de datos.
=======
greado a la base de datos.


>>>>>>> f96ac54 (mejoramiento de los avances del proyecto)
