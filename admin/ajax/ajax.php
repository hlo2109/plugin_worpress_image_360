<?php 
  function des_image_360_create() {
      global $wpdb; // this is how you get access to the database    
      // Crear grupo 360
      $ids = [];
      foreach($_REQUEST['images'] as $item){        
        $ids[] = $item['id'];
      }
      $wpdb->insert( $wpdb->prefix ."des_image_360", array(
        "shortcode" => json_encode($ids), 
        "image" => json_encode($_REQUEST['images']),
        "edit_date" => date('Y-m-d h:i:s')
      ));  
      echo json_encode(true);
      wp_die(); // this is required to terminate immediately and return a proper response
      
      // echo json_encode($result);
  }
  add_action( 'wp_ajax_des_image_360_create', 'des_image_360_create' );

  function des_image_360_delete() {
    global $wpdb; // this is how you get access to the database       
    $wpdb->delete( $wpdb->prefix ."des_image_360",
    [
        'id' => $_REQUEST['id'] 
    ]);
    echo json_encode(['success'=>true]);
    wp_die(); // this is required to terminate immediately and return a proper response
    
    // echo json_encode($result);
}
add_action( 'wp_ajax_des_image_360_delete', 'des_image_360_delete' );
?>