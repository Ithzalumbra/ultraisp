<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisSample $analysisSample
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?/*= __('Actions') */?></li>
        <li><?/*= $this->Html->link(__('List Analysis Samples'), ['action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) */?></li>
    </ul>
</nav>
<div class="analysisSamples form large-9 medium-8 columns content">
    <?/*= $this->Form->create($analysisSample) */?>
    <fieldset>
        <legend><?/*= __('Add Analysis Sample') */?></legend>
        <?php
/*            echo $this->Form->control('date');
            echo $this->Form->control('temperatureSample');
            echo $this->Form->control('quantitySample');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('employee_rut');
        */?>
    </fieldset>
    <?/*= $this->Form->button(__('Submit')) */?>
    <?/*= $this->Form->end() */?>
</div>-->

<section id="m-register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Registro de Muestras</h2>
            </div>
            <div class="col-6 text-right">
                <h6>C&oacute;digo del Cliente: 123</h6>
            </div>
            <div class="col-6 text-left">
                <h6>C&oacute;digo de Muestra: 123</h6>
            </div>
            <div class="col-8">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Tipo de An&aacute;lisis</th>
                        <th scope="col">PPM de la Muestra</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Micotoxinas</td>
                        <td><input class="form-control w-75" type="text"></td>
                    </tr>
                    </tbody>
                </table>
                <button class="btn" type="submit">Guardar An&aacute;lisis</button>
            </div>
        </div>
    </div>
</section>