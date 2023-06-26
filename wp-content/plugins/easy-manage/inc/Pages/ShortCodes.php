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

        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
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
        return ob_get_clean();
    }
}
?>