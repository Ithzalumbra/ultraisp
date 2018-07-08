<div class="hdr">

    <section id="menu">
        <div class="container-fluid">
            <div class="row">

                <nav class="navbar navbar-expand-lg fixed-top">

                    <?= $this->Html->link(
                        $this->Html->image('logo-head.png', ['width' => '200', 'class' => 'img-fluid']), '/', ['escape' => false]
                    ) ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?= $this->Html->link('<i class="fas fa-home"></i> INICIO', '/', ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                            <? if ($currentUser['id'] == 1): ?>
                                <li class="nav-item">
                                    <?= $this->Html->link('<i class="fas fa-home"></i> USUARIOS', '/usuarios', ['escape' => false, 'class' => 'nav-link']) ?>
                                </li>
                            <? endif; ?>
                            <li class="nav-item">
                                <?= $this->Html->link('<i class="fas fa-flask"></i> MUESTRAS', '/muestras', ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link('<i class="fas fa-sign-out-alt "></i> CERRAR SESION', '/logout', ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>

</div> <!-- hdr -->
