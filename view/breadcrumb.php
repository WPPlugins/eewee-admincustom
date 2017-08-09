<?php
global $wpdb;

// update
if( isset($_POST['update']) ){
    // BREADCRUMB
    update_option( "eewee_admincustom_breadcrumb_etat", $_POST['form_etat_breadcrumb'] );
    update_option( "eewee_admincustom_breadcrumb_separator", $_POST['form_breadcrumb_separator'] );
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Breadcrumb', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_breadcrumbEdit = new Form_BreadcrumbEdit();
    $f_breadcrumbEdit->breadcrumbEdit();
    ?>
</div><!-- .wrap -->
 