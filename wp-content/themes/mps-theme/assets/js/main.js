/**
 * Merlin Property Services - Main JavaScript
 * 
 * @package MPS_Theme
 * @version 1.0.0
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initNavigation();
        initHeaderScroll();
        initFAQAccordion();
        initSmoothScroll();
        initContactForm();
        initServiceCardHover();
    });

    /**
     * Mobile Navigation Toggle
     */
    function initNavigation() {
        var navToggle = document.getElementById('nav-toggle');
        var navMenu = document.getElementById('primary-menu');
        
        if (!navToggle || !navMenu) return;

        navToggle.addEventListener('click', function() {
            var expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navToggle.classList.remove('active');
                navToggle.setAttribute('aria-expanded', 'false');
                navMenu.classList.remove('active');
            }
        });

        // Handle dropdown menus on mobile
        var dropdowns = navMenu.querySelectorAll('.has-dropdown');
        dropdowns.forEach(function(dropdown) {
            var link = dropdown.querySelector('a');
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    dropdown.classList.toggle('open');
                }
            });
        });

        // Close menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) {
                navToggle.classList.remove('active');
                navToggle.setAttribute('aria-expanded', 'false');
                navMenu.classList.remove('active');
            }
        });
    }

    /**
     * Header Scroll Effect
     */
    function initHeaderScroll() {
        var header = document.getElementById('site-header');
        if (!header) return;

        var scrollThreshold = 50;
        var lastScroll = 0;

        function updateHeader() {
            var currentScroll = window.pageYOffset;
            
            if (currentScroll > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        }

        window.addEventListener('scroll', updateHeader, { passive: true });
        updateHeader();
    }

    /**
     * FAQ Accordion
     */
    function initFAQAccordion() {
        var faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(function(item) {
            var question = item.querySelector('.faq-question');
            
            if (question) {
                question.addEventListener('click', function() {
                    var isActive = item.classList.contains('active');
                    
                    // Close all other items
                    faqItems.forEach(function(otherItem) {
                        otherItem.classList.remove('active');
                        var otherQuestion = otherItem.querySelector('.faq-question');
                        if (otherQuestion) {
                            otherQuestion.setAttribute('aria-expanded', 'false');
                        }
                    });
                    
                    // Toggle current item
                    if (!isActive) {
                        item.classList.add('active');
                        question.setAttribute('aria-expanded', 'true');
                    }
                });
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                
                if (targetId === '#') return;
                
                var target = document.querySelector(targetId);
                
                if (target) {
                    e.preventDefault();
                    
                    var headerHeight = document.getElementById('site-header').offsetHeight || 80;
                    var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    var navToggle = document.getElementById('nav-toggle');
                    var navMenu = document.getElementById('primary-menu');
                    if (navToggle && navMenu) {
                        navToggle.classList.remove('active');
                        navToggle.setAttribute('aria-expanded', 'false');
                        navMenu.classList.remove('active');
                    }
                }
            });
        });
    }

    /**
     * Contact Form Handler
     */
    function initContactForm() {
        var form = document.getElementById('contact-form');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            var submitBtn = form.querySelector('button[type="submit"]');
            var messageDiv = document.getElementById('form-message');
            var originalText = submitBtn.textContent;
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            
            // Get form data
            var formData = new FormData(form);
            
            // Send AJAX request
            fetch(mpsData.ajaxUrl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                messageDiv.style.display = 'block';
                
                if (data.success) {
                    messageDiv.className = 'form-message success';
                    messageDiv.innerHTML = '<p style="color: #28a745;">' + data.data.message + '</p>';
                    form.reset();
                } else {
                    messageDiv.className = 'form-message error';
                    messageDiv.innerHTML = '<p style="color: #dc3545;">' + (data.data.message || 'An error occurred. Please try again.') + '</p>';
                }
            })
            .catch(function() {
                messageDiv.style.display = 'block';
                messageDiv.className = 'form-message error';
                messageDiv.innerHTML = '<p style="color: #dc3545;">An error occurred. Please try again or contact us directly.</p>';
            })
            .finally(function() {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            });
        });
    }

    /**
     * Service Card Hover Effects
     */
    function initServiceCardHover() {
        var cards = document.querySelectorAll('.service-card');
        
        cards.forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    }

    /**
     * Utility: Debounce Function
     */
    function debounce(func, wait) {
        var timeout;
        return function() {
            var context = this;
            var args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                func.apply(context, args);
            }, wait);
        };
    }

    /**
     * Utility: Throttle Function
     */
    function throttle(func, limit) {
        var inThrottle;
        return function() {
            var context = this;
            var args = arguments;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(function() {
                    inThrottle = false;
                }, limit);
            }
        };
    }

})();
