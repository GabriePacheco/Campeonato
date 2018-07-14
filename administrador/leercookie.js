function leerCookie( nombre_cookie )
{
	// Obtener un array con el nombre y valor de una cookie guardados como cadena, en cada posición:
	var aCookies = document.cookie.split(";");

	// Variables auxiliares:
	var contador;
	var posicionSignoIgual;
	var nombreCookie;
	var valorCookie;

	for( contador=0; contador < aCookies.length; contador++ )
	{
		// Obtenemos la posición en la que está el signo igual
		// No lo ponemos fuera del bucle porque los nombres puede que no tengan la misma longitud
		posicionSignoIgual = aCookies[contador].indexOf("=");

		// Obtenemos el nombre de la Cookie, eliminando espacios
		nombreCookie = aCookies[contador].substring( 0, posicionSignoIgual ).replace(" ", "");

		if( nombreCookie == nombre_cookie )
		{
			// Añadimos 1 'posicionSignoIgual' porque con substring() las posiciones de la cadena comienzan desde cero:
			valorCookie = aCookies[contador].substring( posicionSignoIgual + 1 );
		}

	}

	return valorCookie;
}

// --------------------
