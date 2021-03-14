<?php    
    function des_image_360_page_home() {
      include __DIR__."/pages/home.php";
    }  
    function des_image_360_custom_menu() {
      add_menu_page ( 'Imagenes 360', 'Imagenes 360 ', 'manage_options', 'des_image_360', 'des_image_360_page_home', 'dashicons-hammer' );      
    }
    add_action( 'admin_menu', 'des_image_360_custom_menu');
?>