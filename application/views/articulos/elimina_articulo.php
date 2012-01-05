  <div class="alert-message block-message error fade in" data-alert="alert">
            <a class="close" href="#">x</a>
            <p><strong>Esta Apunto de Eliminar!</strong> El siguiente Articulo: <?php echo $articulo['codigo_art'];?> - <?php echo $articulo['nombre'];?> <br>Esta seguro que quiere hacer esto.</p>

            <div class="alert-actions">
			  <form  method="post" action="<?php echo site_url("articulo/elimina/".$articulo['idarticulo']); ?>" class="form-stacked">
			  <input type="hidden" value="seguro" name="seguro"/>
			  	<button type="submit" class="btn primary" >Eliminar</button>&nbsp;
              
			  </form>
            </div>
          </div>