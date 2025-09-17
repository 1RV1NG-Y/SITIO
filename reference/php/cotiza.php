<?php 

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$informacion = $_POST['Especificaciones'];


$NumModulos = $_POST['NumModulos'];
$NumGalFotos = $_POST['NumGalFotos'];
$NumGalVideo = $_POST['NumGalVideo'];
$NumForm = $_POST['NumForm'];
$NumBanner = $_POST['NumBanner'];
$SistAdmin = $_POST['SistAdmin'];
$PerfilesUsuario = $_POST['PerfilesUsuario'];
$AdminSitio=$_POST['AdminSitio'];

$correo_empresa="Informacion WWW.RAINDE.NET";
$asunto="www.rainde.net";

/******************* Mensaje para el sitio **************/
$header = 'From: ' . $correo . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";
$mensaje = "Este mensaje fue enviado por " . $nombre. " \r \n \n";
$mensaje .= "Su e-mail es: " . $correo . " \r \n \n";
$mensaje .= "Su telefono es: " .$telefono. " \r \n \n";
$mensaje .= "INFORMACION TECNICA \r \n \n";
$mensaje .= "Numero de modulos informativos " .$NumModulos. " \r \n \n";
$mensaje .= "Numero de Galerias de fotos: " .$NumGalFotos. " \r \n \n";
$mensaje .= "Numero de Galerias de Video: " .$NumGalVideo. " \r \n \n";
$mensaje .= "Numero de formularios: " .$NumForm. " \r \n \n";
$mensaje .= "Numero de Banners: " .$NumBanner. " \r \n \n";
$mensaje .= "Sistema administrativo del sitio: " .$SistAdmin. " \r \n \n";
$mensaje .= "Sistema de perfiles de usuarios: " .$PerfilesUsuario. " \r \n \n";
$mensaje .= "Administracion y mantenimiento del sitio: " .$AdminSitio. " \r \n \n";

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
$asunto ="Informacion WWW.RAINDE.NET";
mail($para,$asunto, utf8_decode($mensaje), $header);

/*** informacion para administrador web***/
$para = 'hector.valdivia@rainde.net';
$asunto = "Informacion WWW.RAINDE.NET";
mail($para, $asunto, utf8_decode($mensaje), $header);


?>
	<script language="javascript">
		alert('Gracias, su mensaje ha sido enviado.');
		location.href="../PDWpaquete4.html";
	</script>