<?php
//namespace FrEeweePluginAdminCustomAdmin;
//if( !class_exists(AdminController)){
    class AdminController{

        function __construct(){

            // url logo + title
            function eewee_wp_login_url() { return home_url(); }
            function eewee_wp_login_title() { return get_option('blogname'); }
            add_filter('login_headerurl', 'eewee_wp_login_url');
            add_filter('login_headertitle', 'eewee_wp_login_title');

            /*
            // Head admin : + New (add content)
            function mytheme_admin_bar_render() {
                    global $wp_admin_bar;
                    $wp_admin_bar->add_menu( array(
                            'parent' => 'new-content', // use 'false' for a root menu, or pass the ID of the parent menu
                            'id' => 'new_media', // link ID, defaults to a sanitized title value
                            'title' => __('Media'), // link title
                            'href' => admin_url( 'media-new.php'), // name of file
                            'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
                    ));
            }
            add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
            */



            /*
            // Display notice on all page
            add_action( 'admin_notices', 'eewee_admin_notice_page' );
            function eewee_admin_notice_page(){
                global $current_screen;
                var_dump($current_screen);
                //if ( $current_screen->parent_base == 'options-general' )
                if ( $current_screen->parent_base == 'page' )
                        echo "<div class='updated'><p>".$mess."</p></div>";
            }
            */

            // favicon
            if( get_option( "eewee_admincustom_favicon_etat" ) ){
                add_action('wp_head', array( $this, 'eewee_favicon'));
            }

            // admin logo
            if( get_option( "eewee_admincustom_admin_logo_etat" ) ){
                add_action('login_head', array( $this, 'eewee_admin_logo'));
            }

            // admin footer
            if( get_option( "eewee_admincustom_admin_footer_etat" ) ){
                add_filter('admin_footer_text', array( $this, 'eewee_admin_footer'));			
            }

            // admin notification hide
            if( get_option( "eewee_admincustom_admin_notification_hide_etat" ) ){
                add_action('admin_head', array( $this, 'eewee_admin_notification_hide'));
            }

            // admin dashboard add widgets
            if( get_option( "eewee_admincustom_dashboard_count" ) ){
                add_action('wp_dashboard_setup', array($this, 'eewee_dashboard_widgets') );
            }

            // admin dashboard remove widgets
            add_action('admin_menu', array($this, 'eewee_dashboard_widgets_remove') );
            //add_action('wp_dashboard_setup', array($this, 'eewee_dashboard_widgets_remove') );

            // admin help tab
            if( get_option( "eewee_admincustom_helptab_count" ) ){
                for($i=0 ; $i<get_option("eewee_admincustom_helptab_count") ; $i++){
                    if( get_option("eewee_admincustom_helptab_page_".$i) == $GLOBALS['pagenow']){
                        add_action( 'load-'.get_option("eewee_admincustom_helptab_page_".$i), array( 'HelptabController', 'init' ) );
                    }
                }
            }

            // admin bar
            if( get_option( "eewee_admincustom_adminbar_count" ) ){
                add_action( "init", array($this, "eewee_admin_bar") );
            }
            
            // breadcrumb
            if( get_option( "eewee_admincustom_breadcrumb_etat" ) ){
                add_action( "loop_start", array($this, "eewee_breadcrumb") );
            }
            
            /*
            // admin debug
            if( get_option( "eewee_admincustom_debugmode_enabled" ) ){
                add_action( "init", array($this, "eewee_debug_mode") );
            }
            */
            
            // Widget
            //add_action( 'widgets_init', create_function( '', 'register_widget( "fr\eewee\WidgetAdsController" );' ) );

            
        }

        /**
         * init
         */
        function init(){ /*$this->getOptionsAdmin();*/ }

        /**
         * execute lors de l'activation du plugin
         */
        function eewee_activate(){}

        /**
         * execute lors de la désactivation du plugin
         */
        function eewee_deactivate(){}

        /**
         * execute lors de la désinstallation du plugin
         */
        //function eewee_uninstall(){}

        /**
         * Gestion des menus du site
         */
        function eewee_adminMenu(){
            // menu principale
            add_menu_page( "Admin Custom", "Admin Custom", "manage_options", "idAdminCustom", array($this, "menu"), plugins_url("eewee-admincustom/images/icones/logo.png") );

            // sous menu dans le menu principale
            add_submenu_page( "idAdminCustom", "General", "General", "manage_options", "idSousMenuAC1", array($this, "sousMenu1"));
            add_submenu_page( "idAdminCustom", "Dashboard", "Dashboard", "manage_options", "idSousMenuAC2", array($this, "sousMenu2"));
            add_submenu_page( "idAdminCustom", "Help Tab", "Help Tab", "manage_options", "idSousMenuAC3", array($this, "sousMenu3"));
            add_submenu_page( "idAdminCustom", "Admin Bar", "Admin Bar", "manage_options", "idSousMenuAC4", array($this, "sousMenu4"));
            add_submenu_page( "idAdminCustom", "Role", "Role", "manage_options", "idSousMenuAC5", array($this, "sousMenu5"));
            add_submenu_page( "idAdminCustom", "Breadcrumb", "Breadcrumb", "manage_options", "idSousMenuAC6", array($this, "sousMenu6"));

            // appel init
            add_action('admin_init', array($this, 'init'));
        }

        /**
         * Page : menu principale
         */
        function menu(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/manuel.php'); }
        function sousMenu1(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/generalRoot.php'); }
        function sousMenu2(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/dashboardRoot.php'); }
        function sousMenu3(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/helptabRoot.php'); }
        function sousMenu4(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/adminbarRoot.php'); }
        function sousMenu5(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/roleRoot.php'); }
        function sousMenu6(){ include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/breadcrumbRoot.php'); }

        /**
         * Favicon custom
         */
        function eewee_favicon(){
            if( get_option( "eewee_admincustom_favicon_url_ico" ) != "" ){
                echo '<link rel="shortcut icon" href="'.get_option( "eewee_admincustom_favicon_url_ico" ).'" />'; // .ico
            }
            if( get_option( "eewee_admincustom_favicon_url_png" ) != "" ){
                echo '<link rel="apple-touch-icon" href="'.get_option( "eewee_admincustom_favicon_url_png" ).'"/>'; // .png
            }
        }

        /**
         * Admin logo
         */
        function eewee_admin_logo() {
            //echo $templ_url = get_bloginfo('template_url');

            if( get_option( "eewee_admincustom_admin_logo_url" ) != "" ){
                //echo '<style type="text/css">#header-logo{background-image:url('.get_option( "eewee_admincustom_admin_logo_url" ).')!important;width:62px!important;height:36px!important;margin:7px 0 0 185px!important;}#adminmenu{margin:15px 5px 15px -170px;width:155px;}</style>';

                echo "
                <style type='text/css'>
                    #header-logo { background-image: url('".get_option( "eewee_admincustom_admin_logo_url" )."') !important; }

                    .login h1 a {
                            background: url('".get_option( "eewee_admincustom_admin_logo_url" )."') no-repeat scroll center top transparent;
                            height: 90px;
                            width: 350px;
                    }
                </style>";
            }
            
            if( get_option( "eewee_admincustom_admin_bg_url" ) != "" ){
                echo "
                <style type='text/css'>
                    body.login{
                        background: url('".get_option( "eewee_admincustom_admin_bg_url" )."') no-repeat center center fixed;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        position:fixed;
                        top:0;
                        left:0;
                        z-index:10;
                        overflow: hidden;
                        width: 100%;
                        height:100%;
                    }
                </style>";
            }
            
        }

        /**
         * Admin footer
         */
        function eewee_admin_footer(){
            if( 
                get_option( "eewee_admincustom_admin_footer_name_poweredby" ) != "" &&
                get_option( "eewee_admincustom_admin_footer_url_poweredby" ) != ""
            ){
                _e('Powered by', PLUGIN_NOM_LANG);
                echo " <a href='".get_option( "eewee_admincustom_admin_footer_url_poweredby" )."'>".get_option( "eewee_admincustom_admin_footer_name_poweredby" )."</a>";
            }

            if( get_option( "eewee_admincustom_admin_footer_url_email" ) != "" ){
                echo " / ";
                _e('Contact us', PLUGIN_NOM_LANG);
                echo " : <a href='mailto:".get_option( "eewee_admincustom_admin_footer_url_email" )."'>".get_option( "eewee_admincustom_admin_footer_url_email" )."</a>";
            }
            
            if( get_option( "eewee_admincustom_admin_footer_other_text" ) != "" ){
                echo " / ";
                echo get_option( "eewee_admincustom_admin_footer_other_text" );
            }

        }

        /**
         * Admin notification hide
         */
        function eewee_admin_notification_hide(){
            if (!current_user_can('update_plugins')) {
                add_action('admin_init', create_function(false,"remove_action('admin_notices', 'update_nag', 3);"));
            }
            /*global $user_login;
            get_currentuserinfo();
            if (!current_user_can('update_plugins')) { 
                add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
                add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
            }*/
        }

        /**
         * Admin dashboard widgets
         */
        function eewee_dashboard_widgets(){

            // Note : if ( current_user_can('update_core') )

            for($i=0 ; $i<get_option("eewee_admincustom_dashboard_count") ; $i++){
                $id = "eewee_dashboard_widget_".$i;
                $titre = get_option("eewee_admincustom_dashboard_title_".$i);
                $description = get_option("eewee_admincustom_dashboard_description_".$i);
                wp_add_dashboard_widget($id, $titre, create_function('', 'echo "' . addcslashes( nl2br($description), '"' ) . '";' ) );
            }
        }

        /**
         * Admin dashboard widgets remove
         */
        function eewee_dashboard_widgets_remove(){
            if( get_option( "eewee_admincustom_dashboard_remove_0" ) ){ remove_meta_box('dashboard_right_now', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_1" ) ){ remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_2" ) ){ remove_meta_box('dashboard_incoming_links', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_3" ) ){ remove_meta_box('dashboard_plugins', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_4" ) ){ remove_meta_box('dashboard_quick_press', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_5" ) ){ remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_6" ) ){ remove_meta_box('dashboard_primary', 'dashboard', 'core'); }
            if( get_option( "eewee_admincustom_dashboard_remove_7" ) ){ remove_meta_box('dashboard_secondary', 'dashboard', 'core'); }
        }
        
        /**
         * Admin bar : menu
         */
        function eewee_admin_bar() {
            $adminBar = new AdminBarController();
        }

        /**
         * Breadcrumb
         */
        function eewee_breadcrumb($content) {
            $breadcrumb = new BreadcrumbController();
            echo $breadcrumb->getBreadcrumb($content);
        }
        
        /**
         * Admin debug mode
         */
        /*
        function eewee_debug_mode() {
            //define('WP_DEBUG', true); 

            if( WP_DEBUG ){
                // SOURCE : http://codex.wordpress.org/Debugging_in_WordPress
                //define('WP_DEBUG_LOG', false); // /wp-content/debug.log
                //define('WP_DEBUG_DISPLAY', true);
                //define('SCRIPT_DEBUG', true);
                //define('SAVEQUERIES', true);
                if( get_option( "eewee_admincustom_debugmode_log" ) ){ 
                    define('WP_DEBUG_LOG', false); // /wp-content/debug.log
                    // Afficher le fichier de log
                    // Bouton pour vider/supprimer le fichier de log
                }
            }
        }
        */
        
        
        
        
        
        
        
        /**
         * Définition des options
         */
        /*
        function getOptionsAdmin(){
                //assigne les valeurs par défaut aux options d'administration
                $tbl_optionsAdmin = array(
                        'enabled'		=> true,
                        'exclude_ips'	=> ''
                );
                //recup les options stockées en bdd
                $options = get_option($this->adminOptionsName);
                //si les options existent dans la base de données, les valeurs par défaut sont écrasées par celles de la base			
                if( !empty($options) ){
                        foreach( $options as $k=>$v ){
                                $tbl_optionsAdmin[$k] = $v;
                        }
                }
                //les options sont stockées dans la base
                update_option($this->adminOptionsName, $tbl_optionsAdmin);
                //les options sont renvoyées pour être utilisées
                return $tbl_optionsAdmin;
        }
        */
        
        /**
         * Panneau d'admin
         */
        /*
        function printAdminPage(){
                echo "printAdminPage";
                $options = $this->getOptionsAdmin();
                // si le post du bouton existe (update_eewee_settings = attribut name du bouton)
                if( isset($_POST['update_eewee_settings']) ){
                        if(isset($_POST['enabled'])){
                                $options['enabled'] = $_POST['enabled'];
                        }
                        if(isset($_POST['exclude_ips'])){
                                $options['exclude_ips'] = $_POST['exclude_ips'];
                        }
                        // maj
                        update_option($this->adminOptionsName, $options);
                }
                // include du formulaire HTML
                include(EEWEE_ADMINCUSTOM_PLUGIN_DIR.'/view/admin_settings.php');
        }
        */
        
    }//fin class
//}//fin if