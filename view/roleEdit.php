<?php
global $wpdb;

// update
if( isset($_POST['update']) ){
    
    // ROLE : EDIT
    
    // gets the author role
    $role = get_role( $_POST['idRole'] );
    // list
    $capabilities = new fr\eewee\role\RoleController();
    $tbl_caps = $capabilities->getCapabilities();
    // save
    foreach( $tbl_caps as $k=>$v ){
        if( $_POST["form_etat_".$k] ){
            $role->add_cap( $k ); 
        }else{
            $role->remove_cap( $k );
        }
    }
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Edit capabilities', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_roleEdit = new Form_RoleEdit();
    $f_roleEdit->roleEdit();
    ?>
</div><!-- .wrap -->
 