<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class WplpElementorWidget
 */
class WplpElementorWidget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Gallery widget name.
     *
     * @return string Widget name.
     */
    public function get_name() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps -- Method extends from \Elementor\Widget_Base class
    {
        return 'wplp';
    }

    /**
     * Get widget title.
     *
     * Retrieve Gallery widget title.
     *
     * @return string Widget title.
     */
    public function get_title() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps -- Method extends from \Elementor\Widget_Base class
    {
        return esc_html__('WP Latest Posts', 'wp-latest-posts');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Gallery widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps -- Method extends from \Elementor\Widget_Base class
    {
        return 'fa wplp-elementor-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Gallery widget belongs to.
     *
     * @return array Widget categories.
     */
    public function get_categories() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps -- Method extends from \Elementor\Widget_Base class
    {
        return array('wplp');
    }

    /**
     * Register Gallery widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @return void
     */
    protected function register_controls() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps, PSR2.Methods.MethodDeclaration.Underscore -- Method extends from \Elementor\Widget_Base class
    {
        $this->start_controls_section(
            'wplp_settings',
            array(
                'label' => esc_html__('WP Latest Posts Settings', 'wp-latest-posts'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            )
        );

        $blocks                   = get_posts(
            array(
                'post_type'      => CUSTOM_POST_NEWS_WIDGET_NAME,
                'post_status'    => array(
                    'publish',
                    'future',
                    'private'
                ),
                'posts_per_page' => - 1
            )
        );

        $list = array();
        $list[0] = esc_html__('Select a block', 'wp-latest-posts');
        foreach ($blocks as $block) {
            $list[$block->ID] = $block->post_title;
        }

        $this->add_control(
            'news_widget_id',
            array(
                'label' => esc_html__('Choose a block', 'wp-latest-posts'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $list,
                'default' => 0
            )
        );

        $this->end_controls_section();
    }

    /**
     * Render Gallery widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @return void|string
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $news_widget_id = (!empty($settings['news_widget_id'])) ? $settings['news_widget_id'] : 0;
        if (!empty($settings['news_widget_id']) && !is_admin()) {
            echo do_shortcode('[frontpage_news widget="' . esc_attr($news_widget_id) . '"]');
        } else {
            ?>
            <div class="wplp-elementor-placeholder" style="text-align: center; background: rgb(154, 151, 123); width: 100%; height: 200px;">
                <img src="<?php echo esc_url(WPLP_PLUGIN_DIR . 'img/wplp-tmce-placeholder.png'); ?>">
            </div>
            <?php
        }
    }
}
