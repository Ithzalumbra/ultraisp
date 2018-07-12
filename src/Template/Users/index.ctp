<section id="m-search" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Usuarios</h2>
            </div>

            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3 mb-md-0">
                <?php echo  $this->Form->create(); ?>
                <?php echo  $this->Form->control('rut', ['class' => 'form-control', 'placeholder' => 'RUT', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3 mb-md-0">
                <?php echo  $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <div class="btn-group" role="group">
                    <?php echo  $this->Form->button('Buscar', [
                        'type' => 'submit',
                        'class' => 'btn w-100'])
                    ?>
                    <?php echo  $this->Html->link('<i class="fas fa-broom"></i> Limpiar',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-info', 'escape' => false])
                    ?>
                    <?php echo  $this->Html->link('<i class="fas fa-plus"></i> Agregar Usuario',
                        ['action' => 'add'],
                        ['class' => 'btn btn-outline-info', 'escape' => false])
                    ?>
                    <?php echo  $this->Form->end(); ?>
                </div>
            </div>

            <div class="col-12 col-md-8 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">RUT</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tipo de usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($users != null): ?>

                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo  $this->Number->format($user->id) ?></td>
                                <td><?php echo  h($user->rut) ?></td>
                                <td><?php echo  h($user->name) ?></td>
                                <td><?php echo  $user->address != null ? $user->address : 'No tiene' ?></td>
                                <td><?php echo  $user->email != null ? $user->email : 'No tiene' ?></td>
                                <td><?php echo  $user->status == 1 ? 'Habilitado' : 'Deshabilitado' ?><?php echo  $this->Form->postLink(__('<i class="fas fa-sync-alt"></i>'), ['action' => 'changeState', $user->id], ['escape' => false]) ?>

                                </td>
                                <td><?php echo  h($user->UserTypes['name'])?></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No se encontro ningun registro</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>