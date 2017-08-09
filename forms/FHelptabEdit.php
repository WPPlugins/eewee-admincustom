<?php
//if( !class_exists(Form_HelptabEdit)){
    class Form_HelptabEdit extends WP_Query{

        private $_action;
        private $_returnUrl;

        function __construct(){
                $this->_action      = $_SERVER["REQUEST_URI"];
                $this->_returnUrl   = EEWEE_ADMINCUSTOM_URL_BACK_SOUS_MENU_3;
        }

        /**
         * retourn form
         * @param array $r
         */ 
        public function helptabEdit(){ ?>

                <form method="post" action="<?php echo $this->_action; ?>">

                    <div class="submit">
                        <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
                        <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
                    </div>

                    <div class="postbox " id="postexcerpt">
                        <h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
                        <div class="inside">

                            <?php // HELP TAB ?>
                            <?php
                            /*$tbl_pagenow = array(
                                _('Dashboard', PLUGIN_NOM_LANG)                         => "index.php",

                                _('Articles', PLUGIN_NOM_LANG)                          => "edit.php",
                                _('Articles - All articles', PLUGIN_NOM_LANG)           => "edit.php",
                                _('Articles - Add', PLUGIN_NOM_LANG)                    => "post-new.php",
                                _('Articles - Category', PLUGIN_NOM_LANG)               => "edit-tags.php",
                                _('Articles - Keyword', PLUGIN_NOM_LANG)                => "edit-tags.php",

                                _('Medias', PLUGIN_NOM_LANG)                            => "upload.php",
                                _('Medias - Library', PLUGIN_NOM_LANG)                  => "upload.php",
                                _('Medias - Add', PLUGIN_NOM_LANG)                      => "media-new.php",

                                _('Pages', PLUGIN_NOM_LANG)                             => "edit.php",
                                _('Pages - All pages', PLUGIN_NOM_LANG)                 => "edit.php",
                                _('Pages - Add', PLUGIN_NOM_LANG)                       => "post-new.php",

                                _('Commentary', PLUGIN_NOM_LANG)                        => "edit-comments.php",

                                _('Appearance', PLUGIN_NOM_LANG)                        => "themes.php",
                                _('Appearance - Themes', PLUGIN_NOM_LANG)               => "themes.php",
                                _('Appearance - Widgets', PLUGIN_NOM_LANG)              => "widgets.php",
                                _('Appearance - Menus', PLUGIN_NOM_LANG)                => "nav-menus.php",
                                _('Appearance - Header', PLUGIN_NOM_LANG)               => "themes.php",
                                _('Appearance - Background', PLUGIN_NOM_LANG)           => "themes.php",
                                _('Appearance - Publisher', PLUGIN_NOM_LANG)            => "theme-editor.php",

                                _('Extensions', PLUGIN_NOM_LANG)                        => "plugins.php",
                                _('Extensions - Installed', PLUGIN_NOM_LANG)            => "plugins.php",
                                _('Extensions - Add', PLUGIN_NOM_LANG)                  => "plugin-install.php",
                                _('Extensions - Publisher', PLUGIN_NOM_LANG)            => "plugin-editor.php",

                                _('Users', PLUGIN_NOM_LANG)                             => "users.php",
                                _('Users - All users', PLUGIN_NOM_LANG)                 => "users.php",
                                _('Users - Add', PLUGIN_NOM_LANG)                       => "user-new.php",
                                _('Users - Profile', PLUGIN_NOM_LANG)                   => "profile.php",

                                _('Tools', PLUGIN_NOM_LANG)                             => "tools.php",
                                _('Tools - Available tools', PLUGIN_NOM_LANG)           => "tools.php",
                                _('Tools - Import', PLUGIN_NOM_LANG)                    => "import.php",
                                _('Tools - Export', PLUGIN_NOM_LANG)                    => "export.php",

                                _('Settings', PLUGIN_NOM_LANG)                          => "options-general.php",
                                _('Settings - General', PLUGIN_NOM_LANG)                => "options-general.php",
                                _('Settings - Writing', PLUGIN_NOM_LANG)                => "options-writing.php",
                                _('Settings - Reading', PLUGIN_NOM_LANG)                => "options-reading.php",
                                _('Settings - Discussion', PLUGIN_NOM_LANG)             => "options-discussion.php",
                                _('Settings - Media', PLUGIN_NOM_LANG)                  => "options-media.php",
                                _('Settings - Permalink', PLUGIN_NOM_LANG)              => "options-permalink.php"
                            );*/

                            $tbl_pagenow = array(
                                "index.php" => 'Dashboard', 

                                "edit.php" => 'Articles',
                                "edit.php" => 'Articles - All articles',
                                "post-new.php" => 'Articles - Add',
                                "edit-tags.php" => 'Articles - Category', 
                                "edit-tags.php" => 'Articles - Keyword',

                                "upload.php" => 'Medias',
                                "upload.php" => 'Medias - Library',
                                "media-new.php" => 'Medias - Add',

                                "edit.php" => 'Pages',
                                "edit.php" => 'Pages - All pages',
                                "post-new.php" => 'Pages - Add', 

                                "edit-comments.php" => 'Commentary', 

                                "themes.php" => 'Appearance', 
                                "themes.php" => 'Appearance - Themes', 
                                "widgets.php" => 'Appearance - Widgets', 
                                "nav-menus.php" => 'Appearance - Menus', 
                                "themes.php" => 'Appearance - Header', 
                                "themes.php" => 'Appearance - Background',  
                                "theme-editor.php" => 'Appearance - Publisher', 

                                "plugins.php" => 'Extensions', 
                                "plugins.php" => 'Extensions - Installed', 
                                "plugin-install.php" => 'Extensions - Add', 
                                "plugin-editor.php" => 'Extensions - Publisher', 

                                "users.php" => 'Users', 
                                "users.php" => 'Users - All users', 
                                "user-new.php" => 'Users - Add', 
                                "profile.php" => 'Users - Profile', 

                                "tools.php" => 'Tools', 
                                "tools.php" => 'Tools - Available tools', 
                                "import.php" => 'Tools - Import', 
                                "export.php" => 'Tools - Export', 

                                "options-general.php" => 'Settings', 
                                "options-general.php" => 'Settings - General', 
                                "options-writing.php" => 'Settings - Writing', 
                                "options-reading.php" => 'Settings - Reading', 
                                "options-discussion.php" => 'Settings - Discussion', 
                                "options-media.php" => 'Settings - Media', 
                                "options-permalink.php" => 'Settings - Permalink'
                            );
                            ?>

                            <p>
                                <?php _e('Number help tab', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_helptab_count" value="<?php form_option("eewee_admincustom_helptab_count"); ?>" />
                            </p>

                            <?php 
                            for($i=0 ; $i<get_option("eewee_admincustom_helptab_count") ; $i++){
                                ?>
                                <hr />
                                <p>
                                    <?php _e('Page', PLUGIN_NOM_LANG); ?> :<br />
                                    <select name='form_helptab_page_<?php echo $i; ?>'>
                                        <?php 
                                        $j = 0;
                                        foreach( $tbl_pagenow as $k=>$v ){ ?>
                                            <?php 
                                            if( $k == get_option("eewee_admincustom_helptab_page_".$i ) ){
                                                $selected = "selected";
                                            }else{
                                                $selected = "";
                                            }
                                            ?>

                                            <option value='<?php echo $k; ?>' <?php echo $selected; ?>><?php echo $v; ?></option>
                                            <?php $j++;
                                        }//foreach ?>
                                    </select>
                                </p>
                                <p>
                                    <?php _e('Title', PLUGIN_NOM_LANG); ?> :<br />
                                    <input type="text" name="form_helptab_title_<?php echo $i; ?>" value="<?php form_option("eewee_admincustom_helptab_title_".$i); ?>" />
                                </p>
                                <p>
                                    <?php _e('Description', PLUGIN_NOM_LANG); ?> :<br />
                                    <textarea name="form_helptab_description_<?php echo $i; ?>" rows="10" cols="80"><?php form_option("eewee_admincustom_helptab_description_".$i); ?></textarea>
                                </p>
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