<?php
/**
 * MPS Plugin Integration
 *
 * This must-use plugin handles integration between recommended plugins
 * and the MPS Theme, ensuring consistent styling and functionality.
 *
 * @package MPS_Plugin_Integration
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * MPS Plugin Integration Class
 */
class MPS_Plugin_Integration {

    /**
     * Instance of this class
     *
     * @var MPS_Plugin_Integration
     */
    private static $instance = null;

    /**
     * Get singleton instance
     *
     * @return MPS_Plugin_Integration
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        add_action('plugins_loaded', array($this, 'init_integrations'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_integration_styles'), 100);
        add_action('admin_notices', array($this, 'display_plugin_recommendations'));
    }

    /**
     * Initialize plugin integrations
     */
    public function init_integrations() {
        // Amelia Booking Integration
        if ($this->is_plugin_active('ameliabooking/ameliabooking.php')) {
            $this->init_amelia_integration();
        }

        // WPForms Integration
        if ($this->is_plugin_active('wpforms-lite/wpforms.php')) {
            $this->init_wpforms_integration();
        }

        // Yoast SEO Integration
        if ($this->is_plugin_active('wordpress-seo/wp-seo.php')) {
            $this->init_yoast_integration();
        }

        // NextGEN Gallery Integration
        if ($this->is_plugin_active('nextgen-gallery/nggallery.php')) {
            $this->init_nextgen_integration();
        }

        // Tawk.to Integration
        if ($this->is_plugin_active('tawkto-live-chat/tawkto.php')) {
            $this->init_tawkto_integration();
        }
    }

