
 <div class="row">
                          	<div class="span10">
							 <form id="nuevo_credito" method="post" action="<?php echo site_url("credito/pago/".$credito['idcredito']); ?>" class="form-stacked">
                            	<div class="clearfix">
                            	<label for="abono">Cantidad de Pago</label>
                                <div class="input">
                                  <input class=" span4" id="abono" name="abono" size="30" type="text">
                                </div>                
                                </div>
								
								 <input type="hidden" value="seguro" name="seguro"/>
                          	<button type="submit" class="btn primary">Pagar</button>&nbsp;<button type="reset" class="btn">Cancelar</button>
                   
                                  
							</form>
                            </div>
                                                    
                          </div>
                                    
                                  
                                    <div class="row clearfix"></div>