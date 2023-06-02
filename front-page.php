<? get_header() ?>
<div class="container-fluid main-container py-4">
    <section class="row">
        <aside class="col-md-3">
            <div class="head">
                <img class="profile-pic" src="<?=THEME_URI?>/abdoo-assets/Abdoo-Pic.jpg" alt="Abdullatif Al-Mayhob">
                <h1 class="name h2">Abdullatif Al-Mayhob</h1>
                <h2 class="job">WordPress Php Dev</h2>
            </div>
            <div class="body">
                <div class="info residence">
                    <span>Residence:</span><span>Syria, Damascuse</span>
                </div>
                <div class="info phone">
                    <span>Phone:</span><span>+963 945 536 907</span>
                </div>
                <div class="seperator"></div>
                <h3>Languages:</h3>
                <div class="languages">
                    <span>
                        <div class="circular-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        English
                    </span>
                    <span>
                        <div class="circular-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        Arabic
                    </span>
                    <span>
                        <div class="circular-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        French
                    </span>
                    
                </div>
                <div class="seperator"></div>
                <h3>Top Skills:</h3>
                <div class="skills">
                    <h4>WordPress</h4>
                    <div class="progress-bar">
                        <span class="percentage WordPress"></span>
                    </div>
                </div>
                <div class="seperator"></div>
                <div class="download-cv-wrap">
                    <a href="/resume" class="download-cv"><h4>Download CV <?= abdoo_get_svg('download')?></h4> </a>
                </div>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/abdoo-almayhob/"><?= abdoo_get_svg('linkedin')?></a>
                    <a href="https://github.com/abdoo-mayhob"><?= abdoo_get_svg('github')?></a>
                    <a href="https://codeforces.com/profile/AbDoO_"><?= abdoo_get_svg('codeforces')?></a>
                    <a href="https://www.instagram.com/abdoo_almayhob/"><?= abdoo_get_svg('instagram')?></a>
                    <a href="https://facebook.com/abdoo.almayhob"><?= abdoo_get_svg('facebook')?></a>
                </div>
            </div>
        </aside>
        <main class="col-md-9">
            <div class="container-fluid  code-bg-wrap">
                <div class="row code-bg" <?php abdoo_bg_img(THEME_URI.'/img/code_bg.jpg','365px')?>>
                    <div class="col-md-8 center-vertically hay-there">
                        <h2 class="h1">Hay There, I'm Abdoo <br>Let's Make Wonders Together!</h2>
                        <div class="i-develop-wrap">
                            <span class="pre-typing-effect">I Develop </span>
                            <span id="typing-effect"></span>
                        </div>
                    </div>
                    <div class="col-md-4 abdoo-full" <?php abdoo_bg_img(THEME_URI.'/img/Abdoo-full.png','460px')?>>
                        
                    </div>
                </div>
            </div>
            <? get_footer() ?>
        </main>
    </section>
</div>
