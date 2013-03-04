<?php
require("mysql.php");
class users
{
	protected $email;
	protected $password;
	protected $firstname;
	protected $lastName;
	protected $idUser;
	var $userRow;
	public function login_user($email , $password)
	{
		$db = new mysql();
		$db->connect();
		$db->select();
		$sql = "SELECT id_user FROM Users WHERE alt_email='$email' AND password='$password' LIMIT 0,1";
		$consulta = $db->execute($sql);
		$numRows = $db->numOfRows($consulta);
		$id = $db->getRow($consulta);
		if($numRows>0){  
			$acceso=$id['id_user'];
		}
	 	else{
	 		$acceso=0;
		}
		if(isset($db))$db->close();
		return $acceso;		
	}
	public function update_user($new_first_name, $new_last_name_p, $new_last_name_m, $new_address, $new_phone, $id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$db->execute("UPDATE Users SET first_name='$new_first_name', last_name_p='$new_last_name_p', last_name_m='$new_last_name_m', address='$new_address', phone='$new_phone' WHERE id_user='$id_user';");
		if(isset($db))$db->close();
		}
	public function update_password($new_pwd, $id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$db->execute("UPDATE Users SET password='$new_pwd' WHERE id_user='$id_user';");
		if(isset($db))$db->close();
		}
	public function update_email($new_alt_email, $id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$db->execute("UPDATE Users SET alt_email='$new_alt_email' WHERE id_user='$id_user';");
		if(isset($db))$db->close();
		}
	public function getAccountsInfo($id_user){
		$cuentas.="";
		$db = new mysql();
		$db->connect();
		$db->select();
		$result = $db->execute("SELECT (SELECT email_name FROM Emails WHERE id_email=User_emails.id_email) as mailname, active FROM User_emails WHERE id_user='$id_user'");
		while($row = mysql_fetch_assoc($result))
		{
			$activo = ($row['active'] == 1) ? "Activa":"Inactiva";
			$cuentas.= $row['mailname']." - ".$activo."<br />";
		}
		if(isset($db))$db->close();	
		return $cuentas;
	}	
		
	public function getStatus($id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$result = $db->execute("SELECT (SELECT status_type_name FROM Status_types WHERE id_status_type=Users.status) as status FROM Users WHERE id_user = '$id_user' LIMIT 0,1");
		$info = $db->getRow($result);
		if(isset($db))$db->close();	
		return $info['status'];
		}
	public function getMail($id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$result = $db->execute("SELECT alt_email FROM Users WHERE id_user = '$id_user' LIMIT 0,1");
		$info = $db->getRow($result);
		if(isset($db))$db->close();	
		return $info['alt_email'];
		}	
	public function getPwdUser($id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$result = $db->execute("SELECT password FROM Users WHERE id_user = '$id_user' LIMIT 0,1");
		$info = $db->getRow($result);
		if(isset($db))$db->close();	
		return $info['password'];
		}
		
	public function getInfoUser($id_user){
		$db = new mysql();
		$db->connect();
		$db->select();
		$result = $db->execute("SELECT id_user, first_name, last_name_p, last_name_m, address, phone, alt_email, password from Users where id_user=$id_user");
		$info = $db->getRow($result);
		//a este array hay que meterle toda la informacion que ocuapermos del usuario no la regresara en el array usuarioRow
		$userRow =  array(
			"id"=>$info['id_user'], "first_name"=>$info['first_name'], "last_name_p"=>$info['last_name_p'], "last_name_m"=>$info['last_name_m'], "address"=>$info['address'], "phone"=>$info['phone'], "alt_email"=>$info['alt_email'], "password"=>$info['password']) ;
		if(isset($db))$db->close();
		return $userRow;
	}
}
?>