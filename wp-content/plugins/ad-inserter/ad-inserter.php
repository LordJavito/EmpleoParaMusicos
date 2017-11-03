<?php
/*
Plugin Name: Ad Inserter
Version: 2.2.5
Description: Ad management plugin with advanced advertising options to automatically insert ad codes into your website.
Author: Igor Funa
Author URI: http://igorfuna.com/
Plugin URI: http://adinserter.pro/documentation
*/

/*

Change Log

Ad Inserter 2.2.5 - 2017-10-15
- Fix for issue with Ajax requests

Ad Inserter 2.2.4 - 2017-10-14
- Added support to insert raw HTTP response header lines
- Added support to check for individual exceptions for shortcodes
- Added support to trigger ad blocking detection action only on individual pages
- Added support for automatic insertion position Footer
- Added support for custom hooks
- Url parameter list now checks url parameters ($_GET) and cookies ($_COOKIE)
- Fix for |count| separator not processed

Ad Inserter 2.2.3 - 2017-09-26
- Added support to insert custom fields via shortcode [adinserter custom-field='CUSTOM_FIELD_NAME']
- Added support for user:USERNAME and user-role:USER_ROLE taxonomy list items
- Added support for post-type:POST_TYPE taxonomy list items
- Added support for JavaScript based sticky widgets
- Added support for ad blocking statistics (Pro only)
- Added support for WP AMP and WP AMP Ninja plugins
- Post/Page Word Count moved to Misc section (now works also on widgets)
- Few minor bug fixes, cosmetic changes and code improvements

Ad Inserter 2.2.2 - 2017-08-28
- Fix for mobile admin layout
- Few other minor bug fixes

Ad Inserter 2.2.1 - 2017-08-27
- Fix for header/footer scripts on AMP pages

Ad Inserter 2.2.0 - 2017-08-27
- Added support for ad blocking detection (experimental)
- Added support for [ADINSERTER AMP] shortcode to separate code for AMP pages
- Added support for [ADINSERTER ROTATE] and [ADINSERTER COUNT] shortcodes
- Added syntax highlighting for shortcodes and separators
- Added style `clear: both;` to Default, Left, Right and Center alignments
- Bug fix for errors when loading tracking charts (Pro only)
- Many minor bug fixes, cosmetic changes and code improvements

Ad Inserter 2.1.14 - 2017-08-07
- Fix for error when using older PHP versions (prior to 5.5)

Ad Inserter 2.1.13 - 2017-08-07
- Fix for Fatal error: Can't use method return value in write context

Ad Inserter 2.1.12 - 2017-08-07
- Added option to define tags inside which paragraphs are not counted
- Added max insertions check when inserting for all paragraphs
- Added support for inverted filter
- Added option to define minimum number of words in paragraphs above (experimental)
- Added support for %N filter item to filter every N-th insertion (experimental)
- Added filter support when inserting for all paragraphs (experimental)
- Increased nonce lifespan to 48 hours when using tracking (Pro only)
- Fixed wrong urls in debug menu when behind proxy

Ad Inserter 2.1.11 - 2017-07-21
- Improved support for sticky widgets
- Added support for ad counting (|count| separator)
- Added support to black/white-list arbitrary taxonomies (taxonomy, term or taxonomy:term)
- Added support for automatic insertion before, between and after comments
- Added processing of shortcodes in the header and footer code
- Debugging function Show positions shows also page type
- Fixed page type detection when Post page was set to static page and it was not homepage
- Few minor bug fixes, cosmetic changes and code improvements

Ad Inserter 2.1.10 - 2017-07-01
- Fix for shifted sidebars in some themes

Ad Inserter 2.1.9 - 2017-06-30
- Added support for sticky widgets
- Added support to insert code after images (Automatic Insertion: After Paragraph, Paragraphs with tags: img)
- Impression and click tracking (beta, Pro only)
- Few minor bug fixes, cosmetic changes and code improvements

Ad Inserter 2.1.8 - 2017-05-18
- Fixed error when using server-side device detection

Ad Inserter 2.1.7 - 2017-05-13
- Fixed error when using PHP 5.4 or earlier

Ad Inserter 2.1.6 - 2017-05-12
- Added support for insertion before/after multiple paragraphs
- Added initial support for impression and click tracking (Pro only)
- Few bug fixes and cosmetic changes

Ad Inserter 2.1.5 - 6 April 2017
- Added support to avoid insertion inside <figure> and <li> elements (image captions, lists)
- Added support for exceptions for custom post types
- Few minor bug fixes and code improvements

Ad Inserter 2.1.4 - 12 March 2017
- Paragraph counting restored to standard functions
- Added option to select paragraph counting functions with multibyte support (unicode characters)
- Fixed bug for wrong paragraph counting in posts with blockquote sections in some cases
- Fixed bug for wrong measuring of plugin processing time in some cases
- Fixed bug for "Empty delimiter" warning

Ad Inserter 2.1.3 - 11 March 2017
- Added support for counting paragraphs with multibyte (unicode) characters
- Fixed bug for class name not saved
- Few minor bug fixes and cosmetic changes

Ad Inserter 2.1.2 - 1 March 2017
- Fixed bug for disabled settings page on multisite blogs

Ad Inserter 2.1.1 - 26 February 2017
- Changes for compatibility with PHP 7.1
- Automatic rename of old pro plugin slug (Pro only)
- Added support for additional Pro features (Pro only)
- Few bug fixes and cosmetic changes

Ad Inserter 2.1.0 - 10 February 2017
- Added support to insert ads in Ajax requests (e.g. in infinite scroll)
- Added support to not include block classes when class name is empty
- Added sticky positions (Pro only)
- Bug fix for minimum user role not taken into account for exceptions list
- Bug fix for IP database update cron event (Pro only)

Ad Inserter 2.0.14 - 2 February 2017
- Fixed issue for responsive ads not displayed when using Left, Center or Right alignment

Ad Inserter 2.0.13 - 1 February 2017
- Added icons for Automatic insertion and alignment
- Automatic insertion None changed to Disabled
- Alignment None changed to Default
- Changed database option data for Automatic insertion and Alignment settings
- Improved CSS 3 code for Left, Center and Right alignment
- Click on CSS code starts editing
- Page/Post exceptions listed in debug output
- Different plugin slug for Pro version
- Few minor bug fixes and cosmetic changes

Ad Inserter 2.0.12 - 29 January 2017
- Bug fix for page/post exceptions list

Ad Inserter 2.0.11 - 29 January 2017
- Bug fix for settings page not loading

Ad Inserter 2.0.10 - 26 January 2017
- Added option to insert ads between posts on blog pages
- Added option to check and manage post/page exceptions for each block
- Added option to check and manage all post/page exceptions (Pro only)
- Added option for multisite installations to disable PHP processing on sub-sites (Pro only)
- Added license status notifications (Pro only)

Ad Inserter 2.0.9 - 8 January 2017
- Added support for uppercase {country_ISO2} and lowercase {country_iso2} tag (Pro only)
- Removed inclusion of dummy css and js file
- Bug fix: Client-side dynamic blocks were not enabled if not using W3 Total Cache

Ad Inserter 2.0.8 - 6 January 2017
- Added support for client-side rotation (works with caching)
- Added support for server-side rotation with W3 Total Cache
- Added support for client-side country detection (works with caching, Pro only)
- Added support for server-side country detection with W3 Total Cache (Pro only)
- Added debugging functions to measure plugin processing time
- Added option to black/white-list IP addresses (Pro only)
- Added option for fallback code when scheduling between dates expires (Pro only)
- On multisite installations Ad Inserter debug menu item on sites is available only if settings page is enabled
- Added option for multisite installations to use Ad Inserter settings of main site for all blogs
- Added flags to country list (Pro only)
- Bug fix: Code preview did not work if Wordpress was installed in a folder
- Few minor bug fixes and cosmetic changes

Ad Inserter 2.0.7 - 23 December 2016
- Delayed display moved to Misc group
- Added option for scheduling to insert code only between specified dates (Pro only)
- Added option for Geo targeting (Pro only)
- Few minor bug fixes and cosmetic changes

Ad Inserter 2.0.6 - 25 November 2016
- Added support to filter subpages created by the <!--nextpage--> tag
- Added option to import block name (Pro only)
- Cookie deleted only when it exists and debugging is disabled
- Few minor bug fixes

Ad Inserter 2.0.5 - 8 october 2016
- Cookie created only when debugging is enabled
- Few minor bug fixes

Ad Inserter 2.0.4 - 30 September 2016
- Bug fix: Cursor position always at the end of block name
- State of debugging functions saved to cookie
- Few minor bug fixes

Ad Inserter 2.0.3 - 26 September 2016
- Debugging functions in admin toolbar available only for administrators
- Added option to hide debugging functions in admin toolbar
- Added shortcode for debugger
- Few minor bug fixes

Ad Inserter 2.0.2 - 25 September 2016
- Changed javascript version check to get plugin version from the HTML page
- Added warning if old cached version of CSS file is loaded on the settings page
- Added warning if version query parameter for js/css files is removed due to inappropriate caching

Ad Inserter 2.0.1 - 24 September 2016
- Bug fix: Shortcodes called by name were not displayed

Ad Inserter 2.0.0 - 23 September 2016
- Redesigned user interface
- Added many debugging tools for easier troubleshooting
- New feature: Code preview tool with visual CSS editor
- New feature: Label inserted blocks
- New feature: Show available positions for automatic insertion
- New feature: Show HTML tags in posts/static pages
- New feature: Log Ad Inserter processing
- Improved loading speed of the settings page
- Improved block insertion processing speed
- Added support to avoid insertion near images, headers and other elements
- Added option to avoid insertion in feeds
- Added option to display code blocks only to administrators
- Added option for publishig date check for display positions Before/After Content
- Added option for server-side device check for header and footer code
- Added option for maximum page/post words
- Added option for maximum paragraph words
- Added option to black/white-list post IDs
- Added option to black/white-list url query parameters
- Added warning if the settings page is blocked by ad blocker
- Added warning if old cached version of javascript is loaded on the settings page
- Added support for multisite installations to disable settings, widgets and exceptions on network sites (Pro only)
- Block names can be edited by clicking on the name
- Filters now work also on posts and single pages
- CSS code for client-side detection moved to inline CSS
- Bug fix: Minimum user roles for exception editing was not calculated properly
- Bug fix: Server-side detection checkbox was not saved properly
- Many other minor bug fixes, code improvements and cosmetic changes

Ad Inserter 1.7.0 - 16 August 2016
- Bug fix: Shortcodes did not ignore post/static page exceptions
- Slightly redesigned user interface
- Excerpt/Post number(s) renamed to Filter as it now works on all display positions
- Widget setting removed from Automatic display to Manual display section
- Added support to disable widgets (standalone checkbox in Manual display)
- Added call counter/filter for widgets
- Added support to edit CSS for predefined styles
- Few other minor bug fixes, code improvements and cosmetic changes

Ad Inserter 1.6.7 - 9 August 2016
- Bug fix: Block code textarea was not escaped
- Added checks for page types for shortcodes
- Added support for Before/After Post position call counter/filter
- Few minor cosmetic changes

Ad Inserter 1.6.6 - 5 August 2016
- Bug fix: Display on Homepage and other blog pages might get disabled - important if you were using PHP function call or shortcode (import of settings from 1.6.4)
- Few minor cosmetic changes
- Requirements changed to WordPress 4.0 or newer
- Added initial support for Pro version

Ad Inserter 1.6.5 - 1 August 2016
- Fixed bug: Wrong counting of max insertions
- Change: display position Before Title was renamed to Before Post
- Added support for display position After Post
- Added support for posts with no <p> tags (paragraphs separated with \r\n\r\n characters)
- Added support for paragraph processing on homepage, category, archive and search pages
- Added support for custom viewports
- Added support for PHP function call counter
- Added support to disable code block on error 404 pages
- Added support to debug paragraph tags

Ad Inserter 1.6.4 - 15 May 2016
- Fixed bug: For shortcodes in posts the url was not checked
- Optimizations for device detection

Ad Inserter 1.6.3 - 6 April 2016
- Removed deprecated code (fixes PHP 7 deprecated warnings)
- Added support for paragraphs with div and other HTML tags (h1, h2, h3,...)

Ad Inserter 1.6.2 - 2 April 2016
- Removed deprecated code (fixes PHP Fatal error Call to a member function get_display_type)
- Added support to change plugin processing priority

Ad Inserter 1.6.1 - 28 February 2016
- Fixed bug: For shortcodes in posts the date was not checked
- Fixed error with some templates "Call to undefined method is_main_query()"
- Added support for minumum number of page/post words for Before/After content display option
- Added support for {author} and {author_name} tags

Ad Inserter 1.6.0 - 9 January 2016
- Added support for client-side device detection
- Many code improvements
- Improved plugin processing speed
- Removed support for deprecated tags for manual insertion {adinserter n}
- Few minor bug fixes

Ad Inserter 1.5.8 - 20 December 2015
- Fixed notice "Undefined index: adinserter_selected_block_" when saving page or post

Ad Inserter 1.5.7 - 20 December 2015
- Fixed notice "has_cap was called with an argument that is deprecated since version 2.0!"
- Few minor bug fixes and code improvements
- Added support to blacklist or whitelist url patterns: /url-start*. *url-pattern*, *url-end
- Added support to define minimum number of words in paragraphs
- Added support to define minimum user role for page/post Ad Inserter exceptions editing
- Added support to limit insertions of individual code blocks
- Added support to filter direct visits (no referer)

Ad Inserter 1.5.6 - 14 August 2015
- Fixed Security Vulnerability: Plugin was vulnerable to Cross-Site Scripting (XSS)
- Few bug fixes and code improvements

Ad Inserter 1.5.5 - 6 June 2015
- Few bug fixes and code improvements
- Added support to export and import all Ad Inserter settings

Ad Inserter 1.5.4 - 31 May 2015
- Many code optimizations and cosmetic changes
- Header and Footer code blocks moved to settings tab (#)
- Added support to process shortcodes of other plugins used in Ad Inserter code blocks
- Added support to white-list or black-list individual urls
- Added support to export and import settings for code blocks
- Added support to specify excerpts for block insertion
- Added support to specify text that must be present when counting paragraphs

Ad Inserter 1.5.3 - 2 May 2015
- Fixed Security Vulnerability: Plugin was vulnerable to a combination of CSRF/XSS attacks (credits to Kaustubh Padwad)
- Fixed bug: In some cases deprecated widgets warning reported errors
- Added support to white-list or black-list tags
- Added support for category slugs in category list
- Added support for relative paragraph positions
- Added support for individual code block exceptions on post/page editor page
- Added support for minimum number of words
- Added support to disable syntax highlighting editor (to allow using copy/paste on mobile devices)

Ad Inserter 1.5.2 - 15 March 2015
- Fixed bug: Widget titles might be displayed at wrong sidebar positions
- Change: Default code block CSS class name was changed from ad-inserter to code-block to prevent Ad Blockers from blocking Ad Inserter divs
- Added warning message if deprecated widgets are used
- Added support to display blocks on desktop + tablet and desktop + phone devices

Ad Inserter 1.5.1 - 3 March 2015
- Few fixes to solve plugin incompatibility issues
- Added support to disable all ads on specific page

Ad Inserter 1.5.0 - 2 March 2015
- Added support to display blocks on all, desktop or mobile devices
- Added support for new widgets API - one widget for all code blocks with multiple instances
- Added support to change wrapping code CSS class name
- Fixed bug: Display block N days after post is published was not working properly
- Fixed bug: Display block after paragraph in some cases was not working propery

Ad Inserter 1.4.1 - 29 December 2014
- Fixed bug: Code blocks configured as widgets were not displayed properly on widgets admin page

Ad Inserter 1.4.0 - 21 December 2014
- Added support to skip paragraphs with specified text
- Added position After paragraph
- Added support for header and footer scripts
- Added support for custom CSS styles
- Added support to display blocks to all, logged in or not logged in users
- Added support for syntax highlighting
- Added support for shortcodes
- Added classes to block wrapping divs
- Few bugs fixed

Ad Inserter 1.3.5 - 18 March 2014
- Fixed bug: missing echo for PHP function call example

Ad Inserter 1.3.4 - 15 March 2014
- Added option for no code wrapping with div
- Added option to insert block codes from PHP code
- Changed HTML codes to disable display on specific pages
- Selected code block position is preserved after settings are saved
- Manual insertion can be enabled or disabled regardless of primary display setting
- Fixed bug: in some cases Before Title display setting inserted code into RSS feed

Ad Inserter 1.3.3 - 8 January 2014
- Added option to insert ads also before or after the excerpt
- Fixed bug: in some cases many errors reported after activating the plugin
- Few minor bugs fixed
- Few minor cosmetic changes

Ad Inserter 1.3.2 - 4 December 2013
- Fixed blank settings page caused by incompatibility with some themes or plugins

Ad Inserter 1.3.1 - 3 December 2013
- Added option to insert ads also on pages
- Added option to process PHP code
- Few bugs fixed

Ad Inserter 1.3.0 - 27 November 2013
- Number of ad slots increased to 16
- New tabbed admin interface
- Ads can be manually inserted also with {adinserter AD_NUMBER} tag
- Fixed bug: only the last ad block set to Before Title was displayed
- Few other minor bugs fixed
- Few cosmetic changes

Ad Inserter 1.2.1 - 19 November 2013
- Fixed problem: || in ad code (e.g. asynchronous code for AdSense) causes only part of the code to be inserted (|| to rotate ads is replaced with |rotate|)

Ad Inserter 1.2.0 - 15/05/2012
- Fixed bug: manual tags in posts lists were not removed
- Added position Before title
- Added support for minimum number of paragraphs
- Added support for page display options for Widget and Before title positions
- Alignment now works for all display positions

Ad Inserter 1.1.3 - 07/04/2012
- Fixed bug for {search_query}: When the tag is empty {smart_tag} is used in all cases
- Few changes in the settings page

Ad Inserter 1.1.2 - 16/07/2011
- Fixed error with multisite/network installations

Ad Inserter 1.1.1 - 16/07/2011
- Fixed bug in Float Right setting display

Ad Inserter 1.1.0 - 05/06/2011
- Added option to manually display individual ads
- Added new ad alignments: left, center, right
- Added {search_query} tag
- Added support for category black list and white list

Ad Inserter 1.0.4 - 19/12/2010
- HTML entities for {title} and {short_title} are now decoded
- Added {tag} to display the first tag

Ad Inserter 1.0.3 - 05/12/2010
- Fixed bug for rotating ads

Ad Inserter 1.0.2 - 04/12/2010
- Added support for rotating ads

Ad Inserter 1.0.1 - 17/11/2010
- Added support for different sidebar implementations

Ad Inserter 1.0.0 - 14/11/2010
- Initial release

*/


global $block_object, $ai_wp_data, $ad_inserter_globals, $ai_last_check, $ai_last_time, $ai_total_plugin_time, $ai_total_php_time, $ai_processing_log, $ai_db_options_extract, $ai_db_options, $block_insertion_log;

if (!defined ('AD_INSERTER_PLUGIN_DIR'))
  define ('AD_INSERTER_PLUGIN_DIR', plugin_dir_path (__FILE__));

define ('AI_WP_DEBUGGING_',                0);
define ('AI_DEBUG_PROCESSING_',            0x01);
define ('AI_URL_DEBUG_',                   'ai-debug');
define ('AI_URL_DEBUG_PROCESSING_',        'ai-debug-processing');
define ('AI_URL_DEBUG_PHP_',               'ai-debug-php');

if (isset ($_GET [AI_URL_DEBUG_PHP_]) && $_GET [AI_URL_DEBUG_PHP_] != '') {
  if (isset ($_COOKIE ['AI_WP_DEBUGGING'])) {
    ini_set ('display_errors', 1);
    error_reporting (E_ALL);
  }
}

$ai_wp_data [AI_WP_DEBUGGING_] = 0;

if (!is_admin()) {
  if (!isset ($_GET [AI_URL_DEBUG_]))
    if (isset ($_GET [AI_URL_DEBUG_PROCESSING_]) || (isset ($_COOKIE ['AI_WP_DEBUGGING']) && ($_COOKIE ['AI_WP_DEBUGGING'] & AI_DEBUG_PROCESSING_) != 0))  {
      if (!isset ($_GET [AI_URL_DEBUG_PROCESSING_]) || $_GET [AI_URL_DEBUG_PROCESSING_] == 1) {
        $ai_wp_data [AI_WP_DEBUGGING_] |= AI_DEBUG_PROCESSING_;

        $ai_total_plugin_time = 0;
        $start_time = microtime (true);
        $ai_total_php_time = 0;
        $ai_last_time = microtime (true);
        $ai_processing_log = array ();
        ai_log ("INITIALIZATION START");
      }
    }
}

// Version check
global $wp_version, $version_string;

if (version_compare ($wp_version, "4.0", "<")) {
  exit ('Ad Inserter requires WordPress 4.0 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>');
}

//include required files
require_once AD_INSERTER_PLUGIN_DIR.'class.php';
require_once AD_INSERTER_PLUGIN_DIR.'constants.php';
require_once AD_INSERTER_PLUGIN_DIR.'settings.php';
require_once AD_INSERTER_PLUGIN_DIR.'preview.php';
require_once AD_INSERTER_PLUGIN_DIR.'preview-adb.php';

$version_array = explode (".", AD_INSERTER_VERSION);
$version_string = "";
foreach ($version_array as $number) {
  $version_string .= sprintf ("%02d", $number);
}

$ai_wp_data [AI_WP_URL] = remove_debug_parameters_from_url ();

//$ai_wp_data [AI_WP_DEBUGGING] = 0;

//if (!is_admin()) {
//  if (!isset ($_GET [AI_URL_DEBUG]))
//    if (isset ($_GET [AI_URL_DEBUG_PROCESSING]) || (isset ($_COOKIE ['AI_WP_DEBUGGING']) && ($_COOKIE ['AI_WP_DEBUGGING'] & AI_DEBUG_PROCESSING) != 0))  {
//      if (!isset ($_GET [AI_URL_DEBUG_PROCESSING]) || $_GET [AI_URL_DEBUG_PROCESSING] == 1) {
//        $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_PROCESSING;

//        $ai_total_plugin_time = 0;
//        $start_time = microtime (true);
//        $ai_total_php_time = 0;
//        $ai_last_time = microtime (true);
//        $ai_processing_log = array ();
//        ai_log ("INITIALIZATION START");
//      }
//    }
//}

$ad_inserter_globals = array ();
$block_object = array ();
$block_insertion_log = array ();

ai_load_settings ();
$ai_wp_data [AI_JS_DEBUGGING] = get_javascript_debugging ();

if (isset ($_GET [AI_URL_DEBUG_PHP]) && $_GET [AI_URL_DEBUG_PHP] != '') {
  if (get_remote_debugging ()) {
    ini_set ('display_errors', 1);
    error_reporting (E_ALL);
  }
}

if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
  $ai_wp_data [AI_ADB_DETECTION] = $block_object [AI_ADB_MESSAGE_OPTION_NAME]->get_enable_manual ();

  if ($ai_wp_data [AI_ADB_DETECTION]) {
    $adb_2_name = AI_ADB_2_DEFAULT_NAME;
    define ('AI_ADB_COOKIE_VALUE', substr (preg_replace ("/[^A-Za-z]+/", '', strtolower (md5 (LOGGED_IN_KEY.md5 (NONCE_KEY)))), 0, 8));

    $script_path = AD_INSERTER_PLUGIN_DIR.'includes/js';
    $script = $script_path.'/sponsors.js';

    if (is_writable ($script_path) && is_writable ($script)) {
      $adb_2_name = substr (preg_replace ("/[^A-Za-z]+/", '', strtolower (md5 (LOGGED_IN_KEY).md5 (NONCE_KEY))), 0, 8);

      $js_ok = false;
      if (file_exists ($script)) {
        if (strpos (file_get_contents ($script), $adb_2_name) !== false) $js_ok = true;
      }

      if (!$js_ok) {
        file_put_contents ($script, 'window.' . $adb_2_name . '=true;');
        define ('AI_ADB_2_FILE_RECREATED', true);
      }
    }

    define ('AI_ADB_2_NAME', $adb_2_name);

    if (function_exists ('ai_check_files')) ai_check_files ();
  }
}

if (function_exists ('ai_load_globals')) ai_load_globals ();

if (get_dynamic_blocks ()) {
  if (!in_array ('w3-total-cache/w3-total-cache.php', get_option ('active_plugins'))) {
    define ('AI_NO_W3TC', true);
    if (!defined ('W3TC_DYNAMIC_SECURITY')) define ('W3TC_DYNAMIC_SECURITY', 'W3 Total Cache plugin not active');
  }
  if (!defined ('W3TC_DYNAMIC_SECURITY')) {
    $string = AD_INSERTER_PLUGIN_DIR;
    if (defined ('AUTH_KEY'))      $string .= AUTH_KEY;
    if (defined ('LOGGED_IN_KEY')) $string .= LOGGED_IN_KEY;

    define ('W3TC_DYNAMIC_SECURITY', md5 ($string));
  }
}


$ai_wp_data [AI_WP_PAGE_TYPE]           = AI_PT_NONE;
$ai_wp_data [AI_WP_AMP_PAGE]            = false;
$ai_wp_data [AI_WP_USER_SET]            = false;
$ai_wp_data [AI_WP_USER]                = AI_USER_NOT_LOGGED_IN;
$ai_wp_data [AI_CONTEXT]                = AI_CONTEXT_NONE;
$ai_wp_data [AI_SERVER_SIDE_DETECTION]  = false;
$ai_wp_data [AI_CLIENT_SIDE_DETECTION]  = false;
$ai_wp_data [AI_TRACKING]               = false;
$ai_wp_data [AI_STICKY_WIDGETS]         = false;

for ($counter = 1; $counter <= AD_INSERTER_BLOCKS; $counter ++) {
  $obj = $block_object [$counter];

  if ($obj->get_detection_server_side())  $ai_wp_data [AI_SERVER_SIDE_DETECTION] = true;
  if ($obj->get_detection_client_side ()) $ai_wp_data [AI_CLIENT_SIDE_DETECTION] = true;

  if ($obj->get_tracking ())              $ai_wp_data [AI_TRACKING] = true;
}

$adH  = $block_object [AI_HEADER_OPTION_NAME];
$adF  = $block_object [AI_FOOTER_OPTION_NAME];
if ($adH->get_detection_server_side())  $ai_wp_data [AI_SERVER_SIDE_DETECTION] = true;
if ($adF->get_detection_server_side())  $ai_wp_data [AI_SERVER_SIDE_DETECTION] = true;

if ($ai_wp_data [AI_SERVER_SIDE_DETECTION]) {
  require_once AD_INSERTER_PLUGIN_DIR.'includes/Mobile_Detect.php';

  $detect = new ai_Mobile_Detect;

  define ('AI_MOBILE',   $detect->isMobile ());
  define ('AI_TABLET',   $detect->isTablet ());
  define ('AI_PHONE',    AI_MOBILE && !AI_TABLET);
  define ('AI_DESKTOP',  !AI_MOBILE);
} else {
    define ('AI_MOBILE',   true);
    define ('AI_TABLET',   true);
    define ('AI_PHONE',    true);
    define ('AI_DESKTOP',  true);
  }

if (isset ($_POST [AI_FORM_SAVE]))
  define ('AI_SYNTAX_HIGHLIGHTING', isset ($_POST ["syntax-highlighter-theme"]) && $_POST ["syntax-highlighter-theme"] != AI_OPTION_DISABLED); else
    define ('AI_SYNTAX_HIGHLIGHTING', get_syntax_highlighter_theme () != AI_OPTION_DISABLED);


add_action ('admin_menu',         'ai_admin_menu_hook');

add_action ('init',               'ai_init_hook');
add_action ('admin_notices',      'ai_admin_notice_hook');

add_action ('wp',                 'ai_wp_hook');

if (function_exists ('ai_system_output_check')) $ai_system_output = ai_system_output_check (); else $ai_system_output = false;

if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0 || $ai_system_output)
  add_action ('shutdown',          'ai_shutdown_hook');

add_action ('widgets_init',       'ai_widgets_init_hook');
add_action ('add_meta_boxes',     'ai_add_meta_box_hook');
add_action ('save_post',          'ai_save_meta_box_data_hook');

if (function_exists ('ai_hooks')) ai_hooks ();

