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
            <button type="submit" name="searchbtn" style="border:none;background-color:#315B87;color:#fff;border-radius:5px;padding:5px;width:5vw">Search</button>
        </form>

        <div class="search-results" style="position: inherit;background-color: #fff;padding:10px;border-radius:2px;font-size:normal;margin-top:4rem;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <?php
    if (isset($_POST['searchbtn'])) {
        $searchQuery = $_POST['search'];
        $searchEndpoint = "http://localhost/easy-manage/wp-json/em/v1/users/search?name=$searchQuery";
        
        $response = wp_remote_get($searchEndpoint, array(
            'method' => 'GET'
        ));

        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
            $results = json_decode(wp_remote_retrieve_body($response), true);

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
    ?>
</div>


        <?php
        return ob_get_clean();
    }
}