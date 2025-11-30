<?php
/**
 * Merlin Property Services Theme Functions
 *
 * @package MPS_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define Theme Constants
 */
define('MPS_THEME_VERSION', '1.0.0');
define('MPS_THEME_DIR', get_template_directory());
define('MPS_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function mps_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary'     => __('Primary Menu', 'mps-theme'),
        'footer'      => __('Footer Menu', 'mps-theme'),
        'services'    => __('Services Menu', 'mps-theme'),
    ));

    // Add HTML5 support for various elements
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Set content width
    $GLOBALS['content_width'] = 1140;
}
add_action('after_setup_theme', 'mps_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function mps_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'mps-google-fonts',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap',
        array(),
        null
    );

    // Main Stylesheet
    wp_enqueue_style(
        'mps-style',
        get_stylesheet_uri(),
        array(),
        MPS_THEME_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'mps-main',
        MPS_THEME_URI . '/assets/js/main.js',
        array(),
        MPS_THEME_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('mps-main', 'mpsData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('mps_nonce'),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mps_enqueue_assets');

/**
 * Register Widget Areas
 */
function mps_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'mps-theme'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here for the footer.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'mps-theme'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here for the footer.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Sidebar', 'mps-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here for the sidebar.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mps_widgets_init');

/**
 * Custom Navigation Walker for Primary Menu
 */
class MPS_Nav_Walker extends Walker_Nav_Menu {
    /**
     * Start Level
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    /**
     * Start Element
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Check if item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';
        
        $output .= $indent . '<li' . $id_attr . $class_names . '>';
        
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        // Add active class
        if (in_array('current-menu-item', $classes)) {
            $atts['class'] = 'active';
        }
        
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Get Service Data
 */
function mps_get_services() {
    return array(
        'end-of-lease-cleaning' => array(
            'title'       => 'End of Lease Cleaning',
            'description' => '100% bond back guarantee for your move-out',
            'icon'        => 'home-sparkle',
            'badge'       => '100% Bond Back Guarantee',
            'slug'        => 'end-of-lease-cleaning',
        ),
        'move-in-cleaning' => array(
            'title'       => 'Move In Cleaning',
            'description' => 'Start fresh in a professionally cleaned home',
            'icon'        => 'key',
            'badge'       => 'Start Fresh',
            'slug'        => 'move-in-cleaning',
        ),
        'commercial-cleaning' => array(
            'title'       => 'Commercial Cleaning',
            'description' => 'Keep your workplace spotless and professional',
            'icon'        => 'building',
            'badge'       => 'Office & Retail',
            'slug'        => 'commercial-cleaning',
        ),
        'pre-sale-cleaning' => array(
            'title'       => 'Pre-sale Cleaning',
            'description' => 'Maximize your property\'s appeal to buyers',
            'icon'        => 'house-sale',
            'badge'       => 'Property Presentation',
            'slug'        => 'pre-sale-cleaning',
        ),
        'gardening-services' => array(
            'title'       => 'Gardening Services',
            'description' => 'Complete garden care and maintenance',
            'icon'        => 'leaf',
            'badge'       => 'Garden Care',
            'slug'        => 'gardening-services',
        ),
        'carpet-cleaning' => array(
            'title'       => 'Carpet Cleaning',
            'description' => 'Deep clean for carpets, rugs, and upholstery',
            'icon'        => 'carpet',
            'badge'       => 'Steam Cleaning',
            'slug'        => 'carpet-cleaning',
        ),
        'window-cleaning' => array(
            'title'       => 'Window Cleaning',
            'description' => 'Crystal clear windows inside and out',
            'icon'        => 'window',
            'badge'       => 'Interior & Exterior',
            'slug'        => 'window-cleaning',
        ),
        'minor-maintenance' => array(
            'title'       => 'Minor Maintenance',
            'description' => 'Small repairs, painting, and handyman services',
            'icon'        => 'tools',
            'badge'       => 'Handyman Services',
            'slug'        => 'minor-maintenance',
        ),
    );
}

/**
 * Get Service Pricing
 */
function mps_get_service_pricing($service_slug) {
    $pricing = array(
        'end-of-lease-cleaning' => array(
            'tiers' => array(
                array('size' => '1 Bedroom / 1 Bathroom', 'price' => '$450'),
                array('size' => '2 Bedroom / 1 Bathroom', 'price' => '$550'),
                array('size' => '2 Bedroom / 2 Bathroom', 'price' => '$650'),
                array('size' => '3 Bedroom / 2 Bathroom', 'price' => '$750'),
                array('size' => '4 Bedroom / 2 Bathroom', 'price' => '$850'),
            ),
            'addons' => array(
                array('name' => 'Carpet Steam Cleaning', 'price' => 'From $150'),
                array('name' => 'Garden & Lawn Maintenance', 'price' => 'Quote on request'),
                array('name' => 'Pest Control Coordination', 'price' => 'We can arrange'),
            ),
            'special_offers' => array(
                array('name' => 'Early Bird Discount', 'description' => 'Book 2+ weeks in advance and save an extra 10%'),
                array('name' => 'Referral Bonus', 'description' => 'Refer a friend and you both receive $50 off your next clean'),
                array('name' => 'Combo Deal', 'description' => 'End of lease + carpet cleaning together: Save $50!'),
            ),
        ),
        'gardening-services' => array(
            'tiers' => array(
                array('service' => 'Regular Lawn Mowing', 'price' => 'From $45/visit'),
                array('service' => 'Full Garden Maintenance', 'price' => 'From $60/hour'),
                array('service' => 'Hedge Trimming', 'price' => 'From $30'),
                array('service' => 'Garden Cleanup', 'price' => 'From $80'),
            ),
        ),
        'carpet-cleaning' => array(
            'tiers' => array(
                array('service' => 'Per Room', 'price' => 'From $50'),
                array('service' => 'Whole House (3 rooms)', 'price' => 'From $130'),
                array('service' => 'Stain Treatment', 'price' => 'From $20/stain'),
                array('service' => 'Upholstery Cleaning', 'price' => 'From $60'),
            ),
        ),
        'window-cleaning' => array(
            'tiers' => array(
                array('service' => 'Per Window', 'price' => 'From $8'),
                array('service' => 'Small House (up to 10 windows)', 'price' => 'From $70'),
                array('service' => 'Medium House (11-20 windows)', 'price' => 'From $130'),
                array('service' => 'Large House (20+ windows)', 'price' => 'From $180'),
            ),
        ),
        'commercial-cleaning' => array(
            'tiers' => array(
                array('size' => 'Small Office (<100m²)', 'price' => 'From $80/visit'),
                array('size' => 'Medium Office (100-250m²)', 'price' => 'From $150/visit'),
                array('size' => 'Large Office (250m²+)', 'price' => 'Custom Quote'),
                array('size' => 'Retail Space', 'price' => 'From $100/visit'),
            ),
        ),
        'minor-maintenance' => array(
            'tiers' => array(
                array('service' => 'Hourly Rate', 'price' => '$55/hour (1 hr minimum)'),
                array('service' => 'Small Repairs', 'price' => 'From $55'),
                array('service' => 'Painting (per room)', 'price' => 'From $150'),
                array('service' => 'Fixture Installation', 'price' => 'From $45'),
            ),
        ),
    );
    
    return isset($pricing[$service_slug]) ? $pricing[$service_slug] : array();
}

/**
 * Contact Form Handler
 */
function mps_handle_contact_form() {
    check_ajax_referer('mps_nonce', 'nonce');
    
    // Sanitize form data
    $name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $service = isset($_POST['service']) ? sanitize_text_field(wp_unslash($_POST['service'])) : '';
    $date    = isset($_POST['preferred_date']) ? sanitize_text_field(wp_unslash($_POST['preferred_date'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone)) {
        wp_send_json_error(array('message' => 'Please fill in all required fields.'));
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }
    
    // Build email content
    $to      = get_option('admin_email');
    $subject = 'New Contact Form Submission - MPS Website';
    $body    = "New contact form submission:\n\n";
    $body   .= "Name: $name\n";
    $body   .= "Email: $email\n";
    $body   .= "Phone: $phone\n";
    $body   .= "Service: $service\n";
    $body   .= "Preferred Date: $date\n";
    $body   .= "Message:\n$message\n";
    
    // Sanitize name to prevent header injection (remove newlines and special chars)
    $safe_name = preg_replace('/[\r\n]/', '', $name);
    $safe_name = substr($safe_name, 0, 100); // Limit length
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email,
    );
    
    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you for your message. We will get back to you soon!'));
    } else {
        wp_send_json_error(array('message' => 'There was an error sending your message. Please try again.'));
    }
}
add_action('wp_ajax_mps_contact_form', 'mps_handle_contact_form');
add_action('wp_ajax_nopriv_mps_contact_form', 'mps_handle_contact_form');

/**
 * Custom Excerpt Length
 */
function mps_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'mps_excerpt_length');

