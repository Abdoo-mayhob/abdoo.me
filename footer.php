<footer>
    <span class="credits">Copyright © 2021-2023 All Rights Reserved.</span>
    <span class="developer">Abdullatif Al-Mayhob</span>
</footer>
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