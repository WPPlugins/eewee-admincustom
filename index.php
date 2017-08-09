<?php 
/*
Plugin Name: Eewee admin custom
Plugin URI: http://www.eewee.fr
Description: Management of wordpress admin (logo, description, message, …)
Version: 1.8.2.4
Author: Michael DUMONTET
Author URI: http://www.eewee.fr/wordpress/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Definitions
 *
 * @since 1.0.0
 */
global $wpdb;
define( 'EEWEE_VERSION', '1.8.2.4' );
define( 'EEWEE_ADMINCUSTOM_PLUGIN_DIR', 		WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'EEWEE_ADMINCUSTOM_PLUGIN_URL', 		WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) );
//define( 'EEWEE_ADMINCUSTOM_PREFIXE_BDD',		$wpdb->prefix.'eewee_admincustom_');
define( 'PLUGIN_NOM_LANG',                              "eewee-admincustom");
define( 'EEWEE_ADMINCUSTOM_DEBUG',   		        false);
for( $i=1 ; $i<=6 ; $i++ ){
    define( 'EEWEE_ADMINCUSTOM_URL_SOUS_MENU_'.$i,      admin_url( 'admin.php?page=idSousMenuAC'.$i, 'http' ) );
    define( 'EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_'.$i,	admin_url().'admin.php?page=idSousMenuAC'.$i);
}


load_plugin_textdomain(PLUGIN_NOM_LANG, false, dirname( plugin_basename( __FILE__ ) ) . '/lang');

/**
 * Required CSS
 *
 * @since 1.0.0
 */
function ajouterScriptsEeweeAdminCustom(){
	wp_enqueue_style( PLUGIN_NOM_LANG.'-style', '/wp-content/plugins/eewee-admincustom/css/style.css' );
}
add_action( 'init', 'ajouterScriptsEeweeAdminCustom' );


/**
 * Required Files
 *
 * @since 1.0.0
 */
// MODELS
//require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/models/TGeneral.php' );
// FORMS
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FGeneralEdit.php' );
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FDashboardEdit.php' );
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FHelptabEdit.php' );
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FAdminbarEdit.php' );
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FRoleAdd.php' );
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FRoleEdit.php' );
require_once ( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/forms/FBreadcrumbEdit.php' );
// CONTROLLERS
//require_once( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/controllers/WidgetAdsController.php' );
require_once( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/controllers/BreadcrumbController.php' );
require_once( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/controllers/RoleController.php' );
require_once( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/controllers/AdminBarController.php' );
require_once( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/controllers/HelptabController.php' );
require_once( EEWEE_ADMINCUSTOM_PLUGIN_DIR . '/controllers/AdminController.php' );


/**
 * Instantiate Classe
 *
 * @since 1.0.0
 */
$adminController = new AdminController();


/**
 * Wordpress Activate/Deactivate
 *
 * @uses register_activation_hook()
 * @uses register_deactivation_hook()
 * @uses register_uninstall_hook()
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, array( $adminController, 'eewee_activate' ) );
register_deactivation_hook( __FILE__, array( $adminController, 'eewee_deactivate' ) );
//register_uninstall_hook( __FILE__, array( $adminController, 'eewee_uninstall' ) ); // attention l'extension sera execute une derniere fois avant sa suppression.


/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
add_action( 'admin_menu', array( $adminController, 'eewee_adminMenu' ) );


/**
 * Debug
 * 
 * Print session, post, get, files
 */
if( EEWEE_ADMINCUSTOM_DEBUG ){	
	echo "<pre>"; 
		var_dump( $_SESSION, $_POST, $_GET, $_FILES );
	echo "</pre>"; 
}
?>