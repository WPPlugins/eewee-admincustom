<?php
//if( !class_exists(Form_DashboardEdit)){
    class Form_DashboardEdit extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_2;
        }

        /**
         * retourn form
         * @param array $r
         */ 
        public function dashboardEdit(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Add', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // DASHBOARD ADD ?>
                            <p>
                                <?php _e('Number dashboard', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_dashboard_count" value="<?php form_option("eewee_admincustom_dashboard_count"); ?>" />
                            </p>

                            <?php 
                            for($i=0 ; $i<get_option("eewee_admincustom_dashboard_count") ; $i++){
                                ?>
                                <hr />
                                <p>
                                    <?php _e('Title', PLUGIN_NOM_LANG); ?> :<br />
                                    <input type="text" name="form_dashboard_title_<?php echo $i; ?>" value="<?php form_option("eewee_admincustom_dashboard_title_".$i); ?>" />
                                </p>
                                <p>
                                    <?php _e('Description', PLUGIN_NOM_LANG); ?> :<br />
                                    <textarea name="form_dashboard_description_<?php echo $i; ?>" rows="10" cols="80"><?php form_option("eewee_admincustom_dashboard_description_".$i); ?></textarea>
                                </p>
                                <?php
                            }
                            ?>

                        </div>
                    </div><?php //postbox ?> 




                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Remove', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // DASHBOARD REMOVE ?>
                            <?php
                            $tbl_dashboard = array(
                                "Right Now",
                                "Recent Comments",
                                "Incoming Links",
                                "Plugins",
                                "Quick Press",
                                "Recent Drafts",
                                "Wordpress blog",
                                "Other Wordpress News"
                            );
                            ?>

                            <table>
                                <?php
                                for( $i=0 ; $i<sizeof($tbl_dashboard) ; $i++){
                                    $etat = get_option( "eewee_admincustom_dashboard_remove_".$i );
                                    $etat_on = $etat_off = "";
                                    if( !$etat ){	$etat_off = "checked";
                                    }else{		$etat_on = "checked";
                                    } ?>

                                    <tr>
                                        <td><?php _e($tbl_dashboard[$i], PLUGIN_NOM_LANG); ?> : </td>
                                        <td>
                                            <input type="radio" id="etat_on" name="form_etat_<?php echo $i; ?>" value="1" <?php echo $etat_on; ?> /> 
                                            <label for="etat_on_favicon">
                                                <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                            </label>

                                            <input type="radio" id="etat_off" name="form_etat_<?php echo $i; ?>" value="0" <?php echo $etat_off; ?> />
                                            <label for="etat_off">
                                                <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                            </label>
                                        </td>
                                    </tr>
                                <?php }//for ?>
                            </table>
                        </div>
                    </div><?php //postbox ?>                                    

                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                </form>

        <?php
        }

    }//class
//}//if