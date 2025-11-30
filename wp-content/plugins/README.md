# WordPress Plugins Directory

This directory is the standard location for WordPress plugins. The actual plugin files will be downloaded and installed through the WordPress admin dashboard.

## Recommended Plugins for MPS Theme

The following plugins are recommended for the Merlin Property Services website. Install them through **Plugins → Add New** in WordPress admin.

### High Priority (Essential)

| Plugin | Purpose | WordPress.org Slug |
|--------|---------|-------------------|
| **Amelia Lite** | Online booking for services | `ameliabooking` |
| **WPForms Lite** | Contact and quote forms | `wpforms-lite` |
| **Yoast SEO** | Search engine optimization | `wordpress-seo` |
| **Stars Testimonials** | Customer reviews display | `stars-testimonials-with-slider-and-masonry-grid` |

### Medium Priority (Recommended)

| Plugin | Purpose | WordPress.org Slug |
|--------|---------|-------------------|
| **NextGEN Gallery** | Before/after photo galleries | `nextgen-gallery` |
| **Tawk.to Live Chat** | Customer support chat | `tawkto-live-chat` |
| **WP Google Maps** | Service area display | `wp-google-maps` |
| **Wordfence Security** | Site security | `wordfence` |
| **LiteSpeed Cache** | Performance optimization | `litespeed-cache` |

## Installation Instructions

1. Log into WordPress admin dashboard
2. Navigate to **Plugins → Add New**
3. Search for the plugin by name or slug
4. Click **Install Now**
5. Click **Activate**
6. Configure the plugin settings

## Theme Integration

The MPS Theme includes built-in support for all recommended plugins through:

- **mu-plugins/mps-plugin-integration.php** - Automatic plugin integration
- **mu-plugins/mps-plugin-integration.css** - Consistent styling for plugins
- **templates/section-*.php** - Template parts for plugin content

## Configuration Guides

Detailed configuration instructions for each plugin are available in:

- `/PLUGIN_IMPLEMENTATION_GUIDE.md` - Complete setup guide
- `/WEBSITE_REVIEW_AND_PLUGIN_RECOMMENDATIONS.md` - Plugin recommendations

## Support

For plugin-specific support, refer to each plugin's documentation on WordPress.org.
