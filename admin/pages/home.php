<?php 
  global $wpdb;

  $images = $wpdb->get_results('SELECT * from '. $wpdb->prefix .'des_image_360  ');
?>
<div class="container_des_image_360">
  <p>Plugin desarrollado por <a href="https://github.com/hlo2109" target="_blank">hlo21.com</a></p>

  <button class="btn" id="select_images_360">Seleccionar imagenes</button>
  <br><br>
  <table style="width:100%">
    <thead>
      <th>Id</th>
      <th>Shortcode</th>
      <th>Image(s)</th>   
      <th></th> 
    </thead>
    <tbody id="selectImages360">
      <?php 
        foreach ($images as $key => $item) {   
          $images = json_decode($item->shortcode);              
      ?>
        <tr> 
          <td><?php echo $item->id ?></td>
          <td><?php 
            echo '[des_image_360_shortcode id="'.$item->id.'"]';
            // echo wp_get_attachment_url($item->shortcode) 
          ?></td>
          <td><?php 
            foreach ($images as $keys => $id) { 
              echo "<a href='".wp_get_attachment_url($id)."' target='_blank' > ";
              echo wp_get_attachment_image($id);
              echo "</a>";
            }
          ?></td>
          <th><a href="javascript:void(0)" onClick="eliminarimage360(<?php echo $item->id ?>)">Eliminar</a></th>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="cargando_des_image_360">
          <div>Cargando...</div>
  </div>
  <p>Plugin desarrollado por <a href="https://github.com/hlo2109" target="_blank">hlo21.com</a></p>
</div>