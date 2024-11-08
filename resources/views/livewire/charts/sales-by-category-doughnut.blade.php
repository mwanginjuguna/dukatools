<div
     class="grid items-center p-4 bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200 rounded-lg"
>
    <div class="relative overflow-x-auto">
        <h3 class="font-semibold text-center">Revenue by Category</h3>

        <!-- sales chart - quarterly / annually / monthly -->
        <div class="p-2 ">
            <div class="relative w-full h-44 md:h-64 grid place-content-center">
                @if(count($categories) > 0)
                    <canvas id="mySalesChart" x-ref="canvas"></canvas>
                @else
                    <p class="text-center text-gray-600 dark:text-gray-400">No sales by category data available.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- total sales -->
    <!-- top products - per week / per month -->

    @script
    <script>

        const ctx = document.getElementById('mySalesChart');
        let darkMode = JSON.parse(localStorage.getItem('darkMode'));

        let categories = $wire.categoryChartData;

        const doughnutLabel = {
            id: 'categoryDoughnutLabel',
            beforeDraw: function(chart, args, options) {
                const ctx = chart.ctx;
                ctx.save();

                const coorX = chart.getDatasetMeta(0).data[0].x;
                const coorY = chart.getDatasetMeta(0).data[0].y;
                ctx.fillStyle = 'rgba(0, 0, 0)';
                ctx.font = '12px Public-Sans bold';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'center';
                ctx.fillText('Ksh per category', coorX, coorY);
                ctx.restore();
            }
        }

        const doughnutLabels = {
            id: 'categoryDoughnutLabel',
            beforeDraw: function(chart, args, options) {
                const ctx = chart.ctx;
                ctx.save();

                const coorX = chart.getDatasetMeta(0).data[0].x;
                const coorY = chart.getDatasetMeta(0).data[0].y;
                // ctx.fillStyle = 'rgba(0, 0, 0)';
                // ctx.font = '12px Public-Sans bold';
                // ctx.textAlign = 'center';
                // ctx.textBaseline = 'center';
                // ctx.fillText('Ksh per category', coorX, coorY);
            }
        }

        let config = {
            type: 'bar',
            data: {
                labels: categories.labels,
                datasets: [{
                    label: 'Ksh',
                    data: categories.revenue_dataset,
                    backgroundColor: [
                        '#fbbf24',
                        '#bef264',
                        '#6ee7b7',
                        '#67e8f9',
                        '#7dd3fc',
                        '#a5b4fc',
                        '#c084fc',
                        '#e879f9',
                        '#fb7185'
                    ],
                    barPercentage: 0.4,
                    borderRadius: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            },
            plugins: [
                doughnutLabels
            ],
            maintainAspectRatio: false,
            responsive: false,
        }

        let mySalesChart = new Chart(ctx, config)
    </script>
    @endscript
</div>
