function available(){
	//note: change join('') to join('_')
	var dominio = document.forms["form"]["ap_paterno"].value.split(' ').join('') + document.forms["form"]["ap_materno"].value.split(' ').join('');
	document.getElementById("disponib").innerHTML=dominio;
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