add_filter ('plugin_action_links_'.plugin_basename (__FILE__), 'ai_plugin_action_links');
add_filter ('plugin_row_meta',            'ai_set_plugin_meta', 10, 2);

if (is_admin () === true) {
  add_action ('wp_ajax_ai_ajax_backend', 'ai_ajax_backend');
  add_action ('wp_ajax_ai_ajax',         'ai_ajax');
  add_action ('wp_ajax_nopriv_ai_ajax',  'ai_ajax');
}

if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
  $ai_total_plugin_time += microtime (true) - $start_time;
  ai_log ("INITIALIZATION END\n");
}


function ai_toolbar ($wp_admin_bar) {
  global $block_object, $ai_wp_data;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) == 0) $debug_blocks = 1; else $debug_blocks = 0;
  $debug_blocks_class = $debug_blocks == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) == 0) $debug_positions = 0; else $debug_positions = '';
  $debug_positions_class = $debug_positions === '' ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) == 0) $debug_tags = 1; else $debug_tags = 0;
  $debug_tags_class = $debug_tags == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) == 0) $debug_processing = 1; else $debug_processing = 0;
  $debug_processing_class = $debug_processing == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) $debug_no_insertion = 1; else $debug_no_insertion = 0;
  $debug_no_insertion_class = $debug_no_insertion == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_AD_BLOCKING) == 0) $debug_ad_blocking = 1; else $debug_ad_blocking = 0;
  $debug_ad_blocking_class = $debug_ad_blocking == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_AD_BLOCKING_STATUS) == 0) $debug_ad_blocking_status = 1; else $debug_ad_blocking_status = 0;
  $debug_ad_blocking_status_class = $debug_ad_blocking_status == 0 ? ' on' : '';

  $debug_settings_on = $debug_blocks == 0 || $debug_positions === '' || $debug_tags == 0 || $debug_processing == 0 || $debug_no_insertion == 0 || $debug_ad_blocking == 0 || $debug_ad_blocking_status == 0;

  $debug_settings_class = $debug_settings_on ? ' on' : '';
  $top_menu_url = $debug_settings_on ? add_query_arg (AI_URL_DEBUG, '0', remove_debug_parameters_from_url ()) :
                                       add_query_arg (array (AI_URL_DEBUG_BLOCKS => '1', AI_URL_DEBUG_POSITIONS => '0', AI_URL_DEBUG_TAGS => '1'), remove_debug_parameters_from_url ());

  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar',
    'group' => true
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-settings',
//    'parent' => 'ai-toolbar',
    'title' => '<span class="ab-icon'.$debug_settings_class.'"></span>'.AD_INSERTER_NAME,
    'href' => $top_menu_url,
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-blocks',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_blocks_class.'"></span>Label Blocks',
    'href' => set_url_parameter (AI_URL_DEBUG_BLOCKS, $debug_blocks),
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-positions',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_positions_class.'"></span>Show Positions',
    'href' => set_url_parameter (AI_URL_DEBUG_POSITIONS, $debug_positions),
  ));

  $paragraph_blocks = array ();
  for ($block = 0; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = $block_object [$block];
    $automatic_insertion = $obj->get_automatic_insertion();
    if ($block == 0 || $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH || $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH) {

      $block_tags = trim ($block_object [$block]->get_paragraph_tags ());
      $direction = $block_object [$block]->get_direction_type() == AD_DIRECTION_FROM_TOP ? 't' : 'b';
      $paragraph_min_words = intval ($obj->get_minimum_paragraph_words());
      $paragraph_max_words = intval ($obj->get_maximum_paragraph_words());
      $paragraph_text_type = $obj->get_paragraph_text_type ();
      $paragraph_text = trim (html_entity_decode ($obj->get_paragraph_text()));
      $inside_blockquote = $obj->get_count_inside_blockquote ();

      if ($block_tags != '') {
        $found = false;
        foreach ($paragraph_blocks as $index => $paragraph_block) {
          if ($paragraph_block ['tags']       == $block_tags &&
              $paragraph_block ['direction']  == $direction &&
              $paragraph_block ['min']        == $paragraph_min_words &&
              $paragraph_block ['max']        == $paragraph_max_words &&
              $paragraph_block ['text_type']  == $paragraph_text_type &&
              $paragraph_block ['text']       == $paragraph_text &&
              $paragraph_block ['blockquote'] == $inside_blockquote
             ) {
            $found = true;
            break;
          }
        }
        if ($found) array_push ($paragraph_blocks [$index]['blocks'], $block); else
          $paragraph_blocks []= array ('blocks' => array ($block),
            'tags'        => $block_tags,
            'direction'   => $direction,
            'min'         => $paragraph_min_words,
            'max'         => $paragraph_max_words,
            'text_type'   => $paragraph_text_type,
            'text'        => $paragraph_text,
            'blockquote'  => $inside_blockquote,
          );
      }
    }
  }

  foreach ($paragraph_blocks as $index => $paragraph_block) {
    $block_class = $debug_positions === '' && in_array ($ai_wp_data [AI_WP_DEBUG_BLOCK], $paragraph_block ['blocks']) ? ' on' : '';
    $wp_admin_bar->add_node (array (
      'id' => 'ai-toolbar-positions-'.$index,
      'parent' => 'ai-toolbar-positions',
      'title' => '<span class="ab-icon'.$block_class.'"></span>'.
         $paragraph_block ['tags'].
        ($paragraph_block ['direction'] == 'b' ? ' <span class="dashicons dashicons-arrow-up-alt up-icon"></span>' : '').
        ($paragraph_block ['min'] != 0 ? ' min '.$paragraph_block ['min']. ' ' : '').
        ($paragraph_block ['max'] != 0 ? ' max '.$paragraph_block ['max']. ' ' : '').
        ($paragraph_block ['blockquote']  ? ' [blockquote] ' : '').
        ($paragraph_block ['text'] != '' ? ($paragraph_block ['text_type'] == AD_DO_NOT_CONTAIN ? ' NC ' : ' C ').' ['.htmlentities ($paragraph_block ['text']).']' : ''),
      'href' => set_url_parameter (AI_URL_DEBUG_POSITIONS, $paragraph_block ['blocks'][0]),
    ));
  }

  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-tags',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_tags_class.'"></span>Show HTML Tags',
    'href' => set_url_parameter (AI_URL_DEBUG_TAGS, $debug_tags),
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-no-insertion',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_no_insertion_class.'"></span>Disable Insertion',
    'href' => set_url_parameter (AI_URL_DEBUG_NO_INSERTION, $debug_no_insertion),
  ));
  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    if ($ai_wp_data [AI_ADB_DETECTION]) {
      $wp_admin_bar->add_node (array (
        'id' => 'ai-toolbar-adb-status',
        'parent' => 'ai-toolbar-settings',
        'title' => '<span class="ab-icon'.$debug_ad_blocking_status_class.'"></span>Ad Blocking Status',
        'href' => set_url_parameter (AI_URL_DEBUG_AD_BLOCKING_STATUS, $debug_ad_blocking_status),
      ));
      $wp_admin_bar->add_node (array (
        'id' => 'ai-toolbar-adb',
        'parent' => 'ai-toolbar-settings',
        'title' => '<span class="ab-icon'.$debug_ad_blocking_class.'"></span>Simulate Ad Blocking',
        'href' => set_url_parameter (AI_URL_DEBUG_AD_BLOCKING, $debug_ad_blocking),
      ));
    }
  }
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-processing',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_processing_class.'"></span>Log Processing',
    'href' => set_url_parameter (AI_URL_DEBUG_PROCESSING, $debug_processing),
  ));
}

function set_user () {
  global $ai_wp_data;

  if ($ai_wp_data [AI_WP_USER_SET]) return;

//  $ai_wp_data [AI_WP_USER] = AI_USER_NOT_LOGGED_IN;

  if (is_user_logged_in ())       $ai_wp_data [AI_WP_USER] |= AI_USER_LOGGED_IN;
  if (current_user_role () >= 5)  $ai_wp_data [AI_WP_USER] |= AI_USER_ADMINISTRATOR;

//  if (isset ($_GET [AI_URL_DEBUG_USER]) && $_GET [AI_URL_DEBUG_USER] != 0) $ai_wp_data [AI_WP_USER] = $_GET [AI_URL_DEBUG_USER];

  $ai_wp_data [AI_WP_USER_SET] = true;
}

function set_page_type () {
  global $ai_wp_data;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_NONE) return;

      if (is_front_page ())                                         $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_HOMEPAGE;
  elseif (is_single())                                              $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_POST;
  elseif (is_page())                                                $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_STATIC;
  elseif (is_feed())                                                $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_FEED;
  elseif (is_category())                                            $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_CATEGORY;
  elseif (is_archive() || (is_home () && !is_front_page ()))        $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_ARCHIVE;
  elseif (is_search())                                              $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_SEARCH;
  elseif (is_404())                                                 $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_404;
  elseif (is_admin())                                               $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_ADMIN;

  if (
    // AMP, Accelerated Mobile Pages
    function_exists ('is_amp_endpoint') && is_amp_endpoint () ||

    // WP AMP Ninja
    isset ($_GET ['wpamp']) ||

    // WP AMP - Accelerated Mobile Pages for WordPress
    function_exists ('is_wp_amp') && is_wp_amp ()
  ) {
    $ai_wp_data [AI_WP_AMP_PAGE] = true;
    define ('AI_AMP_PAGE', true);
  }
}

function ai_log_message ($message) {
  global $ai_last_time, $ai_processing_log;
  $ai_processing_log []= rtrim (sprintf ("%4d  %-50s", (microtime (true) - $ai_last_time) * 1000, $message));
}

function ai_log_filter_content ($content_string) {

  $content_string = preg_replace ("/\[\[AI_[A|B]P([\d].?)\]\]/", "", $content_string);
  return str_replace (array ("<!--", "-->", "\n", "\r"), array ("[!--", "--]", "*n", "*r"), $content_string);
}

function ai_log_content (&$content) {
  if (strlen ($content) < 100) ai_log (ai_log_filter_content ($content) . '  ['.number_of_words ($content).']'); else
    ai_log (ai_log_filter_content (html_entity_decode (substr ($content, 0, 60))) . ' ... ' . ai_log_filter_content (html_entity_decode (substr ($content, - 60))) . '  ['.number_of_words ($content).']');
}

function ai_block_insertion_status ($block, $ai_last_check) {
  global $block_object;

  if ($block < 1 || $block > AD_INSERTER_BLOCKS) $block = 0;

  if ($ai_last_check == AI_CHECK_INSERTED) return "INSERTED";
  $status = "FAILED CHECK: ";
  $obj = $block_object [$block];
  switch ($ai_last_check) {
    case AI_CHECK_PAGE_TYPE_FRONT_PAGE:  $status .= "ENABLED ON HOMEPAGE"; break;
    case AI_CHECK_PAGE_TYPE_STATIC_PAGE: $status .= "ENABLED ON STATIC PAGE"; break;
    case AI_CHECK_PAGE_TYPE_POST:        $status .= "ENABLED ON POST"; break;
    case AI_CHECK_PAGE_TYPE_CATEGORY:    $status .= "ENABLED ON CATEGORY"; break;
    case AI_CHECK_PAGE_TYPE_SEARCH:      $status .= "ENABLED ON SEARCH"; break;
    case AI_CHECK_PAGE_TYPE_ARCHIVE:     $status .= "ENABLED ON ARCHIVE"; break;
    case AI_CHECK_PAGE_TYPE_FEED:        $status .= "ENABLED ON FEED"; break;
    case AI_CHECK_PAGE_TYPE_404:         $status .= "ENABLED ON 404"; break;

    case AI_CHECK_DESKTOP_DEVICES:          $status .= "DESKTOP DEVICES"; break;
    case AI_CHECK_MOBILE_DEVICES:           $status .= "MOBILE DEVICES"; break;
    case AI_CHECK_TABLET_DEVICES:           $status .= "TABLET DEVICES"; break;
    case AI_CHECK_PHONE_DEVICES:            $status .= "PHONE DEVICES"; break;
    case AI_CHECK_DESKTOP_TABLET_DEVICES:   $status .= "DESKTOP TABLET DEVICES"; break;
    case AI_CHECK_DESKTOP_PHONE_DEVICES:    $status .= "DESKTOP PHONE DEVICES"; break;

    case AI_CHECK_CATEGORY:                 $status .= "CATEGORY"; break;
    case AI_CHECK_TAG:                      $status .= "TAG"; break;
    case AI_CHECK_TAXONOMY:                 $status .= "TAXONOMY"; break;
    case AI_CHECK_ID:                       $status .= "ID"; break;
    case AI_CHECK_URL:                      $status .= "URL"; break;
    case AI_CHECK_URL_PARAMETER:            $status .= "URL PARAMETER"; break;
    case AI_CHECK_REFERER:                  $status .= "REFERER ". $obj->get_ad_domain_list(); break;
    case AI_CHECK_IP_ADDRESS:               $status .= "IP ADDRESS ". $obj->get_ad_ip_address_list(); break;
    case AI_CHECK_COUNTRY:                  $status .= "COUNTRY ". $obj->get_ad_country_list (true); break;
    case AI_CHECK_SCHEDULING:               $status .= "SCHEDULING"; break;
    case AI_CHECK_CODE:                     $status .= "CODE NOT EMPTY"; break;
    case AI_CHECK_LOGGED_IN_USER:           $status .= "LOGGED-IN USER"; break;
    case AI_CHECK_NOT_LOGGED_IN_USER:       $status .= "NOT LOGGED-IN USER"; break;
    case AI_CHECK_ADMINISTRATOR:            $status .= "ADMINISTRATOR"; break;

    case AI_CHECK_INDIVIDUALLY_DISABLED:    $status .= "INDIVIDUALLY DISABLED"; break;
    case AI_CHECK_INDIVIDUALLY_ENABLED:     $status .= "INDIVIDUALLY ENABLED"; break;
    case AI_CHECK_DISABLED_MANUALLY:        $status .= "DISABLED BY HTML COMMENT"; break;

    case AI_CHECK_MAX_INSERTIONS:           $status .= "MAX INSERTIONS " . $obj->get_maximum_insertions (); break;
    case AI_CHECK_FILTER:                   $status .= ($obj->get_inverted_filter() ? 'INVERTED ' : '') . "FILTER " . $obj->get_call_filter(); break;
    case AI_CHECK_PARAGRAPH_COUNTING:       $status .= "PARAGRAPH COUNTING"; break;
    case AI_CHECK_MIN_NUMBER_OF_WORDS:      $status .= "MIN NUMBER OF WORDS " . intval ($obj->get_minimum_words()); break;
    case AI_CHECK_MAX_NUMBER_OF_WORDS:      $status .= "MAX NUMBER OF WORDS " . (intval ($obj->get_maximum_words()) == 0 ? 1000000 : intval ($obj->get_maximum_words())); break;
    case AI_CHECK_DEBUG_NO_INSERTION:       $status .= "DEBUG NO INSERTION"; break;
    case AI_CHECK_PARAGRAPH_TAGS:           $status .= "PARAGRAPH TAGS"; break;
    case AI_CHECK_PARAGRAPHS_WITH_TAGS:     $status .= "PARAGRAPHS WITH TAGS"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE_FIGURE:       $status .= "PARAGRAPHS AFTER BLOCKQUOTE / FIGURE"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS:    $status .= "PARAGRAPHS AFTER MIN MAX WORDS"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_TEXT:             $status .= "PARAGRAPHS AFTER TEXT"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE:        $status .= "PARAGRAPHS AFTER CLEARANCE"; break;
    case AI_CHECK_PARAGRAPHS_MIN_NUMBER:             $status .= "PARAGRAPHS MIN NUMBER"; break;
    case AI_CHECK_PARAGRAPH_NUMBER:                  $status .= "PARAGRAPH NUMBER " . $obj->get_paragraph_number(); break;

    case AI_CHECK_DO_NOT_INSERT:            $status .= "PARAGRAPH CLEARANCE"; break;
    case AI_CHECK_AD_ABOVE:                 $status .= "PARAGRAPH CLEARANCE ABOVE"; break;
    case AI_CHECK_AD_BELOW:                 $status .= "PARAGRAPH CLEARANCE BELOW"; break;
    case AI_CHECK_SHORTCODE_ATTRIBUTES:     $status .= "SHORTCODE ATTRIBUTES"; break;

    case AI_CHECK_ENABLED:                  $status .= "ENABLED"; break;
    case AI_CHECK_NONE:                     $status = "BLOCK $block"; break;
    default: $status .= "?"; break;
  }
  $ai_last_check = AI_CHECK_NONE;
  return $status;
}

function ai_log_block_status ($block, $ai_last_check) {
  global $block_insertion_log, $ad_inserter_globals;

  if ($block < 1) return 'NO BLOCK SHORTCODE';

  $global_name = AI_BLOCK_COUNTER_NAME . $block;

  $block_status = ai_block_insertion_status ($block, $ai_last_check);
  $block_insertion_log [] = sprintf ("% 2d BLOCK % 2d %s %s", $block, $block, $block_status, $ai_last_check == AI_CHECK_INSERTED && $ad_inserter_globals [$global_name] != 1 ? '['.$ad_inserter_globals [$global_name] . ']' : '');

  return "BLOCK $block " . $block_status;
}

function ai_log ($message = "") {
  global $ai_last_time, $ai_processing_log;

  if ($message != "") {
    if ($message [strlen ($message) - 1] == "\n") {
      ai_log_message (str_replace ("\n", "", $message));
      $ai_processing_log []= "";
    } else ai_log_message ($message);
  } else $ai_processing_log []= "";
  $ai_last_time = microtime (true);
}

function remove_debug_parameters_from_url ($url = false) {
  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    $parameters = array (AI_URL_DEBUG, AI_URL_DEBUG_PROCESSING, AI_URL_DEBUG_BLOCKS, AI_URL_DEBUG_USER, AI_URL_DEBUG_TAGS, AI_URL_DEBUG_POSITIONS, AI_URL_DEBUG_NO_INSERTION, AI_URL_DEBUG_AD_BLOCKING, AI_URL_DEBUG_AD_BLOCKING_STATUS);
  } else
  $parameters = array (AI_URL_DEBUG, AI_URL_DEBUG_PROCESSING, AI_URL_DEBUG_BLOCKS, AI_URL_DEBUG_USER, AI_URL_DEBUG_TAGS, AI_URL_DEBUG_POSITIONS, AI_URL_DEBUG_NO_INSERTION);

  return remove_query_arg ($parameters, $url);
}

function set_url_parameter ($parameter, $value) {
  return add_query_arg ($parameter, $value, remove_debug_parameters_from_url ());
}

function number_of_words (&$content) {
  $text = str_replace ("\r", "", $content);
  $text = str_replace (array ("\n", "  "), " ", $text);
  $text = str_replace ("  ", " ", $text);
  $text = strip_tags ($text);
  if ($text == '') return 0;
  return count (explode (" ", $text));
}

function ai_loop_check ($query, $action) {
  global $ai_wp_data;

  $ai_wp_data [AI_CONTEXT] = $action == 'loop_start' ? AI_CONTEXT_BEFORE_POST : AI_CONTEXT_AFTER_POST;

  if ($ai_wp_data [AI_WP_AMP_PAGE]) return true;

  if (isset ($query) && method_exists ($query, 'is_main_query')) {
    if ($query->is_main_query()) return true;
  }

  return false;
}

function ai_post_check ($post, $action) {
  global $ai_wp_data, $ad_inserter_globals;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST) return false;
  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) return false;

  // Not used on AMP pages (yet)
  if (!$ai_wp_data [AI_WP_AMP_PAGE]) {
    if (!in_the_loop()) return false;
  }

  // Skip insertion before the first post
  if (!defined ('AI_POST_CHECK')) {
    define ('AI_POST_CHECK', true);
    return false;
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_BETWEEN_POSTS;

  return true;;
}

function ai_hook_function_loop_start ($hook_parameter) {
  ai_custom_hook ('loop_start', AI_TEXT_BEFORE_POST, $hook_parameter, 'ai_loop_check');
}

function ai_hook_function_loop_end ($hook_parameter) {
  ai_custom_hook ('loop_end', AI_TEXT_AFTER_POST, $hook_parameter, 'ai_loop_check');
}

function ai_hook_function_post ($hook_parameter) {
  ai_custom_hook ('the_post', AI_TEXT_BETWEEN_POSTS, $hook_parameter, 'ai_post_check');
}

function ai_hook_function_footer () {
  ai_custom_hook ('wp_footer', AI_TEXT_FOOTER);
}


// Code for PHP VERSION >= 5.3.0
//function ai_get_custom_hook_function ($action, $name) {
//  return function () use ($action, $name) {
//    ai_custom_hook ($action, $name);
//  };
//}


// Code for PHP VERSION < 5.3.0
function ai_custom_hook_function_0 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [0]['action'], $ai_custom_hooks [0]['name']);
}

function ai_custom_hook_function_1 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [1]['action'], $ai_custom_hooks [1]['name']);
}

function ai_custom_hook_function_2 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [2]['action'], $ai_custom_hooks [2]['name']);
}

function ai_custom_hook_function_3 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [3]['action'], $ai_custom_hooks [3]['name']);
}

function ai_custom_hook_function_4 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [4]['action'], $ai_custom_hooks [4]['name']);
}

function ai_custom_hook_function_5 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [5]['action'], $ai_custom_hooks [5]['name']);
}

function ai_custom_hook_function_6 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [6]['action'], $ai_custom_hooks [6]['name']);
}

function ai_custom_hook_function_7 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [7]['action'], $ai_custom_hooks [7]['name']);
}

function ai_custom_hook_function_8 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [8]['action'], $ai_custom_hooks [8]['name']);
}

function ai_custom_hook_function_9 () {
  global $ai_custom_hooks;
  ai_custom_hook ($ai_custom_hooks [9]['action'], $ai_custom_hooks [9]['name']);
}


