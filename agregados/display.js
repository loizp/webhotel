function completar_reserva(){
	document.getElementById("pressreserv").style.display="none";
	document.getElementById("formcliente").style.display="";
}
function mostrarttcliente(obj){
	if(obj.tipocliente.value=="Independiente"){
		document.getElementById("cliente2").style.display="none";
		document.getElementById("cliente1").style.display="";
	} else {
		document.getElementById("cliente1").style.display="none";
		document.getElementById("cliente2").style.display="";
	}
}
function mostrarttdpto(obj){
	if(obj.selpais.value=="Peru"){
		document.getElementById("selectdpto").style.display="";
	} else {
		document.getElementById("selectdpto").style.display="none";
	}
}