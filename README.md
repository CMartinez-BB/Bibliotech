
![analytics image (flat)](https://raw.githubusercontent.com/vitr/google-analytics-beacon/master/static/badge-flat.gif)
![analytics](https://www.google-analytics.com/collect?v=1&cid=555&t=pageview&ec=repo&ea=open&dp=/Plantilla-de-repositorio/readme&dt=&tid=UA-4677001-16)

## BIBLIOTECH 👇
Gestor administrador de altas, bajas, actualizaciones y prestamos


<h1 align="center">Acerca De</h1>
<p align="center"> BiblioTech es un sistema de gestión diseñado para facilitar la administración de la biblioteca y la documentación en el Instituto Tecnológico Superior de Nuevo Casas Grandes, Chihuahua (ITSNCG). El objetivo principal es mejorar la eficiencia en el acceso a recursos tanto para el personal como para los estudiantes.</p>

## Tabla de contenidos:
---

- [BIBLIOTECH 👇](#bibliotech-)
- [Tabla de contenidos:](#tabla-de-contenidos)
- [Que hay de nuevo?](#que-hay-de-nuevo)
  - [Forma de desarrollo de la aplicación web](#forma-de-desarrollo-de-la-aplicación-web)
- [Guía de instalación](#guía-de-instalación)
  - [Dependencias](#dependencias)
  - [Actualizaciones](#actualizaciones)
- [Contribuidores](#contribuidores)
- [Licencia](#licencia)
  - [Términos y Condiciones](#términos-y-condiciones)
  - [Contacto](#contacto)

## Que hay de nuevo?
---
**Aunque aun estamos en fase Beta, hemos agregado las principales funciones fundamentales para un correcto manejo de prestamos, asi como, el registro de nuevo material didáctico, reportes de inventarios. **
** Creemos que la mejor manera para atraer al usuario es a través de un diseño limpio, por esa razón, hemos optado por los colores claros asi como, el blanco y morado.**

### Forma de desarrollo de la aplicación web
---
En la iniciativa del proyecto, se opto por el uso del framework Laravel junto con Livewire para la creación del proyecto, siguiendo el modelo MVC.

Dividiendo las funcionalidades del proyecto en componentes con Livewire, se aligero la programación optimizando un 12% la creación de esta apliacion, asi como diversas funciones complejas que agrega Livewire,
Tailwind CSS se decidio utilizar para el diseño de esta aplicación, ya que, esta solo renderiza las clase utilizadas en todo el proyecto a Diferencia de otros frameworks que ofrecen los mismo pero ya prediseñados.

## Guía de instalación
---
Cómo instalar la aplicación web? . Para iniciar la aplicación es necesario contar con **Composer, Node.js, PHP y Laravel**

### Dependencias
Clona el repositorio directamente

    https://github.com/DeveroCode/Bibliotech.git

Instala las dependencias necesarias de composer

    composer install

Instala las dependencias necesarias de node.js

    npm install

Configura tu archivo .env.example
-- Copia el archivo **.env.example** y renómbralo a **.env**
-- Configura la conexión a la base de datos y otras variables de entorno según tus necesidades

Genera tu APP-KEY

    php artisan key:generate

Inicia tu servidor

    php artisan serve
    npm run dev

### Actualizaciones

- Creación de libros - CRUD (Create, Read, Update, Delete): ![Libros](https://img.shields.io/badge/Finalizado-100-green)
- Imprimir Reportes PDF: ![Iniciando](https://img.shields.io/badge/Iniciando-10-red)
- Prestamos: ![Finalizando](https://img.shields.io/badge/Finalizado-85-bluered)
- Prestamos - Inteligente: ![Iniciando](https://img.shields.io/badge/Iniciando-0-orange)
- Buscador: ![Finalizando](https://img.shields.io/badge/Finalizado-100-green)


## Contribuidores
---
Marhley (DBA - Colaboradora)
AbrhanNVazquez (Analista y Documentación)
DeveroCode (Carlos Martinez - Programador de toda la aplicación web)


## Licencia 
---

Este software es propiedad del Instituto Tecnológico Superior de Nuevo Casas Grandes Chihuahua (ITSNCG) y está licenciado bajo los términos de la siguiente licencia.

### Términos y Condiciones

1. **Uso Exclusivo:** Este software y su código fuente son exclusivamente para uso del Instituto Tecnológico Superior de Nuevo Casas Grandes Chihuahua (ITSNCG).

2. **Distribución y Modificación:** La distribución y modificación de este software, así como cualquier proyecto derivado de este, está permitida únicamente para uso interno en el ITSNCG. Cualquier distribución, modificación o uso externo debe ser autorizado por escrito por parte del ITSNCG.

3. **Responsabilidad:** El software se proporciona "tal cual", sin garantía de ningún tipo, expresa o implícita. El ITSNCG no se hace responsable de los daños derivados del uso de este software.

4. **Reserva de Derechos:** El ITSNCG se reserva todos los derechos sobre el código fuente, diseño y funcionalidades de este software. Cualquier intento de copia, reproducción o distribución no autorizada está sujeto a acciones legales.

5. **Cumplimiento Legal:** Cualquier intento de distribuir, copiar o modificar este software de manera que infrinja la licencia puede resultar en acciones legales.


### Contacto

Para cualquier consulta relacionada con esta licencia, por favor comuníquese con el Instituto Tecnológico Superior de Nuevo Casas Grandes Chihuahua (ITSNCG) en [mtz.carlos.123.nz@gmail.com].

Fecha de Vigencia: 20-ago-2022 - 20-junio-2027

© 202 Instituto Tecnológico Superior de Nuevo Casas Grandes (ITSNCG).