/**
 * Custom Excerpt More
 */
function mps_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'mps_excerpt_more');

/**
 * Add SVG Support
 */
function mps_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'mps_mime_types');

/**
 * Custom Body Classes
 */
function mps_body_classes($classes) {
    // Add page slug as body class
    if (is_page()) {
        $classes[] = 'page-' . basename(get_permalink());
    }
    
    // Add service page class
    if (is_page_template('templates/template-service.php')) {
        $classes[] = 'service-page';
    }
    
    return $classes;
}
add_filter('body_class', 'mps_body_classes');

/**
 * Get SVG Icon
 */
function mps_get_icon($icon_name, $class = '') {
    $icons = array(
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
        'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
        'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><polyline points="6 9 12 15 18 9"></polyline></svg>',
        'chevron-right' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><polyline points="9 18 15 12 9 6"></polyline></svg>',
        'home-sparkle' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
        'key' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>',
        'building' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path></svg>',
        'house-sale' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><circle cx="12" cy="14" r="3"></circle><path d="M12 11v6"></path></svg>',
        'leaf' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>',
        'carpet' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M6 8h12"></path><path d="M6 12h12"></path><path d="M6 16h12"></path></svg>',
        'window' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><rect x="3" y="3" width="18" height="18" rx="2"></rect><path d="M3 12h18"></path><path d="M12 3v18"></path></svg>',
        'tools' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
        'shield-check' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
        'award' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
        'settings' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . esc_attr($class) . '"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . esc_attr($class) . '"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . esc_attr($class) . '"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
    );
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}