function ai_wp_hook () {
  global $ai_wp_data, $ai_db_options_extract, $ai_total_plugin_time, $ai_walker, $ai_custom_hooks;

  if (defined ('AI_WP_HOOK')) return;
  define ('AI_WP_HOOK', true);

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("WP HOOK START");
    $start_time = microtime (true);
  }

  ai_http_header ();

  set_page_type ();
  set_user ();

  if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_ADMIN &&
      ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0 &&
      get_admin_toolbar_debugging () &&
      (!is_multisite() || is_main_site () || multisite_settings_page_enabled ()))
    add_action ('admin_bar_menu', 'ai_toolbar', 9920);

  $url_debugging = get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0;

  if (!is_admin() || defined ('DOING_AJAX')) {
    if (isset ($_GET [AI_URL_DEBUG]) && $_GET [AI_URL_DEBUG] == 0) {
      if (isset ($_COOKIE ['AI_WP_DEBUGGING'])) {
        unset ($_COOKIE ['AI_WP_DEBUGGING']);
        setcookie ('AI_WP_DEBUGGING', '', time() - (15 * 60), COOKIEPATH);
      }
      if (isset ($_COOKIE ['AI_WP_DEBUG_BLOCK'])) {
        unset ($_COOKIE ['AI_WP_DEBUG_BLOCK']);
        setcookie ('AI_WP_DEBUG_BLOCK', '', time() - (15 * 60), COOKIEPATH);
      }
    } else {
        $ai_wp_data [AI_WP_DEBUGGING]   = isset ($_COOKIE ['AI_WP_DEBUGGING'])   ? $ai_wp_data [AI_WP_DEBUGGING] | ($_COOKIE ['AI_WP_DEBUGGING'] & ~AI_DEBUG_PROCESSING) : $ai_wp_data [AI_WP_DEBUGGING];
        $ai_wp_data [AI_WP_DEBUG_BLOCK] = isset ($_COOKIE ['AI_WP_DEBUG_BLOCK']) ? $_COOKIE ['AI_WP_DEBUG_BLOCK'] : 0;

        if (isset ($_GET [AI_URL_DEBUG_BLOCKS]))
          if ($_GET [AI_URL_DEBUG_BLOCKS] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_BLOCKS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_BLOCKS;

        if (isset ($_GET [AI_URL_DEBUG_TAGS]))
          if ($_GET [AI_URL_DEBUG_TAGS] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_TAGS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_TAGS;

        if (isset ($_GET [AI_URL_DEBUG_NO_INSERTION]))
          if ($_GET [AI_URL_DEBUG_NO_INSERTION] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_NO_INSERTION;

        if (isset ($_GET [AI_URL_DEBUG_AD_BLOCKING_STATUS]))
          if ($_GET [AI_URL_DEBUG_AD_BLOCKING_STATUS] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_AD_BLOCKING_STATUS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_AD_BLOCKING_STATUS;

        if (isset ($_GET [AI_URL_DEBUG_AD_BLOCKING]))
          if ($_GET [AI_URL_DEBUG_AD_BLOCKING] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_AD_BLOCKING; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_AD_BLOCKING;

        if (isset ($_GET [AI_URL_DEBUG_POSITIONS])) {
          if ($_GET [AI_URL_DEBUG_POSITIONS] !== '' && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_POSITIONS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_POSITIONS;
          if (is_numeric ($_GET [AI_URL_DEBUG_POSITIONS])) $ai_wp_data [AI_WP_DEBUG_BLOCK] = intval ($_GET [AI_URL_DEBUG_POSITIONS]);
          if ($ai_wp_data [AI_WP_DEBUG_BLOCK] < 0 || $ai_wp_data [AI_WP_DEBUG_BLOCK] > AD_INSERTER_BLOCKS) $ai_wp_data [AI_WP_DEBUG_BLOCK] = 0;
        }

        if ($ai_wp_data [AI_WP_DEBUGGING] != 0)
          setcookie ('AI_WP_DEBUGGING',   $ai_wp_data [AI_WP_DEBUGGING],   time() + AI_COOKIE_TIME, COOKIEPATH); else
             if (isset ($_COOKIE ['AI_WP_DEBUGGING'])) setcookie ('AI_WP_DEBUGGING', '', time() - (15 * 60), COOKIEPATH);

        if ($ai_wp_data [AI_WP_DEBUG_BLOCK] != 0)
          setcookie ('AI_WP_DEBUG_BLOCK', $ai_wp_data [AI_WP_DEBUG_BLOCK], time() + AI_COOKIE_TIME, COOKIEPATH); else
            if (isset ($_COOKIE ['AI_WP_DEBUG_BLOCK'])) setcookie ('AI_WP_DEBUG_BLOCK', '', time() - (15 * 60), COOKIEPATH);
      }
  }

  $debug_positions             = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0;
  $debug_tags_positions        = ($ai_wp_data [AI_WP_DEBUGGING] & (AI_DEBUG_POSITIONS | AI_DEBUG_TAGS)) != 0;
  $debug_tags_positions_blocks = ($ai_wp_data [AI_WP_DEBUGGING] & (AI_DEBUG_POSITIONS | AI_DEBUG_TAGS | AI_DEBUG_BLOCKS)) != 0;

  $plugin_priority = get_plugin_priority ();

  if (isset ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_tags_positions)
    add_filter ('the_content',        'ai_content_hook', $plugin_priority);

  if (isset ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_tags_positions_blocks)
    add_filter ('the_excerpt',        'ai_excerpt_hook', $plugin_priority);

  if (isset ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
//    add_action ('loop_start',         'ai_loop_start_hook');
    add_action ('loop_start',         'ai_hook_function_loop_start');

  if (isset ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
//    add_action ('loop_end',           'ai_loop_end_hook');
    add_action ('loop_end',           'ai_hook_function_loop_end');

  if (isset ($ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
//    add_action ('the_post',           'ai_post_hook');
    add_action ('the_post',           'ai_hook_function_post');

  if ((isset ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0) ||
      (isset ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0) ||
      (isset ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0) ||
      $debug_positions) {
    $ai_wp_data [AI_NUMBER_OF_COMMENTS] = 0;
    add_filter ('comments_array' ,        'ai_comments_array' , 10, 2);
    add_filter ('wp_list_comments_args' , 'ai_wp_list_comments_args');
    $ai_walker = new ai_Walker_Comment;
  }

  // Code for PHP VERSION >= 5.3.0
//  function ai_get_custom_hook_function ($action, $name) {
//    return function () use ($action, $name) {
//      ai_custom_hook ($action, $name);
//    };
//  }

//  foreach ($ai_custom_hooks as $index => $custom_hook) {
//    if (isset ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
//      add_action ($custom_hook ['action'], ai_get_custom_hook_function ($custom_hook ['action'], $custom_hook ['name']), $custom_hook ['priority']);
//  }

  // Code for PHP VERSION < 5.3.0
//  function ai_custom_hook_function_0 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [0]['action'], $ai_custom_hooks [0]['name']);
//  }

//  function ai_custom_hook_function_1 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [1]['action'], $ai_custom_hooks [1]['name']);
//  }

//  function ai_custom_hook_function_2 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [2]['action'], $ai_custom_hooks [2]['name']);
//  }

//  function ai_custom_hook_function_3 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [3]['action'], $ai_custom_hooks [3]['name']);
//  }

//  function ai_custom_hook_function_4 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [4]['action'], $ai_custom_hooks [4]['name']);
//  }

//  function ai_custom_hook_function_5 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [5]['action'], $ai_custom_hooks [5]['name']);
//  }

//  function ai_custom_hook_function_6 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [6]['action'], $ai_custom_hooks [6]['name']);
//  }

//  function ai_custom_hook_function_7 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [7]['action'], $ai_custom_hooks [7]['name']);
//  }

//  function ai_custom_hook_function_8 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [8]['action'], $ai_custom_hooks [8]['name']);
//  }

//  function ai_custom_hook_function_9 () {
//    global $ai_custom_hooks;
//    ai_custom_hook ($ai_custom_hooks [9]['action'], $ai_custom_hooks [9]['name']);
//  }

  foreach ($ai_custom_hooks as $index => $custom_hook) {
    if ($index > 9) break;

    if (isset ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
      add_action ($custom_hook ['action'], 'ai_custom_hook_function_' . $index, $custom_hook ['priority']);
  }



  if ($ai_wp_data [AI_WP_AMP_PAGE] ) {
    // AMP, Accelerated Mobile Pages
    add_action ('amp_post_template_head', 'ai_amp_head_hook');

    // WP AMP Ninja
    add_action ('wpamp_custom_script',    'ai_amp_head_hook');

    // WP AMP - Accelerated Mobile Pages for WordPress
    add_action ('amphtml_template_head',  'ai_amp_head_hook');
  } else
  // WP
  add_action ('wp_head',                  'ai_wp_head_hook');

  $automatic_insertion_footer_hook = isset ($ai_db_options_extract [FOOTER_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [FOOTER_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions;
  if ($ai_wp_data [AI_WP_AMP_PAGE]) {
    // AMP, Accelerated Mobile Pages
    if ($automatic_insertion_footer_hook)
      add_action ('amp_post_template_footer',     'ai_hook_function_footer');
    add_action ('amp_post_template_footer',     'ai_amp_footer_hook');

    // WP AMP Ninja
    if ($automatic_insertion_footer_hook)
      add_action ('wpamp_google_analytics_code',  'ai_hook_function_footer');
    add_action ('wpamp_google_analytics_code',  'ai_amp_footer_hook');

    // WP AMP - Accelerated Mobile Pages for WordPress
    if ($automatic_insertion_footer_hook)
      add_action ('amphtml_after_footer',         'ai_hook_function_footer');
    add_action ('amphtml_after_footer',         'ai_amp_footer_hook');
  } else {
      // WP
      if ($automatic_insertion_footer_hook)
        add_action ('wp_footer', 'ai_hook_function_footer');
      add_action ('wp_footer', 'ai_wp_footer_hook');
    }


  if ($ai_wp_data [AI_WP_AMP_PAGE]) {
    // No scripts on AMP pages
    if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
      $ai_wp_data [AI_ADB_DETECTION] = false;
      $ai_wp_data [AI_TRACKING]      = false;
    }
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("WP HOOK END\n");
  }
};

function ai_init_hook() {
  global $block_object, $ai_wp_data, $ai_db_options_extract;

  if (defined ('DOING_AJAX') && DOING_AJAX) {
    $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_AJAX;

    ai_wp_hook ();
  }

  add_shortcode ('adinserter', 'process_shortcodes_lc');
  add_shortcode ('ADINSERTER', 'process_shortcodes_uc');
}

function ai_admin_menu_hook () {
  global $ai_settings_page;

  if (is_multisite() && !is_main_site () && !multisite_settings_page_enabled ()) return;

  $ai_settings_page = add_submenu_page ('options-general.php', AD_INSERTER_NAME.' Options', AD_INSERTER_NAME, 'manage_options', basename(__FILE__), 'ai_settings');
  add_action ('admin_enqueue_scripts',  'ai_admin_enqueue_scripts');
//  add_action ('admin_head',             'ai_admin_head');
  add_filter ('clean_url',              'ai_clean_url', 999999, 2);
}

function ai_admin_head () {
  global $ai_settings_page, $hook_suffix;

//  if ($hook_suffix == $ai_settings_page && wp_is_mobile()) {
//    echo "<meta name='viewport' content='width=762'>\n";
//  }
}

function ai_admin_enqueue_scripts ($hook_suffix) {
  global $ai_settings_page;

  if ($hook_suffix == $ai_settings_page) {
    wp_enqueue_style  ('ai-admin-jquery-ui', plugins_url ('css/jquery-ui-1.10.3.custom.min.css', __FILE__), array (), null);

    if (function_exists ('ai_admin_enqueue_scripts_1')) ai_admin_enqueue_scripts_1 ();

    wp_enqueue_style  ('ai-image-picker',    plugins_url ('css/image-picker.css', __FILE__),                array (), AD_INSERTER_VERSION);
    wp_add_inline_style ('ai-image-picker', '.thumbnail {border-radius: 6px;}');
    wp_enqueue_style  ('ai-admin-css',       plugins_url ('css/ad-inserter.css', __FILE__),                 array (), AD_INSERTER_VERSION);

    wp_add_inline_style ('ai-admin-css', '.notice {margin: 5px 15px 15px 0;}');

    if (function_exists ('ai_admin_enqueue_scripts_2')) ai_admin_enqueue_scripts_2 ();

    // Located in the header to load  datepicker js file to prevent error when async tags used
    wp_enqueue_script ('ai-image-picker-js', plugins_url ('includes/js/image-picker.min.js', __FILE__ ),    array (
      'jquery',
      'jquery-ui-datepicker',
    ), AD_INSERTER_VERSION, false);

    if (AI_SYNTAX_HIGHLIGHTING) {
      wp_enqueue_script ('ai-ace',           plugins_url ('includes/ace/ace.js', __FILE__ ),                array (), AD_INSERTER_VERSION, true);
//      wp_enqueue_script ('ai-ace-ext-modelist', plugins_url ('includes/ace/ext-modelist.js', __FILE__ ),    array (), AD_INSERTER_VERSION, true);
      wp_enqueue_script ('ai-ace-html',      plugins_url ('includes/ace/mode-html.js', __FILE__ ),          array (), AD_INSERTER_VERSION, true);
      wp_enqueue_script ('ai-ace-php',       plugins_url ('includes/ace/mode-php.js',  __FILE__ ), array (), AD_INSERTER_VERSION, true);

      if (get_syntax_highlighter_theme () == AI_SYNTAX_HIGHLIGHTER_THEME || isset ($_POST ["syntax-highlighter-theme"]) && $_POST ["syntax-highlighter-theme"] == AI_SYNTAX_HIGHLIGHTER_THEME)
        wp_enqueue_script ('ai-ace-theme',   plugins_url ('includes/ace/theme-ad_inserter.js', __FILE__ ),  array (), AD_INSERTER_VERSION, true);
    }

    wp_enqueue_script ('ai-admin-js',        plugins_url ('js/ad-inserter.js', __FILE__), array (
      'jquery',
      'jquery-ui-tabs',
      'jquery-ui-button',
      'jquery-ui-tooltip',
      'jquery-ui-datepicker',
      'jquery-ui-dialog',
     ), AD_INSERTER_VERSION, true);
  }

  wp_enqueue_style  ('ai-admin-css-gen',   plugins_url ('css/ai-admin.css', __FILE__),                      array (), AD_INSERTER_VERSION);
  wp_enqueue_script ('ai-admin-js-gen',    plugins_url ('includes/js/ai-admin.js', __FILE__ ),              array (), AD_INSERTER_VERSION, true);
}

function ai_clean_url ( $url, $original_url){
  if (strpos ($url, 'async=') !== false && strpos ($url, '/plugins/ad-inserter') !== false) {
//    $url = $original_url;
    $url = str_replace ("' async='async", '', $url);
  }
 return $url;
}

function add_head_inline_styles_and_scripts () {
  global $ai_wp_data;

  if ($ai_wp_data [AI_CLIENT_SIDE_DETECTION] || get_admin_toolbar_debugging () && (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0)) {
    // No scripts on AMP pages
    echo "<style type='text/css'>\n";

    if ($ai_wp_data [AI_CLIENT_SIDE_DETECTION]) echo get_viewport_css ();

    if (get_admin_toolbar_debugging () && (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0))
      echo "#wp-admin-bar-ai-toolbar-settings .ab-icon:before {
  content: '\\f111';
  top: 2px;
  color: rgba(240,245,250,.6)!important;
}
#wp-admin-bar-ai-toolbar-settings-default .ab-icon:before {
  top: 0px;
}
#wp-admin-bar-ai-toolbar-settings .ab-icon.on:before {
  color: #00f200!important;
}
#wp-admin-bar-ai-toolbar-settings-default li, #wp-admin-bar-ai-toolbar-settings-default a,
#wp-admin-bar-ai-toolbar-settings-default li:hover, #wp-admin-bar-ai-toolbar-settings-default a:hover {
  border: 1px solid transparent;
}
#wp-admin-bar-ai-toolbar-blocks .ab-icon:before {
  content: '\\f135';
}
#wp-admin-bar-ai-toolbar-positions .ab-icon:before {
  content: '\\f207';
}
#wp-admin-bar-ai-toolbar-positions-default .ab-icon:before {
  content: '\\f522';
}
#wp-admin-bar-ai-toolbar-tags .ab-icon:before {
  content: '\\f475';
}
#wp-admin-bar-ai-toolbar-no-insertion .ab-icon:before {
  content: '\\f214';
}
#wp-admin-bar-ai-toolbar-adb-status .ab-icon:before {
  content: '\\f223';
}
#wp-admin-bar-ai-toolbar-adb .ab-icon:before {
  content: '\\f160';
}
#wp-admin-bar-ai-toolbar-processing .ab-icon:before {
  content: '\\f464';
}
#wp-admin-bar-ai-toolbar-positions span.up-icon {
  padding-top: 2px;
}
#wp-admin-bar-ai-toolbar-positions .up-icon:before {
  font: 400 20px/1 dashicons;
}
";

    echo "</style>\n";
    // No scripts on AMP pages
  }
}

function ai_get_js ($js_name, $replace_js_data = true) {
  global $ai_wp_data;

  if ($ai_wp_data [AI_JS_DEBUGGING]) {
    $script = file_get_contents (AD_INSERTER_PLUGIN_DIR."includes/js/$js_name.js");
  } else $script = file_get_contents (AD_INSERTER_PLUGIN_DIR."includes/js/$js_name.min.js");
  if (!$replace_js_data) return $script;
  return ai_replace_js_data ($script, $js_name);
}

function ai_replace_js_data ($js) {
  global $block_object, $ai_wp_data;

  if (preg_match_all ('/AI_CONST_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $constant) {
      if (defined ($constant))
        $js = str_replace ($match [0][$index], constant ($constant), $js);
    }
  }

  if (preg_match_all ('/AI_DATA_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $constant) {
      if (defined ($constant) && isset ($ai_wp_data [constant ($constant)]))
        $js = str_replace ($match [0][$index], $ai_wp_data [constant ($constant)], $js);
    }
  }

  if (preg_match_all ('/AI_DATAB_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $constant) {
      if (defined ($constant) && isset ($ai_wp_data [constant ($constant)]))
        $js = str_replace ($match [0][$index], $ai_wp_data [constant ($constant)] ? 1 : 0, $js);
    }
  }

  if (preg_match_all ('/AI_DBG_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $constant) {
      if (defined ($constant))
        $js = str_replace ($match [0][$index], ($ai_wp_data [AI_WP_DEBUGGING] & constant ($constant)) != 0 ? 1 : 0, $js);
    }
  }

  if (preg_match_all ('/AI_FUNC_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $function) {
      $function = strtolower ($function);
      if (function_exists ($function))
        $js = str_replace ($match [0][$index], call_user_func ($function), $js);
    }
  }

  if (preg_match_all ('/AI_FUNCB_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $function) {
      $function = strtolower ($function);
      if (function_exists ($function))
        $js = str_replace ($match [0][$index], call_user_func ($function) ? 1 : 0, $js);
    }
  }

  if (preg_match_all ('/AI_FUNCT_([_A-Z0-9]+)/', $js, $match)) {
    foreach ($match [1] as $index => $function) {
      $function = strtolower ($function);
      if (function_exists ($function))
        $js = str_replace ($match [0][$index], call_user_func ($function, true), $js);
    }
  }

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    if (strpos ($js, 'AI_ADB_STATUS_MESSAGE') !== false) {
      $adb = $block_object [AI_ADB_MESSAGE_OPTION_NAME];

      $js = str_replace ('AI_ADB_OVERLAY_WINDOW', "jQuery ('<div>', {attr: {'style': '" . str_replace (array ("'", "\r", "\n"), array ("\'", '', ''), AI_BASIC_ADB_OVERLAY_CSS) . get_overlay_css () . "'}})", $js);
      $js = str_replace ('AI_ADB_MESSAGE_WINDOW', "jQuery ('<div>', {attr: {'style': '" . str_replace (array ("'", "\r", "\n"), array ("\'", '', ''), AI_BASIC_ADB_MESSAGE_CSS) . get_message_css () . "'}, html: '" .
        str_replace (array ("'", "\r", "\n"), array ("\'", '', ''), do_shortcode ($adb->ai_getCode ())) . "'});", $js);
      $js = str_replace ('AI_ADB_SELECTORS', str_replace (' ', '', get_adb_selectors ()), $js);

      $redirection_page = get_redirection_page ();
      if ($redirection_page != 0) $url = get_permalink ($redirection_page); else $url = trim (get_custom_redirection_url ());
      $js = str_replace ('AI_ADB_REDIRECTION_PAGE', $url, $js);

      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_AD_BLOCKING_STATUS) != 0) {
        $js = str_replace ('var AI_ADB_STATUS_MESSAGE=1', '$("#ai-adb-status").text ("DETECTED, " + d1 + " PAGE VIEW" + (d1 == 1 ? "" : "S") + " - NO ACTION");', $js);
        $js = str_replace ('var AI_ADB_STATUS_MESSAGE=2', '$("#ai-adb-status").text ("DETECTED, COOKIE DETECTED - NO ACTION");', $js);
        $js = str_replace ('var AI_ADB_STATUS_MESSAGE=3', '$("#ai-adb-status").text ("DETECTED - ACTION");', $js);
        $js = str_replace ('var AI_ADB_STATUS_MESSAGE=4', 'jQuery("#ai-adb-status").text ("NOT DETECTED");', $js);
        $js = str_replace ('var AI_ADB_STATUS_MESSAGE=5', '$("#ai-adb-status").text ("COOKIES DELETED");', $js);
      } else {
          $js = str_replace ('var AI_ADB_STATUS_MESSAGE=1', '', $js);
          $js = str_replace ('var AI_ADB_STATUS_MESSAGE=2', '', $js);
          $js = str_replace ('var AI_ADB_STATUS_MESSAGE=3', '', $js);
          $js = str_replace ('var AI_ADB_STATUS_MESSAGE=4', '{}', $js);
          $js = str_replace ('var AI_ADB_STATUS_MESSAGE=5', '', $js);
        }
    }
  }

  $js = str_replace ('AI_NONCE', wp_create_nonce ("adinserter_data"), $js);
  $js = str_replace ('AI_SITE_URL', wp_make_link_relative (get_site_url()), $js);
  if (defined ('AI_STATISTICS') && AI_STATISTICS) {
    $js = str_replace ('AI_TRACK_PAGEVIEWS',          get_track_pageviews () == AI_TRACKING_ENABLED         ? 1 : 0, $js);
    $js = str_replace ('AI_ADVANCED_CLICK_DETECTION', get_click_detection () == AI_CLICK_DETECTION_ADVANCED ? 1 : 0, $js);

    if (!isset ($ai_wp_data [AI_VIEWPORTS])) {
      $viewports = array ();
      for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
        $viewport_name  = get_viewport_name ($viewport);
        $viewport_width = get_viewport_width ($viewport);
        if ($viewport_name != '') $viewports [$viewport] = $viewport_width;
      }
      $ai_wp_data [AI_VIEWPORTS] = $viewports;
    }
    $js = str_replace ('AI_VIEWPORTS', '[' . implode (',', $ai_wp_data [AI_VIEWPORTS]) . ']', $js);
  }
  $js = str_replace ('AI_BLOCK_CLASS_NAME', get_block_class_name () != '' ? get_block_class_name () : DEFAULT_BLOCK_CLASS_NAME, $js);

  if (function_exists ('ai_replace_js_data_2')) ai_replace_js_data_2 ($js);

  return $js;
}

function ai_adb_code () {
  return ai_get_js ('ai-adb', false);
}

function add_footer_inline_scripts () {
  global $ai_wp_data, $block_object;

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {

    if ($ai_wp_data [AI_ADB_DETECTION]) {
      if (function_exists ('add_footer_inline_scripts_1')) add_footer_inline_scripts_1 (); else {
        echo '<div id="banner-advert-container" class="ad-inserter chitika-ad" style="position:absolute; z-index: -10; height: 1px; width: 1px; top: -1px; left: - 1;"><img id="adsense" class="SponsorAds adsense" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></div>', "\n";
        echo "<script type='text/javascript' src='", plugins_url ('includes/js/ads.js',       __FILE__ ), "?ver=", rand (1, 9999999), "'></script>\n";
        echo "<script type='text/javascript' src='", plugins_url ('includes/js/sponsors.js',  __FILE__ ), "?ver=", rand (1, 9999999), "'></script>\n";
      }
    }

  }

  $inline_scripts = get_dynamic_blocks () == AI_DYNAMIC_BLOCKS_CLIENT_SIDE || $ai_wp_data [AI_TRACKING] || $ai_wp_data [AI_STICKY_WIDGETS] || (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION && $ai_wp_data [AI_ADB_DETECTION]);

  if ($ai_wp_data [AI_STICKY_WIDGETS] && get_sticky_widget_mode() == AI_STICKY_WIDGET_MODE_JS) {
//    echo "<script type='text/javascript' src='", plugins_url ('includes/js/ResizeSensor.min.js', __FILE__ ), "?ver=", AD_INSERTER_VERSION, "'></script>\n";
    echo "<script type='text/javascript' src='", plugins_url ('includes/js/theia-sticky-sidebar.min.js', __FILE__ ), "?ver=", AD_INSERTER_VERSION, "'></script>\n";
  }

  if ($inline_scripts) echo "<script type='text/javascript'>\n";

  if (get_dynamic_blocks () == AI_DYNAMIC_BLOCKS_CLIENT_SIDE) {
    echo ai_get_js ('ai-rotate');
  }

  if ($ai_wp_data [AI_STICKY_WIDGETS]) {
    echo ai_get_js ('ai-sticky');
  }

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    if ($ai_wp_data [AI_ADB_DETECTION]) {
      if (!function_exists ('add_footer_inline_scripts_2')) echo ai_replace_js_data (ai_adb_code ());
    }
  }

  if (function_exists ('add_footer_inline_scripts_2')) {
    add_footer_inline_scripts_2 ();
  }

  if ($inline_scripts) echo "\n</script>\n";
}

function ai_admin_notice_hook () {
  global $current_screen, $ai_db_options, $ai_wp_data, $ai_db_options_extract;

//  $sidebar_widgets = wp_get_sidebars_widgets();
//  $sidebars_with_deprecated_widgets = array ();

//  foreach ($sidebar_widgets as $sidebar_widget_index => $sidebar_widget) {
//    if (is_array ($sidebar_widget))
//      foreach ($sidebar_widget as $widget) {
//        if (preg_match ("/ai_widget([\d]+)/", $widget, $widget_number)) {
//          if (isset ($widget_number [1]) && is_numeric ($widget_number [1])) {
//            $is_widget = $ai_db_options [$widget_number [1]][AI_OPTION_AUTOMATIC_INSERTION] == AD_SELECT_WIDGET;
//          } else $is_widget = false;
//          $sidebar_name = $GLOBALS ['wp_registered_sidebars'][$sidebar_widget_index]['name'];
//          if ($is_widget && $sidebar_name != "")
//            $sidebars_with_deprecated_widgets [$sidebar_widget_index] = $sidebar_name;
//        }
//      }
//  }

//  if (!empty ($sidebars_with_deprecated_widgets)) {
//    echo "<div class='notice notice-warning'><p><strong>Warning</strong>: You are using deprecated Ad Inserter widgets in the following sidebars: ",
//    implode (", ", $sidebars_with_deprecated_widgets),
//    ". Please replace them with the new 'Ad Inserter' code block widget. See <a href='https://wordpress.org/plugins/ad-inserter/faq/' target='_blank'>FAQ</a> for details.</p></div>";
//  }

  if (function_exists ('ai_admin_notices')) ai_admin_notices (); else {
    if (is_super_admin () && !wp_is_mobile () && isset ($ai_wp_data [AI_DAYS_SINCE_INSTAL])) {

      if ((get_option ('ai-notice-review') === false  && $ai_db_options_extract [AI_EXTRACT_USED_BLOCKS] >=  6 && $ai_wp_data [AI_DAYS_SINCE_INSTAL] > 10) ||

          (get_option ('ai-notice-review') == 'later' && ($ai_db_options_extract [AI_EXTRACT_USED_BLOCKS] >= 12 && $ai_wp_data [AI_DAYS_SINCE_INSTAL] > 30 ||
                                                          $ai_db_options_extract [AI_EXTRACT_USED_BLOCKS] >=  8 && $ai_wp_data [AI_DAYS_SINCE_INSTAL] > 60))) {

        if (get_option ('ai-notice-review') == 'later') {
               $message = "Hey, you are now using <strong>{$ai_db_options_extract [AI_EXTRACT_USED_BLOCKS]} Ad Inserter</strong> code blocks.";
               $option = '<div class="ai-notice-text-button ai-notice-dismiss" data-notice="no">No, thank you.</div>';
        } else {
            $message = "Hey, you've been using <strong>Ad Inserter</strong> for a while now, and I hope you're happy with it.";
            $option = '<div class="ai-notice-text-button ai-notice-dismiss" data-notice="later">Not now, maybe later.</div>';
          }
?>
    <div class="notice notice-info ai-notice ai-no-phone" style="display: none;" data-notice="review" nonce="<?php echo wp_create_nonce ("adinserter_data"); ?>" >
      <div class="ai-notice-element">
        <img src="<?php echo AD_INSERTER_PLUGIN_IMAGES_URL; ?>icon-50x50.jpg" style="width: 50px; margin: 5px 10px 0px 10px;" />
      </div>
      <div class="ai-notice-element" style="width: 100%; padding: 0 10px 0;">
        <p><?php echo $message; ?>
          I would really appreciate it if you could give the plugin a 5-star rating on WordPres.<br />
          Positive reviews are a great incentive to fix bugs and to add new features for better monetization of your website.
          Thank you! - Igor
        </p>
      </div>
      <div class="ai-notice-element ai-notice-buttons last">
        <button class="button-primary ai-notice-dismiss" data-notice="yes">
          <a href="https://wordpress.org/support/plugin/ad-inserter/reviews/" class="ai-notice-dismiss" target="_blank" data-notice="yes">Rate Ad Inserter</a>
        </button>
        <?php echo $option; ?>
        <div class="ai-notice-text-button ai-notice-dismiss" data-notice="already">I already did.</div>
      </div>
    </div>

<?php
      }
    }
  }

}

function ai_plugin_action_links ($links) {
  if (is_multisite() && !is_main_site () && !multisite_settings_page_enabled ()) return $links;

  $settings_link = '<a href="'.admin_url ('options-general.php?page=ad-inserter.php').'">Settings</a>';
  array_unshift ($links, $settings_link);
  return $links;
}

function ai_set_plugin_meta ($links, $file) {
  if ($file == plugin_basename (__FILE__)) {
    if (is_multisite() && !is_main_site ()) {
      foreach ($links as $index => $link) {
        if (stripos ($link, "update") !== false) unset ($links [$index]);
      }
    }
//    if (stripos (AD_INSERTER_NAME, "pro") === false) {
//      $new_links = array ('donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4" target="_blank">Donate</a>');
//      $links = array_merge ($links, $new_links);
//    }
  }
  return $links;
}


function current_user_role ($user_role_name = "") {
  $role_values = array ("super-admin" => 6, "administrator" => 5, "editor" => 4, "author" => 3, "contributor" => 2, "subscriber" => 1);
  global $wp_roles;

  if ($user_role_name != "") {
    return isset ($role_values [$user_role_name]) ? $role_values [$user_role_name] : 0;
  }

  $user_role = 0;
  $current_user = wp_get_current_user();
  $roles = $current_user->roles;

  // Fix for empty roles
  if (isset ($current_user->caps) && count ($current_user->caps) != 0) {
    $caps = $current_user->caps;
    foreach ($role_values as $role_name => $role_value) {
      if (isset ($caps [$role_name]) && $caps [$role_name]) $roles []= $role_name;
    }
  }

  foreach ($roles as $role) {
    $current_user_role = isset ($role_values [$role]) ? $role_values [$role] : 0;
    if ($current_user_role > $user_role) $user_role = $current_user_role;
  }

  return $user_role;
}


function ai_current_user_role_ok () {
  return current_user_role () >= current_user_role (get_minimum_user_role ());
}


function ai_add_meta_box_hook() {

  if (!ai_current_user_role_ok ()) return;

  if (is_multisite() && !is_main_site () && !multisite_exceptions_enabled ()) return;

  $screens = array ('post', 'page');

  $args = array (
    'public'    => true,
    '_builtin'  => false
  );
  $custom_post_types = get_post_types ($args, 'names', 'and');
  $screens = array_values (array_merge ($screens, $custom_post_types));

  foreach ($screens as $screen) {
    add_meta_box (
      'adinserter_sectionid',
      AD_INSERTER_NAME.' Individual Exceptions',
      'ai_meta_box_callback',
      $screen
    );
  }
}

