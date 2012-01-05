 <?php if($inser=="true"){ ?>        
<div class="alert-message success">
                     	<a class="close" href="#">×</a>
                     	<p><strong>Registro Exitoso!</strong> El proovedor se ha registrado correctamente. <a href=" <?php echo site_url("proveedor/"); ?>">Ver proovedores.</a></p>
                     </div>	
                    	<?php } ?>	
                    
                      <div id="mod_title" class="mod_add_proveedor">
                      Nuevo Proveedor
                      </div>
                      
                      <div id="mod_content">
                      
                      <form id="nuevo_proveedor" method="post" action="<?php echo site_url("proveedor/nuevo/"); ?>" class="form-stacked">

                          <div class="clearfix">
                            <label for="razon_social">Razon Social</label>
                            <div class="input">
                              <input class="xlarge span9" id="razonsocial" name="razonsocial" size="30" type="text">
                            </div>                
                          </div>
                          
                          <div class="clearfix">
                            <label for="direccion">Direccion</label>
                            <div class="input">
                              <input class="xlarge span9" id="direccion" name="direccion" size="30" type="text">
                            </div>                
                          </div>
                          
                          <div class="row">
                          	<div class="span5">
                            	<div class="clearfix">
                            	<label for="telefono">Telefono</label>
                                <div class="input">
                                  <input class="xlarge span4" id="telefono" name="telefono" size="30" type="text">
                                </div>                
                                </div>
                            </div>
                            <div class="span5">
                            	<div class="clearfix">
                            	<label for="contacto">Contacto</label>
                                <div class="input">
                                  <input class="xlarge span4" id="contacto" name="contacto" size="30" type="text">
                                </div>                
                                </div>
                            </div>                            
                          </div>
                          <div class="actions">
                          	<button type="submit" class="btn primary">Guardar</button>&nbsp;<button type="reset" class="btn">Cancelar</button>
                          </div>
                                                    
                      </form>
                      
                      </div>
                      
                      