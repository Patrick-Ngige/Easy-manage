<?php
/**
 * Template Name: Search Results
 */

get_header();


?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>

        <div class="search-results">
            <?php
            if ($searchQuery) {
                $searchEndpoint = 'http://localhost/easy-manage/wp-json/em/v1/users/search?=&name=' . urlencode($searchQuery);

                $response = wp_remote_get($searchEndpoint);
                if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                    $results = json_decode(wp_remote_retrieve_body($response), true);
                    if ($results) {
                        foreach ($results as $result) {
                            echo '<div class="search-result">';
                            echo '<h3>' . esc_html($result['name']) . '</h3>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No results found.</p>';
                    }
                } else {
                    echo '<p>Error occurred while performing the search.</p>';
                }
            }
            ?>
        </div>

    </main>
</div>

<?php
get_template_part('sidenav-trainer');
get_footer();
