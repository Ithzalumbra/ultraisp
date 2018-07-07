<section id="m-search" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Muestras</h2>
            </div>
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3 mb-md-0">
                <input  type="text" class="form-control" placeholder="Código Muestra">
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <button type="submit" class="btn w-100">Buscar</button>
            </div>
            <div class="col-12 col-md-8 mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">C&oacute;digo de la Muestra</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? if($analysisResults != null):?>
                        <? foreach ($analysisResults as $asam):?>
                            <tr>
                                <td><?=h($asam->id)?></td>
                                <td><a href="/muestras/detalles/<?=h($asam->id)?>"><?=h($asam->status) == 0 ? 'En Proceso' : 'Terminado'?></a></td>
                            </tr>
                        <? endforeach;?>
                    <? else: ?>
                        <tr>
                            <td colspan="2">No se encontro ningun registro</td>
                        </tr>
                    <? endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>