<?php

require_once AD_INSERTER_PLUGIN_DIR.'constants.php';

abstract class ai_BaseCodeBlock {
  var $wp_options;
  var $fallback;
  var $client_side_ip_address_detection;
  var $w3tc_code;
  var $needs_class;
  var $code_version;
  var $debug_code;

  function __construct () {

    $this->number = 0;

    $this->wp_options = array ();
    $this->fallback = 0;
    $this->client_side_ip_address_detection = false;
    $this->w3tc_code = '';
    $this->needs_class = false;
    $this->code_version = 0;
    $this->color = '#e00';

    $this->wp_options [AI_OPTION_CODE]                = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_PROCESS_PHP]         = AI_DISABLED;
    $this->wp_options [AI_OPTION_ENABLE_MANUAL]       = AI_DISABLED;
    $this->wp_options [AI_OPTION_ENABLE_AMP]          = AI_DISABLED;
    $this->wp_options [AI_OPTION_ENABLE_404]          = AI_DISABLED;
    $this->wp_options [AI_OPTION_DETECT_SERVER_SIDE]  = AI_DISABLED;
    $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES] = AD_DISPLAY_DESKTOP_DEVICES;
  }

  public function load_options ($block) {
    global $ai_db_options;

    if (isset ($ai_db_options [$block])) $options = $ai_db_options [$block]; else $options = '';

    // Convert old options
    if (!$options) {
      if     ($block == "h") $options = ai_get_option (str_replace ("#", "Header", AD_ADx_OPTIONS));
      elseif ($block == "f") $options = ai_get_option (str_replace ("#", "Footer", AD_ADx_OPTIONS));
      else                   $options = ai_get_option (str_replace ("#", $block, AD_ADx_OPTIONS));

      if (is_array ($options)) {

        $old_name = "ad" . $block . "_data";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CODE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enable_manual";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_MANUAL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_process_php";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PROCESS_PHP] = $options [$old_name];
          unset ($options [$old_name]);
        }

        $old_name = "adH_data";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CODE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adH_enable";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_MANUAL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adH_process_php";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PROCESS_PHP] = $options [$old_name];
          unset ($options [$old_name]);
        }

        $old_name = "adF_data";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CODE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adF_enable";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_MANUAL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adF_process_php";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PROCESS_PHP] = $options [$old_name];
          unset ($options [$old_name]);
        }

        $old_name = "ad" . $block . "_name";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_BLOCK_NAME] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_displayType";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_AUTOMATIC_INSERTION] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_paragraphNumber";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PARAGRAPH_NUMBER] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_minimum_paragraphs";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_MIN_PARAGRAPHS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_minimum_words";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_MIN_WORDS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_excerptNumber";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_EXCERPT_NUMBER] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_directionType";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DIRECTION_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_floatType";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ALIGNMENT_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_general_tag";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_GENERAL_TAG] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_after_day";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_AFTER_DAYS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_user";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DOMAIN_LIST] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_domain_list_type";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DOMAIN_LIST_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_cat";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CATEGORY_LIST] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_cat_type";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CATEGORY_LIST_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_tag";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_TAG_LIST] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_tag_type";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_TAG_LIST_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_home";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_HOMEPAGE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_page";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_post";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_POSTS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_category";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_search";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_archive";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enabled_on_which_pages";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLED_ON_WHICH_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enabled_on_which_posts";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLED_ON_WHICH_POSTS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enable_php_call";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_PHP_CALL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_paragraph_text";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PARAGRAPH_TEXT] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_custom_css";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CUSTOM_CSS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_display_for_users";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_FOR_USERS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_display_for_devices";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_FOR_DEVICES] = $options [$old_name];
          unset ($options [$old_name]);
        }
      }
    }

    if ($options != '') $this->wp_options = array_merge ($this->wp_options, $options);
    unset ($this->wp_options ['']);
  }

  public function get_ad_name(){
     $name = isset ($this->wp_options [AI_OPTION_BLOCK_NAME]) ? $this->wp_options [AI_OPTION_BLOCK_NAME] : "";
     return $name;
  }

  public function get_ad_data(){
    $ad_data = isset ($this->wp_options [AI_OPTION_CODE]) ? $this->wp_options [AI_OPTION_CODE] : '';
    return $ad_data;
  }

  public function get_enable_manual (){
    $enable_manual = isset ($this->wp_options [AI_OPTION_ENABLE_MANUAL]) ? $this->wp_options [AI_OPTION_ENABLE_MANUAL] : AI_DISABLED;
    if ($enable_manual == '') $enable_manual = AI_DISABLED;
    return $enable_manual;
  }

  public function get_enable_amp ($return_saved_value = false){
    $enable_amp = isset ($this->wp_options [AI_OPTION_ENABLE_AMP]) ? $this->wp_options [AI_OPTION_ENABLE_AMP] : AI_DISABLED;

    if ($return_saved_value) return $enable_amp;

    // Fix for AMP code blocks with url white-list */amp
    $urls = $this->get_ad_url_list();
    $url_type = $this->get_ad_url_list_type();
    if ($url_type == AD_WHITE_LIST && strpos ($urls, '/amp') !== false) {
      $enable_amp = true;
    }
    // Fix for code blocks using PHP function is_amp_endpoint
    elseif ($this->get_process_php() && strpos ($this->get_ad_data (), 'is_amp_endpoint') !== false) {
      $enable_amp = true;
    }

    return $enable_amp;
  }

  public function get_process_php (){
    $process_php = isset ($this->wp_options [AI_OPTION_PROCESS_PHP]) ? $this->wp_options [AI_OPTION_PROCESS_PHP] : AI_DISABLED;
    if ($process_php == '') $process_php = AI_DISABLED;
    return $process_php;
  }

  public function get_enable_404 (){
    $enable_404 = isset ($this->wp_options [AI_OPTION_ENABLE_404]) ? $this->wp_options [AI_OPTION_ENABLE_404] : AI_DISABLED;
    if ($enable_404 == '') $enable_404 = AI_DISABLED;
    return $enable_404;
  }

  public function get_detection_server_side(){
    // Check old settings for all devices
    if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
     $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
    } else $display_for_devices = '';
    if ($display_for_devices == AD_DISPLAY_ALL_DEVICES) $option = AI_DISABLED; else

      $option = isset ($this->wp_options [AI_OPTION_DETECT_SERVER_SIDE]) ? $this->wp_options [AI_OPTION_DETECT_SERVER_SIDE] : AI_DISABLED;
    return $option;
  }

  function check_server_side_detection () {
    global $ai_last_check;

    if ($this->get_detection_server_side ()) {
      $display_for_devices = $this->get_display_for_devices ();

      $ai_last_check = AI_CHECK_DESKTOP_DEVICES;
      if ($display_for_devices == AD_DISPLAY_DESKTOP_DEVICES && !AI_DESKTOP) return false;
      $ai_last_check = AI_CHECK_MOBILE_DEVICES;
      if ($display_for_devices == AD_DISPLAY_MOBILE_DEVICES && !AI_MOBILE) return false;
      $ai_last_check = AI_CHECK_TABLET_DEVICES;
      if ($display_for_devices == AD_DISPLAY_TABLET_DEVICES && !AI_TABLET) return false;
      $ai_last_check = AI_CHECK_PHONE_DEVICES;
      if ($display_for_devices == AD_DISPLAY_PHONE_DEVICES && !AI_PHONE) return false;
      $ai_last_check = AI_CHECK_DESKTOP_TABLET_DEVICES;
      if ($display_for_devices == AD_DISPLAY_DESKTOP_TABLET_DEVICES && !(AI_DESKTOP || AI_TABLET)) return false;
      $ai_last_check = AI_CHECK_DESKTOP_PHONE_DEVICES;
      if ($display_for_devices == AD_DISPLAY_DESKTOP_PHONE_DEVICES && !(AI_DESKTOP || AI_PHONE)) return false;
    }
    return true;
  }

  public function get_display_for_devices (){
    if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
     $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
    } else $display_for_devices = '';
    //                                convert old option
    if ($display_for_devices == '' || $display_for_devices == AD_DISPLAY_ALL_DEVICES) $display_for_devices = AD_DISPLAY_DESKTOP_DEVICES;
    return $display_for_devices;
  }

  public function clear_code_cache (){
    unset ($this->wp_options ['GENERATED_CODE']);
  }

  public function ai_getCode (){
    global $block_object, $ai_total_php_time, $ai_wp_data;

    if ($this->fallback != 0) return $block_object [$this->fallback]->ai_getCode ();

    $obj = $this;
    $code = $obj->get_ad_data();

    if ($obj->get_process_php () && (!is_multisite() || is_main_site () || multisite_php_processing ())) {

      $global_name = 'GENERATED_CODE';
      if (isset ($obj->wp_options [$global_name])) return $obj->wp_options [$global_name];

      $start_time = microtime (true);

      $php_error = "";
      ob_start ();

      try {
        eval ("?>". $code . "<?php ");
      } catch (Exception $e) {
          $php_error = "PHP error in " . AD_INSERTER_NAME . " code block ". ($obj->number == 0 ? '' : $obj->number . " - ") . $obj->get_ad_name() . "<br />\n" .  $e->getMessage();
      }

      $processed_code = ob_get_clean ();

      if (strpos ($processed_code, __FILE__) || $php_error != "") {

        if (preg_match ("%(.+) in ".__FILE__."%", strip_tags($processed_code), $error_message))
          $code = "PHP error in " . AD_INSERTER_NAME . " code block ". ($obj->number == 0 ? '' : $obj->number . " - ") . $obj->get_ad_name() . "<br />\n" . $error_message [1];
        elseif (preg_match ("%(.+) in ".__FILE__."%", $php_error, $error_message))
          $code = "PHP error in " . AD_INSERTER_NAME . " code block ". ($obj->number == 0 ? '' : $obj->number . " - ") . $obj->get_ad_name() . "<br />\n" . $error_message [1];

        else $code = $processed_code;
      } else $code = $processed_code;

      // Cache generated code
      $obj->wp_options [$global_name] = $code;

      $ai_total_php_time += microtime (true) - $start_time;
    }

    return $code;
  }
}

abstract class ai_CodeBlock extends ai_BaseCodeBlock {

  var $number;

