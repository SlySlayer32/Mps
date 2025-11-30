# WordPress Plugin Implementation Guide for Merlin Property Services

This document provides comprehensive instructions for implementing all recommended WordPress plugins for the Merlin Property Services website. Follow these steps in order for a complete setup.

## Table of Contents
1. [Prerequisites](#prerequisites)
2. [High Priority Plugins](#high-priority-plugins)
3. [Medium Priority Plugins](#medium-priority-plugins)
4. [Plugin Configuration Details](#plugin-configuration-details)
5. [Theme Integration](#theme-integration)
6. [Testing Checklist](#testing-checklist)

---

## Prerequisites

Before installing plugins, ensure:

- [ ] WordPress 6.0 or higher is installed
- [ ] PHP 8.0 or higher is running
- [ ] MySQL 5.7+ or MariaDB 10.3+ is configured
- [ ] MPS Theme is activated
- [ ] Admin access to WordPress dashboard
- [ ] SSL certificate is installed (HTTPS)
- [ ] Backup of the current site is created

### Server Requirements
- Memory Limit: Minimum 256MB (512MB recommended)
- Max Execution Time: 300 seconds
- Upload Max Filesize: 64MB

---

## High Priority Plugins

### 1. Amelia Lite - Booking & Appointments

**Plugin Slug:** `ameliabooking`
**WordPress.org URL:** https://wordpress.org/plugins/ameliabooking/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "Amelia"
3. Click **Install Now** and then **Activate**

#### Configuration:
1. Navigate to **Amelia → Settings**
2. Configure the following:

**General Settings:**
- Company Name: `Merlin Property Services`
- Company Website: `https://merlinpropertyservices.com.au`
- Company Email: `info@merlinpropertyservices.com.au`
- Company Phone: `02 6100 0000`
- Time Zone: `Australia/Sydney`
- Date Format: `d/m/Y`
- Time Format: `g:i A`

**Appointments Settings:**
- Default Time Slot Step: `30 minutes`
- Minimum Time Required Before Booking: `24 hours`
- Period Available For Booking: `90 days`

**Services to Create:**
| Service Name | Duration | Price | Description |
|-------------|----------|-------|-------------|
| End of Lease Cleaning | 4-8 hours | From $450 | Full bond-back cleaning |
| Move In Cleaning | 3-5 hours | From $350 | Pre-move clean |
| Commercial Cleaning | 2-4 hours | From $80 | Office/retail cleaning |
| Pre-sale Cleaning | 4-6 hours | From $400 | Property presentation |
| Gardening Services | 2-4 hours | From $60/hr | Garden maintenance |
| Carpet Cleaning | 1-3 hours | From $130 | Steam cleaning |
| Window Cleaning | 1-2 hours | From $70 | Interior/exterior |
| Minor Maintenance | 1-2 hours | $55/hr | Handyman services |

**Email Templates:**
Configure these notification templates:
- Appointment Approved
- Appointment Pending
- Appointment Rejected
- Appointment Canceled
- Appointment Rescheduled

**Shortcode Usage:**
```
[ameliabooking]
```

---

### 2. WPForms Lite - Contact Forms

**Plugin Slug:** `wpforms-lite`
**WordPress.org URL:** https://wordpress.org/plugins/wpforms-lite/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "WPForms Lite"
3. Click **Install Now** and then **Activate**

#### Configuration:
1. Navigate to **WPForms → Add New**
2. Create the following forms:

**Form 1: Quote Request Form**
Fields:
- Name (First, Last) - Required
- Email - Required
- Phone Number - Required
- Service Type (Dropdown) - Required
  - End of Lease Cleaning
  - Move In Cleaning
  - Commercial Cleaning
  - Pre-sale Cleaning
  - Gardening Services
  - Carpet Cleaning
  - Window Cleaning
  - Minor Maintenance
- Property Size (Dropdown)
  - 1 Bedroom
  - 2 Bedroom
  - 3 Bedroom
  - 4+ Bedroom
  - Commercial
- Preferred Date (Date Picker)
- Additional Notes (Paragraph)

**Form 2: General Contact Form**
Fields:
- Name - Required
- Email - Required
- Phone Number
- Subject - Required
- Message (Paragraph) - Required

**Notification Settings:**
- Send To: `info@merlinpropertyservices.com.au`
- Email Subject: `New {form_name} Submission`
- From Name: `{field_id="1"}`
- Reply-To: `{field_id="2"}`

**Confirmation Settings:**
- Type: Message
- Message: "Thank you for your inquiry! We'll get back to you within 24 hours."

**Shortcode Usage:**
```
[wpforms id="FORM_ID"]
```

---

### 3. Yoast SEO - Search Engine Optimization

**Plugin Slug:** `wordpress-seo`
**WordPress.org URL:** https://wordpress.org/plugins/wordpress-seo/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "Yoast SEO"
3. Click **Install Now** and then **Activate**
4. Complete the Setup Wizard

#### Configuration:

**General Settings:**
1. Complete the First-Time Configuration wizard
2. Site Type: `Local Business`
3. Organization Name: `Merlin Property Services`
4. Logo: Upload company logo
5. Social Profiles: Add Facebook, Instagram URLs

**Search Appearance Settings:**
- Title Separator: `|`
- Homepage Title: `Merlin Property Services | Professional Cleaning & Property Care in Canberra`
- Homepage Meta Description: `Professional end of lease cleaning, commercial cleaning, gardening, and property maintenance services in Canberra and Queanbeyan. 100% bond back guarantee.`

**Local SEO Configuration:**
- Business Type: `Local Business > Home And Construction Business > House Keeping Service`
- Business Name: `Merlin Property Services`
- Address: [Add business address]
- Phone: `02 6100 0000`
- Opening Hours: Monday-Friday 7:00 AM - 6:00 PM, Saturday 8:00 AM - 4:00 PM

**Focus Keywords by Page:**
| Page | Primary Keyword | Secondary Keywords |
|------|----------------|-------------------|
| Home | end of lease cleaning canberra | bond cleaning, vacate cleaning |
| End of Lease | bond back cleaning canberra | end of tenancy cleaning |
| Commercial | commercial cleaning canberra | office cleaning queanbeyan |
| Carpet | carpet steam cleaning canberra | professional carpet cleaners |
| Window | window cleaning services canberra | glass cleaning |
| Gardening | gardening services canberra | lawn mowing queanbeyan |

---

### 4. Stars Testimonials - Reviews & Social Proof

**Plugin Slug:** `stars-testimonials-with-slider-and-masonry-grid`
**WordPress.org URL:** https://wordpress.org/plugins/stars-testimonials-with-slider-and-masonry-grid/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "Stars Testimonials"
3. Click **Install Now** and then **Activate**

#### Configuration:
1. Navigate to **Starter Starter → Starter Templates**
2. Choose a display template

**Sample Testimonials to Add:**

**Testimonial 1:**
- Name: Sarah M.
- Location: Belconnen, ACT
- Rating: 5 stars
- Content: "Merlin Property Services did an amazing job with our end of lease clean. We got our full bond back with no issues. Highly recommend!"
- Service: End of Lease Cleaning

**Testimonial 2:**
- Name: James W.
- Location: Queanbeyan, NSW
- Rating: 5 stars
- Content: "Professional, thorough, and on time. Our office has never looked better. We've signed up for weekly cleaning."
- Service: Commercial Cleaning

**Testimonial 3:**
- Name: Michelle T.
- Location: Gungahlin, ACT
- Rating: 5 stars
- Content: "The carpet cleaning service transformed our carpets. They look brand new! Great value for money."
- Service: Carpet Cleaning

**Display Settings:**
- Layout: Slider with 3 items visible
- Show Rating: Yes
- Show Photo: Yes
- Show Date: Yes
- Autoplay: Yes (5 seconds)

**Shortcode Usage:**
```
[starter_starter_star type="slider" count="6"]
```

---

## Medium Priority Plugins

### 5. NextGEN Gallery - Photo Gallery

**Plugin Slug:** `nextgen-gallery`
**WordPress.org URL:** https://wordpress.org/plugins/nextgen-gallery/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "NextGEN Gallery"
3. Click **Install Now** and then **Activate**

#### Configuration:
1. Navigate to **Gallery → Add Gallery / Images**
2. Create these galleries:

**Gallery Structure:**
```
/galleries/
├── before-after/
│   ├── kitchen-cleaning/
│   ├── bathroom-cleaning/
│   ├── carpet-cleaning/
│   └── garden-makeover/
├── team/
│   └── team-photos/
├── work-samples/
│   ├── end-of-lease/
│   ├── commercial/
│   └── pre-sale/
└── equipment/
    └── professional-equipment/
```

**Image Optimization Settings:**
- Thumbnail Size: 240x240
- Image Quality: 85%
- Enable Lazy Loading: Yes

**Lightbox Settings:**
- Effect: Fancybox
- Show Caption: Yes
- Show Title: Yes

**Shortcode Usage:**
```
[ngg src="galleries" ids="1" display="basic_thumbnail"]
```

---

### 6. Tawk.to Live Chat

**Plugin Slug:** `tawkto-live-chat`
**WordPress.org URL:** https://wordpress.org/plugins/tawkto-live-chat/

#### Installation Steps:
1. Create an account at https://www.tawk.to/
2. Go to **Plugins → Add New**
3. Search for "Tawk.to Live Chat"
4. Click **Install Now** and then **Activate**
5. Connect your Tawk.to account

#### Configuration:
1. Log into Tawk.to Dashboard
2. Configure widget appearance:

**Widget Settings:**
- Widget Color: `#FF9500` (Brand Orange)
- Header Background: `#0066CC` (Brand Blue)
- Widget Position: Bottom Right
- Welcome Message: "Hi! 👋 Need help with cleaning or property services? We're here to help!"

**Pre-Chat Form Fields:**
- Name (Required)
- Email (Required)
- Phone Number
- Service Interest (Dropdown)

**Business Hours:**
- Monday-Friday: 7:00 AM - 6:00 PM
- Saturday: 8:00 AM - 4:00 PM
- Sunday: Closed

**Offline Message:**
"Thanks for reaching out! We're currently offline but will respond within 24 hours. For urgent inquiries, please call 02 6100 0000."

**Triggers to Configure:**
1. Page Visit Trigger (after 30 seconds)
2. Scroll Trigger (50% page scroll)
3. Exit Intent Trigger

---

### 7. WP Google Maps

**Plugin Slug:** `wp-google-maps`
**WordPress.org URL:** https://wordpress.org/plugins/wp-google-maps/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "WP Go Maps" (formerly WP Google Maps)
3. Click **Install Now** and then **Activate**
4. Enter Google Maps API key

#### Getting Google Maps API Key:
1. Go to Google Cloud Console
2. Create a new project
3. Enable Maps JavaScript API
4. Create API credentials
5. Restrict key to your domain

#### Configuration:
1. Navigate to **Maps → Settings**
2. Enter API key

**Map Settings:**
- Map Type: Roadmap
- Height: 400px
- Width: 100%
- Zoom Level: 10
- Center: Canberra, ACT, Australia

**Service Area Markers:**
| Location | Coordinates | Description |
|----------|-------------|-------------|
| Canberra CBD | -35.2809, 149.1300 | Main service area |
| Belconnen | -35.2378, 149.0658 | Service area |
| Gungahlin | -35.1847, 149.1329 | Service area |
| Tuggeranong | -35.4244, 149.0880 | Service area |
| Woden | -35.3455, 149.0870 | Service area |
| Queanbeyan | -35.3546, 149.2324 | Service area |

**Service Area Polygon:**
Create a polygon covering the service area including all of Canberra and Queanbeyan regions.

**Shortcode Usage:**
```
[wpgmza id="1"]
```

---

### 8. Wordfence Security

**Plugin Slug:** `wordfence`
**WordPress.org URL:** https://wordpress.org/plugins/wordfence/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "Wordfence Security"
3. Click **Install Now** and then **Activate**
4. Complete the initial setup

#### Configuration:
1. Navigate to **Wordfence → All Options**

**Firewall Settings:**
- Enable Rate Limiting: Yes
- Immediately block fake Google crawlers: Yes
- Block IPs that send POST requests with blank User-Agent: Yes
- Rate Limit: 240 requests per minute

**Scan Settings:**
- Enable automatic scanning: Yes
- Schedule: Daily at 3:00 AM
- Scan Themes: Yes
- Scan Plugins: Yes
- Check for core file changes: Yes

**Login Security:**
- Enable brute force protection: Yes
- Lock out after: 5 login failures
- Lock out duration: 4 hours
- Enforce strong passwords: Yes

**Two-Factor Authentication:**
- Enable for Administrators: Recommended
- Method: TOTP (Google Authenticator)

**Email Alerts:**
- Email to: `admin@merlinpropertyservices.com.au`
- Alert on critical problems: Yes
- Alert on warnings: Yes
- Alert on logins: Admin only

---

### 9. LiteSpeed Cache (Performance)

**Plugin Slug:** `litespeed-cache`
**WordPress.org URL:** https://wordpress.org/plugins/litespeed-cache/

#### Installation Steps:
1. Go to **Plugins → Add New**
2. Search for "LiteSpeed Cache"
3. Click **Install Now** and then **Activate**

#### Configuration:
1. Navigate to **LiteSpeed Cache → General**

**Cache Settings:**
- Enable Cache: Yes
- Cache Logged-in Users: No
- Cache Commenters: No
- Cache Mobile: Yes

**TTL (Time To Live):**
- Default Public Cache: 604800 (1 week)
- Default Private Cache: 1800 (30 minutes)
- Default Front Page: 604800

**Optimization Settings:**
- CSS Minify: Yes
- CSS Combine: Yes (with caution)
- JS Minify: Yes
- JS Combine: Yes (with caution)
- HTML Minify: Yes

**Image Optimization:**
- Auto Lazy Load Images: Yes
- Responsive Placeholder: Yes
- WebP Replacement: Yes

**CDN Settings:**
- If using a CDN, configure URL accordingly

**Browser Cache:**
- Enable: Yes
- Cache TTL: 31536000 (1 year for static assets)

---

## Plugin Configuration Details

### Integration with MPS Theme

The MPS theme has built-in support for these plugins. The following CSS classes and hooks are available:

**Booking Widget Placement:**
```php
// In template files, use this placeholder
<?php do_action('mps_booking_widget'); ?>
```

**Testimonial Display Locations:**
- Homepage: After "Why Choose Us" section
- Service pages: Before CTA section
- About page: After team section

**Form Placements:**
- Contact page: Main contact form
- Service pages: Quick quote sidebar widget
- Footer: Newsletter signup (if implemented)

### Custom CSS for Plugin Styling

Add this to your theme's `style.css` or via Customizer:

```css
/* Amelia Booking Customization */
.amelia-app-booking .am-service-card {
    border-radius: var(--radius-lg);
    border-color: var(--light-gray);
}

.amelia-app-booking .am-service-card:hover {
    border-color: var(--primary-color);
}

.amelia-app-booking .am-button {
    background-color: var(--primary-color) !important;
    border-radius: var(--radius-md);
}

.amelia-app-booking .am-button:hover {
    background-color: var(--primary-dark) !important;
}

/* WPForms Customization */
.wpforms-container .wpforms-form input[type="text"],
.wpforms-container .wpforms-form input[type="email"],
.wpforms-container .wpforms-form input[type="tel"],
.wpforms-container .wpforms-form select,
.wpforms-container .wpforms-form textarea {
    border-radius: var(--radius-md);
    border: 2px solid var(--light-gray);
    padding: 0.875rem 1rem;
}

.wpforms-container .wpforms-form input:focus,
.wpforms-container .wpforms-form select:focus,
.wpforms-container .wpforms-form textarea:focus {
    border-color: var(--primary-color);
    outline: none;
}

.wpforms-container .wpforms-submit {
    background-color: var(--primary-color) !important;
    border-radius: var(--radius-md) !important;
    padding: 0.875rem 2rem !important;
}

.wpforms-container .wpforms-submit:hover {
    background-color: var(--primary-dark) !important;
}

/* Stars Testimonials Customization */
.starter-starter-testimonial {
    background-color: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

.starter-starter-testimonial .star-rating .star {
    color: var(--primary-color);
}

/* NextGEN Gallery Customization */
.ngg-gallery-thumbnail-box {
    border-radius: var(--radius-md);
    overflow: hidden;
}

.ngg-gallery-thumbnail-box:hover {
    box-shadow: var(--shadow-hover);
}

/* Tawk.to Customization */
#tawkchat-container {
    z-index: 999 !important;
}

/* WP Google Maps Customization */
.wpgmza_map {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}
```

---

## Testing Checklist

### Pre-Launch Testing

**Booking System (Amelia):**
- [ ] Test booking flow on desktop
- [ ] Test booking flow on mobile
- [ ] Verify email notifications are sent
- [ ] Check calendar displays correctly
- [ ] Test booking cancellation
- [ ] Verify time zone settings

**Contact Forms (WPForms):**
- [ ] Submit test form on contact page
- [ ] Verify email delivery
- [ ] Check spam protection works
- [ ] Test validation messages
- [ ] Verify mobile responsiveness

**SEO (Yoast):**
- [ ] Check meta titles display correctly
- [ ] Verify meta descriptions
- [ ] Test XML sitemap access
- [ ] Check Schema markup in source
- [ ] Verify breadcrumbs (if enabled)

**Testimonials:**
- [ ] Add 5+ test testimonials
- [ ] Verify slider functionality
- [ ] Check mobile display
- [ ] Test rating display

**Gallery:**
- [ ] Upload test images
- [ ] Verify lightbox functionality
- [ ] Check lazy loading works
- [ ] Test mobile gallery display

**Live Chat:**
- [ ] Test chat widget appears
- [ ] Verify offline form works
- [ ] Check mobile chat functionality
- [ ] Test notification sounds

**Maps:**
- [ ] Verify map loads correctly
- [ ] Check markers display
- [ ] Test on mobile devices
- [ ] Verify service area polygon

**Security (Wordfence):**
- [ ] Run initial security scan
- [ ] Verify firewall is active
- [ ] Test brute force protection
- [ ] Check email alerts work

**Performance (LiteSpeed):**
- [ ] Run speed test (GTmetrix/PageSpeed)
- [ ] Verify caching works
- [ ] Check image optimization
- [ ] Test mobile performance score

---

## Maintenance Schedule

### Weekly Tasks
- Review chat transcripts
- Check form submissions
- Monitor security alerts
- Review booking analytics

### Monthly Tasks
- Update all plugins
- Run full security scan
- Check SEO rankings
- Add new testimonials
- Update gallery images

### Quarterly Tasks
- Review plugin settings
- Update contact information
- Audit SEO performance
- Backup and test restore

---

## Troubleshooting Common Issues

### Amelia Not Showing Services
- Check if services are published
- Verify employee is assigned
- Clear cache after changes

### Forms Not Sending Emails
- Check SMTP configuration
- Verify admin email is correct
- Check spam folder
- Consider using WP Mail SMTP

### Map Not Loading
- Verify API key is correct
- Check API key restrictions
- Ensure Maps JavaScript API is enabled

### Chat Widget Not Appearing
- Check Tawk.to property ID
- Verify widget is enabled
- Clear browser cache
- Check for JavaScript errors

### Slow Page Load
- Clear LiteSpeed cache
- Check for plugin conflicts
- Optimize images
- Review server resources

---

## Support Resources

| Plugin | Documentation | Support Forum |
|--------|---------------|---------------|
| Amelia | https://wpamelia.com/documentation/ | https://wpamelia.com/support/ |
| WPForms | https://wpforms.com/docs/ | https://wordpress.org/support/plugin/wpforms-lite/ |
| Yoast SEO | https://yoast.com/help/ | https://wordpress.org/support/plugin/wordpress-seo/ |
| Stars Testimonials | Plugin Dashboard | https://wordpress.org/support/plugin/developer-developer-developer/ |
| NextGEN | https://developer-developer.developer/ | https://wordpress.org/support/plugin/nextgen-gallery/ |
| Tawk.to | https://help.tawk.to/ | https://www.tawk.to/contact-us/ |
| WP Google Maps | https://www.wpgmaps.com/documentation/ | https://wordpress.org/support/plugin/wp-google-maps/ |
| Wordfence | https://www.wordfence.com/help/ | https://wordpress.org/support/plugin/wordfence/ |
| LiteSpeed | https://docs.litespeedtech.com/lscache/lscwp/ | https://wordpress.org/support/plugin/litespeed-cache/ |

---

*Document Version: 1.0*
*Last Updated: November 2025*
*For: Merlin Property Services Website*
