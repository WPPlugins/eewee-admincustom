<?php
//if( !class_exists(Form_GeneralEdit)){
    class Form_GeneralEdit extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_1;
        }

        /**
         * retourn form
         * @param array $r
         */ 
        public function generalEdit(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // FAVICON ?>
                            <p>
                                <?php
                                $etatFavicon = get_option( "eewee_admincustom_favicon_etat" );
                                $etat_on = $etat_off = "";
                                if( $etatFavicon ){	$etat_on = "checked";
                                }else{			$etat_off = "checked";
                                } ?>

                                <?php _e('State favicon', PLUGIN_NOM_LANG); ?> : 
                                <input type="radio" id="etat_on" name="form_etat_favicon" value="1" <?php echo $etat_on; ?> /> 
                                <label for="etat_on_favicon">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                </label>

                                <input type="radio" id="etat_off_favicon" name="form_etat_favicon" value="0" <?php echo $etat_off; ?> />
                                <label for="etat_off">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                </label>
                            </p>
                            <p>
                                <?php _e('URL Favicon (.ico)', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_url_favicon_ico" value="<?php form_option("eewee_admincustom_favicon_url_ico"); ?>" />
                            </p>
                            <p>
                                <?php _e('URL Favicon (.png)', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_url_favicon_png" value="<?php form_option("eewee_admincustom_favicon_url_png"); ?>" />
                            </p>


                            <hr />


                            <?php // ADMIN LOGO ?>
                            <p>
                                <?php
                                $etatAdminLogo = get_option( "eewee_admincustom_admin_logo_etat" );
                                $etat_on = $etat_off = "";
                                if( $etatAdminLogo ){	$etat_on = "checked";
                                }else{			$etat_off = "checked";
                                } ?>

                                <?php _e('State admin logo', PLUGIN_NOM_LANG); ?> : 
                                <input type="radio" id="etat_on" name="form_admin_logo_etat" value="1" <?php echo $etat_on; ?> /> 
                                <label for="etat_on_admin_logo">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                </label>

                                <input type="radio" id="etat_off_favicon" name="form_admin_logo_etat" value="0" <?php echo $etat_off; ?> />
                                <label for="etat_off_admin_logo">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                </label>
                            </p>
                            <p>
                                <?php _e('URL admin logo', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_admin_logo_url" value="<?php form_option("eewee_admincustom_admin_logo_url"); ?>" />
                            </p>
                            <p>
                                <?php _e('URL admin background', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_admin_bg_url" value="<?php form_option("eewee_admincustom_admin_bg_url"); ?>" />
                            </p>


                            <hr />


                            <?php // ADMIN FOOTER ?>
                            <p>
                                <?php
                                $etatAdminFooter = get_option( "eewee_admincustom_admin_footer_etat" );
                                $etat_on = $etat_off = "";
                                if( $etatAdminFooter ){	$etat_on = "checked";
                                }else{			$etat_off = "checked";
                                } ?>

                                <?php _e('State admin footer', PLUGIN_NOM_LANG); ?> : 
                                <input type="radio" id="etat_on" name="form_admin_footer_etat" value="1" <?php echo $etat_on; ?> /> 
                                <label for="etat_on_admin_footer">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                </label>

                                <input type="radio" id="etat_off_favicon" name="form_admin_footer_etat" value="0" <?php echo $etat_off; ?> />
                                <label for="etat_off_admin_footer">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                </label>
                            </p>
                            <p>
                                <?php _e('Name admin footer poweredby', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_admin_footer_name_poweredby" value="<?php form_option("eewee_admincustom_admin_footer_name_poweredby"); ?>" />
                            </p>
                            <p>
                                <?php _e('URL admin footer poweredby', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_admin_footer_url_poweredby" value="<?php form_option("eewee_admincustom_admin_footer_url_poweredby"); ?>" />
                            </p>
                            <p>
                                <?php _e('URL admin footer email', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_admin_footer_url_email" value="<?php form_option("eewee_admincustom_admin_footer_url_email"); ?>" />
                            </p>
                            <p>
                                <?php _e('Footer other text', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_admin_footer_other_text" value="<?php form_option("eewee_admincustom_admin_footer_other_text"); ?>" />
                            </p>


                            <hr />


                            <?php // ADMIN NOTIFICATION HIDE ?>
                            <p>
                                <?php
                                $etatAdminNotification = get_option( "eewee_admincustom_admin_notification_hide_etat" );
                                $etat_on = $etat_off = "";
                                if( $etatAdminNotification ){	$etat_on = "checked";
                                }else{                          $etat_off = "checked";
                                } ?>

                                <?php _e('State admin notification', PLUGIN_NOM_LANG); ?> : 
                                <input type="radio" id="etat_on" name="form_admin_notification_hide_etat" value="1" <?php echo $etat_on; ?> /> 
                                <label for="etat_on_admin_footer">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                </label>

                                <input type="radio" id="etat_off_favicon" name="form_admin_notification_hide_etat" value="0" <?php echo $etat_off; ?> />
                                <label for="etat_off_admin_footer">
                                    <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                </label>
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