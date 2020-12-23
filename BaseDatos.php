<?php 

	function conectar(){


		$user =  "tutori12_Danilo";

		$password = "tutorias";

		$host = "localhost";

		$db = "tutori12_Tutorias";

		$con = mysqli_connect($host,$user,$password,$db) or die("Error al conectar con la base de datos");

		return $con;



	}





 ?>