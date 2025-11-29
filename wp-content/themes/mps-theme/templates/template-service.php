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

/**
 * Get service-specific content
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
