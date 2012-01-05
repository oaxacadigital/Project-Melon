<div id="mod_title" class="mod_add_credito">
                    Creditos
                      </div>
                      
                      <div id="mod_content">
                      
                      <div class="row clearfix">
	                      
                          <div class="pull-right" align="right"> 
                          	<a href="<?php echo site_url("credito/nuevo/"); ?>"><img src="<?php echo base_url(); ?>site_media/images/icon_add.png" width="26" height="26" /></a>
                          </div>

                      </div>
                         
						 <div id="detalle_articulo">
                            <strong>Detalle del credito</strong> <span class="pull-right"> <a id="det_close" href="#">Cerrar</a></span>
                            
                            	<div id="panel" class="detalle_content">
                                	
                           	  </div>
                        	</div>
                     <br>
							<div id="eliminar_articulo">
								<div class="elimina_articulo">
								
								</div>
							</div> 
                     <div id="eliminar_credito">
								<div class="elimina_credito">
								
								</div>
							</div> 
                         <br>
                        <div id="pagar_credito">
								<div class="paga_credito">
								
								</div>
							</div> 
							
                      <table class="zebra-striped" id="tabla_articulo">
                        <thead>
                
                          <tr>
                           <th class="blue header">Factura</th>
						   <th class="blue header">Credito</th>
                           <th class="green header systab">Proveedor</th>
						   <th class="red header systab">Proximo Pago</th>
                           <th class="red header">Fin del Credito</th>                            
                        
							
                            <th class="">Acciones</th>
                          </tr>
                        </thead>
                
                        <tbody>
                        
						 <?php 

								foreach ($info['data']as $row)
									{
						?> 
						
                        <tr>
                            <td><?php echo $row['idcredito'];?></td>
							<td><?php echo $row['cantidad_inicial'];?> </td>
							<td><?php echo $row['razonsocial'];?> </td>
                            <td><?php echo $row['cantidad_actual'];?> </td>
							<td><?php echo $row['f_fincredito'];?> </td>
                          
                            <td> <a onclick="pago_credito(<?php echo $row['idcredito'] ?>);"  href="#" class=" pull-left ui-silk ui-silk-zoom">Pago</a> <a onclick="elimina_credito(<?php echo $row['idcredito'] ?>);"  href="#" class="ui-silk ui-silk-delete">Eliminar</a></td>
                          </tr>
                            <?php
						}	                
						?>   
                        </tbody>
                      </table>
                      
                      </div>
                      
                      