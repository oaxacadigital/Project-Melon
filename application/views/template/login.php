<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-stacked'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporteador</title>


<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/bootstrap.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo base_url(); ?>site_media/css/style.css" type="text/css" media="screen, projection"> 

</head>

<body id="bod_login">
	<div id="flogin">
    	
        <div id="login_logo">
   	    	<img src="<?php echo base_url(); ?>site_media/images/logo_login.png" />
        	
        </div>
        
        <div id="login_form">
          <h4>inicio de sesion</h4>
            <?php echo form_open($this->uri->uri_string()); ?>
   	    <p id="campo">
                  Usuario:<br />
                  <?php echo form_input($login); ?>
                </p>
              <p id="campo">
                Password:<br />
                <?php echo form_password($password); ?>
                </p>
               <p>
               <?php echo form_checkbox($remember); ?> Recordar<br>
              </p>
              <p align="center"><input class="btn primary" name="submit" type="submit" value="Conectar" id="conectar_boton" /></p>
            <?php echo form_close(); ?>
        </div>
        
</div>	
</body>
</html>
