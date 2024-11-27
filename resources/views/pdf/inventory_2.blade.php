<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ public_path('css/app_2.css') }}">

    <title>Reporte - Inventario</title>
</head>

<body>
    @if ($base64Header)
    <img src="{{ $base64Header }}" alt="Encabezado" style="width: 100%;">
    @endif

    <main>
        <div class="header">
            <h1 class="title">Instituto Tecnólogico Superior de Nuevo Casas Grandes Chihuahua</h1>
            <p class="subtitle">Av. Tecnologico No. 7100 C.P. 31700</p>
            <span class="text-info">Inventario de libros de la biblioteca</span>
        </div>

        <div class="information">
            <h2 class="information__title p-1">Libros en existencia</h2>
            <div class="libros-count">
                <p class="information__sub p-1 fs-2 text-capitalize">expedición: <span class="text-normal fs-1">{{
                        now()->format('d/m/Y') }}</span></p>
                <span class="information__sub p-1 fs-2 text-capitalize">libros: <span class="text-normal fs-1">{{
                        $count}}
                    </span>
            </div>
            @php
            $lastUserId = null;
            $cont=0;
            $total_pages=0;
            @endphp

            @foreach ($libros as $libro)
            <div class="libros-bibliotecario">
                @if ($lastUserId != $libro->usuario->id)
                <p class="information__sub pr-1 fs-2 text-capitalize">expedido por:
                    <span class="fs-1 text-normal text-capitalize">
                        {{ $libro->usuario->name . " " . $libro->usuario->apellido_paterno . " " .
                        $libro->usuario->apellido_materno }}
                    </span>
                </p>
                @php
                $lastUserId = $libro->usuario->id;
                @endphp

                <p class="information__sub fs-2 text-capitalize">folio: <span class="text-normal fs-1">{{
                        $libro->usuario->email }}</span></p>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Table --}}
        <div class="table-group marginT-5">
            <!-- Table start -->
            <table class="group">
                <thead class="group-thead">
                    <tr class="group-tr">
                        <th class="group-thead-title group-title">Título</th>
                        <th class="group-thead-title">Estado</th>
                        <th class="group-thead-title">Edición</th>
                        <th class="group-thead-title">Categoría</th>
                    </tr>
                </thead>
                @foreach ($libros as $libro)
                <tbody class="group-tbody">
                    <tr class="group-tbody-cell">
                        <!-- Titulo y autores -->
                        <th class="group-tbody-book py-1">
                            <div class="tbody-book cell">
                                <div class="tbody-book-title text-normal">{{ $libro->titulo }}</div>
                                <div class="tbody-book-autor">
                                    {{-- Autores --}}
                                    @foreach ($libro->autores as $autor)
                                    {{ $autor->autor }}
                                    @endforeach
                                </div>
                            </div>
                        </th>

                        <!-- Disponibles -->
                        <td class="group-tbody-category cell">
                            <span class="group-tbody-background">
                                <span class="group-tbody-category-text"></span>
                                Disponibles {{ $libro->cantidad }}
                            </span>
                        </td>

                        <!-- Edicion -->
                        <td class="group-tbody-edicion cell text-capitalize fs-1">{{ $libro->edicion }}</td>
                        <!-- Categoria -->
                        <td class="group-tbody-categoria cell">
                            <div class="group-categoria">
                                @switch($libro->categoria->id)
                                @case(1)
                                <span class="group-all sistemas">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @case(2)
                                <span class="group-all contaduria">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @case(3)
                                <span class="group-all mecatronica">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @case(4)
                                <span class="group-all electromecanica">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @case(5)
                                <span class="group-all gestion">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @case(6)
                                <span class="group-all industrial">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @case(7)
                                <span class="group-all electronica">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                                @default
                                @endswitch
                            </div>
                        </td>

                        @if(count($libros) > 8 && $cont === 8)
                    <tr colspan="60">
                        @for ($i = 1; $i <= 7; $i++) <br>
                            @endfor
                    </tr>
                    @endif
                    @php
                    $cont++;
                    $total_pages++;
                    @endphp
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </main>
    @if ($base64Footer)
    <img src="{{ $base64Footer }}" alt="Pie de página" style="width: 100%;">
    @endif
</body>

</html>