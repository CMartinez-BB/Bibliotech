#!/bin/bash

# Ejecutar migraciones
if ! php artisan migrate --force; then
    echo "Error: Las migraciones no se ejecutaron correctamente."
    exit 1
fi

# Crear enlaces simbólicos para almacenamiento
if ! php artisan storage:link; then
    echo "Error: No se pudo crear el enlace simbólico de storage."
    exit 1
fi

# Iniciar Laravel y el servidor de estilos en paralelo
php artisan serve --host=0.0.0.0 --port=1010 & # Levantar Laravel en segundo plano
npm run build # Ejecutar Vite o TailwindCSS