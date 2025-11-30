<?php
/**
 * Template Part: Gallery Section
 *
 * This template displays the portfolio gallery using NextGEN Gallery plugin
 * or falls back to placeholder content if the plugin is not active.
 *
 * @package MPS_Theme
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get the gallery ID from customizer or use default
$gallery_id = get_theme_mod('mps_main_gallery_id', 1);
$display_type = isset($args['display']) ? sanitize_text_field($args['display']) : 'basic_thumbnail';
?>

<section class="gallery-section section" id="gallery">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Our Work', 'mps-theme'); ?></h2>
            <p><?php esc_html_e('See the difference professional cleaning makes. Browse our before and after gallery.', 'mps-theme'); ?></p>
        </div>

        <?php if (shortcode_exists('ngg')) : ?>
            <!-- Gallery categories/tabs -->
            <div class="gallery-filter">
                <button class="gallery-filter-btn active" data-filter="all">
                    <?php esc_html_e('All', 'mps-theme'); ?>
                </button>
                <button class="gallery-filter-btn" data-filter="end-of-lease">
                    <?php esc_html_e('End of Lease', 'mps-theme'); ?>
                </button>
                <button class="gallery-filter-btn" data-filter="commercial">
                    <?php esc_html_e('Commercial', 'mps-theme'); ?>
                </button>
                <button class="gallery-filter-btn" data-filter="carpet">
                    <?php esc_html_e('Carpet Cleaning', 'mps-theme'); ?>
                </button>
                <button class="gallery-filter-btn" data-filter="garden">
                    <?php esc_html_e('Gardening', 'mps-theme'); ?>
                </button>
            </div>

            <!-- NextGEN Gallery output -->
            <div class="gallery-content">
                <?php
                echo wp_kses_post(do_shortcode('[ngg src="galleries" ids="' . intval($gallery_id) . '" display="' . esc_attr($display_type) . '"]'));
                ?>
            </div>

        <?php else : ?>
            <!-- Placeholder gallery when NextGEN is not installed -->
            <div class="gallery-placeholder">
                <div class="gallery-placeholder-grid">
                    <?php
                    // Placeholder gallery items
                    $placeholder_items = array(
                        array(
                            'title' => __('Kitchen Before & After', 'mps-theme'),
                            'category' => 'end-of-lease',
                        ),
                        array(
                            'title' => __('Bathroom Deep Clean', 'mps-theme'),
                            'category' => 'end-of-lease',
                        ),
                        array(
                            'title' => __('Office Space Cleaning', 'mps-theme'),
                            'category' => 'commercial',
                        ),
                        array(
                            'title' => __('Carpet Steam Clean', 'mps-theme'),
                            'category' => 'carpet',
                        ),
                        array(
                            'title' => __('Garden Transformation', 'mps-theme'),
                            'category' => 'garden',
                        ),
                        array(
                            'title' => __('Oven Detailing', 'mps-theme'),
                            'category' => 'end-of-lease',
                        ),
                    );

                    foreach ($placeholder_items as $item) :
                        ?>
                        <div class="gallery-placeholder-item" data-category="<?php echo esc_attr($item['category']); ?>">
                            <div class="placeholder-image">
                                <?php mps_icon('home-sparkle', 'placeholder-icon'); ?>
                            </div>
                            <div class="placeholder-overlay">
                                <span class="placeholder-title"><?php echo esc_html($item['title']); ?></span>
                                <span class="placeholder-badge"><?php esc_html_e('Before & After', 'mps-theme'); ?></span>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>

                <div class="gallery-placeholder-cta">
                    <p><?php esc_html_e('Want to see more of our work? Contact us for a full portfolio or references.', 'mps-theme'); ?></p>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline">
                        <?php esc_html_e('Request Full Portfolio', 'mps-theme'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <div class="gallery-cta">
            <p><?php esc_html_e('Ready to transform your space?', 'mps-theme'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Get Your Free Quote', 'mps-theme'); ?>
            </a>
        </div>
    </div>
</section>

<style>
/* Gallery Section Styles */
.gallery-section {
    background-color: var(--white);
}

/* Gallery filter buttons */
.gallery-filter {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-xl);
}

.gallery-filter-btn {
    padding: 0.5rem 1.25rem;
    font-family: var(--font-primary);
    font-size: 0.9375rem;
    font-weight: 500;
    color: var(--neutral-color);
    background-color: transparent;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-xl);
    cursor: pointer;
    transition: all var(--transition-normal);
    min-height: 44px;
}

.gallery-filter-btn:hover,
.gallery-filter-btn.active {
    color: var(--white);
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

/* Gallery content */
.gallery-content {
    margin-bottom: var(--spacing-xl);
}

/* Placeholder gallery */
.gallery-placeholder-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-xl);
}

.gallery-placeholder-item {
    position: relative;
    aspect-ratio: 4/3;
    border-radius: var(--radius-lg);
    overflow: hidden;
    cursor: pointer;
    transition: all var(--transition-normal);
}

.gallery-placeholder-item:hover {
    transform: scale(1.02);
    box-shadow: var(--shadow-hover);
}

.placeholder-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--light-gray) 0%, var(--off-white) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.placeholder-icon {
    width: 60px;
    height: 60px;
    color: var(--neutral-color);
    opacity: 0.5;
}

.placeholder-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: var(--spacing-md);
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
    color: var(--white);
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
}

.placeholder-title {
    font-family: var(--font-primary);
    font-weight: 600;
    font-size: 1rem;
}

.placeholder-badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    background-color: var(--primary-color);
    border-radius: var(--radius-sm);
    font-size: 0.75rem;
    font-weight: 600;
    width: fit-content;
}

.gallery-placeholder-cta {
    text-align: center;
    padding: var(--spacing-lg);
    background-color: var(--off-white);
    border-radius: var(--radius-md);
}

.gallery-placeholder-cta p {
    margin-bottom: var(--spacing-md);
}

/* Gallery CTA */
.gallery-cta {
    text-align: center;
    padding-top: var(--spacing-lg);
}

.gallery-cta p {
    font-size: 1.125rem;
    margin-bottom: var(--spacing-md);
}

/* Responsive */
@media (max-width: 991px) {
    .gallery-placeholder-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .gallery-filter {
        overflow-x: auto;
        justify-content: flex-start;
        padding-bottom: var(--spacing-sm);
    }

    .gallery-filter-btn {
        white-space: nowrap;
    }

    .gallery-placeholder-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Simple gallery filter functionality (for placeholder)
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-placeholder-item');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active state
            filterBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            this.classList.add('active');

            // Filter items
            galleryItems.forEach(function(item) {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
