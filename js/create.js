function addCombo(x) {
	//var textb = document.getElementById("txtCombo");
	
	var estado00 = [""];
	var estado02 = ["Ensenada", "Mexicali", "Rosarito", "Tecate", "Tijuana"];
	var estado03 = ["Comondú", "Mulegé", "La Paz", "Los Cabos", "Loreto"];
	var estado;
	switch(x){
	case 'Baja California': estado = estado02; break;
	case 'Baja California Sur': estado = estado03; break;
	default: estado = estado00;
	}
	for (var y=0; y<estado.length; y++){
	var combo = document.getElementById("municipio");
	var option = document.createElement("option");
	
	
		option.text = estado[y];
		option.value = estado[y];
		try {
			combo.add(option, null); //Standard 
		}catch(error) {
			combo.add(option); // IE only
		}
	}
	//
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