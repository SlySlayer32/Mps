<?php
/**
 * Template Name: Service Page
 * Template Post Type: page
 *
 * @package MPS_Theme
 */

get_header();

// Get current page slug
$current_slug = get_post_field('post_name', get_post());

// Get all services data
$services = mps_get_services();

// Get current service data
$service_data = isset($services[$current_slug]) ? $services[$current_slug] : null;

// Get pricing data
$pricing = mps_get_service_pricing($current_slug);

// Service specific content
$service_content = mps_get_service_content($current_slug);

if (!$service_data) {
    // Fallback for pages that don't match service slugs
    $service_data = array(
        'title'       => get_the_title(),
        'description' => '',
        'icon'        => 'home-sparkle',
        'badge'       => 'Professional Service',
        'slug'        => $current_slug,
    );
}
?>

<!-- Service Hero Section -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <div class="service-hero-text">
                <?php if (!empty($service_data['badge'])) : ?>
                    <span class="service-badge guarantee-badge">
                        <?php mps_icon('shield-check'); ?>
                        <?php echo esc_html($service_data['badge']); ?>
                    </span>
                <?php endif; ?>
                
                <h1><?php echo esc_html($service_data['title']); ?></h1>
                
                <?php if (!empty($service_content['hero_description'])) : ?>
                    <p class="hero-description"><?php echo esc_html($service_content['hero_description']); ?></p>
                <?php else : ?>
                    <p class="hero-description"><?php echo esc_html($service_data['description']); ?></p>
                <?php endif; ?>
                
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-lg">Get a Quote</a>
                    <a href="tel:+61412345678" class="btn btn-outline btn-lg">Call Us Now</a>
                </div>
                
                <div class="hero-features">
                    <div class="hero-feature">
                        <?php mps_icon('check'); ?>
                        <span>Professional Team</span>
                    </div>
                    <div class="hero-feature">
                        <?php mps_icon('check'); ?>
                        <span>Fully Insured</span>
                    </div>
                    <div class="hero-feature">
                        <?php mps_icon('check'); ?>
                        <span>Satisfaction Guaranteed</span>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?php echo esc_url(MPS_THEME_URI . '/assets/images/services/' . $current_slug . '.svg'); ?>" alt="<?php echo esc_attr($service_data['title']); ?>" width="500" height="400" onerror="this.src='<?php echo esc_url(MPS_THEME_URI . '/assets/images/hero-cleaning.svg'); ?>'">
            </div>
        </div>
    </div>
</section>

<!-- What's Included Section -->
<?php if (!empty($service_content['included'])) : ?>
<section class="section whats-included">
    <div class="container">
        <div class="section-header">
            <h2>What's Included</h2>
            <p>Our comprehensive <?php echo esc_html(strtolower($service_data['title'])); ?> service includes:</p>
        </div>
        <div class="included-grid">
            <?php foreach ($service_content['included'] as $item) : ?>
                <div class="included-item">
                    <?php mps_icon('check'); ?>
                    <span><?php echo esc_html($item); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Pricing Section -->
