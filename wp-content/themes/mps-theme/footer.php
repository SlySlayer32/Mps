</main><!-- #main-content -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-main">
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                    <span class="footer-logo-text">Merlin<span>PS</span></span>
                </a>
                <p>Complete property care for Melbourne homes and businesses. From move-out to move-in, we handle every detail so you don't have to.</p>
                <div class="footer-social">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <?php mps_icon('facebook'); ?>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <?php mps_icon('instagram'); ?>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <?php mps_icon('linkedin'); ?>
                    </a>
                </div>
            </div>

            <div class="footer-column">
                <h4>Our Services</h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/services/end-of-lease-cleaning/')); ?>">End of Lease Cleaning</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/move-in-cleaning/')); ?>">Move In Cleaning</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/commercial-cleaning/')); ?>">Commercial Cleaning</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/pre-sale-cleaning/')); ?>">Pre-sale Cleaning</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>More Services</h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/services/gardening-services/')); ?>">Gardening Services</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/carpet-cleaning/')); ?>">Carpet Cleaning</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/window-cleaning/')); ?>">Window Cleaning</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/minor-maintenance/')); ?>">Minor Maintenance</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Contact Us</h4>
                <ul class="footer-contact">
                    <li>
                        <?php mps_icon('phone'); ?>
                        <span><a href="tel:+61412345678">0412 345 678</a></span>
                    </li>
                    <li>
                        <?php mps_icon('mail'); ?>
                        <span><a href="mailto:info@merlinps.com.au">info@merlinps.com.au</a></span>
                    </li>
                    <li>
                        <?php mps_icon('map-pin'); ?>
                        <span>Melbourne, Victoria<br>Australia</span>
                    </li>
                    <li>
                        <?php mps_icon('clock'); ?>
                        <span>Mon - Sat: 7am - 7pm<br>Sun: 8am - 5pm</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(date('Y')); ?> Merlin Property Services. All rights reserved.</p>
            <div class="footer-bottom-links">
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a>
                <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
