<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Proyecto Melon.</title>

<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen, projection">

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection"> 

<script type="text/javascript" src="js/jquery.min.js"></script>bootstrap-dropdown
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>

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
                		<li><a href="#">Enlace Uno</a></li>
                		<li><a href="#">Enlace Dos</a></li>
                		<li class="divider"></li>
                		<li><a href="#">Enlace Tres</a></li>
              		</ul>
            	</li>
          <form class="pull-left" action="">
          		<input placeholder="Search" type="text">
          </form>
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
                Ferreteria Hermanos De Urrutia Hernandez
                </div>
                <div id="system_date">
                3 de Octubre de 2011
                </div>
                
                <div id="system_user">
                Bienvenido usuario!
                	<div id="system_user_log">
                    	<div id="user_password">
                        	<a href="#">Password</a>
                        </div>
                        <div id="user_logout">
                        	<a href="#">Salir</a>
                        </div>                    
                    </div>
                </div>
                
                <div id="estadisticas">
                Ventas del dia
                	<div id="cantidad">
                    $ 4780.67
                    </div>
                </div>
                
                <div id="estadisticas">
                Compras del dia
                	<div id="cantidad">
                    $ 683.55
                    </div>
                </div>
                
                <div id="menu">
                	<h6>Opciones de Sistema</h6>
                    <ul>
                    	<li><a href="#">Articulos por agotarse</a></li>
                        <li><a href="#">Creditos por vencer</a></li>
                        <li><a href="<?php base_url('finanzas/venta/hoy'); ?>">Ventas de hoy</a></li>
                        <li><a href="#">Compras</a></li>
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
                	<a href="#">Nueva Venta</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="nuevo_articulo">
                </div>
                <div id="icon_desc">
                	<a href="#">Nuevo Inventario</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="inventario">
                </div>
                <div id="icon_desc">
                	<a href="#">Inventario</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="nuevo_proveedor">
                </div>
                <div id="icon_desc">
                	<a href="#">Nuevo Proveedor</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="proveedores">
                </div>
                <div id="icon_desc">
                	<a href="#">Proveedores</a>
                </div>            
           	  </div>
              
              <div id="app">
              	<div id="icon" class="finanzas">
                </div>
                <div id="icon_desc">
                	<a href="#">Finanzas</a>
                </div>            
           	  </div>

        	</div>
        </div>              
        </div>    	
        
        <div id="system">
    		<div id="panel">
            	<div id="sistema">
                	<div id="panel">
                    probandooooo
                    </div>
                </div>                    		
        	</div>    
    	</div>
        
    </div>
    
</div>

	
</body>
</html>