function ai_meta_box_callback ($post) {
  global $block_object;

  // Add an nonce field so we can check for it later.
  wp_nonce_field ('adinserter_meta_box', 'adinserter_meta_box_nonce');

  $post_type        = get_post_type ($post);
  $post_type_object = get_post_type_object ($post_type);
  $page_type_name   = $post_type_object->labels->name;
  $page_type_name1  = $post_type_object->labels->singular_name;

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $post_meta = get_post_meta ($post->ID, '_adinserter_block_exceptions', true);
  $selected_blocks = explode (",", $post_meta);

  ob_start ();

  echo '<table>';
  echo '<thead style="font-weight: bold;">';
    echo '  <td>Block</td>';
    echo '  <td style="padding: 0 10px 0 10px;">Name</td>';
    echo '  <td style="padding: 0 10px 0 10px;">Automatic Insertion</td>';

    if ($post_type == 'page')
      echo '  <td style="padding: 0 10px 0 10px;">Default insertion for pages</td>'; else
        echo '  <td style="padding: 0 10px 0 10px;">Default insertion for posts</td>';

    echo '  <td style="padding: 0 10px 0 10px;">For this ', $page_type_name1, '</td>';
  echo '</thead>';
  echo '<tbody>';
  $rows = 0;
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = $block_object [$block];

    if ($post_type == 'page') {
      $page_name = 'pages';
      $enabled_on = $obj->get_ad_enabled_on_which_pages ();
      $general_enabled = $obj->get_display_settings_page();
    } else {
        $page_name = 'posts';
        $enabled_on  = $obj->get_ad_enabled_on_which_posts ();
        $general_enabled  = $obj->get_display_settings_post();
      }

    if (!$general_enabled || $enabled_on == AI_NO_INDIVIDUAL_EXCEPTIONS) continue;

    $individual_option_enabled  = $general_enabled && ($enabled_on == AI_INDIVIDUALLY_DISABLED || $enabled_on == AI_INDIVIDUALLY_ENABLED);
    $individual_text_enabled    = $enabled_on == AI_INDIVIDUALLY_DISABLED;

    if ($rows % 2 != 0) $background = "#F0F0F0"; else $background = "#FFF";
    echo '<tr style="background: ', $background, ';">';
    echo '  <td style="text-align: right;">', $obj->number, '</td>';
    if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($block); else $url_parameters = "";
    echo '  <td style="padding: 0 10px 0 10px;"><a href="', admin_url ('options-general.php?page=ad-inserter.php'), $url_parameters, '&tab=', $block, '" style="text-decoration: none; box-shadow: 0 0 0;" target="_blank">', $obj->get_ad_name(), '</a></td>';
    echo '  <td style="padding: 0 10px 0 10px;">', $obj->get_automatic_insertion_text(), '</td>';
    echo '  <td style="padding: 0 10px 0 10px; text-align: left;">';

    if ($individual_option_enabled) {
      if ($individual_text_enabled) echo 'Enabled'; else echo 'Disabled';
    } else {
        if ($general_enabled) echo 'Enabled on all ', $page_name; else
          echo 'Disabled on all ', $page_name;
      }
    echo '  </td>';
    echo '  <td style="padding: 0 10px 0 10px; text-align: left;">';

    if ($individual_option_enabled) {
      echo '<input type="checkbox" style="border-radius: 5px;" name="adinserter_selected_block_', $block, '" id="ai-selected-block-', $block, '" value="1"', in_array ($block, $selected_blocks) ? ' checked': '', ' />';
      echo '<label for="ai-selected-block-', $block, '">';
      if (!$individual_text_enabled) echo 'Enabled'; else echo 'Disabled';
      echo '</label>';
    } else {
        if (in_array ($block, $selected_blocks)) {
          echo '<span style="margin-left: 6px;">&bull;</span>';
        }
      }

    echo '  </td>';
    echo '</tr>';
    $rows ++;
  }

  echo '</tbody>';
  echo '</table>';

  $exceptions_table = ob_get_clean ();

  if ($rows == 0) {
    echo '<p><strong>No individual exceptions enabled for ', $page_name, '</strong>.</p>';
  } else echo $exceptions_table;

  echo '<p>Default insertion for ', $page_name, ' for each code block can be configured on <a href="', admin_url ('options-general.php?page=ad-inserter.php'), '" style="text-decoration: none; box-shadow: 0 0 0;" target="_blank">',
  AD_INSERTER_NAME, ' Settings</a> page - selection next to <strong>Posts</strong> / <strong>Static pages</strong> checkbox.<br />',
  'Default value is <strong>blank</strong> and means no individual exceptions (even if previously defined here).<br />',
  'Set to <strong>Individually disabled</strong> or <strong>Individually enabled</strong> to enable individual exception settings on this page.<br />',
  'For more information check <a href="https://adinserter.pro/exceptions" style="text-decoration: none; box-shadow: 0 0 0;" target="_blank">Ad Inserter Exceptions</a>.</p>';
}

function ai_save_meta_box_data_hook ($post_id) {
  // Check if our nonce is set.
  if (!isset ($_POST ['adinserter_meta_box_nonce'])) return;

  // Verify that the nonce is valid.
  if (!wp_verify_nonce ($_POST ['adinserter_meta_box_nonce'], 'adinserter_meta_box')) return;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if (defined ('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  // Check the user's permissions.

  if (isset ($_POST ['post_type'])) {
    if ($_POST ['post_type'] == 'page') {
      if (!current_user_can ('edit_page', $post_id)) return;
    } else {
      if (!current_user_can ('edit_post', $post_id)) return;
    }
  }

  /* OK, it's safe for us to save the data now. */

  $selected = array ();
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $option_name = 'adinserter_selected_block_' . $block;
    if (isset ($_POST [$option_name]) && $_POST [$option_name]) $selected []= $block;
  }

  // Update the meta field in the database.
  update_post_meta ($post_id, '_adinserter_block_exceptions', implode (",", $selected));
}

function ai_widgets_init_hook () {
  if (is_multisite() && !is_main_site () && !multisite_widgets_enabled ()) return;
  register_widget ('ai_widget');
}

function get_page_type_debug_info ($text = '') {
  global $ai_wp_data;

  switch ($ai_wp_data [AI_WP_PAGE_TYPE]) {
    case AI_PT_STATIC:
      $page_type = 'STATIC PAGE';
      break;
    case AI_PT_POST:
      $page_type = 'POST';
      break;
    case AI_PT_HOMEPAGE:
      $page_type = 'HOMEPAGE';
      break;
    case AI_PT_CATEGORY:
      $page_type = 'CATEGORY PAGE';
      break;
    case AI_PT_SEARCH:
      $page_type = 'SEARCH PAGE';
      break;
    case AI_PT_ARCHIVE:
      $page_type = 'ARCHIVE PAGE';
      break;
    case AI_PT_404:
      $page_type = 'ERROR 404 PAGE';
      break;
    case AI_PT_AJAX:
      $page_type = 'AJAX CALL';
      break;
    default:
      $page_type = 'UNKNOWN PAGE TYPE';
      break;
  }
  $style = AI_DEBUG_PAGE_TYPE_STYLE;

  $page_type = "<section style='$style'>".$text.$page_type."</section>";;

  return $page_type;
}

function get_adb_status_debug_info () {
  global $ai_wp_data;

  $page_type = '';

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    if ($ai_wp_data [AI_ADB_DETECTION]) {
      $page_type = "<section id='ai-adb-bar' style='".AI_DEBUG_ADB_STYLE."' title='Click to delete ad blocking detection cokies'>AD BLOCKING <span id='ai-adb-status'>STATUS UNKNOWN</span></section>";
    }
  }

  return $page_type;
}


function ai_http_header () {
  global $block_object, $ai_wp_data;

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_HTTP_HEADER;

  $obj = $block_object [AI_HEADER_OPTION_NAME];
  $obj->clear_code_cache ();

  if ($obj->get_enable_manual ()) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_404 || $obj->get_enable_404()) {
      $processed_code = do_shortcode ($obj->ai_getCode ());

      if (strpos ($processed_code, AD_HTTP_SEPARATOR) !== false) {
        $codes = explode (AD_HTTP_SEPARATOR, $processed_code);
        $processed_code = $codes [0];
      } else $processed_code = '';

      $header_lines = explode ("\n", $processed_code);
      foreach ($header_lines as $header_line) {
        if (trim ($header_line) != '' && strpos ($header_line, ':') !== false)
          header (trim ($header_line));
      }
    }
  }
}

function ai_wp_head_hook () {
  global $block_object, $ai_wp_data, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("HEAD HOOK START");
    $start_time = microtime (true);
  }

  add_head_inline_styles_and_scripts ();

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_NONE;

  $obj = $block_object [AI_HEADER_OPTION_NAME];
//  $obj->clear_code_cache ();  // cleared at ai_http_header

  if (!$obj->check_server_side_detection ()) return;

  if ($obj->get_enable_manual ()) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_404 || $obj->get_enable_404()) {
      $processed_code = do_shortcode ($obj->ai_getCode ());

      if (strpos ($processed_code, AD_HTTP_SEPARATOR) !== false) {
        $codes = explode (AD_HTTP_SEPARATOR, $processed_code);
        $processed_code = ltrim ($codes [1]);
      }

      if (strpos ($processed_code, AD_AMP_SEPARATOR) !== false) {
        $codes = explode (AD_AMP_SEPARATOR, $processed_code);
        $processed_code = $codes [0];
      } elseif ($ai_wp_data [AI_WP_AMP_PAGE]) $processed_code = '';

      echo $processed_code;
    }
  }

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    // No scripts on AMP pages
//    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_AD_BLOCKING_STATUS) != 0 && $ai_wp_data [AI_ADB_DETECTION] && !$ai_wp_data [AI_WP_AMP_PAGE]) {
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_AD_BLOCKING_STATUS) != 0 && $ai_wp_data [AI_ADB_DETECTION] /*&& !$ai_wp_data [AI_WP_AMP_PAGE]*/) {
      echo "<script>
    jQuery(document).ready(function($) {
      $('body').prepend (\"", get_adb_status_debug_info () , "\");
    });
</script>\n";
    }
  }

  // No scripts on AMP pages
//  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0 && !$ai_wp_data [AI_WP_AMP_PAGE]) {
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0 /*&& !$ai_wp_data [AI_WP_AMP_PAGE]*/) {
    echo "<script>
  jQuery(document).ready(function($) {
    $('body').prepend (\"", get_page_type_debug_info () , "\");
  });
</script>\n";
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("HEAD HOOK END\n");
  }
}

function ai_amp_head_hook () {
  global $block_object, $ai_wp_data, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("HEAD HOOK START");
    $start_time = microtime (true);
  }

//  add_head_inline_styles_and_scripts ();

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_NONE;

  $obj = $block_object [AI_HEADER_OPTION_NAME];
//  $obj->clear_code_cache ();  // cleared at ai_http_header

  if (!$obj->check_server_side_detection ()) return;

  if ($obj->get_enable_manual ()) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_404 || $obj->get_enable_404()) {
      $processed_code = do_shortcode ($obj->ai_getCode ());

      if (strpos ($processed_code, AD_HTTP_SEPARATOR) !== false) {
        $codes = explode (AD_HTTP_SEPARATOR, $processed_code);
        $processed_code = ltrim ($codes [1]);
      }

      if (strpos ($processed_code, AD_AMP_SEPARATOR) !== false) {
        $codes = explode (AD_AMP_SEPARATOR, $processed_code);
        $processed_code = ltrim ($codes [1]);
        echo $processed_code;
      }
    }
  }

//  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
//    // No scripts on AMP pages
//    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_AD_BLOCKING_STATUS) != 0 && $ai_wp_data [AI_ADB_DETECTION] && !$ai_wp_data [AI_WP_AMP_PAGE]) {
//      echo "<script>
//    jQuery(document).ready(function($) {
//      $('body').prepend (\"", get_adb_status_debug_info () , "\");
//    });
//</script>\n";
//    }
//  }

//  // No scripts on AMP pages
//  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0 & !$ai_wp_data [AI_WP_AMP_PAGE]) {
//    echo "<script>
//  jQuery(document).ready(function($) {
//    $('body').prepend (\"", get_page_type_debug_info () , "\");
//  });
//</script>\n";
//  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("HEAD HOOK END\n");
  }
}


function ai_wp_footer_hook () {
  global $block_object, $ai_wp_data, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("FOOTER HOOK START");
    $start_time = microtime (true);
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_FOOTER;

  $footer = $block_object [AI_FOOTER_OPTION_NAME];
  $footer->clear_code_cache ();

  if ($footer->check_server_side_detection ()) {
    if ($footer->get_enable_manual ()) {
      if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_404 || $footer->get_enable_404()) {
        $processed_code = do_shortcode ($footer->ai_getCode ());

        if (strpos ($processed_code, AD_AMP_SEPARATOR) !== false) {
          $codes = explode (AD_AMP_SEPARATOR, $processed_code);
          $processed_code = $codes [0];
        } elseif ($ai_wp_data [AI_WP_AMP_PAGE]) $processed_code = '';

        echo $processed_code;
      }
    }
  }

  if (!(defined ('DOING_AJAX') && DOING_AJAX)) {
    add_footer_inline_scripts ();
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    echo get_page_type_debug_info () , "\n";
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("FOOTER HOOK END\n");
  }
}

function ai_amp_footer_hook () {
  global $block_object, $ai_wp_data, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("FOOTER HOOK START");
    $start_time = microtime (true);
  }

//  if (!(defined ('DOING_AJAX') && DOING_AJAX) && !$ai_wp_data [AI_WP_AMP_PAGE]) {
//    add_footer_inline_scripts ();
//  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_FOOTER;

  $obj = $block_object [AI_FOOTER_OPTION_NAME];
  $obj->clear_code_cache ();

  if (!$obj->check_server_side_detection ()) return;

  if ($obj->get_enable_manual ()) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_404 || $obj->get_enable_404()) {
      $processed_code = do_shortcode ($obj->ai_getCode ());

      if (strpos ($processed_code, AD_AMP_SEPARATOR) !== false) {
        $codes = explode (AD_AMP_SEPARATOR, $processed_code);
        $processed_code = ltrim ($codes [1]);
        echo $processed_code;
      }
    }
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    echo get_page_type_debug_info ('AMP ') , "\n";
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("FOOTER HOOK END\n");
  }
}

function ai_write_debug_info ($write_processing_log = false) {
  global $block_object, $ai_last_time, $ai_total_plugin_time, $ai_total_php_time, $ai_processing_log, $ai_db_options_extract, $ai_wp_data, $ai_db_options, $block_insertion_log, $ai_custom_hooks;

  echo sprintf ("%-25s%s", AD_INSERTER_NAME, AD_INSERTER_VERSION);
  if (function_exists ('ai_debug_header')) ai_debug_header ();
  echo "\n\n";
  if (($install_timestamp = get_option (AI_INSTALL_NAME)) !== false) {
    echo "INSTALLED:               ", date ("Y-m-d H:i:s", $install_timestamp + get_option ('gmt_offset') * 3600);
    if (isset ($ai_wp_data [AI_INSTALL_TIME_DIFFERENCE])) {
      printf (' (%04d-%02d-%02d %02d:%02d:%02d, %d days)', $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->y,
                                                  $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->m,
                                                  $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->d,
                                                  $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->h,
                                                  $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->i,
                                                  $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->s,
                                                  isset ($ai_wp_data [AI_DAYS_SINCE_INSTAL]) ? $ai_wp_data [AI_DAYS_SINCE_INSTAL] : null);
    }
    echo "\n";
  }
  echo "GENERATED (WP time):     ", date ("Y-m-d H:i:s", time() + get_option ('gmt_offset') * 3600), "\n";
  echo "GENERATED (Server time): ", date ("Y-m-d H:i:s", time()), "\n";
  echo "PLUGIN CODE PROCESSING:  ", number_format (($ai_total_plugin_time - $ai_total_php_time) * 1000, 2, '.' , ''), " ms\n";
  echo "USER   CODE PROCESSING:  ", number_format ($ai_total_php_time * 1000, 2, '.' , ''), " ms\n";
  echo "TOTAL PROCESSING TIME:   ", number_format ($ai_total_plugin_time * 1000, 2, '.' , ''), " ms\n";

  echo "SETTINGS:                ";
  if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']))
    echo (int) ($ai_db_options [AI_OPTION_GLOBAL]['VERSION'][0].$ai_db_options [AI_OPTION_GLOBAL]['VERSION'][1]), '.',
         (int) ($ai_db_options [AI_OPTION_GLOBAL]['VERSION'][2].$ai_db_options [AI_OPTION_GLOBAL]['VERSION'][3]), '.',
         (int) ($ai_db_options [AI_OPTION_GLOBAL]['VERSION'][4].$ai_db_options [AI_OPTION_GLOBAL]['VERSION'][5]);

  echo "\n";
  echo "SETTINGS TIMESTAMP:      ";
  echo isset ($ai_db_options [AI_OPTION_GLOBAL]['TIMESTAMP']) ? date ("Y-m-d H:i:s", $ai_db_options [AI_OPTION_GLOBAL]['TIMESTAMP'] + get_option ('gmt_offset') * 3600) : "", "\n";
  echo "SETTINGS EXTRACT:        ", defined ('AI_GENERATE_EXTRACT') ? "NO" : "YES", "\n";
  echo "MULTISITE:               ", is_multisite() ? "YES" : "NO", "\n";
  if (is_multisite()) {
    echo "MAIN SITE:               ", is_main_site () ? "YES" : "NO", "\n";
  }

  echo "USER:                    ";
  if (($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN)     == AI_USER_LOGGED_IN) echo "LOGGED-IN "; else echo "NOT LOGGED-IN ";
  if (($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) == AI_USER_ADMINISTRATOR) echo "ADMINISTRATOR";
  $current_user = wp_get_current_user();
  echo "\n";
  echo "USERNAME:                ", $current_user->user_login, "\n";
  echo 'USER ROLES:              ', implode (', ', $current_user->roles), "\n";
  echo 'MIN.USER FOR EXCEPTIONS: ', get_minimum_user_role (), "\n";
  echo "PAGE TYPE:               ";
  switch ($ai_wp_data [AI_WP_PAGE_TYPE]) {
    case AI_PT_STATIC:    echo "STATIC PAGE"; break;
    case AI_PT_POST:      echo "POST"; break;
    case AI_PT_HOMEPAGE:  echo "HOMEPAGE"; break;
    case AI_PT_CATEGORY:  echo "CATEGORY PAGE"; break;
    case AI_PT_ARCHIVE:   echo "ARCHIVE PAGE"; break;
    case AI_PT_SEARCH:    echo "SEARCH PAGE"; break;
    case AI_PT_404:       echo "404 PAGE"; break;
    case AI_PT_ADMIN:     echo "ADMIN"; break;
    case AI_PT_FEED:      echo "FEED"; break;
    case AI_PT_AJAX:      echo "AJAX"; break;
    case AI_PT_ANY:       echo "ANY ?"; break;
    case AI_PT_NONE:      echo "NONE ?"; break;
    default:              echo "?"; break;
  }
  echo "\n";

  switch ($ai_wp_data [AI_WP_PAGE_TYPE]) {
    case AI_PT_STATIC:
    case AI_PT_POST:
      echo 'ID:                      ', get_the_ID(), "\n";
      echo 'POST TYPE:               ', get_post_type (), "\n";
      $category_data = get_the_category();
      $categories = array ();
      foreach ($category_data as $category) {
        $categories []= $category->name . ' ('.$category->slug.')';
      }
      echo 'CATEGORIES:              ', implode (', ', $categories), "\n";
      $tag_data = wp_get_post_tags (get_the_ID());
      $tags = array ();
      foreach ($tag_data as $tag) {
        $tags []= $tag->name . ' ('.$tag->slug.')';
      }
      echo 'TAGS:                    ', implode (', ', $tags), "\n";
      $taxonomies = array ();
      $taxonomy_names = get_post_taxonomies ();
      foreach ($taxonomy_names as $taxonomy_name) {
        $terms = get_the_terms (0, $taxonomy_name);
        if (is_array ($terms)) {
          foreach ($terms as $term) {
            $taxonomies [] = strtolower ($term->taxonomy) . ':' . strtolower ($term->slug);
          }
        }
      }
      echo 'TAXONOMIES:              ', implode (', ', $taxonomies), "\n";

      $post_meta = get_post_meta (get_the_ID());
      $meta_string = array ();
      foreach ($post_meta as $key => $post_meta_field) {
        foreach ($post_meta_field as $post_meta_field_item) {
          $meta_string []= $key . ':' . $post_meta_field_item;
        }
      }
      echo 'POST META:               ', implode (', ', $meta_string), "\n";

      break;
    case AI_PT_CATEGORY:
      $category_data = get_the_category();
      $categories = array ();
      foreach ($category_data as $category) {
        $categories []= $category->slug;
      }
      echo 'CATEGORY:                ', implode (', ', $categories), "\n";
      break;
    case AI_PT_ARCHIVE:
      $tag_data = wp_get_post_tags (get_the_ID());
      $tags = array ();
      foreach ($tag_data as $tag) {
        $tags []= $tag->slug;
      }
      echo 'TAG:                     ', implode (', ', $tags), "\n";
      break;
  }

  echo 'AMP PAGE:                ', ($ai_wp_data [AI_WP_AMP_PAGE] ? 'YES' : 'NO'), "\n";

  echo 'URL:                     ', $ai_wp_data [AI_WP_URL], "\n";
  echo 'REFERER:                 ', isset ($_SERVER['HTTP_REFERER']) ? strtolower (parse_url ($_SERVER['HTTP_REFERER'], PHP_URL_HOST)) . ' ('. remove_debug_parameters_from_url ($_SERVER['HTTP_REFERER']).')' : "", "\n";
  if (function_exists ('ai_debug')) ai_debug ();
  echo 'CLIENT-SIDE DETECTION:   ', $ai_wp_data [AI_CLIENT_SIDE_DETECTION] ? 'USED' : "NOT USED", "\n";
  if ($ai_wp_data [AI_CLIENT_SIDE_DETECTION] || 1) {
    for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
      $viewport_name  = get_viewport_name ($viewport);
      $viewport_width = get_viewport_width ($viewport);
      if ($viewport_name != '') {
        echo 'VIEWPORT ', $viewport, ':              ', sprintf ("%-16s min width %s", $viewport_name.' ', $viewport_width), " px\n";
      }
    }
  }
  echo 'SERVER-SIDE DETECTION:   ', $ai_wp_data [AI_SERVER_SIDE_DETECTION] ? 'USED' : "NOT USED", "\n";
  if ($ai_wp_data [AI_SERVER_SIDE_DETECTION]) {
    echo 'SERVER-SIDE DEVICE:      ';
    if (AI_DESKTOP) echo "DESKTOP\n";
    elseif (AI_TABLET) echo "TABLET\n";
    elseif (AI_PHONE) echo "PHONE\n";
    else echo "?\n";
  }

  $enabled_custom_hooks = array ();
  foreach ($ai_custom_hooks as $ai_custom_hook) {
    $hook = $ai_custom_hook ['index'];
    $enabled_custom_hooks [] = $ai_custom_hook ['action'];
  }
  for ($hook = 1; $hook <= AD_INSERTER_HOOKS; $hook ++) {
    $name       = str_replace (array ('&lt;', '&gt;'), array ('<', '>'), get_hook_name ($hook));
    $action     = get_hook_action ($hook);
    if (get_hook_enabled ($hook) /*&& $name != '' && $action != ''*/) {
      $priority   = get_hook_priority ($hook);
      echo 'CUSTOM HOOK ', $hook, ':           ', sprintf ("%-30s %-35s %d %s", $name, $action, $priority, !in_array ($action, $enabled_custom_hooks) ? 'INVALID' : ''), "\n";
    }
  }
  echo 'BLOCK CLASS NAME:        ', get_block_class_name (), "\n";
  echo 'DYNAMIC BLOCKS:          ';
  switch (get_dynamic_blocks()) {
    case AI_DYNAMIC_BLOCKS_SERVER_SIDE:
      echo AI_TEXT_SERVER_SIDE;
      break;
    case AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC:
      echo AI_TEXT_SERVER_SIDE_W3TC;
      break;
    case AI_DYNAMIC_BLOCKS_CLIENT_SIDE:
      echo AI_TEXT_CLIENT_SIDE;
      break;
  }
  echo "\n";
  echo 'PARAGRAPH COUNTING:      ';
  switch (get_paragraph_counting_functions()) {
    case AI_STANDARD_PARAGRAPH_COUNTING_FUNCTIONS:
      echo AI_TEXT_STANDARD;
      break;
    case AI_MULTIBYTE_PARAGRAPH_COUNTING_FUNCTIONS:
      echo AI_TEXT_MULTIBYTE;
      break;
  }
  echo "\n";
  echo 'PLUGIN PRIORITY:         ', get_plugin_priority (), "\n";
  echo 'HEADER CODE:             ', $block_object [AI_HEADER_OPTION_NAME]->get_enable_manual () ? 'ENABLED' : 'DISABLED', "\n";
  echo 'FOOTER CODE:             ', $block_object [AI_FOOTER_OPTION_NAME]->get_enable_manual () ? 'ENABLED' : 'DISABLED', "\n";

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    echo 'AD BLOCKING DETECTION:   ', $ai_wp_data [AI_ADB_DETECTION] ? 'ENABLED' : 'DISABLED', "\n";
    if ($ai_wp_data [AI_ADB_DETECTION]) {
      echo 'ADB ACTION:              ';
      switch (get_adb_action ()) {
        case AI_ADB_ACTION_NONE:
          echo AI_TEXT_NONE;
          break;
        case AI_ADB_ACTION_MESSAGE:
          echo AI_TEXT_POPUP_MESSAGE;
          break;
        case AI_ADB_ACTION_REDIRECTION:
          echo AI_TEXT_REDIRECTION;
          break;
      }
      echo "\n";
      echo 'ADB DELAY ACTION:        ', get_delay_action (), "\n";
      echo 'ADB NO ACTION PERIOD:    ', get_no_action_period (), "\n";
      echo 'ADB SELECTORS:           ', get_adb_selectors (), "\n";
      $redirection_page = get_redirection_page ();
      echo 'ADB REDIRECTION PAGE:    ', $redirection_page != 0 ? get_the_title ($redirection_page) . ' (' . get_permalink ($redirection_page) . ')' : 'Custom Url', "\n";
      echo 'ADB REDIRECTION URL:     ', get_custom_redirection_url (), "\n";
      echo 'ADB MESSAGE:             ', $block_object [AI_ADB_MESSAGE_OPTION_NAME]->ai_getCode (), "\n";
      echo 'ADB MESSAGE CSS:         ', get_message_css (), "\n";
      echo 'ADB OVERLAY CSS:         ', get_overlay_css (), "\n";
      echo 'ADB UNDISMISSIBLE:       ', get_undismissible_message () ? 'ON' : 'OFF', "\n";
    }
  }

  echo "\n";

  $default = new ai_Block (1);

  echo "BLOCK SETTINGS           Po Pa Hp Cp Ap Sp AM Aj Fe 404 Wi Sh PHP\n";
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = $block_object [$block];

    $settings = "";
    $insertion_settings = '';
    $alignment_settings = '';
    $default_settings = true;
