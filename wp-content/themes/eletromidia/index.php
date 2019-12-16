<?php get_header(); ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="main-slider" style="margin-top: 59px;">

                    <?php
                        $args = array(
                                'post_type'         => 'slides_home',
                                'posts_per_page'    =>  -1
                        );

                        $query = new WP_Query($args);

                        if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                        $img_desktop = get_field('imagem_desktop');
                        $img_mobile = get_field('imagem_mobile');
                        $link = get_field('link');
                    ?>

                        <div class="slide">

                            <?php if($link != ''): ?>
                                <a style="outline: none !important;" href="<?= $link ?>" target="_blank">
                            <?php endif; ?>

                                <img class="img-fluid d-block d-lg-none" src="<?= $img_mobile['url'] ?>" alt="<?= $img_mobile['alt'] ?>">
                                <img class="img-fluid d-none d-lg-block" src="<?= $img_desktop['url'] ?>" alt="<?= $img_desktop['alt'] ?>">

                            <?php if($link != ''): ?>
                                </a>
                            <?php endif; ?>


                        </div>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <div class="slide text-center bg-light" style="margin-top: 40px;">
                            <p class="py-10"><i class="fas fa-exclamation-triangle"></i> Nenhum slide foi encontrado.</p>
                        </div>

                    <?php endif; ?>



                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row py-5">
            <div class="col-12 d-flex flex-column align-items-center">
                <p class="h5 text-purple mb-4 text-center">Assine nossa newsletter e receba novidades por e-mail</p>

                <form class="w-100">
                    <div class="form-row d-flex flex-row justify-content-center">

                        <div class="col-md-5">
                            <label class="sr-only" for="inputEmail">Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Assinar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>'
</section>

<section style="background: url(<?= get_template_directory_uri() . '/imgs/bg-pins.jpg'?>) no-repeat center; background-size: cover; min-height: 576px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center py-5">
                <h2 class="text-secondary h5">QUEM SOMOS</h2>
                <h3 class="text-purple h2 mb-4 font-weight-bold">Impactamos mais de 13 milhões de pessoas que trabalham, estudam, consomem, vivem e se mexem nas cidades.</h3>
                <p class="mb-5">Se quer fazer sua marca acontecer, você tem que estar presente na vida de quem mais influencia o consumo nos grandes centros: os influenciadores urbanos. As milhões de pessoas que trabalham, estudam, fazem compras, se divertem e se movimentam nas cidades.</p>
                <a class="btn btn-primary" href="<?= get_page_link(2) ?>">SABER MAIS <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5 pb-1">

        <div class="row mb-4 justify-content-center">
            <div class="col-12 text-center">
                <h2 class="text-secondary h5">PRODUTOS</h2>
                <h3 class="text-purple h2 mb-4 font-weight-bold">Conheça nosso portfólio</h3>
            </div>
<!--            <div class="col-md-8">-->
<!--                <form>-->
<!--                    <div class="form-row">-->
<!---->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group">-->
<!--                                <label class="sr-only" for="selectCategory">Exibir todas as categorias</label>-->
<!--                                <select class="form-control" id="selectCategory">-->
<!--                                    <option>Exibir todas as categorias</option>-->
<!--                                    <option>Aeroportos</option>-->
<!--                                    <option>Bancas de Jornal</option>-->
<!--                                    <option>Estabelecimentos Comerciais</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group">-->
<!--                                <label class="sr-only" for="selectState">Disponível em qualquer estado</label>-->
<!--                                <select class="form-control" id="selectState">-->
<!--                                    <option>Disponível em qualquer estado</option>-->
<!--                                    <option>São Paulo</option>-->
<!--                                    <option>Rio de Janeiro</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
        </div>

        <div class="row justify-content-center">

            <?php

            $terms = get_terms( array(
                'taxonomy' => 'produtos',
                'hide_empty' => false,
            ) );

            foreach ($terms as $term):

                if($term->term_id == 1) break;

                $thumbnail = get_field('thumbnail_categoria', $term);
                $symbol = get_field('simbolo_categoria', $term);
                ?>

                <div class="col-md-4 mb-4">
                    <div class="card text-center w-100">
                        <img src="<?= $thumbnail['url'] ?>" class="card-img-top" alt="<?= $term->name ?>">
                        <div style="margin-top: -45px;">
                            <div class="bg-white d-inline-block p-2 rounded-circle">
                                <img width="80" src="<?= $symbol['url'] ?>" alt="<?= $term->name ?>">
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <h4 class="card-title text-pink mb-1 h5"><?= $term->name ?></h4>
                            <p class="card-text text-secondary mb-4"><?= $term->description ?></p>
