<?php 
    /**
    * Plugin Name:       Imagenes 360
    * Plugin URI:        https://www.desarrollandolo.com/
    * Description:       Vista de imagenes 360
    * Version:           1.0.0
    * Requires at least: 5.2
    * Requires PHP:      7.2
    * Author:            Desarrollandolo.com
    * Author URI:        https://www.desarrollandolo.com/
    * License:           GPL v2 or later
    * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
    * Text Domain:       desarrollandolo
    * Domain Path:       /languages
    */
    require __DIR__.'/activateDesactivate/index.php';
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    
    if ( is_plugin_active('desImage360/desImage360.php') ) {   
      if(is_admin()){
          $pages = ["des_image_360"];
          // Verificamos si estamos dentro del plugin para poder cagar script o elementos dentro de las paginas
          $inplugin = false;
          if(isset($_REQUEST["page"]) && in_array($_REQUEST["page"], $pages) ){
              $inplugin = true;
          }
          require __DIR__.'/admin/index.php'; 
      } else{ 

          require __DIR__.'/public/index.php'; 
          
      }
    }
  ?>