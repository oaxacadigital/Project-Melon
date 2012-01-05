<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Proyecto Melon.</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/bootstrap.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/silk-sprite.css" type="text/css" media="screen, projection"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/jquery.validity.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/autosuggest.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/datePicker.css" type="text/css" media="screen, projection"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/style.css" type="text/css" media="screen, projection">  
<?php
if(isset($estilos_css))
	{
	foreach($estilos_css as $css)
		{
		echo '<link rel="stylesheet" href="'.site_url().'site_media/css/'.$css.'.css" type="text/css" media="screen, projection">';   
		}
	}	
?>

<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/jquery.validity.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-alerts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-twipsy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-popover.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-scrollspy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/bootstrap-tabs.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/autosuggest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>site_media/js/date.js"></script>


<?php
if(isset($scripts_js)){
	foreach($scripts_js as $js)
		{
		echo '<script type="text/javascript" src="'.site_url().'site_media/js/'.$js.'.js"></script>';        
		}
	}	
?>


<script type="text/javascript">  
<?php  if(isset($js_extra)){echo $js_extra;} ?>
$.validity.setup({ outputMode:"summary" });
var id;
var nombre;
var clave;
var precio;
var existencia;
var cantidad;

var total=0.00;
var subtotal=0.00;
var iva=0.00;
var articulos=[];

</script>



<script type="text/javascript"> 
   

function resize(){ 
var windowheight = window.screen.height; 
var frame = document.getElementById("sidebar");
frame.style.height = windowheight + "px"; 
} 

$(document).ready(function() {
	
	$('.close').click(function() {
		$(".alert-message").alert();
	});
	
	
	
	$('#det_close').click(function() {
		$('#detalle_articulo').slideUp("slow");
	});
	
	$('#nuevo_articulo').validity(function() {
		$("#nombre").require();            
		$("#clave").require();
		$("#categoria").require();
		$("#stock_minimo").require().match("integer");
		$("#stock_inicial").require().match("integer");
		$("#p_compra").require().match("usd");
		$("#p_venta").require().match("usd");
		$("#descripcion").require();
		$("#proveedor").require();
	});
	
	$('#nuevo_proveedor').validity(function() {
		$("#razonsocial").require();            
		$("#direccion").require();
		$("#telefono").require();
		$("#contacto").require();		
	});
	
	$(function() {
		$("#tabla_articulo").tablesorter({ sortList: [[1,0]] });
		$("#tabla_proveedores").tablesorter({ sortList: [[1,0]] });
	});
	
});


function detalle(){
	$('#detalle_articulo').slideUp("slow",function(){
		$('#detalle_articulo').slideDown("slow");	
	});
	}
	
	
	
	
	
function detalle_articulo(id){
	
	$('#detalle_articulo').slideUp("slow",function(){
		var url = '<?php echo base_url(); ?>articulo/detalle/'+id ;
		$('.detalle_content').html("");
		$('.detalle_content').load(url);
		
		
		$('#detalle_articulo').slideDown("slow");	
		});	
	}	
function elimina_articulo(id){
	
	$('#eliminar_articulo').slideUp("slow",function(){
		var url = '<?php echo base_url(); ?>articulo/elimina/'+id ;
		$('.elimina_articulo').html("");
		$('.elimina_articulo').load(url);
		
		
		$('#eliminar_articulo').slideDown("slow");	
		});	
	}	
		
function elimina_proveedor(id){
	
	$('#eliminar_proveedor').slideUp("slow",function(){
		var url = '<?php echo base_url(); ?>proveedor/elimina/'+id ;
		$('.elimina_proveedor').html("");
		$('.elimina_proveedor').load(url);
		
		
		$('#eliminar_proveedor').slideDown("slow");	
		});	
	}		
function elimina_credito(id){
	
	$('#eliminar_credito').slideUp("slow",function(){
		var url = '<?php echo base_url(); ?>credito/elimina/'+id ;
		$('.elimina_credito').html("");
		$('.elimina_credito').load(url);
		
		
		$('#eliminar_credito').slideDown("slow");	
		});	
	}
function pago_credito(id){
	
	$('#pagar_credito').slideUp("slow",function(){
		var url = '<?php echo base_url(); ?>credito/pago/'+id ;
		$('.paga_credito').html("");
		$('.paga_credito').load(url);
		
		
		$('#pagar_credito').slideDown("slow");	
		});	
	}

</script>

</head>

<body>
<div class="topbar-wrapper" style="z-index: 5;">
	<div class="topbar" data-dropdown="dropdown">
    	<div class="topbar-inner">
        	<div class="container">
            	<div id="logo"></div>
            	<h3 class="project_title"><a href="#">Administrador de Inventarios</a></h3>
          		
          
          <ul class="nav secondary-nav">          
          		<li class="dropdown">
              	<a href="#" class="dropdown-toggle">Opciones</a>
              		<ul class="dropdown-menu">
                		<li><a href="#">Manual de Usuario</a></li>
                		<li><a href="#">Respaldo</a></li>
                		<li class="divider"></li>
                		<li><a href="#">Acerca</a></li>
              		</ul>
            	</li>          
          </ul>
		</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<div id="system_content" class="container">
	<div id="sidebar">
    	<div id="side_menu">
        	<div id="panel">
            	<div id="system_title">
                Sistema Ferreteria
                </div>
                <div id="system_date">
                <?php echo date("d-M-Y"); ?>
                </div>
                
                <div id="system_user">
                Bienvenido <?php echo $username; ?>!
                	<div id="system_user_log">
                    	<div id="user_password">
                        	<a href="#">Password</a>
                        </div>
                        <div id="user_logout">
                        	<a href="<?php echo base_url("auth/logout"); ?> ">Salir</a>
                        </div>                    
                    </div>
                </div>
                
                <div id="estadisticas">
                Ventas del dia
                	<div id="cantidad">
                    $ <?php echo $total_dia; ?>
                    </div>
                </div>               
                            
                <div id="menu">
                	<h6>Opciones de Sistema</h6>
                    <ul>
                    	<li><a href="<?php echo site_url("articulo/poragotarse"); ?>">Articulos por agotarse</a></li>
                        <li><a href="<?php echo site_url("credito/"); ?>">Creditos por vencer</a></li>
                        <li><a href="<?php echo site_url("finanzas/venta/hoy/"); ?>">Ventas de hoy</a></li>                        
                    </ul>
                </div>     
            </div>
        </div>
                
        <div id="side_apps">
        	<div id="panel">
            
			  <div id="app">
              	<div id="icon" class="ventas">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("ventas/"); ?>">Nueva Venta</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="nuevo_articulo">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("articulo/nuevo/"); ?>">Nuevo Articulo</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="inventario">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("articulo"); ?>">Inventario</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="nuevo_proveedor">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("proveedor/nuevo/"); ?>">Nuevo Proveedor</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="proveedores">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("proveedor"); ?>">Proveedores</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="credito">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("credito"); ?>">Creditos</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="finanzas">
                </div>
                <div id="icon_desc">
                	<a href="<?php echo site_url("finanzas/reporte"); ?>">Finanzas</a>
                </div>            
           	  </div>                          

        	</div>
        </div>              
        </div>    	
        
        <div id="system">
    		<div id="panel">
            	<div id="sistema">
                	<div id="panel">
                     <?php if(isset($frame)){ echo $frame; } ?>
                    </div>
                </div>                    		
        	</div>    
    	</div>
        
    </div>
    
</div>

	
</body>
</html>