  function __construct () {

    parent::__construct();

    $this->wp_options [AI_OPTION_BLOCK_NAME]                 = AD_NAME;
    $this->wp_options [AI_OPTION_TRACKING]                   = AI_DISABLED;
    $this->wp_options [AI_OPTION_AUTOMATIC_INSERTION]        = AI_AUTOMATIC_INSERTION_DISABLED;
    $this->wp_options [AI_OPTION_PARAGRAPH_NUMBER]           = AD_ONE;
    $this->wp_options [AI_OPTION_MIN_PARAGRAPHS]             = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MIN_WORDS_ABOVE]            = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MIN_WORDS]                  = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MAX_WORDS]                  = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MIN_PARAGRAPH_WORDS]        = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MAX_PARAGRAPH_WORDS]        = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_COUNT_INSIDE_BLOCKQUOTE]    = AI_DISABLED;
    $this->wp_options [AI_OPTION_PARAGRAPH_TAGS]             = DEFAULT_PARAGRAPH_TAGS;
    $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_ABOVE]     = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_BELOW]     = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_TEXT_ABOVE]           = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_TEXT_BELOW]           = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_ACTION]               = AD_TRY_TO_SHIFT_POSITION;
    $this->wp_options [AI_OPTION_AVOID_TRY_LIMIT]            = AD_ONE;
    $this->wp_options [AI_OPTION_AVOID_DIRECTION]            = AD_BELOW_AND_THEN_ABOVE;
    $this->wp_options [AI_OPTION_EXCERPT_NUMBER]             = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_FILTER_TYPE]                = AI_FILTER_AUTO;
    $this->wp_options [AI_OPTION_INVERTED_FILTER]            = AI_DISABLED;
    $this->wp_options [AI_OPTION_DIRECTION_TYPE]             = AD_DIRECTION_FROM_TOP;
    $this->wp_options [AI_OPTION_ALIGNMENT_TYPE]             = AI_ALIGNMENT_DEFAULT;
    $this->wp_options [AI_OPTION_GENERAL_TAG]                = AD_GENERAL_TAG;
    $this->wp_options [AI_OPTION_SCHEDULING]                 = AI_SCHEDULING_OFF;
    $this->wp_options [AI_OPTION_AFTER_DAYS]                 = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_START_DATE]                 = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_END_DATE]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_FALLBACK]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_ADB_BLOCK_ACTION]           = DEFAULT_ADB_BLOCK_ACTION;
    $this->wp_options [AI_OPTION_ADB_BLOCK_REPLACEMENT]      = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MAXIMUM_INSERTIONS]         = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_ID_LIST]                    = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_ID_LIST_TYPE]               = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_URL_LIST]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_URL_LIST_TYPE]              = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_URL_PARAMETER_LIST]         = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_URL_PARAMETER_LIST_TYPE]    = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_DOMAIN_LIST]                = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_DOMAIN_LIST_TYPE]           = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_IP_ADDRESS_LIST]            = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_IP_ADDRESS_LIST_TYPE]       = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_COUNTRY_LIST]               = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_COUNTRY_LIST_TYPE]          = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_CATEGORY_LIST]              = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE]         = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_TAG_LIST]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_TAG_LIST_TYPE]              = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_TAXONOMY_LIST]              = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_TAXONOMY_LIST_TYPE]         = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_DISPLAY_ON_POSTS]           = AI_ENABLED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_PAGES]           = AI_DISABLED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_HOMEPAGE]        = AI_DISABLED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES]  = AI_DISABLED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES]    = AI_DISABLED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES]   = AI_DISABLED;
    $this->wp_options [AI_OPTION_ENABLE_AJAX]                = AI_ENABLED;
    $this->wp_options [AI_OPTION_ENABLE_FEED]                = AI_DISABLED;
    $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_PAGES]     = AI_NO_INDIVIDUAL_EXCEPTIONS;
    $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_POSTS]     = AI_NO_INDIVIDUAL_EXCEPTIONS;
    $this->wp_options [AI_OPTION_ENABLE_PHP_CALL]            = AI_DISABLED;
    $this->wp_options [AI_OPTION_ENABLE_WIDGET]              = AI_ENABLED;
    $this->wp_options [AI_OPTION_PARAGRAPH_TEXT]             = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_PARAGRAPH_TEXT_TYPE]        = AD_DO_NOT_CONTAIN;
    $this->wp_options [AI_OPTION_CUSTOM_CSS]                 = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_DISPLAY_FOR_USERS]          = AD_DISPLAY_ALL_USERS;
    $this->wp_options [AI_OPTION_DETECT_CLIENT_SIDE]         = AI_DISABLED;
    for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
      $this->wp_options [AI_OPTION_DETECT_VIEWPORT . '_' . $viewport] = AI_DISABLED;
    }
  }

  public function get_automatic_insertion (){
    global $ai_db_options;

    $option = isset ($this->wp_options [AI_OPTION_AUTOMATIC_INSERTION]) ? $this->wp_options [AI_OPTION_AUTOMATIC_INSERTION] : AI_AUTOMATIC_INSERTION_DISABLED;

    if     ($option == '')                          $option = AI_AUTOMATIC_INSERTION_DISABLED;
    elseif ($option == AD_SELECT_MANUAL)            $option = AI_AUTOMATIC_INSERTION_DISABLED;
    elseif ($option == AD_SELECT_BEFORE_TITLE)      $option = AI_AUTOMATIC_INSERTION_BEFORE_POST;
    elseif ($option == AD_SELECT_WIDGET)            $option = AI_AUTOMATIC_INSERTION_DISABLED;

    if     ($option == AD_SELECT_NONE)              $option = AI_AUTOMATIC_INSERTION_DISABLED;
    elseif ($option == AD_SELECT_BEFORE_POST)       $option = AI_AUTOMATIC_INSERTION_BEFORE_POST;
    elseif ($option == AD_SELECT_AFTER_POST)        $option = AI_AUTOMATIC_INSERTION_AFTER_POST;
    elseif ($option == AD_SELECT_BEFORE_PARAGRAPH)  $option = AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH;
    elseif ($option == AD_SELECT_AFTER_PARAGRAPH)   $option = AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH;
    elseif ($option == AD_SELECT_BEFORE_CONTENT)    $option = AI_AUTOMATIC_INSERTION_BEFORE_CONTENT;
    elseif ($option == AD_SELECT_AFTER_CONTENT)     $option = AI_AUTOMATIC_INSERTION_AFTER_CONTENT;
    elseif ($option == AD_SELECT_BEFORE_EXCERPT)    $option = AI_AUTOMATIC_INSERTION_BEFORE_EXCERPT;
    elseif ($option == AD_SELECT_AFTER_EXCERPT)     $option = AI_AUTOMATIC_INSERTION_AFTER_EXCERPT;
    elseif ($option == AD_SELECT_BETWEEN_POSTS)     $option = AI_AUTOMATIC_INSERTION_BETWEEN_POSTS;

    return $option;
  }

  public function get_automatic_insertion_text (){
    $automatic_insertion = $this->get_automatic_insertion();
    switch ($automatic_insertion) {
      case AI_AUTOMATIC_INSERTION_DISABLED:
        return AI_TEXT_DISABLED;
        break;
      case AI_AUTOMATIC_INSERTION_BEFORE_POST:
        return AI_TEXT_BEFORE_POST;
        break;
      case AI_AUTOMATIC_INSERTION_AFTER_POST:
        return AI_TEXT_AFTER_POST;
        break;
      case AI_AUTOMATIC_INSERTION_BEFORE_CONTENT:
        return AI_TEXT_BEFORE_CONTENT;
        break;
      case AI_AUTOMATIC_INSERTION_AFTER_CONTENT:
        return AI_TEXT_AFTER_CONTENT;
        break;
      case AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH:
        return AI_TEXT_BEFORE_PARAGRAPH;
        break;
      case AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH:
        return AI_TEXT_AFTER_PARAGRAPH;
        break;
      case AI_AUTOMATIC_INSERTION_BEFORE_EXCERPT:
        return AI_TEXT_BEFORE_EXCERPT;
        break;
      case AI_AUTOMATIC_INSERTION_AFTER_EXCERPT:
        return AI_TEXT_AFTER_EXCERPT;
        break;
      case AI_AUTOMATIC_INSERTION_BETWEEN_POSTS:
        return AI_TEXT_BETWEEN_POSTS;
        break;
      case AI_AUTOMATIC_INSERTION_BEFORE_COMMENTS:
        return AI_TEXT_BEFORE_COMMENTS;
        break;
      case AI_AUTOMATIC_INSERTION_BETWEEN_COMMENTS:
        return AI_TEXT_BETWEEN_COMMENTS;
        break;
      case AI_AUTOMATIC_INSERTION_AFTER_COMMENTS:
        return AI_TEXT_AFTER_COMMENTS;
        break;
      case AI_AUTOMATIC_INSERTION_FOOTER:
        return AI_TEXT_FOOTER;
        break;
      default:
        if ($automatic_insertion >= AI_AUTOMATIC_INSERTION_CUSTOM_HOOK && $automatic_insertion < AI_AUTOMATIC_INSERTION_CUSTOM_HOOK + AD_INSERTER_HOOKS) {
          $hook_index = $automatic_insertion - AI_AUTOMATIC_INSERTION_CUSTOM_HOOK;
          return get_hook_name ($hook_index + 1);
        }

        return '';
        break;
    }
  }

  public function get_alignment_type (){
    $option = isset ($this->wp_options [AI_OPTION_ALIGNMENT_TYPE]) ? $this->wp_options [AI_OPTION_ALIGNMENT_TYPE] : AI_ALIGNMENT_DEFAULT;

    if ($option == '') $option = AI_ALIGNMENT_DEFAULT;

    if     ($option == AD_ALIGNMENT_NONE)              $option = AI_ALIGNMENT_DEFAULT;
    elseif ($option == AD_ALIGNMENT_LEFT)              $option = AI_ALIGNMENT_LEFT;
    elseif ($option == AD_ALIGNMENT_RIGHT)             $option = AI_ALIGNMENT_RIGHT;
    elseif ($option == AD_ALIGNMENT_CENTER)            $option = AI_ALIGNMENT_CENTER;
    elseif ($option == AD_ALIGNMENT_FLOAT_LEFT)        $option = AI_ALIGNMENT_FLOAT_LEFT;
    elseif ($option == AD_ALIGNMENT_FLOAT_RIGHT)       $option = AI_ALIGNMENT_FLOAT_RIGHT;
    elseif ($option == AD_ALIGNMENT_NO_WRAPPING)       $option = AI_ALIGNMENT_NO_WRAPPING;
    elseif ($option == AD_ALIGNMENT_CUSTOM_CSS)        $option = AI_ALIGNMENT_CUSTOM_CSS;

    return $option;
  }

  public function get_alignment_type_text (){
    switch ($this->get_alignment_type ()) {
      case AI_ALIGNMENT_DEFAULT:
        return AI_TEXT_DEFAULT;
        break;
      case AI_ALIGNMENT_LEFT:
        return AI_TEXT_LEFT;
        break;
      case AI_ALIGNMENT_RIGHT:
        return AI_TEXT_RIGHT;
        break;
      case AI_ALIGNMENT_CENTER:
        return AI_TEXT_CENTER;
        break;
      case AI_ALIGNMENT_FLOAT_LEFT:
        return AI_TEXT_FLOAT_LEFT;
        break;
      case AI_ALIGNMENT_FLOAT_RIGHT:
        return AI_TEXT_FLOAT_RIGHT;
        break;
      case AI_ALIGNMENT_STICKY_LEFT:
        return AI_TEXT_STICKY_LEFT;
        break;
      case AI_ALIGNMENT_STICKY_RIGHT:
        return AI_TEXT_STICKY_RIGHT;
        break;
      case AI_ALIGNMENT_STICKY_TOP:
        return AI_TEXT_STICKY_TOP;
        break;
      case AI_ALIGNMENT_STICKY_BOTTOM:
        return AI_TEXT_STICKY_BOTTOM;
        break;
      case AI_ALIGNMENT_NO_WRAPPING:
        return AI_TEXT_NO_WRAPPING;
        break;
      case AI_ALIGNMENT_CUSTOM_CSS:
        return AI_TEXT_CUSTOM_CSS;
        break;
      default:
        return '';
        break;
    }
  }

  public function alignment_style ($alignment_type, $all_styles = false) {

    $style = "";
    switch ($alignment_type) {
      case AI_ALIGNMENT_DEFAULT:
        $style = AI_ALIGNMENT_CSS_DEFAULT;
        break;
      case AI_ALIGNMENT_LEFT:
        $style = AI_ALIGNMENT_CSS_LEFT;
        break;
      case AI_ALIGNMENT_RIGHT:
        $style = AI_ALIGNMENT_CSS_RIGHT;
        break;
      case AI_ALIGNMENT_CENTER:
        $style = AI_ALIGNMENT_CSS_CENTER;
        break;
      case AI_ALIGNMENT_FLOAT_LEFT:
        $style = AI_ALIGNMENT_CSS_FLOAT_LEFT;
        break;
      case AI_ALIGNMENT_FLOAT_RIGHT:
        $style = AI_ALIGNMENT_CSS_FLOAT_RIGHT;
        break;
      case AI_ALIGNMENT_STICKY_LEFT:
        $style = AI_ALIGNMENT_CSS_STICKY_LEFT;
        break;
      case AI_ALIGNMENT_STICKY_RIGHT:
        $style = AI_ALIGNMENT_CSS_STICKY_RIGHT;
        break;
      case AI_ALIGNMENT_STICKY_TOP:
        $style = AI_ALIGNMENT_CSS_STICKY_TOP;
        break;
      case AI_ALIGNMENT_STICKY_BOTTOM:
        $style = AI_ALIGNMENT_CSS_STICKY_BOTTOM;
        break;
      case AI_ALIGNMENT_CUSTOM_CSS:
        $style = $this->get_custom_css ();
        break;
    }

    if (!$all_styles && strpos ($style, "||") !== false) {
      $styles = explode ("||", $style);
      if (isset ($styles [0])) {
        $style = trim ($styles [0]);
      }
    }

    return $style;
  }

  public function get_tracking ($saved_value = false){
    $tracking = AI_DISABLED;
    if (function_exists ('get_global_tracking')) {
      if (get_global_tracking () || $saved_value) {
        $tracking = isset ($this->wp_options [AI_OPTION_TRACKING]) ? $this->wp_options [AI_OPTION_TRACKING] : AI_DISABLED;
      }
    }
    return $tracking;
  }

  public function get_alignment_style (){
    return $this->alignment_style ($this->get_alignment_type());
  }

  public function get_paragraph_number(){
    $option = isset ($this->wp_options [AI_OPTION_PARAGRAPH_NUMBER]) ? $this->wp_options [AI_OPTION_PARAGRAPH_NUMBER] : "";
//    if ($option == '') $option = AD_ZERO;
    return $option;
   }

  public function get_paragraph_number_minimum(){
    $option = isset ($this->wp_options [AI_OPTION_MIN_PARAGRAPHS]) ? $this->wp_options [AI_OPTION_MIN_PARAGRAPHS] : "";
    if ($option == '0') $option = '';
    return $option;
   }

  public function get_minimum_words_above (){
    $option = isset ($this->wp_options [AI_OPTION_MIN_WORDS_ABOVE]) ? $this->wp_options [AI_OPTION_MIN_WORDS_ABOVE] : "";
    return $option;
   }

  public function get_minimum_words(){
    $option = isset ($this->wp_options [AI_OPTION_MIN_WORDS]) ? $this->wp_options [AI_OPTION_MIN_WORDS] : "";
    if ($option == '0') $option = '';
    return $option;
   }

  public function get_maximum_words(){
    $option = isset ($this->wp_options [AI_OPTION_MAX_WORDS]) ? $this->wp_options [AI_OPTION_MAX_WORDS] : "";
    return $option;
   }

  public function get_paragraph_tags(){
     $option = isset ($this->wp_options [AI_OPTION_PARAGRAPH_TAGS]) ? $this->wp_options [AI_OPTION_PARAGRAPH_TAGS] : DEFAULT_PARAGRAPH_TAGS;
     return str_replace (array ('<', '>'), '', $option);
  }

  public function get_minimum_paragraph_words(){
    $option = isset ($this->wp_options [AI_OPTION_MIN_PARAGRAPH_WORDS]) ? $this->wp_options [AI_OPTION_MIN_PARAGRAPH_WORDS] : "";
    if ($option == '0') $option = '';
    return $option;
   }

  public function get_maximum_paragraph_words(){
    $option = isset ($this->wp_options [AI_OPTION_MAX_PARAGRAPH_WORDS]) ? $this->wp_options [AI_OPTION_MAX_PARAGRAPH_WORDS] : "";
    return $option;
   }

  public function get_count_inside_blockquote(){
    $option = isset ($this->wp_options [AI_OPTION_COUNT_INSIDE_BLOCKQUOTE]) ? $this->wp_options [AI_OPTION_COUNT_INSIDE_BLOCKQUOTE] : "";
    if ($option == '') $option = AI_DISABLED;
    return $option;
   }

  public function get_avoid_paragraphs_above(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_ABOVE]) ? $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_ABOVE] : "";
    return $option;
   }

  public function get_avoid_paragraphs_below(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_BELOW]) ? $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_BELOW] : "";
    return $option;
   }

  public function get_avoid_text_above(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_TEXT_ABOVE]) ? $this->wp_options [AI_OPTION_AVOID_TEXT_ABOVE] : "";
    return $option;
   }

  public function get_avoid_text_below(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_TEXT_BELOW]) ? $this->wp_options [AI_OPTION_AVOID_TEXT_BELOW] : "";
    return $option;
   }

  public function get_avoid_action(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_ACTION]) ? $this->wp_options [AI_OPTION_AVOID_ACTION] : "";
    if ($option == '') $option = AD_TRY_TO_SHIFT_POSITION;
    return $option;
   }

  public function get_avoid_try_limit(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_TRY_LIMIT]) ? $this->wp_options [AI_OPTION_AVOID_TRY_LIMIT] : "";
    if ($option == '') $option = AD_ZERO;
    return $option;
   }

  public function get_avoid_direction(){
    $option = isset ($this->wp_options [AI_OPTION_AVOID_DIRECTION]) ? $this->wp_options [AI_OPTION_AVOID_DIRECTION] : "";
    if ($option == '') $option = AD_BELOW_AND_THEN_ABOVE;
    return $option;
   }

  public function get_call_filter(){
    $option = isset ($this->wp_options [AI_OPTION_EXCERPT_NUMBER]) ? $this->wp_options [AI_OPTION_EXCERPT_NUMBER] : "";
    if ($option == '0') $option = '';
    return $option;
  }

  public function get_filter_type(){
    $option = isset ($this->wp_options [AI_OPTION_FILTER_TYPE]) ? $this->wp_options [AI_OPTION_FILTER_TYPE] : AI_FILTER_AUTO;

    if ($option == '')                                          $option = AI_FILTER_AUTO;

    elseif ($option == AI_OPTION_FILTER_AUTO)                   $option = AI_FILTER_AUTO;
    elseif ($option == AI_OPTION_FILTER_PHP_FUNCTION_CALLS)     $option = AI_FILTER_PHP_FUNCTION_CALLS;
    elseif ($option == AI_OPTION_FILTER_CONTENT_PROCESSING)     $option = AI_FILTER_CONTENT_PROCESSING;
    elseif ($option == AI_OPTION_FILTER_EXCERPT_PROCESSING)     $option = AI_FILTER_EXCERPT_PROCESSING;
    elseif ($option == AI_OPTION_FILTER_BEFORE_POST_PROCESSING) $option = AI_FILTER_BEFORE_POST_PROCESSING;
    elseif ($option == AI_OPTION_FILTER_AFTER_POST_PROCESSING)  $option = AI_FILTER_AFTER_POST_PROCESSING;
    elseif ($option == AI_OPTION_FILTER_WIDGET_DRAWING)         $option = AI_FILTER_WIDGET_DRAWING;
    elseif ($option == AI_OPTION_FILTER_SUBPAGES)               $option = AI_FILTER_SUBPAGES;
    elseif ($option == AI_OPTION_FILTER_POSTS)                  $option = AI_FILTER_POSTS;
    elseif ($option == AI_OPTION_FILTER_COMMENTS)               $option = AI_FILTER_COMMENTS;

    return $option;
  }

  public function get_filter_type_text (){
    switch ($this->get_filter_type()) {
      case AI_FILTER_AUTO:
        return AI_TEXT_AUTO;
        break;
      case AI_FILTER_PHP_FUNCTION_CALLS:
        return AI_TEXT_PHP_FUNCTION_CALLS;
        break;
      case AI_FILTER_CONTENT_PROCESSING:
        return AI_TEXT_CONTENT_PROCESSING;
        break;
      case AI_FILTER_EXCERPT_PROCESSING:
        return AI_TEXT_EXCERPT_PROCESSING;
        break;
      case AI_FILTER_BEFORE_POST_PROCESSING:
        return AI_TEXT_BEFORE_POST_PROCESSING;
        break;
      case AI_FILTER_AFTER_POST_PROCESSING:
        return AI_TEXT_AFTER_POST_PROCESSING;
        break;
      case AI_FILTER_WIDGET_DRAWING:
        return AI_TEXT_WIDGET_DRAWING;
        break;
      case AI_FILTER_SUBPAGES:
        return AI_TEXT_SUBPAGES;
        break;
      case AI_FILTER_POSTS:
        return AI_TEXT_POSTS;
        break;
      case AI_FILTER_PARAGRAPHS:
        return AI_TEXT_PARAGRAPHS;
        break;
      case AI_FILTER_COMMENTS:
        return AI_TEXT_COMMENTS;
        break;
      default:
        return '';
        break;
    }
  }

  public function get_inverted_filter (){
    $inverted_filter = isset ($this->wp_options [AI_OPTION_INVERTED_FILTER]) ? $this->wp_options [AI_OPTION_INVERTED_FILTER] : AI_DISABLED;
    if ($inverted_filter == '') $inverted_filter = AI_DISABLED;
    return $inverted_filter;
  }

  public function get_direction_type(){
    $option = isset ($this->wp_options [AI_OPTION_DIRECTION_TYPE]) ? $this->wp_options [AI_OPTION_DIRECTION_TYPE] : "";
    if ($option == '') $option = AD_DIRECTION_FROM_TOP;
    return $option;
   }

  public function get_display_settings_post(){
    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_POSTS]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_POSTS] : "";
    if ($option == '') $option = AI_ENABLED;
    return $option;
  }

  public function get_display_settings_page(){
    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_PAGES] : "";
    if ($option == '') $option = AI_DISABLED;
    return $option;
  }

  public function get_display_settings_home(){
    global $ai_db_options;

    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_HOMEPAGE]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_HOMEPAGE] : "";
    if ($option == '') $option = AI_DISABLED;

    if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605') {
      if (isset ($this->wp_options [AI_OPTION_AUTOMATIC_INSERTION])) {
        $automatic_insertion = $this->wp_options [AI_OPTION_AUTOMATIC_INSERTION];
      } else $automatic_insertion = '';

      if ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_CONTENT ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_CONTENT)
        $option = AI_DISABLED;
    }

    return $option;
  }

  public function get_display_settings_category(){
    global $ai_db_options;

    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES] : "";
    if ($option == '') $option = AI_DISABLED;

    if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605') {
      if (isset ($this->wp_options [AI_OPTION_AUTOMATIC_INSERTION])) {
        $automatic_insertion = $this->wp_options [AI_OPTION_AUTOMATIC_INSERTION];
      } else $automatic_insertion = '';

      if ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_CONTENT ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_CONTENT)
        $option = AI_DISABLED;
    }

    return $option;
  }

  public function get_display_settings_search(){
    global $ai_db_options;

    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES] : "";
    if ($option == '') $option = AI_DISABLED;

    if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605') {
      if (isset ($this->wp_options [AI_OPTION_AUTOMATIC_INSERTION])) {
        $automatic_insertion = $this->wp_options [AI_OPTION_AUTOMATIC_INSERTION];
      } else $automatic_insertion = '';

      if ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_CONTENT ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_CONTENT)
        $option = AI_DISABLED;
    }

    return $option;
  }

  public function get_display_settings_archive(){
    global $ai_db_options;

    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES] : "";
    if ($option == '') $option = AI_DISABLED;

    if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605') {
      if (isset ($this->wp_options [AI_OPTION_AUTOMATIC_INSERTION])) {
        $automatic_insertion = $this->wp_options [AI_OPTION_AUTOMATIC_INSERTION];
      } else $automatic_insertion = '';

      if ($automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_PARAGRAPH ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_BEFORE_CONTENT ||
          $automatic_insertion == AI_AUTOMATIC_INSERTION_AFTER_CONTENT)
        $option = AI_DISABLED;
    }

    return $option;
  }

  public function get_enable_feed (){
    $enable_feed = isset ($this->wp_options [AI_OPTION_ENABLE_FEED]) ? $this->wp_options [AI_OPTION_ENABLE_FEED] : "";
    if ($enable_feed == '') $enable_feed = AI_DISABLED;
    return $enable_feed;
  }

  public function get_enable_ajax (){
    $enable_ajax = isset ($this->wp_options [AI_OPTION_ENABLE_AJAX]) ? $this->wp_options [AI_OPTION_ENABLE_AJAX] : "";
    if ($enable_ajax == '') $enable_ajax = AI_ENABLED;
    return $enable_ajax;
  }

   // Used for shortcodes
   public function get_enable_manual (){
     $option = isset ($this->wp_options [AI_OPTION_ENABLE_MANUAL]) ? $this->wp_options [AI_OPTION_ENABLE_MANUAL] : AI_DISABLED;

     if ($option == '') $option = AI_DISABLED;

     return $option;
   }

   public function get_enable_widget (){
     global $ai_db_options;

     $enable_widget = isset ($this->wp_options [AI_OPTION_ENABLE_WIDGET]) ? $this->wp_options [AI_OPTION_ENABLE_WIDGET] : "";
     if ($enable_widget == '') $enable_widget = AI_ENABLED;

     return $enable_widget;
   }

   public function get_enable_php_call (){
     $option = isset ($this->wp_options [AI_OPTION_ENABLE_PHP_CALL]) ? $this->wp_options [AI_OPTION_ENABLE_PHP_CALL] : "";
     if ($option == '') $option = AI_DISABLED;
     return $option;
   }

   public function get_paragraph_text (){
     $paragraph_text = isset ($this->wp_options [AI_OPTION_PARAGRAPH_TEXT]) ? $this->wp_options [AI_OPTION_PARAGRAPH_TEXT] : "";
     return $paragraph_text;
   }

   public function get_paragraph_text_type (){
     $option = isset ($this->wp_options [AI_OPTION_PARAGRAPH_TEXT_TYPE]) ? $this->wp_options [AI_OPTION_PARAGRAPH_TEXT_TYPE] : "";
     if ($option == '') $option = AD_DO_NOT_CONTAIN;
     return $option;
   }

   public function get_custom_css (){
      global $ai_db_options;

      $option = isset ($this->wp_options [AI_OPTION_CUSTOM_CSS]) ? $this->wp_options [AI_OPTION_CUSTOM_CSS] : "";

      // Fix for old bug
      if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605' && strpos ($option, "Undefined index")) $option = "";

      return $option;
   }

   public function get_display_for_users (){
     if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_USERS])) {
       $display_for_users = $this->wp_options [AI_OPTION_DISPLAY_FOR_USERS];
     } else $display_for_users = '';
     if ($display_for_users == '') $display_for_users = AD_DISPLAY_ALL_USERS;

     elseif ($display_for_users == 'all') $display_for_users = AD_DISPLAY_ALL_USERS;
     elseif ($display_for_users == 'logged in') $display_for_users = AD_DISPLAY_LOGGED_IN_USERS;
     elseif ($display_for_users == 'not logged in') $display_for_users = AD_DISPLAY_NOT_LOGGED_IN_USERS;

     return $display_for_users;
   }

   public function get_detection_client_side(){
     global $ai_db_options;

     $option = isset ($this->wp_options [AI_OPTION_DETECT_CLIENT_SIDE]) ? $this->wp_options [AI_OPTION_DETECT_CLIENT_SIDE] : AI_DISABLED;

      if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605') {
        if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
         $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
        } else $display_for_devices = '';

        if ($display_for_devices == AD_DISPLAY_ALL_DEVICES) $option = AI_DISABLED;
      }

     return $option;
   }

  public function get_detection_viewport ($viewport){
    global $ai_db_options;

    $option_name = AI_OPTION_DETECT_VIEWPORT . '_' . $viewport;
    $option = isset ($this->wp_options [$option_name]) ? $this->wp_options [$option_name] : AI_DISABLED;

    if (isset ($ai_db_options [AI_OPTION_GLOBAL]['VERSION']) && $ai_db_options [AI_OPTION_GLOBAL]['VERSION'] < '010605' && $this->get_detection_client_side()) {
      if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
       $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
      } else $display_for_devices = '';

      if ($display_for_devices == AD_DISPLAY_DESKTOP_DEVICES ||
          $display_for_devices == AD_DISPLAY_DESKTOP_TABLET_DEVICES ||
          $display_for_devices == AD_DISPLAY_DESKTOP_PHONE_DEVICES) {
           switch ($viewport) {
             case 1:
               $option = AI_ENABLED;
               break;
             default:
               $option = AI_DISABLED;
           }
      }
      elseif ($display_for_devices == AD_DISPLAY_TABLET_DEVICES ||
              $display_for_devices == AD_DISPLAY_MOBILE_DEVICES ||
              $display_for_devices == AD_DISPLAY_DESKTOP_TABLET_DEVICES) {
           switch ($viewport) {
             case 2:
               $option = AI_ENABLED;
               break;
             default:
               $option = AI_DISABLED;
           }
      }
      elseif ($display_for_devices == AD_DISPLAY_PHONE_DEVICES ||
              $display_for_devices == AD_DISPLAY_MOBILE_DEVICES ||
              $display_for_devices == AD_DISPLAY_DESKTOP_PHONE_DEVICES) {
           switch ($viewport) {
             case 3:
               $option = AI_ENABLED;
               break;
             default:
               $option = AI_DISABLED;
           }
      }
      elseif ($display_for_devices == AD_DISPLAY_ALL_DEVICES) $option = AI_DISABLED;
    }

    return $option;
  }

  public function ai_get_counters (&$title){
    global $ai_wp_data, $ad_inserter_globals;

    $counters = '';
    $title = 'Counters:';

    if (isset ($ad_inserter_globals [AI_CONTENT_COUNTER_NAME]) && ($ai_wp_data [AI_CONTEXT] == AI_CONTEXT_CONTENT || $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_SHORTCODE)) {
      $counters .= ' C='.$ad_inserter_globals [AI_CONTENT_COUNTER_NAME];
      $title .= ' C= Content, ';
    }

    if (isset ($ad_inserter_globals [AI_EXCERPT_COUNTER_NAME]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_EXCERPT) {
      $counters .= ' X='.$ad_inserter_globals [AI_EXCERPT_COUNTER_NAME];
      $title .= ' X = Excerpt, ';
    }

    if (isset ($ad_inserter_globals [AI_LOOP_BEFORE_COUNTER_NAME]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_BEFORE_POST) {
      $counters .= ' B='.$ad_inserter_globals [AI_LOOP_BEFORE_COUNTER_NAME];
      $title .= ' B = Before post, ';
    }

    if (isset ($ad_inserter_globals [AI_LOOP_AFTER_COUNTER_NAME]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_AFTER_POST) {
      $counters .= ' A='.$ad_inserter_globals [AI_LOOP_AFTER_COUNTER_NAME];
      $title .= ' A = After post, ';
    }

    if (isset ($ad_inserter_globals [AI_WIDGET_COUNTER_NAME . $this->number]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_WIDGET) {
      $counters .= ' W='.$ad_inserter_globals [AI_WIDGET_COUNTER_NAME . $this->number];
      $title .= ' W = Widget, ';
    }

    if (isset ($ad_inserter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number])) {
      $counters .= ' P='.$ad_inserter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number];
      $title .= ' P = PHP function call, ';
    }

    if (isset ($ad_inserter_globals [AI_BLOCK_COUNTER_NAME . $this->number])) {
      $counters .= ' N='.$ad_inserter_globals [AI_BLOCK_COUNTER_NAME . $this->number];
      $title .= ' N = Block';
    }

    return $counters;
  }

  public function ai_getProcessedCode ($hide_label = false, $force_server_side_code = false){
    global $ai_wp_data, $ad_inserter_globals, $block_object;

    $code = $this->ai_getCode ();

    $processed_code = $this->replace_ai_tags (do_shortcode ($code));

    if (strpos ($code, AD_COUNT_SEPARATOR) !== false) {
      $ads = explode (AD_COUNT_SEPARATOR, $code);

      if (isset ($ad_inserter_globals [AI_BLOCK_COUNTER_NAME . $this->number])) {
        $counter_for_filter = $ad_inserter_globals [AI_BLOCK_COUNTER_NAME . $this->number];

        if ($counter_for_filter != 0 && $counter_for_filter <= count ($ads)) {
          $processed_code = $ads [$counter_for_filter - 1];
        } else $processed_code = '';
      } else $processed_code = $ads [rand (0, count ($ads) - 1)];
    }

    $dynamic_blocks = get_dynamic_blocks ();
    if ($force_server_side_code || ($dynamic_blocks == AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC && defined ('AI_NO_W3TC'))) $dynamic_blocks = AI_DYNAMIC_BLOCKS_SERVER_SIDE;

    if (strpos ($processed_code, AD_ROTATE_SEPARATOR) !== false) {
      $ads = explode (AD_ROTATE_SEPARATOR, $processed_code);

      switch ($dynamic_blocks) {
        case AI_DYNAMIC_BLOCKS_SERVER_SIDE:
          $this->code_version = mt_rand (1, count ($ads));
          $processed_code = trim ($ads [$this->code_version - 1]);
          break;
        case AI_DYNAMIC_BLOCKS_CLIENT_SIDE:
          $this->code_version = '""';
          $processed_code = "\n<div class='ai-rotate' style='position: relative;'>\n";
          foreach ($ads as $index => $ad) {
            switch ($index) {
              case 0:
                $processed_code .= "<div class='ai-rotate-option' style='visibility: hidden;'>\n".trim ($ad, "\n")."\n</div>\n";
                break;
              default:
                $processed_code .= "<div class='ai-rotate-option' style='visibility: hidden; position: absolute; top: 0; left: 0; width: 100%; height: 100%;'>".trim ($ad, "\n")."\n</div>\n";
                break;
            }
          }
          $processed_code .= "</div>\n";
          break;
        case AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC:
          $this->w3tc_code = '$ai_code = unserialize (base64_decode (\''.base64_encode (serialize ($ads)).'\')); $ai_index = mt_rand (1, count ($ai_code)); $ai_code = $ai_code [$ai_index - 1]; $ai_enabled = true;';
          $processed_code = '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
          $processed_code .= $this->w3tc_code.' echo $ai_code;';
          $processed_code .= '<!-- /mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
          break;
      }
    }

    $this->color = '#e00';

    if (strpos ($processed_code, AD_AMP_SEPARATOR) !== false) {
      $codes = explode (AD_AMP_SEPARATOR, $processed_code);
      $code_index = $ai_wp_data [AI_WP_AMP_PAGE] ? 1 : 0;
      $this->color = $code_index ? '#0c0' : '#e00';
      $processed_code = trim ($codes [$code_index]);
    } else {
        // AMP page but No AMP separator - don't insert code unless enabled
        if ($ai_wp_data [AI_WP_AMP_PAGE]) {
          if (!$this->get_enable_amp ()) {
            $processed_code = '';
            $this->color = '#222';
          } else $this->color = '#0c0';
        }
      }

    if ($dynamic_blocks != AI_DYNAMIC_BLOCKS_SERVER_SIDE) {
      $countries = trim (str_replace (' ', '', strtoupper ($this->get_ad_country_list (true))));
      $country_list_type = $this->get_ad_country_list_type ();

      $ip_addresses = trim (str_replace (' ', '', strtolower ($this->get_ad_ip_address_list ())));
      $ip_address_list_type = $this->get_ad_ip_address_list_type ();

      if ($countries != '' || $ip_addresses != '') {
        switch ($dynamic_blocks) {
          case AI_DYNAMIC_BLOCKS_CLIENT_SIDE:
            if ($countries != '' || $ip_addresses != '') {
              if ($country_list_type    == AD_BLACK_LIST) $country_list_type    = 'B'; else $country_list_type = 'W';
              if ($ip_address_list_type == AD_BLACK_LIST) $ip_address_list_type = 'B'; else $ip_address_list_type = 'W';

              if ($countries != '')     $country_attributes     = "countries='$countries' country-list='$country_list_type'";             else $country_attributes = '';
              if ($ip_addresses != '')  $ip_address_attributes  = "ip-addresses='$ip_addresses' ip-address-list='$ip_address_list_type'"; else $ip_address_attributes = '';

              $block_class_name = get_block_class_name ();
              if ($block_class_name == '') $block_class_name = DEFAULT_BLOCK_CLASS_NAME;
              $block_class_name = $block_class_name.'-'.$this->number;
              $this->client_side_ip_address_detection = true;
              $this->needs_class = true;

              $processed_code = "\n<div class='ai-ip-data' $ip_address_attributes $country_attributes class-name='$block_class_name' style='visibility: hidden; position: absolute; width: 100%; height: 100%; z-index: -9999;'>$processed_code</div>\n";
            }
            break;
          case AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC:
            if ($this->w3tc_code == '') $this->w3tc_code = '$ai_code = unserialize (base64_decode (\''.base64_encode (serialize ($processed_code)).'\')); $ai_index = 0; $ai_enabled = true;';

            $this->w3tc_code .= ' require_once \''.AD_INSERTER_PLUGIN_DIR.'includes/geo/Ip2Country.php\';';

            if ($ip_addresses != '') {
              $this->w3tc_code .= ' if ($ai_enabled) $ai_enabled = check_ip_address_list (unserialize (base64_decode (\''.base64_encode (serialize ($this->get_ad_ip_address_list (true))).'\')), '.($this->get_ad_ip_address_list_type () == AD_WHITE_LIST ? 'true':'false').');';
            }

            if ($countries != '') {
              $this->w3tc_code .= ' if ($ai_enabled) $ai_enabled = check_country_list (unserialize (base64_decode (\''.base64_encode (serialize ($this->get_ad_country_list (true))).'\')), '.($this->get_ad_country_list_type () == AD_WHITE_LIST ? 'true':'false').');';
            }

            $processed_code = '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
            $processed_code .= $this->w3tc_code.' if ($ai_enabled) echo $ai_code;';
            $processed_code .= '<!-- /mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
            break;
        }
      }
    }

    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && !$hide_label) {
      $processed_code =  "<div class='ai-code'>\n" . $processed_code ."</div>\n";
    }

    if (function_exists ('ai_adb_block_actions')) ai_adb_block_actions ($this, $processed_code, $hide_label);

    $title = '';
    $fallback_code = '';
    if ($this->fallback != 0) {
      $this->color = '#a0f';
      $fallback_block = $block_object [$this->fallback];
      if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($fallback_block->number); else $url_parameters = "";
      $url = admin_url ('options-general.php?page=ad-inserter.php') . $url_parameters . '&tab=' . $fallback_block->number;
      $fallback_code = ' &nbsp;&#8678;&nbsp; '.
      '<a style="text-decoration: none; color: white;" title="Click to go to block settings" href="'. $url . '"><kbd style="display: none">[AI]</kbd>' . $this->fallback . ' &nbsp; ' . $fallback_block->get_ad_name () .'</a>';
    }
    $counters = $this->ai_get_counters ($title);

    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && !$hide_label) {
      if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($this->number); else $url_parameters = "";
      $url = admin_url ('options-general.php?page=ad-inserter.php') . $url_parameters . '&tab=' . $this->number;

      $processed_code = '<section style="border: 1px solid '.$this->color.';"><section style="padding: 1px 0 1px 5px; background: '.$this->color.'; color: white; font-size: 12px; text-align: left;"><a style="text-decoration: none; color: white;" title="Click to go to block settings" href="'
      . $url . '"><kbd style="display: none">[AI]</kbd>' . $this->number . ' &nbsp; ' . $this->get_ad_name () .'</a>&nbsp;'.$fallback_code.'<a style="float: right; text-decoration: none; color: white; padding: 0px 10px 0 0;"><kbd title="'.$title.'">'.$counters.'</kbd><kbd style="display: none">[/AI]</kbd></a></section>' . $processed_code . '</section>';
    }

    return $processed_code;
  }

  public function get_code_for_insertion ($include_viewport_classes = true, $hidden_widgets = false) {
    global $ai_wp_data, $block_object;

    if ($this->get_alignment_type() == AI_ALIGNMENT_NO_WRAPPING) return $this->ai_getProcessedCode ();

    $hidden_viewports = '';
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && $this->get_detection_client_side()) {

      $processed_code = $this->ai_getProcessedCode (true);
      $title = '';
      $counters = $this->ai_get_counters ($title);

      if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($this->number); else $url_parameters = "";
      $url = admin_url ('options-general.php?page=ad-inserter.php') . $url_parameters . '&tab=' . $this->number;

      $hidden_block_text = '<section style="text-align: center; font-weight: bold;">&nbsp;'.($hidden_widgets ? 'WIDGET':'BLOCK').' INSERTED BUT NOT VISIBLE&nbsp;</section>';

      $visible_viewports = '';
      for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
        $viewport_name = get_viewport_name ($viewport);
        if ($viewport_name != '') {
          if ($this->get_detection_viewport ($viewport))
            $visible_viewports .= '<section class="ai-viewport-' . $viewport .'" style=""><section style="padding: 1px 0 1px 5px; text-align: center; background: '.$this->color.'; color: white; font-size: 12px;"><a style="float: left; text-decoration: none; color: white;" title="Click to go to block settings" href="' . $url . '"><kbd style="display: none">[AI]</kbd>' . $this->number . ' ' . $this->get_ad_name () .'</a><a style="text-decoration: none; color: white;">&nbsp;'.$viewport_name.'&nbsp;</a><a style="float: right; text-decoration: none; color: white; padding-right: 5px;" title="'.$title.'">'.$counters.'<kbd style="display: none">[/AI]</kbd></a></section></section>'; else
              $hidden_viewports .= '<section class="ai-viewport-' . $viewport .'" style="' . $this->get_alignment_style() . '; border: 1px solid blue;"><section style="padding: 1px 0 1px 5px; text-align: center; background: blue; color: white; font-size: 12px;"><a style="float: left; text-decoration: none; color: white;" title="Click to go to block settings" href="' . $url . '"><kbd style="display: none">[AI]</kbd>' . $this->number . ' ' . $this->get_ad_name () .'</a><a style="text-decoration: none; color: white;">&nbsp;'.$viewport_name.'&nbsp;</a><a style="float: right; text-decoration: none; color: white; padding-right: 5px;" title="'.$title.'">'.$counters.'<kbd style="display: none">[/AI]</kbd></a></section>' . $hidden_block_text . '</section>';
        }
      }

      $code = "<div style='border: 1px solid " . $this->color . ";'>".$visible_viewports . $processed_code.'</div>';
    } else $code = $this->ai_getProcessedCode ();

    // Prevent empty wrapping div on AMP pages
    if ($ai_wp_data [AI_WP_AMP_PAGE] && $code == '') return '';

    $block_class_name = get_block_class_name ();
    if ($block_class_name == '' && $this->needs_class) $block_class_name = DEFAULT_BLOCK_CLASS_NAME;
    $viewport_classes = $include_viewport_classes ? $this->get_viewport_classes () : "";
    if ($block_class_name != '' || $viewport_classes != '') {
      if ($block_class_name == '') $viewport_classes = trim ($viewport_classes);
      $class = " class='" . ($block_class_name != '' ? $block_class_name . " " . $block_class_name . "-" . $this->number : '') . $viewport_classes ."'";
    } else $class = '';

    if ($hidden_widgets) return $hidden_viewports; else {
      if ($this->client_side_ip_address_detection) $additional_block_style = 'visibility: hidden; position: absolute; width: 100%; height: 100%; z-index: -9999; '; else $additional_block_style = '';

      $tracking_code_pre  = '';
      $tracking_code_data = '';
      $tracking_code_post = '';
      $tracking_code      = '';

      if ($this->fallback != 0) {
        if ($block_object [$this->fallback]->get_tracking ()) {
          $tracking_code_pre = " data-ai='";
          $tracking_code_data = "[{$this->fallback},{$this->code_version}]";
          $tracking_code_post = "'";

          $tracking_code = $tracking_code_pre . base64_encode ($tracking_code_data) . $tracking_code_post;
        }
      } else {
          if ($this->get_tracking ()) {
            $tracking_code_pre = " data-ai='";
            $tracking_code_data = "[{$this->number},{$this->code_version}]";
            $tracking_code_post = "'";

            $tracking_code = $tracking_code_pre . base64_encode ($tracking_code_data) . $tracking_code_post;
          }
        }

      $wrapper_before = $hidden_viewports . "<div" . $class . $tracking_code . " style='" . $additional_block_style . $this->get_alignment_style() . "'>\n";

      $wrapper_after  = "</div>\n";

      if ($this->w3tc_code != '' && get_dynamic_blocks () == AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC && !defined ('AI_NO_W3TC')) {

        if ($this->get_tracking ()) $tracking_code_data = '[#AI_DATA#]';

        $wrapper_before = $hidden_viewports . "<div" . $class . $tracking_code_pre . $tracking_code_data . $tracking_code_post . " style='" . $additional_block_style . $this->get_alignment_style() . "'>\n";

        $code = '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
        $code .= $this->w3tc_code.' if ($ai_enabled) echo str_replace (\'[#AI_DATA#]\', base64_encode ("[' . $this->number . ',$ai_index]"), unserialize (base64_decode (\''.base64_encode (serialize ($wrapper_before)).'\'))), $ai_code, unserialize (base64_decode (\''.base64_encode (serialize ($wrapper_after)).'\'));';
        $code .= '<!-- /mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
        return $code;
      } else return $wrapper_before . $code . $wrapper_after;
    }
  }

   public function get_ad_general_tag(){
     $option = isset ($this->wp_options [AI_OPTION_GENERAL_TAG]) ? $this->wp_options [AI_OPTION_GENERAL_TAG] : "";
     if ($option == '') $option = AD_GENERAL_TAG;
     return $option;
   }

  public function get_adb_block_action (){
     $option = isset ($this->wp_options [AI_OPTION_ADB_BLOCK_ACTION]) ? $this->wp_options [AI_OPTION_ADB_BLOCK_ACTION] : DEFAULT_ADB_BLOCK_ACTION;
     return $option;
  }

  public function get_adb_block_replacement (){
     $option = isset ($this->wp_options [AI_OPTION_ADB_BLOCK_REPLACEMENT]) ? $this->wp_options [AI_OPTION_ADB_BLOCK_REPLACEMENT] : AD_EMPTY_DATA;
     return $option;
  }

  public function get_scheduling(){
     $option = isset ($this->wp_options [AI_OPTION_SCHEDULING]) ? $this->wp_options [AI_OPTION_SCHEDULING] : "";

     // Convert old option
     if ($option == '' && intval ($this->get_ad_after_day()) != 0) $option = AI_SCHEDULING_DELAY;

     if ($option == '') $option = AI_SCHEDULING_OFF;

     return $option;
  }

  public function get_ad_after_day(){
     $option = isset ($this->wp_options [AI_OPTION_AFTER_DAYS]) ? $this->wp_options [AI_OPTION_AFTER_DAYS] : "";
//     if ($option == '') $option = AD_ZERO;

     if ($option == '0') $option = '';

     return $option;
  }

  public function get_schedule_start_date(){
     $option = isset ($this->wp_options [AI_OPTION_START_DATE]) ? $this->wp_options [AI_OPTION_START_DATE] : "";
     return $option;
  }

  public function get_schedule_end_date(){
     $option = isset ($this->wp_options [AI_OPTION_END_DATE]) ? $this->wp_options [AI_OPTION_END_DATE] : "";
     return $option;
  }

  public function get_fallback(){
     $option = isset ($this->wp_options [AI_OPTION_FALLBACK]) ? $this->wp_options [AI_OPTION_FALLBACK] : "";
     return $option;
  }

  public function get_maximum_insertions (){
     $option = isset ($this->wp_options [AI_OPTION_MAXIMUM_INSERTIONS]) ? $this->wp_options [AI_OPTION_MAXIMUM_INSERTIONS] : "";
     if ($option == '0') $option = '';
     return $option;
  }

  public function get_id_list(){
     $option = isset ($this->wp_options [AI_OPTION_ID_LIST]) ? $this->wp_options [AI_OPTION_ID_LIST] : "";
     return $option;
  }

  public function get_id_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_ID_LIST_TYPE]) ? $this->wp_options [AI_OPTION_ID_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_url_list(){
     $option = isset ($this->wp_options [AI_OPTION_URL_LIST]) ? $this->wp_options [AI_OPTION_URL_LIST] : "";
     return $option;
  }

  public function get_ad_url_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_URL_LIST_TYPE]) ? $this->wp_options [AI_OPTION_URL_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_url_parameter_list(){
     $option = isset ($this->wp_options [AI_OPTION_URL_PARAMETER_LIST]) ? $this->wp_options [AI_OPTION_URL_PARAMETER_LIST] : "";
     return $option;
  }

  public function get_url_parameter_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_URL_PARAMETER_LIST_TYPE]) ? $this->wp_options [AI_OPTION_URL_PARAMETER_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_domain_list(){
     $option = isset ($this->wp_options [AI_OPTION_DOMAIN_LIST]) ? $this->wp_options [AI_OPTION_DOMAIN_LIST] : "";
     return $option;
  }

  public function get_ad_domain_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_DOMAIN_LIST_TYPE]) ? $this->wp_options [AI_OPTION_DOMAIN_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_ip_address_list (){
     $option = isset ($this->wp_options [AI_OPTION_IP_ADDRESS_LIST]) ? $this->wp_options [AI_OPTION_IP_ADDRESS_LIST] : "";
     return $option;
  }

  public function get_ad_ip_address_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_IP_ADDRESS_LIST_TYPE]) ? $this->wp_options [AI_OPTION_IP_ADDRESS_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_country_list ($expand = false){
     $option = isset ($this->wp_options [AI_OPTION_COUNTRY_LIST]) ? $this->wp_options [AI_OPTION_COUNTRY_LIST] : "";
     if ($expand && function_exists ('expanded_country_list')) return expanded_country_list ($option);
     return $option;
  }

  public function get_ad_country_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_COUNTRY_LIST_TYPE]) ? $this->wp_options [AI_OPTION_COUNTRY_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_name(){
     $option = isset ($this->wp_options [AI_OPTION_BLOCK_NAME]) ? $this->wp_options [AI_OPTION_BLOCK_NAME] : "";
     if ($option == '') $option = AD_NAME. " " . $this->number;
     return $option;
  }

  public function get_ad_block_cat(){
     $option = isset ($this->wp_options [AI_OPTION_CATEGORY_LIST]) ? $this->wp_options [AI_OPTION_CATEGORY_LIST] : "";
     return $option;
  }

  public function get_ad_block_cat_type(){
     $option = isset ($this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE]) ? $this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE] : "";

     // Update old data
     if ($option == ''){
       $option = AD_BLACK_LIST;
       $this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE] = AD_BLACK_LIST;
     }

     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
   }

  public function get_ad_block_tag(){
     $option = isset ($this->wp_options [AI_OPTION_TAG_LIST]) ? $this->wp_options [AI_OPTION_TAG_LIST] : "";
     return $option;
  }

  public function get_ad_block_tag_type(){
     $option = isset ($this->wp_options [AI_OPTION_TAG_LIST_TYPE]) ? $this->wp_options [AI_OPTION_TAG_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_block_taxonomy(){
     $option = isset ($this->wp_options [AI_OPTION_TAXONOMY_LIST]) ? $this->wp_options [AI_OPTION_TAXONOMY_LIST] : "";
     return $option;
  }

  public function get_ad_block_taxonomy_type(){
     $option = isset ($this->wp_options [AI_OPTION_TAXONOMY_LIST_TYPE]) ? $this->wp_options [AI_OPTION_TAXONOMY_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
   }

  public function get_ad_enabled_on_which_pages (){
    $option = isset ($this->wp_options [AI_OPTION_ENABLED_ON_WHICH_PAGES]) ? $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_PAGES] : AI_NO_INDIVIDUAL_EXCEPTIONS;

    if ($option == '') $option = AI_NO_INDIVIDUAL_EXCEPTIONS;

    elseif ($option == AD_ENABLED_ON_ALL)                       $option = AI_NO_INDIVIDUAL_EXCEPTIONS;
    elseif ($option == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED)    $option = AI_INDIVIDUALLY_DISABLED;
    elseif ($option == AD_ENABLED_ONLY_ON_SELECTED)             $option = AI_INDIVIDUALLY_ENABLED;

//    return AI_INDIVIDUALLY_DISABLED;
    return $option;
  }

  public function get_ad_enabled_on_which_pages_text (){
    switch ($this->get_ad_enabled_on_which_pages ()) {
      case AI_NO_INDIVIDUAL_EXCEPTIONS:
        return AI_TEXT_NO_INDIVIDUAL_EXCEPTIONS;
        break;
      case AI_INDIVIDUALLY_DISABLED:
        return AI_TEXT_INDIVIDUALLY_DISABLED;
        break;
      case AI_INDIVIDUALLY_ENABLED:
        return AI_TEXT_INDIVIDUALLY_ENABLED;
        break;
      default:
        return '';
        break;
    }
  }

  public function get_ad_enabled_on_which_posts (){
    $option = isset ($this->wp_options [AI_OPTION_ENABLED_ON_WHICH_POSTS]) ? $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_POSTS] : AI_NO_INDIVIDUAL_EXCEPTIONS;

    if ($option == '') $option = AI_NO_INDIVIDUAL_EXCEPTIONS;

    elseif ($option == AD_ENABLED_ON_ALL)                       $option = AI_NO_INDIVIDUAL_EXCEPTIONS;
    elseif ($option == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED)    $option = AI_INDIVIDUALLY_DISABLED;
    elseif ($option == AD_ENABLED_ONLY_ON_SELECTED)             $option = AI_INDIVIDUALLY_ENABLED;

//    return AI_INDIVIDUALLY_DISABLED;
    return $option;
  }

  public function get_ad_enabled_on_which_posts_text (){
    switch ($this->get_ad_enabled_on_which_posts ()) {
      case AI_NO_INDIVIDUAL_EXCEPTIONS:
        return AI_TEXT_NO_INDIVIDUAL_EXCEPTIONS;
        break;
      case AI_INDIVIDUALLY_DISABLED:
        return AI_TEXT_INDIVIDUALLY_DISABLED;
        break;
      case AI_INDIVIDUALLY_ENABLED:
        return AI_TEXT_INDIVIDUALLY_ENABLED;
        break;
      default:
        return '';
        break;
    }
  }

  public function get_viewport_classes (){
    $viewport_classes = "";
    if ($this->get_detection_client_side ()) {
      $all_viewports = true;
      for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
        $viewport_name = get_viewport_name ($viewport);
        if ($viewport_name != '') {
          if ($this->get_detection_viewport ($viewport)) $viewport_classes .= " ai-viewport-" . $viewport; else $all_viewports = false;
        }
      }
      if ($viewport_classes == "") $viewport_classes = " ai-viewport-0";
        elseif ($all_viewports) $viewport_classes = "";
    }
    return ($viewport_classes);
  }

  public function before_paragraph ($content, $position_preview = false) {
    global $ai_wp_data, $ai_last_check, $special_element_tags;

    $multibyte = get_paragraph_counting_functions() == AI_MULTIBYTE_PARAGRAPH_COUNTING_FUNCTIONS;

    $paragraph_positions = array ();

    $paragraph_tags = trim ($this->get_paragraph_tags());
    if ($paragraph_tags == '') return $content;

    $paragraph_start_strings = explode (",", $paragraph_tags);

    $ai_last_check = AI_CHECK_PARAGRAPH_TAGS;
    if (count ($paragraph_start_strings) == 0) return $content;

    foreach ($paragraph_start_strings as $paragraph_start_string) {
      if (trim ($paragraph_start_string) == '') continue;

      $last_position = - 1;

      $paragraph_start_string = trim ($paragraph_start_string);
      if ($paragraph_start_string == "#") {
        $paragraph_start = "\r\n\r\n";
        if (!in_array (0, $paragraph_positions)) $paragraph_positions [] = 0;
      } else $paragraph_start = '<' . $paragraph_start_string;

      if ($multibyte) {
        $paragraph_start_len = mb_strlen ($paragraph_start);
        while (mb_stripos ($content, $paragraph_start, $last_position + 1) !== false) {
          $last_position = mb_stripos ($content, $paragraph_start, $last_position + 1);
          if ($paragraph_start_string == "#") $paragraph_positions [] = $last_position + 4; else
            if (mb_substr ($content, $last_position + $paragraph_start_len, 1) == ">" || mb_substr ($content, $last_position + $paragraph_start_len, 1) == " ")
              $paragraph_positions [] = $last_position;
        }
      } else {
          $paragraph_start_len = strlen ($paragraph_start);
          while (stripos ($content, $paragraph_start, $last_position + 1) !== false) {
            $last_position = stripos ($content, $paragraph_start, $last_position + 1);
            if ($paragraph_start_string == "#") $paragraph_positions [] = $last_position + 4; else
              if ($content [$last_position + $paragraph_start_len] == ">" || $content [$last_position + $paragraph_start_len] == " ")
                $paragraph_positions [] = $last_position;
          }
        }
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_WITH_TAGS;
    if (count ($paragraph_positions) == 0) return $content;

    sort ($paragraph_positions);

    if (!$this->get_count_inside_blockquote ()) {

      $special_element_offsets = array ();

      foreach ($special_element_tags as $special_element_tag) {
        preg_match_all ("/<\/?$special_element_tag/i", $content, $special_elements, PREG_OFFSET_CAPTURE);

        $special_elements = $special_elements [0];
        foreach ($special_elements as $index => $special_element) {
          if (strtolower ($special_element [0]) == "<$special_element_tag" && isset ($special_elements [$index + 1][0]) && strtolower ($special_elements [$index + 1][0]) == "</$special_element_tag") {

            if ($multibyte) {
              $special_element_offsets []= array (mb_strlen (substr ($content, 0, $special_element [1])) + 1, mb_strlen (substr ($content, 0, $special_elements [$index + 1][1])));
            } else {
                $special_element_offsets []= array ($special_element [1] + 1, $special_elements [$index + 1][1]);
              }
          }
        }
      }

      if (count ($special_element_offsets) != 0) {

        $filtered_paragraph_positions = array ();
        $inside_special_element = array ();

        foreach ($special_element_offsets as $special_element_offset) {
          foreach ($paragraph_positions as $paragraph_position) {
            if ($paragraph_position >= $special_element_offset [0] && $paragraph_position <= $special_element_offset [1]) $inside_special_element [] = $paragraph_position;
          }
        }

        foreach ($paragraph_positions as $paragraph_position) {
          if (!in_array ($paragraph_position, $inside_special_element)) $filtered_paragraph_positions []= $paragraph_position;
        }

        $paragraph_positions = $filtered_paragraph_positions;
      }

      $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE_FIGURE;
      if (count ($paragraph_positions) == 0) return $content;
    }

    $paragraph_min_words = intval ($this->get_minimum_paragraph_words());
    $paragraph_max_words = intval ($this->get_maximum_paragraph_words());

    if ($paragraph_min_words != 0 || $paragraph_max_words != 0) {
      $filtered_paragraph_positions = array ();
      foreach ($paragraph_positions as $index => $paragraph_position) {

        if ($multibyte) {
          $paragraph_code = $index == count ($paragraph_positions) - 1 ? mb_substr ($content, $paragraph_position) : mb_substr ($content, $paragraph_position, $paragraph_positions [$index + 1] - $paragraph_position);
        } else {
            $paragraph_code = $index == count ($paragraph_positions) - 1 ? substr ($content, $paragraph_position) : substr ($content, $paragraph_position, $paragraph_positions [$index + 1] - $paragraph_position);
          }

        if ($this->check_number_of_words_in_paragraph ($paragraph_code, $paragraph_min_words, $paragraph_max_words)) $filtered_paragraph_positions [] = $paragraph_position;
      }
      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS;
    if (count ($paragraph_positions) == 0) return $content;

    $paragraph_texts = explode (",", html_entity_decode ($this->get_paragraph_text()));
    if ($this->get_paragraph_text() != "" && count ($paragraph_texts) != 0) {

      $filtered_paragraph_positions = array ();
      $paragraph_text_type = $this->get_paragraph_text_type ();

      foreach ($paragraph_positions as $index => $paragraph_position) {

        if ($multibyte) {
          $paragraph_code = $index == count ($paragraph_positions) - 1 ? mb_substr ($content, $paragraph_position) : mb_substr ($content, $paragraph_position, $paragraph_positions [$index + 1] - $paragraph_position);
        } else {
            $paragraph_code = $index == count ($paragraph_positions) - 1 ? substr ($content, $paragraph_position) : substr ($content, $paragraph_position, $paragraph_positions [$index + 1] - $paragraph_position);
          }

        if ($paragraph_text_type == AD_CONTAIN) {
          $found = true;
          foreach ($paragraph_texts as $paragraph_text) {
            if (trim ($paragraph_text) == '') continue;

            if ($multibyte) {
              if (mb_stripos ($paragraph_code, trim ($paragraph_text)) === false) {
                $found = false;
                break;
              }
            } else {
                if (stripos ($paragraph_code, trim ($paragraph_text)) === false) {
                  $found = false;
                  break;
                }
              }
          }
          if ($found) $filtered_paragraph_positions [] = $paragraph_position;
        } elseif ($paragraph_text_type == AD_DO_NOT_CONTAIN) {
            $found = false;
            foreach ($paragraph_texts as $paragraph_text) {
              if (trim ($paragraph_text) == '') continue;

              if ($multibyte) {
                if (mb_stripos ($paragraph_code, trim ($paragraph_text)) !== false) {
                  $found = true;
                  break;
                }
              } else {
                  if (stripos ($paragraph_code, trim ($paragraph_text)) !== false) {
                    $found = true;
                    break;
                  }
                }
            }
            if (!$found) $filtered_paragraph_positions [] = $paragraph_position;
          }
      }

      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_TEXT;
    if (count ($paragraph_positions) == 0) return $content;


    if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
      $paragraph_positions = array_reverse ($paragraph_positions);
    }


    $position = trim ($this->get_paragraph_number());

    $positions = array ();
    if (!$position_preview) {
      if (strpos ($position, ',') !== false) {
        $positions = explode (',', str_replace (' ', '', $position));
        foreach ($positions as $index => $position) {
          if ($position > 0 && $position < 1) {
            $positions [$index] = intval ($position * (count ($paragraph_positions) - 1) + 0.5);
          }
          elseif ($position <= 0) {
            $positions [$index] = mt_rand (0, count ($paragraph_positions) - 1);
          }
        }
      }
      elseif ($position == '') {
        foreach ($paragraph_positions as $index => $paragraph_position) {
          $positions []= $index + 1;
        }

        if ($this->get_filter_type() == AI_FILTER_PARAGRAPHS) {
          $filter_settings = trim (str_replace (' ', '', $this->get_call_filter()));
          if (!empty ($filter_settings)) {

            $filter_values = array ();
            if (strpos ($filter_settings, ",") !== false) {
              $filter_values = explode (",", $filter_settings);
            } else $filter_values []= $filter_settings;

            $inverted_filter = $this->get_inverted_filter();
            $filtered_positions = array ();


            foreach ($positions as $index => $position) {
              $insert = false;
              if (in_array ($index + 1, $filter_values)) {
                $insert = true;
              } else {
                  foreach ($filter_values as $filter_value) {
                    $filter_value = trim ($filter_value);
                    if ($filter_value [0] == '%') {
                      $mod_value = substr ($filter_value, 1);
                      if (is_numeric ($mod_value) && $mod_value > 0) {
                        if (($index + 1) % $mod_value == 0) $insert = true;
                        break;
                      }
                    }
                  }
                }
              if ($insert xor $inverted_filter) $filtered_positions []= $position;
            }
            $positions = $filtered_positions;
          } else $positions = array ();
        }

      }
    }

    if (empty ($positions)) {
      if ($position > 0 && $position < 1) {
        $position = intval ($position * (count ($paragraph_positions) - 1) + 0.5);
      }
      elseif ($position <= 0) {
        $position = mt_rand (0, count ($paragraph_positions) - 1);
      } else $position --;


      $avoid_paragraphs_above = intval ($this->get_avoid_paragraphs_above());
      $avoid_paragraphs_below = intval ($this->get_avoid_paragraphs_below());

      if (($avoid_paragraphs_above != 0 || $avoid_paragraphs_below != 0) && count ($paragraph_positions) > $position) {
        $avoid_text_above = $this->get_avoid_text_above();
        $avoid_text_below = $this->get_avoid_text_below();
        $avoid_paragraph_texts_above = explode (",", html_entity_decode (trim ($avoid_text_above)));
        $avoid_paragraph_texts_below = explode (",", html_entity_decode (trim ($avoid_text_below)));

        $direction = $this->get_avoid_direction();
        $max_checks = $this->get_avoid_try_limit();

        $checks = $max_checks;
        $saved_position = $position;
        do {
          $found_above = false;
          if ($position != 0 && $avoid_paragraphs_above != 0 && $avoid_text_above != "" && is_array ($avoid_paragraph_texts_above) && count ($avoid_paragraph_texts_above) != 0) {
            $paragraph_position_above = $position - $avoid_paragraphs_above;
            if ($paragraph_position_above < 0) $paragraph_position_above = 0;

            if ($multibyte) {
              $paragraph_code = mb_substr ($content, $paragraph_positions [$paragraph_position_above], $paragraph_positions [$position] - $paragraph_positions [$paragraph_position_above]);
            } else {
                $paragraph_code = substr ($content, $paragraph_positions [$paragraph_position_above], $paragraph_positions [$position] - $paragraph_positions [$paragraph_position_above]);
              }

            foreach ($avoid_paragraph_texts_above as $paragraph_text_above) {
              if (trim ($paragraph_text_above) == '') continue;
              if ($multibyte) {
                if (mb_stripos ($paragraph_code, trim ($paragraph_text_above)) !== false) {
                  $found_above = true;
                  break;
                }
              } else {
                  if (stripos ($paragraph_code, trim ($paragraph_text_above)) !== false) {
                    $found_above = true;
                    break;
                  }
                }
            }
          }

          $found_below = false;
          if ($avoid_paragraphs_below != 0 && $avoid_text_below != "" && is_array ($avoid_paragraph_texts_below) && count ($avoid_paragraph_texts_below) != 0) {
            $paragraph_position_below = $position + $avoid_paragraphs_below;

            if ($multibyte) {
              if ($paragraph_position_below > count ($paragraph_positions) - 1)
                $content_position_below = mb_strlen ($content); else
                  $content_position_below = $paragraph_positions [$paragraph_position_below];
              $paragraph_code = mb_substr ($content, $paragraph_positions [$position], $content_position_below - $paragraph_positions [$position]);
            } else {
                if ($paragraph_position_below > count ($paragraph_positions) - 1)
                  $content_position_below = strlen ($content); else
                    $content_position_below = $paragraph_positions [$paragraph_position_below];
                $paragraph_code = substr ($content, $paragraph_positions [$position], $content_position_below - $paragraph_positions [$position]);
              }

            foreach ($avoid_paragraph_texts_below as $paragraph_text_below) {
              if (trim ($paragraph_text_below) == '') continue;

              if ($multibyte) {
                if (mb_stripos ($paragraph_code, trim ($paragraph_text_below)) !== false) {
                  $found_below = true;
                  break;
                }
              } else {
                  if (stripos ($paragraph_code, trim ($paragraph_text_below)) !== false) {
                    $found_below = true;
                    break;
                  }
                }
            }
          }


  //        echo "position: $position = before #", $position + 1, "<br />\n";
  //        echo "checks: $checks<br />\n";
  //        echo "direction: $direction<br />\n";
  //        if ($found_above)
  //        echo "found_above<br />\n";
  //        if ($found_below)
  //        echo "found_below<br />\n";
  //        echo "=================<br />\n";


          if ($found_above || $found_below) {
            $ai_last_check = AI_CHECK_DO_NOT_INSERT;
            if ($this->get_avoid_action() == AD_DO_NOT_INSERT) return $content;

            switch ($direction) {
              case AD_ABOVE: // Try above
                $ai_last_check = AI_CHECK_AD_ABOVE;
                if ($position == 0) return $content; // Already at the top - do not insert
                $position --;
                break;
              case AD_BELOW: // Try below
                $ai_last_check = AI_CHECK_AD_BELOW;
                if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
                $position ++;
                break;
              case AD_ABOVE_AND_THEN_BELOW: // Try first above and then below
                if ($position == 0 || $checks == 0) {
                  // Try below
                  $direction = AD_BELOW;
                  $checks = $max_checks;
                  $position = $saved_position;
                  $ai_last_check = AI_CHECK_AD_BELOW;
                  if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
                  $position ++;
                } else $position --;
                break;
              case AD_BELOW_AND_THEN_ABOVE: // Try first below and then above
                if ($position >= count ($paragraph_positions) - 1 || $checks == 0) {
                  // Try above
                  $direction = AD_ABOVE;
                  $checks = $max_checks;
                  $position = $saved_position;
                  $ai_last_check = AI_CHECK_AD_ABOVE;
                  if ($position == 0) return $content; // Already at the top - do not insert
                  $position --;
                } else $position ++;
                break;
            }
          } else break; // Text not found - insert

          // Try next position
          if ($checks <= 0) return $content; // Suitable position not found - do not insert
          $checks --;
        } while (true);
      }

      // Nothing to do
      $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE;
      if (count ($paragraph_positions) == 0) return $content;
    }

    if ($position_preview || !empty ($positions)) {
      $offset = 0;
      if (!empty ($positions)) $ai_last_check = AI_CHECK_PARAGRAPH_NUMBER;

      foreach ($paragraph_positions as $counter => $paragraph_position) {
        if ($position_preview) $inserted_code = "[[AI_BP".($counter + 1)."]]";
        elseif (!empty ($positions) && in_array ($counter + 1, $positions) && $this->check_block_counter ()) {
          $this->increment_block_counter ();
          $inserted_code = $this->get_code_for_insertion ();
          $ai_last_check = AI_CHECK_INSERTED;
        }
        else continue;

        if ($multibyte) {
          if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
            $content = mb_substr ($content, 0, $paragraph_position) . $inserted_code . mb_substr ($content, $paragraph_position);
          } else {
              $content = mb_substr ($content, 0, $paragraph_position + $offset) . $inserted_code . mb_substr ($content, $paragraph_position + $offset);
              $offset += mb_strlen ($inserted_code);
            }
        } else {
            if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
              $content = substr_replace ($content, $inserted_code, $paragraph_position, 0);
            } else {
                $content = substr_replace ($content, $inserted_code, $paragraph_position + $offset, 0);
                $offset += strlen ($inserted_code);
              }
          }
      }

      return $content;
    }

    $ai_last_check = AI_CHECK_PARAGRAPHS_MIN_NUMBER;
    if (count ($paragraph_positions) >= intval ($this->get_paragraph_number_minimum())) {
      $ai_last_check = AI_CHECK_PARAGRAPH_NUMBER;
      if (count ($paragraph_positions) > $position) {
        $this->increment_block_counter ();
        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $content_position = $paragraph_positions [$position];

          if ($multibyte) {
            $content = mb_substr ($content, 0, $content_position) . $this->get_code_for_insertion () . mb_substr ($content, $content_position);
          } else {
              $content = substr_replace ($content, $this->get_code_for_insertion (), $content_position, 0);
            }

          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
    }

    return $content;
  }

  public function after_paragraph ($content, $position_preview = false) {
    global $ai_wp_data, $ai_last_check, $special_element_tags;

    $no_closing_tag = array ('img', 'hr');

    $multibyte = get_paragraph_counting_functions() == AI_MULTIBYTE_PARAGRAPH_COUNTING_FUNCTIONS;

    $paragraph_positions = array ();

    if ($multibyte) {
      $last_content_position = mb_strlen ($content) - 1;
    } else {
        $last_content_position = strlen ($content) - 1;
      }

    $paragraph_tags = trim ($this->get_paragraph_tags());
    if ($paragraph_tags == '') return $content;

    $paragraph_end_strings = explode (",", $paragraph_tags);

    $ai_last_check = AI_CHECK_PARAGRAPH_TAGS;
    if (count ($paragraph_end_strings) == 0) return $content;

    foreach ($paragraph_end_strings as $paragraph_end_string) {

      $last_position = - 1;

      $paragraph_end_string = trim ($paragraph_end_string);
      if ($paragraph_end_string == '') continue;

      if (in_array ($paragraph_end_string, $no_closing_tag)) {
        if (preg_match_all ("/<$paragraph_end_string(.*?)>/", $content, $images)) {
          foreach ($images [0] as $paragraph_end) {
            if ($multibyte) {
              $last_position = mb_stripos ($content, $paragraph_end, $last_position + 1) + mb_strlen ($paragraph_end) - 1;
              $paragraph_positions [] = $last_position;
            } else {
                $last_position = stripos ($content, $paragraph_end, $last_position + 1) + strlen ($paragraph_end) - 1;
                $paragraph_positions [] = $last_position;
              }
          }
        }
        continue;
      }
      elseif ($paragraph_end_string == "#") {
        $paragraph_end = "\r\n\r\n";
        if (!in_array ($last_content_position, $paragraph_positions)) $paragraph_positions [] = $last_content_position;
      } else $paragraph_end = '</' . $paragraph_end_string . '>';

      if ($multibyte) {
        while (mb_stripos ($content, $paragraph_end, $last_position + 1) !== false) {
          $last_position = mb_stripos ($content, $paragraph_end, $last_position + 1) + mb_strlen ($paragraph_end) - 1;
          if ($paragraph_end_string == "#") $paragraph_positions [] = $last_position - 4; else
            $paragraph_positions [] = $last_position;
        }
      } else {
          while (stripos ($content, $paragraph_end, $last_position + 1) !== false) {
            $last_position = stripos ($content, $paragraph_end, $last_position + 1) + strlen ($paragraph_end) - 1;
            if ($paragraph_end_string == "#") $paragraph_positions [] = $last_position - 4; else
              $paragraph_positions [] = $last_position;
          }
        }
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_WITH_TAGS;
    if (count ($paragraph_positions) == 0) return $content;

    sort ($paragraph_positions);

    if (!$this->get_count_inside_blockquote ()) {

      $special_element_offsets = array ();

      foreach ($special_element_tags as $special_element_tag) {
        preg_match_all ("/<\/?$special_element_tag/i", $content, $special_elements, PREG_OFFSET_CAPTURE);

        $special_elements = $special_elements [0];
        foreach ($special_elements as $index => $special_element) {
          if (strtolower ($special_element [0]) == "<$special_element_tag" && isset ($special_elements [$index + 1][0]) && strtolower ($special_elements [$index + 1][0]) == "</$special_element_tag") {

            if ($multibyte) {
              $special_element_offsets []= array (mb_strlen (substr ($content, 0, $special_element [1])), mb_strlen (substr ($content, 0, $special_elements [$index + 1][1])));
            } else {
                $special_element_offsets []= array ($special_element [1], $special_elements [$index + 1][1]);
              }

          }
        }
      }

      if (count ($special_element_offsets) != 0) {

        $filtered_paragraph_positions = array ();
        $inside_special_element = array ();

        foreach ($special_element_offsets as $special_element_offset) {
          foreach ($paragraph_positions as $paragraph_position) {
            if ($paragraph_position >= $special_element_offset [0] && $paragraph_position <= $special_element_offset [1]) $inside_special_element [] = $paragraph_position;
          }
        }

        foreach ($paragraph_positions as $paragraph_position) {
          if (!in_array ($paragraph_position, $inside_special_element)) $filtered_paragraph_positions []= $paragraph_position;
        }

        $paragraph_positions = $filtered_paragraph_positions;
      }

      $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE_FIGURE;
      if (count ($paragraph_positions) == 0) return $content;
    }

    $paragraph_min_words = intval ($this->get_minimum_paragraph_words());
    $paragraph_max_words = intval ($this->get_maximum_paragraph_words());

    if ($paragraph_min_words != 0 || $paragraph_max_words != 0) {
      $filtered_paragraph_positions = array ();
      foreach ($paragraph_positions as $index => $paragraph_position) {

        if ($multibyte) {
          $paragraph_code = $index == 0 ? mb_substr ($content, 0, $paragraph_position + 1) : mb_substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
        } else {
            $paragraph_code = $index == 0 ? substr ($content, 0, $paragraph_position + 1) : substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
          }

        if ($this->check_number_of_words_in_paragraph ($paragraph_code, $paragraph_min_words, $paragraph_max_words)) $filtered_paragraph_positions [] = $paragraph_position;
      }
      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS;
    if (count ($paragraph_positions) == 0) return $content;


    $paragraph_texts = explode (",", html_entity_decode ($this->get_paragraph_text()));
    if ($this->get_paragraph_text() != "" && count ($paragraph_texts) != 0) {

      $filtered_paragraph_positions = array ();
      $paragraph_text_type = $this->get_paragraph_text_type ();

      foreach ($paragraph_positions as $index => $paragraph_position) {

        if ($multibyte) {
          $paragraph_code = $index == 0 ? mb_substr ($content, 0, $paragraph_position + 1) : mb_substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
        } else {
            $paragraph_code = $index == 0 ? substr ($content, 0, $paragraph_position + 1) : substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
          }

        if ($paragraph_text_type == AD_CONTAIN) {
          $found = true;
          foreach ($paragraph_texts as $paragraph_text) {
            if (trim ($paragraph_text) == '') continue;

            if ($multibyte) {
              if (mb_stripos ($paragraph_code, trim ($paragraph_text)) === false) {
                $found = false;
                break;
              }
            } else {
                if (stripos ($paragraph_code, trim ($paragraph_text)) === false) {
                  $found = false;
                  break;
                }
              }

          }
          if ($found) $filtered_paragraph_positions [] = $paragraph_position;
        } elseif ($paragraph_text_type == AD_DO_NOT_CONTAIN) {
            $found = false;
            foreach ($paragraph_texts as $paragraph_text) {
              if (trim ($paragraph_text) == '') continue;

              if ($multibyte) {
                if (mb_stripos ($paragraph_code, trim ($paragraph_text)) !== false) {
                  $found = true;
                  break;
                }
              } else {
                  if (stripos ($paragraph_code, trim ($paragraph_text)) !== false) {
                    $found = true;
                    break;
                  }
                }

            }
            if (!$found) $filtered_paragraph_positions [] = $paragraph_position;
          }
      }

      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_TEXT;
    if (count ($paragraph_positions) == 0) return $content;


    if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
      $paragraph_positions = array_reverse ($paragraph_positions);
    }


    $position = $this->get_paragraph_number();

    $positions = array ();
    if (!$position_preview) {
      if (strpos ($position, ',') !== false) {
        $positions = explode (',', str_replace (' ', '', $position));
        foreach ($positions as $index => $position) {
          if ($position > 0 && $position < 1) {
            $positions [$index] = intval ($position * (count ($paragraph_positions) - 1) + 0.5);
          }
          elseif ($position <= 0) {
            $positions [$index] = mt_rand (0, count ($paragraph_positions) - 1);
          }
        }
      }
      elseif ($position == '') {

        $min_words_above = $this->get_minimum_words_above ();
        if (!empty ($min_words_above)) {
          $words_above = 0;
          foreach ($paragraph_positions as $index => $paragraph_position) {

            if ($multibyte) {
              $paragraph_code = $index == 0 ? mb_substr ($content, 0, $paragraph_position + 1) : mb_substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
            } else {
                $paragraph_code = $index == 0 ? substr ($content, 0, $paragraph_position + 1) : substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
              }

            $words_above += number_of_words ($paragraph_code);
            if ($words_above >= $min_words_above) {
              $positions []= $index + 1;
              $words_above = 0;
            }

          }
        } else
        foreach ($paragraph_positions as $index => $paragraph_position) {
          $positions []= $index + 1;
        }

        if ($this->get_filter_type() == AI_FILTER_PARAGRAPHS) {
          $filter_settings = trim (str_replace (' ', '', $this->get_call_filter()));
          if (!empty ($filter_settings)) {
            $filter_values = array ();
            if (strpos ($filter_settings, ",") !== false) {
              $filter_values = explode (",", $filter_settings);
            } else $filter_values []= $filter_settings;

            $inverted_filter = $this->get_inverted_filter();
            $filtered_positions = array ();

            foreach ($positions as $index => $position) {
              $insert = false;
              if (in_array ($index + 1, $filter_values)) {
                $insert = true;
              } else {
                  foreach ($filter_values as $filter_value) {
                    $filter_value = trim ($filter_value);
                    if ($filter_value [0] == '%') {
                      $mod_value = substr ($filter_value, 1);
                      if (is_numeric ($mod_value) && $mod_value > 0) {
                        if (($index + 1) % $mod_value == 0) $insert = true;
                      }
                    }
                  }
                }
              if ($insert xor $inverted_filter) $filtered_positions []= $position;
            }
            $positions = $filtered_positions;
          } else $positions = array ();
        }

      }

    }

    if (empty ($positions)) {
      if ($position > 0 && $position < 1) {
        $position = intval ($position * (count ($paragraph_positions) - 1) + 0.5);
      }
      elseif ($position <= 0) {
        $position = mt_rand (0, count ($paragraph_positions) - 1);
      } else $position --;


      $avoid_paragraphs_above = intval ($this->get_avoid_paragraphs_above());
      $avoid_paragraphs_below = intval ($this->get_avoid_paragraphs_below());

      if (($avoid_paragraphs_above != 0 || $avoid_paragraphs_below != 0) && count ($paragraph_positions) > $position) {
        $avoid_text_above = $this->get_avoid_text_above();
        $avoid_text_below = $this->get_avoid_text_below();
        $avoid_paragraph_texts_above = explode (",", html_entity_decode (trim ($avoid_text_above)));
        $avoid_paragraph_texts_below = explode (",", html_entity_decode (trim ($avoid_text_below)));

        $direction = $this->get_avoid_direction();
        $max_checks = $this->get_avoid_try_limit();

        $checks = $max_checks;
        $saved_position = $position;
        do {
          $found_above = false;
          if ($avoid_paragraphs_above != 0 && $avoid_text_above != "" && is_array ($avoid_paragraph_texts_above) && count ($avoid_paragraph_texts_above) != 0) {
            $paragraph_position_above = $position - $avoid_paragraphs_above;
            if ($paragraph_position_above <= 0)
              $content_position_above = 0; else
                $content_position_above = $paragraph_positions [$paragraph_position_above] + 1;

            if ($multibyte) {
              $paragraph_code = mb_substr ($content, $content_position_above, $paragraph_positions [$position] - $content_position_above);
            } else {
                $paragraph_code = substr ($content, $content_position_above, $paragraph_positions [$position] - $content_position_above);
              }

            foreach ($avoid_paragraph_texts_above as $paragraph_text_above) {
              if (trim ($paragraph_text_above) == '') continue;

              if ($multibyte) {
                if (mb_stripos ($paragraph_code, trim ($paragraph_text_above)) !== false) {
                  $found_above = true;
                  break;
                }
              } else {
                  if (stripos ($paragraph_code, trim ($paragraph_text_above)) !== false) {
                    $found_above = true;
                    break;
                  }
                }

            }
          }

          $found_below = false;
          if ($avoid_paragraphs_below != 0 && $position != count ($paragraph_positions) - 1 && $avoid_text_below != "" && is_array ($avoid_paragraph_texts_below) && count ($avoid_paragraph_texts_below) != 0) {
            $paragraph_position_below = $position + $avoid_paragraphs_below;

            if ($multibyte) {
              if ($paragraph_position_below > count ($paragraph_positions) - 1) $paragraph_position_below = count ($paragraph_positions) - 1;
                $paragraph_code = mb_substr ($content, $paragraph_positions [$position] + 1, $paragraph_positions [$paragraph_position_below] - $paragraph_positions [$position]);
            } else {
                if ($paragraph_position_below > count ($paragraph_positions) - 1) $paragraph_position_below = count ($paragraph_positions) - 1;
                  $paragraph_code = substr ($content, $paragraph_positions [$position] + 1, $paragraph_positions [$paragraph_position_below] - $paragraph_positions [$position]);
              }

            foreach ($avoid_paragraph_texts_below as $paragraph_text_below) {
              if (trim ($paragraph_text_below) == '') continue;

              if ($multibyte) {
                if (mb_stripos ($paragraph_code, trim ($paragraph_text_below)) !== false) {
                  $found_below = true;
                  break;
                }
              } else {
                  if (stripos ($paragraph_code, trim ($paragraph_text_below)) !== false) {
                    $found_below = true;
                    break;
                  }
                }

            }
          }


  //        echo "position: $position = after #", $position + 1, "<br />\n";
  //        echo "checks: $checks<br />\n";
  //        echo "direction: $direction<br />\n";
  //        if ($found_above)
  //        echo "found_above<br />\n";
  //        if ($found_below)
  //        echo "found_below<br />\n";
  //        echo "=================<br />\n";


          if ($found_above || $found_below) {
            $ai_last_check = AI_CHECK_DO_NOT_INSERT;
            if ($this->get_avoid_action() == AD_DO_NOT_INSERT) return $content;

            switch ($direction) {
              case AD_ABOVE: // Try above
                $ai_last_check = AI_CHECK_AD_ABOVE;
                if ($position == 0) return $content; // Already at the top - do not insert
                $position --;
                break;
              case AD_BELOW: // Try below
                $ai_last_check = AI_CHECK_AD_BELOW;
                if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
                $position ++;
                break;
              case AD_ABOVE_AND_THEN_BELOW: // Try first above and then below
                if ($position == 0 || $checks == 0) {
                  // Try below
                  $direction = AD_BELOW;
                  $checks = $max_checks;
                  $position = $saved_position;
                  $ai_last_check = AI_CHECK_AD_BELOW;
                  if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
                  $position ++;
                } else $position --;
                break;
              case AD_BELOW_AND_THEN_ABOVE: // Try first below and then above
                if ($position >= count ($paragraph_positions) - 1 || $checks == 0) {
                  // Try above
                  $direction = AD_ABOVE;
                  $checks = $max_checks;
                  $position = $saved_position;
                  $ai_last_check = AI_CHECK_AD_ABOVE;
                  if ($position == 0) return $content; // Already at the top - do not insert
                  $position --;
                } else $position ++;
                break;
            }
          } else break; // Text not found - insert

          // Try next position
          if ($checks <= 0) return $content; // Suitable position not found - do not insert
          $checks --;
        } while (true);
      }

      // Nothing to do
      $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE;
      if (count ($paragraph_positions) == 0) return $content;
    }


    if ($position_preview || !empty ($positions)) {
      $offset = 0;
      if (!empty ($positions)) $ai_last_check = AI_CHECK_PARAGRAPH_NUMBER;

      foreach ($paragraph_positions as $counter => $paragraph_position) {
        if ($position_preview) $inserted_code = "[[AI_AP".($counter + 1)."]]";
        elseif (!empty ($positions) && in_array ($counter + 1, $positions) && $this->check_block_counter ()) {
          $this->increment_block_counter ();
          $inserted_code = $this->get_code_for_insertion ();
          $ai_last_check = AI_CHECK_INSERTED;
        }
        else continue;

        if ($multibyte) {
          if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
            $content = mb_substr ($content, 0, $paragraph_position + 1) . $inserted_code . mb_substr ($content, $paragraph_position + 1);
          } else {
              $content = mb_substr ($content, 0, $paragraph_position + $offset + 1) . $inserted_code . mb_substr ($content, $paragraph_position + $offset + 1);
              $offset += mb_strlen ($inserted_code);
            }
        } else {
            if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
              $content = substr_replace ($content, $inserted_code, $paragraph_position + 1, 0);
            } else {
                $content = substr_replace ($content, $inserted_code, $paragraph_position + $offset + 1, 0);
                $offset += strlen ($inserted_code);
              }
          }

      }

      return $content;
    }

    $ai_last_check = AI_CHECK_PARAGRAPHS_MIN_NUMBER;
    if (count ($paragraph_positions) >= intval ($this->get_paragraph_number_minimum())) {
      $ai_last_check = AI_CHECK_PARAGRAPH_NUMBER;
      if (count ($paragraph_positions) > $position) {
        $this->increment_block_counter ();
        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $content_position = $paragraph_positions [$position];

          if ($multibyte) {
            if ($content_position >= mb_strlen ($content) - 1)
              $content = $content . $this->get_code_for_insertion (); else
                $content = mb_substr ($content, 0, $content_position + 1) . $this->get_code_for_insertion () . mb_substr ($content, $content_position + 1);
          } else {
              if ($content_position >= strlen ($content) - 1)
                $content = $content . $this->get_code_for_insertion (); else
                  $content = substr_replace ($content, $this->get_code_for_insertion (), $content_position + 1, 0);
            }

          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
    }

    return $content;
  }


//  Deprecated
  function manual ($content){

    if (preg_match_all("/{adinserter (.+?)}/", $content, $tags)){

      $block_class_name = get_block_class_name ();
      $viewport_classes = $this->get_viewport_classes ();
      if ($block_class_name != '' || $viewport_classes != '') {
        if ($block_class_name =='') $viewport_classes = trim ($viewport_classes);
        $class = " class='" . ($block_class_name != '' ? $block_class_name . " " . $block_class_name . "-" . $this->number : '') . $viewport_classes ."'";
      } else $class = '';

//      $display_for_devices = $this->get_display_for_devices ();

      foreach ($tags [1] as $tag) {
         $ad_tag = strtolower (trim ($tag));
         $ad_name = strtolower (trim ($this->get_ad_name()));
         if ($ad_tag == $ad_name || $ad_tag == $this->number) {
          if ($this->get_alignment_type() == AI_ALIGNMENT_NO_WRAPPING) $ad_code = $this->ai_getProcessedCode (); else
            $ad_code = "<div" . $class . " style='" . $this->get_alignment_style() . "'>" . $this->ai_getProcessedCode () . "</div>";
          $content = preg_replace ("/{adinserter " . $tag . "}/", $ad_code, $content);
         }
      }
    }

    return $content;
  }

//  Deprecated
  function display_disabled ($content){

    $ad_name = $this->get_ad_name();

    if (preg_match ("/<!-- +Ad +Inserter +Ad +".($this->number)." +Disabled +-->/i", $content)) return true;

    if (preg_match ("/<!-- +disable +adinserter +\* +-->/i", $content)) return true;

    if (preg_match ("/<!-- +disable +adinserter +".($this->number)." +-->/i", $content)) return true;

    if (strpos ($content, "<!-- disable adinserter " . $ad_name . " -->") != false) return true;

    return false;
  }

  function check_category () {
    global $ai_wp_data;

    $categories = trim (strtolower ($this->get_ad_block_cat()));
    $cat_type = $this->get_ad_block_cat_type();

    $wp_categories = get_the_category ();

    if ($cat_type == AD_BLACK_LIST) {

      if($categories == AD_EMPTY_DATA) return true;

      $cats_listed = explode (",", $categories);

      foreach ($wp_categories as $wp_category) {

        foreach ($cats_listed as $cat_disabled){

          $cat_disabled = trim ($cat_disabled);

          $wp_category_name = strtolower ($wp_category->cat_name);
          $wp_category_slug = strtolower ($wp_category->slug);

          if ($wp_category_name == $cat_disabled || $wp_category_slug == $cat_disabled) {
            return false;
          } else {
            }
        }
      }
      return true;

    } else {

        if ($categories == AD_EMPTY_DATA) return false;

        $cats_listed = explode (",", $categories);

        foreach ($wp_categories as $wp_category) {

          foreach ($cats_listed as $cat_enabled) {

            $cat_enabled = trim ($cat_enabled);

            $wp_category_name = strtolower ($wp_category->cat_name);
            $wp_category_slug = strtolower ($wp_category->slug);

            if ($wp_category_name == $cat_enabled || $wp_category_slug == $cat_enabled) {
              return true;
            } else {
              }
          }
        }
        return false;
      }
  }

  function check_tag () {

    $tags = $this->get_ad_block_tag();
    $tag_type = $this->get_ad_block_tag_type();

//    $tags = trim (strtolower ($tags));
    $tags = trim ($tags);
    $tags_listed = explode (",", $tags);
    foreach ($tags_listed as $index => $tag_listed) {
      $tags_listed [$index] = trim ($tag_listed);
    }
    $has_any_of_the_given_tags = has_tag ($tags_listed);

    if ($tag_type == AD_BLACK_LIST) {

      if ($tags == AD_EMPTY_DATA) return true;

      if (is_tag()) {
        foreach ($tags_listed as $tag_listed) {
          if (is_tag ($tag_listed)) return false;
        }
        return true;
      }

      return !$has_any_of_the_given_tags;

    } else {

        if ($tags == AD_EMPTY_DATA) return false;

        if (is_tag()) {
          foreach ($tags_listed as $tag_listed) {
            if (is_tag ($tag_listed)) return true;
          }
          return false;
        }

        return $has_any_of_the_given_tags;
      }
  }

  function check_taxonomy () {

    $taxonomies = trim (strtolower ($this->get_ad_block_taxonomy()));
    $taxonomy_type = $this->get_ad_block_taxonomy_type();

    if ($taxonomy_type == AD_BLACK_LIST) {

      if ($taxonomies == AD_EMPTY_DATA) return true;

      $taxonomies_listed = explode (",", $taxonomies);
      $taxonomy_names = get_post_taxonomies ();

      foreach ($taxonomies_listed as $taxonomy_disabled) {
        $taxonomy_disabled = trim ($taxonomy_disabled);

        if (strpos ($taxonomy_disabled, 'user:') === 0) {
          $current_user = wp_get_current_user();
          $terms = explode (':', $taxonomy_disabled);
          if ($terms [1] == $current_user->user_login) return false;
        }
        elseif (strpos ($taxonomy_disabled, 'user-role:') === 0) {
          $current_user = wp_get_current_user();
          $terms = explode (':', $taxonomy_disabled);
          foreach (wp_get_current_user()->roles as $role) {
            if ($terms [1] == $role) return false;
          }
        }
        elseif (strpos ($taxonomy_disabled, 'post-type:') === 0) {
          $post_type = get_post_type ();
          $terms = explode (':', $taxonomy_disabled);
          if ($terms [1] == $post_type) return false;
        }

        foreach ($taxonomy_names as $taxonomy_name) {
          $terms = get_the_terms (0, $taxonomy_name);
          if (is_array ($terms)) {
            foreach ($terms as $term) {
              $post_term_name = strtolower ($term->name);
              $post_term_slug = strtolower ($term->slug);
              $post_taxonomy  = strtolower ($term->taxonomy);

              if ($post_term_name == $taxonomy_disabled || $post_term_slug == $taxonomy_disabled) return false;

              $post_taxonomy  = strtolower ($term->taxonomy);
              if ($post_taxonomy == $taxonomy_disabled) return false;

              if ($post_taxonomy . ':' . $post_term_slug == $taxonomy_disabled) return false;
            }
          }
        }
      }

      return true;

    } else {

        if ($taxonomies == AD_EMPTY_DATA) return false;

        $taxonomies_listed = explode (",", $taxonomies);
        $taxonomy_names = get_post_taxonomies ();

        foreach ($taxonomies_listed as $taxonomy_enabled) {
          $taxonomy_enabled = trim ($taxonomy_enabled);

          if (strpos ($taxonomy_enabled, 'user:') === 0) {
            $current_user = wp_get_current_user();
            $terms = explode (':', $taxonomy_enabled);
            if ($terms [1] == $current_user->user_login) return true;
          }
          elseif (strpos ($taxonomy_enabled, 'user-role:') === 0) {
            $current_user = wp_get_current_user();
            $terms = explode (':', $taxonomy_enabled);
            foreach (wp_get_current_user()->roles as $role) {
              if ($terms [1] == $role) return true;
            }
          }
          elseif (strpos ($taxonomy_enabled, 'post-type:') === 0) {
            $post_type = get_post_type ();
            $terms = explode (':', $taxonomy_enabled);
            if ($terms [1] == $post_type) return true;
          }

          foreach ($taxonomy_names as $taxonomy_name) {
            $terms = get_the_terms (0, $taxonomy_name);
            if (is_array ($terms)) {
              foreach ($terms as $term) {
                $post_term_name = strtolower ($term->name);
                $post_term_slug = strtolower ($term->slug);
                $post_taxonomy  = strtolower ($term->taxonomy);

                if ($post_term_name == $taxonomy_enabled || $post_term_slug == $taxonomy_enabled) return true;

                $post_taxonomy  = strtolower ($term->taxonomy);
                if ($post_taxonomy == $taxonomy_enabled) return true;

                if ($post_taxonomy . ':' . $post_term_slug == $taxonomy_enabled) return true;
              }
            }
          }
        }

        return false;
      }
  }

  function check_id () {
    global $ai_wp_data;

    $page_id = get_the_ID();

    $ids = trim ($this->get_id_list());
    $id_type = $this->get_id_list_type();

    if ($id_type == AD_BLACK_LIST) $return = false; else $return = true;

    if ($ids == AD_EMPTY_DATA || $page_id === false) {
      return !$return;
    }

    $ids_listed = explode (",", $ids);
    foreach ($ids_listed as $index => $id_listed) {
      if (trim ($id_listed) == "") unset ($ids_listed [$index]); else
        $ids_listed [$index] = trim ($id_listed);
    }

//    print_r ($ids_listed);
//    echo "<br />\n";
//    echo ' page id: ' . $page_id, "<br />\n";
//    echo ' listed ids: ' . $ids, "\n";
//    echo "<br />\n";

    if (in_array ($page_id, $ids_listed)) return $return;

    return !$return;
  }

  function check_url () {
    global $ai_wp_data;

    $page_url = $ai_wp_data [AI_WP_URL];

    $urls = trim ($this->get_ad_url_list());
    $url_type = $this->get_ad_url_list_type();

    if ($url_type == AD_BLACK_LIST) $return = false; else $return = true;

    if ($urls == AD_EMPTY_DATA) return !$return;

    $urls_listed = explode (" ", $urls);
    foreach ($urls_listed as $index => $url_listed) {
      if (trim ($url_listed) == "") unset ($urls_listed [$index]); else
        $urls_listed [$index] = trim ($url_listed);
    }

  //  print_r ($urls_listed);
  //  echo "<br />\n";
  //  echo ' page url: ' . $page_url, "<br />\n";
  //  echo ' listed urls: ' . $urls, "\n";
  //  echo "<br />\n";

    foreach ($urls_listed as $url_listed) {
      if ($url_listed == '*') return $return;

      if ($url_listed [0] == '*') {
        if ($url_listed [strlen ($url_listed) - 1] == '*') {
          $url_listed = substr ($url_listed, 1, strlen ($url_listed) - 2);
          if (strpos ($page_url, $url_listed) !== false) return $return;
        } else {
            $url_listed = substr ($url_listed, 1);
            if (substr ($page_url, - strlen ($url_listed)) == $url_listed) return $return;
          }
      }
      elseif ($url_listed [strlen ($url_listed) - 1] == '*') {
        $url_listed = substr ($url_listed, 0, strlen ($url_listed) - 1);
        if (strpos ($page_url, $url_listed) === 0) return $return;
      }
      elseif ($url_listed == $page_url) return $return;
    }
    return !$return;
  }

  function check_url_parameters () {
    global $ai_wp_data;

    $parameter_list = trim ($this->get_url_parameter_list());
    $parameter_list_type = $this->get_url_parameter_list_type();

    if ($parameter_list_type == AD_BLACK_LIST) $return = false; else $return = true;

    $parameters = array_merge ($_COOKIE, $_GET);

    if ($parameter_list == AD_EMPTY_DATA || count ($parameters) == 0) {
      return !$return;
    }

    $parameters_listed = explode (",", $parameter_list);
    foreach ($parameters_listed as $index => $parameter_listed) {
      if (trim ($parameter_listed) == "") unset ($parameters_listed [$index]); else
        $parameters_listed [$index] = trim ($parameter_listed);
    }

//    print_r ($parameter_listed);
//    echo "<br />\n";
//    echo " parameters: <br />\n";
//    print_r ($_GET);
//    echo ' listed parameters: ' . $parameter_list, "\n";
//    echo "<br />\n";

    foreach ($parameters_listed as $parameter) {
      if (strpos ($parameter, "=") !== false) {
        $parameter_value = explode ("=", $parameter);
        if (array_key_exists ($parameter_value [0], $parameters) && $parameters [$parameter_value [0]] == $parameter_value [1]) return $return;
      } else if (array_key_exists ($parameter, $parameters)) return $return;
    }

    return !$return;
  }

  function check_scheduling () {

    switch ($this->get_scheduling()) {
      case AI_SCHEDULING_OFF:
        return true;
        break;

      case AI_SCHEDULING_DELAY:
        $after_days = trim ($this->get_ad_after_day());
        if ($after_days == '') return true;
        $after_days = intval ($after_days);
        if ($after_days == AD_ZERO) return true;

        $post_date = get_the_date ('U');
        if ($post_date === false) return true;

        return (date ('U', current_time ('timestamp')) >= $post_date + $after_days * 86400);
        break;

      case AI_SCHEDULING_BETWEEN_DATES:
        if (!function_exists ('ai_scheduling_options')) return true;

        $current_time = current_time ('timestamp');
        $start_date   = strtotime ($this->get_schedule_start_date(), $current_time);
        $end_date     = strtotime ($this->get_schedule_end_date(), $current_time);

        $insertion_enabled = $current_time >= $start_date && $current_time < $end_date;

        if (!$insertion_enabled) {
          $fallback = intval ($this->get_fallback());
          if ($fallback != 0 && $fallback <= AD_INSERTER_BLOCKS) {
            $this->fallback = $fallback;
            return true;
          }
        }

        return ($insertion_enabled);
        break;

      default:
        return true;
        break;
    }
  }

  function check_referer () {

    $domain_list_type = $this->get_ad_domain_list_type ();

    if (isset ($_SERVER['HTTP_REFERER'])) {
        $referer_host = strtolower (parse_url ($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
    } else $referer_host = '';

    if ($domain_list_type == AD_BLACK_LIST) $return = false; else $return = true;

    $domains = strtolower (trim ($this->get_ad_domain_list ()));
    if ($domains == AD_EMPTY_DATA) return !$return;
    $domains = explode (",", $domains);

    foreach ($domains as $domain) {
      $domain = trim ($domain);
      if ($domain == "") continue;

      if ($domain == "#") {
        if ($referer_host == "") return $return;
      } elseif ($domain == $referer_host) return $return;
    }
    return !$return;
  }

  function check_number_of_words (&$content = null, $number_of_words = 0) {
    global $ai_last_check, $ai_wp_data;

    $minimum_words = intval ($this->get_minimum_words());
    $maximum_words = intval ($this->get_maximum_words());

    if ($minimum_words == 0 && $maximum_words == 0) return true;

    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
      if ($number_of_words == 0) {
        if (!isset ($ai_wp_data [AI_WORD_COUNT])) {
          if ($content === null) {
            $content = '';
            $content_post = get_post ();
            if (isset ($content_post->post_content)) $content = $content_post->post_content;
          }

          $number_of_words = number_of_words ($content);
        } else $number_of_words = $ai_wp_data [AI_WORD_COUNT];
      }
    } else $number_of_words = 0;
    $ai_wp_data [AI_WORD_COUNT] = $number_of_words;

    $ai_last_check = AI_CHECK_MIN_NUMBER_OF_WORDS;
    if ($number_of_words < $minimum_words) return false;

    if ($maximum_words <= 0) $maximum_words = 1000000;

    $ai_last_check = AI_CHECK_MAX_NUMBER_OF_WORDS;
    if ($number_of_words > $maximum_words) return false;

    return true;
  }

  function check_number_of_words_in_paragraph ($content, $min, $max) {

    $number_of_words = number_of_words ($content);

    if ($max <= 0) $max = 1000000;

    if ($number_of_words < $min || $number_of_words > $max) return false;

    return true;
  }

  function check_page_types_lists_users ($ignore_page_types = false) {
    global $ai_last_check, $ai_wp_data;

    if (!$ignore_page_types) {
      if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_HOMEPAGE){
         $ai_last_check = AI_CHECK_PAGE_TYPE_FRONT_PAGE;
         if (!$this->get_display_settings_home()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC){
         $ai_last_check = AI_CHECK_PAGE_TYPE_STATIC_PAGE;
         if (!$this->get_display_settings_page()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST){
         $ai_last_check = AI_CHECK_PAGE_TYPE_POST;
         if (!$this->get_display_settings_post()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_CATEGORY){
         $ai_last_check = AI_CHECK_PAGE_TYPE_CATEGORY;
         if (!$this->get_display_settings_category()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_SEARCH){
         $ai_last_check = AI_CHECK_PAGE_TYPE_SEARCH;
         if (!$this->get_display_settings_search()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ARCHIVE){
         $ai_last_check = AI_CHECK_PAGE_TYPE_ARCHIVE;
         if (!$this->get_display_settings_archive()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_FEED){
         $ai_last_check = AI_CHECK_PAGE_TYPE_FEED;
        if (!$this->get_enable_feed()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_404){
         $ai_last_check = AI_CHECK_PAGE_TYPE_404;
        if (!$this->get_enable_404()) return false;
      }
    }

    $ai_last_check = AI_CHECK_CATEGORY;
    if (!$this->check_category ()) return false;

    $ai_last_check = AI_CHECK_TAG;
    if (!$this->check_tag ()) return false;

    $ai_last_check = AI_CHECK_TAXONOMY;
    if (!$this->check_taxonomy ()) return false;

    $ai_last_check = AI_CHECK_ID;
    if (!$this->check_id ()) return false;

    $ai_last_check = AI_CHECK_URL;
    if (!$this->check_url ()) return false;

    $ai_last_check = AI_CHECK_URL_PARAMETER;
    if (!$this->check_url_parameters ()) return false;

    $ai_last_check = AI_CHECK_REFERER;
    if (!$this->check_referer ()) return false;

    if (function_exists ('ai_check_lists')) {
      if (!ai_check_lists ($this)) return false;
    }

    $ai_last_check = AI_CHECK_SCHEDULING;
    if (!$this->check_scheduling ()) return false;

    $display_for_users = $this->get_display_for_users ();

    $ai_last_check = AI_CHECK_LOGGED_IN_USER;
    if ($display_for_users == AD_DISPLAY_LOGGED_IN_USERS && ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != AI_USER_LOGGED_IN) return false;
    $ai_last_check = AI_CHECK_NOT_LOGGED_IN_USER;
    if ($display_for_users == AD_DISPLAY_NOT_LOGGED_IN_USERS && ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) == AI_USER_LOGGED_IN) return false;
    $ai_last_check = AI_CHECK_ADMINISTRATOR;
    if ($display_for_users == AD_DISPLAY_ADMINISTRATORS && ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != AI_USER_ADMINISTRATOR) return false;

    return true;
  }

  function check_post_page_exceptions ($selected_blocks) {
    global $ai_last_check, $ai_wp_data;

    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST) {
      $enabled_on = $this->get_ad_enabled_on_which_posts ();
      if ($enabled_on == AI_INDIVIDUALLY_DISABLED) {
        $ai_last_check = AI_CHECK_INDIVIDUALLY_DISABLED;
        if (in_array ($this->number, $selected_blocks)) return false;
      }
      elseif ($enabled_on == AI_INDIVIDUALLY_ENABLED) {
        $ai_last_check = AI_CHECK_INDIVIDUALLY_ENABLED;
        if (!in_array ($this->number, $selected_blocks)) return false;
      }
    } elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
      $enabled_on = $this->get_ad_enabled_on_which_pages ();
      if ($enabled_on == AI_INDIVIDUALLY_DISABLED) {
        $ai_last_check = AI_CHECK_INDIVIDUALLY_DISABLED;
        if (in_array ($this->number, $selected_blocks)) return false;
      }
      elseif ($enabled_on == AI_INDIVIDUALLY_ENABLED) {
        $ai_last_check = AI_CHECK_INDIVIDUALLY_ENABLED;
        if (!in_array ($this->number, $selected_blocks)) return false;
      }
    }
    return true;
  }

  function check_filter ($counter_for_filter) {
    global $ai_last_check, $ad_inserter_globals, $page;

    $filter_ok = $this->get_inverted_filter() ? false : true;

    $ai_last_check = AI_CHECK_FILTER;
    $filter_settings = trim (str_replace (' ', '', $this->get_call_filter()));
    if (empty ($filter_settings)) return $filter_ok;

    switch ($this->get_filter_type ()) {
      case AI_FILTER_PHP_FUNCTION_CALLS:
        if (isset ($ad_inserter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number]))
          $counter_for_filter = $ad_inserter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number]; else return !$filter_ok;
        break;
      case AI_FILTER_CONTENT_PROCESSING:
        if (isset ($ad_inserter_globals [AI_CONTENT_COUNTER_NAME]))
          $counter_for_filter = $ad_inserter_globals [AI_CONTENT_COUNTER_NAME]; else return !$filter_ok;
        break;
      case AI_FILTER_EXCERPT_PROCESSING:
        if (isset ($ad_inserter_globals [AI_EXCERPT_COUNTER_NAME]))
          $counter_for_filter = $ad_inserter_globals [AI_EXCERPT_COUNTER_NAME]; else return !$filter_ok;
        break;
      case AI_FILTER_BEFORE_POST_PROCESSING:
        if (isset ($ad_inserter_globals [AI_LOOP_BEFORE_COUNTER_NAME]))
          $counter_for_filter = $ad_inserter_globals [AI_LOOP_BEFORE_COUNTER_NAME]; else return !$filter_ok;
        break;
      case AI_FILTER_AFTER_POST_PROCESSING:
        if (isset ($ad_inserter_globals [AI_LOOP_AFTER_COUNTER_NAME]))
          $counter_for_filter = $ad_inserter_globals [AI_LOOP_AFTER_COUNTER_NAME]; else return !$filter_ok;
        break;
      case AI_FILTER_WIDGET_DRAWING:
        if (isset ($ad_inserter_globals [AI_WIDGET_COUNTER_NAME . $this->number]))
          $counter_for_filter = $ad_inserter_globals [AI_WIDGET_COUNTER_NAME . $this->number]; else return !$filter_ok;
        break;
      case AI_FILTER_SUBPAGES:
        if (isset ($page))
          $counter_for_filter = $page; else return !$filter_ok;
        break;
      case AI_FILTER_POSTS:
        if (isset ($ad_inserter_globals [AI_POST_COUNTER_NAME]))
          $counter_for_filter = $ad_inserter_globals [AI_POST_COUNTER_NAME]; else return !$filter_ok;
        break;
      case AI_FILTER_PARAGRAPHS:
          return true;
        break;
      case AI_FILTER_COMMENTS:
        if (isset ($ad_inserter_globals [AI_COMMENT_COUNTER_NAME]))
          $counter_for_filter = $ad_inserter_globals [AI_COMMENT_COUNTER_NAME]; else return !$filter_ok;
        break;
    }

    $filter_values = array ();
    if (strpos ($filter_settings, ",") !== false) {
      $filter_values = explode (",", $filter_settings);
    } else $filter_values []= $filter_settings;

    foreach ($filter_values as $filter_value) {
      $filter_value = trim ($filter_value);
      if ($filter_value [0] == '%') {
        $mod_value = substr ($filter_value, 1);
        if (is_numeric ($mod_value) && $mod_value > 0) {
          if ($counter_for_filter % $mod_value == 0) return $filter_ok;
        }
      }
    }

    return in_array ($counter_for_filter, $filter_values) xor !$filter_ok;
  }

  function check_and_increment_block_counter () {
    global $ad_inserter_globals, $ai_last_check;

    $global_name = AI_BLOCK_COUNTER_NAME . $this->number;
    $max_insertions = intval ($this->get_maximum_insertions ());
    if (!isset ($ad_inserter_globals [$global_name])) {
      $ad_inserter_globals [$global_name] = 0;
    }
    $ai_last_check = AI_CHECK_MAX_INSERTIONS;
    if ($max_insertions != 0 && $ad_inserter_globals [$global_name] >= $max_insertions) return false;
    $ad_inserter_globals [$global_name] ++;

    return true;
  }

  function check_block_counter () {
    global $ad_inserter_globals, $ai_last_check;

    $global_name = AI_BLOCK_COUNTER_NAME . $this->number;
    $max_insertions = intval ($this->get_maximum_insertions ());
    if (!isset ($ad_inserter_globals [$global_name])) {
      $ad_inserter_globals [$global_name] = 0;
    }
    $ai_last_check = AI_CHECK_MAX_INSERTIONS;
    if ($max_insertions != 0 && $ad_inserter_globals [$global_name] >= $max_insertions) return false;
    return true;
  }

  function increment_block_counter () {
    global $ad_inserter_globals;

    if ($this->number == 0) return;

    $global_name = AI_BLOCK_COUNTER_NAME . $this->number;
    if (!isset ($ad_inserter_globals [$global_name])) {
      $ad_inserter_globals [$global_name] = 0;
    }
    $ad_inserter_globals [$global_name] ++;
    return;
  }


  function replace_ai_tags ($content){
    global $ai_wp_data;

    if (!isset ($ai_wp_data [AI_TAGS])) {
      $general_tag = str_replace ("&amp;", " and ", $this->get_ad_general_tag());
      $title = $general_tag;
      $short_title = $general_tag;
      $category = $general_tag;
      $short_category = $general_tag;
      $tag = $general_tag;
      $smart_tag = $general_tag;
      if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_CATEGORY) {
          $categories = get_the_category();
          if (!empty ($categories)) {
            $first_category = reset ($categories);
            $category = str_replace ("&amp;", "and", $first_category->name);
            if ($category == "Uncategorized") $category = $general_tag;
          } else {
              $category = $general_tag;
          }
          if (strpos ($category, ",") !== false) {
            $short_category = trim (substr ($category, 0, strpos ($category, ",")));
          } else $short_category = $category;
          if (strpos ($short_category, "and") !== false) {
            $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
          }

          $title = $category;
          $title = str_replace ("&amp;", "and", $title);
          $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));
          $tag = $short_title;
          $smart_tag = $short_title;
      } elseif (is_tag ()) {
          $title = single_tag_title('', false);
          $title = str_replace (array ("&amp;", "#"), array ("and", ""), $title);
          $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));
          $category = $short_title;
          if (strpos ($category, ",") !== false) {
            $short_category = trim (substr ($category, 0, strpos ($category, ",")));
          } else $short_category = $category;
          if (strpos ($short_category, "and") !== false) {
            $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
          }
          $tag = $short_title;
          $smart_tag = $short_title;
      } elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_SEARCH) {
          $title = get_search_query();
          $title = str_replace ("&amp;", "and", $title);
          $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));
          $category = $short_title;
          if (strpos ($category, ",") !== false) {
            $short_category = trim (substr ($category, 0, strpos ($category, ",")));
          } else $short_category = $category;
          if (strpos ($short_category, "and") !== false) {
            $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
          }
          $tag = $short_title;
          $smart_tag = $short_title;
      } elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST) {
          $title = get_the_title();
          $title = str_replace ("&amp;", "and", $title);

          $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));

          $categories = get_the_category();
          if (!empty ($categories)) {
            $first_category = reset ($categories);
            $category = str_replace ("&amp;", "and", $first_category->name);
            if ($category == "Uncategorized") $category = $general_tag;
          } else {
              $category = $short_title;
          }
          if (strpos ($category, ",") !== false) {
            $short_category = trim (substr ($category, 0, strpos ($category, ",")));
          } else $short_category = $category;
          if (strpos ($short_category, "and") !== false) {
            $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
          }

          $tags = get_the_tags();
          if (!empty ($tags)) {

            $first_tag = reset ($tags);
            $tag = str_replace (array ("&amp;", "#"), array ("and", ""), isset ($first_tag->name) ? $first_tag->name : '');

            $tag_array = array ();
            foreach ($tags as $tag_data) {
              if (isset ($tag_data->name))
                $tag_array [] = explode (" ", $tag_data->name);
            }

            $selected_tag = '';

            if (count ($tag_array [0]) == 2) $selected_tag = $tag_array [0];
            elseif (count ($tag_array) > 1 && count ($tag_array [1]) == 2) $selected_tag = $tag_array [1];
            elseif (count ($tag_array) > 2 && count ($tag_array [2]) == 2) $selected_tag = $tag_array [2];
            elseif (count ($tag_array) > 3 && count ($tag_array [3]) == 2) $selected_tag = $tag_array [3];
            elseif (count ($tag_array) > 4 && count ($tag_array [4]) == 2) $selected_tag = $tag_array [4];


            if ($selected_tag == '' && count ($tag_array) >= 2 && count ($tag_array [0]) == 1 && count ($tag_array [1]) == 1) {

              if (isset ($tag_array [0][0]) && isset ($tag_array [1][0])) {
                if (strpos ($tag_array [0][0], $tag_array [1][0]) !== false) $tag_array = array_slice ($tag_array, 1, count ($tag_array) - 1);
              }

              if (isset ($tag_array [0][0]) && isset ($tag_array [1][0])) {
                if (strpos ($tag_array [1][0], $tag_array [0][0]) !== false) $tag_array = array_slice ($tag_array, 1, count ($tag_array) - 1);
              }

              if (isset ($tag_array [0][0]) && isset ($tag_array [1][0])) {
                if (count ($tag_array) >= 2 && count ($tag_array [0]) == 1 && count ($tag_array [1]) == 1) {
                  $selected_tag = array ($tag_array [0][0], $tag_array [1][0]);
                }
              }
            }

            if ($selected_tag == '') {
              $first_tag = reset ($tags);
              $smart_tag = implode (" ", array_slice (explode (" ", isset ($first_tag->name) ? $first_tag->name : ''), 0, 3));
            } else $smart_tag = implode (" ", $selected_tag);

            $smart_tag = str_replace (array ("&amp;", "#"), array ("and", ""), $smart_tag);

          } else {
              $tag = $category;
              $smart_tag = $category;
          }
      }

      $title = str_replace (array ("'", '"'), array ("&#8217;", "&#8221;"), $title);
      $title = html_entity_decode ($title, ENT_QUOTES, "utf-8");

      $short_title = str_replace (array ("'", '"'), array ("&#8217;", "&#8221;"), $short_title);
      $short_title = html_entity_decode ($short_title, ENT_QUOTES, "utf-8");

      $search_query = "";
      if (isset ($_SERVER['HTTP_REFERER'])) {
        $referrer = $_SERVER['HTTP_REFERER'];
      } else $referrer = '';
      if (preg_match ("/[\.\/](google|yahoo|bing|ask)\.[a-z\.]{2,5}[\/]/i", $referrer, $search_engine)){
         $referrer_query = parse_url ($referrer);
         $referrer_query = isset ($referrer_query ["query"]) ? $referrer_query ["query"] : "";
         parse_str ($referrer_query, $value);
         $search_query = isset ($value ["q"]) ? $value ["q"] : "";
         if ($search_query == "") {
           $search_query = isset ($value ["p"]) ? $value ["p"] : "";
         }
      }
      if ($search_query == "") $search_query = $smart_tag;

      $author = get_the_author_meta ('display_name');
      $author_name = get_the_author_meta ('first_name') . " " . get_the_author_meta ('last_name');
      if ($author_name == '') $author_name = $author;

      $ai_wp_data [AI_TAGS]['TITLE']          = $title;
      $ai_wp_data [AI_TAGS]['SHORT_TITLE']    = $short_title;
      $ai_wp_data [AI_TAGS]['CATEGORY']       = $category;
      $ai_wp_data [AI_TAGS]['SHORT_CATEGORY'] = $short_category;
      $ai_wp_data [AI_TAGS]['TAG']            = $tag;
      $ai_wp_data [AI_TAGS]['SMART_TAG']      = $smart_tag;
      $ai_wp_data [AI_TAGS]['SEARCH_QUERY']   = $search_query;
      $ai_wp_data [AI_TAGS]['AUTHOR']         = $author;
      $ai_wp_data [AI_TAGS]['AUTHOR_NAME']    = $author_name;
    }

    $ad_data = preg_replace ("/{title}/i",          $ai_wp_data [AI_TAGS]['TITLE'],          $content);
    $ad_data = preg_replace ("/{short-title}/i",    $ai_wp_data [AI_TAGS]['SHORT_TITLE'],    $ad_data);
    $ad_data = preg_replace ("/{category}/i",       $ai_wp_data [AI_TAGS]['CATEGORY'],       $ad_data);
    $ad_data = preg_replace ("/{short-category}/i", $ai_wp_data [AI_TAGS]['SHORT_CATEGORY'], $ad_data);
    $ad_data = preg_replace ("/{tag}/i",            $ai_wp_data [AI_TAGS]['TAG'],            $ad_data);
    $ad_data = preg_replace ("/{smart-tag}/i",      $ai_wp_data [AI_TAGS]['SMART_TAG'],      $ad_data);
    $ad_data = preg_replace ("/{search-query}/i",   $ai_wp_data [AI_TAGS]['SEARCH_QUERY'],   $ad_data);
    $ad_data = preg_replace ("/{author}/i",         $ai_wp_data [AI_TAGS]['AUTHOR'],         $ad_data);
    $ad_data = preg_replace ("/{author-name}/i",    $ai_wp_data [AI_TAGS]['AUTHOR_NAME'],    $ad_data);

    $ad_data = preg_replace ("/{short_title}/i",    $ai_wp_data [AI_TAGS]['SHORT_TITLE'],    $ad_data);
    $ad_data = preg_replace ("/{short_category}/i", $ai_wp_data [AI_TAGS]['SHORT_CATEGORY'], $ad_data);
    $ad_data = preg_replace ("/{smart_tag}/i",      $ai_wp_data [AI_TAGS]['SMART_TAG'],      $ad_data);
    $ad_data = preg_replace ("/{search_query}/i",   $ai_wp_data [AI_TAGS]['SEARCH_QUERY'],   $ad_data);
    $ad_data = preg_replace ("/{author_name}/i",    $ai_wp_data [AI_TAGS]['AUTHOR_NAME'],    $ad_data);

    if (function_exists ('ai_tags')) ai_tags ($ad_data);

    return $ad_data;
  }
}


