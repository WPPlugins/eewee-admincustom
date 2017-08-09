<?php
class BreadcrumbController {
  
    function BreadcrumbController(){}
    
    /**
     * getSeparator
     * @return string
     */
    function getSeparator(){
        if( get_option("eewee_admincustom_breadcrumb_separator") != "" ){
            $sep = " ".str_replace( " ", "", get_option( "eewee_admincustom_breadcrumb_separator" ) )." ";
        }else{
            $sep = " / ";
        }
        return $sep;
    }
    
    /**
     * getBreadcrumb
     * @global $post
     * @param string $content
     * @return string
     */
    function getBreadcrumb(){
        if ( !is_home() && !is_front_page() ){
            $render     = "";
            $tbl_link   = array();
            $sep        = $this->getSeparator();

            $render .= "<ul class='breadcrumb'>";
                $render .= "<li><a href='".get_option('home')."'>".get_bloginfo('name')."</a><span class='divider'>".$sep."</span></li>"; 

                // CATEGORY or SINGLE
                if (is_category() || is_single()) {
                    the_category('title_li='); 
                    if(is_single()){ $render .= "<li>".get_the_title()."<span class='divider'>".$sep."</span></li>"; } 

                // PAGE
                }elseif( is_page() ){
                    global $post;
                    $ancestors = get_ancestors( $post->ID, 'page' );
                    foreach( $ancestors as $ancestor ){
                        $getPage = get_page( $ancestor );
                        $tbl_links[] = "<li><a href='".get_permalink( $getPage->ID )."'>".$getPage->post_title."</a><span class='divider'>".$sep."</span></li>";
                    }

                    if( !empty($tbl_links) ){
                        krsort( $tbl_links );
                        foreach( $tbl_links as $tbl_link ){
                            $render .= $tbl_link;
                        }
                    }

                    $render .= "<li class='active'>".get_the_title()."</li>"; 
                }
            $render .= "</ul>";
            return "<div id='eewee-breadcrumb'>".$render."</div>";

        }//if
    }

}
?>