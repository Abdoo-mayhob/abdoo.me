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
            <section>
                <div class="sb">
                    <strong><?= M('Residence') ?></strong><span><?= M('Mazza, Damascus') ?></span>
                </div>
                <div class="sb" style="margin-top: 4px;">
                    <strong><?= M('Vibes lately?') ?></strong>
                    <a href="https://youtu.be/FxB6g0nbmUo?si=Kho0WtlVmIlf7xWJ" target="_blank">Ziad Rahbani - Khalas</a>
                </div>
            </section>
            <section class="sb">

                <a class="sl" aria-label="Contact Abdoo Via Email"
                    href="mailto:abdoo.mayhob@gmail.com"><?= abdoo_get_svg('mail') ?></a>

                <a class="sl" aria-label="Contact Abdoo on Whatsapp"
                    href="https://wa.me/+963945536907"><?= abdoo_get_svg('whatsapp') ?></a>

                <a class="sl" aria-label="Abdoo on Linked In"
                    href="https://www.linkedin.com/in/abdoo-almayhob/"><?= abdoo_get_svg('linkedin') ?></a>

                <a class="sl" aria-label="Abdoo on Gihub"
                    href="https://github.com/abdoo-mayhob"><?= abdoo_get_svg('github') ?></a>

                <a class="sl" aria-label="Abdoo on Code Forces"
                    href="https://codeforces.com/profile/AbDoO_"><?= abdoo_get_svg('codeforces') ?></a>

                <a class="sl" aria-label="Abdoo on Instagram"
                    href="https://www.instagram.com/abdoo_almayhob/"><?= abdoo_get_svg('instagram') ?></a>

                <a class="sl" aria-label="Abdoo on Wordpress.org"
                    href="https://profiles.wordpress.org/abdoomayhob/"><?= abdoo_get_svg('wp') ?></a>
            </section>
            <section class="tc" style="margin-top:4px">
                <a class="download-cv" href="/resume">
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
                        color: var(--clr-acc);
                    }

                    & p {
                        font-size: 12px;
                    }
                }
            </style>
            <h3 class="b m0"><?= M('Questions about Abdoo') ?></h3>
            <ul id="faqs">
                <li>
                    <h4><?= M("What is Abdoo's main expertise ?") ?></h4>
                    <p><?= M('- Managing and Developing niche E-Comm Stores. <br>- Buliding Advanced Customized WooCommerce Sites.') ?>
                    </p>
                </li>
                <li>
                    <h4><?= M('What Languages he speaks ?') ?></h4>
                    <p><?= M('English and Arabic fluently. French Learner.') ?></p>
                </li>
                <li>
                    <h4><?= M('Is Abdoo Availabe for Work ?') ?></h4>
                    <p><?= M('Yes, both as part-time job, and as a frelancer (details below)') ?></p>
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
                <div class="hi-am-abdoo">
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
                        I'm available for part-time hiring (120 hours/month) starting at $385 monthly.
                    </p>

                <?php else: ?>

                    <h3>
                        أنت ركز على البزنس
                        <span class="clr-acc">عالأرض</span>,
                        وأنا بهندل البزنس
                        <span class="clr-acc">أونلاين</span>
                    </h3>

                    <h4>
                        شو ممكن اخدمك بالظبط ؟
                    </h4>
                    <ul>
                        <li>
                            <strong class="clr-acc">
                                1. بحافظ على قوّة المنصّة:
                            </strong><br>
                            بنفّذ فحوصات أسبوعية دقيقة للسرعة، الأمان، وتحسين الظهور على محركات البحث (SEO).
                            هيك بتضل منصّتك أصل قوي وفعّال، مو عبء أو مصدر مشاكل.
                        </li>
                        <li>
                            <strong class="clr-acc">
                                2. بنفّذ بسرعة وفعالية:
                            </strong><br>
                            بطبّق الميزات الجديدة واختبارات الـA/B وتحسين تجربة المستخدم وحملات الترويج بسرعة عالية.
                            بحوّل الأفكار لنتائج واضحة ومبنية على بيانات خلال أيام، مو شهور.
                        </li>
                        <li>
                            <strong class="clr-acc">
                                3. بنمّي الأرباح بالاعتماد على البيانات:
                            </strong><br>
                            ما بكتفي بصيانة المتجر، أنا بنمّيه.
                            بعطيك تقارير وتحليلات واضحة مع خطط تسويقية ذكية بتستغل أفضل فرص النمو والربح.
                        </li>
                        <p>
                            متاح للتوظيف الجزئي (120 ساعة بالشهر) مع راتب متوقع ابتداءً من 385 دولار شهرياً
                        </p>
                    </ul>
                <?php endif; ?>

                <br>
                <a class="button" href="https://wa.me/+963945536907" target="_blank">Contact via WhatsApp</a>
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
        <?php get_template_part('template-parts/footer') ?>
    </main>
</div>
<?php get_footer() ?>