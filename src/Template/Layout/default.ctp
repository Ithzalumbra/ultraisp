<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $this->Html->css(['bootstrap', 'bootstrap-grid', 'bootstrap-reboot', 'font-awesome', 'app', 'bootstrap-datepicker3.min']) ?>
    <?php echo $this->Html->script(['jquery-3.3.1', 'bootstrap-datepicker.min', 'popper', 'bootstrap', 'app', 'Chart']) ?>
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>Instituto de Salud P&uacute;blica</title>
</head>
<body>
<div class="wrp">

    <?php if($currentUser == null){
        echo $this->element('Layout/menu');}
    else {
        echo $this->element('Layout/menulog');
    }
        ?>
    <div class="row justify-content-center">
        <?php echo$this->Flash->render()?>
    </div>
    <div class="cnt">

        <?php echo $this->fetch('content') ?>

    </div> <!-- cnt -->

</div> <!-- wrp -->

<?php echo $this->element('Layout/footer') ?>
</body>
</html>
