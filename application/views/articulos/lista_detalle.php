
<div class="row small">
                                      <div class="span6">
                                        <strong><?php echo $articulo['codigo_art'];?> - <?php echo $articulo['nombre'];?>  </strong>                             
                                        </div>
                                      <div class="span3">
                                        Existencia: <span id="det_existencia"><?php echo $articulo['existencia'];?></span>
                                      </div>
                                  </div>
                              <div class="row" id="det_descripcion">
                                    	<div class="span6">
                                    	<?php echo $articulo['descripcion'];?>
                                    	</div>
                                        <div id="det_cat" class="span3" >
                                       <strong>Categoria:</strong> <?php echo $articulo['nombre_c'];?>
                                        </div>
                                    </div>
                                    <div id="detsep"></div>
                                    
                                  <div class="row" id="det_descripcion">                                    	
                                  <div id="det_precio" class="span3">
                                        Precio Venta: $<?php echo $articulo['p_venta'];?>
                                        </div>
                                        <div id="det_precio" class="span3">
                                        Precio Costo: $<?php echo $articulo['p_compra'];?>
                                        </div>
                                        <div id="det_stock" class="span3">
                                        Stock Min: <?php echo $articulo['stock_min'];?>
                                        </div>
                                    </div>
                                    
                                  <div class="row" id="det_descripcion">                                    	
                                  <div id="det_prov" class="span9">
                                        Proveedor: <?php echo $articulo['razonsocial'];?>
                                        </div>                                        
                                  </div>
                                    
                                    <div class="row clearfix"></div>