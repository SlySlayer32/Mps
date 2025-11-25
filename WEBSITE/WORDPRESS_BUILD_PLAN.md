# WordPress Build Plan for Merlin Property Services

**Version:** 1.0  
**Target Platform:** WordPress on IONOS Hosting  
**Website:** merlinproperty.com.au  
**Business:** Cleaning Services in Melbourne  

---

## Overview

This build plan provides a comprehensive, step-by-step guide for creating the Merlin Property Services website using WordPress and plugins, specifically optimized for IONOS hosting. This document consolidates all requirements from the existing documentation into an actionable implementation plan.

---

## Table of Contents

1. [Business Requirements Summary](#1-business-requirements-summary)
2. [Technical Stack](#2-technical-stack)
3. [Pages & Site Structure](#3-pages--site-structure)
4. [Design Specifications](#4-design-specifications)
5. [WordPress Plugin Requirements](#5-wordpress-plugin-requirements)
6. [Phase 1: Foundation Setup](#6-phase-1-foundation-setup)
7. [Phase 2: Core Functionality](#7-phase-2-core-functionality)
8. [Phase 3: Page Design & Content](#8-phase-3-page-design--content)
9. [Phase 4: SEO & Performance](#9-phase-4-seo--performance)
10. [Phase 5: Testing & Launch](#10-phase-5-testing--launch)
11. [Services Configuration](#11-services-configuration)
12. [Post-Launch Maintenance](#12-post-launch-maintenance)

---

## 1. Business Requirements Summary

### Business Type
- Sole trader cleaning business
- Based in Melbourne, Australia
- Services residential and commercial properties

### Core Services (8 Total)
1. End of Lease Cleaning (flagship service)
2. Move In Cleaning
3. Commercial Cleaning
4. Pre-sale Cleaning
5. Gardening Services
6. Carpet Cleaning
7. Window Cleaning
8. Minor Maintenance

### Key Differentiators
- **Complete move-out service** - Not just interior cleaning but also garden care, minor repairs
- **100% Bond Back Guarantee** - For end of lease cleaning
- **Fully insured** - Professional and reliable service

### Design Requirements
- Elegant, easily readable design
- **Card-based layout** for services on landing page
- Clean navigation with instant clarity
- No "template feel"
- Mobile responsive
- Professional color scheme (Orange #FF9500, Blue #0066CC)

---

## 2. Technical Stack

### Hosting Platform
**IONOS WordPress Hosting** (existing)
- ✅ Keep current IONOS hosting
- ✅ Use included SSL certificate
- ✅ Use included email hosting
- ✅ Leverage WordPress one-click installation

### WordPress Configuration
| Component | Selection | Rationale |
|-----------|-----------|-----------|
| Theme | Astra (Free) | Lightweight, customizable, Elementor compatible |
| Page Builder | Elementor (Free/Pro) | Drag-and-drop, 5M+ installs, extensive templates |
| PHP Version | 8.0+ | Best WordPress performance |
| WordPress Version | 6.x (latest) | Security and features |

### Budget Tiers

#### Minimal ($59-74/year)
- Domain: $15/year
- IONOS Hosting: Existing ($0 additional)
- Amelia Booking: $59/year
- All other plugins: Free

#### Recommended ($177-192/year)
- Minimal setup, plus:
- WP Rocket: $59/year
- Elementor Pro: $59/year

---

## 3. Pages & Site Structure

### Complete Page Hierarchy
```
Home (Landing Page)
├── Services (Parent Page)
│   ├── End of Lease Cleaning
│   ├── Move In Cleaning
│   ├── Commercial Cleaning
│   ├── Pre-sale Cleaning
│   ├── Gardening Services
│   ├── Carpet Cleaning
│   ├── Window Cleaning
│   └── Minor Maintenance
├── About Us
├── Contact
└── Privacy Policy
```

### URL Structure
| Page | URL |
|------|-----|
| Home | / |
| Services | /services/ |
| End of Lease Cleaning | /services/end-of-lease-cleaning/ |
| Move In Cleaning | /services/move-in-cleaning/ |
| Commercial Cleaning | /services/commercial-cleaning/ |
| Pre-sale Cleaning | /services/pre-sale-cleaning/ |
| Gardening Services | /services/gardening-services/ |
| Carpet Cleaning | /services/carpet-cleaning/ |
| Window Cleaning | /services/window-cleaning/ |
| Minor Maintenance | /services/minor-maintenance/ |
| About Us | /about-us/ |
| Contact | /contact/ |
| Privacy Policy | /privacy-policy/ |

### Navigation Menu Structure
```
Primary Menu:
├── Home
├── Services ▼
│   ├── End of Lease Cleaning
│   ├── Move In Cleaning
│   ├── Commercial Cleaning
│   ├── Pre-sale Cleaning
│   ├── Gardening Services
│   ├── Carpet Cleaning
│   ├── Window Cleaning
│   └── Minor Maintenance
├── About Us
└── Contact
```

---

## 4. Design Specifications

### Brand Colors
| Color | Hex Code | Usage |
|-------|----------|-------|
| Primary | #FF9500 | CTA buttons, accents, highlights |
| Secondary | #0066CC | Links, secondary elements |
| Accent | #4DB8E8 | Light backgrounds, hover states |
| Neutral | #6C757D | Text, borders |
| Background | #FFFFFF | Main background |
| Light Gray | #F5F5F5 | Card backgrounds |

### Typography
- **Body Font Size:** 16px minimum (mobile readability)
- **Heading Hierarchy:** H1 → H2 → H3 (proper SEO)
- **Paragraphs:** Short, 2-3 sentences maximum
- **Font Family:** System fonts or Google Fonts (Astra default)

### Layout Principles
1. **Card-based design** for services on homepage
2. **2-column layouts** for hero sections (text + image)
3. **3-column layouts** for "Why Choose Us" sections
4. **Single column** for mobile responsive
5. **Clear CTAs** with orange (#FF9500) buttons

### Homepage Layout Structure
```
┌─────────────────────────────────────────┐
│ HEADER: Logo + Navigation Menu          │
├─────────────────────────────────────────┤
│ HERO: Headline + Description + CTA      │
│       [Text Column] | [Image Column]    │
├─────────────────────────────────────────┤
│ SERVICES: 8 Service Cards (4x2 grid)    │
│ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐        │
│ │ S1  │ │ S2  │ │ S3  │ │ S4  │        │
│ └─────┘ └─────┘ └─────┘ └─────┘        │
│ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐        │
│ │ S5  │ │ S6  │ │ S7  │ │ S8  │        │
│ └─────┘ └─────┘ └─────┘ └─────┘        │
├─────────────────────────────────────────┤
│ WHY CHOOSE US: 3 Column Benefits        │
├─────────────────────────────────────────┤
│ CTA SECTION: Book Now / Get Quote       │
├─────────────────────────────────────────┤
│ FOOTER: Contact Info + Links            │
└─────────────────────────────────────────┘
```

### Service Page Template Structure
```
┌─────────────────────────────────────────┐
│ HERO: Service Name + Badge + Image      │
├─────────────────────────────────────────┤
│ WHAT'S INCLUDED: Checklist              │
├─────────────────────────────────────────┤
│ PRICING TABLE: Sizes & Prices           │
├─────────────────────────────────────────┤
│ GUARANTEE SECTION (if applicable)       │
├─────────────────────────────────────────┤
│ BOOKING: Amelia Shortcode or CTA        │
├─────────────────────────────────────────┤
│ FAQ ACCORDION: 3-5 Questions            │
├─────────────────────────────────────────┤
│ CTA: Ready to Book?                     │
└─────────────────────────────────────────┘
```

---

## 5. WordPress Plugin Requirements

### TIER 1: Essential Plugins (Free)

| Plugin | Purpose | Installation Priority |
|--------|---------|----------------------|
| **Astra Theme** | Lightweight, customizable theme | 1 |
| **Elementor** | Drag-and-drop page builder | 2 |
| **Wordfence Security** | Firewall, malware scanner, login security | 3 |
| **Really Simple SSL** | Force HTTPS encryption | 4 |
| **UpdraftPlus** | Automatic backups to cloud | 5 |
| **Rank Math SEO** | SEO optimization, local business schema | 6 |
| **WPForms Lite** | Contact forms, quote requests | 7 |
| **WP Mail SMTP** | Ensure email delivery | 8 |
| **Autoptimize** | CSS/JS minification (if not using WP Rocket) | 9 |
| **ShortPixel** | Image optimization (100/month free) | 10 |

### TIER 2: Recommended Plugins (Paid)

| Plugin | Purpose | Cost | Priority |
|--------|---------|------|----------|
| **Amelia Booking** | Online booking system | $59/year | CRITICAL |
| **WP Rocket** | Caching, performance | $59/year | High |
| **Elementor Pro** | Advanced design, forms, popups | $59/year | Medium |

### TIER 3: Optional/Growth Plugins

| Plugin | Purpose | Cost |
|--------|---------|------|
| WPForms Pro | Advanced forms, payments | $49/year |
| Schema Pro | Advanced schema markup | $79/year |
| CookieYes | Cookie consent (GDPR) | Free/Paid |
| Site Kit by Google | Analytics, Search Console | Free |

### Plugin Configuration Notes

#### Wordfence Configuration
- Enable two-factor authentication
- Enable login security (limit attempts)
- Run initial security scan
- Schedule weekly scans

#### UpdraftPlus Configuration
- Schedule: Daily backups
- Storage: Google Drive or Dropbox
- Retention: 7 days
- Test restore capability

#### Rank Math SEO Configuration
- Business Type: Local Business → Cleaning Service
- Business Name: Merlin Property Services
- Enable Local SEO module
- Connect Google Search Console
- Enable schema markup

#### Amelia Booking Configuration
- Currency: AUD ($)
- Timezone: Australia/Sydney
- Working Hours: Mon-Sat, 8am-6pm
- Add all 8 services
- Configure email notifications

---

## 6. Phase 1: Foundation Setup

**Duration:** Week 1-2  
**Goal:** Secure WordPress installation with basic security and theme

### Step 1.1: IONOS WordPress Setup
```
1. Log into IONOS control panel
2. Navigate to WordPress Toolkit
3. Install WordPress (if not already installed)
4. Configuration:
   - Site Title: Merlin Property Services
   - Admin Username: [unique secure username - NOT "admin"]
   - Admin Password: [strong password]
   - Admin Email: [business email]
5. Verify https:// works (SSL active)
```

### Step 1.2: Security First
```
Dashboard → Plugins → Add New

Install in order:
1. Wordfence Security → Activate
   - Run initial scan
   - Enable two-factor auth
   
2. Really Simple SSL → Activate
   - Click "Activate SSL" button
   - Verify all pages load https://
   
3. UpdraftPlus → Activate
   - Settings → Daily backups
   - Connect Google Drive/Dropbox
   - Run first backup NOW
```

### Step 1.3: Theme & Page Builder
```
Appearance → Themes → Add New
1. Search "Astra" → Install → Activate

Plugins → Add New
2. Search "Elementor" → Install → Activate

Appearance → Customize:
- Site Identity:
  - Site Title: Merlin Property Services
  - Tagline: Professional Cleaning Services in Melbourne
- Colors:
  - Primary: #FF9500
  - Link: #0066CC
- Typography:
  - Body Font Size: 16px
- Click "Publish"
```

### Step 1.4: Basic Settings
```
Settings → General:
- Site Title: Merlin Property Services
- Tagline: Professional Cleaning Services in Melbourne
- Timezone: Melbourne

Settings → Permalinks:
- Select "Post name" (for SEO-friendly URLs)
- Save Changes

Settings → Reading:
- Will configure after creating Home page
```

### Verification Checklist - Phase 1
- [ ] WordPress installed and accessible
- [ ] SSL active (https:// works)
- [ ] Wordfence installed and scanned
- [ ] Two-factor authentication enabled
- [ ] First backup completed to cloud
- [ ] Astra theme active
- [ ] Elementor installed
- [ ] Brand colors configured

---

## 7. Phase 2: Core Functionality

**Duration:** Week 2-3  
**Goal:** Install all plugins, configure booking system, create page structure

### Step 2.1: Install Essential Plugins
```
Dashboard → Plugins → Add New

Install and activate each:
1. Rank Math SEO
2. WPForms Lite
3. WP Mail SMTP
4. ShortPixel Image Optimizer
5. Autoptimize (skip if using WP Rocket)

Paid plugins (upload if purchased):
6. Amelia Booking (Plugins → Add New → Upload)
7. WP Rocket (if purchased)
8. Elementor Pro (if purchased)
```

### Step 2.2: Configure Rank Math SEO
```
Rank Math → Setup Wizard:
1. Business Type: Local Business → Cleaning Service
2. Business Name: Merlin Property Services
3. Business Address: [Melbourne address]
4. Phone: [business phone]
5. Connect Google Search Console
6. Enable Local SEO module
7. Complete wizard
```

### Step 2.3: Configure Amelia Booking

#### Basic Settings
```
Amelia → Settings:
- Company: Merlin Property Services
- Address: [Melbourne address]
- Phone: [business phone]
- Email: [business email]
- Currency: AUD
- Timezone: Australia/Sydney
```

#### Add All 8 Services
```
Amelia → Services → Add Service

Service 1: End of Lease Cleaning
- Duration: 4 hours
- Price: From $220 (see CONTENT_STRATEGY.md for full pricing table)
- Description: [from CONTENT_STRATEGY.md]
- Category: Cleaning Services

Service 2: Move In Cleaning
- Duration: 3 hours
- Price: From $200

Service 3: Commercial Cleaning
- Duration: Varies
- Price: From $80 (custom quotes for larger spaces)

Service 4: Pre-sale Cleaning
- Duration: 3 hours
- Price: From $300

Service 5: Gardening Services
- Duration: 2 hours
- Price: From $45/hour

Service 6: Carpet Cleaning
- Duration: 2 hours
- Price: From $50/room

Service 7: Window Cleaning
- Duration: 2 hours
- Price: From $8/window

Service 8: Minor Maintenance
- Duration: 2 hours
- Price: $55/hour
```

#### Configure Employee
```
Amelia → Employees:
1. Add employee (yourself or business owner)
2. Assign ALL 8 services
3. Set working hours: Mon-Sat, 8am-6pm
4. Set days off: Sunday
```

#### Configure Notifications
```
Amelia → Notifications:
- Enable booking confirmation (to customer)
- Enable booking notification (to you)
- Enable cancellation emails
- Customize templates with branding
```

### Step 2.4: Create All Pages
```
Pages → Add New

Create these pages (just titles for now):
1. Home
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
13. Privacy Policy (may already exist)

For pages 5-12:
- Edit → Page Attributes → Parent: Services
```

### Step 2.5: Configure Homepage & Navigation
```
Settings → Reading:
- Your homepage displays: A static page
- Homepage: Select "Home"
- Save Changes

Appearance → Menus:
1. Create Menu: "Primary Menu"
2. Add pages in order:
   - Home
   - Services (with sub-items)
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
3. Menu Settings → Check "Primary Menu"
4. Save Menu
```

### Verification Checklist - Phase 2
- [ ] All plugins installed and activated
- [ ] Rank Math SEO configured
- [ ] Amelia booking system configured
- [ ] All 8 services added to Amelia
- [ ] Employee configured with services
- [ ] Email notifications configured
- [ ] Test booking works
- [ ] All 13 pages created
- [ ] Page hierarchy correct
- [ ] Homepage set
- [ ] Navigation menu created and working

---

## 8. Phase 3: Page Design & Content

**Duration:** Week 3-5  
**Goal:** Build all pages with Elementor, add content

### Step 3.1: Prepare Visual Assets
```
1. Download illustrations from Pixabay
   (See Materials/SELECTED_ILLUSTRATIONS.md)

2. Required images:
   - 1 hero illustration
   - 8 service card icons/illustrations
   - Trust badges (guarantee, insured)
   - Background elements (optional)

3. Optimize images:
   - Use TinyPNG.com before upload
   - Target: Under 200KB each

4. Upload to WordPress:
   - Media → Add New
   - Add descriptive ALT text to each
```

### Step 3.2: Build Homepage with Elementor

#### Access Elementor
```
Pages → Home → Edit with Elementor
```

#### Section 1: Hero
```
Add Section → 2 Columns (50/50)

Left Column:
- Heading (H1): "Complete Property Care for Melbourne Homes & Businesses"
- Text: "From move-out to move-in, we handle every detail so you don't have to."
- Button: "View Our Services" (Link: /services/)
  - Background: #FF9500
  - Text: White

Right Column:
- Image: Hero illustration
- Animation: Fade In (optional)
```

#### Section 2: Services Grid
```
Add Section
- Heading (H2): "Our Services"

Add Inner Section → 4 Columns

For each service (8 total, 2 rows):
Add Icon Box widget:
- Image: Service illustration
- Title: Service name
- Description: One-line description
- Link: /services/[service-slug]/

Styling:
- Background: White
- Border: 1px solid #DDD
- Padding: 20px
- Hover: Border color #FF9500, lift effect

Service Card Content:
1. End of Lease Cleaning - "100% bond back guarantee for your move-out"
2. Move In Cleaning - "Start fresh in a professionally cleaned home"
3. Commercial Cleaning - "Keep your workplace spotless and professional"
4. Pre-sale Cleaning - "Maximize your property's appeal to buyers"
5. Gardening Services - "Complete garden care and maintenance"
6. Carpet Cleaning - "Deep clean for carpets, rugs, and upholstery"
7. Window Cleaning - "Crystal clear windows inside and out"
8. Minor Maintenance - "Small repairs, painting, and handyman services"
```

#### Section 3: Why Choose Us
```
Add Section → 3 Columns
Heading (H2): "Why Melbourne Trusts Merlin Property Services"

Column 1: "Complete Move-Out Service"
- Icon or small illustration
- Text: "We don't just clean interiors. We handle gardens, repairs, and everything needed for a successful bond return or property sale."

Column 2: "100% Guarantee"
- Icon or small illustration
- Text: "Fully insured with a bond-back guarantee. If your landlord isn't satisfied, we'll re-clean for free."

Column 3: "Flexible Services"
- Icon or small illustration
- Text: "From a single room to entire properties, residential to commercial - we customize to your needs."
```

#### Section 4: Call-to-Action
```
Add Section → 1 Column
Background: #FF9500

- Heading: "Ready to Book?"
- Text: "Contact us today for a free quote"
- Button: "Get a Quote" → Link: /contact/
  - Background: White
  - Text: #FF9500
```

#### Responsive Design
```
1. Click responsive mode (bottom-left icon)
2. Check tablet view:
   - Service cards: 2 columns
   - Reduce padding
3. Check mobile view:
   - Service cards: 1 column
   - Adjust font sizes
   - Ensure buttons are tap-friendly (44px min)
4. Publish page
```

### Step 3.3: Build Service Page Template

Create one service page (End of Lease Cleaning) as template, then duplicate for others.

```
Pages → End of Lease Cleaning → Edit with Elementor

Section 1: Hero
- 2 Columns
- Left: H1 "End of Lease Cleaning"
       Subhead: "100% Bond Back Guarantee"
       Text: Brief description
       Badges: "Fully Insured" "Professional Team"
- Right: Service illustration

Section 2: What's Included
- Heading: "What's Included"
- Icon List widget:
  ✓ Kitchen: Oven, stovetop, rangehood, cupboards...
  ✓ Bathrooms: Shower, bath, toilet, tiles...
  ✓ Living areas: Walls, skirting boards...
  ✓ Bedrooms: Wardrobes, windows, carpets...
  ✓ All floors: Vacuum and mop
  [See CONTENT_STRATEGY.md for full lists]

Section 3: Pricing
- Heading: "Pricing"
- Table widget or Pricing Table:
  | Property Size | Price | Details |
  |---------------|-------|---------|
  | 1 Bedroom | From $220 | Interior cleaning |
  | 2 Bedroom | From $280 | Interior cleaning |
  | 3 Bedroom | From $380 | Interior cleaning |
  | 4+ Bedroom | Custom Quote | Contact us |
  
  Note: Reference CONTENT_STRATEGY.md for complete pricing tables
  Add-ons listed below table

Section 4: Guarantee (End of Lease only)
- Background: Light blue (#E8F4F8)
- Heading: "Our 100% Bond Back Guarantee"
- Text: Guarantee description
- Badge/shield icon

Section 5: Booking
- Heading: "Check Availability & Book Now"
- Shortcode widget: [ameliabooking service=X]
  (Replace X with service ID from Amelia)
- OR Button linking to /contact/

Section 6: FAQ
- Heading: "Frequently Asked Questions"
- Accordion/Toggle widget:
  Q: How long does end of lease cleaning take?
  A: Typically 4-8 hours depending on property size...
  
  [Add 3-5 FAQs from CONTENT_STRATEGY.md]

Section 7: CTA
- Background: #FF9500
- "Ready to Book?" + Button

Publish
```

### Step 3.4: Duplicate for Other Services
```
For each remaining service page:
1. Open page in Elementor
2. Copy sections from End of Lease template
3. Update content per CONTENT_STRATEGY.md:
   - Service name
   - Description
   - What's Included items
   - Pricing
   - FAQs
4. Update Amelia shortcode service ID
5. Publish
```

### Step 3.5: Build About Page
```
Edit with Elementor:

Section 1: Introduction
- Heading: "About Merlin Property Services"
- Text: Business story
- Image: Professional illustration

Section 2: What Makes Us Different
- 3 Columns:
  - Comprehensive Services
  - Professional & Insured
  - Customer-Focused

Section 3: CTA
- Button to Contact page
```

### Step 3.6: Build Contact Page

#### Create Contact Form First
```
WPForms → Add New
Template: Simple Contact Form

Fields:
1. Name (required)
2. Email (required)
3. Phone (required)
4. Service Needed (dropdown):
   - End of Lease Cleaning
   - Move In Cleaning
   - Commercial Cleaning
   - Pre-sale Cleaning
   - Gardening Services
   - Carpet Cleaning
   - Window Cleaning
   - Minor Maintenance
   - Other
5. Preferred Date (date picker)
6. Message (paragraph)

Settings:
- Notification Email: [business email]
- Confirmation: "Thanks! We'll contact you within 24 hours."
- Enable spam protection

Save → Copy shortcode
```

#### Build Contact Page
```
Edit with Elementor:

Section 1: Contact Info (3 columns)
- Column 1: Phone icon + [phone number] (tel: link)
- Column 2: Email icon + [email] (mailto: link)
- Column 3: Location icon + "Melbourne & Surrounding Suburbs"

Section 2: Contact Form
- Shortcode widget: [wpforms id="X"]

Section 3: Business Hours
- Mon-Fri: 8am-6pm
- Sat: 9am-5pm
- Sun: Closed

Test form submission!
```

### Verification Checklist - Phase 3
- [ ] All illustrations downloaded and optimized
- [ ] Images uploaded with ALT text
- [ ] Homepage complete with 8 service cards
- [ ] All 8 service pages designed
- [ ] Each service page has pricing table
- [ ] Booking shortcodes added
- [ ] About page complete
- [ ] Contact page complete with form
- [ ] Contact form tested
- [ ] All pages mobile responsive
- [ ] All links work

---

## 9. Phase 4: SEO & Performance

**Duration:** Week 5-6  
**Goal:** Optimize for search engines and page speed

### Step 4.1: On-Page SEO

#### Homepage SEO
```
Edit page → Rank Math SEO box:
- Focus Keyword: "cleaning services Melbourne"
- SEO Title: "Professional Cleaning Services Melbourne | Merlin Property Services"
- Meta Description: "Expert cleaning services in Melbourne. End of lease, commercial, gardening & more. 100% bond back guarantee. Book online today."
- Target Score: 80+
```

#### Service Page SEO
```
For each service page:

End of Lease Cleaning:
- Focus Keyword: "end of lease cleaning Melbourne"
- SEO Title: "End of Lease Cleaning Melbourne | 100% Bond Back Guarantee"
- Meta Description: "Professional end of lease cleaning in Melbourne. 100% bond back guarantee or we return for free. Book online. Fully insured."

Move In Cleaning:
- Focus Keyword: "move in cleaning Melbourne"

Commercial Cleaning:
- Focus Keyword: "commercial cleaning Melbourne"

[Continue for all 8 services]
```

#### Schema Markup
```
Rank Math → Schema:

Homepage:
- Schema Type: Local Business
- Business Name: Merlin Property Services
- Business Type: House Cleaning Service
- Address: [Melbourne address]
- Phone: [phone]
- Price Range: $$

Service Pages:
- Schema Type: Service
- Service Name: [service name]
- Provider: Merlin Property Services
- Area Served: Melbourne, Victoria
```

### Step 4.2: Image SEO
```
Media → Library → Edit each image:
- Add descriptive ALT text
  Example: "Professional end of lease cleaning service in Melbourne"
- Add title and description
- Ensure all images have ALT text
```

### Step 4.3: Performance Optimization

#### If Using WP Rocket
```
WP Rocket → Settings:
- Cache: Enable (auto-enabled)
- File Optimization:
  - Minify CSS: Enable
  - Combine CSS: Enable
  - Minify JavaScript: Enable (test compatibility)
- Media:
  - Lazy Load images: Enable
  - Lazy Load iframes: Enable
- Preload: Enable preload cache
- Database: Schedule weekly cleanup
```

#### If Using Free Plugins
```
Autoptimize → Settings:
- Optimize JavaScript Code: Enable
- Optimize CSS Code: Enable
- Aggregate CSS: Enable
- Enable lazy loading

ShortPixel:
- Compression: Lossy (best for web)
- Enable WebP conversion
- Bulk optimize all images
```

### Step 4.4: Analytics Setup
```
1. Create Google Analytics 4 account:
   - Go to analytics.google.com
   - Create property: Merlin Property Services
   - Get Measurement ID (G-XXXXXXXXXX)

2. Install Site Kit plugin:
   - Plugins → Add New → "Site Kit by Google"
   - Connect Google account
   - Enter Measurement ID

3. Google Search Console:
   - Go to search.google.com/search-console
   - Add property
   - Verify ownership
   - Submit sitemap: /sitemap_index.xml
```

### Step 4.5: Cookie Consent (If Using Analytics)
```
Plugins → Add New → "CookieYes"
Install and activate

CookieYes → Cookie Banner:
- Enable banner
- Position: Bottom
- Match brand colors (#FF9500)
- Categories: Necessary + Analytics
- Test banner appears on first visit
```

### Performance Targets
```
Run tests at:
- PageSpeed Insights: pagespeed.web.dev
- GTmetrix: gtmetrix.com

Targets:
- PageSpeed Mobile: 80+
- PageSpeed Desktop: 90+
- Load time: Under 3 seconds
- Core Web Vitals: Pass
```

### Verification Checklist - Phase 4
- [ ] All pages have SEO titles
- [ ] All pages have meta descriptions
- [ ] Focus keywords set
- [ ] Schema markup configured
- [ ] All images have ALT text
- [ ] Caching enabled
- [ ] Images optimized
- [ ] Lazy loading enabled
- [ ] Google Analytics tracking
- [ ] Search Console verified
- [ ] Sitemap submitted
- [ ] PageSpeed score 80+ mobile
- [ ] Cookie consent active

---

## 10. Phase 5: Testing & Launch

**Duration:** Week 6-7  
**Goal:** Complete testing, fix issues, go live

### Step 5.1: Functionality Testing
```
Test Checklist:
- [ ] All menu links work
- [ ] All service cards link correctly
- [ ] Service dropdown works
- [ ] Contact form submits
- [ ] Receive form notification email
- [ ] Customer receives confirmation
- [ ] Booking system shows available slots
- [ ] Can complete test booking
- [ ] Booking confirmation received
- [ ] Phone links work (click-to-call)
- [ ] Email links work (mailto:)
- [ ] No 404 errors
```

### Step 5.2: Mobile Responsive Testing
```
Test on:
- Desktop (1920×1080)
- Laptop (1366×768)
- Tablet (768×1024)
- Mobile (375×667)

Check:
- [ ] Service cards stack correctly
- [ ] Text readable (16px min)
- [ ] Buttons tap-friendly (44px)
- [ ] No horizontal scrolling
- [ ] Navigation hamburger works
```

### Step 5.3: Browser Testing
```
Test on:
- [ ] Chrome (latest)
- [ ] Safari (latest)
- [ ] Firefox (latest)
- [ ] Edge (latest)
- [ ] Mobile Safari
- [ ] Mobile Chrome
```

### Step 5.4: Accessibility Testing
```
Use WAVE Tool: wave.webaim.org

Check:
- [ ] All images have ALT text
- [ ] Color contrast 4.5:1 minimum
- [ ] Proper heading hierarchy
- [ ] Forms have labels
- [ ] Keyboard navigation works
```

### Step 5.5: Security Testing
```
Wordfence → Scan:
- Run full scan
- Fix any high-priority issues

SSL Check:
- All pages load https://
- No mixed content warnings
- Use sslshopper.com/ssl-checker.html
```

### Step 5.6: Pre-Launch Checklist
```
Legal:
- [ ] Privacy Policy complete
- [ ] Cookie consent active

SEO:
- [ ] "Discourage search engines" UNCHECKED
- [ ] Sitemap accessible
- [ ] Analytics tracking

Backup:
- [ ] Full backup completed
- [ ] Download backup locally

Content:
- [ ] Contact info correct everywhere
- [ ] Pricing accurate (use example prices from CONTENT_STRATEGY.md or actual business prices)
- [ ] No spelling errors
```

### Step 5.7: Launch
```
1. Settings → Reading
   - UNCHECK "Discourage search engines"
   - Save Changes

2. Google Search Console
   - Request indexing for homepage
   - Request indexing for service pages

3. Post-launch monitoring:
   - [ ] Google Analytics showing traffic
   - [ ] No errors in console
   - [ ] Forms working
   - [ ] Booking system working
```

---

## 11. Services Configuration

### Complete Service Details for Amelia

#### Service 1: End of Lease Cleaning
```
Name: End of Lease Cleaning
Category: Cleaning Services
Duration: 4-8 hours
Price: From $220 (1 bedroom) to $450+ (4+ bedroom)
Description: Get your full bond back with our comprehensive end of lease cleaning service. 100% bond back guarantee.

What's Included:
- Kitchen deep clean (oven, stovetop, cupboards)
- Bathroom sanitization
- All rooms vacuumed and mopped
- Windows inside
- Wall spot cleaning
- Final inspection ready

Pricing Reference (from CONTENT_STRATEGY.md):
- 1 Bedroom Apartment: $220 interior, $280 with exterior, $380 complete
- 2 Bedroom Apartment: $280 interior, $360 with exterior, $480 complete
- 3 Bedroom House: $380 interior, $500 with exterior, $680 complete
- 4 Bedroom House: $450 interior, $590 with exterior, $820 complete
```

#### Service 2: Move In Cleaning
```
Name: Move In Cleaning
Duration: 3-6 hours
Price: From $200 (typically 10-15% less than end of lease)
Description: Start fresh in a professionally cleaned home. Deep clean and sanitize before you unpack.

What's Included:
- Complete sanitization
- Kitchen deep clean
- Bathroom deep clean
- All rooms dusted and cleaned
- Windows
```

#### Service 3: Commercial Cleaning
```
Name: Commercial Cleaning
Duration: Varies
Price: From $80/visit (small office), $150/visit (medium), Custom (large)
Description: Keep your workplace clean, healthy, and professional.

What's Included:
- Workstation cleaning
- Kitchen/break room
- Bathroom sanitization
- Floor cleaning
- Rubbish removal
```

#### Service 4: Pre-sale Cleaning
```
Name: Pre-sale Cleaning
Duration: 3-6 hours
Price: From $300 (includes presentation package)
Description: Make your property shine for inspections and photos.

What's Included:
- Interior deep clean
- Window cleaning
- Garden tidying
- Presentation focus
```

#### Service 5: Gardening Services
```
Name: Gardening Services
Duration: 2-4 hours
Price: From $45/hour, or $60/hour for full maintenance
Description: Complete garden care and maintenance.

What's Included:
- Lawn mowing
- Edge trimming
- Weeding
- Garden bed maintenance
- Green waste removal
```

#### Service 6: Carpet Cleaning
```
Name: Carpet Cleaning
Duration: 2-4 hours
Price: From $50/room
Description: Deep steam cleaning for carpets and rugs.

What's Included:
- Pre-treatment
- Steam cleaning
- Deodorizing
- Fast drying
```

#### Service 7: Window Cleaning
```
Name: Window Cleaning
Duration: 2-4 hours
Price: From $8/window (inside & out)
Description: Crystal clear windows inside and out.

What's Included:
- Interior windows
- Exterior windows
- Window frames
- Window tracks
- Screens
```

#### Service 8: Minor Maintenance
```
Name: Minor Maintenance
Duration: 2+ hours
Price: $55/hour (1 hour minimum)
Description: Small repairs and handyman services.

What's Included:
- Picture hanging
- Minor painting
- Light fixtures
- Small repairs
- General handyman work
```

---

## 12. Post-Launch Maintenance

### Daily (First Week)
- [ ] Check Google Analytics
- [ ] Monitor form submissions
- [ ] Check booking notifications
- [ ] Verify backup completed
- [ ] Check for errors

### Weekly Ongoing
- [ ] Review analytics
- [ ] Check Search Console
- [ ] Test forms and booking
- [ ] Check for broken links
- [ ] Review security logs

### Monthly Ongoing
- [ ] Update WordPress core
- [ ] Update all plugins
- [ ] Update theme
- [ ] Run security scan
- [ ] Optimize database
- [ ] Review performance

### Quarterly
- [ ] Comprehensive security audit
- [ ] Full backup and download
- [ ] Content review and updates
- [ ] Performance optimization review
- [ ] SEO audit

---

## Quick Reference

### Key URLs
- WordPress Admin: https://[your-domain]/wp-admin
- Google Analytics: analytics.google.com
- Google Search Console: search.google.com/search-console
- PageSpeed Test: pagespeed.web.dev

### Brand Colors
- Primary (Orange): #FF9500
- Secondary (Blue): #0066CC
- Accent (Light Blue): #4DB8E8

### Support Resources
- WordPress Forums: wordpress.org/support
- Elementor Help: elementor.com/help
- Amelia Docs: wpamelia.com/documentation
- Rank Math KB: rankmath.com/kb

---

## Document References

For detailed content and additional information, see:
- **CONTENT_STRATEGY.md** - Complete page content
- **BUILD_GUIDE.md** - Step-by-step technical guide
- **WORDPRESS_RECOMMENDATIONS.md** - Plugin details
- **Materials/SELECTED_ILLUSTRATIONS.md** - Image resources

---

**Build Plan Version:** 1.0  
**Last Updated:** November 2025  
**Created For:** Merlin Property Services  
**Target Platform:** WordPress on IONOS Hosting

---

*This build plan consolidates requirements from all documentation to provide a single, actionable implementation guide.*
