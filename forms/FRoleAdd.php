<?php
//if( !class_exists(Form_RoleAdd)){
    class Form_RoleAdd extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_5;
        }

        /**
         * retourn form
         */ 
        public function roleAdd(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <div class="submit">
                        <input type="submit" name="add" value="<?php _e('Add', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Add', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // DASHBOARD ADD ?>
                            <p>
                                <?php _e('Name', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_role_name" />
                            </p>

                        </div>
                    </div><?php //postbox ?> 

                    <div class="submit">
                        <input type="submit" name="add" value="<?php _e('Add', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                </form>

        <?php
        }

    }//class
//}//if