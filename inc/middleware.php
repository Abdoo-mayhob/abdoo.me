<?php

/*
 * MiddleWare
 * Log all outgoing Requests and their responses.
 * --------------------------------------------------------
 */
add_filter('http_request_args', 'log_http_request_args', 10, 2);
function log_http_request_args($args, $url) {
    error_log(
        'MiddleWare: --> Outgoing Request: ' . PHP_EOL .
        'URL: ' . $url . PHP_EOL .
        'Method: ' . print_r($args['method'], true) . PHP_EOL .
        'Headers: ' . print_r($args['headers'], true) . PHP_EOL .
        'Body: ' . print_r($args['body'], true) . PHP_EOL . 
        '=============================================================' . PHP_EOL
    );
    return $args;
}

add_filter('http_response', 'log_http_response', 10, 3);
function log_http_response($response, $args, $url) {
    error_log(
        'MiddleWare: <-- Incoming Response: ' . PHP_EOL .
        'URL: ' . $url . PHP_EOL .
        'Code: ' . print_r(wp_remote_retrieve_response_code($response), true) . PHP_EOL .
        'Body: ' . print_r(wp_remote_retrieve_body($response), true) . PHP_EOL . 
        '=============================================================' . PHP_EOL
    );
    return $response;
}
 