/*global Framework7, Dom7 */
(function (Framework7, $$) {
	'use strict';
	var urls = [
		'/All Sites/autoinspira/app/json/'
	], req, autoapi;

	req = function (path, success, error, retry) {
		retry = retry || 0;
		return $$.ajax({
			url: urls[retry % urls.length] + path,
			success: success,
			error: function (xhr) {
				if (retry < urls.length - 1) {
					req(path, success, error, retry += 1);
				} else {
					//error(xhr);
				}
			}
		});
	};

	autoapi = {

		urls: urls,


		marcas: function (success, error) {
			return req('marcas.json', success, error);
		},

		precios: function(success, error){
			return req('precios.json', success, error);
		},
		modelos: function(success, error){
			return req('modelos.json', success, error);
		}


		

	};



	window.autoapi = autoapi;

}(Framework7, Dom7));