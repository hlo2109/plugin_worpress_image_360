<?php 
    /**
     * Desactivar plugin.
     */
    function des_image_360_deactivate() {
        // Unregister the post type, so the rules are no longer in memory.
        // unregister_post_type( 'book' );
        // Clear the permalinks to remove our post type's rules from the database.
        // flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'des_image_360_deactivate' );
?>