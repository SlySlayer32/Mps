# AI Assistant Build Guide - Merlin Property Services Website

## Purpose
This guide is designed for AI assistants to build the Merlin Property Services WordPress website from scratch. It provides step-by-step instructions with specific commands, verification steps, and references to existing documentation.

---

## Prerequisites Check

Before starting, verify you have access to:
- [ ] WordPress hosting account (recommended: SiteGround or IONOS)
- [ ] Domain: merlinproperty.com.au (or alternative)
- [ ] FTP/SFTP credentials OR hosting control panel access
- [ ] Database credentials (if manual setup required)
- [ ] Business information (pricing, contact details, service areas)

**Reference Documents in Repository:**
- `../README.md` - Business requirements
- `../FINAL_RECOMMENDATIONS.md` - Complete strategy overview
- `../CONTENT_STRATEGY.md` - Page content and structure
- `../WORDPRESS_RECOMMENDATIONS.md` - Technical setup details
- `../SELECTED_ILLUSTRATIONS.md` - Image resources

---

## Phase 1: Foundation Setup (Week 1-2)

### Step 1.1: Domain and Hosting Setup

**Objective:** Get domain and hosting operational

**Actions:**
1. **Domain Registration** (if not already done)
   - Go to domain registrar (Namecheap, Cloudflare, or IONOS)
   - Register: merlinproperty.com.au
   - Cost: ~$15/year
   - Verification: Domain shows as registered in registrar dashboard

2. **Hosting Setup**
   - Option A: SiteGround (recommended)
     - Sign up at https://www.siteground.com/wordpress-hosting
     - Choose StartUp plan ($3.99-6.99/month)
     - Select Australian/Melbourne data center if available
   - Option B: IONOS (if already using)
     - Log into existing IONOS account
     - Verify WordPress hosting is available
     - Check plan includes: SSL, backups, adequate storage
   
3. **Connect Domain to Hosting**
   - Update nameservers at domain registrar to hosting provider's nameservers
   - Wait 24-48 hours for DNS propagation
   - Verification: Visit domain URL and see hosting provider's placeholder page

**Verification Checklist:**
- [ ] Domain registered and active
- [ ] Hosting account active
- [ ] Domain points to hosting (DNS propagated)
- [ ] Can access hosting control panel

---

### Step 1.2: WordPress Installation

**Objective:** Install WordPress core

**Actions:**
1. **Install WordPress via Hosting Control Panel**
   - SiteGround: Go to Site Tools → WordPress → Install & Manage → Install WordPress
   - IONOS: Go to WordPress Toolkit → Install WordPress
   - cPanel: Use Softaculous WordPress installer
   
2. **Configuration during installation:**
   ```
   Site Title: Merlin Property Services
   Admin Username: [Choose a secure username. DO NOT use "admin", the business name (e.g., "merlin", "merlinproperty"), the domain name, or common words. See note below.]
   Admin Password: [Use strong password, save in password manager]
   Admin Email: [Use business email]
   ```

   > **Note:** Avoid using easily guessable usernames such as:
   > - "admin"
   > - "administrator"
   > - "merlin"
   > - "merlinproperty"
   > - "merlinproperty.com.au"
   > - "test"
   > - Any part of your business or domain name
   > Instead, use a unique username that is not related to your business, domain, or common words.

3. **Access WordPress Admin**
   - URL: https://merlinproperty.com.au/wp-admin
   - Login with credentials created above
   
