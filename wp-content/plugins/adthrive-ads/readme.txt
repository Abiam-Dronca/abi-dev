=== AdThrive Ads ===
Contributors: adthrive
Tags: ads adthrive
Requires at least: 4.6.0
Tested up to: 6.0.1
Requires PHP: 5.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simplifies adding AdThrive Ads to your site!

== Description ==

This plugin adds an AdThrive Ads JavaScript file to the head of your WordPress site.

Features

* Adds the AdThrive Ads script tag to the head of your site
* Disable ads by category or tag
* Disable all ads, content ads, or in-image ads per post
* Includes IFrame busters for popular ad networks

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/adthrive-ads` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the AdThrive->Ads screen to set your Site ID

== Changelog ==
= 2.4.0 =
* Addressed warning messages that occurred during debug mode
* Improved upgrade stability
* Improved error handling

= 2.3.1 =
* Minor bug fixes

= 2.2.4 =
* Bug fixes for update hook

= 2.2.3 =
* Bug fixes for ad recovery

= 2.2.2 =
* Bug fixes for update hook and header error in email detection class

= 2.2.1 =
* Minor bug fix for PHP v7.2

= 2.2.0 =
* Minor bug fixes

= 2.1.1 =
* Significant infrastructure changes and backend updates to allow for continued improvements to our plugin

= 1.1.5 =
* Cron job bug fix

= 1.1.4 =
* Added MCM support for Web Stories
* Minor fixes

= 1.1.3 =
* Minor bug fixes and optimizations

= 1.1.2 =
* Bug fixes from v1.1.1

= 1.1.1 =
* Added support for ad block recovery
* Improvements to ad & page speed

= 1.1.0 =
* Additional CLS optimization

= 1.0.50 =
* Bug fixes

= 1.0.49 =
* Improved functionality for GDPR compliance

= 1.0.48 =
* Minor bug fixes and optimizations

= 1.0.47 =
* Behind-the-scenes enhancements for CLS Optimization setting

= 1.0.46 =
* Added support for Web Stories ads
* Bug fixes for CLS Optimization

= 1.0.45 =
* Removed Content Security Policy option

= 1.0.44 =
* Added option to enable solution for ad-related CLS

= 1.0.43 =
* Update to help with ads.txt installation on new sites

= 1.0.41 =
* Removed adblock recovery

= 1.0.40 =
* Updated minimum supported PHP version
* Confirm the adblock recovery script is available before loading

= 1.0.39 =
* Enable redirect of video-sitemap url to adthrive-hosted video sitemmap
* Updated adblock recovery.

= 1.0.38 =
* Remove the client side experiment threshold from the script tag.

= 1.0.37 =
* AdBlock recovery option added to plugin. This option allows ads to be shown to users with ad blockers enabled

= 1.0.36 =
* Added post and site option to disable adding video metadata
* Updated video files to handle override-embed and player type in the shortcode
* Prevent ads from loading when a post is being edited in Thrive Architect

= 1.0.35 =
* Added a post option to re-enable ads on the specified date

= 1.0.34 =
* Always Use HTTPS Resources

= 1.0.33 =
* Update WordPress tested up to 5.2.2
* Always use HTTPS for the script tag

= 1.0.32 =
* Added an option to disable auto-insert video players on individual posts or pages

= 1.0.31 =
* Added an option to override ads.txt by copying it to the site root
* Redirect to the hosted ads.txt file by default

= 1.0.30 =
* Updated AMP ad refresh targeting

= 1.0.29 =
* V2.7 of ads.txt
* Added warning when deactivating AdThrive Ads Plugin
* Fixed the sending of PII on AMP pages

= 1.0.28 =
* V2.5 of ads.txt
* Fixed AMP support for PHP < 5.4

= 1.0.27 =
* V2.3 of ads.txt

= 1.0.26 =
* Added AMP support

= 1.0.25 =
* Add support for viewing the GDPR consent by adding ?threshold=gdpr to the site url

= 1.0.24 =
* Load the ad code at the top of the head tag

= 1.0.23 =
* V2.2 of ads.txt

= 1.0.22 =
* V2 of ads.txt

= 1.0.21 =
* Added a new adthrive-in-post-video-player shortcode

= 1.0.20 =
* Update to CMB2 v2.3.0 to improve compatibilty with PHP 7.2

= 1.0.19 =
* Adjusted the ad code script block
* Removed Iframe busters with XSS vulnerabilities

= 1.0.18 =
* Added Iframe busters

= 1.0.17 =
* Block ads on 404 pages

= 1.0.16 =
* Updated ads.txt

= 1.0.15 =
* Updated ads.txt
* Added a new Content Security Policy option that will upgrade insecure requests and block all mixed content

= 1.0.13 =
* Delay setup until after plugins loaded

= 1.0.12 =
* Added support for ads.txt

= 1.0.11 =
* Removed support for Cloudflare Rocket Loader

= 1.0.10 =
* Added support for Cloudflare Rocket Loader

= 1.0.9 =
* Added plugin version output

= 1.0.8 =
* Changed the HTTPS endpoint

= 1.0.7 =
* Added HTTPS support

= 1.0.6 =
* Improved compatibilty with PHP 7 and WordPress 4.7

= 1.0.4 =
* Improved multisite support

= 1.0.3 =
* Improved settings initialization and style
* Improved the tag and category input performance for large datasets

= 1.0.2 =
* Added a PHP 5.3+ version check

= 1.0.1 =
* Updated to support PHP 5.3

= 1.0.0 =
* Initial public release
