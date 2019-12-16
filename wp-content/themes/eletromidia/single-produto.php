<?php get_header(); ?>

<?php
    $term = get_the_terms(get_the_ID(), 'produtos');
    $term = array_shift($term);
    $symbol = get_field('simbolo_categoria', $term);
    $tipo = get_field('tipo', $term);
    $texto = get_field('texto', $term);
    $midia = get_field('midia', $term);
?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
    $header = get_field('imagem_cabecalho');
?>

<section>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center" style="background: url(<?= $header['url'] ?>) no-repeat center; background-size: cover; height: 400px;">

                <div class="mask mask-dark"></div>

                <div class="position-relative pt-6 d-flex">
                    <div class="position-relative text-center">
                        <h2 class="h5 mb-2"><span class="text-uppercase badge badge-pill badge-light text-purple"><?= $tipo ?></span></h2>
                        <h1 class="text-uppercase text-light font-weight-bold mb-2"><?= get_the_title() ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb rounded-pill d-inline-flex w-auto py-1 px-3 bg-dark-opacity">
                                <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= get_post_type_archive_link('produto') ?>">Produtos</a></li>
                                <li class="breadcrumb-item"><a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= get_the_title() ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>

            <?php if(get_field('midia') != '') : ?>

                <div class="col-12">

                    <div class="position-relative text-center mb-0" style="transform: translateY(-50%)">
                        <a target="_blank" class="btn btn-primary mb-0" href="<?= get_field('midia') ?>">Baixar mídia kit &nbsp;<i class="fas fa-arrow-down"></i></a>
                    </div>

                </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<section>
    <div class="container py-5 pb-1">

        <div class="row">
            <div class="col-12 post-content">
                <?php the_content(); ?>
            </div>
        </div>

    </div>



    <div class="container-fluid">
        <div class="row pb-5">

            <?php if(have_rows('slider')): ?>

                <div class="col-12 px-0 mb-5">

                    <div class="cases-slider" style="line-height: 0;">

                        <?php while (have_rows('slider')): the_row(); ?>

                            <?php
                                $img = get_sub_field('imagem')
                            ?>

                            <div class="cases-slide px-2">
                                <figure class="m-0 position-relative">
                                    <div class="mask-black-transparent"></div>
                                    <img class="img-fluid w-100" src="<?= $img['url'] ?>" alt="Slide 1">
                                    <?php if(get_sub_field('legenda') != ''): ?>
                                        <figcaption><?= get_sub_field('legenda') ?></figcaption>
                                    <?php endif; ?>
                                </figure>
                            </div>

                        <?php endwhile; ?>

                    </div>

                </div>

            <?php endif; ?>

            <div class="col-12 text-center py-5 position-relative">

                <hr class="border-purple m-0 w-100" style="position: absolute; top: 50%; left: 0;">

                <div class="d-inline-block border border-purple rounded px-3 py-2 bg-white position-relative">
                    <h3 class="text-purple text-uppercase h5">Compartilhe</h3>
                    <hr class="border-purple my-3">
                    <ul class="nav h4 justify-content-center">
                        <li class="nav-item"><a class="nav-link px-2 py-0 text-purple hover-pink" href="#" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2 py-0 text-purple hover-pink" href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2 py-0 text-purple hover-pink" href="#" title="Twitter"><i class="fab fa-twitter-square"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2 py-0 text-purple hover-pink" href="#" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</section>

<?php
    $cases_relacionados = get_field('cases_relacionados');

    if(count($cases_relacionados) > 0):
?>

<section class="bg-purple">
    <div class="container py-5 pb-1">

        <div class="row mb-4 justify-content-center">
            <div class="col-12 text-center">
                <h3 class="text-white mb-2 h4">Cases Relacionados</h3>
            </div>
        </div>

        <div class="row mb-2 justify-content-center">

            <?php foreach ($cases_relacionados as $post): ?>

                <?php
                    setup_postdata($post);
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

            <?php endforeach; wp_reset_postdata(); ?>

        </div>
    </div>
</section>

<?php endif; ?>

<?php endwhile; ?>



<section>
    <div class="container py-5 pb-1">

        <?php
            $args = array(
                'post_type'         =>  'produto',
                'post__not_in'       => get_the_ID(),
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

            if($query->have_posts()):
        ?>

            <div class="row mb-4 justify-content-center">
                <div class="col-12 text-center">
                    <h3 class="text-purple mb-2 h4">Confira outras oportunidades disponíveis</h3>
                </div>
            </div>

            <div class="row mb-2">

                <?php while ($query->have_posts()): $query->the_post(); ?>

                    <?php
                        $header = get_field('imagem_cabecalho');
                    ?>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center w-100">
                            <img src="<?= get_the_post_thumbnail_url('', 'general-thumb') ?>" class="card-img-top" alt="<?= get_the_title() ?>">
                            <div class="card-body pt-2">
                                <h4 class="card-title text-pink mb-4 h5 mt-1"><?= get_the_title() ?></h4>
                                <a href="<?= get_permalink() ?>" class="btn btn-primary">SABER MAIS <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; wp_reset_query(); ?>

            </div>

        <?php endif; ?>

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