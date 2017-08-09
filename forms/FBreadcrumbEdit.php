<?php
//if( !class_exists(Form_BreadcrumbEdit)){
    class Form_BreadcrumbEdit extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_6;
        }

        /**
         * retourn form
         * @param array $r
         */ 
        public function breadcrumbEdit(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // BREADCRUMB ?>
                            <p>
                                <?php
                                $etat = get_option( "eewee_admincustom_breadcrumb_etat" );
                                $etat_on = $etat_off = "";
                                if( $etat ){	$etat_on = "checked";
                                }else{		$etat_off = "checked";
                                } ?>

                                <?php _e('Breadcrumb', PLUGIN_NOM_LANG); ?> : 
                                <input type="radio" id="etat_on" name="form_etat_breadcrumb" value="1" <?php echo $etat_on; ?> /> 
                                <label for="etat_on">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                </label>

                                <input type="radio" id="etat_off" name="form_etat_breadcrumb" value="0" <?php echo $etat_off; ?> />
                                <label for="etat_off">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                </label>
                            </p>
                            <p>
                                <?php _e('Separator', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_breadcrumb_separator" value="<?php form_option("eewee_admincustom_breadcrumb_separator"); ?>" /> <span class="example">(<?php _e('Default', PLUGIN_NOM_LANG); ?> : /)</span>
                            </p>

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