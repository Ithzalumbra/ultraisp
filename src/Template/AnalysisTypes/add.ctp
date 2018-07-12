<section id="m-register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Agregar Tipos de Analisis</h2>
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <a href="/tipo-de-analisis" class="btn w-100"><i class="fas fa-angle-double-left"></i> Volver</a>
            </div>
            <div class="col-8">

                <?php echo $this->Form->create('')?>
                <?php echo  $this->Form->control('name',['class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Nombre tipo de analisis'])?>
                <br>
                <?php echo  $this->Form->button('Guardar', [
                    'type' => 'submit',
                    'class' => 'btn '])
                ?>
                <?php echo $this->Form->end()?>
            </div>
        </div>
    </div>
</section>