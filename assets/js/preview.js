'use strict';

(function ($) {
  jQuery('#waiteraid-postoptions').on('change', function () {
    waiteraid_preview_button();
  })
  $(".wp-color-picker-field").wpColorPicker(
    'option',
    'change',
    function () {
      waiteraid_preview_button();
    }
  );
  waiteraid_preview_button();
})(jQuery);

// Build button
function waiteraid_preview_button() {

  var buttonPreview = jQuery('#waiteraid-button-preview');

  buttonPreview.on('click', function(e) {
    e.preventDefault();
    jQuery(this).blur();
    return false;
  });

  var btn_text = jQuery('#waiteraid-text').val();

  var font_size = jQuery('#waiteraid-font-size').val();
  var font_family = jQuery('#waiteraid-font-family').val();
  var font_weight = jQuery('#waiteraid-font-weight').val();
  var font_style = jQuery('#waiteraid-font-style').val();

  var width = jQuery('#waiteraid-width').val();
  var height = jQuery('#waiteraid-height').val();
  var color = jQuery('#waiteraid-color').val();
  var background = jQuery('#waiteraid-background').val();

  var borderRadiusVal = jQuery('#waiteraid-border-radius').val();
  var border_radius = borderRadiusVal + 'px '
                    + borderRadiusVal + 'px '
                    + borderRadiusVal + 'px '
                    + borderRadiusVal + 'px';

  var border_style = jQuery('#waiteraid-border-style').val();
  var border_color = jQuery('#waiteraid-border-color').val();
  var border_width = jQuery('#waiteraid-border-width').val();

  var shadow = jQuery('#waiteraid-shadow').val();
  var shadow_h_offset = jQuery('#waiteraid-shadow-h-offset').val();
  var shadow_v_offset = jQuery('#waiteraid-shadow-v-offset').val();
  var shadow_blur = jQuery('#waiteraid-shadow-blur').val();
  var shadow_spread = jQuery('#waiteraid-shadow-spread').val();
  var shadow_color = jQuery('#waiteraid-shadow-color').val();

  var margin_top = jQuery('#waiteraid-margin-top').val();
  var margin_right = jQuery('#waiteraid-margin-right').val();
  var margin_bottom = jQuery('#waiteraid-margin-bottom').val();
  var margin_left = jQuery('#waiteraid-margin-left').val();

  var padding_top = jQuery('#waiteraid-padding-top').val();
  var padding_right = jQuery('#waiteraid-padding-right').val();
  var padding_bottom = jQuery('#waiteraid-padding-bottom').val();
  var padding_left = jQuery('#waiteraid-padding-left').val();

  var boxshadow = '';

  if (shadow === 'none') {
    boxshadow = '';
  } else if (shadow === 'outset') {
    boxshadow = shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
  } else if (shadow === 'inset') {
    boxshadow = 'inset ' + shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
  }

  var margin = '';
  if(margin_top === 0 && margin_right === 0 && margin_bottom === 0 && margin_left === 0) {
    margin = 0;
  } else {
    var marginTop = (margin_top === 0) ? 0 : margin_top + 'px';
    var marginRight = (margin_right === 0) ? 0 : margin_right + 'px';
    var marginBottom = (margin_bottom === 0) ? 0 : margin_bottom + 'px';
    var marginLeft = (margin_left === 0) ? 0 : margin_left + 'px';
    margin = marginTop + ' ' + marginRight + ' ' + marginBottom + ' ' + marginLeft;
  }

  var padding = '';
  if(padding_top === 0 && padding_right === 0 && padding_bottom === 0 && padding_left === 0) {
    padding = 0;
  } else {
    var paddingTop = (padding_top === 0) ? 0 : padding_top + 'px';
    var paddingRight = (padding_right === 0) ? 0 : padding_right + 'px';
    var paddingBottom = (padding_bottom === 0) ? 0 : padding_bottom + 'px';
    var paddingLeft = (padding_left === 0) ? 0 : padding_left + 'px';
    padding = paddingTop + ' ' + paddingRight + ' ' + paddingBottom + ' ' + paddingLeft;
  }

  buttonPreview.css({
    width: width,
    height: height,
    lineHeight: 'normal',
    backgroundColor: background,
    color: color,
    borderRadius: border_radius,
    '-moz-border-radius': border_radius,
    '-webkit-border-radius': border_radius,
    borderStyle: border_style,
    borderColor: border_color,
    borderWidth: border_width + 'px',
    boxShadow: boxshadow,
    fontSize: font_size + 'px',
    fontFamily: font_family,
    fontWeight: font_weight,
    fontStyle: font_style,
    textAlign: 'center',
    margin: margin,
    padding: padding,
    position: 'relative'
  });

  jQuery('#waiteraid-button-preview .content').html(btn_text);

  var hoverBackground = jQuery('#waiteraid-hover-background').val();
  var hoverColor = jQuery('#waiteraid-hover-color').val();

  buttonPreview.hover(
      function() {
        jQuery(this).css( { 'color': hoverColor, 'background-color': hoverBackground } );
      }, function() {
        jQuery(this).css( { 'color': color, 'background-color': background } );
      }
  );
}
