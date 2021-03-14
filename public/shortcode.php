<?php 
  function des_image_360_shortcode( $atts = [], $content = null, $tag = '' ) {
    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
 
    // override default attributes with user attributes
    $desarro_atts = shortcode_atts(
        array(
            'id' => null,
        ), $atts, $tag
    );
    
    if($desarro_atts['id']){
        global $wpdb; // this is how you get access to the database       
        // $wpdb->show_errors( true ); 
        $result = $wpdb->get_row( " SELECT * FROM  ". $wpdb->prefix ."des_image_360 where id=".$desarro_atts['id']);
        $imagesurl = [];
        foreach (json_decode($result->shortcode) as $key => $item) {
           $imagesurl[] = wp_get_attachment_url($item);
        }
        
        echo "
        <div class='contimages360'>
            <div class='viewerimages360' data-json='".json_encode($imagesurl)."' rel='".$desarro_atts['id']."' id='viewerimages360".$desarro_atts['id']."'></div>
            <div class='contimages360mini'>
                <div  id='images-slider-360".$desarro_atts['id']."' class='splide'>
                    <div class='splide__track'>
                        <ul class='splide__list'>
                        </ul>
                    </div>
                </div>
            </div>
        </div>";        
    } else{
        return '';
    } 
}
 
/**
 * Central location to create all shortcodes.
 */
function des_image_360_shortcodes_init() {
  add_shortcode( 'des_image_360_shortcode', 'des_image_360_shortcode' );
}
 
add_action( 'init', 'des_image_360_shortcodes_init' );




?>