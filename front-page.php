<?php get_header() ?>
<div class="main-container">
    <aside>
        <!-- div class="aside-toggler-wrap">
            <button role="button" type="button" class="aside-toggler">
                <div>>></div>
            </button>
        </div -->
        <div class="head">
            <img width="120" height="120" class="profile-pic" src="<?=THEME_URI?>/abdoo-assets/Abdoo-Pic.jpg" alt="Abdullatif Al-Mayhob">
            <h1 class="name h2"><?=__('Abdullatif Al-Mayhob','abdoo')?></h1>
            <h2 class="job"><?=__('WordPress Php Dev','abdoo')?></h2>
        </div>
        <div class="body">
            <div class="info residence">
                <span><?=__('Residence:','abdoo')?></span><span><?=__('Syria, Damascuse','abdoo')?></span>
            </div>
            <div class="info phone">
                <span><?=__('Phone:','abdoo')?></span><span dir="ltr">+963 945 536 907</span>
            </div>
            <div class="seperator"></div>
            <h3><?=__('Languages','abdoo')?></h3>
            <div class="languages">
                <span>
                    <div class="circular-progress-bar" data-duration="2" data-percent="90"><span>90%</span></div>
                    <?=__('English','abdoo')?>
                </span>
                <span>
                    <div class="circular-progress-bar" data-duration="2" data-percent="85"><span>85%</span></div>
                    <?=__('Arabic','abdoo')?>
                </span>
                <span>
                    <div class="circular-progress-bar" data-duration="2" data-percent="30"><span>30%</span></div>
                    <?=__('French','abdoo')?>
                </span>                
            </div>
            <div class="seperator"></div>
            <h3><?=__('Top Skills','abdoo')?></h3>
            <div class="skills">
                <?php 
                 $skills = [
                    __('Wordpress', 'abdoo') => 95,
                    __('Html, Css & Php', 'abdoo')=> 90,
                    __('Leadership', 'abdoo')=> 90,
                    __('Flexibility, Creativity', 'abdoo')=> 85,
                    __('Porblem Solving', 'abdoo')=> 80,
                ];
                foreach($skills as $name => $value): ?>
                    <label><?= $name ?><meter data-duration="2" max="100" value="<?=$value?>"></meter></label>
                <?php endforeach ?>
            </div>
            <div class="seperator"></div>
            <section id="download-cv" class="download-cv-wrap">
                <a href="/resume" class="download-cv"><h4><?=__('Download CV','abdoo')?> <?= abdoo_get_svg('download','abdoo')?></h4> </a>
            </section>
            <section id="social-links" class="social-links">
                <a aria-label="Abdoo on Linked In" href="https://www.linkedin.com/in/abdoo-almayhob/"><?= abdoo_get_svg('linkedin','abdoo')?></a>
                <a aria-label="Abdoo on Gihub" href="https://github.com/abdoo-mayhob"><?= abdoo_get_svg('github','abdoo')?></a>
                <a aria-label="Abdoo on Code Forces" href="https://codeforces.com/profile/AbDoO_"><?= abdoo_get_svg('codeforces','abdoo')?></a>
                <a aria-label="Abdoo on Instagram" href="https://www.instagram.com/abdoo_almayhob/"><?= abdoo_get_svg('instagram','abdoo')?></a>
                <a aria-label="Abdoo on Facebook" href="https://facebook.com/abdoo.almayhob"><?= abdoo_get_svg('facebook','abdoo')?></a>
            </section>
        </div>
    </aside>
    <main id="hero">
        <section class="code-bg-wrap">
            <div class="code-bg" <?php abdoo_bg_img(THEME_URI.'/img/code_bg.jpg','365px','abdoo')?>>
                <div class="hay-there">
                    <h2 class="h1"><?=__('Hay There, I\'m Abdoo','abdoo')?> <br><?=__('Let\'s Make Wonders Together!','abdoo')?></h2>
                    <div class="i-develop-wrap">
                        <span class="pre-typing-effect"><?=__('I Develop','abdoo')?> </span>
                        <noscript>
                            <?=__('Custom Themes and Custom Plugins ..','abdoo')?>
                        </noscript>
                        <span id="typing-effect"></span>
                    </div>
                </div>
                <div class="abdoo-full" <?php abdoo_bg_img(THEME_URI.'/abdoo-assets/Abdoo-full.png','460px','abdoo')?>></div>
            </div>
        </section>
        <section id="number-counters" class="number-counters-wrap">
            <div class="number-counters">
                <span data-duration="3" data-max="4" class="number"><noscript>4</noscript></span>
                <span class="counters-title">
                    <?=__('Years of Experience','abdoo')?>
                </span>
            </div>
            <div class="number-counters">
                <span data-duration="3" data-max="36" class="number"><noscript>36</noscript></span>
                <span class="counters-title">
                    <?=__('Completed Projects​','abdoo')?>
                </span>
            </div>
            <div class="number-counters">
                <span data-duration="3" data-max="12" class="number"><noscript>12</noscript></span>
                <span class="counters-title">
                    <?=__('Happy Customer','abdoo')?>
                </span>
            </div>
            <div class="number-counters">
                <span data-duration="3" data-max="13" class="number"><noscript>13</noscript></span>
                <span class="counters-title">
                    <?=__('Honors and Awards','abdoo')?>
                </span>
            </div>
        </section>
        <section id="services" class="services">
            <h2><?=__('Services','abdoo')?></h2>
            <div class="services-wrap">
                <div class="service">
                    <?= abdoo_get_svg('code-dev','abdoo')?>
                    <h3><?=__('WP Themes & Plugins','abdoo')?></h3>
                    <p><?=__('Request your own design and functionality to server your business needs. Ensuring high reliability, best performance and latest code standards and best practices.','abdoo')?></p>
                </div>
                <div class="service">
                    <?= abdoo_get_svg('meter','abdoo')?>
                    <h3><?=__('Technical SEO And Performance Optimization','abdoo')?></h3>
                    <p><?=__('Optimizing your site to last byte and Setting up the latest Tech and Speed Hacks while maintaining Stability and Simplicity. Boosting page load time and Site Search engines Ranking.','abdoo')?></p>
                </div>
                <div class="service">
                    <?= abdoo_get_svg('wp','abdoo')?>
                    <h3><?=__('WordPress Development','abdoo')?></h3>
                    <p><?=__('Professional Responsive sites built with the newest and highest standards ensuring the best SEO results and excellent performance.','abdoo')?></p>
                </div>
            </div>
        </section>
        <section id="testimonials" class="testimonials">
            <h2><?=__('Words About Abdoo','abdoo')?></h2>
            <div id="testimonials-slider" class="keen-slider testimonials-wrap">
                <?php $testimonials_items = abdoo_get_testimonials();?>
                <?php while ( $testimonials_items->have_posts() ): $testimonials_items->the_post();  ?>
                    <div class="keen-slider__slide">
                        <?php the_post_thumbnail('thumbnail') ?>
                        <em>
                            <p><?php the_content() ?></p>
                            <h3><?php the_title() ?></h3>
                            <h4><?= get_post_meta( get_the_ID(), TESTIMONIALS_AUTHOR_JOB_META_KEY, true ) ?></h4>
                        </em>
                    </div>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
                <div class="keen-slider__slide last-slide">
                    <a href="https://www.linkedin.com/in/abdoo-almayhob/details/recommendations/">View much more on my Linked-In >></a>
                </div>
            </div> 
            <noscript>
                <style>
                    .keen-slider:not([data-keen-slider-disabled]){
                        gap: 30px;
                        flex-wrap: wrap;
                    }
                    .keen-slider:not([data-keen-slider-disabled]) .keen-slider__slide {
                        width: 45%;
                    }
                </style>
            </noscript>
        </section>
        <section id="portfolio" class="portfolio">
            <h2><?=__('Portfolio','abdoo')?></h2>
            <span class="section-subtitle"><?=__('Live Websites I Worked On','abdoo')?></span>
            <div class="portfolio-wrap">
                <?php abdoo_view_portfolio() ?>
                <?php wp_reset_postdata() ?>
            </div>
            <button class="load-more" role="button" type="button" data-posttype="portfolio" data-parentcontainer=".portfolio-wrap"><?=__('Load More','abdoo')?></button> 
        </section>
        <section id="contact" class="contact">
            <h2><?=__('Contact Me','abdoo')?></h2>
            <div class="contact-wrap">
                <div class="contant-img">
                    <img width="340" height="330" src="<?=THEME_URI?>/abdoo-assets/ProPic2022.jpg" alt="Abdullatif Al-Mayhob">
                </div>
                <div class="lets-talk">
                    <h3><?= __('Let\'s Talk About Everything !', 'abdoo')?></h3>
                    <p>
                        <?=__("I like talking, meeting new people, making new friends. Let's work on a new project. Let's build a startup together. Let's leave the the earth and conquer the space. Let's eliminate all the boundaries to our dreams.
                        It would be a pleasure to know you. Contact Me !",'abdoo')?>
                    </p>

                    <div class="contact-socials">
                        <strong><?=__('Phone:','abdoo')?></strong>
                        <br>
                        <a dir="ltr" href="tel:+963 945 536 907">
                            +963 945 536 907
                        </a>
                        <br><br>
                        <strong><?=__('E-Mail:','abdoo')?></strong>
                        <br> 
                        <a href="mailto:abdoo.mayhob@gmail.com">
                            abdoo.mayhob@gmail.com
                        </a>
                        <br><br>
                        <strong><?=__('Telegram:','abdoo')?></strong>
                        <br>
                        <a href="https://telegram.me/Abdoo_M">
                            @Abdoo_M
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php get_template_part('template-parts/footer') ?>
    </main>
</div>
<?php get_footer() ?>

