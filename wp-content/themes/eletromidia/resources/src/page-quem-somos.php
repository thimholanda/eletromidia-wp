<?php /* Template Name: Quem Somos */ ?>
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
                            <ol class="breadcrumb rounded-pill d-inline-flex py-1 px-3 bg-dark-opacity">
                                <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= get_the_title() ?></li>
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

        <div class="row">
            <div class="col-12 post-content">
                <?php the_content(); ?>
            </div>
        </div>

    </div>
</section>

<?php endwhile; ?>
<?php get_footer(); ?>
