<?php  
  function des_image_360_scripts_css() {   

    
    wp_enqueue_style('css-des_image_360', plugins_url(). FOLDERPUBLICDESIMAGE360 . '/assets/css/style.css');

    wp_enqueue_script( 'js-des_image_360', plugins_url(). FOLDERPUBLICDESIMAGE360 . '/assets/js/script.js' , array( 'jquery' ), '', true  );

    // Imagenes 360
    wp_enqueue_style('css-vi-des_image_360', 'https://cdn.jsdelivr.net/npm/photo-sphere-viewer@4/dist/photo-sphere-viewer.min.css');

    wp_enqueue_script( 'three-des_image_360', 'https://cdn.jsdelivr.net/npm/three/build/three.min.js', null, '', true  );
    wp_enqueue_script( 'browser-des_image_360', 'https://cdn.jsdelivr.net/npm/uevent@2/browser.min.js', null, '', true  );
    wp_enqueue_script( 'photo-sphere-des_image_360', 'https://cdn.jsdelivr.net/npm/photo-sphere-viewer@4/dist/photo-sphere-viewer.min.js', null, '', true  ); 
    
    // Slider
    wp_enqueue_style('css-splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css');
    wp_enqueue_script( 'js-splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js', null, '', true  );
      
  }
  


  // Evitar que los scritps se carguen donde no deben
  add_filter( 'do_shortcode_tag','enqueue_my_scripts',20,3);
  function enqueue_my_scripts($output, $tag, $attr){  
    if('des_image_360_shortcode' != $tag){ //make sure it is the right shortcode
      return $output;
    }
    if(!isset($attr['id'])){ //you can even check for specific attributes
      return $output;
    } 
    des_image_360_scripts_css();
    // add_action('wp_enqueue_scripts', 'des_image_360_scripts_css');
    return $output;
  }
?>