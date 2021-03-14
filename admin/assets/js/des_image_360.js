const $ = jQuery;
$(function(){ 

  var file_frame; // variable for the wp.media file_frame
  // attach a click event (or whatever you want) to some element on your page
  $( '#select_images_360' ).on( 'click', function( event ) {
      event.preventDefault();

      // if the file_frame has already been created, just reuse it
      if ( file_frame ) {
          file_frame.open();
          return;
      }

      file_frame = wp.media.frames.file_frame = wp.media({
          title: "Seleccionar imagenes 360",
          button: {
              text: "Seleccionar",
          },
          multiple: true, // set this to true for multiple file selection
          library: {
            type: [ 'image' ]
          },
      });

      file_frame.on( 'select', function() {
          attachment = file_frame.state().get('selection').toJSON();
          $(".cargando_des_image_360").show();
          $(".cargando_des_image_360").css({'display':'flex'});
          let data = {
            'action': 'des_image_360_create',           
            'images': attachment
          };  
          jQuery.post(ajax_object_des_image_360.ajax_url, data, (response) => {
            // const data = JSON.parse(response);            
            location.reload();
          });


          // do something with the file here
          // $( '#frontend-button' ).hide();
          // $( '#frontend-image' ).attr('src', attachment.url);
      });

      file_frame.open();
  });
})
eliminarimage360 = function(id){
  if(confirm("Seguro que desea continuar")){
    let data = {
      'action': 'des_image_360_delete',           
      'id': id
    };  
    $(".cargando_des_image_360").show();
    $(".cargando_des_image_360").css({'display':'flex'});
    jQuery.post(ajax_object_des_image_360.ajax_url, data, (response) => { 
      location.reload();
    });
  }
}