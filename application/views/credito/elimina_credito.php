  <div class="alert-message block-message error fade in" data-alert="alert">
            <a class="close" href="#">x</a>
            <p><strong>Esta Apunto de Eliminar!</strong> El siguiente Credito: <?php echo $credito['idcredito'];?> - <?php echo $credito['razonsocial'];?> <br>Esta seguro que quiere hacer esto.</p>

            <div class="alert-actions">
			  <form  method="post" action="<?php echo site_url("credito/elimina/".$credito['idcredito']); ?>" class="form-stacked">
			  <input type="hidden" value="seguro" name="seguro"/>
			  	<button type="submit" class="btn primary" >Eliminar</button>&nbsp;
              
			  </form>
            </div>
          </div>