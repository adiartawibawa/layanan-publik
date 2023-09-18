<div wire:poll.visible>
    <x-card>
        {{-- @json($dummy) --}}
        <div>
            <canvas id="chart" width="800" height="450"></canvas>
        </div>
    </x-card>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script>
        const chart = new Chart(document.getElementById("chart"), {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: @json($dataset),
            },
            options: {
                title: {
                    display: true,
                    text: 'Pelayanan Kami'
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>
</div>
