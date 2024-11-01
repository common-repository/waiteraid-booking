'use strict';

jQuery.migrateMute = true;

var wab_admin_errors;

(function ($) {

  $("#waiteraid-booking").on('submit', function (event) {
    event.preventDefault();
    var dataForm = 'action=waiteraid_save_button_data&' + $(this).serialize();
    $('.waiteraid-booking .saving').animate({opacity: "0.75"});
    var thickbox = $('a.thickbox');
    $.post(ajaxurl, dataForm, function (response) {
      var successHtml, errorHtml;
      if (response.status === 'OK') {
        successHtml = '<h3 style="margin: 0;">' + wab_admin_errors.success_title + '</h3>'
                        + '<p style="padding: 0;">' + response.message + '</p>';
        thickbox.attr('href', '#TB_inline?inlineId=wabModalContent&height=68&width=300&modal=true');
        thickbox.trigger('click');
        $('#TB_ajaxContent').html(successHtml);
        setTimeout(function() {
          tb_remove();
        }, 2000);
      } else if (response.status === 'ERROR') {
        errorHtml = '<h3 style="margin: 0;">' + wab_admin_errors.error_title + '</h3>'
                      + '<ul style="list-style: circle; padding-left: 16px;">';
        for (var val in response.errors) {
          if(val === 'data' || val === 'nonce' || val === 'page' || val === 'permission' ) {
            errorHtml += '<li>' + wab_admin_errors[val] + '</li>';
          } else {
            errorHtml += '<li>' + $('label[for="waiteraid-' + val.replace('_','-') + '"]').html() + ' value is invalid, please check.</li>';
          }
        }
        errorHtml += '</ul>';
        thickbox.attr('href', '#TB_inline?inlineId=wabModalContent&height=auto&width=480&modal=true');
        thickbox.trigger('click');

        $('#TB_ajaxContent').html(errorHtml);
        $('#TB_overlay, #TB_window').on('click', function() {
          tb_remove();
        });
      } else {
        errorHtml = '<h3 style="margin: 0;">' + wab_admin_errors.error_title + '</h3>'
            + '<p style="padding: 0;">' + wab_admin_errors.unknown_error + '</p>';
        thickbox.attr('href', '#TB_inline?inlineId=wabModalContent&height=68&width=300&modal=true');
        thickbox.trigger('click');
        $('#TB_ajaxContent').html(errorHtml);
        setTimeout(function() {
          tb_remove();
        }, 2000);
      }
      $('.waiteraid-booking .saving').animate({opacity: "0"});
    });
  });

  $('.waiteraid-booking .tab-nav li:first').addClass('select');
  $('.waiteraid-booking .tab-panels>div').hide().filter(':first').show();
  $('.waiteraid-booking .tab-nav a').on('click', function () {
    $('.waiteraid-booking .tab-panels>div').hide().filter(this.hash).show();
    $('.waiteraid-booking .tab-nav li').removeClass('select');
    $(this).parent().addClass('select');
    return false;
  });

  //* Include colorpicker
  $('.wp-color-picker-field').wpColorPicker();

  $('body').on('hover', '.waiteraid-help', function () {
    if ( $(this).hasClass( "dashicons-lock" ) ) {
      $(this).removeClass('dashicons-lock');
      $(this).addClass('dashicons-unlock');
    }
    else if ( $(this).hasClass( "dashicons-unlock" ) ){
      $(this).removeClass('dashicons-unlock');
      $(this).addClass('dashicons-lock');
    }
  })

  waiteraid_attach_tooltips($(".waiteraid-help"));

  waiteraid_buttontype();
  waiteraid_buttonlocation();
  waiteraid_border();
  waiteraid_shadowblock();

})(jQuery);

function waiteraid_buttontype() {
  var buttonType = jQuery('#waiteraid-type').val();
  var buttonLocation = jQuery('.waiteraid-button-location');
  var buttonAligntment = jQuery('.waiteraid-button-alignment');
  buttonLocation.css('display', 'none');
  buttonAligntment.css('display', 'none');
  if (buttonType === 'floating') {
    buttonLocation.css('display', 'block');
  } else if (buttonType === 'standard') {
    buttonAligntment.css('display', 'block');
  }
}

function waiteraid_buttonlocation() {
  var loc = jQuery('#waiteraid-location').val();
  var topBottom = jQuery('.waiteraid-top-bottom');
  var leftRight = jQuery('.waiteraid-left-right');
  var lgTop = jQuery('#waiteraid-lg-top');
  var lgBottom = jQuery('#waiteraid-lg-bottom');
  var lgLeft = jQuery('#waiteraid-lg-left');
  var lgRight = jQuery('#waiteraid-lg-right');

  topBottom.css('visibility', 'visible');
  leftRight.css('visibility', 'visible');
  lgTop.css('display', 'none');
  lgBottom.css('display', 'none');
  lgLeft.css('display', 'none');
  lgRight.css('display', 'none');
  if (loc === 'topLeft') {
    lgTop.css('display', 'block');
    lgLeft.css('display', 'block');
  } else if (loc === 'topCenter') {
    lgTop.css('display', 'block');
    leftRight.css('visibility', 'hidden');
  } else if (loc === 'topRight') {
    lgTop.css('display', 'block');
    lgRight.css('display', 'block');
  } else if (loc === 'bottomLeft') {
    lgBottom.css('display', 'block');
    lgLeft.css('display', 'block');
  } else if (loc === 'bottomCenter') {
    lgBottom.css('display', 'block');
    leftRight.css('visibility', 'hidden');
  } else if (loc === 'bottomRight') {
    lgBottom.css('display', 'block');
    lgRight.css('display', 'block');
  } else if (loc === 'left') {
    topBottom.css('visibility', 'hidden');
    lgLeft.css('display', 'block');
  } else if (loc === 'right') {
    topBottom.css('visibility', 'hidden');
    lgRight.css('display', 'block');
  }
}

function waiteraid_border() {
  var border = jQuery('#waiteraid-border-style').val();
  if (border === 'none') {
    jQuery('.waiteraid-border').css('display', 'none');
  } else {
    jQuery('.waiteraid-border').css('display', 'block');
  }
}

function waiteraid_shadowblock() {
  var shadow = jQuery('#waiteraid-shadow').val();
  if (shadow === 'none') {
    jQuery('.waiteraid-shadow').css('visibility', 'hidden');
    jQuery('.waiteraid-shadow-block').css('display', 'none');
  } else {
    jQuery('.waiteraid-shadow').css('visibility', 'visible');
    jQuery('.waiteraid-shadow-block').css('display', '');
  }
}

function waiteraid_attach_tooltips(selector) {
  selector.tooltip({
    content: function () {
      return jQuery(this).prop("title")
    },
    tooltipClass: "waiteraid-ui-tooltip",
    position: {
      my: "center top",
      at: "center bottom+10",
      collision: "flipfit"
    },
    hide: {
      duration: 200
    },
    show: {
      duration: 200
    }
  })
}


