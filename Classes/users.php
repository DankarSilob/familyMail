include_once mysql.php
class users
{
	protected $email;
	protected  $password;
	protected $firstname;
	protected $lastName;

	public function login_user($email , $password)
	{
		$dn = new mysql();
		$db->connect(); //CONECTAMOS A LA BASE DE DATOS
		$db->select(); // eleccionamos base de datos default
		if( $db->f_num("SELECT * from Users where first_name = '$email' an password = '$password' ") > 0)
		{
			return true;

		}
		else
			return false
	}
}
