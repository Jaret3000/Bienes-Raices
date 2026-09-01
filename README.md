# 🏠 Bienes Raíces

Aplicación web para una **inmobiliaria**, desarrollada para mostrar y gestionar propiedades como casas y departamentos mediante una interfaz amigable, responsiva y organizada.

El proyecto fue desarrollado utilizando **PHP y MySQL**, implementando una arquitectura **MVC (Model-View-Controller)** para separar la lógica de negocio, el acceso a información y la presentación de la aplicación.

## 🚀 Tecnologías

* **PHP 8**
* **MySQL**
* **HTML5**
* **CSS3**
* **Sass / SCSS**
* **JavaScript**
* **Gulp**
* **Composer**
* **Arquitectura MVC**
* **Programación Orientada a Objetos (POO)**

## ✨ Características

* 🏠 Catálogo de propiedades inmobiliarias.
* 🔎 Visualización de información detallada de las propiedades.
* 📱 Diseño responsivo para diferentes dispositivos.
* 🌙 Interfaz con soporte para modo oscuro.
* 📩 Formulario de contacto.
* 📝 Secciones informativas para la inmobiliaria.
* ⚡ Optimización y automatización de recursos mediante Gulp.
* 🗄️ Gestión de información mediante MySQL.
* 🧩 Arquitectura MVC para una mejor organización y mantenimiento del código.

## 🏗️ Arquitectura del proyecto

El proyecto utiliza el patrón **MVC**, permitiendo mantener separadas las diferentes responsabilidades de la aplicación.

```text
Bienes-Raices/
│
├── controllers/      # Controladores y lógica de la aplicación
├── includes/         # Archivos compartidos y configuración
├── models/           # Modelos y acceso a la base de datos
├── public/           # Punto de entrada y archivos públicos
├── src/              # Recursos fuente (SCSS, JS, imágenes, etc.)
├── views/            # Vistas de la aplicación
│
├── Router.php        # Sistema de rutas
├── composer.json     # Dependencias de PHP
├── gulpfile.js       # Automatización y compilación de recursos
└── package.json      # Dependencias y scripts de Node.js
```

## ⚙️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/Jaret3000/Bienes-Raices.git
cd Bienes-Raices
```

### 2. Instalar dependencias de Node.js

```bash
npm install
```

### 3. Instalar dependencias de PHP

```bash
composer install
```

### 4. Ejecutar Gulp

Para iniciar el proceso de compilación y desarrollo de los recursos frontend:

```bash
npm run dev
```

### 5. Configurar el servidor

El proyecto puede ejecutarse utilizando un servidor local compatible con PHP.

Por ejemplo:

```bash
cd public
php -S localhost:3000
```

Posteriormente, acceder desde:

```text
http://localhost:3000
```

> Para utilizar todas las funcionalidades del proyecto es necesario configurar correctamente la conexión a MySQL y las variables de entorno correspondientes.

## 🗄️ Base de datos

La aplicación utiliza **MySQL** para almacenar y administrar la información relacionada con las propiedades y demás elementos dinámicos del sitio.

La estructura está pensada para trabajar con relaciones entre los diferentes elementos de la aplicación y permitir operaciones de consulta y gestión de información desde PHP.

## 🎯 Objetivo

El objetivo principal del proyecto es desarrollar una plataforma inmobiliaria funcional aplicando conceptos de **desarrollo web backend y frontend**, especialmente:

* Programación Orientada a Objetos.
* Arquitectura MVC.
* Gestión de bases de datos relacionales.
* Desarrollo frontend con Sass y JavaScript.
* Automatización de tareas con Gulp.
* Organización modular del código.
* Diseño responsivo.
* Integración entre frontend, backend y base de datos.

## 👨‍💻 Autor

**Eduardo Jaret López Ayuso**

Proyecto desarrollado como parte de la formación y práctica en **desarrollo web Full Stack**.

---

⭐ Si te interesa el proyecto, puedes consultar el código fuente en el repositorio de GitHub.

