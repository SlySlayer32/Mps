<?php
/**
 * Template Part: Booking Section
 *
 * This template displays the booking widget using the Amelia plugin
 * or falls back to a contact CTA if the plugin is not active.
 *
 * @package MPS_Theme
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get the service parameter if set
$service = isset($args['service']) ? sanitize_text_field($args['service']) : '';
?>

<section class="booking-section section" id="booking">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Book Your Service', 'mps-theme'); ?></h2>
            <p><?php esc_html_e('Schedule your cleaning or property service online. Select a date and time that works for you.', 'mps-theme'); ?></p>
        </div>

        <div class="booking-content">
            <?php
            /**
             * Display booking widget
             * 
             * Uses Amelia Lite plugin if available,
             * otherwise displays contact form or CTA
             */
            if (shortcode_exists('ameliabooking')) {
                $shortcode = '[ameliabooking';
                if (!empty($service)) {
                    $shortcode .= ' service="' . esc_attr($service) . '"';
                }
                $shortcode .= ']';
                
                echo '<div class="mps-booking-wrapper">';
                echo wp_kses_post(do_shortcode($shortcode));
                echo '</div>';
            } elseif (shortcode_exists('wpforms')) {
                // Fallback to WPForms if Amelia is not available
                $form_id = get_theme_mod('mps_quote_form_id', '');
                if (!empty($form_id)) {
                    echo '<div class="mps-quote-form-wrapper">';
                    echo wp_kses_post(do_shortcode('[wpforms id="' . intval($form_id) . '"]'));
                    echo '</div>';
                } else {
                    mps_display_booking_fallback();
                }
            } else {
                // Static fallback
                mps_display_booking_fallback();
            }
            ?>
        </div>

        <div class="booking-features">
            <div class="booking-feature">
                <?php mps_icon('calendar', 'booking-feature-icon'); ?>
                <div>
                    <h4><?php esc_html_e('Flexible Scheduling', 'mps-theme'); ?></h4>
                    <p><?php esc_html_e('Choose a date and time that suits your schedule.', 'mps-theme'); ?></p>
                </div>
            </div>
            <div class="booking-feature">
                <?php mps_icon('shield-check', 'booking-feature-icon'); ?>
                <div>
                    <h4><?php esc_html_e('100% Bond Back Guarantee', 'mps-theme'); ?></h4>
                    <p><?php esc_html_e('We stand behind our work with our bond back promise.', 'mps-theme'); ?></p>
                </div>
            </div>
            <div class="booking-feature">
                <?php mps_icon('phone', 'booking-feature-icon'); ?>
                <div>
                    <h4><?php esc_html_e('Same Day Response', 'mps-theme'); ?></h4>
                    <p><?php esc_html_e('We respond to all inquiries within 24 hours.', 'mps-theme'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
/**
 * Display booking fallback when no booking plugin is active
 */
function mps_display_booking_fallback() {
    ?>
    <div class="mps-booking-fallback">
        <div class="booking-fallback-content">
            <div class="booking-fallback-icon">
                <?php mps_icon('calendar', 'fallback-icon'); ?>
            </div>
            <h3><?php esc_html_e('Ready to Book?', 'mps-theme'); ?></h3>
            <p><?php esc_html_e("Contact us today to schedule your cleaning or property service. We'll get back to you within 24 hours with a free, no-obligation quote.", 'mps-theme'); ?></p>
            
            <div class="booking-contact-options">
                <a href="tel:0261000000" class="btn btn-primary btn-lg">
                    <?php mps_icon('phone'); ?>
                    <?php esc_html_e('Call 02 6100 0000', 'mps-theme'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline btn-lg">
                    <?php mps_icon('mail'); ?>
                    <?php esc_html_e('Send a Message', 'mps-theme'); ?>
                </a>
            </div>

            <div class="booking-hours">
                <h4><?php esc_html_e('Business Hours', 'mps-theme'); ?></h4>
                <ul>
                    <li><span><?php esc_html_e('Monday - Friday', 'mps-theme'); ?></span> <span>7:00 AM - 6:00 PM</span></li>
                    <li><span><?php esc_html_e('Saturday', 'mps-theme'); ?></span> <span>8:00 AM - 4:00 PM</span></li>
                    <li><span><?php esc_html_e('Sunday', 'mps-theme'); ?></span> <span><?php esc_html_e('Closed', 'mps-theme'); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}
?>

<style>
/* Booking Section Styles */
.booking-section {
    background-color: var(--white);
}

.booking-content {
    max-width: 900px;
    margin: 0 auto var(--spacing-xl);
}

/* Booking wrapper for Amelia */
.mps-booking-wrapper {
    background-color: var(--off-white);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

/* Quote form wrapper for WPForms fallback */
.mps-quote-form-wrapper {
    background-color: var(--off-white);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

/* Booking fallback styles */
.mps-booking-fallback {
    background: linear-gradient(135deg, var(--off-white) 0%, var(--white) 100%);
    padding: var(--spacing-xxl);
    border-radius: var(--radius-lg);
    text-align: center;
    border: 2px dashed var(--light-gray);
}

.booking-fallback-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--spacing-md);
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
}

.booking-fallback-icon .fallback-icon {
    width: 40px;
    height: 40px;
    color: var(--white);
}

.mps-booking-fallback h3 {
    font-size: 1.75rem;
    margin-bottom: var(--spacing-sm);
}

.mps-booking-fallback > p {
    max-width: 500px;
    margin: 0 auto var(--spacing-lg);
    color: var(--neutral-color);
}

.booking-contact-options {
    display: flex;
    justify-content: center;
    gap: var(--spacing-md);
    flex-wrap: wrap;
    margin-bottom: var(--spacing-xl);
}

.booking-contact-options .btn svg {
    width: 20px;
    height: 20px;
}

.booking-hours {
    padding-top: var(--spacing-lg);
    border-top: 1px solid var(--light-gray);
}

.booking-hours h4 {
    margin-bottom: var(--spacing-md);
}

.booking-hours ul {
    max-width: 300px;
    margin: 0 auto;
}

.booking-hours li {
    display: flex;
    justify-content: space-between;
    padding: var(--spacing-xs) 0;
    color: var(--neutral-color);
}

.booking-hours li span:first-child {
    font-weight: 500;
    color: var(--dark-gray);
}

/* Booking features */
.booking-features {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--spacing-lg);
    padding-top: var(--spacing-xl);
    border-top: 1px solid var(--light-gray);
}

.booking-feature {
    display: flex;
    gap: var(--spacing-md);
    align-items: flex-start;
}

.booking-feature-icon {
    width: 50px;
    height: 50px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(255, 149, 0, 0.1);
    border-radius: var(--radius-md);
    color: var(--primary-color);
}

.booking-feature h4 {
    font-size: 1rem;
    margin-bottom: var(--spacing-xs);
}

.booking-feature p {
    font-size: 0.875rem;
    margin: 0;
}

/* Responsive */
@media (max-width: 991px) {
    .booking-features {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .booking-feature {
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 767px) {
    .mps-booking-fallback {
        padding: var(--spacing-xl);
    }

    .booking-contact-options {
        flex-direction: column;
        align-items: center;
    }

    .booking-contact-options .btn {
        width: 100%;
        max-width: 280px;
    }
}
</style>
