<?php if (!defined('EEWEE_VERSION')) exit('No direct script access allowed'); ?>

<div id="framework_wrap" class="wrap">

	<div id="header">
	    <h1><?php _e('Manual', PLUGIN_NOM_LANG); ?></h1>
	    <h2><a href='http://www.eewee.fr'>eewee.fr</a></h2>
	    <div class="version">
                <?php _e('Version', PLUGIN_NOM_LANG); ?> <?php echo EEWEE_VERSION; ?>
	    </div>
	</div>
  
  <div id="content_wrap">
  
    <div id="content">
      <div id="options_tabs" class="docs">
      
        <ul class="options_tabs">
          <li><a href="#general"><?php _e('General', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#dashboard"><?php _e('Dashboard', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#helptab"><?php _e('Help tab', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#adminbar"><?php _e('Admin bar', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#roleandcapabilities"><?php _e('Roles & capabilities', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#breadcrumb"><?php _e('Breadcrumb', PLUGIN_NOM_LANG); ?></a></li>
        </ul>
        
        <hr />
        
        <section id="general">
          <h2><?php _e('General', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <ul>
                <li><?php _e('Favicon', PLUGIN_NOM_LANG); ?></li>
                <li><?php _e('Admin login logo', PLUGIN_NOM_LANG); ?></li>
                <li><?php _e('Admin login background', PLUGIN_NOM_LANG); ?></li>
                <li><?php _e('Admin footer description (powered by, email, description)', PLUGIN_NOM_LANG); ?></li>
                <li><?php _e('Admin notification', PLUGIN_NOM_LANG); ?></li>
            </ul>
          </p>
        </section><!-- general -->
        
        <hr />
        
        <section id="dashboard">
          <h2><?php _e('Dashboard', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <ul>
                <li><?php _e('Admin dashboard widget : add your custom widget', PLUGIN_NOM_LANG); ?></li>
                <li><?php _e('Admin dashboard widget : remove existing widget', PLUGIN_NOM_LANG); ?></li>
            </ul>
          </p>
        </section><!-- dashboard -->
        
        <hr />
        
        <section id="helptab">
          <h2><?php _e('Help tab', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <ul>
                <li><?php _e('Admin help tab : add help tab & choose help page with title, description.', PLUGIN_NOM_LANG); ?></li>
            </ul>
          </p>
        </section><!-- general -->
        
        <hr />
        
        <section id="adminbar">
          <h2><?php _e('Admin bar', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <ul>
                <li><?php _e('add menu', PLUGIN_NOM_LANG); ?></li>
            </ul>
          </p>
        </section><!-- general -->
        
        <hr />
        
        <section id="roleandcapabilities">
          <h2><?php _e('Roles & Capabilities', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <ul>
                <li><?php _e('Create/edit/delete a new role', PLUGIN_NOM_LANG); ?></li>
                <li><?php _e('Create/delete a capability', PLUGIN_NOM_LANG); ?></li>
            </ul>
          </p>
        </section><!-- general -->
        
        <hr />
        
        <section id="breadcrumb">
          <h2><?php _e('Breadcrumb', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <ul>
                <li><?php _e('Add a Breadcrumb', PLUGIN_NOM_LANG); ?></li>
            </ul>
          </p>
        </section><!-- general -->
        
        <!--
        <hr />
        
        <div id="xxx">
            <h2>Xxx</h2>
            <p>
                <ul>
                    <li>xxx</li>
                </ul>
            </p>
            <h3>yyy</h3>
        </div>
        -->
        
        <br class="clear" />
      </div><!-- options_tabs -->
    </div><!-- content -->
    <!--<div class="info bottom"></div>-->   
  </div><!-- content_wrap -->

</div><!-- framework_wrap -->
<!-- [END] framework_wrap -->