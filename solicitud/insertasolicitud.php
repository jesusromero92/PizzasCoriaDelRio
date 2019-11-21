<?PHP
if (!isset($_REQUEST['enviar5'])){
	$mensaje="No se han enviado datos en el formulario";
}
else{
	$mensaje="";
	if ($mysqli=mysqli_connect("localhost","root")){
		if($mysqli->select_db("test")){
			$query='insert into registro4 values (NULL, "'.$_REQUEST['nombre'].'", "'.$_REQUEST['apellido'].'", "'.$_REQUEST['telefono'].'", "'.$_REQUEST['pizza'].'", "'.@$_REQUEST['lugar'].'", "'.@$_REQUEST['adjunto'].'")';
			$resultado=$mysqli->query($query);
			if($resultado)
				$mensaje="Revisaremos su solicitud para ver si podemos agregar su pizza a nuestra carta.¡Gracias por confiar en nosotros!";
			else 
				$mensaje="Imposible la inserci&oacute;n: ".$mysqli->error;	
		}
		else{
			$mensaje="Imposible seleccionar la BD";
		}
		$mysqli->close();
	}
	else{
		$mensaje="Imposible conectar con la BD";
	}
}
print"<HTML><HEAD></HEAD><BODY>";
print"<P>$mensaje<P>";
print"</BODY></HTML>";
?>