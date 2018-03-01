<?php

// wp error messages system function
function chaletsetcaviar_requirement_admin_notice() {
    ?>
    <div class="notice notice-warning is-dismissible">
        <p><?php _e( 'chaletsetcaviar a besoin de <a href="'.get_admin_url().'/plugin-install.php?tab=plugin-information&amp;plugin=advanced-custom-fields&amp;TB_iframe=true" class="thickbox" aria-label="Plus d\'information sur Advanced Custom Fields" data-title="advanced-custom-fields">advanced-custom-fields</a>', 'chaletsetcaviar' ); ?></p>
        <button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e('fermer cette alerte.','chaletsetcaviar'); ?></span></button>
    </div>
    <?php
}
// check framework and show message
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_inactive('advanced-custom-fields/acf.php') ) {
    add_action( 'admin_notices', 'chaletsetcaviar_requirement_admin_notice' );
}

//link user to Plugins Manager page to activate required plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( basename( $_SERVER['PHP_SELF']) !== "plugins.php" ) { ?>
    <p><?php _e( 'Apres installation, allez à <a href="'.get_admin_url().'plugins.php">Extensions</a> pour activer.', 'chaletsetcaviar' ); ?></p>
<?php } ?>