//    $display_type = '';
    foreach (array_keys ($default->wp_options) as $key){
      switch ($key) {
        case AI_OPTION_CODE:
        case AI_OPTION_BLOCK_NAME:
          continue 2;
        case AI_OPTION_DISPLAY_ON_PAGES:
        case AI_OPTION_DISPLAY_ON_POSTS:
        case AI_OPTION_DISPLAY_ON_HOMEPAGE:
        case AI_OPTION_DISPLAY_ON_CATEGORY_PAGES:
        case AI_OPTION_DISPLAY_ON_SEARCH_PAGES:
        case AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES:
        case AI_OPTION_ENABLE_AMP:
        case AI_OPTION_ENABLE_AJAX:
        case AI_OPTION_ENABLE_FEED:
        case AI_OPTION_ENABLE_404:
        case AI_OPTION_ENABLE_MANUAL:
        case AI_OPTION_ENABLE_WIDGET:
        case AI_OPTION_ENABLE_PHP_CALL:
          if ($obj->wp_options [$key] != $default->wp_options [$key]) $default_settings = false;
          continue 2;
      }

//      if (gettype ($obj->wp_options [$key]) == 'string' && gettype ($default->wp_options [$key]) == 'integer') {
//        $default->wp_options [$key] = strval ($default->wp_options [$key]);
//      }
//      elseif (gettype ($obj->wp_options [$key]) == 'integer' && gettype ($default->wp_options [$key]) == 'string') {
//        $default->wp_options [$key] = intval ($default->wp_options [$key]);
//      }

//      if ($obj->wp_options [$key] !== $default->wp_options [$key]) {
      if ($obj->wp_options [$key] != $default->wp_options [$key]) {
        $default_settings = false;
        switch ($key) {
          case AI_OPTION_AUTOMATIC_INSERTION:
            $insertion_settings = $obj->get_automatic_insertion_text();
            break;
          case AI_OPTION_ALIGNMENT_TYPE:
            $alignment_settings = $obj->get_alignment_type_text ();
            break;
          case AI_OPTION_ENABLED_ON_WHICH_PAGES:
            $settings = $settings .= "[" . $key . ": " . $obj->get_ad_enabled_on_which_pages_text () . ']';
            break;
          case AI_OPTION_ENABLED_ON_WHICH_POSTS:
            $settings = $settings .= "[" . $key . ": " . $obj->get_ad_enabled_on_which_posts_text () . ']';
            break;
          case AI_OPTION_PARAGRAPH_TEXT:
          case AI_OPTION_AVOID_TEXT_ABOVE:
          case AI_OPTION_AVOID_TEXT_BELOW:
            if ($write_processing_log)
              $settings .= "[" . $key . ": " . ai_log_filter_content (html_entity_decode ($obj->wp_options [$key])) . ']'; else
                $settings .= "[" . $key . ": " . $obj->wp_options [$key] . ']';
            break;
          case AI_OPTION_FILTER_TYPE:
            $settings = $settings .= "[" . $key . ": " . $obj->get_filter_type_text () . ']';
            break;
          default:
            $settings .= "[" . $key . ": " . $obj->wp_options [$key] . ']';
            break;
        }

//        $settings .= ' ['.gettype ($obj->wp_options [$key]).':'.$obj->wp_options [$key].'#'.gettype ($default->wp_options [$key]).':'.$default->wp_options [$key].'] ';

      } else
        switch ($key) {
          case AI_OPTION_AUTOMATIC_INSERTION:
            $insertion_settings = $obj->get_automatic_insertion_text ();
            break;
          case AI_OPTION_ALIGNMENT_TYPE:
            $alignment_settings = $obj->get_alignment_type_text ();
            break;
        }
    }
    if ($default_settings && $settings == '') continue;
    $settings = ' [' . $insertion_settings . '][' . $alignment_settings . ']' . $settings;

    echo sprintf ("%2d %-21s ", $block, substr ($obj->get_ad_name(), 0, 21));

    echo $obj->get_display_settings_post()     ? "o" : ".", "  ";
    echo $obj->get_display_settings_page()     ? "o" : ".", "  ";
    echo $obj->get_display_settings_home()     ? "o" : ".", "  ";
    echo $obj->get_display_settings_category() ? "o" : ".", "  ";
    echo $obj->get_display_settings_archive()  ? "o" : ".", "  ";
    echo $obj->get_display_settings_search()   ? "o" : ".", "  ";
    echo $obj->get_enable_amp()                ? "o" : ".", "  ";
    echo $obj->get_enable_ajax()               ? "o" : ".", "  ";
    echo $obj->get_enable_feed()               ? "o" : ".", "  ";
    echo $obj->get_enable_404()                ? "o" : ".", "   ";
    echo $obj->get_enable_widget()             ? "x" : ".", "  ";
    echo $obj->get_enable_manual()             ? "x" : ".", "  ";
    echo $obj->get_enable_php_call()           ? "x" : ".", "  ";

    echo $settings, "\n";
  }
  echo "\n";

  $args = array (
    'public'    => true,
    '_builtin'  => false
  );
  $custom_post_types = get_post_types ($args, 'names', 'and');
  $screens = array_values (array_merge (array ('post', 'page'), $custom_post_types));

  $args = array (
    'posts_per_page'   => 100,
    'offset'           => 0,
    'category'         => '',
    'category_name'    => '',
    'orderby'          => 'type',
    'order'            => 'ASC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '_adinserter_block_exceptions',
    'meta_value'       => '',
    'post_type'        => $screens,
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'           => '',
    'author_name'      => '',
    'post_status'      => '',
    'suppress_filters' => true
  );
  $posts_pages = get_posts ($args);

  if (count ($posts_pages) != 0) {
    echo "EXCEPTIONS FOR BLOCKS    ID     TYPE                      TITLE                                                            URL\n";
    foreach ($posts_pages as $page) {
      $post_meta = get_post_meta ($page->ID, '_adinserter_block_exceptions', true);
      if ($post_meta == '') continue;
      $post_type_object = get_post_type_object ($page->post_type);
      echo sprintf ("%-24s %-6s %-24s  %-64s %s", $post_meta, $page->ID, $post_type_object->labels->singular_name, substr ($page->post_title, 0, 64), get_permalink ($page->ID)), "\n";
    }
    echo "\n";
  }

  echo "TOTAL BLOCKS\n";
  if (count ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][AI_PT_ANY]))
    echo "CONTENT HOOK:            ", implode (", ", $ai_db_options_extract [CONTENT_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][AI_PT_ANY]))
    echo "EXCERPT HOOK:            ", implode (", ", $ai_db_options_extract [EXCERPT_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][AI_PT_ANY]))
    echo "LOOP START HOOK:         ", implode (", ", $ai_db_options_extract [LOOP_START_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][AI_PT_ANY]))
    echo "LOOP END HOOK:           ", implode (", ", $ai_db_options_extract [LOOP_END_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [POST_HOOK_BLOCKS][AI_PT_ANY]))
    echo "POST HOOK:               ", implode (", ", $ai_db_options_extract [POST_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][AI_PT_ANY]))
    echo "AFTER COMMENTS HOOK:     ", implode (", ", $ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][AI_PT_ANY]))
    echo "BETWEEN COMMENTS HOOK    ", implode (", ", $ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][AI_PT_ANY]))
    echo "AFTER COMMENTS HOOK:     ", implode (", ", $ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [FOOTER_HOOK_BLOCKS][AI_PT_ANY]))
    echo "FOOTER HOOK:             ", implode (", ", $ai_db_options_extract [FOOTER_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  foreach ($ai_custom_hooks as $hook_index => $custom_hook) {
    if (count ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][AI_PT_ANY]))
      echo substr (strtoupper (str_replace (array ('&lt;', '&gt;'), array ('<', '>'), get_hook_name ($custom_hook ['index']))) . " HOOK:                   ", 0, 25), implode (", ", $ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  }

  echo "\nBLOCKS FOR THIS PAGE TYPE\n";
  if (isset ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "CONTENT HOOK:            ", implode (", ", $ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "EXCERPT HOOK:            ", implode (", ", $ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "LOOP START HOOK:         ", implode (", ", $ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "LOOP END HOOK:           ", implode (", ", $ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "POST HOOK:               ", implode (", ", $ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "AFTER COMMENTS HOOK:     ", implode (", ", $ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "BETWEEN COMMENTS HOOK:   ", implode (", ", $ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "AFTER COMMENTS HOOK:     ", implode (", ", $ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (isset ($ai_db_options_extract [FOOTER_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [FOOTER_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "FOOTER HOOK              ", implode (", ", $ai_db_options_extract [FOOTER_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  foreach ($ai_custom_hooks as $hook_index => $custom_hook) {
    if (isset ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
      echo substr (strtoupper (str_replace (array ('&lt;', '&gt;'), array ('<', '>'), get_hook_name ($custom_hook ['index']))) . " HOOK:                   ", 0, 25), implode (", ", $ai_db_options_extract [$custom_hook ['action'] . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  }

  if ($write_processing_log) {
    echo "\nTIME  EVENT\n";
    echo "======================================\n";

    foreach ($ai_processing_log as $log_line) {
      echo $log_line, "\n";
    }

    sort ($block_insertion_log);
    echo "\nINSERTION SUMMARY\n";
    echo "======================================\n";
    foreach ($block_insertion_log as $log_line) {
      echo substr ($log_line, 3), "\n";
    }
    echo "\n\n";

    echo "PHP:                     ", phpversion(), "\n";
    echo "Memory Limit:            ", ini_get ('memory_limit'), "\n";
    echo "Upload Max Filesize:     ", ini_get ('upload_max_filesize'), "\n";
    echo "Post Max Size:           ", ini_get ('post_max_size'), "\n";
    echo "Max Execution Time:      ", ini_get ('max_execution_time'), "\n";
    echo "Max Input Vars:          ", ini_get ('max_input_vars'), "\n";
    echo "Display Errors:          ", ini_get ('display_errors'), "\n";
    echo "cURL:                    ", function_exists ('curl_version') ? 'ENABLED' : 'DISABLED', "\n";
    echo "fsockopen:               ", function_exists ('fsockopen') ? 'ENABLED' : 'DISABLED', "\n";
    echo "\n\n";

    global $wp_version;
    echo "Wordpress:               ", $wp_version, "\n";
    $current_theme = wp_get_theme();

    echo "Current Theme:           ", $current_theme->get ('Name') . " " . $current_theme->get ('Version'), "\n";
    echo "\n";
    echo "A INSTALLED PLUGINS\n";
    echo "======================================\n";

    if ( ! function_exists( 'get_plugins' ) ) {
      require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    $all_plugins = get_plugins();
    $active_plugins = get_option ('active_plugins');
    foreach ($all_plugins as $plugin_path => $plugin) {
      echo in_array ($plugin_path, $active_plugins) ? '* ' : '  ', html_entity_decode ($plugin ["Name"]), ' ', $plugin ["Version"], "\n";
    }
  }


}

function ai_shutdown_hook () {
  global $ai_wp_data;

  if (function_exists ('ai_system_output')) ai_system_output ();

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0 && (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0)) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_HOMEPAGE ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_CATEGORY ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_SEARCH ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ARCHIVE ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_404 ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_NONE ||
        $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ANY) {
      echo "\n<!--\n\n";
      ai_write_debug_info (true);
      echo "\n-->\n";
    }
  }
}

function ai_check_multisite_options (&$multisite_options) {
  if (!isset ($multisite_options ['MULTISITE_SETTINGS_PAGE']))      $multisite_options ['MULTISITE_SETTINGS_PAGE']      = DEFAULT_MULTISITE_SETTINGS_PAGE;
  if (!isset ($multisite_options ['MULTISITE_WIDGETS']))            $multisite_options ['MULTISITE_WIDGETS']            = DEFAULT_MULTISITE_WIDGETS;
  if (!isset ($multisite_options ['MULTISITE_PHP_PROCESSING']))     $multisite_options ['MULTISITE_PHP_PROCESSING']     = DEFAULT_MULTISITE_PHP_PROCESSING;
  if (!isset ($multisite_options ['MULTISITE_EXCEPTIONS']))         $multisite_options ['MULTISITE_EXCEPTIONS']         = DEFAULT_MULTISITE_EXCEPTIONS;
  if (!isset ($multisite_options ['MULTISITE_MAIN_FOR_ALL_BLOGS'])) $multisite_options ['MULTISITE_MAIN_FOR_ALL_BLOGS'] = DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;
}

function ai_check_plugin_options ($plugin_options = array ()) {
  global $version_string;

  $plugin_options ['VERSION'] = $version_string;

  if (!isset ($plugin_options ['SYNTAX_HIGHLIGHTER_THEME']))  $plugin_options ['SYNTAX_HIGHLIGHTER_THEME']  = DEFAULT_SYNTAX_HIGHLIGHTER_THEME;

  if (!isset ($plugin_options ['BLOCK_CLASS_NAME']))          $plugin_options ['BLOCK_CLASS_NAME']          = DEFAULT_BLOCK_CLASS_NAME;

  if (!isset ($plugin_options ['MINIMUM_USER_ROLE']))         $plugin_options ['MINIMUM_USER_ROLE']         = DEFAULT_MINIMUM_USER_ROLE;

  if (!isset ($plugin_options ['STICKY_WIDGET_MODE']))        $plugin_options ['STICKY_WIDGET_MODE']        = DEFAULT_STICKY_WIDGET_MODE;

  if (!isset ($plugin_options ['STICKY_WIDGET_MARGIN']))      $plugin_options ['STICKY_WIDGET_MARGIN']      = DEFAULT_STICKY_WIDGET_MARGIN;
  $sticky_widget_margin = $plugin_options ['STICKY_WIDGET_MARGIN'];
  if (!is_numeric ($sticky_widget_margin)) {
    $sticky_widget_margin = DEFAULT_STICKY_WIDGET_MARGIN;
  }
  $sticky_widget_margin = intval ($sticky_widget_margin);
  if ($sticky_widget_margin < 0) {
    $sticky_widget_margin = 0;
  }
  if ($sticky_widget_margin > 999) {
    $sticky_widget_margin = 999;
  }
  $plugin_options ['STICKY_WIDGET_MARGIN'] = $sticky_widget_margin;


  if (!isset ($plugin_options ['PLUGIN_PRIORITY']))           $plugin_options ['PLUGIN_PRIORITY']           = DEFAULT_PLUGIN_PRIORITY;
  $plugin_priority = $plugin_options ['PLUGIN_PRIORITY'];
  if (!is_numeric ($plugin_priority)) {
    $plugin_priority = DEFAULT_PLUGIN_PRIORITY;
  }
  $plugin_priority = intval ($plugin_priority);
  if ($plugin_priority < 0) {
    $plugin_priority = 0;
  }
  if ($plugin_priority > 999999) {
    $plugin_priority = 999999;
  }
  $plugin_options ['PLUGIN_PRIORITY'] = $plugin_priority;


  if (!isset ($plugin_options ['DYNAMIC_BLOCKS']))                $plugin_options ['DYNAMIC_BLOCKS']                = DEFAULT_DYNAMIC_BLOCKS;
  if (!isset ($plugin_options ['PARAGRAPH_COUNTING_FUNCTIONS']))  $plugin_options ['PARAGRAPH_COUNTING_FUNCTIONS']  = DEFAULT_PARAGRAPH_COUNTING_FUNCTIONS;
  if (!isset ($plugin_options ['NO_PARAGRAPH_COUNTING_INSIDE']))  $plugin_options ['NO_PARAGRAPH_COUNTING_INSIDE']  = DEFAULT_NO_PARAGRAPH_COUNTING_INSIDE;
  if (!isset ($plugin_options ['ADB_ACTION']))                    $plugin_options ['ADB_ACTION']                    = AI_DEFAULT_ADB_ACTION;
  if (!isset ($plugin_options ['ADB_DELAY_ACTION']))              $plugin_options ['ADB_DELAY_ACTION']              = '';
  if (!isset ($plugin_options ['ADB_NO_ACTION_PERIOD']))          $plugin_options ['ADB_NO_ACTION_PERIOD']          = AI_DEFAULT_ADB_NO_ACTION_PERIOD;
  if (!isset ($plugin_options ['ADB_SELECTORS']))                 $plugin_options ['ADB_SELECTORS']                 = '';
  if (!isset ($plugin_options ['ADB_REDIRECTION_PAGE']))          $plugin_options ['ADB_REDIRECTION_PAGE']          = AI_DEFAULT_ADB_REDIRECTION_PAGE;
  if (!isset ($plugin_options ['ADB_CUSTOM_REDIRECTION_URL']))    $plugin_options ['ADB_CUSTOM_REDIRECTION_URL']    = '';
  if (!isset ($plugin_options ['ADB_OVERLAY_CSS']))               $plugin_options ['ADB_OVERLAY_CSS']               = AI_DEFAULT_ADB_OVERLAY_CSS;
  if (!isset ($plugin_options ['ADB_MESSAGE_CSS']))               $plugin_options ['ADB_MESSAGE_CSS']               = AI_DEFAULT_ADB_MESSAGE_CSS;
  if (!isset ($plugin_options ['ADB_UNDISMISSIBLE_MESSAGE']))     $plugin_options ['ADB_UNDISMISSIBLE_MESSAGE']     = AI_DEFAULT_ADB_UNDISMISSIBLE_MESSAGE;
  if (!isset ($plugin_options ['ADMIN_TOOLBAR_DEBUGGING']))       $plugin_options ['ADMIN_TOOLBAR_DEBUGGING']       = DEFAULT_ADMIN_TOOLBAR_DEBUGGING;
  if (!isset ($plugin_options ['REMOTE_DEBUGGING']))              $plugin_options ['REMOTE_DEBUGGING']              = DEFAULT_REMOTE_DEBUGGING;
  if (!isset ($plugin_options ['JAVASCRIPT_DEBUGGING']))          $plugin_options ['JAVASCRIPT_DEBUGGING']          = DEFAULT_JAVASCRIPT_DEBUGGING;

  for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
    $viewport_name_option_name   = 'VIEWPORT_NAME_'  . $viewport;
    $viewport_width_option_name  = 'VIEWPORT_WIDTH_' . $viewport;

    if (!isset ($plugin_options [$viewport_name_option_name]))     $plugin_options [$viewport_name_option_name] =
      defined ("DEFAULT_VIEWPORT_NAME_" . $viewport) ? constant ("DEFAULT_VIEWPORT_NAME_" . $viewport) : "";

    if ($viewport == 1 && $plugin_options [$viewport_name_option_name] == '')
      $plugin_options [$viewport_name_option_name] = constant ("DEFAULT_VIEWPORT_NAME_1");

    if ($plugin_options [$viewport_name_option_name] != '') {
      if (!isset ($plugin_options [$viewport_width_option_name]))  $plugin_options [$viewport_width_option_name] =
        defined ("DEFAULT_VIEWPORT_WIDTH_" . $viewport) ? constant ("DEFAULT_VIEWPORT_WIDTH_" . $viewport) : 0;

      $viewport_width = $plugin_options [$viewport_width_option_name];

      if ($viewport > 1) {
        $previous_viewport_option_width = $plugin_options ['VIEWPORT_WIDTH_' . ($viewport - 1)];
      }

      if (!is_numeric ($viewport_width)) {
        if ($viewport == 1)
          $viewport_width = constant ("DEFAULT_VIEWPORT_WIDTH_1"); else
            $viewport_width = $previous_viewport_option_width - 1;

      }
      if ($viewport_width > 9999) {
        $viewport_width = 9999;
      }

      if ($viewport > 1) {
        if ($viewport_width >= $previous_viewport_option_width)
          $viewport_width = $previous_viewport_option_width - 1;
      }

      $viewport_width = intval ($viewport_width);
      if ($viewport_width < 0) {
        $viewport_width = 0;
      }

      $plugin_options [$viewport_width_option_name] = $viewport_width;
    } else $plugin_options [$viewport_width_option_name] = '';
  }

  for ($hook = 1; $hook <= AD_INSERTER_HOOKS; $hook ++) {
    $hook_enabled_settins_name  = 'HOOK_ENABLED_' . $hook;
    $hook_name_settins_name     = 'HOOK_NAME_' . $hook;
    $hook_action_settins_name   = 'HOOK_ACTION_' . $hook;
    $hook_priority_settins_name = 'HOOK_PRIORITY_' . $hook;

    if (!isset ($plugin_options [$hook_enabled_settins_name]))  $plugin_options [$hook_enabled_settins_name] = AI_DISABLED;
    if (!isset ($plugin_options [$hook_name_settins_name]))     $plugin_options [$hook_name_settins_name] = '';
    if (!isset ($plugin_options [$hook_action_settins_name]))   $plugin_options [$hook_action_settins_name] = '';
    if (!isset ($plugin_options [$hook_priority_settins_name]) || !is_int ($plugin_options [$hook_priority_settins_name])) $plugin_options [$hook_priority_settins_name] = DEFAULT_CUSTOM_HOOK_PRIORITY;
  }

  if (function_exists ('ai_check_options')) ai_check_options ($plugin_options);

  return ($plugin_options);
}

function option_stripslashes (&$options) {
  $options = wp_unslash ($options);

//  if (is_array ($options)) {
//    foreach ($options as $key => $option) {
//      option_stripslashes ($options [$key]);
//    }
//  } else if (is_string ($options)) $options = stripslashes ($options);
}

// Deprecated
function ai_get_option ($option_name) {
  $options = get_option ($option_name);
  option_stripslashes ($options);
  return ($options);
}

function ai_load_options () {
  global $ai_db_options, $ai_db_options_multisite, $ai_wp_data;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD OPTIONS START");

  if (is_multisite()) {
    $ai_db_options_multisite = get_site_option (AI_OPTION_NAME);
    option_stripslashes ($ai_db_options_multisite);
  }

  if (is_multisite() && multisite_main_for_all_blogs () && defined ('BLOG_ID_CURRENT_SITE')) {
    $ai_db_options = get_blog_option (BLOG_ID_CURRENT_SITE, AI_OPTION_NAME);
    option_stripslashes ($ai_db_options);
  } else {
      $ai_db_options = get_option (AI_OPTION_NAME);
      option_stripslashes ($ai_db_options);
    }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD OPTIONS END");
}

function get_viewport_css () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['VIEWPORT_CSS'])) $ai_db_options [AI_OPTION_GLOBAL]['VIEWPORT_CSS'] = generate_viewport_css ();

  return ($ai_db_options [AI_OPTION_GLOBAL]['VIEWPORT_CSS']);
}

function get_syntax_highlighter_theme () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['SYNTAX_HIGHLIGHTER_THEME'])) $ai_db_options [AI_OPTION_GLOBAL]['SYNTAX_HIGHLIGHTER_THEME'] = DEFAULT_SYNTAX_HIGHLIGHTER_THEME;

  return ($ai_db_options [AI_OPTION_GLOBAL]['SYNTAX_HIGHLIGHTER_THEME']);
}

function get_block_class_name () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['BLOCK_CLASS_NAME'])) $ai_db_options [AI_OPTION_GLOBAL]['BLOCK_CLASS_NAME'] = DEFAULT_BLOCK_CLASS_NAME;

  return ($ai_db_options [AI_OPTION_GLOBAL]['BLOCK_CLASS_NAME']);
}

function get_minimum_user_role () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['MINIMUM_USER_ROLE'])) $ai_db_options [AI_OPTION_GLOBAL]['MINIMUM_USER_ROLE'] = DEFAULT_MINIMUM_USER_ROLE;

  return ($ai_db_options [AI_OPTION_GLOBAL]['MINIMUM_USER_ROLE']);
}

function get_sticky_widget_mode () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['STICKY_WIDGET_MODE'])) $ai_db_options [AI_OPTION_GLOBAL]['STICKY_WIDGET_MODE'] = DEFAULT_STICKY_WIDGET_MODE;

  return ($ai_db_options [AI_OPTION_GLOBAL]['STICKY_WIDGET_MODE']);
}

function get_sticky_widget_margin () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['STICKY_WIDGET_MARGIN'])) $ai_db_options [AI_OPTION_GLOBAL]['STICKY_WIDGET_MARGIN'] = DEFAULT_STICKY_WIDGET_MARGIN;

  return ($ai_db_options [AI_OPTION_GLOBAL]['STICKY_WIDGET_MARGIN']);
}

function get_plugin_priority () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['PLUGIN_PRIORITY'])) $ai_db_options [AI_OPTION_GLOBAL]['PLUGIN_PRIORITY'] = DEFAULT_PLUGIN_PRIORITY;

  return ($ai_db_options [AI_OPTION_GLOBAL]['PLUGIN_PRIORITY']);
}

function get_dynamic_blocks(){
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['DYNAMIC_BLOCKS'])) $ai_db_options [AI_OPTION_GLOBAL]['DYNAMIC_BLOCKS'] = DEFAULT_DYNAMIC_BLOCKS;

  return ($ai_db_options [AI_OPTION_GLOBAL]['DYNAMIC_BLOCKS']);
}

function get_paragraph_counting_functions(){
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['PARAGRAPH_COUNTING_FUNCTIONS'])) $ai_db_options [AI_OPTION_GLOBAL]['PARAGRAPH_COUNTING_FUNCTIONS'] = DEFAULT_PARAGRAPH_COUNTING_FUNCTIONS;

  return ($ai_db_options [AI_OPTION_GLOBAL]['PARAGRAPH_COUNTING_FUNCTIONS']);
}

function get_no_paragraph_counting_inside () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['NO_PARAGRAPH_COUNTING_INSIDE'])) $ai_db_options [AI_OPTION_GLOBAL]['NO_PARAGRAPH_COUNTING_INSIDE'] = DEFAULT_NO_PARAGRAPH_COUNTING_INSIDE;

  return (str_replace (array ('<', '>'), '', $ai_db_options [AI_OPTION_GLOBAL]['NO_PARAGRAPH_COUNTING_INSIDE']));
}

function get_admin_toolbar_debugging () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADMIN_TOOLBAR_DEBUGGING'])) $ai_db_options [AI_OPTION_GLOBAL]['ADMIN_TOOLBAR_DEBUGGING'] = DEFAULT_ADMIN_TOOLBAR_DEBUGGING;

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADMIN_TOOLBAR_DEBUGGING']);
}

function get_remote_debugging () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['REMOTE_DEBUGGING'])) $ai_db_options [AI_OPTION_GLOBAL]['REMOTE_DEBUGGING'] = DEFAULT_REMOTE_DEBUGGING;

  return ($ai_db_options [AI_OPTION_GLOBAL]['REMOTE_DEBUGGING']);
}

function get_javascript_debugging () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['JAVASCRIPT_DEBUGGING'])) $ai_db_options [AI_OPTION_GLOBAL]['JAVASCRIPT_DEBUGGING'] = DEFAULT_JAVASCRIPT_DEBUGGING;

  return ($ai_db_options [AI_OPTION_GLOBAL]['JAVASCRIPT_DEBUGGING']);
}

function get_viewport_name ($viewport_number) {
  global $ai_db_options;

  $viewport_settins_name = 'VIEWPORT_NAME_' . $viewport_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$viewport_settins_name]))
    $ai_db_options [AI_OPTION_GLOBAL][$viewport_settins_name] = defined ("DEFAULT_VIEWPORT_NAME_" . $viewport_number) ? constant ("DEFAULT_VIEWPORT_NAME_" . $viewport_number) : "";

  return ($ai_db_options [AI_OPTION_GLOBAL][$viewport_settins_name]);
}

function get_viewport_width ($viewport_number) {
  global $ai_db_options;

  $viewport_settins_name = 'VIEWPORT_WIDTH_' . $viewport_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$viewport_settins_name]))
    $ai_db_options [AI_OPTION_GLOBAL][$viewport_settins_name] = defined ("DEFAULT_VIEWPORT_WIDTH_" . $viewport_number) ? constant ("DEFAULT_VIEWPORT_WIDTH_" . $viewport_number) : "";

  return ($ai_db_options [AI_OPTION_GLOBAL][$viewport_settins_name]);
}

function get_hook_enabled ($hook_number) {
  global $ai_db_options;

  $hook_settins_name = 'HOOK_ENABLED_' . $hook_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name])) $ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name] = AI_DISABLED;

  return ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name]);
}

function get_hook_name ($hook_number) {
  global $ai_db_options;

  $hook_settins_name = 'HOOK_NAME_' . $hook_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name])) $ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name] = "";

  return ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name]);
}

function get_hook_action ($hook_number) {
  global $ai_db_options;

  $hook_settins_name = 'HOOK_ACTION_' . $hook_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name])) $ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name] = "";

  return ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name]);
}

function get_hook_priority ($hook_number) {
  global $ai_db_options;

  $hook_settins_name = 'HOOK_PRIORITY_' . $hook_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name])) $ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name] = DEFAULT_CUSTOM_HOOK_PRIORITY;

  return ($ai_db_options [AI_OPTION_GLOBAL][$hook_settins_name]);
}

function get_country_group_name ($group_number) {
  global $ai_db_options;

  $country_group_settins_name = 'COUNTRY_GROUP_NAME_' . $group_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$country_group_settins_name])) $ai_db_options [AI_OPTION_GLOBAL][$country_group_settins_name] = DEFAULT_COUNTRY_GROUP_NAME . ' ' . $group_number;

  return ($ai_db_options [AI_OPTION_GLOBAL][$country_group_settins_name]);
}

function get_group_country_list ($group_number) {
  global $ai_db_options;

  $group_countries_settins_name = 'GROUP_COUNTRIES_' . $group_number;
  if (!isset ($ai_db_options [AI_OPTION_GLOBAL][$group_countries_settins_name])) $ai_db_options [AI_OPTION_GLOBAL][$group_countries_settins_name] = '';

  return ($ai_db_options [AI_OPTION_GLOBAL][$group_countries_settins_name]);
}

function multisite_settings_page_enabled () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'])) $ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] = DEFAULT_MULTISITE_SETTINGS_PAGE;
    if ($ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] == '')    $ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] = DEFAULT_MULTISITE_SETTINGS_PAGE;

    if (multisite_main_for_all_blogs ()) $ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] = AI_DISABLED;

    return ($ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE']);
  }

  return DEFAULT_MULTISITE_SETTINGS_PAGE;
}

function multisite_widgets_enabled () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_WIDGETS'])) $ai_db_options_multisite ['MULTISITE_WIDGETS'] = DEFAULT_MULTISITE_WIDGETS;
    if ($ai_db_options_multisite ['MULTISITE_WIDGETS'] == '')    $ai_db_options_multisite ['MULTISITE_WIDGETS'] = DEFAULT_MULTISITE_WIDGETS;

    return ($ai_db_options_multisite ['MULTISITE_WIDGETS']);
  }

  return DEFAULT_MULTISITE_WIDGETS;
}

function multisite_php_processing () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_PHP_PROCESSING'])) $ai_db_options_multisite ['MULTISITE_PHP_PROCESSING'] = DEFAULT_MULTISITE_PHP_PROCESSING;
    if ($ai_db_options_multisite ['MULTISITE_PHP_PROCESSING'] == '')    $ai_db_options_multisite ['MULTISITE_PHP_PROCESSING'] = DEFAULT_MULTISITE_PHP_PROCESSING;

    return ($ai_db_options_multisite ['MULTISITE_PHP_PROCESSING']);
  }

  return DEFAULT_MULTISITE_WIDGETS;
}

function multisite_exceptions_enabled () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_EXCEPTIONS'])) $ai_db_options_multisite ['MULTISITE_EXCEPTIONS'] = DEFAULT_MULTISITE_EXCEPTIONS;
    if ($ai_db_options_multisite ['MULTISITE_EXCEPTIONS'] == '')    $ai_db_options_multisite ['MULTISITE_EXCEPTIONS'] = DEFAULT_MULTISITE_EXCEPTIONS;

    return ($ai_db_options_multisite ['MULTISITE_EXCEPTIONS']);
  }

  return DEFAULT_MULTISITE_EXCEPTIONS;
}

