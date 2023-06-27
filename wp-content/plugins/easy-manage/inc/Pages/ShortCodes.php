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
    
        <form role="search" method="get" class="search-form" action="">
            <label>
                <span class="screen-reader-text">
                    <?php echo _x('Search for:', 'label', 'your-theme-domain'); ?>
                </span>
                <input type="search" class="search-field"
                    placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-theme-domain'); ?>"
                    value="<?php echo get_search_query(); ?>" name="s" />
    
            </label>
            <button type="submit" class="search-submit">
                <?php echo esc_html_x('Search', 'submit button', 'your-theme-domain'); ?>
            </button>
        </form>
        <?php
    
        // Retrieve the search query
        $searchQuery = get_search_query();
    
        // Check if a search query exists
        if ($searchQuery) {
            // Build the URL for the search endpoint
            $searchEndpoint = 'http://localhost/easy-manage/wp-json/em/v1/users/search?name=' . urlencode($searchQuery);
    
            // Make a request to the search endpoint
            $response = wp_remote_get($searchEndpoint);
    
            // Check if the request was successful
            if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                $results = json_decode(wp_remote_retrieve_body($response), true);
    
                // Process and display the search results here
                var_dump($results);
            } else {
                echo '<p>No results found.</p>';
            }
        }
    
        return ob_get_clean();
    }
    }

?>