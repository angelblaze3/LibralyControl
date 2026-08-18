📚 LibralyControl

Una plataforma web para administrar y controlar una biblioteca de forma sencilla, organizada y eficiente.

LibralyControl es una aplicación web desarrollada con Laravel que busca facilitar la administración de una biblioteca mediante un sistema centralizado para gestionar libros, usuarios y operaciones administrativas.

El proyecto cuenta con diferentes niveles de acceso, permitiendo separar las funciones de los usuarios y los administradores, ofreciendo una experiencia adaptada a cada tipo de usuario.

✨ Características
👤 Usuarios
🔐 Inicio y cierre de sesión.
🏠 Dashboard personalizado.
🛡️ Protección de rutas mediante autenticación.
👥 Separación entre usuarios normales y administradores.
👨‍💼 Administración
📊 Dashboard administrativo.
📚 Gestión de libros.
➕ Registro de nuevos libros.
✏️ Edición de información.
🗑️ Eliminación de libros.
🔎 Búsqueda de libros.
📋 Visualización de libros mediante tablas.
⚡ Interactividad

El sistema utiliza Laravel Livewire para proporcionar componentes dinámicos y reducir la necesidad de desarrollar lógica compleja de JavaScript en el frontend.

🛠️ Tecnologías
Tecnología	Uso
🐘 PHP 8.3+	Lenguaje principal
⚡ Laravel 13	Framework backend
🔴 Livewire 4	Componentes interactivos
🎨 Tailwind CSS 4	Diseño y estilos
⚙️ Vite	Compilación de assets
🗄️ Eloquent ORM	Gestión de datos
🧪 PHPUnit	Pruebas automatizadas
🏗️ Arquitectura

El proyecto sigue la arquitectura MVC (Model–View–Controller) proporcionada por Laravel.

🔐 Sistema de acceso

LibralyControl implementa diferentes rutas y middleware dependiendo del tipo de usuario.

                    ┌─────────────────┐
                    │  LibralyControl │
                    └────────┬────────┘
                             │
                  ┌──────────┴──────────┐
                  │                     │
             👤 Usuario             👨‍💼 Admin
                  │                     │
             Dashboard             Dashboard
                                        │
                                  Gestión de
                                    libros

Los usuarios cuentan con rutas protegidas mediante autenticación, mientras que las funciones administrativas utilizan middleware específico para restringir su acceso.

📚 Gestión de libros

El módulo administrativo permite realizar las principales operaciones CRUD sobre los libros:

Create  →  Crear libro
Read    →  Consultar libros
Update  →  Editar libro
Delete  →  Eliminar libro

Las rutas administrativas se encuentran protegidas y utilizan un controlador específico para gestionar las operaciones sobre los libros.

🚀 Instalación
1. Clonar el repositorio
git clone https://github.com/angelblaze3/LibralyControl.git
cd LibralyControl
2. Instalar dependencias
composer install
npm install
3. Configurar el entorno
cp .env.example .env

Generar la clave de aplicación:

php artisan key:generate

Configura en .env las credenciales correspondientes a tu base de datos.

4. Ejecutar migraciones
php artisan migrate
5. Compilar los recursos

Para desarrollo:

npm run dev

En otra terminal:

php artisan serve

Para producción:

npm run build

🎯 Objetivo

LibralyControl tiene como objetivo proporcionar una solución web que permita digitalizar y simplificar la administración de una biblioteca, centralizando la información y reduciendo la dependencia de procesos manuales.

📖 Organiza tu biblioteca. Controla tus recursos. Simplifica la gestión.

👨‍💻 Autor

Angel
Estudiante de Desarrollo de Software

<p align="center"> 📚 <strong>LibralyControl</strong> · Library Management System </p>
