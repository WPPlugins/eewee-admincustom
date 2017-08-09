<?php
global $wpdb;

// update
if( isset($_POST['update']) ){
    
    // DASHBOARD : ADD
    update_option( "eewee_admincustom_adminbar_count", $_POST['form_adminbar_count'] );
    
    for($i=0 ; $i<get_option("eewee_admincustom_adminbar_count") ; $i++){
        update_option( "eewee_admincustom_adminbar_menutitle_".$i, $_POST['form_adminbar_menutitle_'.$i] );
        
        for($j=0 ; $j<5 ; $j++){
            update_option( "eewee_admincustom_adminbar_title_".$i."_".$j, $_POST['form_adminbar_title_'.$i.'_'.$j] );
            update_option( "eewee_admincustom_adminbar_url_".$i."_".$j, $_POST['form_adminbar_url_'.$i.'_'.$j] );
        }
    }
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Admin bar', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_edit = new Form_AdminBarEdit();
    $f_edit->adminbarEdit();
    ?>
</div><!-- .wrap -->
 