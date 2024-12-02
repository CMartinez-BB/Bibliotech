<section class="flex flex-col justify-center items-center mx-6">

    @if($statusMessage)
    <div id="alert-message"
        class="w-full uppercase border {{ $found ? 'border-green-600 bg-green-100 text-green-600' : 'border-red-600 bg-red-100 text-red-600' }} font-bold p-2 my-3 text-sm text-center">
        {{ $statusMessage }}
    </div>
    @endif

    <livewire:metodos-trimestres />

    @if(count($libroPrestamos) > 0)
    <table
        class="table-auto text-xs w-full m-auto border-collapse border bg-white text-left text-gray-500 justify-center">
        <thead class="bg-gray-50">
            <tr>
                <th class="w-1/4 px-3 py-4 font-medium text-gray-900 xl:table-cell text-align">Carrera</th>
                <th class="w-3/6 px-3 py-4 font-medium text-gray-900 xl:table-cell text-align">Libro</th>
                <th class="px-3 py-4 font-medium text-gray-900 xl:table-cell text-align">Cantidad</th>
            </tr>
        </thead>
        @foreach($libroPrestamos as $prestamo)
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50 border">
                <!-- Columna Carrera -->
                <td class="px-3 py-4 xl:table-cell text-sm">
                    {{ $prestamo->libro->categoria->categoria }}
                </td>

                <!-- Columna Libro -->
                <td class="px-3 py-4 xl:table-cell text-sm">
                    {{ $prestamo->libro->titulo }}
                </td>

                <!-- Columna Cantidad/Préstamos -->
                <td class="px-3 py-4 xl:table-cell text-sm">
                    {{ $prestamo->total_prestamos }}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @endif
</section>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        // Escuchar el evento 'hideAlert' para ocultar la alerta después de 1 segundo
        Livewire.on('hideAlert', () => {
            setTimeout(() => {
                let alert = document.getElementById('alert-message');
                if (alert) {
                    alert.style.display = 'none';  // Ocultar la alerta
                }
            }, 1000); // 1 segundo
        });
    });
</script>
@endpush