    /**
     * Check if a plugin is active
     *
     * @param string $plugin Plugin path
     * @return bool
     */
    private function is_plugin_active($plugin) {
        if (!function_exists('is_plugin_active')) {
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        return is_plugin_active($plugin);
    }

    /**
     * Enqueue integration styles
     */
    public function enqueue_integration_styles() {
        wp_enqueue_style(
            'mps-plugin-integration',
            content_url('/mu-plugins/mps-plugin-integration.css'),
            array(),
            '1.0.0'
        );
    }

    /**
     * Initialize Amelia Booking integration
     */
    private function init_amelia_integration() {
        // Add booking widget action for theme templates
        add_action('mps_booking_widget', array($this, 'render_amelia_booking'));
        
        // Add booking shortcode wrapper
        add_shortcode('mps_booking', array($this, 'mps_booking_shortcode'));
    }

    /**
     * Render Amelia booking widget
     */
    public function render_amelia_booking() {
        if (shortcode_exists('ameliabooking')) {
            echo '<div class="mps-booking-wrapper">';
            // Using wp_kses_post for safe HTML output from shortcode
            echo wp_kses_post(do_shortcode('[ameliabooking]'));
            echo '</div>';
        }
    }

    /**
     * MPS Booking shortcode wrapper
     *
     * @param array $atts Shortcode attributes
     * @return string
     */
    public function mps_booking_shortcode($atts) {
        $atts = shortcode_atts(array(
            'service' => '',
            'category' => '',
        ), $atts);

        $shortcode = '[ameliabooking';
        
        if (!empty($atts['service'])) {
            $shortcode .= ' service="' . esc_attr($atts['service']) . '"';
        }
        
        if (!empty($atts['category'])) {
            $shortcode .= ' category="' . esc_attr($atts['category']) . '"';
        }
        
        $shortcode .= ']';

        return '<div class="mps-booking-wrapper">' . do_shortcode($shortcode) . '</div>';
    }

    /**
     * Initialize WPForms integration
     */
    private function init_wpforms_integration() {
        // Add custom form templates
        add_filter('wpforms_form_templates', array($this, 'add_mps_form_templates'));
        
        // Add form display action for theme templates
        add_action('mps_quote_form', array($this, 'render_quote_form'));
        add_action('mps_contact_form', array($this, 'render_contact_form'));
    }

    /**
     * Add MPS form templates to WPForms
     *
     * @param array $templates Form templates
     * @return array
     */
    public function add_mps_form_templates($templates) {
        $templates['mps-quote-request'] = array(
            'name' => __('MPS Quote Request', 'mps-theme'),
            'slug' => 'mps-quote-request',
            'description' => __('A quote request form for property services.', 'mps-theme'),
        );

        return $templates;
    }

    /**
     * Render quote form widget
     *
     * @param int $form_id Optional form ID
     */
    public function render_quote_form($form_id = null) {
        if (shortcode_exists('wpforms')) {
            $id = $form_id ? intval($form_id) : get_option('mps_quote_form_id', 1);
            echo '<div class="mps-form-wrapper mps-quote-form">';
            // Using wp_kses_post for safe HTML output from shortcode
            echo wp_kses_post(do_shortcode('[wpforms id="' . intval($id) . '"]'));
            echo '</div>';
        }
    }

    /**
     * Render contact form widget
     *
     * @param int $form_id Optional form ID
     */
    public function render_contact_form($form_id = null) {
        if (shortcode_exists('wpforms')) {
            $id = $form_id ? intval($form_id) : get_option('mps_contact_form_id', 2);
            echo '<div class="mps-form-wrapper mps-contact-form">';
            // Using wp_kses_post for safe HTML output from shortcode
            echo wp_kses_post(do_shortcode('[wpforms id="' . intval($id) . '"]'));
            echo '</div>';
        }
    }

    /**
     * Initialize Yoast SEO integration
     */
    private function init_yoast_integration() {
        // Add local business schema support
        add_filter('wpseo_schema_graph_pieces', array($this, 'add_local_business_schema'), 10, 2);
    }

    /**
     * Add local business schema
     *
     * @param array                 $pieces  The current schema pieces.
     * @param WPSEO_Schema_Context $context The schema context object.
     * @return array
     */
    public function add_local_business_schema($pieces, $context) {
        // Local business schema is handled by Yoast's built-in local SEO
        // This filter can be used for custom modifications if needed
        return $pieces;
    }

    /**
     * Initialize NextGEN Gallery integration
     */
    private function init_nextgen_integration() {
        // Add gallery display action for theme templates
        add_action('mps_gallery', array($this, 'render_gallery'));
        
        // Add before/after gallery shortcode
        add_shortcode('mps_before_after', array($this, 'mps_before_after_shortcode'));
    }

    /**
     * Render gallery widget
     *
     * @param int $gallery_id Optional gallery ID
     */
    public function render_gallery($gallery_id = null) {
        if (shortcode_exists('ngg')) {
            $id = $gallery_id ? intval($gallery_id) : 1;
            echo '<div class="mps-gallery-wrapper">';
            // Using wp_kses_post for safe HTML output from shortcode
            echo wp_kses_post(do_shortcode('[ngg src="galleries" ids="' . intval($id) . '" display="basic_thumbnail"]'));
            echo '</div>';
        }
    }

    /**
     * Before/After gallery shortcode
     *
     * @param array $atts Shortcode attributes
     * @return string
     */
    public function mps_before_after_shortcode($atts) {
        $atts = shortcode_atts(array(
            'gallery' => '1',
            'columns' => '3',
        ), $atts);

        $output = '<div class="mps-before-after-gallery columns-' . esc_attr($atts['columns']) . '">';
        
        if (shortcode_exists('ngg')) {
            // Using wp_kses_post to sanitize shortcode output
            $output .= wp_kses_post(do_shortcode('[ngg src="galleries" ids="' . esc_attr($atts['gallery']) . '" display="basic_thumbnail"]'));
        }
        
        $output .= '</div>';

        return $output;
    }

    /**
     * Initialize Tawk.to integration
     */
    private function init_tawkto_integration() {
        // Customize Tawk.to behavior based on page
        add_action('wp_head', array($this, 'customize_tawkto'));
    }

    /**
     * Customize Tawk.to based on current page
     */
    public function customize_tawkto() {
        // Add custom visitor attributes for better support context
        ?>
        <script type="text/javascript">
        var Tawk_API = Tawk_API || {};
        Tawk_API.onLoad = function() {
            <?php if (is_page()): ?>
            Tawk_API.setAttributes({
                'page': '<?php echo esc_js(get_the_title()); ?>',
                'url': '<?php echo esc_url(get_permalink()); ?>'
            });
            <?php endif; ?>
        };
        </script>
        <?php
    }

    /**
     * Display plugin recommendations in admin
     */
    public function display_plugin_recommendations() {
        // Only show to administrators
        if (!current_user_can('manage_options')) {
            return;
        }

        // Get dismissed notices
        $dismissed = get_option('mps_dismissed_plugin_notices', array());

        // Define recommended plugins
        $recommended_plugins = array(
            'ameliabooking/ameliabooking.php' => array(
                'name' => 'Amelia Lite',
                'slug' => 'ameliabooking',
                'priority' => 'high',
            ),
            'wpforms-lite/wpforms.php' => array(
                'name' => 'WPForms Lite',
                'slug' => 'wpforms-lite',
                'priority' => 'high',
            ),
            'wordpress-seo/wp-seo.php' => array(
                'name' => 'Yoast SEO',
                'slug' => 'wordpress-seo',
                'priority' => 'high',
            ),
            'developer-developer-developer/developer-developer-developer.php' => array(
                'name' => 'Stars Testimonials',
                'slug' => 'developer-developer-developer',
                'priority' => 'high',
            ),
            'nextgen-gallery/nggallery.php' => array(
                'name' => 'NextGEN Gallery',
                'slug' => 'nextgen-gallery',
                'priority' => 'medium',
            ),
            'tawkto-live-chat/tawkto.php' => array(
                'name' => 'Tawk.to Live Chat',
                'slug' => 'tawkto-live-chat',
                'priority' => 'medium',
            ),
            'wp-google-maps/wpGoogleMaps.php' => array(
                'name' => 'WP Google Maps',
                'slug' => 'wp-google-maps',
                'priority' => 'medium',
            ),
            'wordfence/wordfence.php' => array(
                'name' => 'Wordfence Security',
                'slug' => 'wordfence',
                'priority' => 'medium',
            ),
            'litespeed-cache/litespeed-cache.php' => array(
                'name' => 'LiteSpeed Cache',
                'slug' => 'litespeed-cache',
                'priority' => 'medium',
            ),
        );

        // Check which plugins are not installed
        $missing_plugins = array();
        foreach ($recommended_plugins as $plugin_path => $plugin_info) {
            if (!$this->is_plugin_active($plugin_path) && !in_array($plugin_info['slug'], $dismissed)) {
                $missing_plugins[] = $plugin_info;
            }
        }

        // Display notice if there are missing high-priority plugins
        $high_priority_missing = array_filter($missing_plugins, function($plugin) {
            return $plugin['priority'] === 'high';
        });

        if (!empty($high_priority_missing)) {
            $plugin_names = array_column($high_priority_missing, 'name');
            ?>
            <div class="notice notice-info is-dismissible">
                <p>
                    <strong><?php esc_html_e('MPS Theme Recommendation:', 'mps-theme'); ?></strong>
                    <?php 
                    printf(
                        /* translators: %s: comma-separated list of plugin names */
                        esc_html__('For the best experience, consider installing these recommended plugins: %s', 'mps-theme'),
                        esc_html(implode(', ', $plugin_names))
                    ); 
                    ?>
                </p>
                <p>
                    <a href="<?php echo esc_url(admin_url('plugins.php')); ?>" class="button button-primary">
                        <?php esc_html_e('Go to Plugins', 'mps-theme'); ?>
                    </a>
                </p>
            </div>
            <?php
        }
    }
}

// Initialize the integration
MPS_Plugin_Integration::get_instance();

/**
 * Helper function to check if a recommended plugin is active
 *
 * @param string $plugin_slug Plugin slug
 * @return bool
 */
function mps_is_recommended_plugin_active($plugin_slug) {
    $plugin_map = array(
        'amelia' => 'ameliabooking/ameliabooking.php',
        'wpforms' => 'wpforms-lite/wpforms.php',
        'yoast' => 'wordpress-seo/wp-seo.php',
        'testimonials' => 'developer-developer-developer/developer-developer-developer.php',
        'nextgen' => 'nextgen-gallery/nggallery.php',
        'tawkto' => 'tawkto-live-chat/tawkto.php',
        'googlemaps' => 'wp-google-maps/wpGoogleMaps.php',
        'wordfence' => 'wordfence/wordfence.php',
        'litespeed' => 'litespeed-cache/litespeed-cache.php',
    );

    if (!isset($plugin_map[$plugin_slug])) {
        return false;
    }

    if (!function_exists('is_plugin_active')) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    return is_plugin_active($plugin_map[$plugin_slug]);
}

/**
 * Template tag for displaying booking widget
 */
function mps_display_booking_widget() {
    do_action('mps_booking_widget');
}

/**
 * Template tag for displaying quote form
 *
 * @param int $form_id Optional form ID
 */
function mps_display_quote_form($form_id = null) {
    do_action('mps_quote_form', $form_id);
}

/**
 * Template tag for displaying contact form
 *
 * @param int $form_id Optional form ID
 */
function mps_display_contact_form($form_id = null) {
    do_action('mps_contact_form', $form_id);
}

/**
 * Template tag for displaying gallery
 *
 * @param int $gallery_id Optional gallery ID
 */
function mps_display_gallery($gallery_id = null) {
    do_action('mps_gallery', $gallery_id);
}