<!--                            <div class="text-secondary my-4 py-2" style="border-top: 1px solid #ced4da; border-bottom: 1px solid #ced4da;">-->
<!--                                <small class="d-block">-->
<!--                                    Diponibilidade em: SP | RJ-->
<!--                                </small>-->
<!--                            </div>-->
                            <a href="<?= get_term_link($term->term_id) ?>" class="btn btn-primary">SABER MAIS <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>

<section style="background: url(<?= get_template_directory_uri() . '/imgs/bg-data.jpg' ?>) no-repeat center; background-size: cover;">
    <div class="container-fluid p-5">
        <div class="row p-5" style="border: 5px solid #764ca5;">

            <div class="col-12 d-flex flex-row justify-content-center mb-5">
                <img class="img-fluid mr-4" style="max-width: 300px;" src="<?= get_template_directory_uri() ?>/imgs/icon-eye.png" alt="Impactamos mais de 10 milhões de pessoas diariamente">
                <div class="text-white h1 font-weight-light">
                    Impactamos mais de <strong class="text-purple display-3 font-weight-bold"><br>10 milhões</strong><br>de pessoas diariamente
                </div>
            </div>

            <div class="col-12 text-center mb-5">
                <div class="text-white h1 border-bottom border-white font-weight-light d-inline-block">Estamos presentes em mais de <strong class="text-purple">5.000 locais</strong></div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="font-weight-light justify-content-center d-flex flex-row align-items-end text-white">
                    <img class="mr-2 pb-1" height="35" src="<?= get_template_directory_uri() ?>/imgs/icon-banco.svg" alt="Banco">
                    <strong class="text-purple h2 d-block mb-0 mr-2" style="min-width: 60px;">803</strong>
                    <div class="pb-1">Bancos</div>
                </div>
            </div>

        </div>
    </div>
</section>

<section>

    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="text-secondary h5">CASES</h2>
                <h3 class="text-purple h2 mb-4 font-weight-bold">Conheça os resultados de marcas que escolheram estar no caminho de seu público com a Eletromidia.</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12 px-0 mb-5">
                <div class="cases-slider" style="line-height: 0;">

                    <?php
                        $args = array(
                          'post_type'   =>  'cases',
                          'posts_per_page'  => -1
                        );

                        $query = new WP_Query($args);

                        if($query->have_posts()): while($query->have_posts()): $query->the_post();
                    ?>

                    <div class="cases-slide px-2">
                        <a href="<?= get_the_permalink() ?>">
                            <figure class="m-0 position-relative">
                                <div class="mask-black-transparent"></div>
                                <img class="img-fluid w-100" src="<?= get_the_post_thumbnail_url('', 'general-thumb') ?>" alt="<?= get_the_title() ?>">
                                <figcaption><?= get_the_title() ?></figcaption>
                            </figure>
                        </a>
                    </div>

                    <?php endwhile; endif; wp_reset_query(); ?>

                </div>
            </div>
            <div class="col-12 text-center">
                <a href="<?= get_post_type_archive_link('cases') ?>" class="btn btn-primary-outline">VER TODOS OS CASES</a>
            </div>
        </div>
    </div>

</section>

<section style="background: url('<?= get_template_directory_uri() ?>/imgs/bg-icon-gray.jpg') no-repeat center; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center py-5">

            <div class="col-lg-10 text-center">
                <h2 class="text-secondary h5">IMPRENSA</h2>
                <h3 class="text-purple h2 mb-4 font-weight-bold">Fique por dentro do nosso universo</h3>
            </div>

            <?php
                $args = array(
                    'post_type'   =>  'imprensa',
                    'posts_per_page'  => -1
                );

                $query = new WP_Query($args);

                if($query->have_posts()): while($query->have_posts()): $query->the_post();
            ?>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center w-100">
                            <img src="<?= get_the_post_thumbnail_url('', 'general-thumb') ?>" class="card-img-top" alt="<?= get_the_title() ?>">
                            <div class="card-body pt-2">
                                <h4 class="card-title text-pink mb-2 h5 mt-1"><?= get_the_title() ?></h4>
                                <p class="card-text text-secondary mb-4"><?= get_the_excerpt_max_charlength(70) ?></p>
                                <a href="<?= get_the_permalink() ?>" class="btn btn-primary">SABER MAIS <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <div class="col-12 text-center mt-4">
                <a href="<?= get_post_type_archive_link('imprensa') ?>" class="btn btn-primary-outline">VER TODOS OS POSTS</a>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>

