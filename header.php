<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url')?>">
    <?php endif?> 
    <title><?=wp_title()?></title>
    <link rel="preload" as="font" href="<?=SITE_URL?>/wp-content/themes/abdoo/fonts/Poppins-SemiBold.woff2" type="font/woff2" crossorigin />
    <link rel="preload" as="font" href="<?=SITE_URL?>/wp-content/themes/abdoo/fonts/Poppins-Regular.woff2" type="font/woff2" crossorigin />
    <!-- <link rel="preload" as="font" href="<?=SITE_URL?>/wp-includes/fonts/dashicons.woff2" type="font/woff2" crossorigin /> -->
    
    <?php wp_head();?>
</head>
<body <?php body_class()?>>
    <div class="lang-switch">
        <span><?= __('Available in:', 'abdoo')?></span>
        <ul><?php abdoo_lang_switcher()?></ul>
        <span class="toggle-lang-switcher"><<</span>
    </div>
