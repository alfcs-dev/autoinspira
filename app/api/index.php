<?php

//print phpinfo();

function elimina_vacios($dat){
    if($dat != ""){
        if(key($dat) >= 25){
            $llave  = key($dat);
            $array  = [$llave => $dat]; 
            return $array;
        }else{
            return $dat;
        }

    }

}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = strtolower($string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function get_csv($archivo){

    $i = $m = 0;
    $data = [];
    $marcas = [];
    if (($gestor = fopen($archivo, "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 21500, ";")) !== FALSE) {


            if(!in_array($datos[3],  $data['marcas']) && $datos[3] != 'Marca' && $datos[3] != '' && $datos[3] != '0'  ){
                $data['marcas'][$m] = $datos[3];
                $m++;
            }

            if($i == 0){ $data['llaves'] = $datos;
            }else{$data['generico'][$i]  = $datos;}

           $data['generico'][$i] = array_filter($data['generico'][$i], elimina_vacios);
            if($data['generico'][$i][0] == '' || $data['generico'][$i][0] == NULL){
                unset($data['generico'][$i]);
            }
            $i++;
        

        }

        $data['generico'] = array_values(array_filter($data['generico']));
    }
    $test = array_shift($data['generico']);

    return $data; 

};

function marcas($valor){
    //$val = "Marca: ".$valor;
    //return $val;

    foreach ($valor as $key => $value) {
        $var['id']     =  $key;
        $var['marca']  = $value;
        $nvo_arreglo[] = $var; 
    }
    $my_file = '../json/marcas.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($valor));
    fclose($handle);

    return $nvo_arreglo;
}

function modelos($arreglo){
    $i = 0;
    $arr = [];
    $arr_gen = [];
    $modelos = [];
    $precios = [];
    $esp;
    $precios_1 = [];
    $precios_2 = [];
    $precios_3 = [];
    $precios_4 = [];
    $precios_5 = [];
    $precios_6 = [];
    $precios_7 = [];
    $precios_8 = [];
    $precios_9 = [];
    $precios_10 = [];

    foreach($arreglo['generico'] as $key => $indice){
        if( isset($indice[3]) && isset($indice[5]) ) {
            $arr['modelo']  = $indice[5];
            $arr['version']     = $indice[4]; 
            $arr['descripcion'] = $indice[6]; 
            $arr['medidas'] = $indice[7]; 
            $motor = explode(' ', $indice[8]);
            $arr['cilindros'] = $motor[0];
            $arr['tipo_motor'] = $motor[1];
            $arr['cilindraje'] = $indice[9];
            $arr['caballos'] = $indice[10];
            $arr['rendimiento_combinado'] = $indice[13].'km/l';
            $arr['marca'] = array_search($indice[3], $arreglo['marcas']);
            $arr['precio_sugerido'] = (int)str_replace(',', '', $indice[17]);
            $arr['precio_publico_venta'] = (int)str_replace(',', '', $indice[17]);
            $arr['precio_cambio_maximo'] = (int)str_replace(',', '', $indice[18]);
            $arr['precio_cambio_minimo'] = (int)str_replace(',', '', $indice[19]);
            $arr['precio_publico_compra'] = (int)str_replace(',', '', $indice[20]);
            $arr['precio_credito_minimo'] = (int)str_replace(',', '', $indice[21]);
            $arr['precio_credito_maximo'] = (int)str_replace(',', '', $indice[22]);
            
            $indice[24] = str_replace("\\", "/", $indice[24]);
            $indice[24] = str_replace('FOTOS DE AUTOS', 'images/Autos', $indice[24]);
            $arr['imagen'] = $indice[24];
           foreach($indice as $key => $element){
                if($key >= 25){
                    $element =  str_replace(',', '', $element);
                    $esp[$arreglo['llaves'][$key]] = (int)$element;
                }
            }
            $arr['especiales'] = $esp; 

            unset($esp);
            if($indice[18] == NULL || $indice[18] == ''){
                $precio = $indice[17]; 
                $precio = str_replace(',', '', $precio);
                $precio = (int)$precio;
                //$arr['precio_sugerido'] = $precio;                
            }
            else{
                $precio = $indice[18]; 
                $precio = str_replace(',', '', $precio);
                $precio = (int)$precio;
                //$arr['precio_sugerido'] = $precio; 
            }


            if($precio > 0){
                if($precio <= 50000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_1[] = $mod_pr;
                }
                elseif($precio > 50000 && $precio <= 80000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_2[] = $mod_pr;
                }
                elseif($precio > 80000 && $precio <= 120000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_3[] = $mod_pr;
                }
                elseif($precio > 120000 && $precio <= 165000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_4[] = $mod_pr;
                }
                elseif($precio > 165000 && $precio <= 200000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_5[] = $mod_pr;
                }
                elseif($precio > 200000 && $precio <= 250000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_6[] = $mod_pr;
                }
                elseif($precio > 250000 && $precio <= 320000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_7[] = $mod_pr;
                }
                elseif($precio > 320000 && $precio <= 380000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_8[] = $mod_pr;
                }
                elseif($precio > 380000 && $precio <= 450000){
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_9[] = $mod_pr;
                }
                else{
                    $mod_pr['id_modelo'] = $i;
                    $mod_pr['precio'] = $precio;
                    $precios_10[] = $mod_pr;
                }
            }

        }
        
        $modelos[$i] = $arr;
        $p['id_modelo'] = $i;
        $precios[$i] = (int)$precio;
        $i++;
    } //END FOREACH

    $my_file = '../json/modelos.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($modelos));
    fclose($handle);
    $my_file = '../json/precios.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios));
    fclose($handle);
    $my_file = '../json/rango1.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_1));
    fclose($handle);
    $my_file = '../json/rango2.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_2));
    fclose($handle);
    $my_file = '../json/rango3.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_3));
    fclose($handle);
    $my_file = '../json/rango4.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_4));
    fclose($handle);
    $my_file = '../json/rango5.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_5));
    fclose($handle);
    $my_file = '../json/rango6.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_6));
    fclose($handle);
    $my_file = '../json/rango7.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_7));
    fclose($handle);
    $my_file = '../json/rango8.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_8));
    fclose($handle);
    $my_file = '../json/rango9.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_9));
    fclose($handle);
    $my_file = '../json/rango10.json';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly
    fwrite($handle, json_encode($precios_10));
    fclose($handle);

    return $modelos;
}

if($var = get_csv("BASE_FINAL.csv")){
    $marcas_nvo = marcas($var['marcas']);
    $mod = modelos($var);
}


?>


