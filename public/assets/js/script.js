$(function(){

  $(".viewerimages360").each(function(){     
    const data = JSON.parse( $(this).attr("data-json") );  
    const id = $(this).attr("rel");
    console.log(id);
    let visor360 = new PhotoSphereViewer.Viewer({
      container: document.querySelector('#'+$(this).attr('id')), 
      lang: {
        autorotate: 'Automatic rotation',
        zoom      : 'Zoom',
        zoomOut   : 'Zoom out',
        zoomIn    : 'Zoom in',
        download  : 'Download',
        fullscreen: 'Fullscreen',
        menu      : 'Menu',
        twoFingers: ['Use two fingers to navigate'],
        loadError : 'The panorama can\'t be loaded',
      },
      defaultZoomLvl:0 
    });
    visor360.setPanorama(data[0]);
    data.map(function(res){ 
      $(".contimages360mini .splide__list").append(`
        <li class="splide__slide">
          <img src='${res}' />
        </li>
      `);
      setTimeout(function(){ 
        new Splide( '#images-slider-360'+id,{
          perPage    : 8,
          breakpoints: {
            600: {
              perPage: 4,
            }
          }
        } ).mount(); 
      },100)
      

      $(".contimages360mini img").click(function(){
        console.clear();
        visor360.setPanorama($(this).attr("src"));
        console.clear();
      })
    })

  })

  
})