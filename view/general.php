<?php
global $wpdb;

// update
if( isset($_POST['update']) ){
    // FAVICON
    update_option( "eewee_admincustom_favicon_etat", $_POST['form_etat_favicon'] );
    update_option( "eewee_admincustom_favicon_url_ico", $_POST['form_url_favicon_ico'] );
    update_option( "eewee_admincustom_favicon_url_png", $_POST['form_url_favicon_png'] );
    
    // ADMIN LOGO
    update_option( "eewee_admincustom_admin_logo_etat", $_POST['form_admin_logo_etat'] );
    update_option( "eewee_admincustom_admin_logo_url", $_POST['form_admin_logo_url'] );
    update_option( "eewee_admincustom_admin_bg_url", $_POST['form_admin_bg_url'] );
    
    // ADMIN FOOTER
    update_option( "eewee_admincustom_admin_footer_etat", $_POST['form_admin_footer_etat'] );
    update_option( "eewee_admincustom_admin_footer_name_poweredby", $_POST['form_admin_footer_name_poweredby'] );
    update_option( "eewee_admincustom_admin_footer_url_poweredby", $_POST['form_admin_footer_url_poweredby'] );
    update_option( "eewee_admincustom_admin_footer_url_email", $_POST['form_admin_footer_url_email'] );
    update_option( "eewee_admincustom_admin_footer_other_text", $_POST['form_admin_footer_other_text'] );

    // ADMIN NOTIFICATION HIDE
    update_option( "eewee_admincustom_admin_notification_hide_etat", $_POST['form_admin_notification_hide_etat'] );
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('General', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_generalEdit = new Form_GeneralEdit();
    $f_generalEdit->generalEdit();
    ?>
</div><!-- .wrap -->
 