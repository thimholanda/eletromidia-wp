<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Eletromidia - A mais completa plataforma de mídia urbana do Out of Home brasileiro.">
    <meta name="author" content="Eletromidia">
    <meta name="title" content="Eletromidia - Conectando marcas com influenciadores urbanos ." />
    <meta name="url" content="http://www.eletromidia.com.br" />
    <meta name="Keywords" content="OOH, Eletromidia, publicidade em aeroportos, marketing, painel, painéis, led, metro SP, metro RJ, metro RIO, metro Salvador, VLT, publicidade, out of home, tecnologia OOH, CPTM, supervia, plataforma de midia, metrô SP, mobiliarios urbanos, ponto de onibus, banca de jornal"/>
    <meta name="Description" content=""/>
    <meta name="robots" content="ALL"/>
    <meta name="googlebot" content="INDEX, FOLLOW"/>
    <meta name="distribution" content="Global"/>
    <meta name="rating" content="General"/>
    <meta name="copyright" content="Copyright 2019 - Eletromídia"/>
    <meta http-equiv="reply-to" content="ti@eletromidia.com.br"/>
    <meta http-equiv="Content-Language" content="pt-BR"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
    <link rel="preload" href="<?= get_template_directory_uri() ?>/css/styles.css" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/styles.css">
    <!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
    <title>A mais completa plataforma de mídia urbana do out of home.</title>
    <?php wp_head(); ?>

</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-purple">

        <a class="navbar-brand" href="<?= get_home_url() ?>">
            <img src="<?= get_template_directory_uri() ?>/imgs/eletromidia.svg" width="185" alt="Eletromidia">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white h2 mb-0"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-uppercase" style="font-size: .9rem;">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= get_home_url() ?>">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= get_page_link(2) ?>">Quem Somos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= get_post_type_archive_link('produto') ?>">Produtos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= get_post_type_archive_link('cases') ?>">Cases</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= get_post_type_archive_link('imprensa') ?>">Imprensa</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Contato</a>
                </li>
            </ul>

            <ul class="nav ml-3 h5">
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

    </nav>
</header>