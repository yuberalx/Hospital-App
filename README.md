<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Requisitos de este proyecto


### **PHP v8.3.7**
### **Node v22.2.0**
### **Composer v22.2.0**
### **Laravel v11.8.0**
### Apache
### MySQL

# Ejecucion local

### Configurar el archivo .env: Copia el archivo .env.example y renómbralo a .env. Luego, configura las variables de entorno como la conexión a la base de datos, la URL de la aplicación, etc.
### Instalar las dependencias del proyecto: Abre una terminal o símbolo del sistema y navega hasta la carpeta del proyecto. Ejecuta el siguiente comando para instalar las dependencias: `composer install`
### Instalar las dependencias del proyecto: Abre una terminal o símbolo del sistema y navega hasta la carpeta del proyecto. Ejecuta el siguiente comando para instalar las dependencias: `php artisan key:generate`
### Ejecutar las migraciones: Las migraciones de Laravel crean las tablas de la base de datos. Ejecuta el siguiente comando para aplicar las migraciones:`php artisan migrate`
### Ejecutar los Seeders que contienen 2 usarios de prueba iniciales, un usuario comun y otro adminitrador: `php artisan db:seed --class=UsersTableSeeder`
### Iniciar el servidor web: Ejecuta el siguiente comando para iniciar el servidor web de desarrollo: `php artisan serve`

## Adicionalmente el proyecto tiene estilos basicos en tailwind por lo que de ser necesario y estos no se esten generando, ejecuta: `npm run dev`
