<?php
class AdminBarController {
  
    function AdminBarController(){
        add_action( 'admin_bar_menu', array( $this, "add_admin_bar" ) );
    }

    /**
     * Add's new global menu, if $href is false menu is added but registred as submenuable
     *
     * $name String
     * $id String
     * $href Bool/String
     *
     * @return void
     * @author Janez Troha
     * @author Aaron Ware
     **/
    function add_root_menu($name, $id, $href = FALSE){
      global $wp_admin_bar;
      if ( !is_super_admin() || !is_admin_bar_showing() ){
          error_log (__METHODE__.' - !is_super_admin ou !is_admin_bar_showing');
          return;
      }
      
      $wp_admin_bar->add_menu( array(
          'id'   => $id,
          'meta' => array(),
          'title' => $name,
          'href' => $href ) );
    }

    /**
     * Add's new submenu where additinal $meta specifies class, id, target or onclick parameters
     *
     * $name String
     * $link String
     * $root_menu String
     * $meta Array
     *
     * @return void
     * @author Janez Troha
     **/
    function add_sub_menu($name, $link, $root_menu, $meta = FALSE, $idSousMenu){
        global $wp_admin_bar;
        if ( ! is_super_admin() || ! is_admin_bar_showing() ){
            error_log (__METHODE__.' - !is_super_admin ou !is_admin_bar_showing');
            return;
        }

        $wp_admin_bar->add_menu( array(
            'id' => $idSousMenu,
            'parent' => $root_menu,
            'title' => $name,
            'href' => $link,
            'meta' => $meta
        ) );
    }

    function add_admin_bar() {

        //echo "test<hr /><hr /><hr /><hr /><hr /><hr /><hr /><hr /><hr /><hr />";        
        //echo get_option("eewee_admincustom_adminbar_count");
       
        // CREATE MENU
        if( get_option("eewee_admincustom_adminbar_count") != "" ){
            $tbl_menus = array();

            for($i=0 ; $i<get_option("eewee_admincustom_adminbar_count") ; $i++){
                if( get_option("eewee_admincustom_adminbar_menutitle_".$i) != "" ){
                    
                    $key = "";
                    $tbl_menu = array();

                    $key = "eewee_admincustom_adminbar_key_".$i;
                    $tbl_menu[get_option("eewee_admincustom_adminbar_menutitle_".$i)] = $key;

                    for($j=0 ; $j<5 ; $j++){
                        if( 
                            get_option("eewee_admincustom_adminbar_title_".$i."_".$j) != "" && 
                            get_option("eewee_admincustom_adminbar_url_".$i."_".$j) != ""
                        ){
                            $tbl_menu[get_option("eewee_admincustom_adminbar_title_".$i."_".$j)] = get_option("eewee_admincustom_adminbar_url_".$i."_".$j);
                        }//if
                     }//for

                     $tbl_menus[] = $tbl_menu;

                }//if

            }//for

        }//if
        
        /*
        // SAMPLE
        $tbl_menus = array(
            array(
                "Facebook" => "fcbl",
                "Facebook Pages" => "http://www.facebook.com/pages/manage",
                "Facebook apps" => "http://www.facebook.com/developers/apps.php",
                "Facebook insights" => "http://www.facebook.com/insights"
            )
            
        );
        */
        
        foreach( $tbl_menus as $tbl_menu ){
            $i = 0;
            $root_menu = "";
            foreach( $tbl_menu as $k=>$v ){
                if( $i == 0 ){
                    $root_menu = $v;
                    $this->add_root_menu( $k, $v );
                }else{
                    $this->add_sub_menu( $k, $v, $root_menu, FALSE, $root_menu."_".$i );
                }
                
                $i++;
            }
        }
        
        /*
        $this->add_root_menu( "Facebook", "fcbl" );
        $this->add_sub_menu( "Facebook pages",      "http://www.facebook.com/pages/manage",         "fcbl" );
        $this->add_sub_menu( "Facebook apps",       "http://www.facebook.com/developers/apps.php",  "fcbl" );
        $this->add_sub_menu( "Facebook insights",   "http://www.facebook.com/insights",             "fcbl" );
        */
    }

}
?>