<?php
if( !defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') )
    exit();

// DELETE OPTIONS :

// General
delete_option('eewee_admincustom_favicon_etat');
delete_option('eewee_admincustom_favicon_url_ico');
delete_option('eewee_admincustom_favicon_url_png');
delete_option('eewee_admincustom_admin_logo_etat');
delete_option('eewee_admincustom_admin_logo_url');
delete_option('eewee_admincustom_admin_bg_url');
delete_option('eewee_admincustom_admin_footer_etat');
delete_option('eewee_admincustom_admin_footer_name_poweredby');
delete_option('eewee_admincustom_admin_footer_url_poweredby');
delete_option('eewee_admincustom_admin_footer_url_email');
delete_option('eewee_admincustom_admin_footer_other_text');
delete_option('eewee_admincustom_admin_notification_hide_etat');

// Dashboard
for($i=0 ; $i<get_option("eewee_admincustom_dashboard_count") ; $i++){
    delete_option('eewee_admincustom_dashboard_title_'.$i);
    delete_option('eewee_admincustom_dashboard_description_'.$i);
}
for( $i=0 ; $i<8 ; $i++){
    delete_option( 'eewee_admincustom_dashboard_remove_'.$i );
}
delete_option('eewee_admincustom_dashboard_count');

// Help tab
for($i=0 ; $i<get_option("eewee_admincustom_helptab_count") ; $i++){
    delete_option( "eewee_admincustom_helptab_page_".$i );
    delete_option( "eewee_admincustom_helptab_title_".$i );
    delete_option( "eewee_admincustom_helptab_description_".$i );
}
delete_option( "eewee_admincustom_helptab_count" );

// Admin bar
for($i=0 ; $i<get_option("eewee_admincustom_adminbar_count") ; $i++){
    delete_option( "eewee_admincustom_adminbar_menutitle_".$i );

    for($j=0 ; $j<5 ; $j++){
        delete_option( "eewee_admincustom_adminbar_title_".$i."_".$j );
        delete_option( "eewee_admincustom_adminbar_url_".$i."_".$j );
    }
}
delete_option( "eewee_admincustom_adminbar_count" );

// Role
// ...

// Breadcrumb
delete_option( "eewee_admincustom_breadcrumb_etat" );
delete_option( "eewee_admincustom_breadcrumb_separator" );
    


    

// DELETE TABLE :
// ...
?>
