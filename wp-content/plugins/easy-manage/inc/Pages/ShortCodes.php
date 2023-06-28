<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class ShortCodes
{
    public function register()
    {
        add_shortcode('search_bar', array($this, 'search_bar_shortcode'));
    }

    public function search_bar_shortcode()
    {
        ob_start();
        ?>
        <style>
            .search-form {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                margin-bottom: 10px;
            }

            .search-field {
                padding: 6px 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                margin-right: 10px;
            }

            .search-submit {
                padding: 6px 12px;
                background-color: #315B87;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label>
                <span class="screen-reader-text">
                    <?php echo esc_html_x('Search for:', 'label', 'your-theme-domain'); ?>
                </span>
                <input type="search" class="search-field"
                    placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-theme-domain'); ?>"
                    value="<?php echo get_search_query(); ?>" name="s" />

            </label>
         <?php   $searchQuery = get_search_query(); ?>
            <input type="hidden" name="query" value="<?php echo esc_attr($searchQuery); ?>">
            <button type="submit" class="search-submit" name="searchbtn">
                <?php echo esc_html_x('Search', 'submit button', 'your-theme-domain'); ?>
            </button>
        </form>

        <div class="search-results">

            <?php

           

            if (isset($_POST['searchbtn'])) {
                $searchQuery = $_POST['query'];
            }

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


        <?php

        return ob_get_clean();
    }
}
