<?php get_header(); ?>

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
                        <h1 class="text-uppercase text-light font-weight-bold mb-2"><?= get_the_title() ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb rounded-pill d-inline-flex w-auto py-1 px-3 bg-dark-opacity">
                                <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= get_post_type_archive_link('cases') ?>">Cases</a></li>
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

<?php endwhile; ?>

<?php
    $args = array(
        'post_type'         =>  'imprensa',
        'posts_per_page'    => 3,
//        'post__not_in'      => get_the_ID(),
    );

    $query = new WP_Query($args);

    if($query->have_posts()):
?>

<section class="shadow-inner-top position-relative" style="background: url('<?= get_template_directory_uri() ?>/imgs/bg-icon-gray.jpg') no-repeat center; background-size: cover;">
    <div class="container py-5 pb-1">

        <div class="row mb-4 justify-content-center">
            <div class="col-12 text-center">
                <h3 class="mb-2 h4 text-purple">Mais notícias</h3>
            </div>
        </div>

        <div class="row mb-2 justify-content-center">

        <?php while ($query->have_posts()): $query->the_post(); ?>

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

        <?php endwhile; wp_reset_query(); ?>

        </div>
    </div>
</section>

<?php endif; ?>


<?php get_footer(); ?>