<?php
if( isset($_GET['type']) && $_GET['type'] == "edit" ){		include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/roleEdit.php');
}elseif( isset($_GET['type']) && $_GET['type'] == "delete" ){	include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/roleDelete.php');
}elseif( isset($_GET['type']) && $_GET['type'] == "add" ){	include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/roleAdd.php');
}else{                                                          include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/role.php');
}
?>