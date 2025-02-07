<?php
function hs_give_me_coffee() {
    $response = wp_remote_get('https://coffee.alexflipnote.dev/random.json');

    if (is_wp_error($response)) {
        return 'Error fetching coffee image.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (isset($data['file'])) {
        return esc_url($data['file']);
    }

    return 'No coffee found.';
}
