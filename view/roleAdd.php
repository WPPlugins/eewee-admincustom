<?php
global $wpdb;

// update
if( isset($_POST['add']) ){
    
    // ROLE : ADD
    $nameBdd        = str_replace( " ", "_", $_POST['form_role_name']);
    $nameDisplay    = $_POST['form_role_name'];
    $result = add_role($nameBdd, $nameDisplay);
    if (null !== $result) {
        echo '
        <div id="setting-error-settings_updated" class="updated settings-error"> 
            <p><strong>'.__("Options recorded.", PLUGIN_NOM_LANG).'</strong></p>
        </div>';
    } else {
        echo '<div class="error"><p><strong>'.__("ERROR", PLUGIN_NOM_LANG).'</strong>&nbsp;: '.__("Update unrealized. Role already exists.", PLUGIN_NOM_LANG).'.</p></div>';
    }
    
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Add role', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_roleAdd = new Form_RoleAdd();
    $f_roleAdd->roleAdd();
    ?>
</div><!-- .wrap -->
 