<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<style>
#menu {
	width: 200px;
	border-style: solid solid none solid;
	border-color: #94AA74;
	border-size: 1px;
	border-width: 1px;
	margin: 10px;
}
	
#menu li a {
	height: 32px;
  	voice-family: "\"}\""; 
  	voice-family: inherit;
  	height: 24px;
	text-decoration: none;
}	
	
#menu li a:link, #menu li a:visited {
	color: #5E7830;
	display: block;
	background: url(images/menu1.gif);
	padding: 8px 0 0 10px;
}
	
#menu li a:hover {
	color: #26370A;
	background: url(images/menu1.gif) 0 -32px;
	padding: 8px 0 0 10px;
}
	
#menu li a:active {
	color: #26370A;
	background: url(images/menu1.gif) 0 -64px;
	padding: 8px 0 0 10px;
}
#menu ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
</style>
</head>

<body>
<div id="header">
	Panel de Administracion
</div>
<div id="menu">
  <ul>
    <li><a href="#1" title="Home">Usuarios</a></li>
    <li><a href="#2" title="About">Pagos</a></li>
    <li><a href="#3" title="Services">Administradores</a></li>
  </ul>
</div>
<div id="content">
</div>
</body>

</html>