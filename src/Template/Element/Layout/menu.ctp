<div class="hdr">

    <section id="menu">
        <div class="container-fluid">
            <div class="row">

                <nav class="navbar navbar-expand-lg fixed-top">

                    <?= $this->Html->link(
                        $this->Html->image('logo-head.png',[ 'width' => '200', 'class' => 'img-fluid']),'/', ['escape' => false]
                    )?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">
                                    <i class="fas fa-home"></i> INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.html">
                                    <i class="fa fa-user"></i> REGISTRO CLIENTES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">
                                    <i class="fas fa-sign-in-alt "></i> INTRANET</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>

</div> <!-- hdr -->
