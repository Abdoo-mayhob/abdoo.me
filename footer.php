<?php wp_footer()?>
<?
if ( defined('WP_DEBUG') && true === WP_DEBUG) {
    $start = $GLOBALS['start_ms'] ;
    $end = microtime(true);
    dd($end - $start, 1, "<pre style='direction: ltr;'>Entire Load Time (PHP): ");
}
?>

</body>
</html>