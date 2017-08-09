<?php
global $wpdb;

// update
if( isset($_GET['type']) && $_GET['type'] == "delete" ){
    
    // ROLE : DELETE
    
    // gets the author role
    $role = get_role( $_GET['idRole'] );
    
    remove_role( $role->name );
    
    echo '
    <div id="setting-error-settings_updated" class="updated settings-error"> 
        <p><strong>'.__("Options recorded.", PLUGIN_NOM_LANG).'</strong></p>
    </div>';
    
    echo "<br /><a href='".EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_5."' class='button'>".__('Back', PLUGIN_NOM_LANG)."</a>";
    
}//if
?> 