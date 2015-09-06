<?php 

	function dosmilcatorce($km){
		if($km <= 4999){ return 0.04;}
		elseif($km > 4999 && $km <= 9999){ return 0.03;}
		elseif($km > 9999 && $km <= 14999){ return 0.02;}
		elseif($km > 14999 && $km <= 19999){ return 0.01;}
		elseif($km > 19999 && $km <= 25000){ return 0.00;}
		elseif($km > 25000 && $km <= 30000){ return -0.01;}
		elseif($km > 30000 && $km <= 35000){ return -0.02;}
		elseif($km > 35000 && $km <= 40000){ return -0.03;}
		elseif($km > 40000 && $km <= 45000){ return -0.04;}
		else{return -0.065;}

	}
	function dosmiltrece($km){
		if($km <= 25000){ return 0.065;}
		elseif($km > 25000 && $km <= 29999){ return 0.04;}
		elseif($km > 29999 && $km <= 34999){ return 0.03;}
		elseif($km > 34999 && $km <= 39999){ return 0.02;}
		elseif($km > 39999 && $km <= 44999){ return 0.01;}
		elseif($km > 44999 && $km <= 50000){ return 0.00;}
		elseif($km > 50000 && $km <= 55000){ return -0.01;}
		elseif($km > 55000 && $km <= 60000){ return -0.02;}
		elseif($km > 60000 && $km <= 65000){ return -0.03;}
		elseif($km > 65000 && $km <= 70000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmildoce($km){
		if($km <= 45000){ return 0.065;}
		elseif($km > 45000 && $km <= 49999){ return 0.04;}
		elseif($km > 49999 && $km <= 54999){ return 0.03;}
		elseif($km > 54999 && $km <= 59999){ return 0.02;}
		elseif($km > 59999 && $km <= 64999){ return 0.01;}
		elseif($km > 64999 && $km <= 70000){ return 0.00;}
		elseif($km > 70000 && $km <= 75000){ return -0.01;}
		elseif($km > 75000 && $km <= 80000){ return -0.02;}
		elseif($km > 80000 && $km <= 85000){ return -0.03;}
		elseif($km > 85000 && $km <= 90000){ return -0.04;}
		else{return -0.065;}		
	}
	function dosmilonce($km){
		if($km <= 65000){ return 0.065;}
		elseif($km > 65000 && $km <= 69999){ return 0.04;}
		elseif($km > 69999 && $km <= 74999){ return 0.03;}
		elseif($km > 74999 && $km <= 79999){ return 0.02;}
		elseif($km > 79999 && $km <= 84999){ return 0.01;}
		elseif($km > 84999 && $km <= 90000){ return 0.00;}
		elseif($km > 90000 && $km <= 95000){ return -0.01;}
		elseif($km > 95000 && $km <= 100000){ return -0.02;}
		elseif($km > 100000 && $km <= 105000){ return -0.03;}
		elseif($km > 105000 && $km <= 110000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmildiez($km){
		if($km <= 85000){ return 0.065;}
		elseif($km > 85000 && $km <= 89999){ return 0.04;}
		elseif($km > 89999 && $km <= 94999){ return 0.03;}
		elseif($km > 94999 && $km <= 99999){ return 0.02;}
		elseif($km > 99999 && $km <= 104999){ return 0.01;}
		elseif($km > 104999 && $km <= 110000){ return 0.00;}
		elseif($km > 110000 && $km <= 115000){ return -0.01;}
		elseif($km > 115000 && $km <= 120000){ return -0.02;}
		elseif($km > 120000 && $km <= 125000){ return -0.03;}
		elseif($km > 125000 && $km <= 130000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmilnueve($km){
		if($km <= 105000){ return 0.065;}
		elseif($km > 105000 && $km <= 109999){ return 0.04;}
		elseif($km > 109999 && $km <= 114999){ return 0.03;}
		elseif($km > 114999 && $km <= 119999){ return 0.02;}
		elseif($km > 119999 && $km <= 124999){ return 0.01;}
		elseif($km > 124999 && $km <= 130000){ return 0.00;}
		elseif($km > 130000 && $km <= 135000){ return -0.01;}
		elseif($km > 135000 && $km <= 140000){ return -0.02;}
		elseif($km > 140000 && $km <= 145000){ return -0.03;}
		elseif($km > 145000 && $km <= 150000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmilocho($km){
		if($km <= 125000){ return 0.065;}
		elseif($km > 125000 && $km <= 129999){ return 0.04;}
		elseif($km > 129999 && $km <= 134999){ return 0.03;}
		elseif($km > 134999 && $km <= 139999){ return 0.02;}
		elseif($km > 139999 && $km <= 144999){ return 0.01;}
		elseif($km > 144999 && $km <= 150000){ return 0.00;}
		elseif($km > 150000 && $km <= 155000){ return -0.01;}
		elseif($km > 155000 && $km <= 160000){ return -0.02;}
		elseif($km > 160000 && $km <= 165000){ return -0.03;}
		elseif($km > 165000 && $km <= 170000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmilsiete($km){
		if($km <= 145000){ return 0.065;}
		elseif($km > 145000 && $km <= 149999){ return 0.04;}
		elseif($km > 149999 && $km <= 154999){ return 0.03;}
		elseif($km > 154999 && $km <= 159999){ return 0.02;}
		elseif($km > 159999 && $km <= 164999){ return 0.01;}
		elseif($km > 164999 && $km <= 170000){ return 0.00;}
		elseif($km > 170000 && $km <= 175000){ return -0.01;}
		elseif($km > 175000 && $km <= 180000){ return -0.02;}
		elseif($km > 180000 && $km <= 185000){ return -0.03;}
		elseif($km > 185000 && $km <= 190000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmilseis($km){
		if($km <= 165000){ return 0.065;}
		elseif($km > 165000 && $km <= 169999){ return 0.04;}
		elseif($km > 169999 && $km <= 174999){ return 0.03;}
		elseif($km > 174999 && $km <= 179999){ return 0.02;}
		elseif($km > 179999 && $km <= 184999){ return 0.01;}
		elseif($km > 184999 && $km <= 190000){ return 0.00;}
		elseif($km > 190000 && $km <= 195000){ return -0.01;}
		elseif($km > 195000 && $km <= 200000){ return -0.02;}
		elseif($km > 200000 && $km <= 205000){ return -0.03;}
		elseif($km > 205000 && $km <= 210000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmilcinco($km){
		if($km <= 185000){ return 0.065;}
		elseif($km > 185000 && $km <= 189999){ return 0.04;}
		elseif($km > 189999 && $km <= 194999){ return 0.03;}
		elseif($km > 194999 && $km <= 199999){ return 0.02;}
		elseif($km > 199999 && $km <= 204999){ return 0.01;}
		elseif($km > 204999 && $km <= 210000){ return 0.00;}
		elseif($km > 210000 && $km <= 215000){ return -0.01;}
		elseif($km > 215000 && $km <= 220000){ return -0.02;}
		elseif($km > 220000 && $km <= 225000){ return -0.03;}
		elseif($km > 225000 && $km <= 230000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmilcuatro($km){
		if($km <= 205000){ return 0.065;}
		elseif($km > 205000 && $km <= 209999){ return 0.04;}
		elseif($km > 209999 && $km <= 214999){ return 0.03;}
		elseif($km > 214999 && $km <= 219999){ return 0.02;}
		elseif($km > 219999 && $km <= 224999){ return 0.01;}
		elseif($km > 224999 && $km <= 230000){ return 0.00;}
		elseif($km > 230000 && $km <= 235000){ return -0.01;}
		elseif($km > 235000 && $km <= 240000){ return -0.02;}
		elseif($km > 240000 && $km <= 245000){ return -0.03;}
		elseif($km > 245000 && $km <= 250000){ return -0.04;}
		else{return -0.065;}
	}
	function dosmiltres($km){
		if($km <= 225000){ return 0.065;}
		elseif($km > 225000 && $km <= 229999){ return 0.04;}
		elseif($km > 229999 && $km <= 234999){ return 0.03;}
		elseif($km > 234999 && $km <= 239999){ return 0.02;}
		elseif($km > 239999 && $km <= 244999){ return 0.01;}
		elseif($km > 244999 && $km <= 250000){ return 0.00;}
		elseif($km > 250000 && $km <= 255000){ return -0.01;}
		elseif($km > 255000 && $km <= 260000){ return -0.02;}
		elseif($km > 260000 && $km <= 265000){ return -0.03;}
		elseif($km > 265000 && $km <= 270000){ return -0.04;}
		else{return -0.065;}
	}

if(isset($_REQUEST['year'])){
	$year = $_REQUEST['year'];
	$km = $_REQUEST['km'];
	switch ($year) {
		case 2014:
			$resp = dosmilcatorce($km);
			echo json_encode($resp);
			break;
		case 2013:
			$resp = dosmiltrece($km);
			echo json_encode($resp);
			break;
		case 2012:
			$resp = dosmildoce($km);
			echo json_encode($resp);
			break;
		case 2011:
			$resp = dosmilonce($km);
			echo json_encode($resp);
			break;
		case 2010:
			$resp = dosmildiez($km);
			echo json_encode($resp);
			break;
		case 2009:
			$resp = dosmilnueve($km);
			echo json_encode($resp);
			break;
		case 2008:
			$resp = dosmilocho($km);
			echo json_encode($resp);
			break;
		case 2007:
			$resp = dosmilsiete($km);
			echo json_encode($resp);
			break;
		case 2006:
			$resp = dosmilseis($km);
			echo json_encode($resp);
			break;
		case 2005:
			$resp = dosmilcinco($km);
			echo json_encode($resp);
			break;
		case 2004:
			$resp = dosmilcuatro($km);
			echo json_encode($resp);
			break;
		case 2003:
			$resp = dosmiltres($km);
			echo json_encode($resp);
			break;		
		default:
			echo json_encode("No existen registros para el año de tu vehiculo");
			break;
	}


}

?>