function multisite_main_for_all_blogs () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS'])) $ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS'] = DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;
    if ($ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS'] == '')    $ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS'] = DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;

    return ($ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS']);
  }

  return DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;
}

function get_adb_action ($saved_value = false) {
  global $ai_db_options, $ai_wp_data;

  if (!$saved_value) {
    if (isset ($ai_wp_data [AI_ADB_SHORTCODE_ACTION])) return ($ai_wp_data [AI_ADB_SHORTCODE_ACTION]);
  }

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_ACTION'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_ACTION'] = AI_DEFAULT_ADB_ACTION;

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_ACTION']);
}

function get_delay_action ($return_number = false) {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_DELAY_ACTION'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_DELAY_ACTION'] = '';

  if ($return_number) {
    $value = trim ($ai_db_options [AI_OPTION_GLOBAL]['ADB_DELAY_ACTION']);
    if ($value == '') $value = 0;
    if (is_numeric ($value)) return $value; else return 0;
  }

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_DELAY_ACTION']);
}

function get_no_action_period ($return_number = false) {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_NO_ACTION_PERIOD'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_NO_ACTION_PERIOD'] = AI_DEFAULT_ADB_NO_ACTION_PERIOD;

  if ($return_number) {
    $value = trim ($ai_db_options [AI_OPTION_GLOBAL]['ADB_NO_ACTION_PERIOD']);
    if ($value == '') $value = 0;
    if (is_numeric ($value)) return $value; else return AI_DEFAULT_ADB_NO_ACTION_PERIOD;
  }

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_NO_ACTION_PERIOD']);
}

function get_adb_selectors () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_SELECTORS'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_SELECTORS'] = '';

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_SELECTORS']);
}

function get_redirection_page ($return_number = false) {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_REDIRECTION_PAGE'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_REDIRECTION_PAGE'] = AI_DEFAULT_ADB_REDIRECTION_PAGE;

  if ($return_number) {
    $value = trim ($ai_db_options [AI_OPTION_GLOBAL]['ADB_REDIRECTION_PAGE']);
    if ($value == '') $value = 0;
    if (is_numeric ($value)) return $value; else return AI_DEFAULT_ADB_REDIRECTION_PAGE;
  }

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_REDIRECTION_PAGE']);
}

function get_custom_redirection_url () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_CUSTOM_REDIRECTION_URL'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_CUSTOM_REDIRECTION_URL'] = '';

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_CUSTOM_REDIRECTION_URL']);
}

function get_message_css () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_MESSAGE_CSS'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_MESSAGE_CSS'] = AI_DEFAULT_ADB_MESSAGE_CSS;

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_MESSAGE_CSS']);
}

function get_overlay_css () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_OVERLAY_CSS'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_OVERLAY_CSS'] = AI_DEFAULT_ADB_OVERLAY_CSS;

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_OVERLAY_CSS']);
}

function get_undismissible_message () {
  global $ai_db_options;

  if (!isset ($ai_db_options [AI_OPTION_GLOBAL]['ADB_UNDISMISSIBLE_MESSAGE'])) $ai_db_options [AI_OPTION_GLOBAL]['ADB_UNDISMISSIBLE_MESSAGE'] = AI_DEFAULT_ADB_UNDISMISSIBLE_MESSAGE;

  return ($ai_db_options [AI_OPTION_GLOBAL]['ADB_UNDISMISSIBLE_MESSAGE']);
}

function filter_html_class ($str){

  $str = str_replace (array ("\\\""), array ("\""), $str);
  $str = sanitize_html_class ($str);

  return $str;
}

function filter_string ($str){

  $str = str_replace (array ("\\\""), array ("\""), $str);
  $str = str_replace (array ("\"", "<", ">"), "", $str);
  $str = trim (esc_html ($str));

  return $str;
}

function filter_string_tags ($str){

  $str = str_replace (array ("\\\""), array ("\""), $str);
  $str = str_replace (array ("\""), "", $str);
  $str = str_replace (array ("<", ">"), array ("&lt;", "&gt;"), $str);
  $str = trim (esc_html ($str));

  return $str;
}

function filter_option ($option, $value, $delete_escaped_backslashes = true){
  if ($delete_escaped_backslashes)
    $value = str_replace (array ("\\\""), array ("\""), $value);

  if ($option == AI_OPTION_DOMAIN_LIST ||
      $option == 'NO_PARAGRAPH_COUNTING_INSIDE' ||
      $option == 'ADB_SELECTORS' ||
      $option == AI_OPTION_PARAGRAPH_TAGS ||
      $option == AI_OPTION_IP_ADDRESS_LIST ||
      $option == AI_OPTION_COUNTRY_LIST) {
    $value = str_replace (array ("\\", "/", "?", "\"", "'", "<", ">", "[", "]"), "", $value);
    $value = esc_html ($value);
  }
  elseif (
    $option == AI_OPTION_PARAGRAPH_TEXT ||
    $option == AI_OPTION_AVOID_TEXT_ABOVE ||
    $option == AI_OPTION_AVOID_TEXT_BELOW
  ) {
    $value = esc_html ($value);
  }
  elseif ($option == AI_OPTION_BLOCK_NAME ||
          $option == AI_OPTION_GENERAL_TAG ||
          $option == AI_OPTION_DOMAIN_LIST ||
          $option == AI_OPTION_CATEGORY_LIST ||
          $option == AI_OPTION_TAG_LIST ||
          $option == AI_OPTION_ID_LIST ||
          $option == AI_OPTION_URL_LIST ||
          $option == AI_OPTION_URL_PARAMETER_LIST ||
          $option == AI_OPTION_PARAGRAPH_TEXT_TYPE ||
          $option == AI_OPTION_PARAGRAPH_NUMBER ||
          $option == AI_OPTION_MIN_PARAGRAPHS ||
          $option == AI_OPTION_MIN_WORDS_ABOVE ||
          $option == AI_OPTION_AVOID_PARAGRAPHS_ABOVE ||
          $option == AI_OPTION_AVOID_PARAGRAPHS_BELOW ||
          $option == AI_OPTION_AVOID_TRY_LIMIT ||
          $option == AI_OPTION_MIN_WORDS ||
          $option == AI_OPTION_MAX_WORDS ||
          $option == AI_OPTION_MIN_PARAGRAPH_WORDS ||
          $option == AI_OPTION_MAX_PARAGRAPH_WORDS ||
          $option == AI_OPTION_MAXIMUM_INSERTIONS ||
          $option == AI_OPTION_AFTER_DAYS ||
          $option == AI_OPTION_START_DATE ||
          $option == AI_OPTION_END_DATE ||
          $option == AI_OPTION_FALLBACK ||
          $option == AI_OPTION_EXCERPT_NUMBER ||
          $option == 'ADB_DELAY_ACTION' ||
          $option == 'ADB_NO_ACTION_PERIOD' ||
          $option == 'ADB_REDIRECTION_PAGE' ||
          $option == 'ADB_CUSTOM_REDIRECTION_URL' ||
          $option == AI_OPTION_CUSTOM_CSS ||
          $option == 'HOOK_PRIORITY' ||
          $option == 'ADB_OVERLAY_CSS' ||
          $option == 'ADB_MESSAGE_CSS') {
            $value = str_replace (array ("\"", "<", ">", "[", "]"), "", $value);
            $value = esc_html ($value);
          }

  return $value;
}

function filter_option_hf ($option, $value){
  $value = str_replace (array ("\\\""), array ("\""), $value);

//        if ($option == AI_OPTION_CODE ) {
//  } elseif ($option == AI_OPTION_ENABLE_MANUAL) {
//  } elseif ($option == AI_OPTION_PROCESS_PHP) {
//  } elseif ($option == AI_OPTION_ENABLE_404) {
//  } elseif ($option == AI_OPTION_DETECT_SERVER_SIDE) {
//  } elseif ($option == AI_OPTION_DISPLAY_FOR_DEVICES) {
//  }

  return $value;
}

function ai_ajax () {

//  check_ajax_referer ("adinserter_data", "ai_check");
//  check_admin_referer ("adinserter_data", "ai_check");

  if (function_exists ('ai_ajax_processing_2')) {
    ai_ajax_processing_2 ();
  }

  wp_die ();
}

function ai_ajax_backend () {
  global $preview_name, $preview_alignment, $preview_css;

//  check_ajax_referer ("adinserter_data", "ai_check");
  check_admin_referer ("adinserter_data", "ai_check");

  if (isset ($_POST ["preview"])) {
    $block = urldecode ($_POST ["preview"]);
    if (is_numeric ($block) && $block >= 1 && $block <= AD_INSERTER_BLOCKS) {
      generate_code_preview ($block, urldecode ($_POST ["name"]), urldecode ($_POST ["alignment"]), urldecode ($_POST ["alignment_css"]), urldecode ($_POST ["custom_css"]));
    }
    elseif ($block == 'adb') {
      generate_code_preview_adb ($block);
    }
  }

  elseif (isset ($_GET ["image"])) {
    header ("Content-Type: image/png");
    header ("Content-Length: " . filesize (AD_INSERTER_PLUGIN_DIR.'images/'.$_GET ["image"]));
    readfile  (AD_INSERTER_PLUGIN_DIR.'images/'.$_GET ["image"]);
  }

  elseif (isset ($_GET ["rating"])) {
    $cache_time = $_GET ["rating"] == 'update' ? 0 * 60 : AI_TRANSIENT_RATING_EXPIRATION;
    if (!get_transient (AI_TRANSIENT_RATING) || !($transient_timeout = get_option ('_transient_timeout_' . AI_TRANSIENT_RATING)) || AI_TRANSIENT_RATING_EXPIRATION - ($transient_timeout - time ()) > $cache_time) {
      $args = (object) array ('slug' => 'ad-inserter');
      $request = array ('action' => 'plugin_information', 'timeout' => 5, 'request' => serialize ($args));
      $url = 'http://api.wordpress.org/plugins/info/1.0/';
      $response = wp_remote_post ($url, array ('body' => $request));
      $plugin_info = @unserialize ($response ['body']);
      if (isset ($plugin_info->ratings)) {
        $total_rating = 0;
        $total_count = 0;
        foreach ($plugin_info->ratings as $rating => $count) {
          $total_rating += $rating * $count;
          $total_count += $count;
        }
        $rating = number_format ($total_rating / $total_count, 4);
        set_transient (AI_TRANSIENT_RATING, $rating, AI_TRANSIENT_RATING_EXPIRATION);
      }
    }
    if ($rating = get_transient (AI_TRANSIENT_RATING)) {
      if ($rating > 1 && $rating <= 5) echo $rating;
    }
  }

  elseif (isset ($_POST ["notice"])) {
    if (get_option ('ai-notice-review') == 'later') $_POST ["click"] = 'no';
    update_option ('ai-notice-' . $_POST ["notice"], $_POST ["click"]);
  }

  elseif (function_exists ('ai_ajax_backend_2')) {
    ai_ajax_backend_2 ();
  }

  wp_die ();
}

function ai_generate_extract (&$settings) {
  global $ai_custom_hooks;

  define ('AI_GENERATE_EXTRACT', true);

  $obj = new ai_Block (1);

  $extract = array ();

  $content_hook_blocks          = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $excerpt_hook_blocks          = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $loop_start_hook_blocks       = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $loop_end_hook_blocks         = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $post_hook_blocks             = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $before_comments_hook_blocks  = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $between_comments_hook_blocks = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $after_comments_hook_blocks   = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $footer_hook_blocks           = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  $custom_hook_blocks           = array ();
  for ($custom_hook = 1; $custom_hook <= AD_INSERTER_HOOKS; $custom_hook ++) {
    $custom_hook_blocks     []  = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array(), AI_PT_AJAX => array());
  }

  // Get blocks used in sidebar widgets
  $sidebar_widgets = wp_get_sidebars_widgets();
  $widget_options = get_option ('widget_ai_widget');

  $widget_blocks = array ();
  foreach ($sidebar_widgets as $sidebar_index => $sidebar_widget) {
    if (is_array ($sidebar_widget) && isset ($GLOBALS ['wp_registered_sidebars'][$sidebar_index]['name'])) {
      $sidebar_name = $GLOBALS ['wp_registered_sidebars'][$sidebar_index]['name'];
      if ($sidebar_name != "") {
        foreach ($sidebar_widget as $widget) {
          if (preg_match ("/ai_widget-([\d]+)/", $widget, $widget_id)) {
            if (isset ($widget_id [1]) && is_numeric ($widget_id [1])) {
              $widget_option = $widget_options [$widget_id [1]];
              $widget_block = $widget_option ['block'];
              if ($widget_block >= 1 && $widget_block <= AD_INSERTER_BLOCKS) {
                $widget_blocks [] = $widget_block;
              }
            }
          }
        }
      }
    }
  }
  $widget_blocks = array_unique ($widget_blocks);

  // Generate extracted data
  $used_blocks = 0;
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {

    if (!isset ($settings [$block])) continue;

    $obj->number = $block;
    $obj->wp_options = $settings [$block];

    $page_types = array ();
    if ($obj->get_display_settings_home())     $page_types []= AI_PT_HOMEPAGE;
    if ($obj->get_display_settings_page())     $page_types []= AI_PT_STATIC;
    if ($obj->get_display_settings_post())     $page_types []= AI_PT_POST;
    if ($obj->get_display_settings_category()) $page_types []= AI_PT_CATEGORY;
    if ($obj->get_display_settings_search())   $page_types []= AI_PT_SEARCH;
    if ($obj->get_display_settings_archive())  $page_types []= AI_PT_ARCHIVE;
    if ($obj->get_enable_ajax())               $page_types []= AI_PT_AJAX;
    if ($obj->get_enable_feed())               $page_types []= AI_PT_FEED;
    if ($obj->get_enable_404())                $page_types []= AI_PT_404;

    $automatic_insertion = $obj->get_automatic_insertion();
    if ($page_types) {
      switch ($automatic_insertion) {
        case AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH:
        case AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH:
        case AI_AUTOMATIC_INSERTION_BEFORE_CONTENT:
        case AI_AUTOMATIC_INSERTION_AFTER_CONTENT:
          foreach ($page_types as $block_page_type) $content_hook_blocks [$block_page_type][]= $block;
          $content_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_BEFORE_EXCERPT:
        case AI_AUTOMATIC_INSERTION_AFTER_EXCERPT:
          foreach ($page_types as $block_page_type) $excerpt_hook_blocks [$block_page_type][]= $block;
          $excerpt_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_BEFORE_POST:
          foreach ($page_types as $block_page_type) $loop_start_hook_blocks [$block_page_type][]= $block;
          $loop_start_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_AFTER_POST:
          foreach ($page_types as $block_page_type) $loop_end_hook_blocks [$block_page_type][]= $block;
          $loop_end_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_BETWEEN_POSTS:
          foreach ($page_types as $block_page_type) $post_hook_blocks [$block_page_type][]= $block;
          $post_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_BEFORE_COMMENTS:
          foreach ($page_types as $block_page_type) $before_comments_hook_blocks [$block_page_type][]= $block;
          $before_comments_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_BETWEEN_COMMENTS:
          foreach ($page_types as $block_page_type) $between_comments_hook_blocks [$block_page_type][]= $block;
          $between_comments_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_AFTER_COMMENTS:
          foreach ($page_types as $block_page_type) $after_comments_hook_blocks [$block_page_type][]= $block;
          $after_comments_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AI_AUTOMATIC_INSERTION_FOOTER:
          foreach ($page_types as $block_page_type) $footer_hook_blocks [$block_page_type][]= $block;
          $footer_hook_blocks [AI_PT_ANY][]= $block;
          break;
        default:
          if ($automatic_insertion >= AI_AUTOMATIC_INSERTION_CUSTOM_HOOK && $automatic_insertion < AI_AUTOMATIC_INSERTION_CUSTOM_HOOK + AD_INSERTER_HOOKS) {
            $hook_index = $automatic_insertion - AI_AUTOMATIC_INSERTION_CUSTOM_HOOK;
            foreach ($page_types as $block_page_type) $custom_hook_blocks [$hook_index][$block_page_type][]= $block;
            $custom_hook_blocks [$hook_index][AI_PT_ANY][]= $block;
          }
          break;
      }
    }

    $automatic           = $automatic_insertion         != AI_AUTOMATIC_INSERTION_DISABLED;
    $manual_widget       = $obj->get_enable_widget()    == AI_ENABLED;
    $manual_shortcode    = $obj->get_enable_manual()    == AI_ENABLED;
    $manual_php_function = $obj->get_enable_php_call()  == AI_ENABLED;
    if ($automatic || ($manual_widget && in_array ($block, $widget_blocks)) || $manual_shortcode || $manual_php_function) {
      $used_blocks ++;
    }
  }

  $extract [AI_EXTRACT_USED_BLOCKS]       = $used_blocks;

  $extract [CONTENT_HOOK_BLOCKS]          = $content_hook_blocks;
  $extract [EXCERPT_HOOK_BLOCKS]          = $excerpt_hook_blocks;
  $extract [LOOP_START_HOOK_BLOCKS]       = $loop_start_hook_blocks;
  $extract [LOOP_END_HOOK_BLOCKS]         = $loop_end_hook_blocks;
  $extract [POST_HOOK_BLOCKS]             = $post_hook_blocks;
  $extract [BEFORE_COMMENTS_HOOK_BLOCKS]  = $before_comments_hook_blocks;
  $extract [BETWEEN_COMMENTS_HOOK_BLOCKS] = $between_comments_hook_blocks;
  $extract [AFTER_COMMENTS_HOOK_BLOCKS]   = $after_comments_hook_blocks;
  $extract [FOOTER_HOOK_BLOCKS]           = $footer_hook_blocks;

  for ($custom_hook = 1; $custom_hook <= AD_INSERTER_HOOKS; $custom_hook ++) {
    $action = get_hook_action ($custom_hook);
    if (get_hook_enabled ($custom_hook) && get_hook_name ($custom_hook) != '' && $action != '') {
      $extract [$action . CUSTOM_HOOK_BLOCKS] = $custom_hook_blocks [$custom_hook - 1];
    }
  }

  return ($extract);
}

function ai_load_settings () {
  global $ai_db_options, $block_object, $ai_db_options_extract, $ai_wp_data, $version_string, $ai_custom_hooks;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD SETTINGS START");

  ai_load_options ();

  $ai_custom_hooks = array ();
  for ($hook = 1; $hook <= AD_INSERTER_HOOKS; $hook ++) {
    $name   = get_hook_name   ($hook);
    $action = get_hook_action ($hook);
    if (get_hook_enabled ($hook) && $name != '' && $action != '') {
      $ai_custom_hooks [] = array ('index' => $hook, 'name' => $name, 'action' => $action, 'priority' => get_hook_priority ($hook));
    }
  }

  if (isset ($ai_db_options [AI_EXTRACT_OPTION_NAME]) &&
      isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] == $version_string &&
      isset ($ai_db_options [AI_EXTRACT_OPTION_NAME][POST_HOOK_BLOCKS]) &&
      isset ($ai_db_options [AI_EXTRACT_OPTION_NAME][POST_HOOK_BLOCKS][AI_PT_AJAX]) &&
      isset ($ai_db_options [AI_EXTRACT_OPTION_NAME][BETWEEN_COMMENTS_HOOK_BLOCKS]) &&
      isset ($ai_db_options [AI_EXTRACT_OPTION_NAME][AI_EXTRACT_USED_BLOCKS]) &&
      isset ($ai_db_options [AI_EXTRACT_OPTION_NAME][FOOTER_HOOK_BLOCKS]))
    $ai_db_options_extract = $ai_db_options [AI_EXTRACT_OPTION_NAME]; else
      $ai_db_options_extract = ai_generate_extract ($ai_db_options);

  $obj = new ai_Block (0);
  $obj->wp_options [AI_OPTION_BLOCK_NAME] = 'Default';
  $block_object [0] = $obj;
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = new ai_Block ($block);
    $obj->load_options ($block);
    $block_object [$block] = $obj;
  }

  $adH  = new ai_AdH();
  $adF  = new ai_AdF();
  $adH->load_options (AI_HEADER_OPTION_NAME);
  $adF->load_options (AI_FOOTER_OPTION_NAME);
  $block_object [AI_HEADER_OPTION_NAME]       = $adH;
  $block_object [AI_FOOTER_OPTION_NAME]       = $adF;

  if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
    $adA  = new ai_AdA();
    $adA->load_options (AI_ADB_MESSAGE_OPTION_NAME);
    $block_object [AI_ADB_MESSAGE_OPTION_NAME]  = $adA;
    $ai_wp_data [AI_ADB_DETECTION] = $adA->get_enable_manual ();
  }

  if (($install_timestamp = get_option (AI_INSTALL_NAME)) !== false) {
    $install    = new DateTime (date('Y-m-d H:i:s', $install_timestamp));
    $now        = new DateTime (date('Y-m-d H:i:s', time()));
    if (method_exists ($install, 'diff')) {
      $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE] = $install->diff ($now);
      $ai_wp_data [AI_DAYS_SINCE_INSTAL]       = $ai_wp_data [AI_INSTALL_TIME_DIFFERENCE]->days;
    }
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD SETTINGS END");
}


function generate_viewport_css () {

  $viewports = array ();
  for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
    $viewport_name  = get_viewport_name ($viewport);
    $viewport_width = get_viewport_width ($viewport);
    if ($viewport_name != '') {
      $viewports []= array ('index' => $viewport, 'name' => $viewport_name, 'width' => $viewport_width);
    }
  }

  $viewport_styles = '';
  if (count ($viewports) != 0) {
//    $viewport_styles .= "/* " . AD_INSERTER_NAME . " version " . AD_INSERTER_VERSION ." - viewport classes */\n\n";
//    $viewport_styles .= "/* DO NOT MODIFY - This file is automatically generated when you save ".AD_INSERTER_NAME." settings */\n";
    foreach ($viewports as $index => $viewport) {
//      $viewport_styles .= "\n/* " . $viewport ['name'] . " */\n\n";
      if ($viewport ['index'] == 1) {
        foreach (array_reverse ($viewports) as $index2 => $viewport2) {
          if ($viewport2 ['index'] != 1) {
            $viewport_styles .= ".ai-viewport-" . $viewport2 ['index'] . "                { display: none !important;}\n";
          }
        }
        $viewport_styles .= ".ai-viewport-1                { display: inherit !important;}\n";
        $viewport_styles .= ".ai-viewport-0                { display: none !important;}\n";
      } else {
          $viewport_styles .= "@media ";
          if ($index != count ($viewports) - 1)
            $viewport_styles .= "(min-width: " . $viewport ['width'] . "px) and ";
          $viewport_styles .= "(max-width: " . ($viewports [$index - 1]['width'] - 1) . "px) {\n";
          foreach ($viewports as $index2 => $viewport2) {
            if ($viewport2 ['index'] == 1)
              $viewport_styles .= ".ai-viewport-" . $viewport2 ['index'] . "                { display: none !important;}\n";
            elseif ($viewport ['index'] == $viewport2 ['index'])
              $viewport_styles .= ".ai-viewport-" . $viewport2 ['index'] . "                { display: inherit !important;}\n";

          }
          $viewport_styles .= "}\n";
        }
    }
  }
  return ($viewport_styles);
}


