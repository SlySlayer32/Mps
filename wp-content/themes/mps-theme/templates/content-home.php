<?php
/**
 * Homepage Content Template
 *
 * @package MPS_Theme
 */

// Get services data
$services = mps_get_services();
?>

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="hero-container container">
        <div class="hero-content">
            <span class="hero-badge">
                <?php mps_icon('star'); ?>
                Melbourne's Trusted Property Care
            </span>
            <h1>Complete Property Care for <span>Melbourne</span> Homes &amp; Businesses</h1>
            <p class="hero-description">From move-out to move-in, we handle every detail so you don't have to. Professional cleaning, gardening, and maintenance services with our 100% satisfaction guarantee.</p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-lg">Get a Quote</a>
                <a href="#services" class="btn btn-outline btn-lg">View Our Services</a>
            </div>
            <div class="hero-features">
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
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-decoration"></div>
            <img src="<?php echo esc_url(MPS_THEME_URI . '/assets/images/hero-cleaning.svg'); ?>" alt="Professional Cleaning Services" width="500" height="500">
        </div>
    </div>
</section>

<!-- Services Grid Section -->
<section class="section services-section" id="services">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>From end-of-lease cleaning to gardening and maintenance, we provide comprehensive property care solutions.</p>
        </div>
        <div class="services-grid">
            <?php foreach ($services as $slug => $service) : ?>
                <article class="service-card">
                    <div class="service-card-icon">
                        <?php mps_icon($service['icon']); ?>
                    </div>
                    <h3><?php echo esc_html($service['title']); ?></h3>
                    <p><?php echo esc_html($service['description']); ?></p>
                    <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline btn-sm">Learn More</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section why-choose-section" id="why-us">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Merlin Property Services</h2>
            <p>We're committed to providing exceptional service with guaranteed results.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <?php mps_icon('home-sparkle'); ?>
                </div>
                <h3>Complete Move-Out Service</h3>
                <p>One team handles everything – cleaning, carpets, windows, gardens, and minor repairs. No need to coordinate multiple contractors.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <?php mps_icon('shield-check'); ?>
                </div>
                <h3>100% Satisfaction Guarantee</h3>
                <p>Our bond-back guarantee means if there's an issue with your inspection, we'll return and fix it at no extra cost.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <?php mps_icon('settings'); ?>
                </div>
                <h3>Flexible Services</h3>
                <p>Choose individual services or package them together. We work around your schedule with same-day availability when you need it.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section how-it-works-section" id="how-it-works">
    <div class="container">
        <div class="section-header">
            <h2>How It Works</h2>
            <p>Getting your property professionally serviced is simple.</p>
        </div>
        <div class="steps-container">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-icon">
                    <?php mps_icon('check'); ?>
                </div>
                <h3>Choose Your Service</h3>
                <p>Select from our range of cleaning, gardening, and maintenance services.</p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-icon">
                    <?php mps_icon('calendar'); ?>
                </div>
                <h3>Get Instant Quote</h3>
                <p>Receive a detailed quote based on your property size and requirements.</p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <div class="step-icon">
                    <?php mps_icon('clock'); ?>
                </div>
                <h3>Book Your Slot</h3>
                <p>Pick a date and time that works best for you. Same-day bookings available.</p>
            </div>
            <div class="step-card">
                <div class="step-number">4</div>
                <div class="step-icon">
                    <?php mps_icon('star'); ?>
                </div>
                <h3>Relax &amp; Enjoy</h3>
                <p>Our professional team handles everything while you focus on what matters.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Book Your Service?</h2>
            <p>Get a free quote today and experience the Merlin Property Services difference. Professional results, guaranteed satisfaction.</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-white btn-lg">Get a Free Quote</a>
                <a href="tel:+61412345678" class="btn btn-outline btn-lg" style="border-color: white; color: white;">Call Us Now</a>
            </div>
        </div>
    </div>
</section>
