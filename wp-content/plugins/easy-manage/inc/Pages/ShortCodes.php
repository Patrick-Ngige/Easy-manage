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
        add_action('wp_ajax_search_users', array($this, 'search_users_ajax_handler'));
        add_action('wp_ajax_nopriv_search_users', array($this, 'search_users_ajax_handler'));
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
    
        <form id="search-form">
            <label>
                <input type="search" class="search-field" name="search" id="search-input" placeholder="Search..." />
            </label>
            <button type="submit" id="search-btn" style="border:none;background-color:#315B87;color:#fff;border-radius:5px;padding:5px;width:5vw">Search</button>
        </form>
    
        <div id="search-results" style="position: inherit;background-color: #fff;padding:10px;border-radius:2px;font-size:normal;margin-top:4rem;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"></div>
    
        <script>
            (function ($) {
                $(document).ready(function () {
                    $('#search-form').on('submit', function (e) {
                        e.preventDefault(); 
    
                        var searchQuery = $('#search-input').val();
    
                        $.ajax({
                            url: '<?php echo esc_js(admin_url('admin-ajax.php')); ?>',
                            method: 'POST',
                            data: {
                                action: 'search_users',
                                search: searchQuery
                            },
                            beforeSend: function () {
                                $('#search-results').html('Searching...');
                            },
                            success: function (response) {
                                $('#search-results').html(response);
                            },
                            error: function (xhr, status, error) {
                                $('#search-results').html('An error occurred while performing the search.');
                            }
                        });
                    });
                });
            })(jQuery);
        </script>
        <?php
        return ob_get_clean();
    }
    
    // AJAX handler
    public function search_users_ajax_handler()
    {
        if (isset($_POST['search'])) {
            $searchQuery = sanitize_text_field($_POST['search']);
            $searchEndpoint = "http://localhost/easy-manage/wp-json/em/v1/users/search?name=$searchQuery";
            
            $response = wp_remote_get($searchEndpoint, array(
                'method' => 'GET'
            ));

            print_r($response);
        

            // Log API request URL
            error_log('Search API Request: ' . $searchEndpoint);
    
            if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                $results = json_decode(wp_remote_retrieve_body($response), true);

                // Log API response
                error_log('Search API Response: ' . print_r($results, true));
    
                if ($results) {
                    foreach ($results as $result) {
                        echo '<div class="search-result">';
                        echo '<p>' . esc_html($result['user_name']).'-> '  . esc_html($result['user_email']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No results found.</p>';
                }
            } else {
                echo '<p>Error occurred while performing the search.</p>';
            }
        }
        wp_die();
    }
}
