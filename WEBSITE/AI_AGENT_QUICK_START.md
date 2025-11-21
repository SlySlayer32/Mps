# AI Agent Quick Start Guide - Merlin Property Services Website

## Purpose
This is a condensed, action-oriented guide for AI coding agents (like GitHub Copilot) to build the Merlin Property Services website. For full details, see `BUILD_GUIDE.md`.

---

## Prerequisites Checklist

**Before starting, request from user:**
- [ ] WordPress admin credentials (username & password)
- [ ] WordPress site URL (e.g., https://merlinproperty.com.au)
- [ ] Business email address
- [ ] Business phone number
- [ ] Business address (Melbourne)
- [ ] Service pricing (or note if TBD)
- [ ] Confirmation that WordPress is already installed on hosting

**If WordPress not installed yet:**
- [ ] Hosting control panel access
- [ ] Domain is registered and pointing to hosting

---

## Phase 1: Foundation (30 minutes)

### Step 1: Access WordPress
1. Navigate to: `https://[SITE_URL]/wp-admin`
2. Login with provided credentials
3. Verify you can access Dashboard

### Step 2: Install Security Plugins
```
Dashboard → Plugins → Add New

Install these (in order):
1. Wordfence Security → Activate
2. Really Simple SSL → Activate (click "Activate SSL" button)
3. UpdraftPlus WordPress Backup → Activate
```

### Step 3: Configure Security
```
Wordfence → Run scan
UpdraftPlus → Settings → Daily backups → Connect Google Drive/Dropbox → Backup Now
```

### Step 4: Install Theme and Page Builder
```
Appearance → Themes → Add New → Search "Astra" → Install → Activate

Plugins → Add New → Search "Elementor" → Install "Elementor Page Builder" → Activate
```

### Step 5: Basic Theme Configuration
```
Appearance → Customize:
- Site Identity:
  - Site Title: "Merlin Property Services"
  - Tagline: "Professional Cleaning Services in Melbourne"
- Colors:
  - Primary: #FF9500
  - Link: #0066CC
- Typography:
  - Body Font Size: 16px
- Publish
```

**✓ Verification:** Site loads with correct branding, SSL active (https://)

---

## Phase 2: Core Plugins (45 minutes)

### Install All Required Plugins
```
Plugins → Add New → Install and Activate each:

SEO:
- Rank Math SEO

Forms:
- WPForms Lite

Booking (IMPORTANT):
- Option A: Upload Amelia Pro (if user provides .zip file)
- Option B: Install "Bookly Lite" (free alternative)

Performance:
- Autoptimize
- ShortPixel Image Optimizer

Utilities:
- WP Mail SMTP
- Redirection
```

### Configure Rank Math SEO
```
Rank Math → Setup Wizard:
- Business Type: Local Business → Cleaning Service
- Business Name: Merlin Property Services
- Business Address: [from prerequisites]
- Phone: [from prerequisites]
- Connect Google Search Console (follow prompts)
- Enable Local SEO module
- Complete wizard
```

### Configure Booking System (If Amelia)
```
Amelia → Settings:
- Company: Merlin Property Services
- Currency: AUD
- Timezone: Australia/Sydney

Amelia → Services → Add Service (repeat for each):
1. End of Lease Cleaning - Duration: 4 hours - Price: [TBD]
2. Move In Cleaning - Duration: 3 hours - Price: [TBD]
3. Commercial Cleaning - Duration: varies - Price: [TBD]
4. Pre-sale Cleaning - Duration: 3 hours - Price: [TBD]
5. Gardening Services - Duration: 2 hours - Price: [TBD]
6. Carpet Cleaning - Duration: 2 hours - Price: [TBD]
7. Window Cleaning - Duration: 2 hours - Price: [TBD]
8. Minor Maintenance - Duration: 2 hours - Price: [TBD]

Amelia → Employees:
- Add employee
- Assign all services
- Set working hours: Mon-Sat, 8am-6pm

Amelia → Notifications:
- Enable booking confirmation emails
- Customize templates
```

**✓ Verification:** All plugins active, no conflicts, test booking shows available slots

---

## Phase 3: Page Structure (30 minutes)

### Create All Pages
```
Pages → Add New (create each):

1. Home (will be set as homepage)
2. About Us
3. Contact
4. Services (parent page)
5. End of Lease Cleaning (parent: Services)
6. Move In Cleaning (parent: Services)
7. Commercial Cleaning (parent: Services)
8. Pre-sale Cleaning (parent: Services)
9. Gardening Services (parent: Services)
10. Carpet Cleaning (parent: Services)
11. Window Cleaning (parent: Services)
12. Minor Maintenance (parent: Services)
13. Privacy Policy (auto-generated, just verify exists)

For pages 5-12:
- Edit page → Page Attributes → Parent: Services
- This creates URL: /services/end-of-lease-cleaning/
```

### Set Homepage
```
Settings → Reading:
- "Your homepage displays": A static page
- Homepage: Home
- Save Changes
```

### Create Navigation Menu
```
Appearance → Menus:
- Create Menu: "Primary Menu"
- Add pages in this order:
  - Home
  - Services (with sub-items):
    - End of Lease Cleaning
    - Move In Cleaning
    - Commercial Cleaning
    - Pre-sale Cleaning
    - Gardening Services
    - Carpet Cleaning
    - Window Cleaning
    - Minor Maintenance
  - About Us
  - Contact
- Menu Settings → Check "Primary Menu"
- Save Menu
```

**✓ Verification:** Homepage set, menu displays in header, all links work

---

## Phase 4: Content & Design (3-4 hours)

### Step 1: Gather Images
**Reference:** `../Materials/SELECTED_ILLUSTRATIONS.md`

Download these from Pixabay:
- Hero image (cleaning/professional service theme)
- 8 service card illustrations (one per service)
- Icon set for features/benefits

**Optimize:** Use TinyPNG.com to compress before upload

Upload to: Media → Add New → Add descriptive ALT text to each

### Step 2: Build Homepage with Elementor

**Reference:** `CONTENT_STRATEGY.md` for exact text content

```
Pages → Home → Edit with Elementor

Section 1 - Header:
- Add Heading widget: "Merlin Property Services" (H1, #FF9500, center)
- Add Text: "Professional Cleaning Services in Melbourne" (24px, center)

Section 2 - Hero (2 columns):
- Left: Heading "Your Complete Move-Out Solution" + description + Button "Book Now"
- Right: Hero image
- Button style: #FF9500 background

Section 3 - Services Cards (4 columns, 2 rows for 8 services):
For each service:
- Add Icon Box widget
- Image: service illustration
- Title: service name
- Description: 1-2 sentence summary from CONTENT_STRATEGY.md
- Link: /services/[service-slug]/
- Style: White background, 1px #DDD border, hover effect (lift up)

Service order:
1. End of Lease Cleaning
2. Move In Cleaning
3. Commercial Cleaning
4. Pre-sale Cleaning
5. Gardening Services
6. Carpet Cleaning
7. Window Cleaning
8. Minor Maintenance

Section 4 - Why Choose Us (3 columns):
- Column 1: "Comprehensive Service" + icon + text
- Column 2: "100% Bond Back Guarantee" + icon + text
- Column 3: "Fully Insured" + icon + text

Section 5 - CTA:
- Background: #FF9500
- Heading: "Ready to Book?"
- Button: "Get a Quote" → link to /contact/

Responsive:
- Switch to mobile view (bottom-left icon)
- Adjust: Service cards stack 1 column on mobile
- Reduce font sizes appropriately

Publish
```

### Step 3: Build Service Pages

**Template structure for each of 8 service pages:**

```
Edit with Elementor:

Section 1 - Hero (2 columns):
- Left: H1 service name + subheading + brief description + badges
- Right: Service illustration

Section 2 - What's Included:
- Heading: "What's Included"
- Icon List widget with service-specific items (get from CONTENT_STRATEGY.md)

Section 3 - Pricing Table:
- Heading: "Pricing"
- Table widget or pricing table:
  | Property Size | Price | Details |
  |---------------|-------|---------|
  | 1 Bedroom | [TBD or actual] | Includes... |
  | 2 Bedroom | [TBD or actual] | Includes... |
  | 3 Bedroom | [TBD or actual] | Includes... |
  | 4+ Bedroom | Custom Quote | Contact us |

Section 4 - Guarantee (for End of Lease only):
- Light blue background
- Heading: "100% Bond Back Guarantee"
- Description of guarantee

Section 5 - Booking:
- Heading: "Check Availability & Book Now"
- Shortcode: [ameliabooking service=X] (replace X with service ID)
- OR Button linking to /contact/

Section 6 - CTA:
- Background: #FF9500
- "Ready to Book?" + button

Repeat for all 8 services - adjust content per CONTENT_STRATEGY.md
```

### Step 4: Build About Page

**Reference:** `CONTENT_STRATEGY.md` - About Us section

```
Edit with Elementor:

Section 1 - Introduction:
- Heading: "About Merlin Property Services"
- Text: Business story (from CONTENT_STRATEGY.md)
- Image: Professional illustration

Section 2 - Why Choose Us (3 columns):
- Comprehensive Services
- Professional & Insured
- Customer-Focused

Section 3 - CTA:
- Button to Contact page
```

### Step 5: Build Contact Page

**Create contact form first:**
```
WPForms → Add New:
- Template: Simple Contact Form
- Add fields:
  1. Name (required)
  2. Email (required)
  3. Phone (required)
  4. Service Needed (dropdown - list all 8 services)
  5. Preferred Date (date picker)
  6. Message
- Settings:
  - Notification email: [business email]
  - Confirmation: "Thanks! We'll contact you within 24 hours."
- Save → Copy shortcode
```

**Build page:**
```
Edit with Elementor:

Section 1 - Contact Info (3 columns):
- Phone: [business phone] (clickable tel: link)
- Email: [business email] (clickable mailto: link)
- Location: "Melbourne & Surrounding Suburbs"

Section 2 - Contact Form:
- Insert shortcode from WPForms

Section 3 - Business Hours:
- Mon-Fri: 8am-6pm
- Sat: 9am-5pm
- Sun: Closed

Test form submission!
```

**✓ Verification:** All pages designed, mobile responsive, content from docs added, forms work

---

## Phase 5: SEO & Performance (2 hours)

### SEO Optimization

**Homepage:**
```
Edit page → Rank Math SEO box:
- Focus Keyword: "cleaning services Melbourne"
- SEO Title: "Professional Cleaning Services Melbourne | Merlin Property Services"
- Meta Description: "Expert cleaning services in Melbourne. End of lease, commercial, gardening & more. 100% bond back guarantee. Book online today."
- Check score: Aim for 80+
```

**Each Service Page:**
```
Example - End of Lease Cleaning:
- Focus Keyword: "end of lease cleaning Melbourne"
- SEO Title: "End of Lease Cleaning Melbourne | 100% Bond Back Guarantee"
- Meta Description: "Professional end of lease cleaning in Melbourne. 100% bond back guarantee or we return for free. Book online. Fully insured."

Repeat with appropriate keywords for all 8 services
```

**Schema Markup:**
```
Rank Math → Schema:
- Homepage: Local Business schema (add all business details)
- Service pages: Service schema (provider: Merlin Property Services)
```

**Images:**
```
Media → Library → Edit each image:
- ALT text: descriptive (e.g., "Professional end of lease cleaning service Melbourne")
- Ensure all images have ALT text
```

### Performance Optimization

```
Autoptimize → Settings:
- Enable CSS optimization
- Enable JavaScript optimization
- Enable lazy loading images

ShortPixel → Settings:
- Compression: Lossy
- Enable WebP
- Bulk optimize all images

WP Rocket (if available):
- Enable caching
- Enable file optimization
- Enable lazy loading
- Database cleanup weekly

Test performance:
- PageSpeed Insights: https://pagespeed.web.dev/
- Aim: 80+ mobile, 90+ desktop
```

### Google Setup

```
1. Google Analytics:
   - Create GA4 property at analytics.google.com
   - Get Measurement ID (G-XXXXXXXXXX)
   - Install Site Kit plugin OR add code to header
   
2. Google Search Console:
   - Add property at search.google.com/search-console
   - Verify ownership (use Site Kit or HTML tag)
   - Submit sitemap: /sitemap_index.xml

3. Google My Business:
   - Create listing at google.com/business
   - Add all business details
   - Verify business (postcard or instant)
   - Add services and photos
```

### Cookie Consent

```
Install CookieYes plugin:
- Enable cookie banner
- Position: Bottom
- Design: Match brand colors (#FF9500)
- Categories: Necessary (always) + Analytics (consent required)
- Test: Clear cookies, visit site, verify banner shows

Update Privacy Policy:
- Add section about cookies
- List cookie types used
- Explain Google Analytics
```

**✓ Verification:** SEO scores 80+, PageSpeed 80+, Analytics tracking, cookie consent active

---

## Phase 6: Testing (2 hours)

### Functionality Testing

```
Test checklist:
- [ ] All menu links work
- [ ] All service cards link to correct pages
- [ ] Contact form submits successfully
- [ ] Receive form notification email
- [ ] Customer receives confirmation email
- [ ] Booking system shows available slots
- [ ] Can complete test booking
- [ ] Booking confirmation received
- [ ] Phone links work (click-to-call)
- [ ] Email links work (mailto:)
- [ ] No 404 errors (check Redirection plugin)
```

### Mobile Testing

```
Test on multiple sizes:
- Desktop (1920×1080): Layout correct
- Laptop (1366×768): Layout correct
- Tablet (768×1024): Cards stack properly, menu hamburger
- Mobile (375×667): Single column, readable text (16px min)

Tools:
- Chrome DevTools responsive mode
- Real devices if available
- Google Mobile-Friendly Test: https://search.google.com/test/mobile-friendly
```

### Browser Testing

```
Test on:
- Chrome (latest)
- Safari (latest)
- Firefox (latest)
- Edge (latest)

Check: layout, forms, booking system all work
```

### Accessibility

```
WAVE Tool: https://wave.webaim.org/
Check:
- All images have ALT text
- Color contrast sufficient (4.5:1)
- Heading hierarchy correct
- Forms have labels
- Links descriptive
- Keyboard navigation works
```

### Security

```
Wordfence:
- Run full scan
- Fix any high-priority issues
- Enable two-factor auth

SSL Check:
- All pages load https://
- No mixed content warnings
- Use: https://www.sslshopper.com/ssl-checker.html
```

**✓ Verification:** All tests pass, no errors, mobile works, accessible

---

## Phase 7: Pre-Launch (1 hour)

### Final Checks

```
Legal:
- [ ] Privacy Policy complete and accessible
- [ ] Cookie consent active
- [ ] Terms of Service (optional)

SEO:
- [ ] Settings → Reading → UNCHECK "Discourage search engines"
- [ ] Sitemap accessible: /sitemap_index.xml
- [ ] Google Search Console verified
- [ ] Google Analytics tracking

Backup:
- [ ] UpdraftPlus → Backup Now
- [ ] Download backup locally
- [ ] Verify backup complete

Contact Info:
- [ ] Phone number correct everywhere
- [ ] Email address correct everywhere
- [ ] Business address correct (if shown)

Pricing:
- [ ] All TBD replaced with actual prices OR
- [ ] "Contact for Quote" prominently displayed
- [ ] Booking system prices match service pages (if applicable)
```

### Launch

```
When ready:
1. Settings → Reading → UNCHECK "Discourage search engines"
2. Save Changes
3. Google Search Console → Request indexing for homepage
4. Announce on social media (if applicable)
5. Update Google My Business with website link
```

### Post-Launch Monitoring (First 24 hours)

```
Check:
- [ ] Google Analytics showing traffic
- [ ] No errors in browser console
- [ ] Forms working
- [ ] Booking system working
- [ ] No downtime
- [ ] Test actual booking flow
```

**✓ Site is LIVE!**

---

## Troubleshooting Quick Reference

**Problem:** White screen / errors after plugin install
**Solution:** Deactivate last plugin, check compatibility, update WordPress/PHP

**Problem:** Form submissions not received
**Solution:** Install WP Mail SMTP, configure with Gmail/SendGrid

**Problem:** Booking system not working
**Solution:** Check Amelia settings (timezone, employee assigned), clear cache

**Problem:** Slow performance
**Solution:** Compress images, enable caching, check for heavy plugins

**Problem:** Mobile layout broken
**Solution:** Check Elementor responsive settings, verify breakpoints

---

## Summary of Key Plugin Settings

### Essential Plugins Required:
1. **Wordfence** - Security
2. **Really Simple SSL** - Force HTTPS
3. **UpdraftPlus** - Backups
4. **Astra** - Theme
5. **Elementor** - Page builder
6. **Rank Math** - SEO
7. **WPForms** - Contact forms
8. **Amelia or Bookly** - Booking system
9. **Autoptimize** - Performance
10. **ShortPixel** - Image optimization
11. **CookieYes** - Cookie consent
12. **Site Kit** - Google Analytics/Search Console

### Key Configuration Values:
- Primary Color: #FF9500 (orange)
- Secondary Color: #0066CC (blue)
- Font Size: 16px minimum (mobile readability)
- Currency: AUD ($)
- Timezone: Australia/Sydney
- Business Name: Merlin Property Services

---

## Post-Launch Maintenance Schedule

**Daily (First Week):**
- Check analytics
- Monitor form submissions
- Verify backups

**Weekly:**
- Review analytics
- Check Search Console
- Test booking system
- Security scan

**Monthly:**
- Update WordPress core
- Update all plugins
- Performance review
- Database optimization

---

## Files to Reference During Build

1. **CONTENT_STRATEGY.md** - All page content, exact text to use
2. **README.md** - Business goals, overview
3. **FINAL_RECOMMENDATIONS.md** - Strategy overview
4. **WORDPRESS_RECOMMENDATIONS.md** - Technical details
5. **../Materials/SELECTED_ILLUSTRATIONS.md** - Image sources

---

## Success Criteria

**Website is ready for launch when:**
- [ ] All 13 pages created with content
- [ ] All 8 service pages detailed and linked
- [ ] Contact form working and tested
- [ ] Booking system operational
- [ ] Mobile responsive (tested)
- [ ] SSL active (https://)
- [ ] PageSpeed score 80+
- [ ] SEO configured (Rank Math score 80+)
- [ ] Google Analytics tracking
- [ ] Cookie consent active
- [ ] Security scan clean
- [ ] Backups configured
- [ ] All contact info accurate
- [ ] Pricing displayed (or TBD clearly marked)

---

**Estimated Total Time:** 10-15 hours for complete build

**Build Version:** 1.0  
**Last Updated:** November 2025  
**For:** Merlin Property Services  
**Website:** merlinproperty.com.au

---

*End of AI Agent Quick Start Guide*