/**
 * Output SVG Icon
 */
function mps_icon($icon_name, $class = '') {
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo mps_get_icon($icon_name, $class);
}

/**
 * Get service-specific content
 * 
 * @param string $slug Service slug
 * @return array Service content data
 */
function mps_get_service_content($slug) {
    $content = array(
        'end-of-lease-cleaning' => array(
            'hero_description' => 'Moving out? Our professional end of lease cleaning service ensures you get your full bond back. We cover every detail that real estate agents look for.',
            'included' => array(
                'Full kitchen deep clean (oven, stovetop, rangehood, cupboards)',
                'All bathroom sanitization',
                'Window cleaning (interior)',
                'Floor vacuuming and mopping',
                'Dusting all surfaces and fixtures',
                'Cobweb removal',
                'Light switches and power points cleaned',
                'Skirting boards wiped down',
                'Wardrobe and cupboard interiors cleaned',
                'Garage swept (if applicable)',
                'Balcony/patio cleaned',
                'Wall spot cleaning',
            ),
            'faqs' => array(
                array(
                    'question' => 'What does the 100% Bond Back Guarantee mean?',
                    'answer' => 'If you fail your final inspection due to cleaning issues, contact us within 72 hours and we\'ll return to fix any problems at no extra cost. We\'ve got you covered.',
                ),
                array(
                    'question' => 'How long does an end of lease clean take?',
                    'answer' => 'Typically 4-8 hours depending on the property size and condition. A 2-bedroom apartment usually takes about 4-5 hours, while a 3-bedroom house can take 6-8 hours.',
                ),
                array(
                    'question' => 'Do I need to be present during the cleaning?',
                    'answer' => 'No, you don\'t need to be there. Just ensure we have access to the property and any specific instructions. We\'ll lock up when we\'re done.',
                ),
                array(
                    'question' => 'What if I need additional services like carpet cleaning?',
                    'answer' => 'We offer carpet steam cleaning, window cleaning, and other add-on services. These can be bundled with your end of lease clean for convenience and savings.',
                ),
            ),
        ),
        'move-in-cleaning' => array(
            'hero_description' => 'Start fresh in your new home with our professional move-in cleaning service. We\'ll make sure your new space is spotless and ready for you to settle in.',
            'included' => array(
                'Full kitchen sanitization',
                'Bathroom deep cleaning',
                'All floors vacuumed and mopped',
                'Interior window cleaning',
                'Cupboard and wardrobe interiors cleaned',
                'Light fixtures dusted',
                'Ceiling fans cleaned',
                'All surfaces sanitized',
                'Appliance exterior cleaning',
            ),
            'faqs' => array(
                array(
                    'question' => 'When should I schedule my move-in clean?',
                    'answer' => 'Ideally, schedule your move-in clean before your furniture arrives. This gives us clear access to all areas and ensures you\'re moving into a truly fresh space.',
                ),
                array(
                    'question' => 'Can you clean before my settlement date?',
                    'answer' => 'We can work with your real estate agent to schedule cleaning as soon as you have access to the property, even before settlement if arranged.',
                ),
                array(
                    'question' => 'Do you offer unpacking services?',
                    'answer' => 'We focus on cleaning services. However, we can recommend trusted local unpacking and organizing services if you need them.',
                ),
            ),
        ),
        'commercial-cleaning' => array(
            'hero_description' => 'Keep your workplace spotless and professional with our commercial cleaning services. We work around your schedule to minimize disruption.',
            'included' => array(
                'Reception and common area cleaning',
                'Office workspace sanitization',
                'Kitchen/break room deep clean',
                'Restroom sanitization',
                'Floor vacuuming and mopping',
                'Trash removal and bin sanitization',
                'Window and glass cleaning',
                'Dusting all surfaces',
                'Computer and equipment surface cleaning',
            ),
            'faqs' => array(
                array(
                    'question' => 'Do you offer after-hours cleaning?',
                    'answer' => 'Yes, we offer flexible scheduling including early morning, evening, and weekend cleaning to minimize disruption to your business operations.',
                ),
                array(
                    'question' => 'Can you provide regular cleaning contracts?',
                    'answer' => 'Absolutely. We offer daily, weekly, and fortnightly cleaning contracts with competitive rates for ongoing service.',
                ),
                array(
                    'question' => 'Do you provide cleaning supplies?',
                    'answer' => 'Yes, we bring all our own professional-grade cleaning equipment and eco-friendly supplies. No need to provide anything.',
                ),
            ),
        ),
        'pre-sale-cleaning' => array(
            'hero_description' => 'Maximize your property\'s appeal with our pre-sale cleaning service. First impressions matter - we\'ll make your property shine for potential buyers.',
            'included' => array(
                'Full interior deep clean',
                'Window cleaning (interior and exterior)',
                'Kitchen appliance detailing',
                'Bathroom deep sanitization',
                'All floors professionally cleaned',
                'Cobweb and dust removal',
                'Light fixture cleaning',
                'Outdoor areas tidied',
                'Presentation-ready finish',
            ),
            'faqs' => array(
                array(
                    'question' => 'When should I schedule pre-sale cleaning?',
                    'answer' => 'We recommend scheduling your clean 1-2 days before your first open house or photo shoot to ensure the property looks its absolute best.',
                ),
                array(
                    'question' => 'Do you offer styling advice?',
                    'answer' => 'While we focus on cleaning, we can recommend property stylists and photographers who can help present your home beautifully for sale.',
                ),
                array(
                    'question' => 'Can you do a quick refresh between open houses?',
                    'answer' => 'Yes, we offer quick touch-up services to ensure your property looks perfect for every inspection and open house.',
                ),
            ),
        ),
        'gardening-services' => array(
            'hero_description' => 'Complete garden care and maintenance to keep your outdoor spaces looking beautiful year-round. From regular lawn care to garden makeovers.',
            'included' => array(
                'Lawn mowing and edging',
                'Hedge trimming and shaping',
                'Garden bed weeding',
                'Pruning and plant care',
                'Leaf and debris removal',
                'Mulching services',
                'Basic lawn fertilizing',
                'Outdoor sweeping and tidying',
                'Green waste removal',
            ),
            'faqs' => array(
                array(
                    'question' => 'Do you offer regular garden maintenance?',
                    'answer' => 'Yes, we offer weekly, fortnightly, and monthly garden maintenance packages to keep your garden looking great all year round.',
                ),
                array(
                    'question' => 'Can you help with garden design?',
                    'answer' => 'We can assist with basic garden improvements and planting. For major landscaping projects, we can recommend specialist landscapers.',
                ),
                array(
                    'question' => 'Do you remove the green waste?',
                    'answer' => 'Yes, all green waste is removed and disposed of responsibly. This is included in our service price.',
                ),
            ),
        ),
        'carpet-cleaning' => array(
            'hero_description' => 'Professional steam cleaning for carpets, rugs, and upholstery. Remove deep stains, allergens, and odors for a fresher, healthier home.',
            'included' => array(
                'Pre-treatment of stains',
                'Hot water extraction cleaning',
                'Deodorizing treatment',
                'Quick-dry technology',
                'Furniture moving (light items)',
                'Edge and corner attention',
                'High-traffic area treatment',
                'Pet stain treatment available',
                'Upholstery cleaning available',
            ),
            'faqs' => array(
                array(
                    'question' => 'How long does carpet cleaning take to dry?',
                    'answer' => 'With our professional equipment, carpets typically dry within 2-4 hours. We recommend waiting 24 hours before placing furniture back for best results.',
                ),
                array(
                    'question' => 'Can you remove pet stains and odors?',
                    'answer' => 'Yes, we have specialized treatments for pet stains and odors. Let us know about any specific problem areas when booking.',
                ),
                array(
                    'question' => 'How often should carpets be professionally cleaned?',
                    'answer' => 'We recommend professional cleaning every 12-18 months for most homes, or every 6 months for high-traffic areas or homes with pets.',
                ),
            ),
        ),
        'window-cleaning' => array(
            'hero_description' => 'Crystal clear windows inside and out. Our professional window cleaning service brings natural light flooding back into your home or business.',
            'included' => array(
                'Interior window glass cleaning',
                'Exterior window glass cleaning',
                'Window frame wiping',
                'Sill and track cleaning',
                'Screen cleaning available',
                'Flyscreen removal and replacement',
                'Mirror cleaning',
                'Glass door cleaning',
                'Streak-free finish guaranteed',
            ),
            'faqs' => array(
                array(
                    'question' => 'Do you clean high windows?',
                    'answer' => 'Yes, we have equipment to safely clean windows up to 2 stories. For higher buildings, please contact us for a custom quote.',
                ),
                array(
                    'question' => 'How often should windows be professionally cleaned?',
                    'answer' => 'We recommend professional window cleaning every 3-6 months depending on your location and exposure to dust and pollution.',
                ),
                array(
                    'question' => 'Do you clean window tracks and frames?',
                    'answer' => 'Yes, our service includes cleaning window tracks and frames as standard, ensuring a complete clean.',
                ),
            ),
        ),
        'minor-maintenance' => array(
            'hero_description' => 'Small repairs, painting, and handyman services for your home or rental property. From fixing leaky taps to touch-up painting, we handle the details.',
            'included' => array(
                'Minor plumbing repairs',
                'Light fixture installation',
                'Door and lock repairs',
                'Wall patching and repairs',
                'Touch-up painting',
                'Shelf and fixture mounting',
                'Blind and curtain installation',
                'Basic furniture assembly',
                'General handyman tasks',
            ),
            'faqs' => array(
                array(
                    'question' => 'What kind of repairs do you handle?',
                    'answer' => 'We handle minor repairs like leaky taps, door adjustments, patching holes, touch-up painting, and general handyman tasks. For major plumbing or electrical work, we\'ll recommend a specialist.',
                ),
                array(
                    'question' => 'Do you provide materials?',
                    'answer' => 'We can supply basic materials and hardware. For specific items or larger quantities, we\'ll advise what\'s needed and can collect them for you if requested.',
                ),
                array(
                    'question' => 'Can you help prepare a property for inspection?',
                    'answer' => 'Absolutely! We often work with tenants and landlords to fix minor issues before inspections. Combined with our cleaning services, we can have your property inspection-ready.',
                ),
            ),
        ),
    );
    
    return isset($content[$slug]) ? $content[$slug] : array();
}

