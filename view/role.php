<?php global $wpdb; ?>

<div class="wrap" >
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Role', PLUGIN_NOM_LANG); ?> <a href="<?php echo $_SERVER["REQUEST_URI"]."&type=add"; ?>" class="add-new-h2"><?php _e('Add', PLUGIN_NOM_LANG); ?></a></h2>
</div>

<?php
//use fr\eewee\role;
$role = new fr\eewee\role\RoleController();
$r = $role->getRoles();

// display
$render = "
<table class='eewee-table'>
    <tr>
        <th>
            ".__('Role', PLUGIN_NOM_LANG)."
        </th>
        <th>
            ".__('Edit', PLUGIN_NOM_LANG)."
        </th>
        <th>
            ".__('Delete', PLUGIN_NOM_LANG)."
        </th>
    </tr>";
    $i = 0;
    foreach($r as $v){
        $render .= "
        <tr>
            <td class='c'>
                ".$v."
            </td>
            <td class='c'>
                <a href='".EEWEE_ADMINCUSTOM_URL_SOUS_MENU_5."&type=edit&idRole=".$v."'>".__('Edit', PLUGIN_NOM_LANG)."</a>
            </td>
            <td class='c'>";
                if( $i > 4 ){
                    $render .= "
                    <a onclick=\"return confirm('".__("Thank you to confirm the deletion ?", PLUGIN_NOM_LANG)."');\" href='".EEWEE_ADMINCUSTOM_URL_SOUS_MENU_5."&type=delete&idRole=".$v."'>".__('Delete', PLUGIN_NOM_LANG)."</a>";
                }
            $render .= "
            </td>
        </tr>";
        $i++;
    }//fin foreach

$render .= "
</table>";
echo $render;