<?php get_header() ?>
    <main>
        <?= abdoo_get_breadcrumb()?>
        <h1 class="title">
            <?php wp_title(); ?>
        </h1>
        <div class="description">
            <?php is_archive() ? the_archive_description() : the_excerpt() ?>
        </div>
        <div class="portfolio-wrap">
            <? while (have_posts() ): the_post()?>
                <?php get_template_part('template-parts/loop') ?>
            <? endwhile ?>
        </div>
        <?php get_template_part('template-parts/footer') ?>
    </main>
<?php get_footer() ?>