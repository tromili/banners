<?php
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$fono = $_POST['fono'];
	$asunto = $_POST['asunto'];
	$mail_destinatario = 'anthonny.gonzales@gmail.com';
	//echo $nombre;
	if(!is_null($nombre) && !is_null($correo) && !is_null($fono) && !is_null($asunto)){
		$cuerpo = "Formulario enviado\n";
		$cuerpo.= "Nombre: ".$nombre."\n";
		$cuerpo.= "Email: ".$correo."\n";
		$cuerpo.= "Asunto: ".$asunto."\n"; 		
		mail($mail_destinatario,"Formulario recibido",$cuerpo);
		echo 'Su mensaje a sido enviado correctamente. Gracias por contactar con nosostros';
		header('refresh:4; url=http://vinos.local/'); 
	}
?>
