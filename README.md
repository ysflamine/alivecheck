# AliveCheck

**AliveCheck** is a lightweight, self-hosted web application designed to monitor the status of web services, APIs, and servers in real-time.  
*(AliveCheck es una aplicación web ligera y autohospedada diseñada para monitorizar el estado de servicios web, APIs y servidores en tiempo real).*

[![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php)](https://php.net)
[![Live Demo](https://img.shields.io/badge/Live_Demo-Click_Here-28a745?style=flat-square&logo=firefox)](https://alivecheck.duckdns.org/)


---

## Features / Características

- **Full CRUD**: Create, read, update, and delete monitored services.  
  *(CRUD Completo: Crea, lee, actualiza y elimina servicios monitorizados).*
- **Real-time Checking**: HTTP requests with a 5-second timeout to prevent server hangs.  
  *(Comprobación en tiempo real: Peticiones HTTP con timeout de 5 segundos para evitar bloqueos).*
- **Modern UI**: Responsive design built with Bootstrap 5 and Bootstrap Icons.  
  *(Interfaz Moderna: Diseño responsive construido con Bootstrap 5 e iconos).*
- **Multilingual Support**: Native validation and messages in Spanish (easily extensible).  
  *(Soporte Multilingüe: Validaciones y mensajes nativos en Español).*
- **Security**: CSRF protection, strict Form Request validation, and Mass Assignment prevention.  
  *(Seguridad: Protección CSRF, validación estricta de formularios y prevención de asignación masiva).*

---

## Tech Stack / Tecnologías

| Technology / Tecnología | Version / Versión | Purpose / Propósito |
|-------------------------|-------------------|---------------------|
| **Laravel**             | 13.x       | Backend PHP Framework |
| **PHP**                 | 8.4               | Programming Language |
| **MariaDB**             | 10.x+             | Relational Database |
| **Bootstrap**           | 5.3.x             | CSS Framework (UI) |
| **Nginx**               | Latest            | Web Server (Production) |

---

## Local Installation / Instalación Local

Follow these steps to set up the project in your local development environment:  
*(Sigue estos pasos para configurar el proyecto en tu entorno de desarrollo local):*

1. **Clone the repository / Clonar el repositorio**:
   ```bash
   git clone https://github.com/ysflamine/alivecheck.git
   cd alivecheck
   ```
2. Install dependencies / Instalar dependencias:
   ```bash
   composer install
   ```
3. Setup environment / Configurar el entorno:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   (Edit the .env file and configure your MariaDB/MySQL database credentials).
4. Migrate and seed / Migrar y poblar la base de datos:
   ```bash
   php artisan migrate --seed
   ```
5. Start development server / Arrancar el servidor:
   ```bash
   php artisan serve
   ```

## Server Deployment / Despliegue en Servidor

Basic steps to deploy on a Debian/Ubuntu server with Nginx:  
*(Pasos básicos para desplegar en un servidor Debian/Ubuntu con Nginx):*

1. Clone the repository into `/var/www/alivecheck`.
2. Run `composer install --no-dev --optimize-autoloader`.
3. Configure the `.env` file with production credentials and run `php artisan config:cache`.
4. Set correct permissions:
   ```bash
   sudo chown -R www-data:www-data /var/www/alivecheck
   sudo chmod -R 775 /var/www/alivecheck/storage /var/www/alivecheck/bootstrap/cache
   ```
5. Configure the Nginx server block to point to the `public/` directory and enable PHP 8.4 FPM.



