<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 *
 * @package MPS_Theme
 */

get_header();
?>

<!-- About Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <span class="hero-badge">
                    <?php mps_icon('users'); ?>
                    About Us
                </span>
                <h1>Melbourne's Complete Property Care Solution</h1>
                <p class="hero-description">Merlin Property Services was founded with a simple mission: to provide Melbourne homes and businesses with reliable, professional property care services they can trust.</p>
                <div class="hero-features">
                    <div class="hero-feature">
                        <?php mps_icon('check'); ?>
                        <span>Local Melbourne Team</span>
                    </div>
                    <div class="hero-feature">
                        <?php mps_icon('check'); ?>
                        <span>10+ Years Experience</span>
                    </div>
                    <div class="hero-feature">
                        <?php mps_icon('check'); ?>
                        <span>5,000+ Happy Customers</span>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="<?php echo esc_url(MPS_THEME_URI . '/assets/images/about-team.svg'); ?>" alt="Merlin Property Services Team" width="500" height="400">
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="section about-story">
    <div class="container">
        <div class="section-header">
            <h2>Our Story</h2>
        </div>
        <div class="story-content">
            <p>Starting as a small end-of-lease cleaning company, we quickly realized that Melbourne tenants and property owners needed more than just cleaning services. They needed a one-stop solution for all their property care needs.</p>
            <p>That's why we expanded our services to include move-in cleaning, commercial cleaning, pre-sale preparation, gardening, carpet cleaning, window cleaning, and minor maintenance. Today, we're proud to offer comprehensive property care that saves our clients time, money, and stress.</p>
            <p>Our team of trained professionals is committed to delivering exceptional results on every job. We treat every property as if it were our own, ensuring attention to detail and quality that our clients have come to expect from us.</p>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section why-choose-section">
    <div class="container">
        <div class="section-header">
            <h2>What Makes Us Different</h2>
            <p>We're not just another cleaning company. Here's what sets us apart.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <?php mps_icon('shield-check'); ?>
                </div>
                <h3>100% Bond Back Guarantee</h3>
                <p>Our bond-back guarantee means if there's an issue with your inspection, we'll return and fix it at no extra charge. Your satisfaction is our priority.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <?php mps_icon('award'); ?>
                </div>
                <h3>Fully Insured & Licensed</h3>
                <p>All our services are fully insured for your peace of mind. Our team members are trained, background-checked, and committed to professionalism.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <?php mps_icon('users'); ?>
                </div>
                <h3>One Team, All Services</h3>
                <p>Why coordinate multiple contractors when one team can handle everything? From cleaning to gardening to repairs, we've got you covered.</p>
            </div>
        </div>
    </div>
</section>

<!-- Service Area Section -->
<section class="section service-area-section" id="service-area">
    <div class="container">
        <div class="section-header">
            <h2>Our Service Area</h2>
            <p>We proudly service the greater Melbourne metropolitan area.</p>
        </div>
        <div class="service-area-map">
            <!-- Map placeholder - Can be replaced with Google Maps integration -->
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%); border-radius: 12px;">
                <p style="color: #6C757D; text-align: center;">
                    <?php mps_icon('map-pin'); ?>
                    <br>Melbourne Metropolitan Area Map
                </p>
            </div>
        </div>
        <div class="areas-list">
            <?php
            $areas = array(
                'Melbourne CBD',
                'South Melbourne',
                'St Kilda',
                'Richmond',
                'Carlton',
                'Brunswick',
                'Fitzroy',
                'Prahran',
                'South Yarra',
                'Box Hill',
                'Hawthorn',
                'Brighton',
            );
            foreach ($areas as $area) :
                ?>
                <div class="area-item">
                    <?php mps_icon('map-pin'); ?>
                    <span><?php echo esc_html($area); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Experience the Difference?</h2>
            <p>Contact us today for a free, no-obligation quote. We're here to help with all your property care needs.</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-white btn-lg">Get a Free Quote</a>
                <a href="tel:+61412345678" class="btn btn-outline btn-lg" style="border-color: white; color: white;">Call Us: 0412 345 678</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
