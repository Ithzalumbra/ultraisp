<section id="m-result" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Resultado de Muestras</h2>
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <a href="/muestras" class="btn w-100"><i class="fas fa-angle-double-left"></i> Volver</a>
            </div>

            <div class="col-12">
                <canvas id="myChart" ></canvas>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Tipo de An&aacute;lisis</th>
                        <th scope="col">Resultado en PPM</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($analysisDetails as $asam): ?>

                        <tr>
                            <td><?php echo h($asam->analysis_type->name) ?></td>
                            <td><?php echo h($asam->ppm) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $data['name']?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $data['ppm']?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>