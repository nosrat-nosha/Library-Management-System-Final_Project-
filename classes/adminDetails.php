<?php
	// just the basic includes to check for session  and db and some formating codes
	include "../lib/session.php";
	Session::checkSession();
	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
?>

<?php

class AdminLogin{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats with a constructor
			$this->db = new Database();
			$this->fm = new Format();
		}
	
	
	// the method will handle the login inputs filtration and the query insdide it will check for auth
	public function adminlogin($email,$pass){
		
		$email = $this->fm->validator($email);
		$pass = $this->fm->validator($pass);

		if ($email=='' && $pass=='') {

			$showError = "Fields can not be empty!";
			return $showError;
  
		}else if( $email!='' && $pass==''){

			$showError = "Password can not be empty!";
			return $showError;

		}else if($email=='' && $pass!=''){
			
			$showError = "Email can not be empty!";
			return $showError;
		}

		// $email= mysqli_real_escape_string($this->db->link,$email);

		// $pass= mysqli_real_escape_string($this->db->link,$pass);
		$pass = md5($pass);
		

		$query = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$pass'";

		$result = $this->db->select($query);

		if ($result!=false) {
				// getting values from db and if the result is not false set the sessions
			$value = $result->fetch_assoc();
			// redireting the Admin user to dashboard
			Session::set('Alogin',true);
			Session::set('Aemail',$value['email']);

			
			return "<script>window.location.href = 'dashboard.php';</script>";

		}
		else {

			$showError = "Username or password is wrong!";

			return $showError;
		}


	}


	public function adminRegister($fname,$lname,$email,$pass,$pin,$files){


		move_uploaded_file($files['proImage']['tmp_name'],'uploads/'.$files['proImage']['name']);

		$orgfiles = 'uploads/'.$files['proImage']['name'];

		$newimage = imagecreatefromjpeg($orgfiles);

		list($width,$height) = getimagesize($orgfiles);

		$newwidth = 100;
		$newheight = 100;

		$thumb = 'uploads/bla'.$files['proImage']['name'];

		$truecolor = imagecreatetruecolor($newwidth,$newheight);



		imagecopyresampled($truecolor,$newimage,0,0,0,0,$newwidth,$newheight,$width,$height);

		imagejpeg($truecolor,$thumb,100);
		unlink($orgfiles);
	}
}

?>