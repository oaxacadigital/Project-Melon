<div id="mod_title" class="mod_list_proveedor">
                     Articulos
                      </div>
                      
                      <div id="mod_content">
                      
                      <div class="row clearfix">
	                      <div class="span8 ">
                          <form id="buscar" method="GET" action="<?php echo site_url("articulo"); ?>">
                          		<input name="q" type="text" placeholder="Articulo" />
                                <input type="submit" value="Buscar"/>
                          </form>
                          </div>
                          <div class="pull-right" align="right"> 
                          	<a href="<?php echo site_url("articulo/nuevo/"); ?>"><img src="<?php echo base_url(); ?>site_media/images/icon_add.png" width="26" height="26" /></a>
                          </div>

                      </div>
                         
						 <div id="detalle_articulo">
                            <strong>Detalle del articulo</strong> <span class="pull-right"> <a id="det_close" href="#">Cerrar</a></span>
                            
                            	<div id="panel" class="detalle_content">
                                	
                           	  </div>
                        	</div>
                     <br>
							<div id="eliminar_articulo">
								<div class="elimina_articulo">
								
								</div>
							</div> 
                     
                         
                       
                      <table class="zebra-striped" id="tabla_articulo">
                        <thead>
                
                          <tr>
                            <th class="blue header">Clave</th>
                            <th class="blue header systab">Nombre</th>
                            <th class="green header systab">Proveedor</th>
                            <th class="red header">Stock</th>                            
                            <th class="red header">Precio</th>
							
                            <th class="">Acciones</th>
                          </tr>
                        </thead>
                
                        <tbody>
                        
						 <?php 

								foreach ($info['data']as $row)
									{
						?> 
						
                        <tr>
                            <td><?php echo $row['codigo_art'];?></td>
                            <td><?php echo $row['nombre'];?> </td>
                            <td><?php echo $row['razonsocial'];?> </td>
                            <td><?php echo $row['existencia'];?> </td>
                            <td><?php echo $row['p_venta'];?> </td>
                            <td><a   href="<?php echo base_url(); ?>articulo/consulta/<?php echo $row['idarticulo'];?> " class=" pull-left ui-silk ui-silk-application-edit">Editar</a> <a onclick="detalle_articulo(<?php echo $row['idarticulo'] ?>);"  href="#" class=" pull-left ui-silk ui-silk-zoom">Detalle</a> <a onclick="elimina_articulo(<?php echo $row['idarticulo'] ?>);"  href="#" class="ui-silk ui-silk-delete">Eliminar</a></td>
                          </tr>
                            <?php
						}	                
						?>   
                        </tbody>
                      </table>
                      <div id="paginacion">
					  
                      </div>
                      </div>
                      
                      