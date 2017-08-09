<?php
/**
 * Help Tab
 */
class HelptabController{
	
    public $tabs = array();

    static public function init(){
        $class = __CLASS__;
        new $class;
    }

    public function __construct(){
        add_action( "load-{$GLOBALS['pagenow']}", array( $this, 'add_tabs' ), 20 );
        for($i=0 ; $i<get_option("eewee_admincustom_helptab_count") ; $i++){
            if( $GLOBALS['pagenow'] == get_option("eewee_admincustom_helptab_page_".$i) ){
                $this->tabs["eewee_admincustom_helptab_".$i] = array(
                    'title'     => get_option("eewee_admincustom_helptab_title_".$i),
                    'content'   =>get_option("eewee_admincustom_helptab_description_".$i)
                );
            }
        }
    }

    public function add_tabs(){
        foreach ( $this->tabs as $id => $data ){
            get_current_screen()->add_help_tab( array(
                'id'        => $id,
                'title'     => $data['title'],
                'content'   => $data['content'],
                //'callback'  => array( $this, 'prepare' )
            ) );
        }
    }

    public function prepare( $screen, $tab ){
        printf( 
            '<p>%s</p> copyright eewee.fr', 
            __( $tab['callback'][0]->tabs[ $tab['id'] ]['content'], PLUGIN_NOM_LANG )
        );
    }
}
?>