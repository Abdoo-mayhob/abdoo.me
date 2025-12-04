<?php get_header() ?>
<div class="main-container">
    <aside>
        <div class="head">
            <img width="120" height="120" class="profile-pic" src="<?= THEME_URI ?>/abdoo-assets/Abdoo-Pic.webp"
                alt="Abdullatif Al-Mayhob, Abdoo">
            <h1 class="name h2"><?= M('Abdullatif Al-Mayhob') ?></h1>
            <h2 class="fwn fst"><?= M('Senior Wordpress PHP Developer <br> Plugins & Themes Specialist') ?></h2>
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
                <a class="btn" href="/resume">
                    <h4><?= M('Download CV') ?> <?= abdoo_get_svg('download') ?></h4>
                </a>
            </section>
            <div class="seperator"></div>
            <ul id="faqs">
                <li>
                    <h4><?= M("What is Abdoo's main expertise ?") ?></h4>
                    <p><?= M('- Managing and Developing complex enterprise wordpress sites. <br>- Buliding Advanced Customized Themes and Plugins.') ?>
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
            <div class="code-bg" <?php abdoo_bg_img(THEME_URI . '/img/code_bg.webp', '365px') ?>>
                <div class="abdoo-full" <?php abdoo_bg_img(THEME_URI . '/abdoo-assets/Abdoo-full.webp', '460px') ?>>
                </div>
                <h2 class="h1">
                    <?= M('Looking for a Senior <br><span class="clr-acc">Wordpress</span> Expert ?') ?>
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
        <section id="latest-projects" class="latest-projects">
            <h2><?= M('What are the last 2 projects you worked on ?') ?>
            </h2>
            <div class="sb" style="gap: 20px;">
                <div class="box w50">
                    <h3><a href="https://Koki.sy/"><?= M('Koki.sy e-com for cats in Damascus') ?> 🐾</a></h3>
                    <?= M('Highly customized store with exceptional UX.') ?>
                    <br>
                    <?= M('Fully custom theme and plugins.') ?>
                    <div style="margin-top: 1rem; display:flex; gap: 8px;">
                        <figure>
                            <img src="<?= THEME_URI ?>/abdoo-assets/koki-performance-2025.webp"
                                alt="koki.sy Perfomance">
                            <figcaption>
                                <?= M('Fast even on 3G networks') ?>
                                <br>
                                <a
                                    href="https://pagespeed.web.dev/analysis/https-koki-sy/cruant4391?form_factor=mobile">
                                    <?= M('Check for youself') ?> </a>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="<?= THEME_URI ?>/abdoo-assets/koki-seo-2025.webp" alt="koki.sy SEO Results">
                            <figcaption><?= M('#1 on Google for "أكل قطط في دمشق"') ?> </figcaption>
                        </figure>
                    </div>
                    <br>
                </div>
                <div class="box w50">
                    <h3><a href="https://hbrarabic.com/"><?= M('hbrarabic.com') ?></a></h3>
                    <?= M('High Traffic E-Magazine with tens of CPTs and +100,000 posts.') ?>
                    <br>
                    <?= M('Fully custom theme and plugins.') ?>
                    <br>
                    <?= M('Top SEO + blazing fast performance.') ?>
                    <div style="margin-top: 1rem; display:flex; gap: 8px;">
                        <figure>
                            <img src="<?= THEME_URI ?>/abdoo-assets/hbr-performance-2025.webp" alt="HBR Perfomance">
                        </figure>
                        <figure>
                            <img src="<?= THEME_URI ?>/abdoo-assets/hbr-seo-2025.webp" alt="HBR SEO Results">
                        </figure>
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
                        <span class='clr-acc'>Wordpress</span> Expert.
                    </h3>
                    <p>
                        I will focus on the website, so you can focus on the business.
                    </p>
                    <br>
                    <p>
                        I help enterprise publishers and high-growth e-commerce brands deploy, optimize, and scale custom
                        WordPress ecosystems. Built for speed, SEO, and security.
                        <br>
                        No bloat. No drag. Just performance-driven results and rapid implementation.
                    </p>

                    <div class="seperator"></div>
                    <h3>Expertise Areas/ Highly skilled at:</h3>
                    <ul>
                        <li>
                            - Custom WordPress Theme & Plugin Development
                        </li>
                        <li>
                            - Scalable Architecture for High-Traffic Websites
                        </li>
                        <li>
                            - Full-Stack Optimization: Backend + UX + SEO
                        </li>
                        <li>
                            - Plugin Engineering & API Integrations
                        </li>
                        <li>
                            - Performance & Security Hardening
                        </li>
                        <li>
                            - Rapid Feature Implementation for Growth Campaigns
                        </li>
                    </ul>
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
                            I don't just maintain your website; I grow it. I provide actionable insights and marketing
                            strategies
                            to identify and exploit your highest-leverage growth opportunities.
                        </li>
                    </ul>

                    <br><br>
                    <p>
                        <strong>Let's get your business online.</strong>
                        <br><br>
                        <a class="btn" href="https://wa.me/+963945536907" target="_blank">
                            <span>
                                Chat with Abdoo
                            </span>
                            <?= abdoo_get_svg('whatsapp') ?>
                        </a>
                    </p>

                <?php else: ?>

                    <h3>
                        أنت ركز على البزنس
                        <span class="clr-acc">عالأرض</span>,
                        وأنا بهندل البزنس
                        <span class="clr-acc">أونلاين</span>
                    </h3>

                    <div class="seperator"></div>
                    <h3>عندي خبرة كبيرة ومهارة عالية في:</h3>
                    <ul>
                        <li>
                            - تصميم وبناء بلغنات و ثيمات الووردبريس
                        </li>
                        <li>
                            - تصميم بنية متينة تسمح للموقع بالنمو دون الخروج من بيئة ووردبريس
                        </li>
                        <li>
                            - تحسين الادء و السيو
                        </li>
                        <li>
                            - بناء البلغنات و التعامل مع الـ APIs الخارجية
                        </li>
                    </ul>
                    <h3>
                        شو ممكن اخدمك بالظبط ؟
                    </h3>
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
                            <br>
                            <strong>شايل هم</strong>
                            انك مانك عم تواكب التطور التقني بالسوق و التجارة أونلاين ؟
                            <br>
                            جاهز تسلم الخبز للخباز ؟
                            <br>
                            يلا
                            <strong>خلينا نبلش شغل</strong>, سوياً...
                            <a class="btn" href="https://wa.me/+963945536907" target="_blank">
                                <span>
                                    حكيني واتس
                                </span>
                                <?= abdoo_get_svg('whatsapp') ?>
                            </a>
                        </p>

                    </ul>
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
            <h2><?= M('Portfolio Highlights') ?></h2>
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