/**
 * Plugin Compatibility and Integration
 * 
 * These functions provide integration with recommended plugins:
 * - Amelia Lite (Booking)
 * - WPForms Lite (Contact Forms)
 * - Yoast SEO (SEO)
 * - Stars Testimonials (Reviews)
 * - NextGEN Gallery (Photo Gallery)
 * - Tawk.to (Live Chat)
 * - WP Google Maps (Maps)
 * - Wordfence Security (Security)
 * - LiteSpeed Cache (Performance)
 */

/**
 * Register widget areas for plugin content
 */
function mps_register_plugin_widget_areas() {
    // Booking widget area
    register_sidebar(array(
        'name'          => __('Booking Widget Area', 'mps-theme'),
        'id'            => 'booking-widget',
        'description'   => __('Widget area for Amelia booking integration.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget booking-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Quote form widget area
    register_sidebar(array(
        'name'          => __('Quote Form Widget Area', 'mps-theme'),
        'id'            => 'quote-form-widget',
        'description'   => __('Widget area for WPForms quote request form.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget quote-form-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Testimonials widget area
    register_sidebar(array(
        'name'          => __('Testimonials Widget Area', 'mps-theme'),
        'id'            => 'testimonials-widget',
        'description'   => __('Widget area for testimonials display.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget testimonials-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Service area map widget
    register_sidebar(array(
        'name'          => __('Service Area Map Widget', 'mps-theme'),
        'id'            => 'map-widget',
        'description'   => __('Widget area for Google Maps service area display.', 'mps-theme'),
        'before_widget' => '<div id="%1$s" class="widget map-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mps_register_plugin_widget_areas');

/**
 * Add theme support for Yoast SEO breadcrumbs
 */
function mps_yoast_breadcrumb_support() {
    add_theme_support('yoast-seo-breadcrumbs');
}
add_action('after_setup_theme', 'mps_yoast_breadcrumb_support');

/**
 * Display Yoast SEO breadcrumbs
 */
function mps_display_breadcrumbs() {
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<nav class="mps-breadcrumbs" aria-label="Breadcrumb">', '</nav>');
    }
}

/**
 * Check if Amelia booking plugin is active and display booking widget
 */
function mps_show_booking_widget() {
    if (shortcode_exists('ameliabooking')) {
        echo '<div class="mps-booking-section">';
        // Using wp_kses_post for safe HTML output from shortcode
        echo wp_kses_post(do_shortcode('[ameliabooking]'));
        echo '</div>';
    } else {
        // Fallback contact CTA if Amelia is not installed
        echo '<div class="mps-booking-fallback">';
        echo '<h3>' . esc_html__('Book Your Service', 'mps-theme') . '</h3>';
        echo '<p>' . esc_html__('Contact us to schedule your cleaning or property service.', 'mps-theme') . '</p>';
        echo '<a href="' . esc_url(home_url('/contact/')) . '" class="btn btn-primary">' . esc_html__('Get a Quote', 'mps-theme') . '</a>';
        echo '</div>';
    }
}

/**
 * Check if testimonials plugin is active and display testimonials
 * 
 * @param int $count Number of testimonials to display
 */
function mps_show_testimonials($count = 6) {
    // Check for various testimonial plugins
    // Stars Testimonials plugin shortcode
    if (shortcode_exists('developer-developer-developer')) {
        // Using wp_kses_post for safe HTML output from shortcode
        echo wp_kses_post(do_shortcode('[developer-developer-developer count="' . intval($count) . '"]'));
    } elseif (shortcode_exists('developer-developer-developer')) {
        // Strong Testimonials plugin shortcode
        echo wp_kses_post(do_shortcode('[developer-developer-developer-developer per_page="' . intval($count) . '"]'));
    } else {
        // Static testimonials fallback
        mps_display_static_testimonials();
    }
}

/**
 * Display static testimonials as fallback
 */
function mps_display_static_testimonials() {
    $testimonials = array(
        array(
            'name'    => 'Sarah M.',
            'location' => 'Belconnen, ACT',
            'rating'  => 5,
            'content' => 'Merlin Property Services did an amazing job with our end of lease clean. We got our full bond back with no issues. Highly recommend!',
        ),
        array(
            'name'    => 'James W.',
            'location' => 'Queanbeyan, NSW',
            'rating'  => 5,
            'content' => 'Professional, thorough, and on time. Our office has never looked better. We\'ve signed up for weekly cleaning.',
        ),
        array(
            'name'    => 'Michelle T.',
            'location' => 'Gungahlin, ACT',
            'rating'  => 5,
            'content' => 'The carpet cleaning service transformed our carpets. They look brand new! Great value for money.',
        ),
    );

    echo '<div class="mps-testimonials-grid">';
    foreach ($testimonials as $testimonial) {
        echo '<div class="mps-testimonial-card">';
        echo '<div class="mps-testimonial-rating">';
        for ($i = 0; $i < $testimonial['rating']; $i++) {
            mps_icon('star', 'star-icon');
        }
        echo '</div>';
        echo '<p class="mps-testimonial-content">"' . esc_html($testimonial['content']) . '"</p>';
        echo '<div class="mps-testimonial-author">';
        echo '<strong>' . esc_html($testimonial['name']) . '</strong>';
        echo '<span>' . esc_html($testimonial['location']) . '</span>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}

/**
 * Check if NextGEN Gallery is active and display gallery
 * 
 * @param int    $gallery_id Gallery ID
 * @param string $display    Display type
 */
function mps_show_gallery($gallery_id = 1, $display = 'basic_thumbnail') {
    if (shortcode_exists('ngg')) {
        // Using wp_kses_post for safe HTML output from shortcode
        echo wp_kses_post(do_shortcode('[ngg src="galleries" ids="' . intval($gallery_id) . '" display="' . esc_attr($display) . '"]'));
    }
}

/**
 * Check if WP Google Maps is active and display map
 * 
 * @param int $map_id Map ID
 */
function mps_show_service_area_map($map_id = 1) {
    if (shortcode_exists('wpgmza')) {
        echo '<div class="mps-service-area-map">';
        // Using wp_kses_post for safe HTML output from shortcode
        echo wp_kses_post(do_shortcode('[wpgmza id="' . intval($map_id) . '"]'));
        echo '</div>';
    } else {
        // Fallback map placeholder
        echo '<div class="mps-map-placeholder">';
        echo '<div class="mps-map-overlay">';
        echo '<h4>' . esc_html__('Our Service Area', 'mps-theme') . '</h4>';
        echo '<p>' . esc_html__('We proudly serve Canberra and surrounding areas including Belconnen, Gungahlin, Tuggeranong, Woden, and Queanbeyan.', 'mps-theme') . '</p>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * Add custom Customizer settings for plugin integration
 * 
 * @param WP_Customize_Manager $wp_customize Customizer manager
 */
function mps_plugin_customizer_settings($wp_customize) {
    // Plugin Integration Section
    $wp_customize->add_section('mps_plugin_integration', array(
        'title'    => __('Plugin Integration', 'mps-theme'),
        'priority' => 130,
    ));

    // Quote Form ID setting
    $wp_customize->add_setting('mps_quote_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('mps_quote_form_id', array(
        'label'       => __('WPForms Quote Form ID', 'mps-theme'),
        'description' => __('Enter the ID of your WPForms quote request form.', 'mps-theme'),
        'section'     => 'mps_plugin_integration',
        'type'        => 'number',
    ));

    // Contact Form ID setting
    $wp_customize->add_setting('mps_contact_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('mps_contact_form_id', array(
        'label'       => __('WPForms Contact Form ID', 'mps-theme'),
        'description' => __('Enter the ID of your WPForms contact form.', 'mps-theme'),
        'section'     => 'mps_plugin_integration',
        'type'        => 'number',
    ));

    // Gallery ID setting
    $wp_customize->add_setting('mps_main_gallery_id', array(
        'default'           => '1',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('mps_main_gallery_id', array(
        'label'       => __('NextGEN Main Gallery ID', 'mps-theme'),
        'description' => __('Enter the ID of your main portfolio gallery.', 'mps-theme'),
        'section'     => 'mps_plugin_integration',
        'type'        => 'number',
    ));

    // Map ID setting
    $wp_customize->add_setting('mps_service_area_map_id', array(
        'default'           => '1',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('mps_service_area_map_id', array(
        'label'       => __('WP Google Maps ID', 'mps-theme'),
        'description' => __('Enter the ID of your service area map.', 'mps-theme'),
        'section'     => 'mps_plugin_integration',
        'type'        => 'number',
    ));
}
add_action('customize_register', 'mps_plugin_customizer_settings');

/**
 * Get recommended plugins list
 * 
 * @return array List of recommended plugins with details
 */
function mps_get_recommended_plugins() {
    return array(
        array(
            'name'        => 'Amelia Lite',
            'slug'        => 'ameliabooking',
            'priority'    => 'high',
            'description' => __('Online booking system for service appointments.', 'mps-theme'),
        ),
        array(
            'name'        => 'WPForms Lite',
            'slug'        => 'wpforms-lite',
            'priority'    => 'high',
            'description' => __('Drag & drop contact form builder.', 'mps-theme'),
        ),
        array(
            'name'        => 'Yoast SEO',
            'slug'        => 'wordpress-seo',
            'priority'    => 'high',
            'description' => __('Search engine optimization and local SEO.', 'mps-theme'),
        ),
        array(
            'name'        => 'Stars Testimonials',
            'slug'        => 'developer-developer-developer',
            'priority'    => 'high',
            'description' => __('Display customer testimonials with star ratings.', 'mps-theme'),
        ),
        array(
            'name'        => 'NextGEN Gallery',
            'slug'        => 'nextgen-gallery',
            'priority'    => 'medium',
            'description' => __('Photo gallery for before/after images.', 'mps-theme'),
        ),
        array(
            'name'        => 'Tawk.to Live Chat',
            'slug'        => 'tawkto-live-chat',
            'priority'    => 'medium',
            'description' => __('Free live chat for customer support.', 'mps-theme'),
        ),
        array(
            'name'        => 'WP Google Maps',
            'slug'        => 'wp-google-maps',
            'priority'    => 'medium',
            'description' => __('Display service area on interactive map.', 'mps-theme'),
        ),
        array(
            'name'        => 'Wordfence Security',
            'slug'        => 'wordfence',
            'priority'    => 'medium',
            'description' => __('Firewall and security scanning.', 'mps-theme'),
        ),
        array(
            'name'        => 'LiteSpeed Cache',
            'slug'        => 'litespeed-cache',
            'priority'    => 'medium',
            'description' => __('Page caching and performance optimization.', 'mps-theme'),
        ),
    );
}
