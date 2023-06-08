<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class ShortCodes
{
    public function register()
    {
        add_shortcode('easymanage', [$this, 'custom_table_shortcode']);
    }

    public function custom_table_shortcode($atts)
    {
        $attributes = shortcode_atts(
            array(
                'type' => 'default',
            ),
            $atts
        );

        ob_start();
        switch ($attributes['type']) {
            case 'admin-trainers':
                $template = 'page-admin-trainers.php';
                break;

            case 'admin-trainees':
                $template = 'page-admin-trainees.php';
                break;

            case 'admin-deactivated':
                $template = 'page-deactivated.php';
                break;

            default:
                $template = 'page-admin-dashboard.php';
                break;
        }

        $template_path = locate_template('shortcode-templates/' . $template);
        if ($template_path) {
            include $template_path;
        }

        return ob_get_clean();
    }
}
