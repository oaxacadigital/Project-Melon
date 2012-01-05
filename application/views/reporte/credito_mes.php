<div id="mod_title" class="mod_add_finanzas">
	Reporte de credito
</div>
                      
<div id="mod_content">
	<div class="row">
    	<div id="venta_factura" class="span5">
		    Reporte Mensual
	    </div>
	    <div id="venta_fecha" class="span5">
    		<?php echo "$mes de $anio"; ?>
	    </div>
	</div>
	<div id="detsep"></div>
    <div class="row">
    	<div class="span4">
        	Numero de Creditos
       	</div>
        <div class="span4">
        	<?php echo $num_credito; ?>
        </div>
   	</div>
    <div class="row">
    	<div class="span4">
        	Total a Pagar
       	</div>
        <div class="span4">
        	<?php echo $cantidad_actual; ?>
        </div>
   	</div>
    <br />

    <div class="row">
        <div id="venta_factura" class="span10">
            Descripci&oacute;n de creditos.
        </div>
    </div>
	<div id="detsep"></div>
    <div class="row">
    	<div class="span3">
        	Factura
       	</div>
        <div class="span3">
        	Descripcion
        </div>
        <div class="span3">
        	Total a pagar
        </div>
   	</div>
    <?php
	foreach ($creditos as $row){
		echo "<div class='row'><div class='span3'>".$row['factura']."</div><div class='span3'>".$row['descripcion']."</div><div class='span3'>".$row['cantidad_actual']."</div></div>";
	}
	?>
    
</div>
