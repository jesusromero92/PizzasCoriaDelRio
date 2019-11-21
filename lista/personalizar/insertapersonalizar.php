<?PHP
if (!isset($_REQUEST['enviar3'])){
	$mensaje="No se han enviado datos en el formulario";
}
else{
	$mensaje="";
	if ($mysqli=mysqli_connect("localhost","root")){
		if($mysqli->select_db("test")){
			$query='insert into registro3 values (NULL, "'.$_REQUEST['nombre'].'", "'.$_REQUEST['calle'].'", "'.$_REQUEST['telefono'].'", "'.$_REQUEST['postal'].'", "'.@$_REQUEST['domicilio'].'", "'.@$_REQUEST['pequeña'].'", "'.@$_REQUEST['mediana'].'", "'.@$_REQUEST['Familiar'].'", "'.@$_REQUEST['ingrediente1'].'", "'.@$_REQUEST['ingrediente2'].'", "'.@$_REQUEST['ingrediente3'].'")';
			$resultado=$mysqli->query($query);
			if($resultado)
				$mensaje="Su pedido ha sido realizado.La pizza estará horneada en 15";
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