class ai_Block extends ai_CodeBlock {

    public function __construct ($number) {
      parent::__construct();

      $this->number = $number;
      $this->wp_options [AI_OPTION_BLOCK_NAME] = AD_NAME." ".$number;
    }
}

class ai_AdH extends ai_BaseCodeBlock {

  public function __construct () {
    parent::__construct();

    $this->wp_options [AI_OPTION_BLOCK_NAME] = 'HEADER';
  }
}

class ai_AdF extends ai_BaseCodeBlock {

  public function __construct () {
    parent::__construct();

    $this->wp_options [AI_OPTION_BLOCK_NAME] = 'FOOTER';
  }
}

class ai_AdA extends ai_BaseCodeBlock {

  public function __construct () {
    parent::__construct();

    $this->wp_options [AI_OPTION_BLOCK_NAME] = 'AD BLOCKING MESSAGE';
    $this->wp_options [AI_OPTION_CODE] = AI_DEFAULT_ADB_MESSAGE;
  }
}

class ai_Walker_Comment extends Walker_Comment {

    public function comment_callback ($comment, $args, $depth) {
      if (($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') && $args ['short_ping']) {
        $this->ping ($comment, $depth, $args);
      } elseif ($args['format'] === 'html5') {
        $this->html5_comment ($comment, $depth, $args);
      } else {
        $this->comment ($comment, $depth, $args);
      }
    }

}

