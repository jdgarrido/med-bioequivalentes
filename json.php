<?php
/*
* Obtenemos el csv desde Datos.gob.cl http://datos.gob.cl/datasets/ver/1303
* listado de productos equivalentes terapeuticos.
* Información proporcionada por el Instituto de Salud Pública
*/
$aData = array();
$fila = 1;
if (($gestor = fopen("http://datos.gob.cl/recursos/download/740", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        $numero = count($datos);
        if($fila > 13 ) {
        	if(!empty($datos[1]) && !is_null($datos[1])) {
        		//verificamos si existe la KEY en el arreglo, nuestra KEY es el campo "Principio activo" del csv
	        	if (array_key_exists($datos[1], $aData)) {
	        		$hijo = count($aData[$datos[1]]);
	        		$aData[utf8_encode($datos[1])][$hijo] = array( 'Principio Activo' => utf8_encode($datos[1]), 'Producto' => utf8_encode($datos[2]), 'Registro' => $datos[3], 'Titular' => utf8_encode($datos[4]), 'Resolución' => utf8_encode($datos[5]), 'Fecha resolución' => $datos[6], 'Uso / Tratamiento' => utf8_encode($datos[7]));
	        	} else {
	        		$aData[utf8_encode($datos[1])][0] = array( 'Principio Activo' => utf8_encode($datos[1]), 'Producto' => utf8_encode($datos[2]), 'Registro' => $datos[3], 'Titular' => utf8_encode($datos[4]), 'Resolución' => utf8_encode($datos[5]), 'Fecha resolución' => $datos[6], 'Uso / Tratamiento' => utf8_encode($datos[7]));
	        	}
        	}
        	
        }
        $fila++;
    }
    fclose($gestor);
}

echo json_encode($aData);
?>