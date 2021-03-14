<?php 
    /**
     * Register the "book" custom post type
     */
    function des_image_360_setup_post_type() {
        // register_post_type( 'book', ['public' => true ] ); 
    } 
    add_action( 'init', 'des_image_360_setup_post_type' );
    
    // Crear tabla que se utilizara para codigo personalizado con el editor
    function create_database_des_image_360(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'des_image_360';
        $table_options = $table_name;
        $sql = " CREATE TABLE $table_options (
            id bigint NOT NULL AUTO_INCREMENT,            
            shortcode text NOT NULL,
            image longtext NOT NULL,            
            edit_date datetime NOT NULL,
            PRIMARY KEY id (id)
        ) $charset_collate; ";
 

        // $sql = "
        // INSERT INTO `wp_des_image_360_options` (`id`, `name`, `slug`, `value`, `edit_date`) VALUES (NULL, 'Link Api', 'link_api', '', '".date('Y-m-d H:i:s')."');
        // ";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
    }
    add_action( 'init', 'create_database_des_image_360' );
    /**
     * Activar plugin
     */
    function des_image_360_activate() { 
        
        create_database_des_image_360();
        // Trigger our function that registers the custom post type plugin.
        // des_image_360_setup_post_type(); 
        // Clear the permalinks after the post type has been registered.
        // flush_rewrite_rules(); 




    }
    register_activation_hook( __FILE__, 'des_image_360_activate' );
?>