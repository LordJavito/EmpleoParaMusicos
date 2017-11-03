var javascript_version = "2.2.5";
var ignore_key = true;
var start = 1;
var end = 16;
var active_tab = 1;
var active_tab_0 = 0;
var tabs_to_configure   = new Array();

var current_tab = 0;
var next_tab = 0;

var syntax_highlighting = false;
var settings_page = "";

var dateFormat = "yy-mm-dd";

var AI_DISABLED         = 0;
var AI_BEFORE_POST      = 1;
var AI_AFTER_POST       = 2;
var AI_BEFORE_CONTENT   = 3;
var AI_AFTER_CONTENT    = 4;
var AI_BEFORE_PARAGRAPH = 5;
var AI_AFTER_PARAGRAPH  = 6;
var AI_BEFORE_EXCERPT   = 7;
var AI_AFTER_EXCERPT    = 8;
var AI_BETWEEN_POSTS    = 9;
var AI_BEFORE_COMMENTS  = 10;
var AI_BETWEEN_COMMENTS = 11;
var AI_AFTER_COMMENTS   = 12;
var AI_FOOTER           = 13;

var AI_ALIGNMENT_DEFAULT        = 0;
var AI_ALIGNMENT_LEFT           = 1;
var AI_ALIGNMENT_RIGHT          = 2;
var AI_ALIGNMENT_CENTER         = 3;
var AI_ALIGNMENT_FLOAT_LEFT     = 4;
var AI_ALIGNMENT_FLOAT_RIGHT    = 5;
var AI_ALIGNMENT_NO_WRAPPING    = 6;
var AI_ALIGNMENT_CUSTOM_CSS     = 7;
var AI_ALIGNMENT_STICKY_LEFT    = 8;
var AI_ALIGNMENT_STICKY_RIGHT   = 9;
var AI_ALIGNMENT_STICKY_TOP     = 10;
var AI_ALIGNMENT_STICKY_BOTTOM  = 11;

var AI_ADB_ACTION_NONE              = 0;
var AI_ADB_ACTION_MESSAGE           = 1;
var AI_ADB_ACTION_REDIRECTION       = 2;

var AI_ADB_BLOCK_ACTION_DO_NOTHING  = 0;
var AI_ADB_BLOCK_ACTION_REPLACE     = 1;
var AI_ADB_BLOCK_ACTION_SHOW        = 2;
var AI_ADB_BLOCK_ACTION_HIDE        = 3;


var shSettings = {
  "tab_size":"4",
  "use_soft_tabs":"1",
  "word_wrap":"1",
  "highlight_curr_line":"0",
  "key_bindings":"default",
  "full_line_selection":"1",
  "show_line_numbers":"0"};

function SyntaxHighlight (id, block, settings) {
  var textarea, editor, form, session, editDiv;

  settings ['tab_size'] = 2;

  this.textarea = textarea = jQuery(id);
  this.settings = settings || {};

  if (textarea.length === 0 ) { // Element does not exist
    this.valid = false;
    return;
  }

  this.valid = true;
  editDiv = jQuery('<div>', {
    position: 'absolute',
    'class': textarea.attr('class'),
    'id':  'editor-' + block
  }).insertBefore (textarea);

  textarea.css('display', 'none');
  this.editor = editor = ace.edit(editDiv[0]);
  this.form = form = textarea.closest('form');
  this.session = session = editor.getSession();
  session.setValue(textarea.val());

  // copy back to textarea on form submit...
  form.submit (function () {
    var block = textarea.attr ("id").replace ("block-","");
    var editor_disabled = jQuery("#simple-editor-" + block).is(":checked");
    if (!editor_disabled) {
      textarea.val (session.getValue());
    }
    if (textarea.val () == "") {
      textarea.removeAttr ("name");
    }

    jQuery("#ai-active-tab").attr ("value", '[' + active_tab + ',' + active_tab_0 + ']');
  });

  session.setMode ("ace/mode/ai-html");

  this.applySettings();
}

SyntaxHighlight.prototype.applySettings = function () {
  var editor = this.editor,
    session = this.session,
    settings = this.settings;

  editor.renderer.setShowGutter(settings['show_line_numbers'] == 1);
  editor.setHighlightActiveLine(settings['highlight_curr_line'] == 1);
  editor.setSelectionStyle(settings['full_line_selection'] == 1 ? "line" : "text");
  editor.setTheme("ace/theme/" + settings['theme']);
  session.setUseWrapMode(settings['word_wrap'] == 1);
  session.setTabSize(settings['tab_size']);
  session.setUseSoftTabs(settings['use_soft_tabs'] == 1);
};

function change_block_alignment (block) {
  jQuery("select#block-alignment-" + block).change ();
}


(function ($) {
  $.widget("toggle.checkboxButton", {
    _create : function() {
      this._on(this.element, {
        "change" : function(event) {
          this.element.next ("label").find ('.checkbox-icon').toggleClass("on");
        }
      });
    }
  });
}(jQuery));


function get_editor_text (block) {
  var editor = ace.edit ("editor-" + block);
  var textarea = jQuery ("#block-" + block);
  var editor_disabled = jQuery("#simple-editor-" + block).is(":checked");
  if (!editor_disabled) {
    return editor.getSession ().getValue();
  } else return textarea.val ();
}

function set_editor_text (block, text) {
  var editor = ace.edit ("editor-" + block);
  var textarea = jQuery ("#block-" + block);
  var editor_disabled = jQuery("#simple-editor-" + block).is(":checked");
  if (!editor_disabled) {
    return editor.getSession ().setValue(text);
  } else textarea.val (text);
}

function window_open_post (url, windowoption, name, params) {
   var form = document.createElement("form");
   form.setAttribute("method", "post");
   form.setAttribute("action", url);
   form.setAttribute("target", name);
   for (var i in params) {
     if (params.hasOwnProperty(i)) {
       var input = document.createElement('input');
       input.type = 'hidden';
       input.name = i;
       input.value = encodeURI (params[i]);
       form.appendChild(input);
     }
   }
   document.body.appendChild(form);
   //note I am using a post.htm page since I did not want to make double request to the page
   //it might have some Page_Load call which might screw things up.
   window.open("post.htm", name, windowoption);
   form.submit();
   document.body.removeChild(form);
}

