<?php
/**
 * Template Part: Service Area Map Section
 *
 * This template displays the service area using WP Google Maps plugin
 * or falls back to a static display if the plugin is not active.
 *
 * @package MPS_Theme
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get the map ID from customizer or use default
$map_id = get_theme_mod('mps_service_area_map_id', 1);
?>

<section class="service-area-section section" id="service-area">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Our Service Area', 'mps-theme'); ?></h2>
            <p><?php esc_html_e('We proudly serve Canberra and surrounding areas. Check if we cover your location.', 'mps-theme'); ?></p>
        </div>

        <div class="service-area-content">
            <?php
            /**
             * Display service area map
             * 
             * Uses WP Google Maps plugin if available,
             * otherwise displays static service area information
             */
            if (shortcode_exists('wpgmza')) {
                echo '<div class="mps-map-container">';
                echo wp_kses_post(do_shortcode('[wpgmza id="' . intval($map_id) . '"]'));
                echo '</div>';
            } else {
                // Static fallback map placeholder
                ?>
                <div class="mps-map-placeholder">
                    <div class="map-placeholder-inner">
                        <?php mps_icon('map-pin', 'map-placeholder-icon'); ?>
                        <h3><?php esc_html_e('Canberra & Surrounding Areas', 'mps-theme'); ?></h3>
                        <p><?php esc_html_e('We service all suburbs within Canberra and Queanbeyan regions.', 'mps-theme'); ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="service-areas-list">
            <h3><?php esc_html_e('Areas We Service', 'mps-theme'); ?></h3>
            
            <div class="areas-grid">
                <?php
                $service_areas = array(
                    'canberra-central' => array(
                        'name' => __('Canberra Central', 'mps-theme'),
                        'suburbs' => array('Civic', 'Braddon', 'Reid', 'Acton', 'Turner', "O'Connor", 'Lyneham', 'Dickson'),
                    ),
                    'belconnen' => array(
                        'name' => __('Belconnen', 'mps-theme'),
                        'suburbs' => array('Belconnen', 'Bruce', 'Kaleen', 'Giralang', 'McKellar', 'Evatt', 'Florey', 'Page'),
                    ),
                    'gungahlin' => array(
                        'name' => __('Gungahlin', 'mps-theme'),
                        'suburbs' => array('Gungahlin', 'Harrison', 'Franklin', 'Crace', 'Palmerston', 'Ngunnawal', 'Amaroo', 'Bonner'),
                    ),
                    'tuggeranong' => array(
                        'name' => __('Tuggeranong', 'mps-theme'),
                        'suburbs' => array('Tuggeranong', 'Kambah', 'Wanniassa', 'Monash', 'Greenway', 'Calwell', 'Richardson', 'Gordon'),
                    ),
                    'woden' => array(
                        'name' => __('Woden Valley', 'mps-theme'),
                        'suburbs' => array('Phillip', 'Curtin', 'Hughes', 'Garran', 'Lyons', 'Chifley', 'Pearce', 'Torrens'),
                    ),
                    'weston' => array(
                        'name' => __('Weston Creek', 'mps-theme'),
                        'suburbs' => array('Weston', 'Waramanga', 'Fisher', 'Chapman', 'Rivett', 'Stirling', 'Holder', 'Duffy'),
                    ),
                    'inner-south' => array(
                        'name' => __('Inner South', 'mps-theme'),
                        'suburbs' => array('Kingston', 'Griffith', 'Narrabundah', 'Red Hill', 'Forrest', 'Barton', 'Manuka', 'Deakin'),
                    ),
                    'queanbeyan' => array(
                        'name' => __('Queanbeyan', 'mps-theme'),
                        'suburbs' => array('Queanbeyan', 'Jerrabomberra', 'Googong', 'Karabar', 'Crestwood', 'Environa'),
                    ),
                );

                foreach ($service_areas as $area_slug => $area) :
                    ?>
                    <div class="area-card">
                        <h4>
                            <?php mps_icon('map-pin', 'area-icon'); ?>
                            <?php echo esc_html($area['name']); ?>
                        </h4>
                        <ul class="suburb-list">
                            <?php foreach ($area['suburbs'] as $suburb) : ?>
                                <li><?php echo esc_html($suburb); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>

            <div class="service-area-note">
                <p>
                    <?php mps_icon('check', 'note-icon'); ?>
                    <?php esc_html_e("Can't see your suburb? Contact us - we likely service your area too!", 'mps-theme'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline">
                    <?php esc_html_e('Check Availability', 'mps-theme'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Service Area Section Styles */
.service-area-section {
    background-color: var(--off-white);
}

.service-area-content {
    margin-bottom: var(--spacing-xl);
}

/* Map container */
.mps-map-container {
    height: 450px;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.mps-map-container iframe,
.mps-map-container .wpgmza_map {
    width: 100% !important;
    height: 100% !important;
}

/* Map placeholder */
.mps-map-placeholder {
    height: 400px;
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--white);
}

.map-placeholder-inner {
    padding: var(--spacing-xl);
}

.map-placeholder-icon {
    width: 60px;
    height: 60px;
    margin-bottom: var(--spacing-md);
    opacity: 0.9;
}

.mps-map-placeholder h3 {
    color: var(--white);
    font-size: 1.75rem;
    margin-bottom: var(--spacing-sm);
}

.mps-map-placeholder p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.125rem;
    margin: 0;
}

/* Service areas list */
.service-areas-list h3 {
    text-align: center;
    margin-bottom: var(--spacing-lg);
}

.areas-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-xl);
}

.area-card {
    background-color: var(--white);
    padding: var(--spacing-md);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
}

.area-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.area-card h4 {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    font-size: 1rem;
    margin-bottom: var(--spacing-sm);
    color: var(--dark-gray);
}

.area-icon {
    width: 20px;
    height: 20px;
    color: var(--primary-color);
}

.suburb-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.suburb-list li {
    font-size: 0.875rem;
    color: var(--neutral-color);
    padding: 2px 0;
}

/* Service area note */
.service-area-note {
    text-align: center;
    background-color: var(--white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-md);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--spacing-md);
}

.service-area-note p {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    margin: 0;
    font-size: 1rem;
    color: var(--dark-gray);
}

.service-area-note .note-icon {
    width: 24px;
    height: 24px;
    color: var(--primary-color);
}

/* Responsive */
@media (max-width: 991px) {
    .areas-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .areas-grid {
        grid-template-columns: 1fr;
    }

    .mps-map-container,
    .mps-map-placeholder {
        height: 300px;
    }
}
</style>
