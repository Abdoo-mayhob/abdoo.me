<?php $pjct_link = get_post_meta( $post->ID, PORTFOLIO_PROJECT_LINK, true ) ?>
<article class="portfolio-item">
    <a href="<?=$pjct_link?>">
        <?php the_post_thumbnail('full') ?>
    </a>
    <div class="portfolio-item-info">
        <a href="<?=$pjct_link?>">
            <h4><?php the_title() ?></h4>
            <br>
            <small><?= get_the_content() ?></small>
        </a>
    </div>
</article>