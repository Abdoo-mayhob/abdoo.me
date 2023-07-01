<?php $pjct_link = get_post_meta( $post->ID, PORTFOLIO_PROJECT_LINK, true ) ?>
<article class="portfolio-item">
    <a href="<?=$pjct_link?>">
        <?php the_post_thumbnail('medium_large'); ?>
    </a>
    <div class="portfolio-item-info">
        <a href="<?=$pjct_link?>">
            <h3><?php the_title() ?></h3>
        </a>
        <span class="tags"><?= get_the_term_list(get_the_ID(),'tech','',', ')?></span>
    </div>
</article>