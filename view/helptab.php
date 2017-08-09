<?php
global $wpdb;

// update
if( isset($_POST['update']) ){
    // HELP TAB : ADD
    update_option( "eewee_admincustom_helptab_count", $_POST['form_helptab_count'] );
    
    for($i=0 ; $i<get_option("eewee_admincustom_helptab_count") ; $i++){
        update_option( "eewee_admincustom_helptab_page_".$i, $_POST['form_helptab_page_'.$i] );
        update_option( "eewee_admincustom_helptab_title_".$i, $_POST['form_helptab_title_'.$i] );
        update_option( "eewee_admincustom_helptab_description_".$i, $_POST['form_helptab_description_'.$i] );
    }
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Help tab', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_helptabEdit = new Form_HelptabEdit();
    $f_helptabEdit->helptabEdit();
    ?>
</div><!-- .wrap -->
 