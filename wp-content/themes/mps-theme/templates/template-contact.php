<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * @package MPS_Theme
 */

get_header();

// Get services for dropdown
$services = mps_get_services();
?>

<!-- Contact Hero Section -->
<section class="contact-hero">
    <div class="container">
        <div class="section-header">
            <span class="hero-badge">
                <?php mps_icon('mail'); ?>
                Get In Touch
            </span>
            <h1>Contact Us</h1>
            <p>Have a question or ready to book? We're here to help. Get in touch with us today.</p>
        </div>
    </div>
</section>

<!-- Contact Content Section -->
<section class="section">
    <div class="container">
        <div class="contact-content">
            <!-- Contact Information -->
            <div class="contact-info-card">
                <h3>Contact Information</h3>
                
                <div class="contact-item">
                    <div class="contact-item-icon">
                        <?php mps_icon('phone'); ?>
                    </div>
                    <div class="contact-item-content">
                        <h4>Phone</h4>
                        <p><a href="tel:+61412345678">0412 345 678</a></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <?php mps_icon('mail'); ?>
                    </div>
                    <div class="contact-item-content">
                        <h4>Email</h4>
                        <p><a href="mailto:info@merlinps.com.au">info@merlinps.com.au</a></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <?php mps_icon('map-pin'); ?>
                    </div>
                    <div class="contact-item-content">
                        <h4>Service Area</h4>
                        <p>Melbourne, Victoria<br>Greater Melbourne Metro</p>
                    </div>
                </div>

                <div class="business-hours">
                    <h4>Business Hours</h4>
                    <ul class="hours-list">
                        <li><span>Monday - Friday</span><span>7:00 AM - 7:00 PM</span></li>
                        <li><span>Saturday</span><span>7:00 AM - 7:00 PM</span></li>
                        <li><span>Sunday</span><span>8:00 AM - 5:00 PM</span></li>
                    </ul>
                </div>

                <!-- Trust Badges -->
                <div style="margin-top: var(--spacing-lg); padding-top: var(--spacing-lg); border-top: 1px solid var(--light-gray);">
                    <div class="hero-features" style="flex-direction: column; gap: var(--spacing-sm);">
                        <div class="hero-feature">
                            <?php mps_icon('check'); ?>
                            <span>100% Bond Back Guarantee</span>
                        </div>
                        <div class="hero-feature">
                            <?php mps_icon('check'); ?>
                            <span>Fully Insured</span>
                        </div>
                        <div class="hero-feature">
                            <?php mps_icon('check'); ?>
                            <span>Same Day Available</span>
                        </div>
                        <div class="hero-feature">
                            <?php mps_icon('check'); ?>
                            <span>Professional Team</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h3>Send Us a Message</h3>
                <p style="margin-bottom: var(--spacing-lg); color: var(--neutral-color);">Fill out the form below and we'll get back to you as soon as possible.</p>
                
                <form id="contact-form" method="post" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">Name <span class="required">*</span></label>
                            <input type="text" id="contact-name" name="name" class="form-control" placeholder="Your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email <span class="required">*</span></label>
                            <input type="email" id="contact-email" name="email" class="form-control" placeholder="your@email.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-phone">Phone <span class="required">*</span></label>
                            <input type="tel" id="contact-phone" name="phone" class="form-control" placeholder="0412 345 678" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-service">Service Needed</label>
                            <select id="contact-service" name="service" class="form-control">
                                <option value="">Select a service</option>
                                <?php foreach ($services as $slug => $service) : ?>
                                    <option value="<?php echo esc_attr($service['title']); ?>"><?php echo esc_html($service['title']); ?></option>
                                <?php endforeach; ?>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact-date">Preferred Date</label>
                        <input type="date" id="contact-date" name="preferred_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Message</label>
                        <textarea id="contact-message" name="message" class="form-control" rows="5" placeholder="Tell us about your property and requirements..."></textarea>
                    </div>

                    <input type="hidden" name="action" value="mps_contact_form">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('mps_nonce')); ?>">

                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                        Send Message
                    </button>

                    <div id="form-message" style="margin-top: var(--spacing-md); display: none;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Service Area Map Section -->
<section class="section service-area-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Service Area</h2>
            <p>We service the greater Melbourne metropolitan area.</p>
        </div>
        <div class="service-area-map">
            <!-- Map placeholder - Can be replaced with Google Maps integration -->
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%); border-radius: 12px;">
                <p style="color: #6C757D; text-align: center;">
                    <?php mps_icon('map-pin'); ?>
                    <br>Melbourne Metropolitan Area Map<br>
                    <small>Google Maps integration available</small>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Need Urgent Service?</h2>
            <p>Call us directly for same-day bookings and emergency services.</p>
            <div class="cta-buttons">
                <a href="tel:+61412345678" class="btn btn-white btn-lg">
                    <?php mps_icon('phone'); ?>
                    Call 0412 345 678
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
