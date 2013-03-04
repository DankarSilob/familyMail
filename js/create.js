function available(){
	//note: change join('') to join('_')
	if(document.forms["signup"]["ap_paterno"].value != "Apellido Paterno" && document.forms["signup"]["ap_materno"].value != "Apellido Materno")
	var dominio = document.forms["signup"]["ap_paterno"].value.split(' ').join('') + document.forms["signup"]["ap_materno"].value.split(' ').join('');
	//document.getElementById("disponib").innerHTML=dominio;
	document.forms["signup"]["dominio"].value=dominio;
	
}

function generar(){
	var a = Math.ceil(Math.random() * 9)+ '';
	var b = Math.ceil(Math.random() * 9)+ '';       
	var c = Math.ceil(Math.random() * 9)+ '';  
	var d = Math.ceil(Math.random() * 9)+ '';  
	var code = a + b + c + d;
	document.getElementById("txtCaptcha").value = code;
	document.getElementById("txtCaptchaDiv").innerHTML = code;
}