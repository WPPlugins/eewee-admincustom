<?php
//if( !class_exists(Form_RoleEdit)){
    class Form_RoleEdit extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_5;
        }

        /**
         * retourn form
         */ 
        public function roleEdit(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <input type='hidden' name='idRole' value='<?php echo $_GET['idRole']; ?>' />
                    
                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <?php $role = get_role($_GET['idRole']); ?>
                    
                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Edit capabilities for', PLUGIN_NOM_LANG); ?> <?php echo $role->name; ?></span></h3>
                        <div class="inside">
                            
                            <?php // ROLE EDIT ?>
                            <?php
                            // list
                            $capabilities = new fr\eewee\role\RoleController();
                            $tbl_caps = $capabilities->getCapabilities();
                            ?>
                            <table>
                                <?php
                                foreach( $tbl_caps as $k=>$v ){
                                    $etat = "";
                                    foreach( $role->capabilities as $kSave=>$vSave ){
                                        if( $k == $kSave && $vSave ){
                                            $etat = true;
                                        }
                                    }
                                    $etat_on = $etat_off = "";
                                    if( !$etat ){	$etat_off = "checked";
                                    }else{		$etat_on = "checked";
                                    } ?>

                                    <tr>
                                        <td><?php echo $v; ?> : </td>
                                        <td>


                                            <input type="radio" id="etat_on" name="form_etat_<?php echo $k; ?>" value="1" <?php echo $etat_on; ?> /> 
                                            <label for="etat_on">
                                                <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                            </label>
                                            
                                            

                                            <input type="radio" id="etat_off" name="form_etat_<?php echo $k; ?>" value="0" <?php echo $etat_off; ?> />
                                            <label for="etat_off">
                                                <img src='<?php echo EEWEE_ADMINCUSTOM_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                            </label>


                                        </td>
                                    </tr>
                                <?php }//foreach
                                ?>
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