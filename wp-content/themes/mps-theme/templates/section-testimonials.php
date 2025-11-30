<?php
/**
 * Template Part: Testimonials Section
 *
 * This template displays customer testimonials using the Stars Testimonials plugin
 * or falls back to static testimonials if the plugin is not active.
 *
 * @package MPS_Theme
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="testimonials-section section" id="testimonials">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('What Our Customers Say', 'mps-theme'); ?></h2>
            <p><?php esc_html_e("Don't just take our word for it - hear from our satisfied customers across Canberra and Queanbeyan.", 'mps-theme'); ?></p>
        </div>

        <div class="testimonials-content">
            <?php
            /**
             * Display testimonials
             * 
             * Uses Stars Testimonials plugin if available,
             * otherwise displays static testimonials
             */
            if (function_exists('mps_show_testimonials')) {
                mps_show_testimonials(6);
            } else {
                // Inline fallback if function doesn't exist
                ?>
                <div class="mps-testimonials-grid">
                    <div class="mps-testimonial-card">
                        <div class="mps-testimonial-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <p class="mps-testimonial-content">"Merlin Property Services did an amazing job with our end of lease clean. We got our full bond back with no issues. Highly recommend!"</p>
                        <div class="mps-testimonial-author">
                            <strong>Sarah M.</strong>
                            <span>Belconnen, ACT</span>
                        </div>
                    </div>

                    <div class="mps-testimonial-card">
                        <div class="mps-testimonial-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <p class="mps-testimonial-content">"Professional, thorough, and on time. Our office has never looked better. We've signed up for weekly cleaning."</p>
                        <div class="mps-testimonial-author">
                            <strong>James W.</strong>
                            <span>Queanbeyan, NSW</span>
                        </div>
                    </div>

                    <div class="mps-testimonial-card">
                        <div class="mps-testimonial-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <p class="mps-testimonial-content">"The carpet cleaning service transformed our carpets. They look brand new! Great value for money."</p>
                        <div class="mps-testimonial-author">
                            <strong>Michelle T.</strong>
                            <span>Gungahlin, ACT</span>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="testimonials-cta">
            <p><?php esc_html_e('Ready to experience the difference?', 'mps-theme'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Get Your Free Quote', 'mps-theme'); ?>
            </a>
        </div>
    </div>
</section>

<style>
/* Testimonials Section Styles */
.testimonials-section {
    background-color: var(--off-white);
}

.testimonials-content {
    margin-bottom: var(--spacing-xl);
}

.mps-testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--spacing-lg);
}

.mps-testimonial-card {
    background-color: var(--white);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
}

.mps-testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.mps-testimonial-rating {
    margin-bottom: var(--spacing-md);
}

.mps-testimonial-rating .star,
.mps-testimonial-rating .star-icon {
    color: var(--primary-color);
    font-size: 1.25rem;
}

.mps-testimonial-content {
    font-size: 1rem;
    line-height: 1.7;
    color: var(--neutral-color);
    font-style: italic;
    margin-bottom: var(--spacing-md);
}

.mps-testimonial-author {
    display: flex;
    flex-direction: column;
}

.mps-testimonial-author strong {
    font-family: var(--font-primary);
    color: var(--dark-gray);
}

.mps-testimonial-author span {
    font-size: 0.875rem;
    color: var(--neutral-color);
}

.testimonials-cta {
    text-align: center;
    padding-top: var(--spacing-lg);
}

.testimonials-cta p {
    font-size: 1.125rem;
    margin-bottom: var(--spacing-md);
}

/* Responsive */
@media (max-width: 991px) {
    .mps-testimonials-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .mps-testimonials-grid {
        grid-template-columns: 1fr;
    }
}
</style>
