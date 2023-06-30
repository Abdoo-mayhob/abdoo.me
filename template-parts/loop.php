<div class="portfolio-item">
    <?php the_post_thumbnail('medium_large'); ?>
    <div class="portfolio-item-info">
        <h3><?php the_title() ?></h3>
        <span class="tags"><?= get_the_term_list(get_the_ID(),'tech','',', ')?></span>
    </div>
</div>