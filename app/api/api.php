<?php 
if(isset($_REQUEST['archivo_rango'])){
	$rango = '../json/'.$_REQUEST['archivo_rango'];
	$info_rango = file_get_contents($rango);
	$proc_rango = json_decode($info_rango);
	$modelos = file_get_contents('../json/modelos.json');	
	$proc_mod = json_decode($modelos);
	$marca = file_get_contents('../json/marcas.json');	
	$proc_mar = json_decode($marca);
	$arr = array();
	$prev_aut= array();
	foreach ($proc_mar as $key => $value) {
		if(!array_key_exists($value, $arr)){
			$arr[$value] = array();
		}
	}

	foreach ($proc_rango as $key => $value) {
		
		$en_rango = (array)$value;
		$id_modelo = $en_rango['id_modelo'];
		$mod = (array)$proc_mod[$id_modelo];
		$prev_aut['modelo'] = $mod['modelo'];
		$prev_aut['version'] = $mod['version'];
		$prev_aut['id_modelo'] = $id_modelo;
		if( !array_key_exists($mod['modelo'], $arr[$proc_mar[$mod['marca']]])){
			$arr[$proc_mar[$mod['marca']]][$mod['modelo']] = array();
		}


		array_push($arr[$proc_mar[$mod['marca']]][$mod['modelo']], $prev_aut);
		//print_r((array)$proc_mod[$id_modelo]);
		/*print "Value -> ".$en_rango['id_modelo'];
		print "<br>";
		print "-------------------------FIN VALOR------------------<br>";*/
	}

	
	

$arr = array_filter($arr, function($c){
	return (count($c)> 0 );
});

print json_encode($arr);

}

if(isset($_REQUEST['carro'])){
	$auto = array();
	$modelos = file_get_contents('../json/modelos.json');	
	$proc_mod = json_decode($modelos);
	$id_auto = $_REQUEST['carro'];
	$auto = (array)$proc_mod[$id_auto];

	echo json_encode($auto);
}

if(isset($_REQUEST['marca'])){
	$auto = array();
	$autos = array();
	$obj_to_array = array();
	$modelos = file_get_contents('../json/modelos.json');	
	$proc_mod = json_decode($modelos);
	$id_marca = $_REQUEST['marca'];
	$modelos_de_marca = array();
	foreach($proc_mod as $key => $value){
		if($value -> marca == $id_marca){
			
			if(!array_key_exists($value -> modelo, $obj_to_array)){
				$modelo = $value -> modelo;
				$obj_to_array[$modelo] = array();
			}

			$auto['modelo'] = $value -> modelo;
			$auto['version'] = $value -> version;
			$auto['desc'] = $value -> descripcion;
			$auto['id_modelo'] = $key;
			array_push($obj_to_array[$value -> modelo], $auto);
			//array_push($autos, $auto);
		}
	}
echo json_encode($obj_to_array);
}



?>