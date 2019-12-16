<?php get_header(); ?>

<section>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center" style="background: url(<?= get_template_directory_uri() . '/imgs/inner-header.jpg'?>) no-repeat center; background-size: cover; height: 400px;">

                <div class="mask mask-dark"></div>

                <div class="position-relative pt-6 d-flex">
                    <div class="position-relative text-center">
                        <h1 class="text-uppercase text-light font-weight-bold mb-2">Cases</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb rounded-pill d-inline-flex py-1 px-3 bg-dark-opacity">
                                <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cases</li>
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

        <div class="row justify-content-center">

            <?php

                $args = array(
                    'post_type' => 'cases',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);

                if($query->have_posts()): while ($query->have_posts()): $query->the_post();

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

        </div>

    </div>
</section>
<?php get_footer(); ?>