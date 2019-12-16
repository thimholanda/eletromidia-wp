<?php get_header(); ?>

<?php
    $term = get_queried_object();
    $header = get_field('cabecalho_categoria', $term);
    $symbol = get_field('simbolo_categoria', $term);
    $tipo = get_field('tipo', $term);
    $texto = get_field('texto', $term);
    $midia = get_field('midia', $term);
?>

<section>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center" style="background: url(<?= $header['url'] ?>) no-repeat center; background-size: cover; height: 400px;">

                <div class="mask mask-dark"></div>

                <div class="position-relative pt-6 d-flex">
                    <div class="position-relative text-center">
                        <h2 class="h5 mb-2"><span class="text-uppercase badge badge-pill badge-light text-purple"><?= $tipo ?></span></h2>
                        <h1 class="text-uppercase text-light font-weight-bold mb-2"><?= $term->name ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb rounded-pill d-inline-flex w-auto py-1 px-3 bg-dark-opacity">
                                <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= get_post_type_archive_link('produto') ?>">Produtos</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $term->name ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>

            <div class="col-12">

                <div class="position-relative text-center mb-3" style="margin-top: -60px;">
                    <div class="bg-white p-2 rounded-circle d-inline-block">
                        <img width="100" src="<?= $symbol['url'] ?>" alt="<?= $term->name ?>">
                    </div>
                </div>

                <?php if($texto != '' || $midia != ''): ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-pink mb-3"><?= $term->description ?></h3>

                                <?php if($texto != ''): ?>
                                    <p class="text-light-gray justify-content-center mb-3"><?= $texto ?></p>
                                <?php endif; ?>

                                <?php if($midia != ''): ?>
                                    <a class="btn btn-primary mb-4" target="_blank" href="<?= $midia ?>">Baixar mídia kit &nbsp;<i class="fas fa-arrow-down"></i></a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            </div>

        </div>
    </div>
</section>

<section>
    <div class="container py-5 pb-1">

        <div class="row mb-4 justify-content-center">
            <div class="col-12 text-center">
                <h3 class="text-purple mb-2 h4">Confira as oportunidades disponíveis</h3>
            </div>
        </div>

        <div class="row mb-2 justify-content-center">

            <?php
                $args = array(
                        'post_type'         =>  'produto',
                        'posts_per_page'    =>  -1,
                        'tax_query'         =>  array(
                                array(
                                        'taxonomy'  =>  'produtos',
                                        'field'     =>  'term_id',
                                        'terms'     =>  $term->term_id
                                )
                        )

                );

                $query = new WP_Query($args);

                if($query->have_posts()): while ($query->have_posts()): $query->the_post();
            ?>


            <div class="col-md-4 mb-4">
                <div class="card text-center w-100">
                    <img src="<?= get_the_post_thumbnail_url('', 'general-thumb') ?>" class="card-img-top" alt="<?= get_the_title() ?>">
                    <div class="card-body pt-2">
                        <h4 class="card-title text-pink mb-4 h5 mt-1"><?= get_the_title() ?></h4>
                        <a href="<?= get_the_permalink() ?>" class="btn btn-primary">SABER MAIS <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <?php endwhile; endif; wp_reset_query(); ?>

        </div>

        <?php
            $terms = get_terms( array(
                'taxonomy' => 'produtos',
                'hide_empty' => false,
                'meta_key' => 'tipo',
                'meta_value' => $tipo,
                'exclude'   => $term->term_id
            ) );

            if(count($terms) > 0) :
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center px-4 py-5">
                        <h5 class="text-light-gray mb-6">Confira outros produtos relacionados</h5>

                        <div class="row justify-content-center">

                            <div class="col-md-8">

                                <div class="row justify-content-center">

                                    <?php foreach ($terms as $term): ?>

                                        <?php
                                            $thumbnail = get_field('thumbnail_categoria', $term);
                                            $symbol = get_field('simbolo_categoria', $term);
                                        ?>

                                        <div class="col-md-6 px-md-4">
                                            <a class="btn-generic" href="<?= get_term_link($term->term_id) ?>">
                                                <img class="mb-2" width="100" src="<?= $symbol['url'] ?>" alt="<?= $term->name ?>">
                                                <h4 class="card-title text-pink mb-4 h5 mt-1"><?= $term->name ?></h4>
                                                <p class="text-light-gray"><?= $term->description ?></p>
                                            </a>
                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>

    </div>
</section>

<?php
    $terms = get_terms( array(
        'taxonomy' => 'produtos',
        'hide_empty' => false
    ) );

    if(count($terms) > 0) :
?>

    <section class="shadow-inner-top position-relative" style="background: url('<?= get_template_directory_uri() ?>/imgs/bg-icon-gray.jpg') no-repeat center; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center py-5 text-center">
            <div class="col-12">
                <h5 class="text-light-gray mb-5">Todos os produtos</h5>
            </div>
            <div class="col-12 d-flex justify-content-center flex-wrap">

                <?php foreach ($terms as $term): ?>

                <?php
                    $symbol = get_field('simbolo_categoria', $term);
                ?>

                    <a class="btn-generic p-2" href="<?= get_term_link($term->term_id) ?>">
                        <div class="card bg-white" style="width: 180px;">
                            <div class="card-body">
                                <img class="mb-2" height="70" src="<?= $symbol['url'] ?>" alt="<?= $term->name ?>">
                                <h4 class="card-title text-pink mb-0 h5"><?= $term->name ?></h4>
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>

