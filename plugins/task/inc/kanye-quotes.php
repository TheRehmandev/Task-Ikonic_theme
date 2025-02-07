<?php


if (!defined('ABSPATH')) {
    exit; 
}


function get_kanye_quotes() {
    $quotes = [];


    for ($i = 0; $i < 5; $i++) {
        $response = wp_remote_get('https://api.kanye.rest/');
        
        if (is_wp_error($response)) {
            return '<p>Error fetching quotes.</p>';
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (!empty($data['quote'])) {
            $quotes[] = esc_html($data['quote']);
        }
    }

    return $quotes;
}


function kanye_quotes_shortcode() {
    $quotes = get_kanye_quotes();
    ob_start();
    ?>
    <div class="kanye-quotes">
        <h2>Kanye West Quotes</h2>
        <ul>
            <?php foreach ($quotes as $quote): ?>
                <li>"<?php echo $quote; ?>"</li>
            <?php endforeach; ?>
        </ul>
        <button id="refresh-kanye-quotes">Refresh Quotes</button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("refresh-kanye-quotes").addEventListener("click", function() {
                location.reload();
            });
        });
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('kanye_quotes', 'kanye_quotes_shortcode');
