$(document).ready( function (){


	
});

	// Accion al crear nuevo cartón 
	$("#n_carton").submit(function (){
		if ($('#user_id').val() != "" ){ //verificando si el usuario está  loguead 
			if ($("#pago").vale !=1){
				var data = $("#n_carton").serialize();
				$.ajax({//enviamos a crear  un cartón 
					type: 'POST',
					url: 'crearCarton.php', 
					data : data,
					dataType: "json",
				})
				.done (function (res){
					if (res.estado === true ){
						window.location.href = "index.php?navegador=/cartones&carton="+res.carton;
					}else{
						alert ("Hubo un error : " + res.mensaje);
					}					
				});
			}else{
				console.log("Ir a pasarela de pago ");
			}	

		} else { // Sí el usuario no esta logueado 
			alert ("Debes iniciar secion registrar tu marcador! ");
		}

		return false;

	});



	//*********Actuakizar secion 
	function atualizarSecion (r) {
		$.get("secion.php")
		.done(function (res12){
			$("#secion").html(res12);
			$("#user_id").val(r);
		});
	}

	//iniciar secion con formulario
	$("#login").submit(function (){
	data = $("#login").serialize();
		$.ajax({
			type: 'POST',
			url: 'login.php',
			data: data, 
			dataType: 'json'
		})
		.done( function (res){
			
			if (res.estado == false){
				alert (res.mensaje);
			}

			if (res.estado == true ){
				atualizarSecion (res.user_id);			
			}
		});
		return false;
	});


/** BOTON INICIO SECION CON FACEBOOK */
	$("#botonLoginFacebook").click(function (){
		console.log ("i am here ");
		FB.login(function(response){
			console.log ("waiting for you ");
			if (response.authResponse) {    	
		       FB.api('/me',  {fields: 'first_name, last_name, email, birthday'},function(userFacebook) {
		   
		       	$.ajax({
		       		type: "POST", 
		       		url: "registrarFacebook.php", 
		       		data: userFacebook,
		       		dataType: 'json'
		       	})
		       	.done (function (registroFacebook){
		       		console.log (registroFacebook);
		       		if (registroFacebook.estado == true){
		       			atualizarSecion(registroFacebook.user_id);
		       		}
		       	});

		       });
		    }   
		}, {scope: 'email, user_likes, user_birthday '});
	});


	//*** Logout 

	$("#logout").click(function(){
		console.log ("cerrar");
		$.ajax({
			type: 'GET', 
			url: 'cerrar.php',
			datType: 'json'

		})
		.done(function (cerrar){
			if (cerrar.estado == true ){
				console.log(cerrar.mensaje);
				atualizarSecion();

				
			}
		});

	});
//*** FOCEBOOK SDK ****/
window.fbAsyncInit = function() {
    FB.init({
      appId            : '2073114349596420',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
