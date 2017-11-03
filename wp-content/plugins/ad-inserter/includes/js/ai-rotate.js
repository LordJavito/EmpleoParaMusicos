jQuery (function ($) {
  var wrapping_div_selector = ".AI_BLOCK_CLASS_NAME";
  $("div.ai-rotate").each (function () {
    var rotate_options = $(".ai-rotate-option", this);
    var random_index = Math.floor (Math.random () * rotate_options.length);

    var d = new Date();
    var n = d.getMilliseconds();
    if (n % 2) random_index = rotate_options.length - random_index - 1;

    rotate_options.hide ();
    $(rotate_options [random_index]).css ({"display": "", "visibility": "", "position": "", "width": "", "height": "", "top": "", "left": ""});
    $(this).css ({"position": ""});

    var tracking_updated = false;
    var adb_show_wrapping_div = $(this).closest ('.ai-adb-show');
    if (typeof adb_show_wrapping_div != "undefined") {
      if (typeof adb_show_wrapping_div.data ("ai-tracking") != "undefined") {
        var data = JSON.parse (atob (adb_show_wrapping_div.data ("ai-tracking")));
        if (typeof data !== "undefined" && data.constructor === Array) {
          data [1] = random_index + 1;
          adb_show_wrapping_div.data ("ai-tracking", btoa (JSON.stringify (data)))
          tracking_updated = true;
        }
      }
    }

    if (!tracking_updated) {
      var wrapping_div = $(this).closest (wrapping_div_selector);
      if (typeof wrapping_div.data ("ai") != "undefined") {
        var data = JSON.parse (atob (wrapping_div.data ("ai")));
        if (typeof data !== "undefined" && data.constructor === Array) {
          data [1] = random_index + 1;
          wrapping_div.data ("ai", btoa (JSON.stringify (data)))
        }
      }
    }
  });
});

