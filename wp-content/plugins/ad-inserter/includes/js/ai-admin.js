jQuery (function ($) {

  $(document).ready(function($) {

    function show_review_notice () {
      $('.ai-notice').fadeIn ("fast", function() {
        $(this).css ('display', 'table');
      });
    }

    setTimeout (show_review_notice, 500);
  });

  $(document).on ('click', '.ai-notice .ai-notice-dismiss', function () {
    var notice_div = $(this).closest ('.ai-notice');
    var nonce = notice_div.attr ('nonce');
    var notice = notice_div.data ('notice');
    var action = $(this).data ('notice');
//    console.log ('CLICK', notice, action);
    notice_div.hide ();

    // Since WP 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    $.ajax (ajaxurl, {
      type: 'POST',
      data: {
        action:   'ai_ajax_backend',
        ai_check: nonce,
        notice:   notice,
        click:    action,
      }
    });

  });
});
