<?php wp_footer()?>
<?
if ( defined('WP_DEBUG') && true === WP_DEBUG) {
    $start = $GLOBALS['start_ms'] ;
    $end = microtime(true);
    echo "<pre style='direction: ltr;'>Entire Load Time (PHP): ", $end - $start;
}
?>

</body>
</html>