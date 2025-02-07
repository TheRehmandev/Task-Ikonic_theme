<?php
/* Write a function that will redirect the user away from the site if their IP address starts with 77.29. Use WordPress native hooks and APIs to handle this.*/

function noors_ip_based_redirect(){
    if (!is_admin()) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $redirect_link = 'https://www.google.com';

        if (preg_match("/^77.29/", $ip)) {
            wp_redirect($redirect_link);
            exit;
        }
    }
}