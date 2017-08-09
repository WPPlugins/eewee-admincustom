<?php
//if( !class_exists(Form_AdminbarEdit)){
    class Form_AdminbarEdit extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_4;
        }

        /**
         * retourn form
         * @param array $r
         */ 
        public function adminbarEdit(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // ADMIN BAR ?>
                            <p>
                                <?php _e('Number admin bar menu', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_adminbar_count" value="<?php form_option("eewee_admincustom_adminbar_count"); ?>" />
                            </p>

                            <?php 
                            for($i=0 ; $i<get_option("eewee_admincustom_adminbar_count") ; $i++){ ?>
                                <hr />

                                <p>
                                    <strong><?php _e('Menu title', PLUGIN_NOM_LANG); ?> :</strong><br />
                                    <input type="text" name="form_adminbar_menutitle_<?php echo $i; ?>" value="<?php form_option("eewee_admincustom_adminbar_menutitle_".$i); ?>" />
                                </p>

                                <table>
                                    <?php
                                    for($j=0 ; $j<5 ; $j++){ ?>
                                        <tr>
                                            <td>
                                                <?php _e('Submenu Title', PLUGIN_NOM_LANG); ?> :<br />
                                                <input type="text" name="form_adminbar_title_<?php echo $i; ?>_<?php echo $j; ?>" value="<?php form_option("eewee_admincustom_adminbar_title_".$i."_".$j); ?>" />
                                            </td>
                                            <td>
                                                <?php _e('Submenu Url', PLUGIN_NOM_LANG); ?> :<br />
                                                <input type="text" name="form_adminbar_url_<?php echo $i; ?>_<?php echo $j; ?>" value="<?php form_option("eewee_admincustom_adminbar_url_".$i."_".$j); ?>" />
                                            </td>
                                        </tr>
                                        <?php
                                     }//for ?>
                                </table>

                            <?php
                            }//for
                            ?>

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