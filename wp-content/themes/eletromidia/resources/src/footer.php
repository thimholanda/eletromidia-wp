<footer class="bg-purple">
    <div class="container py-5">

        <div class="row">

            <div class="col-md-4">
                <form class="w-100">
                    <div class="form-row d-flex flex-row justify-content-center">

                        <div class="col-auto flex-grow-1">
                            <label class="sr-only" for="inputEmail">Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary-outline mb-2">Assinar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">

                <ul class="nav" style="font-size: .9rem;">

                    <li class="nav-item active">
                        <a class="nav-link text-white text-uppercase" href="<?= get_home_url() ?>">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white text-uppercase" href="<?= get_page_link(2) ?>">Quem Somos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white text-uppercase" href="<?= get_post_type_archive_link('produto') ?>">Produtos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white text-uppercase" href="<?= get_post_type_archive_link('cases') ?>">Cases</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white text-uppercase" href="<?= get_post_type_archive_link('imprensa') ?>">Imprensa</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white text-uppercase" href="#">Contato</a>
                    </li>
                </ul>

                <ul class="nav h5">
                    <li class="nav-item">
                        <a class="nav-link text-white px-1" href="#"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-1" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-1" href="#"><i class="fab fa-twitter-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-1" href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>

            </div>

        </div>

        <div class="row py-4">
            <div class="col-12">
                <hr class="border-white">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <img style="max-width: 250px;" class="img-fluid mb-5" src="<?= get_template_directory_uri() ?>/imgs/eletromidia-footer.svg" alt="Eletromidia">
                <p class="text-white" style="font-size: 1.05rem;">VENCEDORA DO CABORÉ 2018</p>
            </div>
            <div class="col-md-8 d-flex flex-row">

                <ul class="nav flex-column d-inline-flex text-right flex-shrink-0" style="font-size: .9rem;">
                    <li class="nav-item"><a class="nav-link text-white" href="#">SÃO PAULO</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">RIO DE JANEIRO</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">SALVADOR</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">BRASÍLIA</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">BELO HORIZONTE</a></li>
                </ul>

                <address class="d-flex text-white px-4">
                    <p>
                        Tel.: +55 11 3065 7522<br>
                        comercial@eletromidia.com.br<br>
                        <br>
                        Rua Leopoldo Couto de Magalhães Jr, Nº 758 - 7º andar<br>
                        Itaim Bibi, São Paulo - SP - CEP 04542-000
                    </p>
                </address>

            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>