<?php if (!empty($pricing)) : ?>
<section class="section pricing-section" id="pricing">
    <div class="container">
        <div class="section-header">
            <h2>Pricing</h2>
            <p>Transparent pricing with no hidden fees. Get a detailed quote for your specific needs.</p>
        </div>
        
        <?php if (!empty($pricing['tiers'])) : ?>
            <table class="pricing-table">
                <thead>
                    <tr>
                        <?php 
                        // Determine table headers based on pricing structure
                        $first_tier = $pricing['tiers'][0];
                        if (isset($first_tier['interior'])) : 
                        ?>
                            <th>Property Size</th>
                            <th>Interior Only</th>
                            <th>Interior + Exterior</th>
                            <th>Complete Package</th>
                        <?php elseif (isset($first_tier['service'])) : ?>
                            <th>Service</th>
                            <th>Price</th>
                        <?php elseif (isset($first_tier['size'])) : ?>
                            <th>Size/Type</th>
                            <th>Price</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pricing['tiers'] as $index => $tier) : ?>
                        <tr <?php echo $index === 2 ? 'class="price-highlight"' : ''; ?>>
                            <?php if (isset($tier['interior'])) : ?>
                                <td><strong><?php echo esc_html($tier['size']); ?></strong></td>
                                <td><?php echo esc_html($tier['interior']); ?></td>
                                <td><?php echo esc_html($tier['interior_exterior']); ?></td>
                                <td><strong><?php echo esc_html($tier['complete']); ?></strong></td>
                            <?php elseif (isset($tier['service'])) : ?>
                                <td><strong><?php echo esc_html($tier['service']); ?></strong></td>
                                <td><?php echo esc_html($tier['price']); ?></td>
                            <?php elseif (isset($tier['size'])) : ?>
                                <td><strong><?php echo esc_html($tier['size']); ?></strong></td>
                                <td><?php echo esc_html($tier['price']); ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <?php if (!empty($pricing['addons'])) : ?>
            <h3 style="margin-top: var(--spacing-xl); text-align: center;">Add-On Services</h3>
            <div class="addons-grid">
                <?php foreach ($pricing['addons'] as $addon) : ?>
                    <div class="addon-card">
                        <h4><?php echo esc_html($addon['name']); ?></h4>
                        <span class="price"><?php echo esc_html($addon['price']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div style="text-align: center; margin-top: var(--spacing-xl);">
            <p style="color: var(--neutral-color); margin-bottom: var(--spacing-md);">* Prices may vary based on property condition and specific requirements.</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-lg">Get Your Custom Quote</a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Guarantee Section -->
<section class="section guarantee-section">
    <div class="container">
        <div class="guarantee-content">
            <div class="guarantee-icon">
                <?php mps_icon('shield-check'); ?>
            </div>
            <div class="guarantee-text">
                <h2>Our Guarantee</h2>
                <?php if ($current_slug === 'end-of-lease-cleaning') : ?>
                    <p>We offer a <strong>100% Bond Back Guarantee</strong> on all end of lease cleaning services. If there are any issues with your final inspection, simply contact us within 72 hours and we'll return to rectify any problems at no additional cost.</p>
                <?php else : ?>
                    <p>We stand behind the quality of our work with a <strong>100% Satisfaction Guarantee</strong>. If you're not completely happy with our service, we'll make it right – that's our promise to you.</p>
                <?php endif; ?>
                <p>Our team is fully insured and trained to deliver professional results every time.</p>
            </div>
        </div>
    </div>
</section>

<!-- Booking Section -->
<section class="section booking-section" id="book">
    <div class="container">
        <div class="section-header">
            <h2>Book Your Service</h2>
            <p>Ready to book? Get in touch with us to schedule your <?php echo esc_html(strtolower($service_data['title'])); ?> service.</p>
        </div>
        <div class="booking-widget">
            <!-- Amelia Booking Widget Integration Point -->
            <p style="color: var(--neutral-color); margin-bottom: var(--spacing-md);">Use our online booking system or contact us directly.</p>
            <div style="display: flex; gap: var(--spacing-md); justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-lg">Request a Quote</a>
                <a href="tel:+61412345678" class="btn btn-outline btn-lg">Call 0412 345 678</a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<?php if (!empty($service_content['faqs'])) : ?>
<section class="section faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="faq-list">
            <?php foreach ($service_content['faqs'] as $index => $faq) : ?>
                <div class="faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <button class="faq-question" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                        <?php echo esc_html($faq['question']); ?>
                        <?php mps_icon('chevron-down'); ?>
                    </button>
                    <div class="faq-answer">
                        <p><?php echo esc_html($faq['answer']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Contact us today for a free quote on our <?php echo esc_html(strtolower($service_data['title'])); ?> service.</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-white btn-lg">Get a Free Quote</a>
                <a href="tel:+61412345678" class="btn btn-outline btn-lg" style="border-color: white; color: white;">Call 0412 345 678</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