jQuery(document).ready(function($) {

  var header = $('#ai-settings-' + 'header').length != 0;

  if (header) {
    $.elycharts.templates['ai'] = {
      type : "line",
      margins : [10, 38, 20, 38],
      defaultSeries : {
        fill: true,
        fillProps: {
          opacity: .15
        },
        plotProps : {
          "stroke-width" : 1,
        },
      },
      series : {
        serie1 : {
          color : "#66f",
          rounded : 0.8,
        },
        serie2 : {
          color : "#888",
          axis : "r",
          fillProps: {
            opacity: .1
          },
        }
      },
      defaultAxis : {
        labels : true,
        min: 0,
      },
      features : {
        grid : {
          draw : true,
          forceBorder : true,
          ny: 5,
          ticks : {
            active : [true, true, true],
            size : [4, 0],
            props : {
              stroke: '#ccc',
            }
          }
        },
      },
      interactive: false
    }

    $.elycharts.templates['ai-clicks'] = {
      template: 'ai',
      series : {
        serie1 : {
          color : "#0a0",
          fillProps: {
            opacity: .2
          },
        },
        serie2 : {
          color : "#888",
        }
      },
    }

    $.elycharts.templates['ai-impressions'] = {
      template: 'ai',
      series : {
        serie1 : {
          color : "#66f",
        },
        serie2 : {
          color : "#888",
        }
      },
    }

    $.elycharts.templates['ai-ctr'] = {
      template: 'ai',
      series : {
        serie1 : {
          color : "#e22",
        },
        serie2 : {
          color : "#888",
        }
      },
    }

    $.elycharts.templates['ai-versions'] = {
      type : "line",
      margins : [10, 38, 20, 38],
      defaultSeries: {
        color: "#0a0",
        fillProps: {
          opacity: .2
        },
        plotProps : {
          "stroke-width" : 2,
        },
        tooltip : {
          frameProps : {
           opacity : 0.8
          }
        },
        rounded : 0.8,
      },
      series: {
        serie1: {
          color : "#aaa",
          axis : "l",
        },
        serie2 : {
          color : "#0a0",
          axis : "r",
        },
        serie3 : {
          color: "#33f",
        },
        serie4 : {
          color : "#e22",
        },
        serie5 : {
          color : "#e2f",
        },
        serie6 : {
          color : "#ec6400",
        },
        serie7 : {
          color : "#00a3b5",
        },
        serie8 : {
          color : "#7000ff",
        },
        serie9 : {
          color : "#000",
        },
        serie10 : {
          color : "#000",   // Used also for BLOCKED
        },
      },
      defaultAxis : {
        labels : true,
        min: 0,
      },
      features : {
        grid: {
          draw: true,
          forceBorder : true,
          ny: 5,
          ticks : {
            active : [true, true, true],
            size : [4, 0],
            props : {
              stroke: '#ccc',
            }
          }
        },
      },
      interactive: true,
    }

    $.elycharts.templates['ai-versions-legend'] = {
      template: 'ai-versions',
      margins : [10, 38, 10, 38],
      defaultSeries : {
        fill: true,
        fillProps: {
          opacity: 0
        },
        plotProps : {
          "stroke-width" : 0,
        },
      },
      defaultAxis : {
        labels : false,
      },
      features: {
        grid: {
          draw: false,
          props: {
            stroke: "transparent",
          },
          ticks : {
            active : false,
          }
        },
        legend: {
          horizontal : true,
          x : 20, // X | auto, (auto solo per horizontal = true)
          y : 0,
          width : 540, // X | auto, (auto solo per horizontal = true)
          height : 20,
          itemWidth : "auto", // fixed | auto, solo per horizontal = true
          borderProps: { fill : "white", stroke: "black", "stroke-width": 0},
        },
      },
    }

    $.elycharts.templates['ai-pie'] = {
      template: 'ai-versions',
      type: "pie",
      rPerc: 100,
      startAngle: 270,
      clockwise: true,
      margins : [0, 0, 0, 0],
      defaultSeries : {
        tooltip: {
          height: 55,
          width: 120,
          padding: [5, 5],
          offset: [-15, -10],
          frameProps: {
              opacity: 0.95,
              /* fill: "white", */
              stroke: "#000"

          }
        },
        plotProps : {
         stroke : "white",
         "stroke-width" : 0,
         opacity : 1
        },
        values : [{
         plotProps : {
          fill : "#aaa"
         }
        }, {
         plotProps : {
          fill : "#0a0"
         }
        }, {
         plotProps : {
          fill : "#33f"
         }
        }, {
         plotProps : {
          fill : "#e22"
         }
        }, {
         plotProps : {
          fill : "#e2f"
         }
        }, {
         plotProps : {
          fill : "#ec6400"
         }
        }, {
         plotProps : {
          fill : "#00a3b5"
         }
        }, {
         plotProps : {
          fill : "#7000ff"
         }
        }, {
         plotProps : {
          fill : "#000"
         }
        }, {
         plotProps : {
          fill : "#000"   // Used also for BLOCKED
         }
        }]
      }
    }

    $.elycharts.templates['ai-bar'] = {
      template: 'ai-pie',
      type: "line",
      margins : [5, 0, 5, 45],
      barMargins : 1,
      defaultSeries : {
        type: "bar",
        axis: "l",
        tooltip: {
          height: 38,
        }
      },
      features: {
        grid: {
          draw: [false, false],
          props : {stroke: '#e0e0e0', "stroke-width": 0},
          ticks : {
            props : {stroke: '#e0e0e0', "stroke-width": 0},
          }
        },
      },
    }

  }


  shSettings ['theme'] = $('#ai-data').attr ('theme');

  var geo_groups = 0;
  var geo_groups_text = $('#ai-data-2').attr ('geo_groups');
  if (typeof geo_groups_text != 'undefined') {
    geo_groups = parseInt (geo_groups_text);
  }

  var debug = parseInt ($('#ai-data').attr ('javascript_debugging'));
  var debug_title = false;

  if (debug) {
    var start_time = new Date().getTime();
    var last_time = start_time;
    debug_title = true;
  }

  syntax_highlighting = typeof shSettings ['theme'] != 'undefined' && shSettings ['theme'] != 'disabled';

  var header_id = 'name';
//  var preview_top = (screen.height / 2) - (820 / 2);

  function remove_default_values (block) {
    $("#tab-" + block + " input:checkbox").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).is (':checked');
      var name          = $(this).attr ("name");

      if (typeof name != 'undefined') {
        if (typeof default_value != 'undefined') {
          default_value = Boolean (parseInt (default_value));
  //        console.log ($(this).attr ("name"), ": default_value: ", $(this).attr ("default"), " = ", default_value, ", current_value: ", current_value);

          if (current_value == default_value) {
            $(this).removeAttr ("name");
            $("#tab-" + block + " [name='" + name + "']").removeAttr ("name");
  //          console.log ("REMOVED: ", name);
          }
        }
//        else console.log ("NO DEFAULT VALUE:", $(this).attr ("name"));
      }
    });

    $("#tab-" + block + " input:text").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).val ();
      var name          = $(this).attr ("name");

      if (typeof name != 'undefined') {
        if (typeof default_value != 'undefined') {
  //        console.log ($(this).attr ("name"), ": default_value: ", default_value, ", current_value: ", current_value);

          if (current_value == default_value) {
            $(this).removeAttr ("name");
  //          console.log ("REMOVED: ", name);
          }
        }
//        else console.log ("NO DEFAULT VALUE: ", $(this).attr ("name"));
      }
    });

    $("#tab-" + block + " select").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).val();
      var name          = $(this).attr ("name");

      if (typeof name != 'undefined') {
//        console.log ($(this).attr ("id"), name, default_value, current_value);

        // to do: children of OPTGROUP
        var childern = $(this).children ();
        if (childern.prop ("tagName") == "OPTGROUP") {
          var current_value = "";
          childern.each (function() {
            var selected = $(this).val();
            if (selected.length != 0) {
              current_value = selected;
              return false;
            }
          });
        }

  //      if ($(this).attr ("selected-value") == 1) current_value = current_value.attr("value");

        if (typeof default_value != 'undefined') {
//          console.log ($(this).attr ("name"), ": default_value: ", default_value, " current_value: ", current_value);

          if (current_value == default_value) {
            $(this).removeAttr ("name");
//            console.log ("REMOVED: ", name);
          }
        }
//        else console.log ("NO DEFAULT VALUE: ", $(this).attr ("name"));
      }
    });

    $("#tab-" + block + " input:radio:checked").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).is (':checked');
      var name          = $(this).attr ("name");

      if (typeof name != 'undefined') {
        if (typeof default_value != 'undefined') {
          default_value = Boolean (parseInt (default_value));
  //        console.log ($(this).attr ("name"), ": default_value: ", $(this).attr ("default"), " = ", default_value, ", current_value: ", current_value);

          if (current_value == default_value) {
            $("#tab-" + block + " [name='" + name + "']").removeAttr ("name");
  //          console.log ("REMOVED: ", name);
          }
        }
//        else console.log ("NO DEFAULT VALUE: ", $(this).attr ("name"));
      }
    });
  }

  function configure_editor_language (block) {

    var editor = ace.edit ("editor-" + block);

    if ($("input#process-php-"+block).is(":checked")) {
      editor.getSession ().setMode ("ace/mode/ai-php");
    } else editor.getSession ().setMode ("ace/mode/ai-html");
  }

  function disable_auto_refresh_statistics () {
    $('span.icon-auto-refresh').each (function() {
      $(this).removeClass ('on');
    });
  }

  function reload_statistics (block) {
    if ($("input#auto-refresh-"+block).next ().find ('.checkbox-icon').hasClass ('on')) {
      $("input#load-custom-range-"+block).click ();
      setTimeout (function() {reload_statistics (block);}, 60 * 1000);
    }
  }

  function getDate (element) {
    var date;
    try {
      date = $.datepicker.parseDate (dateFormat, element.val ());
    } catch (error) {
      date = null;
    }

    return date;
  }

  function process_scheduling_dates (block) {
    var start_date_picker = $("#scheduling-on-"+block);
    var end_date_picker   = $("#scheduling-off-"+block);
    var start_date = getDate (start_date_picker);
    var end_date   = getDate (end_date_picker);

    end_date_picker.attr ('title', '');
    end_date_picker.css ("border-color", "#ddd");

    if (start_date == null) {
      end_date_picker.attr ('title', '');
    } else
    if (end_date == null) {
      end_date_picker.attr ('title', '');
    } else
    if (end_date > start_date) {
      var now = new Date();
      var today_date = new Date (now.getFullYear(), now.getMonth(), now.getDate(), 0, 0, 0, 0);
      if (end_date <= today_date) {
        var expiration = Math.round ((today_date - end_date) / 1000 / 3600 / 24);
//        end_date_picker.attr ('title', 'Invalid end date - insertion already expired ');
        end_date_picker.attr ('title', 'Insertion expired');
        end_date_picker.css ("border-color", "#d00");
      } else {
          var duration = Math.round ((end_date - start_date) / 1000 / 3600 / 24);
          end_date_picker.attr ('title', ' Duration: ' + duration + ' day' + (duration == 1 ? '' : 's'));
        }
    } else {
        end_date_picker.attr ('title', 'Invalid end date - must be after start date');
        end_date_picker.css ("border-color", "#d00");
      }
  }

  function process_chart_dates (block) {
    var start_date_picker = $("input#chart-start-date-"+block);
    var end_date_picker   = $("input#chart-end-date-"+block);
    var start_date = getDate (start_date_picker);
    var end_date   = getDate (end_date_picker);

    start_date_picker.attr ('title', '');
    start_date_picker.css ("border-color", "rgb(221, 221, 221)");
    end_date_picker.attr ('title', '');
    end_date_picker.css ("border-color", "rgb(221, 221, 221)");

    if (start_date == null) {
      end_date_picker.attr ('title', '');
    } else
    if (end_date == null) {
      end_date_picker.attr ('title', '');
    } else
    if (end_date > start_date) {
      var now = new Date();
      var today_date = new Date (now.getFullYear(), now.getMonth(), now.getDate(), 0, 0, 0, 0);
      if (today_date - start_date > 366 * 24 * 3600 * 1000) {
        start_date_picker.attr ('title', 'Invalid start date - only data for 1 year back is available');
        start_date_picker.css ("border-color", "#d00");
      }
      if (end_date - start_date > 366 * 24 * 3600 * 1000) {
        end_date_picker.attr ('title', 'Invalid date range - only data for 1 year can be displayed');
        end_date_picker.css ("border-color", "#d00");
      }
    } else {
        end_date_picker.attr ('title', 'Invalid end date - must be after start date');
        end_date_picker.css ("border-color", "#d00");
      }
  }

  function process_display_elements (block) {

    $("#paragraph-settings-"+block).hide();
//    $("#content-settings-"+block).hide();

    var automatic_insertion = $("select#display-type-"+block+" option:selected").attr('value');

    if (automatic_insertion == AI_BEFORE_PARAGRAPH || automatic_insertion == AI_AFTER_PARAGRAPH) {
      $("#paragraph-settings-"+block).show();
    } else {
        $("#paragraph-counting-"+block).hide();
        $("#paragraph-clearance-"+block).hide();
      }

    var content_settings = automatic_insertion == AI_BEFORE_PARAGRAPH || automatic_insertion == AI_AFTER_PARAGRAPH || automatic_insertion == AI_BEFORE_CONTENT || automatic_insertion == AI_AFTER_CONTENT;
//    if (content_settings) {
//      $("#content-settings-"+block).show();
//    }

    $("#css-label-"+block).css('display', 'table-cell');
    $("#edit-css-button-"+block).css('display', 'table-cell');

    $("#css-none-"+block).hide();
    $("#custom-css-"+block).hide();
    $("#css-left-"+block).hide();
    $("#css-right-"+block).hide();
    $("#css-center-"+block).hide();
    $("#css-float-left-"+block).hide();
    $("#css-float-right-"+block).hide();
    $("#css-sticky-left-"+block).hide();
    $("#css-sticky-right-"+block).hide();
    $("#css-sticky-top-"+block).hide();
    $("#css-sticky-bottom-"+block).hide();
    $("#css-no-wrapping-"+block).hide();

    $("#no-wrapping-warning-"+block).hide();

    var alignment = $("select#block-alignment-"+block+" option:selected").attr('value');

    if (alignment == AI_ALIGNMENT_NO_WRAPPING) {
      $("#css-no-wrapping-"+block).css('display', 'table-cell');
      $("#css-label-"+block).hide();
      $("#edit-css-button-"+block).hide();
      if ($("#client-side-detection-"+block).is(":checked")) {
        $("#no-wrapping-warning-"+block).show();
      }
    } else
    if (alignment == AI_ALIGNMENT_DEFAULT) {
      $("#css-none-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_CUSTOM_CSS) {
      $("#css-code-" + block).show();
      $("#custom-css-"+block).show();
    } else
    if (alignment == AI_ALIGNMENT_LEFT) {
      $("#css-left-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_RIGHT) {
      $("#css-right-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_CENTER) {
      $("#css-center-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_FLOAT_LEFT) {
      $("#css-float-left-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_FLOAT_RIGHT) {
      $("#css-float-right-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_STICKY_LEFT) {
      $("#css-sticky-left-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_STICKY_RIGHT) {
      $("#css-sticky-right-"+block).css('display', 'table-cell');
    }
    if (alignment == AI_ALIGNMENT_STICKY_TOP) {
      $("#css-sticky-top-"+block).css('display', 'table-cell');
    } else
    if (alignment == AI_ALIGNMENT_STICKY_BOTTOM) {
      $("#css-sticky-bottom-"+block).css('display', 'table-cell');
    }


    if ($('#css-code-'+block).is(':visible')) {
        $("#show-css-button-"+block+" span").text ("Hide");
    } else {
        $("#show-css-button-"+block+" span").text ("Show");
      }

    var avoid_action = $("select#avoid-action-"+block+" option:selected").text();

    if (avoid_action == "do not insert")
      $("#check-up-to-"+block).hide (); else
        $("#check-up-to-"+block).show ();


    $("#scheduling-delay-"+block).hide();
    $("#scheduling-between-dates-"+block).hide();
    $("#scheduling-delay-warning-"+block).hide();
    var scheduling = $("select#scheduling-"+block).val();
    if (scheduling == "1") {
      if (content_settings) {
        $("#scheduling-delay-"+block).show();
      } else {
          $("#scheduling-delay-warning-"+block).show();
        }
    } else
    if (scheduling == "2") {
      $("#scheduling-between-dates-"+block).show();
      process_scheduling_dates (block);
    }


    $("#adb-block-replacement-"+block).hide();
    var adb_block_action = $("select#adb-block-action-"+block).val();
    if (adb_block_action == AI_ADB_BLOCK_ACTION_REPLACE) {
      $("#adb-block-replacement-"+block).show();
    }

    if (syntax_highlighting) configure_editor_language (block);
  }

  function configure_editor (block) {

    if (debug) console.log ("configure_editor:", block);

    if (syntax_highlighting) {
      var syntax_highlighter = new SyntaxHighlight ('#block-' + block, block, shSettings);
      syntax_highlighter.editor.setPrintMarginColumn (1000);

      $('input#simple-editor-' + block).change (function () {

        var block = $(this).attr ("id").replace ("simple-editor-","");
        var editor_disabled = $(this).is(":checked");
        var editor = ace.edit ("editor-" + block);
        var textarea = $("#block-" + block);
        var ace_editor = $("#editor-" + block);

        if (editor_disabled) {
          textarea.val (editor.session.getValue());
          textarea.css ('display', 'block');
          ace_editor.css ('display', 'none');
        } else {
            editor.session.setValue (textarea.val ())
            editor.renderer.updateFull();
            ace_editor.css ('display', 'block');
            textarea.css ('display', 'none');
          }
      });
    }

    if (block != 'h' && block != 'f' && block != 'a' && !header) {
      if ((block - 1) >> 4) {
        $('#block'   + '-' + block).removeAttr(header_id);
        $('#display' + '-type-' + block).removeAttr(header_id);
      }

      if (block >> 2) {
        $('#option' + '-name-' + block).removeAttr(header_id);
        $('#option' + '-length-' + block).removeAttr(header_id);
      }
    }
  }

  function configure_adb () {
    $("#adb-message").hide();
    $("#adb-page-redirection").hide();

    var adb_action = $("select#adb-action option:selected").attr('value');

    if (adb_action == AI_ADB_ACTION_MESSAGE) {
      $("#adb-message").show();
    } else
    if (adb_action == AI_ADB_ACTION_REDIRECTION) {
      $("#adb-page-redirection").show();
    }
  }


  function configure_statistics_toolbar (tab) {
    $("input#load-custom-range-"+tab).click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("load-custom-range-","");

      var label = $(this).next ().find ('.checkbox-icon');
      label.addClass ('on');

      var nonce = $(this).attr ('nonce');
      var start_date = $("input#chart-start-date-" + block).attr('value');
      var end_date = $("input#chart-end-date-" + block).attr('value');
      var container = $("div#statistics-elements-" + block);

      var version_charts_container = $("div#ai-version-charts-" + block);
      var version_charts_container_visible = version_charts_container.is (':visible');

      var delete_range = '';
      if ($("input#clear-range-"+block).hasClass ('delete')) {
        delete_range = '&delete=1';
      }

      var adb = '';
      if ($("input#adb-statistics-button-"+block).next ().find ('.icon-adb').hasClass ('on')) {
        adb = '&adb=1';
      }

      container.load (ajaxurl+"?action=ai_ajax_backend&statistics=" + block + "&start-date=" + start_date + "&end-date=" + end_date + delete_range + adb + "&ai_check=" + nonce, function (response, status, xhr) {
        label.removeClass ('on');
        if ( status == "error" ) {
          var message = "Error downloading data: " + xhr.status + " " + xhr.statusText ;
          $( "div#load-error-" + block).html (message);
          if (debug) console.log (message);
        } else {
            $( "div#load-error-" + block).html ('');
            if (debug) console.log ("Custom statistics loaded: " + block);
            configure_charts (container);

            container.find ("label.ai-version-charts-button.not-configured").click (function () {
              var no_delay_version_charts = $(this).hasClass ('no-version-charts-delay');

              $(this).removeClass ('not-configured');
              var version_charts_container = $(this).closest (".ai-charts").find ('div.ai-version-charts');
              version_charts_container.toggle ();

              var not_configured_charts = version_charts_container.find ('.ai-chart.not-configured.hidden');
              if (not_configured_charts.length) {
                not_configured_charts.each (function() {
                  $(this).removeClass ('hidden');
                });
                if (no_delay_version_charts) {
                  configure_charts (version_charts_container);
                } else setTimeout (function() {configure_charts (version_charts_container);}, 10);
              }
            });

            if (version_charts_container_visible) {
              container.find ("label.ai-version-charts-button.not-configured").addClass ('no-version-charts-delay').click ();
            }

            $("input#chart-start-date-"+block).css ('color', '#32373c');
            $("input#chart-end-date-"+block).css ('color', '#32373c');
          }
      });
    });

    $("input#auto-refresh-"+tab).click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("auto-refresh-","");
      var label = $(this).next ().find ('.checkbox-icon');
      label.toggleClass ('on');
      if (label.hasClass ('on')) {
        reload_statistics (block);
      }
    });

    $("input#clear-range-"+tab).click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("clear-range-","");

      var delete_button = this;
      var start_date = $("input#chart-start-date-" + block).attr('value');
      var end_date = $("input#chart-end-date-" + block).attr('value');

      var message = '';
      if (start_date == '' && end_date == '')
        var message = 'Delete all statistics data?'; else
          if (start_date != '' && end_date != '') var message = 'Delete statistics data between ' + start_date + ' and ' + end_date + '?';

      if (message != '')
        $('<div />').html(message).attr ('title', 'Warning').dialog({
          bgiframe: true,
          draggable: false,
          resizable: false,
          modal: true,
          height: "auto",
          width: 400,
          position: {my: 'center', at: 'center', of: '#ai-settings'},
          buttons: {
            "Delete": function() {
              $(this).dialog ("close");

              $(delete_button).addClass ('delete');
              $("input#load-custom-range-"+block).click ();
              $(delete_button).removeClass ('delete');
            },
            Cancel: function() {
              $(this).dialog ("close");
            },
          },
          open: function() {$(this).parent ().find ('button:nth-child(2)').focus();}
        });
    });

    $("input#chart-start-date-"+tab).datepicker ({dateFormat: dateFormat, autoSize: true});
    $("input#chart-end-date-"+tab).datepicker ({dateFormat: dateFormat, autoSize: true});

    $("input#chart-start-date-"+tab).change (function() {
      disable_auto_refresh_statistics ();
      var block = $(this).attr('id').replace ("chart-start-date-", "");
      $(this).css ('color', 'red');
      process_chart_dates (block);
    });

    $("input#chart-end-date-"+tab).change (function() {
      disable_auto_refresh_statistics ();
      var block = $(this).attr('id').replace ("chart-end-date-", "");
      $(this).css ('color', 'red');
      process_chart_dates (block);
    });

    $("div#custom-range-controls-"+tab+" span.data-range").click (function () {
      disable_auto_refresh_statistics ();
      var id = $(this).closest (".custom-range-controls").attr ("id");
      block = id.replace ("custom-range-controls-","");
      $("input#chart-start-date-"+block).attr ("value", $(this).data ("start-date"));
      $("input#chart-end-date-"+block).attr ("value", $(this).data ("end-date"));
      $("input#load-custom-range-"+block).click ();
    });
  }

  function configure_tab_0 () {

    if (debug) console.log ("configure_tab_0");

    $('#tab-0').addClass ('configured');

    $('#tab-0 input[type=submit]').button().show ();

    configure_editor ('h');
    configure_editor ('f');
    if ($("#block-a").length)
    configure_editor ('a');

    $('#ai-plugin-settings-tab-container').tabs();
    $('#ai-plugin-settings-tabs').show();

    $("#export-switch-0").checkboxButton ().click (function () {
      $("#export-container-0").toggle ();

      if ($("#export-container-0").is(':visible') && !$(this).hasClass ("loaded")) {
        var nonce = $(this).attr ('nonce');
//        var site_url = $(this).attr ('site-url');
//        $("#export_settings_0").load (site_url+"/wp-admin/admin-ajax.php?action=ai_ajax_backend&export=0&ai_check=" + nonce, function() {
        $("#export_settings_0").load (ajaxurl+"?action=ai_ajax_backend&export=0&ai_check=" + nonce, function() {
          $("#export_settings_0").attr ("name", "export_settings_0");
          $("#export-switch-0").addClass ("loaded");
        });
      }
    });

    $("input#process-php-h").change (function() {
      if (syntax_highlighting) configure_editor_language ('h');
    });

    $("input#process-php-f").change (function() {
      if (syntax_highlighting) configure_editor_language ('f')
    });

    $("input#process-php-a").change (function() {
      if (syntax_highlighting) configure_editor_language ('a')
    });

    if (syntax_highlighting) configure_editor_language ('h');
    if (syntax_highlighting) configure_editor_language ('f');
    if ($("#block-a").length)
    if (syntax_highlighting) configure_editor_language ('a');

    for (var index = 1; index <= geo_groups; index ++) {
      generate_country_list ('group-country', index);
    }

    $('#enable-header').checkboxButton ();
    $('#enable-header-404').checkboxButton ();
    $('#simple-editor-h').checkboxButton ();
    $('#process-php-h').checkboxButton ();

    $('#enable-footer').checkboxButton ();
    $('#enable-footer-404').checkboxButton ();
    $('#simple-editor-f').checkboxButton ();
    $('#process-php-f').checkboxButton ();

    $('#tracking').checkboxButton ();

    configure_statistics_toolbar (0);

    $("input#statistics-button-0").checkboxButton ().click (function () {
      $("div#statistics-container-0").toggle ();
      $("div#tab-tracking-settings").toggle ();
      var container = $("div#statistics-container-0");
      if (container.is(':visible')) {
        if (!$(this).hasClass ('loaded')) {
          $("input#load-custom-range-0").click ();
          $(this).addClass ('loaded');
        }
      }
    });

    $('#enable-adb-detection').checkboxButton ();
    $('#simple-editor-a').checkboxButton ();
    $('#process-php-a').checkboxButton ();


    configure_adb ();
    $("select#adb-action").change (function() {
      configure_adb ();
    });

    $("#preview-button-adb").button ({
    }).show ().click (function () {

      $(this).blur ();

      var window_width = 820;
      var window_height = 870;
      var window_left  = 120;
      var window_top   = (screen.height / 2) - (870 / 2);
      var nonce = $(this).attr ('nonce');
      var param = {'action': 'ai_ajax_backend', 'preview': 'adb', 'ai_check': nonce};
      window_open_post (ajaxurl, 'width='+window_width+',height='+window_height+',top='+window_top+',left='+window_left+',resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no', 'preview', param);
    });
  }

  function configure_tab (tab) {

//    if (debug) console.log ("configure_tab:", tab);

    $('#tab-' + tab).addClass ('configured');

    $('#tab-' + tab + ' input[type=submit], #tab-' + tab + ' button').button().show ();

    configure_editor (tab);

    $("select#display-type-"+tab).imagepicker({hide_select: false});
    $("select#display-type-"+tab+" + ul").appendTo("#automatic-insertion-"+tab).css ('padding-top', '10px');

    $("select#block-alignment-"+tab).imagepicker({hide_select: false});
    $("select#block-alignment-"+tab+" + ul").appendTo("#alignment-style-"+tab).css ('padding-top', '10px');

    $("select#display-type-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-type-", "");
      process_display_elements (block);
    });
    $("select#block-alignment-"+tab).change (function() {
      var block = $(this).attr('id').replace ("block-alignment-", "");
      var alignment = $("select#block-alignment-"+block+" option:selected").attr('value');
      if (alignment == AI_ALIGNMENT_STICKY_LEFT || alignment == AI_ALIGNMENT_STICKY_RIGHT || alignment == AI_ALIGNMENT_STICKY_TOP || alignment == AI_ALIGNMENT_STICKY_BOTTOM) {
        $("select#display-type-"+block).val (AI_FOOTER).change ();
      }
      process_display_elements (block);
    });
    $("input#process-php-"+tab).change (function() {
      var block = $(this).attr('id').replace ("process-php-", "");
      process_display_elements (block);
    });
    $("#enable-shortcode-"+tab).change (function() {
      var block = $(this).attr('id').replace ("enable-shortcode-", "");
      process_display_elements (block);
    });
    $("#enable-php-call-"+tab).change (function() {
      var block = $(this).attr('id').replace ("enable-php-call-", "");
      process_display_elements (block);
    });
    $("select#display-for-devices-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-for-devices-", "");
      process_display_elements (block);
    });
    $("select#scheduling-"+tab).change (function() {
      var block = $(this).attr('id').replace ("scheduling-", "");
      process_display_elements (block);
    });
    $("select#adb-block-action-"+tab).change (function() {
      var block = $(this).attr('id').replace ("adb-block-action-", "");
      process_display_elements (block);
    });


    $("#display-homepage-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-homepage-", "");
      process_display_elements (block);
    });
    $("#display-category-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-category-", "");
      process_display_elements (block);
    });
    $("#display-search-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-search-", "");
      process_display_elements (block);
    });
    $("#display-archive-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-archive-", "");
      process_display_elements (block);
    });

    $("#client-side-detection-"+tab).change (function() {
      var block = $(this).attr('id').replace ("client-side-detection-", "");
      process_display_elements (block);
    });

    $("#scheduling-on-"+tab).change (function() {
      var block = $(this).attr('id').replace ("scheduling-on-", "");
      process_scheduling_dates (block);
    });

    $("#scheduling-off-"+tab).change (function() {
      var block = $(this).attr('id').replace ("scheduling-off-", "");
      process_scheduling_dates (block);
    });

    $("select#avoid-action-"+tab).change (function() {
      var block = $(this).attr('id').replace ("avoid-action-", "");
      process_display_elements (block);
    });

    process_display_elements (tab);

    $("#widgets-button-"+tab).button ({
    }).click (function () {
      window.location.href = "widgets.php";
    });

    $("#exceptions-button-"+tab).button ({
    }).click (function () {
      var block = $(this).attr ("id").replace ("exceptions-button-","");
      $("#block-exceptions-" + block).toggle ();
    });

    $("#show-css-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id").replace ("show-css-button-","");
      $("#css-code-" + block).toggle ();

      if ($('#css-code-'+block).is(':visible')) {
          $("#show-css-button-"+block+" span").text ("Hide");
      } else {
          $("#show-css-button-"+block+" span").text ("Show");
        }
    });

    $("#counting-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id").replace ("counting-button-","");
      $("#paragraph-counting-" + block).toggle ();
    });

    $("#clearance-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id").replace ("clearance-button-","");
      $("#paragraph-clearance-" + block).toggle ();
    });

    $("#scheduling-on-"+tab).datepicker ({dateFormat: dateFormat, autoSize: true});
    $("#scheduling-off-"+tab).datepicker ({dateFormat: dateFormat, autoSize: true});

    $(".css-code-"+tab).click (function () {
      var block = $(this).attr('class').replace ("css-code-", "");
      if (!$('#custom-css-'+block).is(':visible')) {
        $("#edit-css-button-"+block).click ();
      }
    });

    $("#edit-css-button-"+tab).button ({
    }).click (function () {
      var block = $(this).attr('id').replace ("edit-css-button-", "");

      $("#css-left-"+block).hide();
      $("#css-right-"+block).hide();
      $("#css-center-"+block).hide();
      $("#css-float-left-"+block).hide();
      $("#css-float-right-"+block).hide();
      $("#css-sticky-left-"+block).hide();
      $("#css-sticky-right-"+block).hide();
      $("#css-sticky-top-"+block).hide();
      $("#css-sticky-bottom-"+block).hide();

      var alignment = $("select#block-alignment-"+block+" option:selected").attr('value');

      if (alignment == AI_ALIGNMENT_DEFAULT) {
        $("#css-none-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-none-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_LEFT) {
        $("#css-left-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-left-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_RIGHT) {
        $("#css-right-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-right-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_CENTER) {
        $("#css-center-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-center-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_FLOAT_LEFT) {
        $("#css-float-left-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-float-left-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_FLOAT_RIGHT) {
        $("#css-float-right-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-float-right-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_STICKY_LEFT) {
        $("#css-sticky-left-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-sticky-left-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_STICKY_RIGHT) {
        $("#css-sticky-right-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-sticky-right-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      }
      if (alignment == AI_ALIGNMENT_STICKY_TOP) {
        $("#css-sticky-top-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-sticky-top-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      } else
      if (alignment == AI_ALIGNMENT_STICKY_BOTTOM) {
        $("#css-sticky-bottom-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-sticky-bottom-"+block).text ());
        $("select#block-alignment-"+block).val (AI_ALIGNMENT_CUSTOM_CSS).change();
      }
    });


    $("#name-label-"+tab).click (function () {
      var block = $(this).attr('id').replace ("name-label-", "");

      if ($("div#settings-" + block).is (':visible'))

      if (!$('#name-edit-'+block).is(':visible')) {
        $("#name-edit-"+block).css('display', 'table-cell').val ($("#name-label-"+block).text ()).focus ();
        $("#name-label-"+block).hide();
      }
    });

    $("#name-label-container-"+tab).click (function () {
      var block = $(this).attr('id').replace ("name-label-container-", "");

      if ($("div#settings-" + block).is (':visible'))

      if (!$('#name-edit-'+block).is(':visible')) {
        $("#name-edit-"+block).css('display', 'table-cell').val ($("#name-label-"+block).text ()).focus ();
        $("#name-label-"+block).hide();
      }
    });

    $("#name-edit-"+tab).on('keyup keypress', function (e) {
      var keyCode = e.keyCode || e.which;
      ignore_key = true;
      if (keyCode == 27) {
        var block = $(this).attr('id').replace ("name-edit-", "");
        $("#name-label-"+block).show();
        $("#name-edit-"+block).hide();
        ignore_key = false;
      } else if (keyCode == 13) {
          var block = $(this).attr('id').replace ("name-edit-", "");
          $("#name-label-"+block).show().text ($("#name-edit-"+block).val ());
          $("#name-edit-"+block).hide();
          ignore_key = false;
          e.preventDefault();
          return false;
      }
    }).focusout (function() {
      if (ignore_key) {
        var block = $(this).attr('id').replace ("name-edit-", "");
        $("#name-label-"+block).show().text ($("#name-edit-"+block).val ());
        $("#name-edit-"+block).hide();
      }
      ignore_key = true;
    });

    $("#export-switch-"+tab).checkboxButton ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("export-switch-","");
      $("#export-container-" + block).toggle ();

      if ($("#export-container-" + block).is(':visible') && !$(this).hasClass ("loaded")) {
        var nonce = $(this).attr ('nonce');
        $("#export_settings_" + block).load (ajaxurl+"?action=ai_ajax_backend&export=" + block + "&ai_check=" + nonce, function() {
          $("#export_settings_" + block).attr ("name", "export_settings_" + block);
          $("#export-switch-"+block).addClass ("loaded");
        });
      }
    });

    $("input#statistics-button-"+tab).checkboxButton ().click (function () {
      disable_auto_refresh_statistics ();
      var block = $(this).attr ("id");
      block = block.replace ("statistics-button-","");
      $("div#statistics-container-" + block).toggle ();
      $("div#settings-" + block).toggle ();

      $("#toolbar-" + block + ' .ai-settings').toggle ();
      $("#toolbar-" + block + ' .ai-statistics').toggle ();

      var container = $("div#statistics-container-" + block);
      if (container.is(':visible')) {
        $("#name-label-container-"+block).css ('cursor', 'default');
        if (!$(this).hasClass ('loaded')) {
          $("input#load-custom-range-"+block).click ();
          $(this).addClass ('loaded');
        }
      } else {
          $("#name-label-container-"+block).css ('cursor', 'pointer');
        }
    });

    $("input#adb-statistics-button-"+tab).checkboxButton ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("adb-statistics-button-","");
      setTimeout (function() {$("input#load-custom-range-"+block).click ();}, 2);
    });

    configure_statistics_toolbar (tab);

    $("#device-detection-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("device-detection-button-","");
      $("#device-detection-settings-" + block).toggle ();
    });

    $("#lists-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("lists-button-","");
      $("#list-settings-" + block).toggle ();
    });

    $("#manual-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("manual-button-","");
      $("#manual-settings-" + block).toggle ();
    });

    $("#misc-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("misc-button-","");
      $("#misc-settings-" + block).toggle ();
    });

    $("#scheduling-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("scheduling-button-","");
      $("#scheduling-settings-" + block).toggle ();
    });

    $("#preview-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("preview-button-","");

      $(this).blur ();


      var alignment  = $("select#block-alignment-"+block+" option:selected").attr('value');
      var custom_css = $("#custom-css-"+block).val ();

      var alignment_css = "";
      if (alignment == AI_ALIGNMENT_DEFAULT) {
        alignment_css = $("#css-none-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_CUSTOM_CSS) {
        alignment_css = $("#custom-css-"+block).val();
      } else
      if (alignment == AI_ALIGNMENT_LEFT) {
        alignment_css = $("#css-left-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_RIGHT) {
        alignment_css = $("#css-right-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_CENTER) {
        alignment_css = $("#css-center-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_FLOAT_LEFT) {
        alignment_css = $("#css-float-left-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_FLOAT_RIGHT) {
        alignment_css = $("#css-float-right-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_STICKY_LEFT) {
        alignment_css = $("#css-sticky-left-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_STICKY_RIGHT) {
        alignment_css = $("#css-sticky-right-"+block).text ();
      }
      if (alignment == AI_ALIGNMENT_STICKY_TOP) {
        alignment_css = $("#css-sticky-top-"+block).text ();
      } else
      if (alignment == AI_ALIGNMENT_STICKY_BOTTOM) {
        alignment_css = $("#css-sticky-bottom-"+block).text ();
      }

      var name = $("#name-label-"+block).text ();

      var window_width = 820;
      var window_height = 820;
      var window_left  = 120;
      var window_top   = (screen.height / 2) - (820 / 2);
      var nonce = $(this).attr ('nonce');
//      var site_url = $(this).attr ('site-url');
//      var page = site_url+"/wp-admin/admin-ajax.php?action=ai_ajax_backend&preview=" + block + "&ai_check=" + nonce + "&alignment=" + alignment + "&css=" + encodeURI (alignment_css) + "&name=" + encodeURI (name);
//      var page = ajaxurl+"?action=ai_ajax_backend&preview=" + block + "&ai_check=" + nonce + "&alignment=" + alignment + "&css=" + encodeURI (alignment_css) + "&name=" + encodeURI (name);
//      var preview_window = window.open (page, 'preview','width='+window_width+',height='+window_height+',top='+window_top+',left='+window_left+',resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no');

      var param = {'action': 'ai_ajax_backend', 'preview': block, 'ai_check': nonce, 'name': name, 'alignment': alignment, 'alignment_css': alignment_css, 'custom_css': custom_css};
      window_open_post (ajaxurl, 'width='+window_width+',height='+window_height+',top='+window_top+',left='+window_left+',resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no', 'preview', param);
    });

    generate_country_list ('country', tab);

    $('#tracking-' + tab).checkboxButton ();
    $('#simple-editor-' + tab).checkboxButton ();
    $('#process-php-' + tab).checkboxButton ();

    $('#ai-misc-container-' + tab).tabs();
    $('#ai-misc-tabs-' + tab).show();

    $('#ai-devices-container-' + tab).tabs();
    $('#ai-devices-tabs-' + tab).show();
  }

  function generate_country_list (element_name_prefix, index) {
    if ($('#'+element_name_prefix+'-select-'+index).length !== 0) {

      $('#'+element_name_prefix+'-list-'+index).click (function () {

        if (!$('#'+element_name_prefix+'-select-'+index).hasClass ('multi-select')) {
          $('#'+element_name_prefix+'-select-'+index).addClass ('multi-select');
          $('#'+element_name_prefix+'-select-'+index).multiSelect({
            selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search...'>",
            selectedHeader: "Selected Countries",
            afterInit: function(ms){
              var that = this,
                  $selectableSearch = that.$selectableUl.prev(),
                  $selectionSearch = that.$selectionUl.prev(),
                  selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                  selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

              that.qs1 = $selectableSearch.quicksearch (selectableSearchString)
              .on('keydown', function(e){
                if (e.which === 40){
                  that.$selectableUl.focus();
                  return false;
                }
              });

              that.qs2 = $selectionSearch.quicksearch (selectionSearchString)
              .on('keydown', function(e){
                if (e.which == 40){
                  that.$selectionUl.focus();
                  return false;
                }
              });
            },
            afterSelect: function(values){
              update_country_list (this, element_name_prefix);
            },
            afterDeselect: function(values){
              update_country_list (this, element_name_prefix);
            }
          });
          $('#ms-'+element_name_prefix+'-select-'+index).hide();
        }
        update_country_selection ($(this), element_name_prefix, true)
//        $(this).focus ();
      }).focusout (function () {
        update_country_selection ($(this), element_name_prefix, false)
      });
    }
  }

  function update_country_list (select_element, element_name_prefix) {
    var ms = select_element.$element;
    var ms_val = ms.val();
    var index = ms.attr ('id').replace (element_name_prefix+'-select-','');
    $('#'+element_name_prefix+'-list-'+index).attr ('value', ms_val);
    select_element.qs1.cache();
    select_element.qs2.cache();
  }

  function update_country_selection (select_element, element_name_prefix, toggle) {
    var index = select_element.attr ('id');
    var index = index.replace (element_name_prefix+'-list-','');
    if (toggle) $('#ms-'+element_name_prefix+'-select-'+index).toggle();
    if ($('#ms-'+element_name_prefix+'-select-'+index).is(':visible')) {
      var country_array = $('#'+element_name_prefix+'-list-'+index).attr ('value').replace(/ /g , '').toUpperCase().split (',');
      $('#'+element_name_prefix+'-select-'+index).multiSelect ('deselect_all').multiSelect ('select', country_array).multiSelect('refresh');
    }
  }

  function configure_hidden_tab () {
    var current_tab;
    var tab;

    if (debug) console.log ("");
    if (debug) {
      var current_time_start = new Date().getTime();
      console.log ("since last time: " + ((current_time_start - last_time) / 1000).toFixed (3));
    }
    if (debug) console.log ("configure_hidden_tab");
    if (debug) console.log ("tabs_to_configure: " + tabs_to_configure);

    do {
      if (tabs_to_configure.length == 0) {
        if (debug_title) $("#plugin_name").css ("color", "#000");
        if (debug) console.log ("configure_hidden_tab: DONE");
        return;
      }
      current_tab = tabs_to_configure.pop();
      tab = $("#tab-" + current_tab);
    } while (tab.hasClass ('configured'));

    if (debug) console.log ("Configuring tab: " + current_tab);

    if (current_tab != 0) configure_tab (current_tab); else configure_tab_0 ();

    if (debug) {
      var current_time = new Date().getTime();
      console.log ("time: " + ((current_time - current_time_start) / 1000).toFixed (3));
      console.log ("TIME: " + ((current_time - start_time) / 1000).toFixed (3));
      last_time = current_time;
    }

    if (tabs_to_configure.length != 0) setTimeout (configure_hidden_tab, 10); else if (debug_title) $("#plugin_name").css ("color", "#000");
  }

  function configure_chart (container) {
    var ai_adb_flag_blocked = 0x80;

    if (!$(container).hasClass ('not-configured')) return;
    var template = $(container).data ('template');

    if (typeof template != 'undefined') {
      var new_colors = [];
      var color_indexes = $(container).data ('colors');
      if (typeof color_indexes != 'undefined') {
        var colors = $.elycharts.templates['ai-pie'].defaultSeries.values;
        color_indexes.forEach (function (element) {
          if (element == ai_adb_flag_blocked )
            new_colors.push (colors [9]); else
              new_colors.push (colors [element]);
        });
      }

      var values = $(container).data ('values-1');
      if (values == null) values = $(container).data ('values-2');
      if (values == null) values = $(container).data ('values-3');
      if (values == null) values = $(container).data ('values-4');
      if (values == null) values = $(container).data ('values-5');
      if (values == null) values = $(container).data ('values-6');
      if (values == null) values = $(container).data ('values-7');
      if (values == null) values = $(container).data ('values-8');
      if (values == null) values = $(container).data ('values-9');

      var legend = $(container).data ('legend');
      if (typeof legend != 'undefined' && typeof legend ['serie' + (ai_adb_flag_blocked + 1)] != 'undefined') {
        var new_legend = {};
        for (var legend_item in legend) {
          if (legend_item == 'serie' + (ai_adb_flag_blocked + 1))
            new_legend ['serie10'] = legend [legend_item]; else
              new_legend [legend_item] = legend [legend_item];
        }
        legend = new_legend;
      }

      $(container).chart({
        template: template,
        labels:   $(container).data ('labels'),
        values: {
          serie1: values,
          serie2: $(container).data ('values-2'),
          serie3: $(container).data ('values-3'),
          serie4: $(container).data ('values-4'),
          serie5: $(container).data ('values-5'),
          serie6: $(container).data ('values-6'),
          serie7: $(container).data ('values-7'),
          serie8: $(container).data ('values-8'),
          serie9: $(container).data ('values-9'),
          serie10: $(container).data ('values-' + (ai_adb_flag_blocked + 1)),  // BLOCKED
        },
        legend: legend,
        tooltips: {serie1: $(container).data ('tooltips')},
        defaultSeries: {values: new_colors, tooltip: {height: $(container).data ('tooltip-height')}},
        defaultAxis : {
          max: $(container).data ('max'),
        },
        features: {
          grid: {
            draw: values.length < 50,
          }
        }
      });

      $(container).removeClass ('not-configured');
      $(container).parent().find ('div.ai-chart-label').show ();
    }
  }

  function update_rating (parameter) {
    var rating_bar = $('#ai-rating-bar');
    var nonce = rating_bar.attr ('nonce');
    $("#rating-value span").load (ajaxurl+"?action=ai_ajax_backend&rating=" + parameter + "&ai_check=" + nonce, function() {
      var rating = $("#rating-value span").text ();
      var rating_value = 0;
      if (rating != '') var rating_value = parseFloat (rating);
      $("#rating-value").css ('width', rating_value * 20 + '%');

      if ($("#rating-value span").text () == '') {
        $("#ai-rating-bar").hide ();
        $('#ai-stars').show ();
      }
    });
  }

  function configure_charts (container) {
    $(container).find ('.ai-chart.not-configured').each (function() {
      if (!$(this).hasClass ('hidden')) {
        $(this).attr ('style', '');
        configure_chart (this);
      }
    });
  }


  if (debug) console.log ("READY");
  if (debug_title) $("#plugin_name").css ("color", "#f00");
  if (debug) {
    var current_time_ready = new Date().getTime();
    console.log ("TIME: " + ((current_time_ready - start_time) / 1000).toFixed (3));
  }

  $("#blocked-warning").removeClass ('warning-enabled');
  $("#blocked-warning").hide ();

  start         = parseInt ($('#ai-form').attr('start'));
  end           = parseInt ($('#ai-form').attr('end'));

  active_tab    = start;
  active_tab_0  = 0;
  try {
    var active_tabs = JSON.parse ($("#ai-active-tab").attr ("value"));
    if (typeof active_tabs !== "undefined" && active_tabs.constructor === Array && Number.isInteger (active_tabs [0]) && Number.isInteger (active_tabs [1])) {
      active_tab    = parseInt (active_tabs [0]);
      if (active_tab != 0)
        if (active_tab < start || active_tab > end) active_tab = start;
      active_tab_0  = parseInt (active_tabs [1]);
    }
  } catch (e) {}

  if (debug) console.log ("active_tabs:", active_tab, active_tab_0);

  var tabs_array = new Array ();
  if (active_tab != 0) tabs_array.push (0);
  for (var tab = end; tab >= start; tab --) {
    if (tab != active_tab) tabs_array.push (tab);
  }
  // Concatenate existing tabs_to_configure (if tab was clicked before page was loaded)
  tabs_to_configure = tabs_array.concat (tabs_to_configure);

  setTimeout (configure_hidden_tab, 700);

  var plugin_version = $('#ai-data').attr ('version').split ('-') [0];
  if (javascript_version != plugin_version) {
    console.log ('AD INSERTER: plugin version: ' + plugin_version + ', loaded Javascript version: ' + javascript_version);

    // Check page HTML
    var javascript_version_parameter = $("script[src*='ad-inserter.js']").attr('src');
    if (typeof javascript_version_parameter == 'undefined') $("#javascript-version-parameter-missing").show (); else {
      javascript_version_parameter_string = javascript_version_parameter.split('=')[1];
      if (typeof javascript_version_parameter_string == 'undefined') {
        $("#javascript-version-parameter-missing").show ();
      }
      else if (javascript_version_parameter_string != plugin_version) {
        console.log ('AD INSERTER: plugin version: ' + plugin_version + '- Javascript file version: ' + javascript_version_parameter_string);
        $("#javascript-version-parameter").show ();
      }
    }

    $("#javascript-version").html ("&nbsp;javascript " + javascript_version);
    $("#javascript-warning").show ();
  }

  var css_version = $('#ai-data').css ('font-family').replace(/[\"\']/g, '');
  if (css_version.indexOf ('.') == - 1) $("#blocked-warning").show (); else
    if (css_version != plugin_version) {
      console.log ('AD INSERTER: plugin version:', plugin_version, 'loaded CSS version:', css_version);

      // Check page HTML
      var css_version_parameter = $("link[href*='ad-inserter.css']").attr('href');
      if (typeof css_version_parameter == 'undefined') $("#css-version-parameter-missing").show (); else {
        css_version_parameter_string = css_version_parameter.split('=')[1];
        if (typeof css_version_parameter_string == 'undefined') {
          $("#css-version-parameter-missing").show ();
        }
        else if (css_version_parameter_string != plugin_version) {
          console.log ('AD INSERTER: plugin version:', plugin_version, '- CSS file version:', css_version_parameter_string);
          $("#css-version-parameter").show ();
        }
      }

      $("#css-version").html ("&nbsp;CSS " + css_version);
      $("#css-warning").show ();
    }

  var index = 16;
  if (active_tab != 0) index = active_tab - start;
  var block_tabs = $("#ai-tab-container").tabs ({active: index});
  $("#ai-plugin-settings-tab-container").tabs ({active: active_tab_0});

  $('#ai-settings').tooltip({
    show: {effect: "blind",
           delay: 400,
           duration: 100}
  });

  if (debug_title) $("#plugin_name").css ("color", "#00f");

  if (active_tab == 0) configure_tab_0 (); else configure_tab (active_tab);

  $('#dummy-ranges').hide();
  $('#ai-ranges').show();

  $('#dummy-tabs').hide();
  $('#ai-tabs').show();

  $('.header button').button().show ();

  $("#ai-form").submit (function (event) {
      for (var tab = start; tab <= end; tab ++) {
        remove_default_values (tab);
      }
      remove_default_values (0);
  });

  $('.ai-tab').click (function () {
    tab_block = $(this).attr ("id");
    tab_block = tab_block.replace ("ai-tab","");
    active_tab = tab_block;

    if (debug) console.log ("active_tab: " + active_tab);

    if (syntax_highlighting) {
      if (!$("#tab-" + tab_block).hasClass ('configured')) {
        if (debug) console.log ("");
        if (debug) console.log ("Empty tab: " + tab_block);
        tabs_to_configure.push (tab_block);
        setTimeout (configure_hidden_tab, 10);
        if (debug) console.log ("tabs_to_configure: " + tabs_to_configure);
      } else if (tab_block != 0) {
          var editor = ace.edit ("editor-" + tab_block);
          editor.getSession ().highlightLines (10000000);
        }
    }
  });

  $('.ai-plugin-tab').click (function () {
    active_tab_0 = $("#ai-plugin-settings-tab-container").tabs ('option', 'active');
    if (debug) console.log ("active_tab_0: " + active_tab_0);

    if (syntax_highlighting) {
      tab_block = $(this).attr ("id");
      tab_block = tab_block.replace ("ai-","");

      if (tab_block == 'h') {
          var editor = ace.edit ("editor-h");
          editor.getSession ().highlightLines (10000000);
      } else
      if (tab_block == 'f') {
          editor = ace.edit ("editor-f");
          editor.getSession ().highlightLines (10000000);
      } else
      if (tab_block == 'a') {
          editor = ace.edit ("editor-a");
          editor.getSession ().highlightLines (10000000);
      }
    }
  });

  $('#plugin_name').dblclick (function () {
    $(".system-debugging").toggle();
  });

  $('#ai-stars').click (function () {
    if ($("#rating-value span").text () != '') {
      $("#ai-rating-bar").css ('display', 'inline-block');
      $('#ai-stars').hide ();
    }
    update_rating ('update', '');
  });

  $("#ai-rating-bar").click (function () {
    $("#ai-rating-bar").hide ();
    $('#ai-stars').show ();
  });

  setTimeout (update_rating, 1000);

  if (debug) console.log ("");
  if (debug) console.log ("READY END");
  if (debug) {
    var current_time = new Date().getTime();
    console.log ("main time: " + ((current_time - current_time_ready) / 1000).toFixed (3));
  }
});
