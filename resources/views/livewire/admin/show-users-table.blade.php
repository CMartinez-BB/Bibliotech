<div class="w-full h-auto" x-data="{ open: false, selectedUser: null }">
    <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th class="w-1/4 px-3 py-4 font-medium text-gray-900">Nombre</th>
                <th class="px-3 py-4 font-medium text-gray-900">Correo</th>
                <th class="px-3 py-4 font-medium text-gray-900 hidden lg:table-cell">Fecha de ingreso</th>
                <th class="px-3 py-4 font-medium text-gray-900 hidden lg:table-cell">Télefono</th>
                <th class="px-3 py-4 font-medium text-gray-900">Último acceso</th>
                <th class="px-3 py-4 font-medium text-gray-900">Herramientas</th>
            </tr>
        </thead>

        @foreach ($users as $user)
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-3 py-4 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700 capitalize">{{ $user->name . ' ' . $user->apellido_paterno
                            . ' ' . $user->apellido_materno }}
                        </div>
                    </div>
                </th>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">{{ $user->email }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">
                    {{\Carbon\Carbon::parse($user->fecha)->format('d-M-Y') }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">{{ $user->telefono }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">
                    {{\Carbon\Carbon::parse($user->updated_at)->format('d-M-Y') }}</td>

                {{-- Herramientas --}}
                <td class="table-cell py-4">
                    <div class="flex items-center gap-4 text-indigo-600 text-base">
                        <button @click="open = true; selectedUser = {{ json_encode([
                            'name' => $user->name,
                            'apellido_paterno' => $user->apellido_paterno,
                            'apellido_materno' => $user->apellido_materno,
                            'email' => $user->email,
                            'telefono' => $user->telefono,
                            'fecha' => $user->fecha ? \Carbon\Carbon::parse($user->fecha)->format('d-M-Y') : null,
                            'ultimo_acceso' => $user->updated_at ? \Carbon\Carbon::parse($user->updated_at)->format('d-M-Y') : null
                        ]) }};">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button wire:click="$emit('delete', '{{ $user->id }}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <a href="{{ route('admin.edit', $user->id) }}">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-4 w-96">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold">Información del Usuario</h2>
                <button @click="open = false" class="text-indigo-600 font-bold">x</button>
            </div>

            <div x-show="selectedUser" class="text-gray-800 text-sm space-y-2">
                <p><strong>Nombre:</strong> <span
                        x-text="selectedUser.name + ' ' + selectedUser.apellido_paterno + ' ' + selectedUser.apellido_materno"></span>
                </p>
                <p><strong>Correo:</strong> <span x-text="selectedUser.email"></span></p>
                <p><strong>Teléfono:</strong> <span x-text="selectedUser.telefono"></span></p>
                <p><strong>Fecha de ingreso:</strong> <span x-text="selectedUser.fecha"></span></p>
                <p><strong>último acceso:</strong> <span x-text="selectedUser.ultimo_acceso"></span></p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
{{-- Fontawesome --}}
<script src="https://kit.fontawesome.com/85d631ed4b.js" crossorigin="anonymous"></script>

{{-- Sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- Alert --}}
<script>
    Livewire.on('delete', (userId) => {
        Swal.fire({
        title: 'esta seguro de eliminar este usuario?',
        text: "Recuerda que no se podra recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4FA755',
        cancelButtonColor: '#694A97',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            // Delete book and authors
            Livewire.emit('deleteUser', userId);
            Swal.fire(
            'Eliminado!',
            'El usuario ha sido eliminado.',
            'success'
            )
        }
        })
    });
</script>
@endpush