<?php
function get_csv($archivo){
	$i = $m = 0;
    $data = array();
    if (($gestor = fopen($archivo, "r")) !== FALSE) {
    	while (($datos = fgetcsv($gestor, 21500, ";")) !== FALSE) {
    		$data[$i] = $datos;
    		$i++;
    	}
    }
    return $data;
}
$var = get_csv("tablakm.csv");
print_r($var);
?>