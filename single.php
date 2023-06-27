<? get_header() ?>
<div class="container py-4">
    <div class="row content-row">
        <main class="col-md-8 px-4">
            <div class="title">
                <h1><? the_title() ?></h1>
            </div>
            <div class="content">
                <? the_content() ?>
            </div>
            <div class="post-meta date dashicons-calendar">
                <? the_date() ?>
            </div>
            <div class="post-meta tags dashicons-tag">
                <? the_tags('') ?>
            </div>
        </main>
    </div>
</div>

<? get_footer() ?>