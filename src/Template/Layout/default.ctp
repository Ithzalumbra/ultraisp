<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->css(['bootstrap', 'bootstrap-grid', 'bootstrap-reboot', 'font-awesome', 'app']) ?>
    <?= $this->Html->script(['jquery-3.3.1', 'popper', 'bootstrap', 'app']) ?>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>Instituto de Salud P&uacute;blica</title>
</head>
<body>
<div class="wrp">

    <?= $this->element('Layout/menu') ?>
    <div class="cnt">

        <?= $this->fetch('content') ?>

    </div> <!-- cnt -->

</div> <!-- wrp -->

<?= $this->element('Layout/footer') ?>
</body>
</html>
