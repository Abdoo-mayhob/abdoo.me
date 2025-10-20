<?php get_header() ?>
<div class="main-container">
    <aside>
        <div class="head">
            <img width="120" height="120" class="profile-pic" src="<?= THEME_URI ?>/abdoo-assets/Abdoo-Pic.webp"
                alt="Abdullatif Al-Mayhob, Abdoo">
            <h1 class="name h2"><?= M('Abdullatif Al-Mayhob') ?></h1>
            <h2 class="fwn fst"><?= M('E-Commerce Dev Who’s Scaled His Own Store') ?></h2>
        </div>
        <div class="body">
            <div class="info residence">
                <span><?= M('Residence') ?></span><span><?= M('Syria, Damascus') ?></span>
            </div>
            <div class="info phone">
                <span><?= M('Phone') ?></span><span dir="ltr"><a href="https://wa.me/+963945536907">+963 945
                        536907</a></span>
            </div>
            <section id="social-links" class="social-links">
                <a aria-label="Abdoo on Linked In"
                    href="https://www.linkedin.com/in/abdoo-almayhob/"><?= abdoo_get_svg('linkedin') ?></a>
                <a aria-label="Abdoo on Gihub" href="https://github.com/abdoo-mayhob"><?= abdoo_get_svg('github') ?></a>
                <a aria-label="Abdoo on Code Forces"
                    href="https://codeforces.com/profile/AbDoO_"><?= abdoo_get_svg('codeforces') ?></a>
                <a aria-label="Abdoo on Instagram"
                    href="https://www.instagram.com/abdoo_almayhob/"><?= abdoo_get_svg('instagram') ?></a>
                <a aria-label="Abdoo on Facebook"
                    href="https://facebook.com/abdoo.almayhob"><?= abdoo_get_svg('facebook') ?></a>
                <a aria-label="Abdoo on Wordpress.org"
                    href="https://profiles.wordpress.org/abdoomayhob/"><?= abdoo_get_svg('wp') ?></a>
            </section>
            <section id="download-cv" class="download-cv-wrap">
                <a href="/resume" class="download-cv">
                    <h4><?= M('Download CV') ?> <?= abdoo_get_svg('download') ?></h4>
                </a>
            </section>
            <div class="seperator"></div>
            <style>
                #faqs {

                    & li {
                        padding-block: 6px;
                    }

                    & h4 {
                        margin: 0;
                    }

                    & p {
                        font-size: 12px;
                    }
                }
            </style>
            <h3 class="b"><?= M('Questions about Abdoo') ?></h3>
            <ul id="faqs">
                <li>
                    <h4><?= M('Is Abdoo Availabe for Work ?') ?></h4>
                    <p><?= M('Yes, both as part-time job, and as a frelancer (details below)') ?></p>
                <li>
                    <h4><?= M("What is Abdoo's main expertise ?") ?></h4>
                    <p><?= M('- Managing and Developing niche E-Comm Stores. <br>- Buliding Advanced Customized WooCommerce Sites.') ?>
                    </p>
                <li>
                    <h4><?= M('What Languages he speaks ?') ?></h4>
                    <p><?= M('English and Arabic fluently. French Learner.') ?></p>
                </li>
            </ul>
        </div>
    </aside>
    <main id="hero">

        <section class="code-bg-wrap">
            <div class="code-bg" <?php abdoo_bg_img(THEME_URI . '/img/code_bg.webp', '365px', 'abdoo') ?>>
                <div class="abdoo-full" <?php abdoo_bg_img(THEME_URI . '/abdoo-assets/Abdoo-full.webp', '460px', 'abdoo') ?>></div>
                <h2 class="h1">
                    <?= M('Looking for <br><span class="clr-acc">E-Com</span> Expert <br>for Your Niche Business ?') ?>
                </h2>
                <div>
                    <h2 class="m0">
                        <?= __('Hey There, I\'m Abdoo', 'abdoo') ?>
                    </h2>
                    <div class="number-counters">
                        <span class="clr-acc">+</span>
                        <span data-duration="2" data-max="5" class="number"><noscript>5</noscript></span>
                        <span class="counters-title">
                            <?= M('Years of Experience') ?>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section id="services" class="services">
            <h2><?= M("What does Abdoo bring to your team ?") ?></h2>

            <div class="box">
                <?php if (!is_ar()): ?>

                    <h3>
                        Hire me as your dedicated
                        <span class='clr-acc'>e-commerce growth</span> engine.
                    </h3>
                    I will focus on the e-com part, so you can focus on the business.

                    <div class="seperator"></div>
                    <h3>What do I Do ?</h3>
                    <ul>
                        <li>
                            <span class='clr-acc'>1 - Eliminate Platform Decay:</span><br>
                            I enforce rigorous weekly checks for speed, security, and SEO. <br>
                            Ensuring your store is a high-performing asset, not a liability.
                        </li>
                        <li>
                            <span class='clr-acc'>2 - Execute with Velocity:</span><br>
                            I rapidly implement features for A/B testing, UX optimizations, and promotional campaigns,<br>
                            turning ideas into data-producing results in days, not months.
                        </li>
                        <li>
                            <span class='clr-acc'>3 - Drive Profit with Data-Backed Decisions:</span><br>
                            I don't just maintain your store; I grow it. I provide actionable insights and marketing
                            strategies
                            to identify and exploit your highest-leverage growth opportunities.
                        </li>
                    </ul>

                    <p>
                        I'm available for part-time hiring (4 hours/day) starting at $385 monthly.
                    </p>
                    <br>
                    <a class="button" href="https://wa.me/+963945536907" target="_blank">Contact via WhatsApp</a>


                <?php else: ?>
                <?php endif; ?>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <h2><?= M('Words About Abdoo') ?></h2>
            <div id="testimonials-slider" class="keen-slider testimonials-wrap">
                <?php $testimonials_items = abdoo_get_testimonials(); ?>
                <?php while ($testimonials_items->have_posts()):
                    $testimonials_items->the_post(); ?>
                    <?php $author_link = get_post_meta(get_the_ID(), TESTIMONIALS_AUTHOR_LINK_META_KEY, true); ?>
                    <div class="keen-slider__slide">
                        <a href="<?= $author_link ?>" aria-label="Linked-In">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail');
                            } else { ?>
                                <?= abdoo_get_svg('person-placeholder') ?>
                            <?php } ?>
                        </a>
                        <em>
                            <p><?php the_content() ?></p>
                            <h3>
                                <a href="<?= $author_link ?>">
                                    <?php the_title() ?>
                                </a>
                            </h3>
                            <h4><?= get_post_meta(get_the_ID(), TESTIMONIALS_AUTHOR_JOB_META_KEY, true) ?></h4>
                        </em>
                    </div>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
                <div class="keen-slider__slide last-slide">
                    <a
                        href="https://www.linkedin.com/in/abdoo-almayhob/details/recommendations/"><?= M('View much more on my Linked-In >>') ?></a>
                </div>
            </div>
            <noscript>
                <style>
                    .keen-slider:not([data-keen-slider-disabled]) {
                        gap: 30px;
                        flex-wrap: wrap;
                    }

                    .keen-slider:not([data-keen-slider-disabled]) .keen-slider__slide {
                        width: 45%;
                    }
                </style>
            </noscript>
        </section>
        <section id="portfolio">
            <h2><?= M('Portfolio') ?></h2>
            <?php
            $terms = get_terms([
                'taxonomy' => 'form',
                'hide_empty' => false,
            ]);
            $portfolio_args = [
                'post_type' => 'portfolio',
                'posts_per_page' => -1,
                'no_found_rows' => true,
                'post_status' => 'publish',
                'tax_query' => [
                    [
                        'taxonomy' => 'form',
                        'field' => 'slug',
                        'terms' => null,
                    ]
                ]
            ];
            $termsCount = count($terms);
            foreach ($terms as $index => $t): ?>
                <h3><?= stripslashes($t->name) ?></h3>
                <small><?= stripslashes($t->description) ?></small>
                <div class="portfolio-wrap">
                    <?php
                    $portfolio_args['tax_query'][0]['terms'] = $t->slug;
                    $portfolio = new WP_Query($portfolio_args);
                    if ($portfolio->have_posts()) {
                        while ($portfolio->have_posts()) {
                            $portfolio->the_post();
                            get_template_part('template-parts/loop');
                        }
                    }
                    wp_reset_postdata()
                        ?>
                </div>
                <?php if ($index != $termsCount - 1):  // Check if it's the last term 
                            ?>
                    <div class="seperator"></div>
                <?php endif;
            endforeach; ?>
        </section>
        <section id="contact" class="contact">
            <h2><?= M('Contact Me') ?></h2>
            <div class="contact-wrap">
                <div class="contant-img">
                    <img width="340" height="330" src="<?= THEME_URI ?>/abdoo-assets/Abdoo-Thinking.webp"
                        alt="Abdullatif Al-Mayhob">
                </div>
                <div class="lets-talk">
                    <h3><?= __('Let\'s Talk About Everything !', 'abdoo') ?></h3>
                    <p>
                        <?= (pll_current_language() == 'en') ?  // Easier this way than usual localization
                            "I like talking, meeting new people, making new friends. Let's work on a new project. Let's build a startup together. Let's leave the the earth and conquer the space. Let's eliminate all the boundaries to our dreams. It would be a pleasure to know you. Contact Me !"
                            : 'أحب التحدث والتعرف على أشخاص جدد وتكوين صداقات جديدة. لنعمل على مشروع جديد. دعنا نبني شركة ناشئة معًا. فلنترك الأرض ونحتل الفضاء. و لنتخلص من كل الحدود لأحلامنا.سيكون من دواعي سروري أن أتعرف عليك. تواصل معي!' ?>
                    </p>

                    <div class="contact-socials">
                        <strong><?= M('Phone:') ?></strong>
                        <br>
                        <a dir="ltr" href="https://wa.me/+963945536907">
                            +963 945 536 907
                        </a>
                        <br><br>
                        <strong><?= M('E-Mail:') ?></strong>
                        <br>
                        <a href="mailto:abdoo.mayhob@gmail.com">
                            abdoo.mayhob@gmail.com
                        </a>
                        <br><br>
                        <strong><?= M('Telegram:') ?></strong>
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