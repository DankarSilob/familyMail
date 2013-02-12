<?php
require("../configuracion/connectionSettings.php");
class mysql {
    
    var $server = DB_HOST;
    var $user = DB_USER;
    var $pass = DB_PASS;
    var $data_base = DB_DATABASE;
    var $conexion;
    var $flag = false;
    var $error_conexion = "Error en la conexion a MYSQL";
    


    function connect(){
            $this->conexion = @mysql_connect('50.116.84.66',"labnet_db","LABNET1") or die(mysql_error());
            $this->flag = true;
            @mysql_query("SET NAMES utf8");
            return $this->conexion;
    }
    
    function close(){
        if($this->flag == true){
            @mysql_close($this->conexion);
        }
    }
    
    function query($query){
        return @mysql_query($query) or die(mysql_error());
    }
    
	function f_arr($query){
        return @mysql_fetch_array($query);
    }
	
    function f_obj($query){
        return @mysql_fetch_object($query);
    }

    function f_array($query){
        return @mysql_fetch_assoc($query);
    }

    function f_num($query){
        return @mysql_num_rows($query);
    }
    
    function select(){
        $result = @mysql_select_db('labnet_familyMail',$this->conexion);
        if($result){
            $this->data_base = DB_DATABASE; 
            return true;
        }else{
            return false;
        }
    }
    
    function free_sql($query){
        mysql_free_result($query);
    }
}
?>