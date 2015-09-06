(function (Framework7, $$, T7,  autoapi) {
// Export selectors engine
var $$ = Dom7;

	function modelos(){
	$$('#loading').addClass('loading');
		var test = autoapi.modelos( function (data) {
			data = JSON.parse(data);
			if(data) {modelos =data; $$('#loading').removeClass('loading');}
			window.localStorage.setItem('modelos', JSON.stringify(data));
		});
		return JSON.parse(window.localStorage.getItem('modelos'));
	};

	function marcas(){
		$$('#btn-marcas').attr('disabled', '');
		var test = autoapi.marcas( function (data) {
			if(data) { marcas = data; }
			window.localStorage.setItem('marcas', JSON.stringify(data));
			$$('#btn-marcas').removeAttr('disabled');			
		});
		return JSON.parse(window.localStorage.getItem('marcas'));
	};

	var marcas_gen = marcas();
	
// Let's register Template7 helper so we can pass json string in links
	Template7.registerHelper('json_stringify', function (context) { return JSON.stringify(context);	});

	T7.registerHelper('time_ago', function (time) { return moment.unix(time).fromNow();	});

	// Initialize your app
	var myApp = new Framework7({
	    animateNavBackIcon: true,
	    // Enable templates auto precompilation
	    precompileTemplates: true,
	    // Enabled pages rendering using Template7
	    template7Pages: true,
	    // Specify Template7 data for pages
	    template7Data: {
	    	'page:marcas': ["Acura","Alfa Romeo","Audi","BMW","Buick","Cadillac","Cbo Trabajo","Cbo","Chevrolet Trabajo","Chevrolet","Chrysler","Dodge Trabajo","Dodge","Faw","Fiat Trabajo","Fiat","Ford Trabajo","FORD","Giant","Giant Trabajo","GMC","GMC Trabajo","Hino Trabajo","Honda","Hummer","Hyundai","Infiniti","Isuzu","Jaguar","Jeep","Land Rover","Lincoln","Mazda","Mercedes Benz Trabajo","Mercedes Benz","Mercury","Mini Cooper","Mitsubishi Trabajo","Mitsubishi","Nissan Trabajo","Nissan","Peugeot Trabajo","Peugeot","Pontiac","Porshe","Renault Trabajo","Renault","Rover","MG","Saab","Seat","Smart","Spartak Trabajo","Subaru","Suzuki","Toyota Trabajo","Toyota","Volkswagen","Volkswagen Trabajo","Volvo"]
	    }
	});

//console.log(myApp.template7Data.marcas);


// Add main View
var mainView = myApp.addView('.view-main', {
    // Enable dynamic Navbar
    dynamicNavbar: true,
});



window.myApp = myApp;


myApp.onPageInit('rangos', function (page) {
  // "page" variable contains all required information about loaded and initialized page 
	$$(document).on('click', '.rango', function (e) {
		e.preventDefault();
		var opcion = page.query.opt;
		var rango = $$(this).attr('id'), file = '', datos = [];
		switch(rango){
			case 'r1':
				file = 'rango1.json';
				
				break;
			case 'r2':
				file = 'rango2.json';
				break;
			case 'r3':
				file = 'rango3.json';
				break;
			case 'r4':
				file = 'rango4.json';
				break;
			case 'r5':
				file = 'rango5.json';
				break;
			case 'r6':
				file = 'rango6.json';
				break;
			case 'r7':
				file = 'rango7.json';
				break;
			case 'r8':
				file = 'rango8.json';
				break;
			case 'r9':
				file = 'rango9.json';
				break;
			case 'r10':
				file = 'rango10.json';
				break;
			default:
				alert('Tienes que Seleccionar un rango');

		}
		mod_marcas(file, opcion);
	});
})


function mod_marcas(file, opcion){
var contexto = {}; 
	$$('#loading').addClass('loading');
	var raiz = '/All Sites/autoinspira/app/json/';
			$$.ajax({
				url: '/All Sites/autoinspira/app/api/api.php',
				data : {'archivo_rango' : file},
				dataType: "JSON",
				success: function(data){ 
				
				var modelos_precio =JSON.parse(data);
				contexto = {};
				contexto.respuesta = modelos_precio;
				mainView.router.load({
					url: 'makes.html?opt='+opcion,
						context: contexto
					});
				$$('#loading').removeClass('loading');	
				},
				error: function (xhr) {
					console.log(xhr);
				}
			});

}
function carro(opcion){
		$$(document).on('click', '.carro', function (e) {
		e.preventDefault();
		var auto = $$((this)).data('id');
	    var contexto_auto = {}; 
		$$('#loading').addClass('loading');
		var raiz = '/All Sites/autoinspira/app/json/';
		$$.ajax({
			url: '/All Sites/autoinspira/app/api/api.php',
			data : {'carro' : auto},
			dataType: "JSON",
			success: function(data){ 
				var auto_caract =JSON.parse(data);
			 	contexto = auto_caract;
			 	if(opcion == 1){
			 		mainView.router.load({
						url: 'car.html',
						context: contexto
					});
			 	}
			 	else if(opcion == 2){
			 		mainView.router.load({
						url: 'car_venta.html',
						context: contexto
					});
			 	}
			 	else{
			 		myApp.alert('Ocurrio un error al procesar la solicitud', 'AUTOINSPIRA');
			 	}

			$$('#loading').removeClass('loading');	
			},
			error: function (xhr) {
				console.log(xhr);
			}
		});
	});
}
myApp.onPageInit('makes', function (page) {
console.log(page)
var opcion = page.query.opt;
carro(opcion)
});
myApp.onPageInit('autos_marcas', function (page) {
var opcion = page.query.opt;
carro(opcion)
});



$$(document).on('pageInit', '.page[data-page="car"]', function (e) {
	//console.log($$(this)[0].f7PageData.context);
	window.localStorage.setItem('precio_org_sug', parseInt($$('#prc_ch').text()));
	window.localStorage.setItem('precio_org_dis', parseInt($$('#prc_dis').text()));
	window.localStorage.setItem('precio_org_rev', parseInt($$('#prc_rev').text()));

	var precio_org_sug = $$(this)[0].f7PageData.context.precio_sugerido;
	var precio_org_dis = $$(this)[0].f7PageData.context.precio_distribuidora;
	var precio_org_rev = $$(this)[0].f7PageData.context.precio_revendedor;
	//console.log(precio_org);
	$$('#calculakm').on('click', function(e){
	var year = parseInt($$('#year span').text()),  km = $$('#kilometraje').val();
	console.log('Carro del anio '+ year + ' con ' + km);
	if(isNaN(km) || km === ""){
		myApp.alert('Debes ingresar un numero para hacer el calculo');
	}else{
		$$.ajax({
		url: '/All Sites/autoinspira/app/api/km_api.php',
		data : {'year' : year, 'km': km},
			dataType: "JSON",
			success: function(data){ 
				var precio_act = parseInt($$('#prc_ch').text()), precio_dis = parseInt($$('#prc_dis').text()), precio_rev = parseInt($$('#prc_rev').text()), factor = parseFloat(data);
				if(factor === 0){
					myApp.alert('El valor del auto permanece igual con ese kilometraje');
				}else{
					var org_sug = parseInt(window.localStorage.getItem('precio_org_sug'));
					var org_dis = parseInt(window.localStorage.getItem('precio_org_dis'));
					var org_rev = parseInt(window.localStorage.getItem('precio_org_rev'));
					var nuevo_precio_sug  = parseInt(org_sug + (org_sug * factor));
					var nuevo_precio_dis = parseInt(org_dis  + (org_dis * factor ));
					var nuevo_precio_rev = parseInt(org_rev  + (org_rev * factor));
					$$('#prc_ch').text(nuevo_precio_sug+'.00');
					$$('#prc_dis').text(nuevo_precio_dis+'.00');
					$$('#prc_rev').text(nuevo_precio_rev+'.00');

				}	
			},
			error: function (xhr) {
				console.log(xhr);
			}
		});
	}
});

$$('.label-checkbox input[type="checkbox"]').on('change', function(){
	var precio_act = parseInt($$('#prc_ch').text());
	var precio_dis = parseInt($$('#prc_dis').text());
	var precio_rev = parseInt($$('#prc_rev').text());
	var val_chk = parseInt($$(this).val());
	if($$(this).prop( "checked" )){
		var nuevo_precio_sug  = precio_act + val_chk;
		var nuevo_precio_dis = precio_dis + val_chk;
		var nuevo_precio_rev = precio_rev + val_chk;
		$$('#prc_ch').text(nuevo_precio_sug+'.00');
		$$('#prc_dis').text(nuevo_precio_dis+'.00');
		$$('#prc_rev').text(nuevo_precio_rev+'.00');

	}else{
		if(precio_act != precio_org_sug){
			var nuevo_precio_sug = precio_act - val_chk;
			var nuevo_precio_dis = precio_dis - val_chk;
			var nuevo_precio_rev = precio_rev - val_chk;
			$$('#prc_ch').text(nuevo_precio_sug+'.00');
			$$('#prc_dis').text(nuevo_precio_dis+'.00');
			$$('#prc_rev').text(nuevo_precio_rev+'.00');
		}
		else{
			$$('#prc_ch').text(precio_org_sug+'.00');
			$$('#prc_sug').text(precio_org_dis+'.00');
			$$('#prc_rev').text(precio_org_rev+'.00');
		}
	}

})

  
});

$$(document).on('click', 'a[id^="marca"]', function (e){
	var idmarca = $$(this).data('idmarca');
	console.log(idmarca);
	$$('#loading').addClass('loading');
	$$.ajax({
		url: '/All Sites/autoinspira/app/api/api.php',
		data : {'marca' : idmarca},
			dataType: "JSON",
			success: function(data){ 
				//console.log(data);
				var modelos_precio = JSON.parse(data);
				contexto = {};
				contexto.respuesta = modelos_precio;
				mainView.router.load({
					url: 'autos_marca.html?opt=1',
						context: contexto
					});
				$$('#loading').removeClass('loading');	
			},
			error: function (xhr) {
				console.log(xhr);
			}
		});
	myApp.alert('vamos a buscar los autos de la marca seleccionada', 'AUTOINSPIRA');
});       

})(Framework7, Dom7, Template7, autoapi);