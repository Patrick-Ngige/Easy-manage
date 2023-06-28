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

        <form method="POST">
            <label>
                <input type="search" class="search-field" name="search" placeholder="Search..."
                    value="<?php echo isset($_POST['search']) ? esc_attr($_POST['search']) : ''; ?>" />
            </label>
            <button type="submit" name="searchbtn">Search</button>
        </form>

        <div class="search-results">
            <?php
            if (isset($_POST['searchbtn'])) {
                $searchQuery = $_POST['search'];
                $searchEndpoint = 'http://localhost/easy-manage/wp-json/em/v1/users/search';
                
                $response = wp_remote_post($searchEndpoint, array(
                    'body' => array(
                        'name' => $searchQuery,
                    ),
                ));


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