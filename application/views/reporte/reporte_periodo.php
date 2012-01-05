<div id="mod_title" class="mod_add_finanzas">
	Reportes
</div>
                      
<div id="mod_content">
	<div class="row">
    	<div id="venta_factura" class="span5">
		    Reporte Por Periodo
	    </div>
	    <div id="venta_fecha" class="span5">
    		<?php echo "Del $fecha_inicio al $fecha_fin"; ?>
	    </div>
	</div>
	<div id="detsep"></div>
    <div class="row">
    	<div class="span4">
        	Cantidad de Ventas
       	</div>
        <div class="span4">
        	<?php echo $cantidad; ?>
        </div>
   	</div>
    <div class="row">
    	<div class="span4">
        	Total vendido
       	</div>
        <div class="span4">
        	<?php echo $total; ?>
        </div>
   	</div>
<div class="row">
   		<div id="venta_factura" class="span10">
        	Desgloce de Ventas
   		</div>
    </div>
	<div id="detsep"></div>
    <div class="row">
    	<div class="span3">
        	No. Venta
       	</div>
        <div class="span3">
        	SubTotal antes de IVA
        </div>
        <div class="span3">
        	Total
        </div>
   	</div>
    <?php
	foreach ($ventas as $row){
		echo "<div class='row'><div class='span3'>".$row['id_venta']."</div><div class='span3'>".$row['subtotal']."</div><div class='span3'>".(double)($row['subtotal']+$row['iva'])."</div></div>";
	}
	?>
</div>