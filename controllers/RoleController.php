<?php
namespace fr\eewee\role;
class RoleController {
  
    private $tbl_roles;
    
    function RoleController(){}

    /**
     * Get roles list
     * @global $wpdb
     * @return array
     */
    function getRoles(){
        global $wpdb; 
        $roles = get_option($wpdb->prefix . 'user_roles');
        foreach( $roles as $k=>$v ){
            $tbl_role[] = $k;
        }
        return $tbl_role;
    }
    
    /**
     * Get capabilities list
     * @return array
     * @source http://codex.wordpress.org/Roles_and_Capabilities
     */
    function getCapabilities(){
        return $tbl_capabilities = array(
            // SUPER ADMIN
            "manage_network"                => "manage_network",					
            "manage_sites"                  => "manage_sites",					
            "manage_network_users"          => "manage_network_users",					
            "manage_network_themes"         => "manage_network_themes",
            "manage_network_options"        => "manage_network_options",				
            "unfiltered_html"               => "unfiltered_html",
            
            // ADMINISTRATOR
            "activate_plugins"              => "activate_plugins",
            "create_users"                  => "create_users",
            "delete_plugins"                => "delete_plugins",
            "delete_themes"                 => "delete_themes",
            "delete_users"                  => "delete_users",
            "edit_files"                    => "edit_files",
            "edit_plugins"                  => "edit_plugins",
            "edit_theme_options"            => "edit_theme_options",
            "edit_themes"                   => "edit_themes",
            "edit_users"                    => "edit_users",
            "export"                        => "export",
            "import"                        => "import",
            "install_plugins"               => "install_plugins",
            "install_themes"                => "install_themes",
            "list_users"                    => "list_users",
            "manage_options"                => "manage_options",
            "promote_users"                 => "promote_users",
            "remove_users"                  => "remove_users",
            "switch_themes"                 => "switch_themes",
            "update_core"                   => "update_core",
            "update_plugins"                => "update_plugins",
            "update_themes"                 => "update_themes",
            "edit_dashboard"                => "edit_dashboard",
            
            // EDITOR
            "moderate_comments"             => "moderate_comments",
            "manage_categories"             => "manage_categories",
            "manage_links"                  => "manage_links",
            "edit_others_posts"             => "edit_others_posts",
            "edit_pages"                    => "edit_pages",
            "edit_others_pages"             => "edit_others_pages",
            "edit_published_pages"          => "edit_published_pages",
            "publish_pages"                 => "publish_pages",
            "delete_pages"                  => "delete_pages",
            "delete_others_pages"           => "delete_others_pages",
            "delete_published_pages"        => "delete_published_pages",
            "delete_others_posts"           => "delete_others_posts",
            "delete_private_posts"          => "delete_private_posts",
            "edit_private_posts"            => "edit_private_posts",
            "read_private_posts"            => "read_private_posts",
            "delete_private_pages"          => "delete_private_pages",
            "edit_private_pages"            => "edit_private_pages",
            "read_private_pages"            => "read_private_pages",   
            
            // AUTHOR
            "edit_published_posts"          => "edit_published_posts",
            "upload_files"                  => "upload_files",
            "create_product"                => "create_product",
            "publish_posts"                 => "publish_posts",
            "delete_published_posts"        => "delete_published_posts",
            
            // CONTRIBUTOR
            "edit_posts"                    => "edit_posts",
            "delete_posts"                  => "delete_posts",
            
            // SUBSCRIBER
            "read"                          => "read",
            
            /*
            // DEPRECATED IN VERSION 3.0
            // ADMINISTRATOR
            "level_10"                      => "level_10",
            "level_9"                       => "level_9",
            "level_8"                       => "level_8",
            // EDITOR
            "level_7"                       => "level_7",
            "level_6"                       => "level_6",
            "level_5"                       => "level_5",
            "level_4"                       => "level_4",
            "level_3"                       => "level_3",
            // AUTHOR
            "level_2"                       => "level_2",
            // CONTRIBUTOR
            "level_1"                       => "level_1",
            // SUBSCRIBER
            "level_0"                       => "level_0",
            */
        );
    }
    

}
?>