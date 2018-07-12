<div class="hdr">

    <section id="menu">
        <div class="container-fluid">
            <div class="row">

                <nav class="navbar navbar-expand-lg fixed-top">

                    <?php echo $this->Html->link(
                        $this->Html->image('logo-head.png',[ 'width' => '200', 'class' => 'img-fluid']),
                        '#',
                        ['class' => 'navbar-brand col-4 col-md-4', 'escape' => false]
                    )?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?php echo $this->Html->link('<i class="fas fa-home"></i> INICIO','/',['escape' => false, 'class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                    <?php echo $this->Html->link('<i class="fa fa-user"></i> REGISTRO CLIENTES','/registro',['escape' => false, 'class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                    <?php echo $this->Html->link('<i class="fas fa-sign-in-alt "></i> INTRANET','/login',['escape' => false, 'class' => 'nav-link'])?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>

</div> <!-- hdr -->
