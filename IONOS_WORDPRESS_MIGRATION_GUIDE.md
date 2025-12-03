# IONOS WordPress Migration Guide for Merlin Property Services

A step-by-step guide for non-technical users to migrate and host the Merlin Property Services website on IONOS WordPress hosting.

## Table of Contents
1. [Preparation & Resource Review](#1-preparation--resource-review)
2. [Manual Migration Steps (IONOS Specific)](#2-manual-migration-steps-ionos-specific)
3. [Automation Options](#3-automation-options)
4. [Validation & Testing](#4-validation--testing)
5. [Troubleshooting & Support](#5-troubleshooting--support)

---

## 1. Preparation & Resource Review

### 1.1 Before You Begin

Before starting the migration, gather and review the following resources:

| Resource | Purpose | Location |
|----------|---------|----------|
| `WEBSITE_REVIEW_AND_PLUGIN_RECOMMENDATIONS.md` | Understand site structure and improvements | Repository root |
| `PLUGIN_IMPLEMENTATION_GUIDE.md` | Plugin installation and configuration | Repository root |
| `website_build.md` | Design specifications and page structure | Repository root |
| Current site backup | Safety copy of all files and content | Your local computer |

### 1.2 Recommended Plugins Checklist

From the `PLUGIN_IMPLEMENTATION_GUIDE.md`, ensure you plan to install these plugins:

**High Priority (Install First):**
- [ ] Amelia Lite - Booking & Appointments
- [ ] WPForms Lite - Contact Forms
- [ ] Yoast SEO - Search Engine Optimization
- [ ] Stars Testimonials - Reviews & Social Proof

**Medium Priority (Install After High Priority):**
- [ ] NextGEN Gallery - Photo Gallery
- [ ] Tawk.to Live Chat - Customer Support
- [ ] WP Google Maps - Service Area Display
- [ ] Wordfence Security - Site Protection
- [ ] LiteSpeed Cache - Performance Optimization

### 1.3 Create Backups

Before any migration, create complete backups:

**What to Back Up:**
1. **Website Files**: Download all files from `wp-content` folder
   - `themes/` folder (your custom theme files)
   - `plugins/` folder (any customized plugins)
   - `uploads/` folder (images and media)
   - `mu-plugins/` folder (must-use plugins if any)

2. **Database**: Export your WordPress database
   - Usually done through phpMyAdmin
   - Save as `.sql` file

3. **Content Documents**: Keep copies of:
   - All page content (text and images)
   - Menu structure
   - Widget settings
   - Plugin configurations

**Backup Storage:**
- Save backups to your local computer
- Keep a second copy on cloud storage (Google Drive, Dropbox, etc.)
- Label files with dates for easy identification

### 1.4 IONOS Account Setup

1. **Purchase IONOS WordPress Hosting**
   - Go to [IONOS WordPress Hosting](https://www.ionos.com/hosting/wordpress-hosting)
   - Choose a plan that fits your needs (Recommended: "Grow" or higher for business sites)
   - Complete the registration process

2. **Note Your IONOS Credentials**
   - IONOS Control Panel login
   - WordPress admin URL (provided after setup)
   - WordPress admin username and password
   - FTP/SFTP credentials (if needed)

---

## 2. Manual Migration Steps (IONOS Specific)

### 2.1 Accessing Your IONOS WordPress Dashboard

1. **Log into IONOS Control Panel**
   - Go to: https://login.ionos.com/
   - Enter your email and password

2. **Navigate to WordPress**
   - Click on "Hosting" in the main menu
   - Select your WordPress hosting package
   - Click "Manage WordPress" or "Open WP Admin"

3. **WordPress Dashboard Access**
   - Your WordPress dashboard URL will be: `https://your-domain.com/wp-admin`
   - Log in with the credentials you created during setup

### 2.2 Uploading Code and Files

#### Option A: Using IONOS File Manager (Easiest)

1. **Access File Manager**
   - In IONOS Control Panel, go to "Hosting" → "WebSpace"
   - Click "WebSpace" or "File Manager"

2. **Navigate to WordPress Directory**
   - Find the `wp-content` folder in your WordPress installation
   - This is usually at: `/wordpress/wp-content/` or `/htdocs/wp-content/`

3. **Upload Theme Files**
   - Navigate to `wp-content/themes/`
   - Click "Upload" button
   - Select your theme folder from your backup
   - Wait for upload to complete

4. **Upload Plugin Files** (if you have custom plugins)
   - Navigate to `wp-content/plugins/`
   - Upload any custom plugin folders

5. **Upload Media Files**
   - Navigate to `wp-content/uploads/`
   - Upload your images and media files
   - Maintain the folder structure (year/month folders)

#### Option B: Using FTP (For Larger Uploads)

1. **Download an FTP Client**
   - Recommended: [FileZilla](https://filezilla-project.org/) (free)

2. **Connect to IONOS FTP**
   - Open FileZilla
   - Enter your FTP credentials (found in IONOS Control Panel under "Hosting" → "FTP Access"):
     - Host: Your FTP server address
     - Username: Your FTP username
     - Password: Your FTP password
     - Port: 21 (or 22 for SFTP)

3. **Upload Files**
   - Navigate to the `wp-content` folder on the server (right panel)
   - Select files from your local computer (left panel)
   - Drag and drop to upload

### 2.3 Recreating Pages & Content

Based on `WEBSITE_REVIEW_AND_PLUGIN_RECOMMENDATIONS.md`, create these pages:

#### Main Pages (Create First)

1. **Home Page**
   - Go to "Pages" → "Add New"
   - Title: "Home"
   - Add hero section, services grid, Why Choose Us section
   - Set as homepage: "Settings" → "Reading" → "Your homepage displays: A static page" → Select "Home"

2. **About Us Page**
   - Title: "About Us"
   - Include business story, team information, service area

3. **Contact Page**
   - Title: "Contact"
   - Add contact form (using WPForms), phone, email, business hours

#### Service Pages (Create After Main Pages)

Create each of these pages following the template structure:

| Page Title | URL Slug | Key Content |
|------------|----------|-------------|
| End of Lease Cleaning | `end-of-lease-cleaning` | Bond back guarantee, pricing table |
| Move In Cleaning | `move-in-cleaning` | Fresh start messaging |
| Commercial Cleaning | `commercial-cleaning` | Office/retail options |
| Pre-sale Cleaning | `pre-sale-cleaning` | Property presentation |
| Gardening Services | `gardening-services` | Garden maintenance |
| Carpet Cleaning | `carpet-cleaning` | Steam cleaning |
| Window Cleaning | `window-cleaning` | Interior/exterior |
| Minor Maintenance | `minor-maintenance` | Handyman services |

**For each service page, include:**
- Hero section with service name and CTA
- "What's Included" checklist
- Pricing table
- Guarantee section (where applicable)
- FAQ accordion
- Final call-to-action

### 2.4 Plugin Implementation

Follow the `PLUGIN_IMPLEMENTATION_GUIDE.md` for detailed configuration. Here's a quick reference:

#### Installing Plugins on IONOS

1. **Navigate to Plugins**
   - In WordPress dashboard: "Plugins" → "Add New"

2. **Install Each Plugin**
   - Search for the plugin name
   - Click "Install Now"
   - Click "Activate"

3. **Follow Configuration Steps**
   - Refer to `PLUGIN_IMPLEMENTATION_GUIDE.md` for:
     - Amelia Lite: Services setup, booking form
     - WPForms Lite: Quote request and contact forms
     - Yoast SEO: First-time configuration wizard
     - Stars Testimonials: Add customer reviews
     - And all other plugins...

#### Plugin Configuration Quick Reference

| Plugin | Dashboard Location | First Step |
|--------|-------------------|------------|
| Amelia Lite | "Amelia" menu | Add services |
| WPForms | "WPForms" menu | Create forms |
| Yoast SEO | "SEO" menu | Run setup wizard |
| Stars Testimonials | "Stars Testimonials" menu | Add testimonials |
| NextGEN Gallery | "Gallery" menu | Create gallery |
| Tawk.to | "Settings" → "Tawk.to" | Connect account |
| WP Google Maps | "Maps" menu | Enter API key |
| Wordfence | "Wordfence" menu | Complete setup |
| LiteSpeed Cache | "LiteSpeed Cache" menu | Enable cache |

### 2.5 Setting Up Menus and Navigation

1. **Create Menu**
   - Go to "Appearance" → "Menus"
   - Create new menu named "Primary Navigation"

2. **Add Menu Items**
   - Add pages: Home, Services (as dropdown), About Us, Contact
   - Under Services dropdown: Add all 8 service pages

3. **Assign Menu Location**
   - Check "Primary Menu" or "Header Menu"
   - Click "Save Menu"

### 2.6 IONOS-Specific Settings

#### PHP Version

1. **Check PHP Version**
   - In IONOS Control Panel: "Hosting" → "PHP"
   - Ensure PHP 8.0 or higher is selected (required for WordPress)

2. **Adjust if Needed**
   - Select PHP 8.0, 8.1, or 8.2
   - Click "Save"

#### SSL Certificate

1. **Enable SSL** (Usually automatic on IONOS)
   - In IONOS Control Panel: "Domains & SSL"
   - Click on your domain
   - Ensure SSL is active

2. **Force HTTPS in WordPress**
   - Go to "Settings" → "General"
   - Ensure both URLs start with `https://`:
     - WordPress Address (URL): `https://your-domain.com`
     - Site Address (URL): `https://your-domain.com`

#### Domain Pointing

1. **Point Domain to IONOS**
   - If your domain is registered elsewhere:
     - Log into IONOS Control Panel
     - Go to "Domains & SSL" → Select your domain
     - Look for "Nameservers" or "DNS Settings"
     - Your specific nameserver addresses will be displayed there
     - Copy these addresses to your domain registrar's nameserver settings
   - If your domain is registered with IONOS, DNS is configured automatically

2. **Wait for Propagation**
   - DNS changes can take 24-48 hours to propagate worldwide

---

## 3. Automation Options

### 3.1 IONOS Migration Tools

IONOS offers built-in tools that may simplify migration:

#### IONOS WordPress Mover

1. **Check if Available**
   - In IONOS Control Panel, look for "WordPress" → "Migration" or "Move Site"
   
2. **Use if Migrating from Another Host**
   - Enter your old hosting details
   - IONOS will attempt automatic migration
   - Review and verify after completion

#### IONOS One-Click Install

If starting fresh (not migrating existing content):
1. IONOS provides pre-installed WordPress
2. Simply log in and start customizing
3. Follow this guide from Section 2.3 onwards

### 3.2 WordPress Migration Plugins

If automatic tools don't work, consider these free plugins:

#### All-in-One WP Migration (Recommended for Beginners)

1. **On Old Site:**
   - Install "All-in-One WP Migration" plugin
   - Go to "All-in-One WP Migration" → "Export"
   - Click "Export to" → "File"
   - Download the export file

2. **On IONOS WordPress:**
   - Install same plugin
   - Go to "All-in-One WP Migration" → "Import"
   - Upload the export file
   - Wait for import to complete
   - Log in with OLD site credentials after import

**Note:** Free version has a 512MB limit. For larger sites, consider manual migration.

#### Duplicator (For Technical Users)

1. Creates complete site package
2. Includes database and files
3. More complex but thorough

### 3.3 Recommendation for Beginners

**Easiest Path:**

1. **If Starting Fresh** (recommended for this site):
   - Use IONOS pre-installed WordPress
   - Manually create pages following this guide
   - Install plugins via WordPress dashboard
   - Upload images via Media Library

2. **If Migrating Existing Site:**
   - Try All-in-One WP Migration plugin first
   - If file too large, use manual FTP upload + database import

---

## 4. Validation & Testing

### 4.1 Pre-Launch Verification

Complete these checks before going live:

#### Pages and Content

- [ ] All 11 pages are published and accessible
- [ ] Navigation menu works correctly
- [ ] All images load properly
- [ ] Text content is correct and formatted
- [ ] Mobile responsiveness works (test on phone)

#### Forms and Booking

From `PLUGIN_IMPLEMENTATION_GUIDE.md` Testing Checklist:

- [ ] Quote request form submits successfully
- [ ] Contact form sends emails
- [ ] Booking system shows correct services
- [ ] Confirmation emails are received
- [ ] Forms display correctly on mobile

#### SEO Settings

- [ ] Yoast SEO wizard completed
- [ ] All pages have meta titles and descriptions
- [ ] XML sitemap accessible at `/sitemap_index.xml`
- [ ] Google Search Console connected (if applicable)

#### Plugin Functionality

| Plugin | Test | Pass? |
|--------|------|-------|
| Amelia | Complete test booking | ☐ |
| WPForms | Submit test form | ☐ |
| Yoast | Check meta in source | ☐ |
| Testimonials | Display correctly | ☐ |
| Gallery | Images open in lightbox | ☐ |
| Tawk.to | Chat widget appears | ☐ |
| Maps | Map loads correctly | ☐ |
| Wordfence | Security scan runs | ☐ |
| LiteSpeed | Page loads fast | ☐ |

### 4.2 IONOS-Specific Checks

#### PHP and Server Settings

1. **Verify PHP Version**
   - Go to "Tools" → "Site Health" in WordPress
   - Should show PHP 8.0 or higher
   - Memory limit should be 256MB or higher

2. **Check Performance**
   - Use [GTmetrix](https://gtmetrix.com/) to test page speed
   - Target: Under 3 seconds load time
   - Enable LiteSpeed Cache if slow

#### SSL and Security

- [ ] Site loads with `https://` (padlock in browser)
- [ ] No mixed content warnings
- [ ] Wordfence shows green checkmarks
- [ ] Login page is secure

### 4.3 Mobile and Browser Testing

Test your site on:
- [ ] Desktop Chrome
- [ ] Desktop Firefox/Safari
- [ ] Mobile Safari (iPhone)
- [ ] Mobile Chrome (Android)
- [ ] Tablet (if available)

---

## 5. Troubleshooting & Support

### 5.1 Common Issues and Solutions

#### "Error Establishing Database Connection"

**Cause:** Database credentials incorrect or server issue

**Solution:**
1. Contact IONOS support
2. Verify database name, username, and password in `wp-config.php`
3. Check if database server is running

#### "White Screen of Death"

**Cause:** PHP error, memory limit, or plugin conflict

**Solution:**
1. Access IONOS File Manager
2. Rename `wp-content/plugins/` to `wp-content/plugins_backup/`
3. If site loads, rename folder back and deactivate plugins one by one
4. Check PHP error logs in IONOS Control Panel

#### Plugins Not Installing

**Cause:** PHP memory limit or permissions

**Solution:**
1. In IONOS Control Panel, increase PHP memory limit
2. Check file permissions (folders: 755, files: 644)
3. Try installing manually via FTP

#### Forms Not Sending Emails

**Cause:** Server email configuration

**Solution:**
1. Install "WP Mail SMTP" plugin
2. Configure with IONOS email settings or use third-party (SendGrid, Gmail)
3. Test with WP Mail SMTP test feature

#### Site Slow to Load

**Cause:** Caching or optimization issues

**Solution:**
1. Enable LiteSpeed Cache
2. Optimize images (use built-in image optimization)
3. Disable unused plugins
4. Check with GTmetrix for specific issues

#### Map Not Displaying

**Cause:** Google Maps API key issue

**Solution:**
1. Verify API key in plugin settings
2. Check Google Cloud Console for key restrictions
3. Ensure Maps JavaScript API is enabled
4. Add your domain to allowed referrers

### 5.2 IONOS Support Resources

| Resource | URL | Best For |
|----------|-----|----------|
| IONOS Help Center | https://www.ionos.com/help/ | General guides |
| WordPress on IONOS | https://www.ionos.com/help/hosting/wordpress/ | WordPress-specific |
| IONOS Community | https://www.ionos.com/digitalguide/ | Tips and tutorials |
| Phone Support | Check your IONOS account for number | Urgent issues |
| Live Chat | Available in IONOS Control Panel | Quick questions |

### 5.3 Plugin-Specific Troubleshooting

Refer to the "Troubleshooting Common Issues" section in `PLUGIN_IMPLEMENTATION_GUIDE.md`:

| Issue | Solution Reference |
|-------|-------------------|
| Amelia not showing services | Check services published, employee assigned |
| Forms not sending emails | Configure SMTP, check spam folder |
| Map not loading | Verify API key, check restrictions |
| Chat widget not appearing | Check property ID, clear cache |
| Slow page load | Clear LiteSpeed cache, optimize images |

### 5.4 When to Contact Support

**Contact IONOS Support if:**
- You can't access your control panel
- Database errors persist
- SSL certificate issues
- Server-side errors (500 errors)
- Billing or account issues

**Contact Plugin Support if:**
- Plugin-specific features don't work
- Configuration questions
- Compatibility issues between plugins

---

## Appendix: Quick Reference Cards

### A. Essential URLs After Migration

| Purpose | URL |
|---------|-----|
| WordPress Admin | `https://your-domain.com/wp-admin` |
| IONOS Control Panel | https://login.ionos.com/ |
| Site Homepage | `https://your-domain.com` |
| XML Sitemap | `https://your-domain.com/sitemap_index.xml` |

### B. Recommended First-Week Tasks

**Day 1-2:**
- [ ] Complete WordPress setup
- [ ] Install all high-priority plugins
- [ ] Create main pages (Home, About, Contact)

**Day 3-4:**
- [ ] Create all service pages
- [ ] Configure booking system (Amelia)
- [ ] Set up contact forms (WPForms)

**Day 5-6:**
- [ ] Add testimonials
- [ ] Upload images and create galleries
- [ ] Configure SEO settings

**Day 7:**
- [ ] Complete all testing
- [ ] Set up live chat
- [ ] Run security scan
- [ ] Launch!

### C. Ongoing Maintenance Schedule

From `PLUGIN_IMPLEMENTATION_GUIDE.md`:

**Weekly:**
- Review chat transcripts
- Check form submissions
- Monitor security alerts

**Monthly:**
- Update all plugins
- Run security scan
- Add new testimonials

**Quarterly:**
- Review plugin settings
- Update contact information
- Backup and test restore

---

## Document Information

- **Version:** 1.0
- **Last Updated:** December 2025
- **Related Documents:**
  - `PLUGIN_IMPLEMENTATION_GUIDE.md`
  - `WEBSITE_REVIEW_AND_PLUGIN_RECOMMENDATIONS.md`
  - `website_build.md`
- **For:** Merlin Property Services Website Migration to IONOS

---

*This guide was created to help non-technical users successfully migrate and host the Merlin Property Services website on IONOS WordPress hosting. For additional assistance, refer to the related documentation or contact IONOS support.*
