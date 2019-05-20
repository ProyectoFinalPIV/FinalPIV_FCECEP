function validarGen(){  //Tutorial: https://youtu.be/uUJr5Itz8kY
	var gene_nomb, expresion;
	gene_nomb = document.getElementById('gene_nomb').value;

	if (gene_nomb === "") {

		alert("Este campo se debe diligenciar ");
		return false;
	}
	/*else if (otraVariable === "") {
		alert("Este campo se debe diligenciar ");
		return false;
	}*/
	else if (gene_nomb.length>20) {
		alert("Nombre debe ser menor a 20 carcateres");
		return false;
	}
}


 function validarLogin(){
 	var perso_nomb, perso_apel, perso_apel_2, esta_civi_codi, docu_codi, mun_codi_expe, barr_codi, perso_dire, perso_tele_codi, perso_tele_ofic, perso_celu, perso_mail, ocup_codi, gene_codi, sang_codi, expresion;
 	perso_nomb = document.getElementById('perso_nomb').value;
 	perso_apel = document.getElementById('perso_apel').value;
 	perso_apel_2 = document.getElementById('perso_apel_2').value;
 	docu_codi = document.getElementById('docu_codi').value;
 	mun_codi_expe = document.getElementById('mun_codi_expe').value;
 	barr_codi = document.getElementById('barr_codi').value;
 	perso_dire = document.getElementById('perso_dire').value;
 	perso_tele_codi = document.getElementById('perso_tele_codi').value;
 	perso_mail = document.getElementById('perso_mail').value;
 	sang_codi = document.getElementById('sang_codi').value;
    //Evaluar expresiones regulares
 	expresion = /\w+@\w+\.+[a-z]/;
 	// la \w es texto

 	if (perso_nomb === "" || perso_apel === "" || perso_apel_2 === "" || docu_codi === "" || mun_codi_expe === "" || barr_codi === "" || perso_dire === "" || perso_tele_codi === "" || perso_mail === "" || sang_codi === "") {
 		alert("Los campos deben diligenciarse");
		return false;
 	}

 	else if (perso_nomb.length>20) {
 		perso_nomb.focus(); //https://bit.ly/2WS0KcL
 		alert("Nombre debe ser menor a 20 carcateres"+ perso_nomb);
		return false;
 	}
 	else if (perso_mail.length>100) {
 		alert("Correo es muy largo");
		return false;
 	}
 	else if (!expresion.test(perso_mail)) {
 		alert("Correo no valido");
		return false;
 	}
 	else if (login_nick.length>20 || login_pass.length>20) {
 		alert("El Usuario y/o clave deben tener Max 20 caracteres.");
		return false;
 	}
 	//validar formato correo

 }