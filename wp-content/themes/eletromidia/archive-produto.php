<?php get_header(); ?>

<section>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center" style="background: url(<?= get_template_directory_uri() . '/imgs/inner-header.jpg'?>) no-repeat center; background-size: cover; height: 400px;">

                <div class="mask mask-dark"></div>

                <div class="position-relative pt-6 d-flex">
                    <div class="position-relative text-center">
                        <h1 class="text-uppercase text-light font-weight-bold mb-2">Produtos</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb rounded-pill d-inline-flex py-1 px-3 bg-dark-opacity">
                                <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<section>

    <div class="container py-5 pb-1">

<!--        <div class="row mb-4 justify-content-center">-->
<!---->
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
<!--        </div>-->

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
<?php get_footer(); ?>