**Verification Checklist:**
- [ ] WordPress installed successfully
- [ ] Can access /wp-admin dashboard
- [ ] SSL certificate active (https:// works)
- [ ] Default "Hello World" post visible on frontend

---

### Step 1.3: Essential Security Setup

**Objective:** Secure WordPress installation immediately

**Actions:**
1. **Install Security Plugins**
   ```
   Dashboard → Plugins → Add New
   Search and Install:
   - Wordfence Security (activate)
   - Really Simple SSL (activate)
   - UpdraftPlus WordPress Backup Plugin (activate)
   ```

2. **Configure Wordfence**
   - Go to Wordfence → Dashboard
   - Run initial scan
   - Enable two-factor authentication for admin user
   - Enable login security (limit login attempts)

3. **Configure Really Simple SSL**
   - Activate the plugin
   - Click "Activate SSL" button
   - Verify all pages now load with https://

4. **Configure UpdraftPlus Backups**
   - Go to Settings → UpdraftPlus Backups
   - Click "Settings" tab
   - Set backup schedule: Daily (files and database)
   - Choose remote storage: Google Drive (recommended) or Dropbox
   - Connect to cloud storage account
   - Click "Save Changes"
   - Click "Backup Now" to test

**Verification Checklist:**
- [ ] Wordfence scan completed with no major issues
- [ ] Two-factor authentication enabled
- [ ] All pages load with https:// (SSL active)
- [ ] Backup completed successfully and stored in cloud
- [ ] Received backup notification email

---

### Step 1.4: Install Core Theme and Page Builder

**Objective:** Install Astra theme and Elementor page builder

**Actions:**
1. **Install Astra Theme**
   ```
   Dashboard → Appearance → Themes → Add New
   Search: "Astra"
   Click "Install" then "Activate"
   ```

2. **Install Elementor Page Builder**
   ```
   Dashboard → Plugins → Add New
   Search: "Elementor"
   Install "Elementor Page Builder" (by Elementor.com)
   Activate the plugin
   ```

3. **Basic Astra Configuration**
   - Go to Appearance → Customize
   - Set Site Identity:
     - Site Title: Merlin Property Services
     - Tagline: Professional Cleaning Services in Melbourne
     - Upload logo (if available)
     - Site Icon (favicon): 512×512px logo
   - Colors:
     - Primary Color: #FF9500 (orange/gold)
     - Link Color: #0066CC (blue)
   - Typography:
     - Body Font Size: 16px (for mobile readability)
   - Header:
     - Choose simple header layout
     - Add navigation menu placeholder
   - Footer:
     - Add copyright text: "© [Current Year] Merlin Property Services. All rights reserved."
   - Click "Publish"

4. **Elementor Initial Setup**
   - Go to Elementor → Settings
   - Click through setup wizard
   - Disable Elementor color schemes (use theme colors)
   - Set default page width: 1200px

**Verification Checklist:**
- [ ] Astra theme active
- [ ] Elementor plugin active
- [ ] Site displays with correct branding colors
- [ ] Logo/site title visible in header
- [ ] Can create new page with Elementor (test)

---

## Phase 2: Core Functionality (Week 2-3)

### Step 2.1: Install Essential Plugins

**Objective:** Add all required functionality plugins

**Actions:**
1. **Install SEO Plugin**
   ```
   Plugins → Add New → Search: "Rank Math SEO"
   Install and Activate
   ```
   
   **Configure Rank Math:**
   - Run setup wizard
   - Connect to Google Search Console (follow prompts)
   - Enable Local SEO module
   - Business Type: Local Business → Cleaning Service
   - Business Info:
     - Name: Merlin Property Services
     - Address: [Add Melbourne address]
     - Phone: [Add phone number]
     - Service Areas: [Add Melbourne suburbs]

2. **Install Forms Plugin**
   ```
   Plugins → Add New → Search: "WPForms"
   Install "WPForms Lite"
   Activate
   ```

3. **Install Booking System (CRITICAL)**
   ```
   Option A: Purchase Amelia ($59/year) - RECOMMENDED
   - Go to https://wpamelia.com/
   - Purchase license
   - Download plugin zip file
   - Upload: Plugins → Add New → Upload Plugin
   - Activate and enter license key
   
   Option B: Free Alternative (Limited features)
   - Search and install "Bookly Lite"
   - Activate
   ```

4. **Install Performance Plugins**
   ```
   Free Option:
   - Install "Autoptimize" (CSS/JS minification)
   - Install "ShortPixel Image Optimizer" (image compression)
   
   Paid Option (Better):
   - Purchase WP Rocket ($59/year)
   - Upload and activate
   ```

5. **Install Additional Utility Plugins**
   ```
   - WP Mail SMTP (ensure email delivery)
   - Redirection (manage redirects and 404s)
   - WP Google Maps (display service area)
   ```

**Verification Checklist:**
- [ ] All plugins installed and activated
- [ ] No plugin conflicts (check for error messages)
- [ ] Rank Math setup wizard completed
- [ ] Google Search Console connected
- [ ] WPForms can create test form
- [ ] Booking system (Amelia or Bookly) accessible

---

### Step 2.2: Configure Booking System (Amelia)

**Objective:** Set up online booking for all services

**If using Amelia (recommended):**

**Actions:**
1. **Configure Basic Settings**
   - Go to Amelia → Settings
   - Company Settings:
     - Name: Merlin Property Services
     - Address, Phone, Email
     - Currency: AUD ($)
     - Time zone: Melbourne/Sydney
   
2. **Add Services**
   ```
   Go to Amelia → Services → Add Service
   
   Service 1: End of Lease Cleaning
   - Duration: 4 hours (adjust as needed)
   - Price: [Insert actual price]
   - Description: [Copy from CONTENT_STRATEGY.md]
   - Max capacity: 1
   - Category: Cleaning Services
   
   Service 2: Move In Cleaning
   Service 3: Commercial Cleaning
   Service 4: Pre-sale Cleaning
   Service 5: Gardening Services
   Service 6: Carpet Cleaning
   Service 7: Window Cleaning
   Service 8: Minor Maintenance
   
   [Repeat for all 8 services]
   ```

3. **Add Employee (Yourself)**
   - Go to Amelia → Employees
   - Add your details as the service provider
   - Assign all services to this employee
   - Set working hours (e.g., Mon-Sat, 8am-6pm)

4. **Configure Notifications**
   - Amelia → Notifications
   - Enable email notifications for:
     - Booking confirmation (to customer)
     - Booking notification (to you)
     - Booking cancellation
     - Booking rescheduling
   - Customize email templates with branding

5. **Payment Settings** (Optional for launch)
   - Amelia → Settings → Payments
   - Later: Connect Stripe or PayPal
   - For now: Set to "On-site" payment

**Verification Checklist:**
- [ ] All 8 services added with correct details
- [ ] Employee account configured
- [ ] Working hours set
- [ ] Test booking: Create a booking and verify emails arrive
- [ ] Calendar displays available time slots
- [ ] Can cancel/reschedule test booking

---

### Step 2.3: Create Page Structure

**Objective:** Create all required pages

**Actions:**
1. **Create Pages via Dashboard**
   ```
   Pages → Add New
   
   Create these pages (use default editor first):
   1. Home (set as homepage later)
   2. About Us
   3. Contact
   4. Services (parent page)
   5. End of Lease Cleaning
   6. Move In Cleaning
   7. Commercial Cleaning
   8. Pre-sale Cleaning
   9. Gardening Services
   10. Carpet Cleaning
   11. Window Cleaning
   12. Minor Maintenance
   13. Privacy Policy (auto-generated by WordPress)
   ```

2. **Set Page Hierarchy**
   - Edit pages 5-12 (service pages)
   - Set "Parent" to "Services" page
   - This creates URL structure: /services/end-of-lease-cleaning/

3. **Configure Homepage**
   - Go to Settings → Reading
   - Set "Your homepage displays" to "A static page"
   - Homepage: Select "Home"
   - Posts page: Leave blank (no blog yet)
   - Save Changes

**Verification Checklist:**
- [ ] All 13 pages created
- [ ] Page hierarchy correct (Services as parent)
- [ ] Homepage set to "Home" page
- [ ] Can access all pages via URL
- [ ] Pages visible in Appearance → Menus

---

### Step 2.4: Create Navigation Menu

**Objective:** Build main navigation menu

**Actions:**
1. **Create Primary Menu**
   ```
   Appearance → Menus
   Click "Create a new menu"
   Menu Name: Primary Menu
   ```

2. **Add Menu Items**
   ```
   Add to menu (in this order):
   - Home
   - Services (with dropdown submenu)
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
   ```

3. **Assign Menu Location**
   - Check "Primary Menu" under Menu Settings
   - Save Menu

4. **Create Footer Menu** (Optional)
   - Create new menu: "Footer Menu"
   - Add items:
     - Privacy Policy
     - Contact
     - About Us

**Verification Checklist:**
- [ ] Primary menu displays in header
- [ ] Services dropdown works
- [ ] All menu links work correctly
- [ ] Mobile menu works (test on mobile/responsive mode)

---

## Phase 3: Design and Content (Week 3-5)

### Step 3.1: Download and Organize Illustrations

**Objective:** Gather all visual assets

**Actions:**
1. **Create Folder Structure in Media Library**
   ```
   Use Media Library Folders plugin OR organize manually:
   - hero-images/
   - service-cards/
   - icons/
   - backgrounds/
   ```

2. **Download Illustrations from Pixabay**
   - Reference: `../SELECTED_ILLUSTRATIONS.md` for specific links
   - Download 2 illustrations already identified (in repository)
   - Search and download illustrations for:
     - Hero section (landing page)
     - Each service card (8 illustrations)
     - Icons for features/benefits
     - Background patterns
   
   **Search Terms:**
   - "cleaning service illustration"
   - "house cleaning vector"
   - "gardening illustration"
   - "maintenance service vector"
   - Use filters: Vector only, Free for commercial use

3. **Optimize Images Before Upload**
   ```
   Using online tools:
   - TinyPNG.com (compress without losing quality)
   - Pixlr.com (resize if needed)
   
   Target sizes:
   - Hero images: 1920×1080px max
   - Service cards: 800×600px max
   - Icons: 512×512px max
   ```

4. **Upload to WordPress**
   - Media → Add New
   - Drag and drop all optimized images
   - Add descriptive ALT text for each (SEO + accessibility)
   - Example: "Professional end of lease cleaning service illustration"

**Verification Checklist:**
- [ ] All required illustrations downloaded
- [ ] Images optimized (each under 200KB)
- [ ] Images uploaded to Media Library
- [ ] ALT text added to all images
- [ ] Images organized in folders/categories

---

### Step 3.2: Design Homepage with Elementor

**Objective:** Build engaging homepage with card-based layout

**Reference:** `../CONTENT_STRATEGY.md` for content
**Reference:** `../README.md` for design requirements

**Actions:**
1. **Edit Home Page with Elementor**
   - Go to Pages → Home → Edit with Elementor

2. **Create Header Section**
   ```
   Add Section → 1 Column
   
   Add Heading Widget:
   - Text: "Merlin Property Services"
   - Tag: H1
   - Color: #FF9500 (orange)
   - Alignment: Center
   
   Add Text Editor Widget:
   - Text: "Professional Cleaning Services in Melbourne"
   - Font size: 24px
   - Alignment: Center
   - Color: #333333
   ```

3. **Create Hero Section**
   ```
   Add Section → 2 Columns (50/50)
   
   Left Column:
   - Heading: "Your Complete Move-Out Solution"
   - Text: Brief description (2-3 sentences)
   - Button: "Book Now" → Links to contact/booking form
   - Button color: Primary (#FF9500)
   
   Right Column:
   - Image: Upload hero illustration
   - Animation: Fade In (optional)
   ```

4. **Create Services Section (Card Layout)**
   ```
   Add Section → 4 Columns (cards will be 25% width each, responsive)
   Heading above section: "Our Services"
   
   For each service (8 total, 2 rows of 4):
   
   Add Icon Box Widget (or Image Box):
   - Image: Service illustration
   - Title: Service name (e.g., "End of Lease Cleaning")
   - Description: 1-2 sentence summary
   - Link: URL to service page (/services/end-of-lease-cleaning/)
   - Styling:
     - Background: White or light grey (#F5F5F5)
     - Border: 1px solid #DDDDDD
     - Padding: 20px
     - Hover effect: Lift up (translateY: -5px)
     - Border color on hover: #FF9500
   
   Repeat for all 8 services:
   1. End of Lease Cleaning
   2. Move In Cleaning
   3. Commercial Cleaning
   4. Pre-sale Cleaning
   5. Gardening Services
   6. Carpet Cleaning
   7. Window Cleaning
   8. Minor Maintenance
   ```

5. **Create Why Choose Us Section**
   ```
   Add Section → 3 Columns
   
   Heading: "Why Choose Merlin Property Services?"
   
   Column 1: "Comprehensive Service"
   - Icon or small illustration
   - Text: Handle entire move-out process
   
   Column 2: "100% Bond Back Guarantee"
   - Icon or small illustration
   - Text: (For end of lease cleaning)
   
   Column 3: "Fully Insured"
   - Icon or small illustration
   - Text: Professional and reliable
   ```

6. **Create Call-to-Action Section**
   ```
   Add Section → 1 Column
   Background: Primary color (#FF9500) or gradient
   
   Heading: "Ready to Book?"
   Text: "Contact us today for a free quote"
   Button: "Get a Quote" → Links to contact page
   Button styling: White background, primary text color
   ```

7. **Set Responsive Settings**
   - Click bottom-left "Responsive Mode" icon
   - Test on Tablet and Mobile views
   - Adjust:
     - Service cards stack in 2 columns on tablet, 1 column on mobile
     - Font sizes reduce appropriately
     - Padding/margins adjust for mobile

8. **Publish**
   - Click "Publish" or "Update" button
   - View page to verify design

**Verification Checklist:**
- [ ] Homepage layout matches requirements (elegant, card-based)
- [ ] All 8 service cards visible and clickable
- [ ] Links work correctly
- [ ] Mobile responsive (test on phone)
- [ ] Images load properly
- [ ] Buttons have hover effects
- [ ] No "template feel" (custom design)

---

### Step 3.3: Design Service Pages

**Objective:** Create detailed service pages with pricing

**Reference:** `../CONTENT_STRATEGY.md` - See detailed End of Lease Cleaning example

**Template Structure for Each Service Page:**

**Actions:**
1. **Edit Service Page with Elementor**
   - Example: End of Lease Cleaning page
   - Pages → End of Lease Cleaning → Edit with Elementor

2. **Hero Section**
   ```
   Section → 2 Columns
   
   Left: 
   - H1: "End of Lease Cleaning"
   - Subheading: "100% Bond Back Guarantee"
   - Text: 2-3 sentence overview
   - Badges/Icons: "Fully Insured" "Professional Team" "Same Day Available"
   
   Right:
   - Service illustration image
   ```

3. **Key Benefits Section**
   ```
   Section → 1 Column
   Heading: "What's Included"
   
   Add Icon List Widget:
   ✓ All rooms cleaned top to bottom
   ✓ Kitchen: Oven, stovetop, cupboards, appliances
   ✓ Bathrooms: Tiles, grout, fixtures, mirrors
   ✓ Windows: Inside and outside (where accessible)
   ✓ Carpets: Vacuumed or steam cleaned (add-on)
   ✓ Walls: Spot cleaning, mark removal
   ✓ Final inspection ready
   
   [Customize list per service from CONTENT_STRATEGY.md]
   ```

4. **Pricing Table**
   ```
   Section → 1 Column
   Heading: "Pricing"
   
   ⚠️ IMPORTANT: Replace all "TBD - Call for Quote" placeholders with actual pricing 
   when provided by business owner before launching the website.
   
   Add Pricing Table Widget (Elementor) or create custom table:
   
   Example structure:
   | Property Size | Price | Details |
   |---------------|-------|---------|
   | 1 Bedroom | TBD - Call for Quote | Includes [specifics] |
   | 2 Bedroom | TBD - Call for Quote | Includes [specifics] |
   | 3 Bedroom | TBD - Call for Quote | Includes [specifics] |
   | 4+ Bedroom | Custom Quote Required | Contact us |
   
   Add-ons:
   - Carpet steam cleaning: TBD - Call for Quote per room
   - Garage/shed cleaning: TBD - Call for Quote
   - Wall washing: TBD - Call for Quote per room
   ```

5. **Guarantee Section** (For End of Lease)
   ```
   Section → 1 Column
   Background color: Light blue (#E8F4F8)
   
   Heading: "Our 100% Bond Back Guarantee"
   Text: 
   "We guarantee your bond back or we'll return to clean again 
   for free. If the property manager finds any issues with our 
   cleaning, we'll fix it at no extra charge."
   
   Icon: Badge or shield icon
   ```

6. **Booking Section**
   ```
   Section → 1 Column
   Heading: "Check Availability & Book Now"
   
   Add Shortcode Widget:
   Insert Amelia booking shortcode:
   [ameliabooking service=1]
   
   (Service ID will depend on your Amelia setup)
   
   OR add button that links to contact/booking page
   ```

7. **FAQ Section** (Optional but recommended)
   ```
   Section → 1 Column
   Heading: "Frequently Asked Questions"
   
   Add Toggle/Accordion Widget:
   
   Q: How long does end of lease cleaning take?
   A: Typically 4-8 hours depending on property size...
   
   Q: Do I need to be present?
   A: No, as long as we have access...
   
   Q: What if my bond isn't returned?
   A: We'll return to clean again for free...
   
   [Add 5-8 relevant FAQs per service]
   ```

8. **Call-to-Action**
   ```
   Section → 1 Column
   Background: Primary color
   
   Heading: "Ready to Book?"
   Button: "Get a Free Quote" or "Book Now"
   ```

9. **Repeat for All Service Pages**
   - Copy the End of Lease page structure
   - Duplicate page in WordPress
   - Update content specific to each service
   - Adjust pricing tables
   - Update service-specific inclusions

**Verification Checklist:**
- [ ] All 8 service pages designed
- [ ] Each page has clear structure
- [ ] Pricing tables visible (even if TBD)
- [ ] Booking integration works
- [ ] Images appropriate to service
- [ ] Mobile responsive
- [ ] All links work

---

### Step 3.4: Create About and Contact Pages

**Objective:** Complete remaining essential pages

**About Page:**

**Actions:**
1. **Edit About Us Page with Elementor**
   
   **Structure:**
   ```
   Section 1: Introduction
   - Heading: "About Merlin Property Services"
   - Text: Your story, why you started the business
   - Image: Professional photo or illustration
   
   Section 2: What Makes Us Different
   - Heading: "Why Choose Us"
   - 3 Columns:
     - Comprehensive Services
     - Professional & Insured
     - Customer-Focused
   
   Section 3: Services Overview
   - List of all services
   - Brief explanation of multi-service approach
   
   Section 4: Call-to-Action
   - "Get in Touch"
   - Button to Contact page
   ```

**Contact Page:**

**Actions:**
2. **Edit Contact Page with Elementor**
   
   **Structure:**
   ```
   Section 1: Contact Information
   - Heading: "Get in Touch"
   - Text: "Ready to book or have questions?"
   
   3 Columns:
   Column 1 - Phone:
   - Icon: Phone
   - Text: [Your phone number]
   - Make clickable: tel:[phone]
   
   Column 2 - Email:
   - Icon: Email
   - Text: info@merlinproperty.com.au
   - Make clickable: mailto:
   
   Column 3 - Service Area:
   - Icon: Location
   - Text: "Melbourne & Surrounding Suburbs"
   
   Section 2: Contact Form
   Add WPForms shortcode:
   - Create form first in WPForms
   - Fields: Name, Email, Phone, Service Needed, Message
   - Insert shortcode: [wpforms id="X"]
   
   Section 3: Business Hours
   - Monday-Friday: 8am-6pm
   - Saturday: 9am-5pm
   - Sunday: Closed (or by appointment)
   
   Section 4: Service Area Map (Optional)
   - Add WP Google Maps shortcode
   - Or list Melbourne suburbs you service
   ```

3. **Create Contact Form in WPForms**
   ```
   WPForms → Add New
   Template: "Simple Contact Form"
   
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
   6. Message (paragraph text)
   
   Settings:
   - Notification Email: [Your business email]
   - Confirmation Message: "Thanks! We'll contact you within 24 hours."
   - Enable anti-spam protection
   
   Save and copy shortcode
   ```

**Verification Checklist:**
- [ ] About page tells your story
- [ ] Contact information is accurate and clickable
- [ ] Contact form works (test it)
- [ ] Receive form submission email
- [ ] Customer receives confirmation
- [ ] Service area information clear

---

## Phase 4: SEO and Optimization (Week 5-6)

### Step 4.1: On-Page SEO Optimization

**Objective:** Optimize all pages for search engines

**Actions:**
1. **Optimize Homepage**
   ```
   Edit page → Click "Rank Math SEO" box
   
   Focus Keyword: "cleaning services Melbourne"
   Additional Keywords: "property cleaning", "bond cleaning"
   
   SEO Title: "Professional Cleaning Services Melbourne | Merlin Property Services"
   Meta Description: "Expert cleaning services in Melbourne. End of lease, 
   commercial, gardening & more. 100% bond back guarantee. Book online today."
   
   Check Rank Math score: Aim for 80+
   ```

2. **Optimize Each Service Page**
   ```
   Example: End of Lease Cleaning page
   
   Focus Keyword: "end of lease cleaning Melbourne"
   
   SEO Title: "End of Lease Cleaning Melbourne | 100% Bond Back Guarantee"
   Meta Description: "Professional end of lease cleaning in Melbourne. 100% 
   bond back guarantee or we return for free. Book online. Fully insured."
   
   Repeat for all service pages with appropriate keywords:
   - "move in cleaning Melbourne"
   - "commercial cleaning Melbourne"
   - "pre-sale cleaning Melbourne"
   - "gardening services Melbourne"
   - "carpet cleaning Melbourne"
   - "window cleaning Melbourne"
   - "maintenance services Melbourne"
   ```

3. **Add Schema Markup**
   ```
   Rank Math → Schema Markup
   
   For Homepage:
   - Schema Type: Local Business
   - Business Name: Merlin Property Services
   - Business Type: House Cleaning Service
   - Address: [Melbourne address]
   - Phone: [Your phone]
   - Opening Hours: [Your hours]
   - Price Range: $$
   
   For Service Pages:
   - Schema Type: Service
   - Service Name: [e.g., "End of Lease Cleaning"]
   - Provider: Merlin Property Services
   - Area Served: Melbourne, Victoria
   ```

4. **Image SEO**
   ```
   Go through all uploaded images:
   Media → Library → Edit each image
   
   - File name: descriptive (end-of-lease-cleaning.jpg)
   - ALT text: "Professional end of lease cleaning service in Melbourne"
   - Title: "End of Lease Cleaning"
   - Description: Brief description
   - Caption: (optional, displays on page)
   ```

5. **Internal Linking**
   ```
   Add internal links throughout content:
   - Homepage links to service pages
   - Service pages link back to homepage
   - Service pages cross-link to related services
   - About page links to services
   
   Example: In "End of Lease" page, mention and link to 
   "Carpet Cleaning" and "Gardening Services"
   ```

**Verification Checklist:**
- [ ] All pages have unique SEO titles
- [ ] All pages have meta descriptions (under 160 characters)
- [ ] Focus keywords set for each page
- [ ] Rank Math score 80+ on all main pages
- [ ] Schema markup configured
- [ ] All images have ALT text
- [ ] Internal linking structure in place

---

### Step 4.2: Performance Optimization

**Objective:** Achieve fast page load speeds

**Actions:**
1. **Configure Caching**
   ```
   If using WP Rocket:
   - Settings → WP Rocket
   - Cache: Enable cache (auto-enabled)
   - File Optimization: 
     - Minify CSS
     - Combine CSS
     - Minify JavaScript (test for compatibility)
   - Media:
     - Enable Lazy Load for images
     - Enable Lazy Load for iframes
   - Preload: Enable preload cache
   - Database: Schedule weekly cleanup
   - CDN: Enable if using CDN
   
   If using free alternatives:
   - Autoptimize: Enable CSS/JS optimization
   - Enable browser caching via .htaccess
   - Use WP Super Cache plugin
   ```

2. **Optimize Images**
   ```
   If using ShortPixel:
   - Settings → ShortPixel
   - Compression: Lossy (best for web)
   - Enable WebP conversion
   - Click "Bulk Optimize" to optimize all existing images
   
   If using Imagify:
   - Similar settings
   - Run bulk optimization
   ```

3. **Database Optimization**
   ```
   Install WP-Optimize (free plugin)
   Or use WP Rocket's database optimization
   
   Tasks:
   - Clean post revisions
   - Remove spam comments
   - Clean transients
   - Optimize database tables
   - Schedule weekly automatic cleanup
   ```

4. **Reduce External HTTP Requests**
   ```
   - Limit number of fonts loaded (use max 2 font families)
   - Remove unnecessary plugins
   - Combine CSS/JS files (WP Rocket or Autoptimize)
   - Use system fonts where possible
   ```

5. **Test Performance**
   ```
   Run speed tests:
   1. Google PageSpeed Insights: https://pagespeed.web.dev/
      - Test homepage
      - Aim for 90+ score on mobile and desktop
   
   2. GTmetrix: https://gtmetrix.com/
      - Test homepage
      - Aim for A grade
      - Load time under 3 seconds
   
   3. Pingdom: https://tools.pingdom.com/
      - Test from Sydney/Australia location
      - Load time under 2 seconds ideal
   ```

**Verification Checklist:**
- [ ] Caching enabled and working
- [ ] All images optimized (check file sizes)
- [ ] Database optimized
- [ ] PageSpeed score 80+ on mobile
- [ ] PageSpeed score 90+ on desktop
- [ ] Page load time under 3 seconds
- [ ] No render-blocking resources (or minimized)

---

### Step 4.3: Google Analytics and Search Console Setup

**Objective:** Enable tracking and monitoring

**Actions:**
1. **Set Up Google Analytics 4**
   ```
   1. Go to https://analytics.google.com/
   2. Create account if needed
   3. Create property: "Merlin Property Services"
   4. Select platform: Web
   5. Add website URL and name
   6. Copy Measurement ID (G-XXXXXXXXXX)
   
   In WordPress:
   - Install Site Kit by Google plugin (free, official)
   - Or use MonsterInsights
   - Connect to Google account
   - Enter Measurement ID
   - Verify tracking is working
   ```

2. **Set Up Google Search Console**
   ```
   1. Go to https://search.google.com/search-console
   2. Add property: https://merlinproperty.com.au
   3. Verify ownership:
      - Use DNS verification OR
      - HTML tag verification (Site Kit plugin helps)
   
   After verification:
   - Submit XML sitemap (created by Rank Math)
   - URL: https://merlinproperty.com.au/sitemap_index.xml
   ```

3. **Set Up Google My Business**
   ```
   1. Go to https://www.google.com/business/
   2. Create/claim listing
   3. Business info:
      - Name: Merlin Property Services
      - Category: Cleaning Service, House Cleaning Service
      - Address: [Your Melbourne address]
      - Service area: Add Melbourne suburbs
      - Phone: [Your phone]
      - Website: https://merlinproperty.com.au
      - Hours: [Your business hours]
   4. Verify business:
      - Usually via postcard to address
      - Or instant verification if eligible
   5. Add photos:
      - Logo
      - Service photos
      - Before/after (if available)
   6. Add services:
      - List all 8 services with brief descriptions
   ```

4. **Configure Goal Tracking**
   ```
   In Google Analytics:
   - Create events/conversions for:
     - Form submissions (WPForms)
     - Booking completions (Amelia)
     - Phone number clicks
     - Email clicks
   
   In Rank Math:
   - Enable Analytics module
   - Connect to Google Analytics
   - View stats in WordPress dashboard
   ```

**Verification Checklist:**
- [ ] Google Analytics tracking code installed
- [ ] Can see real-time visitors in GA dashboard
- [ ] Google Search Console verified
- [ ] Sitemap submitted to Search Console
- [ ] Google My Business listing created
- [ ] GMB listing verified (or verification in progress)
- [ ] Goal tracking configured

---

### Step 4.4: Cookie Consent Setup

**Objective:** Implement cookie consent for GDPR compliance (required since Google Analytics uses cookies)

**Actions:**
1. **Install Cookie Consent Plugin**
   ```
   Plugins → Add New
   
   Recommended Options:
   
   Option 1: CookieYes (Free version recommended)
   - Search: "CookieYes"
   - Install and activate
   
   Option 2: GDPR Cookie Consent (Alternative)
   - Search: "GDPR Cookie Consent"
   - Install and activate
   ```

2. **Configure CookieYes (if chosen)**
   ```
   CookieYes → Cookie Banner
   
   Basic Settings:
   - Cookie Banner: Enable
   - Position: Bottom (recommended)
   - Design: Choose simple, clean design matching your brand colors
   
   Cookie Categories:
   - Necessary: Always enabled (no consent needed)
   - Analytics: Enable (Google Analytics)
   - Enable "Do not track" support
   
   Message Text (example):
   "We use cookies to improve your experience on our website. 
   By continuing to use this site, you accept our use of cookies."
   
   Buttons:
   - Accept: "Accept All"
   - Reject: "Reject" (optional but recommended)
   - Settings: "Cookie Settings"
   
   Advanced Settings:
   - Auto-block Google Analytics until consent
   - Enable consent log (recommended for compliance)
   - Set cookie expiry: 365 days
   ```

3. **Configure GDPR Cookie Consent (if chosen)**
   ```
   GDPR Cookie Consent → Settings
   
   General Tab:
   - Enable cookie consent
   - Choose banner position: Bottom
   - Select button action: Close on accept
   
   Cookie Settings:
   - Add Google Analytics to cookie list
   - Category: Analytics
   - Enable script blocking
   
   Customize:
   - Adjust colors to match brand (#FF9500, #0066CC)
   - Set button text: "Accept", "Reject", "Settings"
   ```

4. **Test Cookie Consent**
   ```
   1. Clear browser cookies
   2. Visit website in incognito/private mode
   3. Verify cookie banner appears on first visit
   4. Test "Accept" button - banner should disappear
   5. Verify Google Analytics tracking starts after acceptance
   6. Test "Reject" button - analytics should be blocked
   7. Check cookie settings modal works
   ```

5. **Update Privacy Policy**
   ```
   Pages → Privacy Policy → Edit
   
   Add section about cookies:
   - Types of cookies used (Necessary, Analytics)
   - Purpose of each cookie type
   - How to manage cookie preferences
   - Link to cookie settings page/modal
   - List Google Analytics specifically
   ```

**Verification Checklist:**
- [ ] Cookie consent plugin installed and activated
- [ ] Cookie banner displays on first visit
- [ ] Accept button works and stores consent
- [ ] Reject button works and blocks analytics
- [ ] Cookie settings modal accessible
- [ ] Google Analytics blocked until consent given
- [ ] Privacy Policy updated with cookie information
- [ ] Banner design matches website branding

---

## Phase 5: Testing and Launch Prep (Week 6-7)

### Step 5.1: Comprehensive Testing

**Objective:** Test all functionality before launch

**Actions:**
1. **Functionality Testing**
   ```
   Test Checklist:
   
   Navigation:
   - [ ] All menu items work
   - [ ] Service dropdown displays all services
   - [ ] Footer menu works
   - [ ] Breadcrumbs display correctly (if enabled)
   
   Forms:
   - [ ] Contact form submits successfully
   - [ ] Receive notification email
   - [ ] Customer receives confirmation email
   - [ ] Form validation works (try submitting empty form)
   - [ ] Spam protection active
   
   Booking System:
   - [ ] Can view available time slots
   - [ ] Can select service
   - [ ] Can select date/time
   - [ ] Can enter customer details
   - [ ] Booking confirmation works
   - [ ] Receive booking notification email
   - [ ] Booking appears in Amelia dashboard
   - [ ] Can cancel booking
   - [ ] Can reschedule booking
   
   Links:
   - [ ] All internal links work
   - [ ] All service card links work
   - [ ] All buttons work
   - [ ] Phone number links work (click-to-call)
   - [ ] Email links work (mailto:)
   - [ ] No 404 errors (check Redirection plugin dashboard)
   ```

2. **Mobile Responsiveness Testing**
   ```
   Test on multiple devices/screen sizes:
   
   Desktop (1920×1080):
   - [ ] Layout looks good
   - [ ] Images display properly
   - [ ] No horizontal scrolling
   
   Laptop (1366×768):
   - [ ] Layout adapts correctly
   - [ ] All content visible
   
   Tablet (768×1024):
   - [ ] Service cards stack in 2 columns
   - [ ] Navigation collapses to hamburger menu
   - [ ] Forms display correctly
   
   Mobile (375×667):
   - [ ] Service cards stack in 1 column
   - [ ] Text is readable (minimum 16px)
   - [ ] Buttons are tap-friendly (minimum 44px)
   - [ ] Images scale appropriately
   - [ ] No elements too small to tap
   
   Tools:
   - Chrome DevTools responsive mode
   - Actual phone/tablet testing
   - Google Mobile-Friendly Test: https://search.google.com/test/mobile-friendly
   ```

3. **Browser Compatibility Testing**
   ```
   Test on major browsers:
   - [ ] Chrome (latest version)
   - [ ] Safari (latest version)
   - [ ] Firefox (latest version)
   - [ ] Edge (latest version)
   - [ ] Mobile Safari (iPhone)
   - [ ] Mobile Chrome (Android)
   
   Check:
   - Layout consistency
   - Font rendering
   - Form submission
   - JavaScript functionality
   - CSS styling
   ```

4. **Accessibility Testing**
   ```
   Use WAVE Tool: https://wave.webaim.org/
   
   Check:
   - [ ] All images have alt text
   - [ ] Color contrast sufficient (4.5:1 for text)
   - [ ] Heading hierarchy correct (H1 → H2 → H3)
   - [ ] Forms have proper labels
   - [ ] Links have descriptive text (not "click here")
   - [ ] Keyboard navigation works
   - [ ] Focus indicators visible
   - [ ] No auto-playing content
   
   Run through site using only keyboard (Tab, Enter, Arrow keys)
   ```

5. **Content Review**
   ```
   Proofread all content:
   - [ ] No spelling errors
   - [ ] No grammatical errors
   - [ ] Consistent terminology
   - [ ] Correct business name everywhere
   - [ ] Correct contact information
   - [ ] Pricing accurate (or marked as TBD)
   - [ ] Service descriptions match
   - [ ] Professional tone throughout
   ```

6. **Security Testing**
   ```
   Wordfence Scan:
   - Run full security scan
   - Fix any high-priority issues
   - Review login security settings
   
   SSL Certificate:
   - Verify https:// works on all pages
   - Check for mixed content warnings
   - Use SSL checker: https://www.sslshopper.com/ssl-checker.html
   
   Login Security:
   - Test two-factor authentication
   - Verify login attempts are limited
   - Check that admin user has strong password
   ```

**Verification Checklist:**
- [ ] All functionality tests pass
- [ ] Mobile responsive on all devices
- [ ] Works on all major browsers
- [ ] Accessibility score good (WAVE)
- [ ] Content proofread and error-free
- [ ] Security scan clean
- [ ] SSL certificate valid

---

### Step 5.2: Pre-Launch Checklist

**Objective:** Final preparations before going live

**Actions:**
1. **Legal and Compliance**
   ```
   - [ ] Privacy Policy page complete and accessible
   - [ ] Cookie consent notice active (if using cookies)
   - [ ] Terms of Service page (optional but recommended)
   - [ ] Disclaimer about pricing (if applicable)
   - [ ] Business insurance valid and information accurate
   ```

2. **SEO Pre-Launch**
   ```
   - [ ] Remove "noindex" if set (Settings → Reading → Discourage search engines)
   - [ ] Verify robots.txt allows crawling
   - [ ] XML sitemap accessible: /sitemap_index.xml
   - [ ] All pages indexed or ready for indexing
   - [ ] Google Search Console verified
   - [ ] Google Analytics tracking active
   ```

3. **Backup Before Launch**
   ```
   - [ ] Create full backup (UpdraftPlus → Backup Now)
   - [ ] Download backup to local computer
   - [ ] Verify backup can be restored (test if possible)
   - [ ] Document database name, username, hosting details
   ```

4. **Performance Check**
   ```
   - [ ] Run final PageSpeed test
   - [ ] Clear all caches
   - [ ] Test page load speed
   - [ ] Verify CDN active (if using)
   ```

5. **Pricing Verification** ⚠️
   ```
   CRITICAL: Verify all pricing before launch
   - [ ] Review all 8 service pages for pricing placeholders
   - [ ] Confirm "TBD - Call for Quote" has been replaced with actual prices
   - [ ] Verify pricing accuracy with business owner
   - [ ] Check pricing tables display correctly on mobile
   - [ ] Ensure pricing matches any printed materials or quotes
   - [ ] Add-on pricing is complete and accurate
   - [ ] Booking system prices (if applicable) match service pages
   
   ⚠️ Launching with "TBD" or placeholder pricing can harm credibility.
   If actual pricing not yet available, consider delaying launch or using
   "Contact for Quote" with prominent contact information.
   ```

6. **Contact Information Verification**
   ```
   Triple-check all contact info is correct:
   - [ ] Phone number on Contact page
   - [ ] Phone number in footer
   - [ ] Email address on Contact page
   - [ ] Email address in footer
   - [ ] Business address (if displayed)
   - [ ] Email notification settings
   - [ ] Booking notification emails
   ```

7. **Social Media Preparation**
   ```
   - [ ] Add social media links if you have accounts
   - [ ] Prepare launch announcement posts
   - [ ] Ensure social sharing works (Open Graph tags)
   - [ ] Test social media preview: Facebook Debugger
   ```

**Verification Checklist:**
- [ ] All legal pages in place
- [ ] SEO settings correct for indexing
- [ ] Full backup completed and verified
- [ ] Performance optimized
- [ ] All pricing verified and placeholder text removed
- [ ] Contact information accurate everywhere
- [ ] Social media prepared

---

### Step 5.3: Launch

**Objective:** Go live with the website

**Actions:**
1. **Enable Search Engine Indexing**
   ```
   Settings → Reading
   - Uncheck "Discourage search engines from indexing this site"
   - Save Changes
   ```

2. **Submit to Google**
   ```
   Google Search Console:
   - Request indexing for homepage
   - Request indexing for main service pages
   - Monitor indexing status over next few days
   ```

3. **Announcement**
   ```
   - Announce on social media (if applicable)
   - Update Google My Business with website link
   - Email existing customers (if applicable)
   - Update email signatures with website link
   ```

4. **Monitor First 24 Hours**
   ```
   Check:
   - [ ] Google Analytics showing traffic
   - [ ] No errors in browser console
   - [ ] Forms receiving test submissions
   - [ ] Booking system working
   - [ ] No downtime
   - [ ] Server logs for errors (hosting control panel)
   ```

**Launch Complete!**

---

## Phase 6: Post-Launch Maintenance

### Step 6.1: Daily Tasks (First Week)

**Actions:**
- [ ] Check Google Analytics for traffic
- [ ] Monitor form submissions
- [ ] Check booking notifications
- [ ] Review Wordfence security alerts
- [ ] Verify backup completed successfully
- [ ] Test website accessibility

---

### Step 6.2: Weekly Tasks

**Actions:**
- [ ] Review analytics (traffic sources, popular pages)
- [ ] Check Google Search Console for issues
- [ ] Test contact form and booking system
- [ ] Check for broken links (Redirection plugin)
- [ ] Review security scan results
- [ ] Update content if needed
- [ ] Respond to any contact form inquiries

---

### Step 6.3: Monthly Tasks

**Actions:**
- [ ] Update WordPress core (if updates available)
- [ ] Update all plugins (after reading changelogs)
- [ ] Update theme (if updates available)
- [ ] Review and optimize performance
- [ ] Run full security scan
- [ ] Review analytics and adjust strategy
- [ ] Check and fix any SEO issues (Rank Math)
- [ ] Optimize database (WP-Optimize)
- [ ] Review and update pricing if needed
- [ ] Test all forms and booking system

---

### Step 6.4: Quarterly Tasks

**Actions:**
- [ ] Comprehensive security audit
- [ ] Full website backup and offsite storage
- [ ] Review and update content
- [ ] Update service descriptions if needed
- [ ] Review and update images
- [ ] Check for outdated plugins and replace if necessary
- [ ] Performance optimization review
- [ ] SEO audit (keyword rankings, competition)
- [ ] Review and update legal pages
- [ ] Consider new features or improvements

---

## Troubleshooting Common Issues

### Issue: Plugin Conflicts

**Symptoms:** White screen, errors, features not working

**Solutions:**
1. Deactivate all plugins
2. Reactivate one by one to identify conflict
3. Check plugin compatibility with WordPress version
4. Look for updates or alternatives
5. Contact plugin support

---

### Issue: Slow Performance

**Symptoms:** Page load over 5 seconds, poor PageSpeed score

**Solutions:**
1. Check image sizes (optimize/compress)
2. Enable caching (WP Rocket or alternative)
3. Minimize plugins (deactivate unnecessary)
4. Use CDN
5. Upgrade hosting if consistently slow
6. Check for heavy themes/page builder elements

---

### Issue: Form Submissions Not Received

**Symptoms:** Form appears to submit but no email arrives

**Solutions:**
1. Check spam folder
2. Verify notification email settings in WPForms
3. Install and configure WP Mail SMTP
4. Test with different email address
5. Check hosting email limits
6. Use transactional email service (SendGrid, Mailgun)

---

### Issue: Booking System Not Working

**Symptoms:** Can't select dates, bookings don't save

**Solutions:**
1. Clear browser cache
2. Clear WordPress cache
3. Check Amelia settings (time zone, working hours)
4. Verify employee assigned to services
5. Check for JavaScript errors (browser console)
6. Ensure shortcode correct
7. Contact Amelia support

---

### Issue: Mobile Layout Broken

**Symptoms:** Layout doesn't display correctly on mobile

**Solutions:**
1. Check Elementor responsive settings
2. Verify breakpoints set correctly
3. Test individual sections in responsive mode
4. Check for fixed width elements
5. Review custom CSS (if any)
6. Clear cache and test again

---

### Issue: Security Warnings

**Symptoms:** Wordfence alerts, Google warnings

**Solutions:**
1. Run full Wordfence scan immediately
2. Review and address all findings
3. Change all passwords (WordPress, hosting, FTP)
4. Update all plugins and themes
5. Check for unauthorized users (Users → All Users)
6. Restore from backup if compromised
7. Contact hosting support if severe

---

## Important Resources

### Documentation References
- Main strategy: `../FINAL_RECOMMENDATIONS.md`
- Content templates: `../CONTENT_STRATEGY.md`
- Technical details: `../WORDPRESS_RECOMMENDATIONS.md`
- Visual assets: `../SELECTED_ILLUSTRATIONS.md`

### Essential Links
- WordPress Codex: https://codex.wordpress.org/
- Elementor Docs: https://elementor.com/help/
- Amelia Docs: https://wpamelia.com/documentation/
- Rank Math KB: https://rankmath.com/kb/
- WPForms Docs: https://wpforms.com/docs/

### Support Channels
- WordPress Forums: https://wordpress.org/support/
- Elementor Community: https://www.facebook.com/groups/Elementors
- Plugin-specific support: Check plugin page on WordPress.org

### Learning Resources
- WPBeginner: https://www.wpbeginner.com/
- YouTube: WPCrafter, Darrel Wilson
- Elementor Academy: https://elementor.com/academy/

---

## Success Metrics

Track these KPIs to measure success:

### Month 1 Targets:
- 100+ visitors
- 5+ form submissions
- 2+ bookings
- PageSpeed score 85+
- All pages indexed by Google

### Month 3 Targets:
- 500+ visitors/month
- 20+ form submissions
- 10+ bookings
- Appearing in local search results
- Google My Business views: 100+

### Month 6 Targets:
- 1000+ visitors/month
- 50+ form submissions
- 20+ bookings
- First page Google rankings for local keywords
- Return customer bookings

---

## Completion Checklist

Before considering the build complete, verify:

**Foundation:**
- [ ] WordPress installed and secured
- [ ] Theme and page builder active
- [ ] All essential plugins installed
- [ ] SSL certificate active
- [ ] Backups configured

**Content:**
- [ ] All pages created (13+ pages)
- [ ] All service pages complete with content
- [ ] Images uploaded and optimized
- [ ] Navigation menus working
- [ ] Contact information everywhere correct

**Functionality:**
- [ ] Contact forms working
- [ ] Booking system operational
- [ ] Email notifications working
- [ ] Mobile responsive
- [ ] Cross-browser compatible

**SEO:**
- [ ] All pages optimized
- [ ] Schema markup added
- [ ] Google Analytics active
- [ ] Google Search Console connected
- [ ] Google My Business listing live
- [ ] Sitemap submitted

**Performance:**
- [ ] PageSpeed score 80+
- [ ] Images optimized
- [ ] Caching enabled
- [ ] Load time under 3 seconds

**Testing:**
- [ ] All functionality tested
- [ ] Mobile tested on real devices
- [ ] Forms tested and receiving emails
- [ ] Booking system tested end-to-end
- [ ] Security scan clean
- [ ] Accessibility checked

**Launch:**
- [ ] Search engines can index site
- [ ] Announced/promoted
- [ ] Monitoring active
- [ ] Maintenance schedule set

---

## Final Notes for AI Assistants

**Key Principles:**
1. **Follow existing documentation:** All content and strategy has been planned in the repository markdown files
2. **Test frequently:** Don't assume features work - test everything
3. **Mobile-first:** Always check mobile responsive design
4. **Security matters:** Don't skip security setup steps
5. **User experience:** Keep the user's journey in mind - make it easy to book
6. **Performance:** Fast sites convert better - optimize aggressively
7. **SEO from start:** Don't launch without basic SEO setup
8. **Backup before changes:** Always have a way to recover

**When to Ask for Human Input:**
- Pricing information (must be provided by business owner)
- Actual business address and phone number
- Service area specifics (Melbourne suburbs)
- Brand logo (if not already provided)
- Design preferences beyond documented requirements
- Budget constraints for paid plugins/services
- Custom functionality not covered in this guide

**Remember:**
- This is a real business website - treat it with production-level care
- Every form submission could be a real customer - test thoroughly
- Performance and security directly impact business success
- The goal is a professional, functional, fast website that converts visitors to customers

---

**Build Guide Version:** 1.0
**Last Updated:** November 2025
**Created For:** Merlin Property Services
**Target Website:** merlinproperty.com.au

---

*End of AI Assistant Build Guide*
