<?php
global $wpdb;

// update
if( isset($_POST['update']) ){
    // DASHBOARD : ADD
    update_option( "eewee_admincustom_dashboard_count", $_POST['form_dashboard_count'] );
    
    for($i=0 ; $i<get_option("eewee_admincustom_dashboard_count") ; $i++){
        update_option( "eewee_admincustom_dashboard_title_".$i, $_POST['form_dashboard_title_'.$i] );
        update_option( "eewee_admincustom_dashboard_description_".$i, $_POST['form_dashboard_description_'.$i] );
    }
    
    // DASHBOARD : REMOVE
    for( $i=0 ; $i<8 ; $i++){
        update_option( "eewee_admincustom_dashboard_remove_".$i, $_POST['form_etat_'.$i] );
    }
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Dashboard', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_dashboardEdit = new Form_DashboardEdit();
    $f_dashboardEdit->dashboardEdit();
    ?>
</div><!-- .wrap -->
 