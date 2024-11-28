<div>
    <div class="bg-white p-6 rounded-lg shadow-lg mt-10">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-2xl font-semibold">Informe Estadístico</h2>
                <p class="text-gray-500">Total de préstamos.</p>
            </div>
        </div>
        <canvas id="inventoryChart"></canvas>
    </div>

    @push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        
    const cantidadPrestamos = @json($cantidadPrestamos);
    const presCarrera = @json($PPC);
    const labelCar = @json($presCarrera)

    // Labels del backend
    const labels = Object.keys(labelCar);
    const data = Object.values(presCarrera);
    console.log(presCarrera);
    console.log(labels);
    
    



    const ctx = document.getElementById('inventoryChart').getContext('2d');//En cambio, la variable ctx, nos ayudará a renderizar la gráfica.

    new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total préstamos',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 20
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
       
        });

</script>
@endpush


