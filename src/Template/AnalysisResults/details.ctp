<section id="m-result" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Resultado de Muestras</h2>
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <a href="/muestras" class="btn w-100"><i class="fas fa-angle-double-left"></i>Volver</a>
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
                    <? foreach ($analysisDetails as $asam): ?>

                        <tr>
                            <td><?= h($asam->analysis_type->name) ?></td>
                            <td><?= h($asam->ppm) ?></td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>