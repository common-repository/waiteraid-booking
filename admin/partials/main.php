<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin/Partials
 * @author     WaiterAid <info@waiteraid.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="wrap">
    <h1 class="wp-heading-inline">WaiterAid Booking v.<?php echo $this->version; ?></h1>
    <hr class="wp-header-end">
    <?php
    $url_form = admin_url() . 'admin.php?page=' . $this->plugin_name;
    ?>
    <form action="<?php echo $url_form; ?>" method="post" name="post" class="waiteraid-booking" id="waiteraid-booking">
        <div id="poststuff" style="padding: 0;">
            <div id="post-body" class="metabox-holder columns-2">
                <div id="post-body-content" style="position: relative;">
                    <div id="postdivrich" class="postarea wp-editor-expand waiteraid-button-preview">
                        <h3><span class="dashicons dashicons-admin-customizer"></span> <?php esc_html_e('Button Preview', $this->plugin_name); ?></h3>
                        <div class="waiteraid-button-builder">
                            <button id="waiteraid-button-preview"><span class="content"></span></button>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div id="postbox-container-1" class="postbox-container" style="margin-top: 16px;">
                    <div id="submitdiv" class="postbox ">
                        <h2 class="hndle ui-sortable-handle"><span><?php esc_html_e('Save & Publish', $this->plugin_name); ?></span></h2>
                        <div class="inside">
                            <div class="container">
                                <div class="element">
                                    <p>
                                        <?php _e("Click on <strong>Save</strong> to save the button's style.", $this->plugin_name); ?>
                                    </p>
                                    <p>
                                        <?php _e("If <strong>Button Type</strong> is set to <strong>Standard</strong>, you can use the following shortcode to display it in any content : ", $this->plugin_name); ?>
                                    </p>
                                    <p>
                                        <span id="shortcode">
                                            <code>[waiteraid_booking_button]</code>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="submitbox" id="submitpost">
                                <div id="major-publishing-actions">
                                    <div id="publishing-action">
                                        <span class="saving"><?php esc_html_e('Saving', $this->plugin_name); ?></span> <input
                                            name="submit" id="submit"
                                            class="button button-primary button-large"
                                            value="<?php esc_html_e('Save', $this->plugin_name); ?>" type="submit">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Block for main settings pages-->
                <div id="postbox-container-2" class="postbox-container">
                    <div id="waiteraid-postoptions" class="postbox ">
                        <div class="inside">
                            <div class="tab-box">
                                <ul class="tab-nav">
                                <?php
                                    $tab_menu = array(
                                        'general' => esc_attr__('General', $this->plugin_name) ,
                                        'color' => esc_attr__('Color', $this->plugin_name) ,
                                        'border' => esc_attr__('Border', $this->plugin_name) ,
                                        'shadow' => esc_attr__('Shadow', $this->plugin_name) ,
                                        'advanced' => esc_attr__('Advanced', $this->plugin_name) ,
                                    );
                                    $i = 1;
                                    foreach ($tab_menu as $menu => $val) {
                                        $class = ($i == 1) ? 'class="select"': '';
                                        echo '<li><a ' . $class . ' href="#t' . $i . '">' . $val . '</a></li>';
                                        $i++;
                                    }
                                ?>
                                </ul>
                                <div class="tab-panels">
                                <?php
                                    $t = 1;
                                    foreach ($tab_menu as $menu => $val) {
                                        echo '<div id="t' . $t . '">';
                                        // includes the settings pages
                                        include_once ($menu . '.php');
                                        echo '</div>';
                                        $t++;
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  main param for adding in database-->
        <input type="hidden" name="page" value="<?php echo $this->plugin_name; ?>"/>
        <?php wp_nonce_field($this->plugin_name . '_action', $this->plugin_name . '_nonce'); ?>
    </form>
</div>