function ai_settings () {
  global $ai_db_options, $block_object, $wpdb;

  if (isset ($_POST [AI_FORM_SAVE])) {

//    echo count ($_POST);
//    print_r ($_POST);

    check_admin_referer ('save_adinserter_settings');

    $subpage = 'main';
    $start =  1;
    $end   = 16;
    if (function_exists ('ai_settings_parameters')) ai_settings_parameters ($subpage, $start, $end);

    $invalid_blocks = array ();

    $import_switch_name = AI_OPTION_IMPORT . WP_FORM_FIELD_POSTFIX . '0';
    if (isset ($_POST [$import_switch_name]) && $_POST [$import_switch_name] == "1") {
      // Import Ad Inserter settings
      $ai_options = @unserialize (base64_decode (str_replace (array ("\\\""), array ("\""), $_POST ["export_settings_0"])));

      if ($ai_options === false) {
        // Use saved settings
        $ai_options = wp_slash ($ai_db_options);
        $invalid_blocks []= 0;
      } else $ai_options = wp_slash ($ai_options);
    } else {
        // Try to import individual settings
        $ai_options = array ();

        for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
          $ad = new ai_Block ($block);

          if (isset ($ai_db_options [$block])) $saved_settings = wp_slash ($ai_db_options [$block]); else
            $saved_settings = wp_slash ($ad->wp_options);

          if ($block < $start || $block > $end) {
            $ai_options [$block] = $saved_settings;
            continue;
          }

//          $block_settings = 0;
          $import_switch_name      = AI_OPTION_IMPORT      . WP_FORM_FIELD_POSTFIX . $block;
          $import_name_switch_name = AI_OPTION_IMPORT_NAME . WP_FORM_FIELD_POSTFIX . $block;
          if (isset ($_POST [$import_switch_name]) && $_POST [$import_switch_name] == "1") {

            $exported_settings = @unserialize (base64_decode (str_replace (array ("\\\""), array ("\""), $_POST ["export_settings_" . $block])));

            if ($exported_settings !== false) {
              $exported_settings = wp_slash ($exported_settings);
              foreach (array_keys ($ad->wp_options) as $key){
                if ($key == AI_OPTION_BLOCK_NAME && isset ($_POST [$import_name_switch_name]) && $_POST [$import_name_switch_name] != "1") {
                  $form_field_name = $key . WP_FORM_FIELD_POSTFIX . $block;
                  if (isset ($_POST [$form_field_name])){
                    $ad->wp_options [$key] = filter_option ($key, $_POST [$form_field_name]);
                  }
                } else {
                    if (isset ($exported_settings [$key])) {
                      $ad->wp_options [$key] = filter_option ($key, $exported_settings [$key], false);
//                      $block_settings ++;
                    }
                  }
              }
            } else {
                $ad->wp_options = $saved_settings;
                $invalid_blocks []= $block;
              }
          } else {
              foreach (array_keys ($ad->wp_options) as $key){
                $form_field_name = $key . WP_FORM_FIELD_POSTFIX . $block;
                if (isset ($_POST [$form_field_name])){
                  $ad->wp_options [$key] = filter_option ($key, $_POST [$form_field_name]);
//                  $block_settings ++;
                }
              }
            }

          $ai_options [$block] = $ad->wp_options;
          delete_option (str_replace ("#", $block, AD_ADx_OPTIONS));
        }

        $adH  = new ai_AdH();
        $adF  = new ai_AdF();

        foreach(array_keys ($adH->wp_options) as $key){
          $form_field_name = $key . WP_FORM_FIELD_POSTFIX . AI_HEADER_OPTION_NAME;
          if(isset ($_POST [$form_field_name])){
              $adH->wp_options [$key] = filter_option_hf ($key, $_POST [$form_field_name]);
          }
        }

        foreach(array_keys($adF->wp_options) as $key){
          $form_field_name = $key . WP_FORM_FIELD_POSTFIX . AI_FOOTER_OPTION_NAME;
          if(isset ($_POST [$form_field_name])){
              $adF->wp_options [$key] = filter_option_hf ($key, $_POST [$form_field_name]);
          }
        }

        $ai_options [AI_HEADER_OPTION_NAME]       = $adH->wp_options;
        $ai_options [AI_FOOTER_OPTION_NAME]       = $adF->wp_options;

        if (defined ('AI_ADBLOCKING_DETECTION') && AI_ADBLOCKING_DETECTION) {
          $adA  = new ai_AdA();
          foreach(array_keys($adA->wp_options) as $key){
            $form_field_name = $key . WP_FORM_FIELD_POSTFIX . AI_ADB_MESSAGE_OPTION_NAME;
            if(isset ($_POST [$form_field_name])){
                $adA->wp_options [$key] = filter_option_hf ($key, $_POST [$form_field_name]);
            }
          }
          $ai_options [AI_ADB_MESSAGE_OPTION_NAME]  = $adA->wp_options;
        }

        $options = array ();

        if (function_exists ('ai_filter_global_settings')) ai_filter_global_settings ($options);

        if (isset ($_POST ['syntax-highlighter-theme']))            $options ['SYNTAX_HIGHLIGHTER_THEME']     = filter_string ($_POST ['syntax-highlighter-theme']);
        if (isset ($_POST ['block-class-name']))                    $options ['BLOCK_CLASS_NAME']             = filter_html_class ($_POST ['block-class-name']);
        if (isset ($_POST ['minimum-user-role']))                   $options ['MINIMUM_USER_ROLE']            = filter_string ($_POST ['minimum-user-role']);
        if (isset ($_POST ['sticky-widget-mode']))                  $options ['STICKY_WIDGET_MODE']           = filter_option ('STICKY_WIDGET_MODE',            $_POST ['sticky-widget-mode']);
        if (isset ($_POST ['sticky-widget-margin']))                $options ['STICKY_WIDGET_MARGIN']         = filter_option ('STICKY_WIDGET_MARGIN',          $_POST ['sticky-widget-margin']);
        if (isset ($_POST ['plugin_priority']))                     $options ['PLUGIN_PRIORITY']              = filter_option ('PLUGIN_PRIORITY',               $_POST ['plugin_priority']);
        if (isset ($_POST ['dynamic_blocks']))                      $options ['DYNAMIC_BLOCKS']               = filter_option ('DYNAMIC_BLOCKS',                $_POST ['dynamic_blocks']);
        if (isset ($_POST ['paragraph_counting_functions']))        $options ['PARAGRAPH_COUNTING_FUNCTIONS'] = filter_option ('PARAGRAPH_COUNTING_FUNCTIONS',  $_POST ['paragraph_counting_functions']);
        if (isset ($_POST ['no-paragraph-counting-inside']))        $options ['NO_PARAGRAPH_COUNTING_INSIDE'] = filter_option ('NO_PARAGRAPH_COUNTING_INSIDE',  $_POST ['no-paragraph-counting-inside']);
        if (isset ($_POST [AI_OPTION_ADB_ACTION]))                  $options ['ADB_ACTION']                   = filter_option ('ADB_ACTION',                    $_POST [AI_OPTION_ADB_ACTION]);
        if (isset ($_POST [AI_OPTION_ADB_DELAY_ACTION]))            $options ['ADB_DELAY_ACTION']             = filter_option ('ADB_DELAY_ACTION',              $_POST [AI_OPTION_ADB_DELAY_ACTION]);
        if (isset ($_POST [AI_OPTION_ADB_NO_ACTION_PERIOD]))        $options ['ADB_NO_ACTION_PERIOD']         = filter_option ('ADB_NO_ACTION_PERIOD',          $_POST [AI_OPTION_ADB_NO_ACTION_PERIOD]);
        if (isset ($_POST [AI_OPTION_ADB_SELECTORS]))               $options ['ADB_SELECTORS']                = filter_option ('ADB_SELECTORS',                 $_POST [AI_OPTION_ADB_SELECTORS]);
        if (isset ($_POST [AI_OPTION_ADB_REDIRECTION_PAGE]))        $options ['ADB_REDIRECTION_PAGE']         = filter_option ('ADB_REDIRECTION_PAGE',          $_POST [AI_OPTION_ADB_REDIRECTION_PAGE]);
        if (isset ($_POST [AI_OPTION_ADB_CUSTOM_REDIRECTION_URL]))  $options ['ADB_CUSTOM_REDIRECTION_URL']   = filter_option ('ADB_CUSTOM_REDIRECTION_URL',    $_POST [AI_OPTION_ADB_CUSTOM_REDIRECTION_URL]);
        if (isset ($_POST [AI_OPTION_ADB_MESSAGE_CSS]))             $options ['ADB_MESSAGE_CSS']              = filter_option ('ADB_MESSAGE_CSS',               $_POST [AI_OPTION_ADB_MESSAGE_CSS]);
        if (isset ($_POST [AI_OPTION_ADB_OVERLAY_CSS]))             $options ['ADB_OVERLAY_CSS']              = filter_option ('ADB_OVERLAY_CSS',               $_POST [AI_OPTION_ADB_OVERLAY_CSS]);
        if (isset ($_POST [AI_OPTION_ADB_UNDISMISSIBLE_MESSAGE]))   $options ['ADB_UNDISMISSIBLE_MESSAGE']    = filter_option ('ADB_UNDISMISSIBLE_MESSAGE',     $_POST [AI_OPTION_ADB_UNDISMISSIBLE_MESSAGE]);
        if (isset ($_POST ['admin_toolbar_debugging']))             $options ['ADMIN_TOOLBAR_DEBUGGING']      = filter_option ('ADMIN_TOOLBAR_DEBUGGING',       $_POST ['admin_toolbar_debugging']);
        if (isset ($_POST ['remote_debugging']))                    $options ['REMOTE_DEBUGGING']             = filter_option ('REMOTE_DEBUGGING',              $_POST ['remote_debugging']);
        if (isset ($_POST ['javascript_debugging']))                $options ['JAVASCRIPT_DEBUGGING']         = filter_option ('JAVASCRIPT_DEBUGGING',          $_POST ['javascript_debugging']);

        for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
          if (isset ($_POST ['viewport-name-'.$viewport]))  $options ['VIEWPORT_NAME_'.$viewport]   = filter_string ($_POST ['viewport-name-'.$viewport]);
          if (isset ($_POST ['viewport-width-'.$viewport])) $options ['VIEWPORT_WIDTH_'.$viewport]  = filter_option ('viewport_width', $_POST ['viewport-width-'.$viewport]);
        }

        for ($hook = 1; $hook <= AD_INSERTER_HOOKS; $hook ++) {
          if (isset ($_POST ['hook-enabled-'.$hook]))  $options ['HOOK_ENABLED_'.$hook]   = filter_option ('HOOK_ENABLED', $_POST ['hook-enabled-'.$hook]);
          if (isset ($_POST ['hook-name-'.$hook]))     $options ['HOOK_NAME_'.$hook]      = filter_string_tags ($_POST ['hook-name-'.$hook]);
          if (isset ($_POST ['hook-action-'.$hook]))   $options ['HOOK_ACTION_'.$hook]    = filter_string ($_POST ['hook-action-'.$hook]);
          if (isset ($_POST ['hook-priority-'.$hook])) $options ['HOOK_PRIORITY_'.$hook]  = filter_option ('HOOK_PRIORITY', $_POST ['hook-enabled-'.$hook]);
        }

        $options ['VIEWPORT_CSS'] = generate_viewport_css ();

        $ai_options [AI_OPTION_GLOBAL] = ai_check_plugin_options ($options);
      }

    if (!empty ($invalid_blocks)) {
      if ($invalid_blocks [0] == 0) {
             echo "<div class='error' style='margin: 5px 15px 2px 0px; padding: 10px;'>Error importing ", AD_INSERTER_NAME, " settings.</div>";
      } else echo "<div class='error' style='margin: 5px 15px 2px 0px; padding: 10px;'>Error importing settings for block", count ($invalid_blocks) == 1 ? "" : "s:", " ", implode (", ", $invalid_blocks), ".</div>";
    }

    // Generate and save extract
    $ai_options [AI_EXTRACT_OPTION_NAME] = ai_generate_extract ($ai_options);

    $ai_options [AI_OPTION_GLOBAL]['TIMESTAMP'] = time ();

    if (get_option (AI_INSTALL_NAME) === false) {
      update_option (AI_INSTALL_NAME, time ());
    }

    update_option (AI_OPTION_NAME, $ai_options);

    // Multisite
    if (is_multisite () && is_main_site ()) {
      $options = array ();

      if (function_exists ('ai_filter_multisite_settings')) ai_filter_multisite_settings ($options);

      ai_check_multisite_options ($options);
      update_site_option (AI_OPTION_NAME, $options);
    }

    ai_load_settings ();

    if (function_exists ('ai_load_globals')) ai_load_globals ();

    delete_option (str_replace ("#", "Header", AD_ADx_OPTIONS));
    delete_option (str_replace ("#", "Footer", AD_ADx_OPTIONS));
    delete_option (AD_OPTIONS);

    echo "<div class='notice notice-success is-dismissible' style='margin: 5px 15px 2px 0px;'><p><strong>Settings saved.</strong></p></div>";

  } elseif (isset ($_POST [AI_FORM_CLEAR])) {

      check_admin_referer ('save_adinserter_settings');

      for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
        delete_option (str_replace ("#", $block, AD_ADx_OPTIONS));
      }

      delete_option (str_replace ("#", "Header", AD_ADx_OPTIONS));
      delete_option (str_replace ("#", "Footer", AD_ADx_OPTIONS));
      delete_option (AD_OPTIONS);

      delete_option (AI_OPTION_NAME);

      if (is_multisite () && is_main_site ()) {
        delete_site_option (AI_OPTION_NAME, $options);
      }

      if (function_exists ('ai_load_globals')) {
        delete_option (WP_AD_INSERTER_PRO_LICENSE);
        $wpdb->query ("DROP TABLE IF EXISTS " . AI_STATISTICS_DB_TABLE);
      }

      if (ai_current_user_role_ok () && (!is_multisite() || is_main_site () || multisite_exceptions_enabled ())) {

        $args = array (
          'public'    => true,
          '_builtin'  => false
        );
        $custom_post_types = get_post_types ($args, 'names', 'and');
        $screens = array_values (array_merge (array ('post', 'page'), $custom_post_types));

        $args = array (
          'posts_per_page'   => 100,
          'offset'           => 0,
          'category'         => '',
          'category_name'    => '',
          'orderby'          => 'type',
          'order'            => 'ASC',
          'include'          => '',
          'exclude'          => '',
          'meta_key'         => '_adinserter_block_exceptions',
          'meta_value'       => '',
          'post_type'        => $screens,
          'post_mime_type'   => '',
          'post_parent'      => '',
          'author'           => '',
          'author_name'      => '',
          'post_status'      => '',
          'suppress_filters' => true
        );
        $posts_pages = get_posts ($args);

        foreach ($posts_pages as $page) {
          delete_post_meta ($page->ID, '_adinserter_block_exceptions');
        }
      }

      ai_load_settings ();

      if (function_exists ('ai_load_globals')) ai_load_globals ();

      echo "<div class='notice notice-warning is-dismissible' style='margin: 5px 15px 2px 0px;'><p><strong>Settings cleared.</strong></p></div>";
  } elseif (isset ($_POST [AI_FORM_CLEAR_EXCEPTIONS])) {
      if (ai_current_user_role_ok () && (!is_multisite() || is_main_site () || multisite_exceptions_enabled ())) {

        $args = array (
          'public'    => true,
          '_builtin'  => false
        );
        $custom_post_types = get_post_types ($args, 'names', 'and');
        $screens = array_values (array_merge (array ('post', 'page'), $custom_post_types));

        $args = array (
          'posts_per_page'   => 100,
          'offset'           => 0,
          'category'         => '',
          'category_name'    => '',
          'orderby'          => 'type',
          'order'            => 'ASC',
          'include'          => '',
          'exclude'          => '',
          'meta_key'         => '_adinserter_block_exceptions',
          'meta_value'       => '',
          'post_type'        => $screens,
          'post_mime_type'   => '',
          'post_parent'      => '',
          'author'           => '',
          'author_name'      => '',
          'post_status'      => '',
          'suppress_filters' => true
        );
        $posts_pages = get_posts ($args);

        if ($_POST [AI_FORM_CLEAR_EXCEPTIONS] == "\xe2\x9d\x8c") {
          foreach ($posts_pages as $page) {
            delete_post_meta ($page->ID, '_adinserter_block_exceptions');
          }
        }
        elseif (strpos ($_POST [AI_FORM_CLEAR_EXCEPTIONS], 'id=') === 0) {
          $id = str_replace ('id=', '', $_POST [AI_FORM_CLEAR_EXCEPTIONS]);
          if (is_numeric ($id)) {
            delete_post_meta ($id, '_adinserter_block_exceptions');
          }
        }
        elseif (is_numeric ($_POST [AI_FORM_CLEAR_EXCEPTIONS])) {
          foreach ($posts_pages as $page) {
            $post_meta = get_post_meta ($page->ID, '_adinserter_block_exceptions', true);
            $selected_blocks = explode (",", $post_meta);
            if (($key = array_search ($_POST [AI_FORM_CLEAR_EXCEPTIONS], $selected_blocks)) !== false) {
              unset ($selected_blocks [$key]);
              update_post_meta ($page->ID, '_adinserter_block_exceptions', implode (",", $selected_blocks));
            }
          }
        }
      }
  } elseif (isset ($_POST [AI_FORM_CLEAR_STATISTICS]) && is_numeric ($_POST [AI_FORM_CLEAR_STATISTICS])) {
      if ($_POST [AI_FORM_CLEAR_STATISTICS] != 0) {
        $wpdb->query ("DELETE FROM " . AI_STATISTICS_DB_TABLE . " WHERE block = " . $_POST [AI_FORM_CLEAR_STATISTICS]);
      } else $wpdb->query ("DROP TABLE IF EXISTS " . AI_STATISTICS_DB_TABLE);
  }

  generate_settings_form ();
}


function ai_adinserter ($ad_number = '', $ignore = ''){
  global $block_object, $ad_inserter_globals, $ai_wp_data, $ai_last_check;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;

  if ($ad_number == "") return "";
  if (!is_numeric ($ad_number)) return "";
  $ad_number = (int) $ad_number;
  if ($ad_number < 1 || $ad_number > AD_INSERTER_BLOCKS) return "";

  $globals_name = AI_PHP_FUNCTION_CALL_COUNTER_NAME . $ad_number;

  if (!isset ($ad_inserter_globals [$globals_name])) {
    $ad_inserter_globals [$globals_name] = 1;
  } else $ad_inserter_globals [$globals_name] ++;

  if ($debug_processing) ai_log ("PHP FUNCTION CALL adinserter ($ad_number".($ignore == '' ? '' : ', \''.$ignore)."') [" . $ad_inserter_globals [$globals_name] . ']');

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_PHP_FUNCTION;

  $ignore_array = array ();
  if (trim ($ignore) != '') {
    $ignore_array = explode (",", str_replace (" ", "", $ignore));
  }

  $obj = $block_object [$ad_number];
  $obj->clear_code_cache ();

  $ai_last_check = AI_CHECK_ENABLED;
  if (!$obj->get_enable_php_call ()) return "";
  if (!$obj->check_server_side_detection ()) return "";
  if (!$obj->check_page_types_lists_users (in_array ("page-type", $ignore_array))) return "";
  if (!$obj->check_filter ($ad_inserter_globals [$globals_name])) return "";
  if (!$obj->check_number_of_words ()) return "";

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);

    if (!$obj->check_post_page_exceptions ($selected_blocks)) return "";
  }

  // Last check before counter check before insertion
  $ai_last_check = AI_CHECK_CODE;
  if ($obj->ai_getCode () == '') return "";

  // Last check before insertion
  if (!$obj->check_and_increment_block_counter ()) return "";

  $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) != 0) return "";

  $ai_last_check = AI_CHECK_INSERTED;
  return $obj->get_code_for_insertion ();
}

function adinserter ($block = '', $ignore = '') {
  global $ai_last_check, $ai_wp_data, $ai_total_plugin_time;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) $start_time = microtime (true);

  $ai_last_check = AI_CHECK_NONE;
  $code = ai_adinserter ($block, $ignore);

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    if ($ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($block, $ai_last_check));
    ai_log ("PHP FUNCTION CALL END\n");
  }

  return $code;
}



function ai_content_hook ($content = '') {
  global $block_object, $ad_inserter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time, $special_element_tags;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  $globals_name = AI_CONTENT_COUNTER_NAME;

  $special_element_tags = explode (',', str_replace (' ', '', get_no_paragraph_counting_inside ()));

  if (!isset ($ad_inserter_globals [$globals_name])) {
    $ad_inserter_globals [$globals_name] = 1;
  } else $ad_inserter_globals [$globals_name] ++;

  if ($debug_processing) {
    ai_log ("CONTENT HOOK START [" . $ad_inserter_globals [$globals_name] . ']');
    $start_time = microtime (true);
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_CONTENT;

  $content_words = number_of_words ($content);
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

    $positions_inserted = false;
    if ($ai_wp_data [AI_WP_DEBUG_BLOCK] == 0) {
      $preview = $block_object [0];
      $content = $preview->before_paragraph ($content, true);
      $content = $preview->after_paragraph ($content, true);
      $positions_inserted = true;
    }
  }

  if ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) {
    if ($debug_processing) ai_log_content ($content);

    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
      $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
      $selected_blocks = explode (",", $meta_value);
    } else $selected_blocks = array ();

    $ai_last_check = AI_CHECK_NONE;
    $current_block = 0;

    if (isset ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    foreach ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
      if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

      if (!isset ($block_object [$block])) continue;

      $current_block = $block;

      $obj = $block_object [$block];
      $obj->clear_code_cache ();

      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0 && !$positions_inserted && $ai_wp_data [AI_WP_DEBUG_BLOCK] <= $block) {
        $preview = $block_object [$ai_wp_data [AI_WP_DEBUG_BLOCK]];
        $content = $preview->before_paragraph ($content, true);
        $content = $preview->after_paragraph ($content, true);
        $positions_inserted = true;
      }

      if (!$obj->check_server_side_detection ()) continue;
      if (!$obj->check_page_types_lists_users ()) continue;
      if (!$obj->check_post_page_exceptions ($selected_blocks)) continue;
      if (!$obj->check_filter ($ad_inserter_globals [$globals_name])) continue;
      if (!$obj->check_number_of_words ($content, $content_words)) continue;

//    Deprecated
      $ai_last_check = AI_CHECK_DISABLED_MANUALLY;
      if ($obj->display_disabled ($content)) continue;

      // Last check before counter check before insertion
      $ai_last_check = AI_CHECK_CODE;
      if ($obj->ai_getCode () == '') continue;

      // Last check before insertion
      if (!$obj->check_block_counter ()) continue;

      $automatic_insertion = $obj->get_automatic_insertion();

      if ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH) {
        $ai_last_check = AI_CHECK_PARAGRAPH_COUNTING;
        $content = $obj->before_paragraph ($content);
      }
      elseif ($automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH) {
        $ai_last_check = AI_CHECK_PARAGRAPH_COUNTING;
        $content = $obj->after_paragraph ($content);
      }
      elseif ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_CONTENT) {
        $obj->increment_block_counter ();

        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $content = $obj->get_code_for_insertion () . $content;
          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
      elseif ($automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_CONTENT) {
        $obj->increment_block_counter ();

        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $content = $content . $obj->get_code_for_insertion ();
          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
    }
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));
  }


  if (function_exists ('ai_content')) ai_content ($content);

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) != 0) {
    $style = AI_DEBUG_TAGS_STYLE;

    $content = preg_replace ("/\r\n\r\n/", "\r\n\r\n<kbd style='$style background: #0ff; color: #000;'>\\r\\n\\r\\n</kbd>", $content);

    $content = preg_replace ("/<p>/i", "<p><kbd style='$style background: #0a0;'>&lt;p&gt;</kbd>", $content);
//    $content = preg_replace ("/<p ([^>]*?)>/i", "<p$1><kbd style='$style background: #0a0;'>&lt;p$1&gt;</kbd>", $content);          // Full p tags
    $content = preg_replace ("/<p ([^>]*?)>/i", "<p$1><kbd style='$style background: #0a0;'>&lt;p&gt;</kbd>", $content);
//      $content = preg_replace ("/<div([^>]*?)>/i", "<div$1><kbd style='$style background: #46f;'>&lt;div$1&gt;</kbd>", $content);  // Full div tags
    $content = preg_replace ("/<div([^>]*?)>/i", "<div$1><kbd style='$style background: #46f;'>&lt;div&gt;</kbd>", $content);
    $content = preg_replace ("/<h([1-6])([^>]*?)>/i", "<h$1$2><kbd style='$style background: #d4e;'>&lt;h$1&gt;</kbd>", $content);
    $content = preg_replace ("/<img([^>]*?)>/i", "<img$1><kbd style='$style background: #ee0; color: #000'>&lt;img$1&gt;</kbd>", $content);
    $content = preg_replace ("/<pre([^>]*?)>/i", "<pre$1><kbd style='$style background: #222;'>&lt;pre&gt;</kbd>", $content);
    $content = preg_replace ("/<(?!section|ins|script|kbd|a|strong|pre|p|div|h[1-6]|img)([a-z0-9]+)([^>]*?)>/i", "<$1$2><kbd style='$style background: #fb0; color: #000;'>&lt;$1$2&gt;</kbd>", $content);

    $content = preg_replace ("/<\/p>/i", "<kbd style='$style background: #0a0;'>&lt;/p&gt;</kbd></p>", $content);
    $content = preg_replace ("/<\/div>/i", "<kbd style='$style background: #46f;'>&lt;/div&gt;</kbd></div>", $content);
    $content = preg_replace ("/<\/h([1-6])>/i", "<kbd style='$style background: #d4e;'>&lt;/h$1&gt;</kbd></h$1>", $content);
    $content = preg_replace ("/<\/pre>/i", "<kbd style='$style background: #222;'>&lt;/pre&gt;</kbd></pre>", $content);
    $content = preg_replace ("/<\/(?!section|ins|script|kbd|a|strong|pre|p|div|h[1-6])([a-z0-9]+)>/i", "<kbd style='$style background: #fb0; color: #000;'>&lt;/$1&gt;</kbd></$1>", $content);
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    $style      = AI_DEBUG_POSITIONS_STYLE;

    if (!$positions_inserted) {
      $preview = $block_object [$ai_wp_data [AI_WP_DEBUG_BLOCK]];
      $content = $preview->before_paragraph ($content, true);
      $content = $preview->after_paragraph ($content, true);
    }

    $content = preg_replace ("/\[\[AI_BP([\d]+?)\]\]/", "<section style='$style'>BEFORE PARAGRAPH $1</section>", $content);
    $content = preg_replace ("/\[\[AI_AP([\d]+?)\]\]/", "<section style='$style'>AFTER PARAGRAPH $1</section>", $content);

    $counter = $ad_inserter_globals [$globals_name];
    if ($counter == 1) $counter = '';

    $content = "<section style='$style'><a style='float: left; font-size: 10px; text-decoration: none; color: transparent; padding: 0px 10px 0 0;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> BEFORE CONTENT ".$counter."<a style='float: right; font-size: 10px; text-decoration: none; color: #88f; padding: 0px 10px 0 0;'>".$content_words." words</a></section>". $content;

    if ($ai_wp_data [AI_WP_AMP_PAGE]) {
      $content = get_page_type_debug_info ('AMP ') . $content;
    }

    $content = $content . "<section style='$style'>AFTER CONTENT ".$counter."</section>";

    if ($ai_wp_data [AI_WP_AMP_PAGE]) {
      $content = $content . get_page_type_debug_info ('AMP ');
    }
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) != 0) {
    $content = '<kbd style="display: none">[HTML TAGS REMOVED]</kbd>' . $content;
  }

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("CONTENT HOOK END\n");
  }

  return $content;
}

// Process Before/After Excerpt postion
function ai_excerpt_hook ($content = '') {
  global $ad_inserter_globals, $block_object, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  $globals_name = AI_EXCERPT_COUNTER_NAME;

  if (!isset ($ad_inserter_globals [$globals_name])) {
    $ad_inserter_globals [$globals_name] = 1;
  } else $ad_inserter_globals [$globals_name] ++;

  if ($debug_processing) {
    ai_log ("EXCERPT HOOK START [" . $ad_inserter_globals [$globals_name] . ']');
    $start_time = microtime (true);
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_EXCERPT;

  $ai_last_check = AI_CHECK_NONE;
  $current_block = 0;

  if (isset ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
  foreach ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    if (!isset ($block_object [$block])) continue;

    $current_block = $block;
    $obj = $block_object [$block];
    $obj->clear_code_cache ();

    if (!$obj->check_server_side_detection ()) continue;
    if (!$obj->check_page_types_lists_users ()) continue;
    if (!$obj->check_filter ($ad_inserter_globals [$globals_name])) continue;

    // Deprecated
    $ai_last_check = AI_CHECK_DISABLED_MANUALLY;
    if ($obj->display_disabled ($content)) continue;

    // Last check before counter check before insertion
    $ai_last_check = AI_CHECK_CODE;
    if ($obj->ai_getCode () == '') continue;

    // Last check before insertion
    if (!$obj->check_and_increment_block_counter ()) continue;

    $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {

      $automatic_insertion = $obj->get_automatic_insertion ();
      if ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_EXCERPT)
        $content = $obj->get_code_for_insertion () . $content; else
          $content = $content . $obj->get_code_for_insertion ();

      $ai_last_check = AI_CHECK_INSERTED;
    }
  }

  if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    $style = AI_DEBUG_POSITIONS_STYLE;

    $content = "<section style='$style'>BEFORE EXCERPT ".$ad_inserter_globals [$globals_name]."</section>". $content . "<section style='$style'>AFTER EXCERPT ".$ad_inserter_globals [$globals_name]."</section>";

    // Color positions from the content hook
    $content = preg_replace ("/((BEFORE|AFTER) (CONTENT|PARAGRAPH) ?[\d]*)/", "<span style='color: blue;'> [$1] </span>", $content);
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) != 0) {
    // Remove marked tags from the content hook
    $content = preg_replace ("/&lt;(.+?)&gt;/", "", $content);

    // Color text to mark removed HTML tags
    $content = str_replace ('[HTML TAGS REMOVED]', "<span style='color: red;'>[HTML TAGS REMOVED]</span>", $content);
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0) {
    // Remove block labels from the content hook
    if (strpos ($content, '>[AI]<') === false)
      $content = preg_replace ("/\[AI\](.+?)\[\/AI\]/", "", $content);
  }

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("EXCERPT HOOK END\n");
  }

  return $content;
}

// Deprecated
// Process Before / After Post postion
function ai_before_after_post ($query, $automatic_insertion) {
  global $block_object, $ad_inserter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  // Not used on AMP pages (yet)
  if (!$ai_wp_data [AI_WP_AMP_PAGE]) {
    if (!method_exists ($query, 'is_main_query')) return;
    if (!$query->is_main_query()) return;
  }

  $globals_name = $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_POST ? AI_LOOP_BEFORE_COUNTER_NAME : AI_LOOP_AFTER_COUNTER_NAME;

  if (!isset ($ad_inserter_globals [$globals_name])) {
    $ad_inserter_globals [$globals_name] = 1;
  } else $ad_inserter_globals [$globals_name] ++;

  $ai_wp_data [AI_CONTEXT] = $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_POST ? AI_CONTEXT_BEFORE_POST : AI_CONTEXT_AFTER_POST;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

    $counter = $ad_inserter_globals [$globals_name];
    if ($counter == 1) $counter = '';

    $style = AI_DEBUG_POSITIONS_STYLE;

    if ($ai_wp_data [AI_WP_AMP_PAGE] && $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_POST) echo get_page_type_debug_info ('AMP ');
    echo "<section style='$style'>".($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_POST ? "BEFORE" : "AFTER")." POST ".$counter."</section>";
    if ($ai_wp_data [AI_WP_AMP_PAGE] && $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_POST) echo get_page_type_debug_info ('AMP ');
  }

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);
  } else $selected_blocks = array ();

  $ad_code = "";

  $ai_last_check = AI_CHECK_NONE;
  $current_block = 0;


  $extract_index = $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_POST ? LOOP_START_HOOK_BLOCKS : LOOP_END_HOOK_BLOCKS;
  if (isset ($ai_db_options_extract [$extract_index][$ai_wp_data [AI_WP_PAGE_TYPE]]))
  foreach ($ai_db_options_extract [$extract_index][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    if (!isset ($block_object [$block])) continue;

    $current_block = $block;

    $obj = $block_object [$block];
    $obj->clear_code_cache ();

    if (!$obj->check_server_side_detection ()) continue;
    if (!$obj->check_page_types_lists_users ()) continue;
    if (!$obj->check_post_page_exceptions ($selected_blocks)) continue;
    if (!$obj->check_filter ($ad_inserter_globals [$globals_name])) continue;
    if (!$obj->check_number_of_words ()) continue;

    // Last check before counter check before insertion
    $ai_last_check = AI_CHECK_CODE;
    if ($obj->ai_getCode () == '') continue;

    // Last check before insertion
    if (!$obj->check_and_increment_block_counter ()) continue;

    $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
      $ad_code .= $obj->get_code_for_insertion ();
      $ai_last_check = AI_CHECK_INSERTED;
    }
  }
  if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

  echo $ad_code;
}

