<?php 

$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$movil= $_POST['movil'];
$nextel= $_POST['nextel'];
$correo = $_POST['correo'];
$empresa= $_POST['empresa'];
$informacion = $_POST['informacion'];

	if  (!empty($telefono) || $telefono != " " || !empty($movil) || $movil != " "  || !empty($nextel) || $nextel != " "  || !empty($correo) || $correo != " "  ) {

		$correo_empresa="ventas@rainde.net";
		$asunto="Solicitud de informacion WWW.RAINDE.NET";
		
		/******************* Mensaje para el sitio **************/
		$header = 'From: ' . $correo . " \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";
		$mensaje = "Este mensaje fue enviado por " . $nombre. " \r \n \n";
		$mensaje .= "Su e-mail es: " . $correo . " \r \n \n";
		$mensaje .= "Su telefono es: " .$telefono. " \r \n \n";
		$mensaje .= "Su celular es: " .$movil. " \r \n \n";
		$mensaje .= "Su NEXTEL es: " .$nextel. " \r \n \n";
		$mensaje .= "Empresa: " .$empresa. " \r \n \n";
		
		$mensaje .= "Mensaje: " . $informacion . " \r\n\n\n";
		$mensaje .=" La informacion ha sido enviada desde www.RAINDE.net \r\n\n";
		$mensaje .= "Enviado el " . date('d/m/Y', time())." \r\n";
		mail($correo_empresa, $asunto, utf8_decode($mensaje), $header);
		
		/********** Mensaje para el cliente *************************/
		$mensaje_usuario.="Gracias por contactarnos Sr(a)" . $nombre ." Pronto nos comunicaremos con Usted.  \r\n\n\n ";
		$mensaje_usuario.="Saludos.  \r\n \n \n";
		
		$mensaje_usuario.="Atte: RAINDE. Gracias por su preferencia \r\n\n ";
		$mensaje_usuario.=" Aguascalientes, Ags. México ";
		mail($correo, $asunto, utf8_decode($mensaje_usuario), $header);
		
		
		/*** informacion para administrador web***/
		$para = 'marco.salas@rainde.net';
		$asunto ="Solicitud de informacion WWW.RAINDE.NET";
		mail($para,$asunto, utf8_decode($mensaje), $header);
		
		/*** informacion para administrador web***/
		$para = 'hector.valdivia@rainde.net';
		$asunto = "Solicitud de informacion WWW.RAINDE.NET";
		mail($para, $asunto, utf8_decode($mensaje), $header);
		
		/*** informacion para administrador web***/
		$para = 'martha.padilla@rainde.net';
		$asunto = "Solicitud de informacion WWW.RAINDE.NET";
		mail($para, $asunto, utf8_decode($mensaje), $header);
		
		
		?>
		<script language="javascript">
				alert('Gracias, su mensaje ha sido enviado.');
				location.href="../contactanos.php";
		</script>
        <?php
		
	} else{
		
			?>
		<script language="javascript">
				alert('El mensaje no fue enviado debido a falta de datos. favor de enviarlo nuevamente');
				location.href="../contactanos.php";
		</script>
    	<?php		
	}
		?>
		
		
 
            