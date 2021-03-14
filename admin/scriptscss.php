<?php  
  function des_image_360_scripts_css() {  
    wp_enqueue_media();
    wp_enqueue_style('css-des_image_360', plugins_url(). FOLDERADMINDESIMAGE360 . '/assets/css/style.css');

    wp_enqueue_script( 'js-des_image_360', plugins_url(). FOLDERADMINDESIMAGE360 . '/assets/js/des_image_360.js' , array( 'jquery' ), '', true  );

    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
    wp_localize_script( 'js-des_image_360', 'ajax_object_des_image_360', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
      
  }
  add_action('admin_enqueue_scripts', 'des_image_360_scripts_css');
?>