// Deprecated
// Process Before Post postion
function ai_loop_start_hook ($query) {
  global $ai_wp_data, $ai_total_plugin_time;
  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ("LOOP START HOOK START");
    $start_time = microtime (true);
  }
  ai_before_after_post ($query, AI_AUTOMATIC_INSERTION_BEFORE_POST);
  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("LOOP START HOOK END\n");
  }
}


// Deprecated
// Process After Post postion
function ai_loop_end_hook ($query){
  global $ai_wp_data, $ai_total_plugin_time;
  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ("LOOP END HOOK START");
    $start_time = microtime (true);
  }
  ai_before_after_post ($query, AI_AUTOMATIC_INSERTION_AFTER_POST);
  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("LOOP END HOOK END\n");
  }
}


// Deprecated
// Process Between Posts postion
function ai_post_hook ($post) {
  global $block_object, $ad_inserter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST) return;
  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) return;

  // Not used on AMP pages (yet)
  if (!$ai_wp_data [AI_WP_AMP_PAGE]) {
    if (!in_the_loop()) return;
  }

  if (!isset ($ad_inserter_globals [AI_POST_COUNTER_NAME])) {
    $ad_inserter_globals [AI_POST_COUNTER_NAME] = 0;
  } else $ad_inserter_globals [AI_POST_COUNTER_NAME] ++;

  if ($ad_inserter_globals [AI_POST_COUNTER_NAME] == 0) return;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ('POST HOOK START [' . $ad_inserter_globals [AI_POST_COUNTER_NAME] . ']');
    $start_time = microtime (true);
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_BETWEEN_POSTS;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

    $style = AI_DEBUG_POSITIONS_STYLE;

    echo "<section style='$style'>BETWEEN POSTS ".$ad_inserter_globals [AI_POST_COUNTER_NAME]."</section>";
  }

  $ad_code = "";

  $ai_last_check = AI_CHECK_NONE;
  $current_block = 0;

  if (isset ($ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
  foreach ($ai_db_options_extract [POST_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    if (!isset ($block_object [$block])) continue;

    $current_block = $block;

    $obj = $block_object [$block];
    $obj->clear_code_cache ();

    if (!$obj->check_server_side_detection ()) continue;
    if (!$obj->check_page_types_lists_users ()) continue;
    if (!$obj->check_filter ($ad_inserter_globals [AI_POST_COUNTER_NAME])) continue;

    // Last check before counter check before insertion
    $ai_last_check = AI_CHECK_CODE;
    if ($obj->ai_getCode () == '') continue;

    // Last check before insertion
    if (!$obj->check_and_increment_block_counter ()) continue;

    $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
      $ad_code .= $obj->get_code_for_insertion ();
      $ai_last_check = AI_CHECK_INSERTED;
    }
  }
  if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

  echo $ad_code;

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("POST HOOK END\n");
  }

 return $post;
}

function ai_comments_array ($comments , $post_id ){
  global $ai_wp_data;

  $thread_comments = get_option ('thread_comments');
  $comment_counter = 0;
  foreach ($comments as $comment) {
    if (!$thread_comments || empty ($comment->comment_parent))
      $comment_counter ++;
  }
  $ai_wp_data [AI_NUMBER_OF_COMMENTS] = $comment_counter;

  return $comments;
}

function ai_wp_list_comments_args ($args) {
  global $ai_wp_data;

//  print_r ($args);
//  $args['per_page'] = 3;
//  $args['page'] = 2;

  $ai_wp_data ['AI_COMMENTS_SAVED_CALLBACK'] = $args ['callback'];
  $args ['callback'] = 'ai_comment_callback';

  $ai_wp_data ['AI_COMMENTS_SAVED_END_CALLBACK'] = $args ['end-callback'];
  $args ['end-callback'] = 'ai_comment_end_callback';

  return $args;
}

// Process comments counter + Before Comments postion
function ai_comment_callback ($comment, $args, $depth) {
  global $block_object, $ad_inserter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time, $ai_walker;

  if ($depth == 1) {
    if (!isset ($ad_inserter_globals [AI_COMMENT_COUNTER_NAME])) {
      $ad_inserter_globals [AI_COMMENT_COUNTER_NAME] = 1;
    } else $ad_inserter_globals [AI_COMMENT_COUNTER_NAME] ++;
  }

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ('COMMENT START HOOK START [' . $ad_inserter_globals [AI_COMMENT_COUNTER_NAME] . ':'. $depth . ']');
    $start_time = microtime (true);
  }

  if ($depth == 1 && $ad_inserter_globals [AI_COMMENT_COUNTER_NAME] == 1) {

    $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_BEFORE_COMMENTS;

    if ($args ['style'] == 'div') $tag = 'div'; else $tag = 'li';

    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

      $style = AI_DEBUG_POSITIONS_STYLE;

      echo "<$tag>\n";
      echo "<section style='$style'>BEFORE COMMENTS</section>";
      echo "</$tag>\n";
    }

    $ad_code = "";

    $ai_last_check = AI_CHECK_NONE;
    $current_block = 0;

    if (isset ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    foreach ($ai_db_options_extract [BEFORE_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
      if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

      if (!isset ($block_object [$block])) continue;

      $current_block = $block;

      $obj = $block_object [$block];
      $obj->clear_code_cache ();

      if (!$obj->check_server_side_detection ()) continue;
      if (!$obj->check_page_types_lists_users ()) continue;
      // No filter check

      // Last check before counter check before insertion
      $ai_last_check = AI_CHECK_CODE;
      if ($obj->ai_getCode () == '') continue;

      // Last check before insertion
      if (!$obj->check_and_increment_block_counter ()) continue;

      $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
        $ad_code .= $obj->get_code_for_insertion ();
        $ai_last_check = AI_CHECK_INSERTED;
      }
    }
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    echo "<$tag>\n";
    echo $ad_code;
    echo "</$tag>\n";
  }

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("COMMENT END HOOK END\n");
  }

  if (!empty ($ai_wp_data ['AI_COMMENTS_SAVED_CALLBACK'])) {
    echo call_user_func ($ai_wp_data ['AI_COMMENTS_SAVED_CALLBACK'], $comment, $args, $depth );
  } else {
      $ai_walker->comment_callback ($comment, $args, $depth);
    }
}

// Process Between Comments postion
function ai_comment_end_callback ($comment, $args, $depth) {
  global $block_object, $ad_inserter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time;

  if ($args ['style'] == 'div') $tag = 'div'; else $tag = 'li';

  if (!empty ($ai_wp_data ['AI_COMMENTS_SAVED_END_CALLBACK'])) {
    echo call_user_func ($ai_wp_data ['AI_COMMENTS_SAVED_END_CALLBACK'], $comment, $args, $depth);
  } else echo "</$tag><!-- #comment-## -->\n";

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ('COMMENT END HOOK START [' . $ad_inserter_globals [AI_COMMENT_COUNTER_NAME] . ':'. ($depth + 1) . ']');
    $start_time = microtime (true);
  }

  if ($depth == 0) {

    if (isset ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) &&
        $ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] != 0 &&
        !empty ($args ['per_page']) && !empty ($args ['page'])) {
      $number_of_comments_mod_per_page = $ai_wp_data [AI_NUMBER_OF_COMMENTS] % $args ['per_page'];
      if ($number_of_comments_mod_per_page != 0) {
        $last_page = (int) ($ai_wp_data [AI_NUMBER_OF_COMMENTS] / $args ['per_page']) + 1;
        $last_comment_number = $args ['page'] == $last_page ? $number_of_comments_mod_per_page : $args ['per_page'];
      } else $last_comment_number = $args ['per_page'];
    } else $last_comment_number = $ai_wp_data [AI_NUMBER_OF_COMMENTS];

    if ($ad_inserter_globals [AI_COMMENT_COUNTER_NAME] == $last_comment_number) {

      $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_AFTER_COMMENTS;

      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

        $style = AI_DEBUG_POSITIONS_STYLE;

        echo "<$tag>\n";
        echo "<section style='$style'>AFTER COMMENTS</section>";
        echo "</$tag>\n";
      }

      $ad_code = "";

      $ai_last_check = AI_CHECK_NONE;
      $current_block = 0;

      if (isset ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
      foreach ($ai_db_options_extract [AFTER_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
        if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

        if (!isset ($block_object [$block])) continue;

        $current_block = $block;

        $obj = $block_object [$block];
        $obj->clear_code_cache ();

        if (!$obj->check_server_side_detection ()) continue;
        if (!$obj->check_page_types_lists_users ()) continue;
        // No filter check

        // Last check before counter check before insertion
        $ai_last_check = AI_CHECK_CODE;
        if ($obj->ai_getCode () == '') continue;

        // Last check before insertion
        if (!$obj->check_and_increment_block_counter ()) continue;

        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $ad_code .= $obj->get_code_for_insertion ();
          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
      if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

      echo "<$tag>\n";
      echo $ad_code;
      echo "</$tag>\n";
    } else {
        $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_BETWEEN_COMMENTS;

        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

          $style = AI_DEBUG_POSITIONS_STYLE;

          echo "<$tag>\n";
          echo "<section style='$style'>BETWEEN COMMENTS ".$ad_inserter_globals [AI_COMMENT_COUNTER_NAME]."</section>";
          echo "</$tag>\n";
        }

        $ad_code = "";

        $ai_last_check = AI_CHECK_NONE;
        $current_block = 0;

        if (isset ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
        foreach ($ai_db_options_extract [BETWEEN_COMMENTS_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
          if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

          if (!isset ($block_object [$block])) continue;

          $current_block = $block;

          $obj = $block_object [$block];
          $obj->clear_code_cache ();

          if (!$obj->check_server_side_detection ()) continue;
          if (!$obj->check_page_types_lists_users ()) continue;
          if (!$obj->check_filter ($ad_inserter_globals [AI_COMMENT_COUNTER_NAME])) continue;

          // Last check before counter check before insertion
          $ai_last_check = AI_CHECK_CODE;
          if ($obj->ai_getCode () == '') continue;

          // Last check before insertion
          if (!$obj->check_and_increment_block_counter ()) continue;

          $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
          if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
            $ad_code .= $obj->get_code_for_insertion ();
            $ai_last_check = AI_CHECK_INSERTED;
          }
        }
        if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

        echo "<$tag>\n";
        echo $ad_code;
        echo "</$tag>\n";
      }
  }

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log ("COMMENT END HOOK END\n");
  }
}

function ai_custom_hook ($action, $name, $hook_parameter = null, $hook_check = null) {
  global $block_object, $ad_inserter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  if (isset ($hook_check)) {
    if (!call_user_func ($hook_check, $hook_parameter, $action)) return;
  }

  $hook_name = strtoupper ($name);

  if ($debug_processing) {
    ai_log (str_replace (array ('&LT;', '&GT;'), array ('<', '>'), $hook_name) . " HOOK START");
    $start_time = microtime (true);
  }

  $globals_name = 'AI_' . strtoupper ($action) . '_COUNTER';

  if (!isset ($ad_inserter_globals [$globals_name])) {
    $ad_inserter_globals [$globals_name] = 1;
  } else $ad_inserter_globals [$globals_name] ++;

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_NONE;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

    $counter = $ad_inserter_globals [$globals_name];
    if ($counter == 1) $counter = '';

    $style = AI_DEBUG_POSITIONS_STYLE;

    echo "<section style='$style'>".$hook_name." ".$counter."</section>";
  }

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);
  } else $selected_blocks = array ();

  $ad_code = "";

  $ai_last_check = AI_CHECK_NONE;
  $current_block = 0;

  if (isset ($ai_db_options_extract [$action . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
  foreach ($ai_db_options_extract [$action . CUSTOM_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    if (!isset ($block_object [$block])) continue;

    $current_block = $block;

    $obj = $block_object [$block];
    $obj->clear_code_cache ();

    if (!$obj->check_server_side_detection ()) continue;
    if (!$obj->check_page_types_lists_users ()) continue;
    if (!$obj->check_post_page_exceptions ($selected_blocks)) continue;
    if (!$obj->check_filter ($ad_inserter_globals [$globals_name])) continue;
    if (!$obj->check_number_of_words ()) continue;

    // Last check before counter check before insertion
    $ai_last_check = AI_CHECK_CODE;
    if ($obj->ai_getCode () == '') continue;

    // Last check before insertion
    if (!$obj->check_and_increment_block_counter ()) continue;

    $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
      $ad_code .= $obj->get_code_for_insertion ();
      $ai_last_check = AI_CHECK_INSERTED;
    }
  }
  if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

  echo $ad_code;

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    ai_log (str_replace (array ('&LT;', '&GT;'), array ('<', '>'), $hook_name) . " HOOK END\n");
  }
}

function process_shortcode (&$block, $atts) {
  global $block_object, $ai_last_check, $ai_wp_data;

  if ($atts == '') return '';

  $parameters = shortcode_atts (array (
    "block" => "",
    "name" => "",
    "ignore" => "",
    "check" => "",
    "debugger" => "",
    "adb" => "",
    "css" => "",
    "text" => "",
    "selectors" => "",
    "amp" => "",
    "rotate" => "",
    "count" => "",
    "http" => "",
    "custom-field" => "",
    "data" => "",
  ), $atts);

  $output = "";
  if (function_exists ('ai_shortcode')) {
    $output = ai_shortcode ($parameters);
    if ($output != '') return $output;
  }

  if (($adb = trim ($parameters ['adb'])) != '') {
//    message html
//    message css
//    overlay css
//    undismissible

//    redirection page
//    redirection url

    switch (strtolower ($adb)) {
      case 'message':
        $ai_wp_data [AI_ADB_SHORTCODE_ACTION] = AI_ADB_ACTION_MESSAGE;
        break;
      case 'redirection':
        $ai_wp_data [AI_ADB_SHORTCODE_ACTION] = AI_ADB_ACTION_REDIRECTION;
        break;
    }
    return  "";
  }

  $block = - 1;
  if (is_numeric ($parameters ['block'])) {
    $block = intval ($parameters ['block']);
  } elseif ($parameters ['name'] != '') {
      $shortcode_name = strtolower ($parameters ['name']);
      if ($shortcode_name == 'debugger') $block = 0; else {
        for ($counter = 1; $counter <= AD_INSERTER_BLOCKS; $counter ++) {
          $obj = $block_object [$counter];
          $ad_name = strtolower (trim ($obj->get_ad_name()));
          if ($shortcode_name == $ad_name) {
            $block = $counter;
            break;
          }
        }
      }
    }

  if ($block == - 1) {
    if ($parameters ['rotate'] != '' || in_array ('ROTATE', $atts) || in_array ('rotate', $atts)) {
      return AD_ROTATE_SEPARATOR;
    }
    if ($parameters ['count'] != '' || in_array ('COUNT', $atts) || in_array ('count', $atts)) {
      return AD_COUNT_SEPARATOR;
    }
    if ($parameters ['amp'] != '' || in_array ('AMP', $atts) || in_array ('amp', $atts)) {
      return AD_AMP_SEPARATOR;
    }
    if ($parameters ['http'] != '' || in_array ('HTTP', $atts) || in_array ('http', $atts)) {
      return AD_HTTP_SEPARATOR;
    }
    if ($parameters ['custom-field'] != '') {
      $post_meta = get_post_meta (get_the_ID(), $parameters ['custom-field']);
      if (is_array ($post_meta)) {
        $post_meta = implode (', ', $post_meta);
      }
      return $post_meta;
    }
    if ($parameters ['data'] != '') {
      return '{'.$parameters ['data'].'}';
    }

  }

  if ($block == 0) {
    if (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0) {
      ob_start ();
      echo "<pre style='", AI_DEBUG_WIDGET_STYLE, "'>\n";
      ai_write_debug_info ();
      echo "</pre>";
      return ob_get_clean ();
    }
    return "";
  }

  $ai_last_check = AI_CHECK_SHORTCODE_ATTRIBUTES;
  if ($block < 1 || $block > AD_INSERTER_BLOCKS) return "";

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("SHORTCODE $block (".($parameters ['block'] != '' ? 'block="'.$parameters ['block'].'"' : '').($parameters ['name'] != '' ? 'name="'.$parameters ['name'].'"' : '').")");

//  IGNORE SETTINGS
//  page-type
//  *block-counter

//  CHECK SETTINGS
//  exceptions

  $ignore_array = array ();
  if (trim ($parameters ['ignore']) != '') {
    $ignore_array = explode (",", str_replace (" ", "", $parameters ['ignore']));
  }

  $check_array = array ();
  if (trim ($parameters ['check']) != '') {
    $check_array = explode (",", str_replace (" ", "", $parameters ['check']));
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_SHORTCODE;

  $obj = $block_object [$block];
  $obj->clear_code_cache ();

  $ai_last_check = AI_CHECK_ENABLED;
  if (!$obj->get_enable_manual ()) return "";

  if (!$obj->check_server_side_detection ()) return "";
  if (!$obj->check_page_types_lists_users (in_array ("page-type", $ignore_array))) return "";

  if (in_array ("exceptions", $check_array)) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
      $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
      $selected_blocks = explode (",", $meta_value);
      if (!$obj->check_post_page_exceptions ($selected_blocks)) return "";
    }
  }

  // Last check before counter check before insertion
  $ai_last_check = AI_CHECK_CODE;
  if ($obj->ai_getCode () == '') return "";

  // Last check before insertion
  if (!$obj->check_and_increment_block_counter ()) return "";

  $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
    $ai_last_check = AI_CHECK_INSERTED;
    return $obj->get_code_for_insertion ();
  }
}

function process_shortcodes ($atts, $ai_shortcode_name) {
  global $ai_last_check, $ai_wp_data, $ai_total_plugin_time;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    $atts_string = '';
    if (is_array ($atts))
      foreach ($atts as $index => $att) {
        if (is_numeric ($index))
          $atts_string .= $att.' '; else
            $atts_string .= $index.("='".$att."'").' ';
      }
    ai_log ("PROCESS SHORTCODES [$ai_shortcode_name ".trim ($atts_string).']');
    $start_time = microtime (true);
  }
  $ai_last_check = AI_CHECK_NONE;
  $block = - 1;
  $shortcode = process_shortcode ($block, $atts);

  if ($debug_processing) {
    $ai_total_plugin_time += microtime (true) - $start_time;
    if ($block == - 1) {
      if (strlen ($shortcode) < 100) ai_log ('SHORTCODE TEXT: "' . ai_log_filter_content ($shortcode) . '"'); else
        ai_log ('SHORTCODE TEXT: "' . ai_log_filter_content (html_entity_decode (substr ($shortcode, 0, 60))) . ' ... ' . ai_log_filter_content (html_entity_decode (substr ($shortcode, - 60))) . '"');
    }
    elseif ($ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($block, $ai_last_check));
    ai_log ("SHORTCODE END\n");
  }

  return $shortcode;
}

function process_shortcodes_lc ($atts) {
  return process_shortcodes ($atts, 'adinserter');
}

function process_shortcodes_uc ($atts) {
  return process_shortcodes ($atts, 'ADINSERTER');
}


class ai_widget extends WP_Widget {

  function __construct () {
    parent::__construct (
      false,                                  // Base ID
      AD_INSERTER_NAME,                       // Name
      array (                                 // Args
        'classname'   => 'ai_widget',
        'description' => AD_INSERTER_NAME.' code block widget.')
    );
  }

  function form ($instance) {
    global $block_object;

    // Output admin widget options form

    $widget_title = !empty ($instance ['widget-title']) ? $instance ['widget-title'] : '';
    $block  = isset ($instance ['block'])   ? $instance ['block']   : 1;
    if ($block > AD_INSERTER_BLOCKS) $block = 1;
    $sticky = isset ($instance ['sticky'])  ? $instance ['sticky']  : 0;

    if ($block == 0) $title = 'Debugger';
    elseif ($block == - 1) $title = 'Dummy Widget';
    elseif ($block >= 1) {
      $obj = $block_object [$block];

      $title = '[' . $block . '] ' . $obj->get_ad_name();
      if (!empty ($widget_title)) $title .= ' - ' . $widget_title;
      if (!$obj->get_enable_widget ()) $title .= ' - DISABLED';
    } else $title = "Unknown block";

    $url_parameters = "";
    if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($block);

    ?>
    <input id="<?php echo $this->get_field_id ('title'); ?>" name="<?php echo $this->get_field_name ('title'); ?>" type="hidden" value="<?php echo esc_attr ($title); ?>">

    <p>
      <label for="<?php echo $this->get_field_id ('widget-title'); ?>">Title: &nbsp;</label>
      <input id="<?php echo $this->get_field_id ('widget-title'); ?>" name="<?php echo $this->get_field_name ('widget-title'); ?>" type="text" value="<?php echo esc_attr ($widget_title); ?>" style="width: 88%;">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id ('block'); ?>"><a href='<?php echo admin_url ('options-general.php?page=ad-inserter.php'), $url_parameters, "&tab=", $block; ?>' title='Click for block settings' style='text-decoration: none;'>Block</a>:</label>
      <select id="<?php echo $this->get_field_id ('block'); ?>" name="<?php echo $this->get_field_name('block'); ?>" style="width: 88%;">
        <?php
          for ($block_index = 1; $block_index <= AD_INSERTER_BLOCKS; $block_index ++) {
            $obj = $block_object [$block_index];
        ?>
        <option value='<?php echo $block_index; ?>' <?php if ($block_index == $block) echo 'selected="selected"'; ?>><?php echo $block_index, ' - ', $obj->get_ad_name(), !$obj->get_enable_widget ()? ' - DISABLED' : ''; ?></option>
        <?php } ?>
        <option value='0' <?php if ($block == 0) echo 'selected="selected"'; ?>>Debugger</option>
        <option value='-1' <?php if ($block == - 1) echo 'selected="selected"'; ?>>Dummy Widget</option>
      </select>
    </p>

    <p>
      <input type="hidden"   name='<?php echo $this->get_field_name ('sticky'); ?>' value="0" />
      <input type='checkbox' id='<?php echo $this->get_field_id ('sticky'); ?>' name='<?php echo $this->get_field_name ('sticky'); ?>' value='1' <?php if ($sticky) echo 'checked '; ?>>
      <label for='<?php echo $this->get_field_id ('sticky'); ?>'>Sticky</label>
    </p>
    <?php
  }

  function update ($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;

    $instance ['widget-title'] = (!empty ($new_instance ['widget-title'])) ? strip_tags ($new_instance ['widget-title']) : '';
    $instance ['title']   = (!empty ($new_instance ['title'])) ? strip_tags ($new_instance ['title']) : '';
    $instance ['block']   = (isset ($new_instance ['block'])) ? $new_instance ['block'] : 1;
    $instance ['sticky']  = (isset ($new_instance ['sticky'])) ? $new_instance ['sticky'] : 0;

    return $instance;
  }

  function widget ($args, $instance) {
    global $ai_last_check, $ai_wp_data, $ai_total_plugin_time;

    $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
    if ($debug_processing) $start_time = microtime (true);

    $ai_last_check = AI_CHECK_NONE;

    $block = 0;
    ai_widget_draw ($args, $instance, $block);

    if ($debug_processing) {
      $ai_total_plugin_time += microtime (true) - $start_time;
      if ($ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($block, $ai_last_check));
      ai_log ("WIDGET END\n");
    }
  }
}

function ai_add_attr_data (&$tag, $attr, $new_data) {

  if (trim ($tag) != '' && strpos ($tag,  '<!--') === false) {
    if (stripos ($tag, $attr."=") !== false) {
      preg_match ("/$attr=[\'\"](.+?)[\'\"]/", $tag, $classes);
      $tag = str_replace ($classes [1], $classes [1]. ' ' . $new_data, $tag);
      return true;
    }
    elseif (strpos ($tag, ">") !== false) {
      $tag = str_replace ('>', ' ' . $attr . '="' . $new_data . '">', $tag);
      return true;
    }
  }

  return false;
}

function ai_widget_draw ($args, $instance, &$block) {
  global $block_object, $ad_inserter_globals, $ai_wp_data, $ai_last_check;

  $block  = isset ($instance ['block'])  ? $instance ['block']  : 1;
  $sticky = isset ($instance ['sticky']) ? $instance ['sticky'] : 0;

  if ($block == 0) {
    if (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0)
      ai_widget_draw_debugger ($args, $instance, $block);
    return;
  }

  if ($sticky) {
    $ai_wp_data [AI_STICKY_WIDGETS] = true;
    if ($block == - 1) {
      $before_widget = $args ['before_widget'];
      ai_add_attr_data ($before_widget, 'style', 'padding: 0; border: 0; margin: 0; color: transparent; background: transparent;');
      ai_add_attr_data ($before_widget, 'class', 'ai-sticky');
      echo $before_widget;
      echo $args ['after_widget'];
      return;
    }
  }

  if ($block < 1 || $block > AD_INSERTER_BLOCKS) return;

  $title = !empty ($instance ['widget-title']) ? $instance ['widget-title'] : '';

  $obj = $block_object [$block];
  $obj->clear_code_cache ();

  $globals_name = AI_WIDGET_COUNTER_NAME . $block;

  if (!isset ($ad_inserter_globals [$globals_name])) {
    $ad_inserter_globals [$globals_name] = 1;
  } else $ad_inserter_globals [$globals_name] ++;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0)
    ai_log ("WIDGET (". $obj->number . ') ['.$ad_inserter_globals [$globals_name] . ']');

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_WIDGET;

  $ai_last_check = AI_CHECK_ENABLED;
  if (!$obj->get_enable_widget ()) return;
  if (!$obj->check_server_side_detection ()) return;
  if (!$obj->check_page_types_lists_users ()) return;
  if (!$obj->check_filter ($ad_inserter_globals [$globals_name])) return;
  if (!$obj->check_number_of_words ()) return;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);
    if (!$obj->check_post_page_exceptions ($selected_blocks)) return;
  }

  // Last check before counter check before insertion
  $ai_last_check = AI_CHECK_CODE;
  if ($obj->ai_getCode () == '') {
    if ($sticky) {
      $before_widget = $args ['before_widget'];
      ai_add_attr_data ($before_widget, 'style', 'padding: 0; border: 0; margin: 0; color: transparent; background: transparent;');
      ai_add_attr_data ($before_widget, 'class', 'ai-sticky');
      echo $before_widget;
      echo $args ['after_widget'];
    }
    return;
  }

  // Last check before insertion
  if (!$obj->check_and_increment_block_counter ()) return;

  $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {

    $viewport_classes = trim ($obj->get_viewport_classes ());
    $sticky_class = $sticky ? ' ai-sticky' : '';
    $widget_classes = trim ($viewport_classes . $sticky_class);

    if ($widget_classes != "") {
      $before_widget = $args ['before_widget'];
      ai_add_attr_data ($before_widget, 'class', $widget_classes);
      echo $before_widget;
    } else echo $args ['before_widget'];

    if (!empty ($title)) {
      echo $args ['before_title'], apply_filters ('widget_title', $title), $args ['after_title'];
    }

    echo $obj->get_code_for_insertion (false);

    echo $args ['after_widget'];

    $ai_last_check = AI_CHECK_INSERTED;

    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && $obj->get_detection_client_side())
      echo $obj->get_code_for_insertion (false, true);
  }
}

function ai_widget_draw_debugger ($args, $instance, &$block) {
  global $ai_wp_data, $ai_db_options, $block_object;

  $sticky = isset ($instance ['sticky']) ? $instance ['sticky'] : 0;

  if ($sticky) {
    $ai_wp_data [AI_STICKY_WIDGETS] = true;
    echo ai_add_attr_data ($args ['before_widget'], 'class', 'ai-sticky');
  } else echo $args ['before_widget'];

  $title = !empty ($instance ['widget-title']) ? $instance ['widget-title'] : '';

  if (!empty ($title)) {
    echo $args ['before_title'], apply_filters ('widget_title', $title), $args ['after_title'];
  }

  echo "<pre style='", AI_DEBUG_WIDGET_STYLE, "'>\n";
  ai_write_debug_info ();
  echo "</pre>";

  if ($ai_wp_data [AI_CLIENT_SIDE_DETECTION]) {
    for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
      $viewport_name = get_viewport_name ($viewport);
      if ($viewport_name != '') {
        echo "<pre class='ai-viewport-" . $viewport ."' style='", AI_DEBUG_WIDGET_STYLE, "'>\n";
        echo "CLIENT-SIDE DEVICE:      ", $viewport_name;
        echo "</pre>";
      }
    }
  }

  echo $args ['after_widget'];
}

