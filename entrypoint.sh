#!/bin/bash

#Compilar los estilos
npm run build

# Ejecutar migraciones y capturar errores
if ! php artisan migrate --force; then
    echo "Error: Las migraciones no se ejecutaron correctamente."
    exit 1
fi

# Crear enlace simbólico para almacenamiento
if ! php artisan storage:link; then
    echo "Error: No se pudo crear el enlace simbólico para el almacenamiento."
    exit 1
fi

# Iniciar PHP-FPM
php-fpm