<div
     class="grid items-center p-4 bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200 rounded-lg"
>
    <div class="">
        <h3 class="font-semibold text-center">Revenue by Brand</h3>

        <!-- sales chart - quarterly / annually / monthly -->
        <div class="p-2">
            <div class="relative w-64 h-64 grid place-content-center">
                @if(count($brands) > 0)
                    <canvas id="brandSalesChart" x-ref="canvas"></canvas>
                @else
                    <p class="text-center text-gray-600 dark:text-gray-400">No sales by brand data available.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- total sales -->
    <!-- top products - per week / per month -->

    @script
    <script>

        const ctx = document.getElementById('brandSalesChart');
        let darkMode = JSON.parse(localStorage.getItem('darkMode'));

        let brands = $wire.categoryChartData;

        const branddoughnutLabel = {
            id: 'brandDoughnutLabel',
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

        const brandDoughnutLabels = {
            id: 'brandDoughnutLabels',
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
            type: 'doughnut',
            data: {
                labels: brands.labels,
                datasets: [{
                    label: 'Ksh',
                    data: brands.revenue_dataset,
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
                    hoverOffset: 10,
                    align: 'center'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            },
            plugins: [
                brandDoughnutLabels
            ],
        }

        let brandSalesChart = new Chart(ctx, config)
    </script>
    @endscript
</div>
