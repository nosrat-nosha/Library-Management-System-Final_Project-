<?php
	// just the basic includes to check for session  and db and some formating codes
	include "./lib/session.php";
	Session::init();
	include './config/config.php';
	include "./lib/database.php";
	include "./helpers/formats.php";
?>

<?php

class UserLogin{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats with a constructor
			$this->db = new Database();
			$this->fm = new Format();
		}
	
	
	// the method will handle the login inputs filtration and the query insdide it will check for auth
	public function userlogin($email,$pass,$type){
		
		$email = $this->fm->validator($email);
		$pass = $this->fm->validator($pass);
		$type = $this->fm->validator($type);

		if ($email=='' && $pass=='') {

			$showError = "<span style='color:red;text-align: center;display: block;'>Fields can not be empty!</span>";
			return $showError;
  
		}else if( $email!='' && $pass==''){

			$showError = "<span style='color:red;text-align: center;display: block;'>Password can not be empty!</span>";
			return $showError;

		}else if($email=='' && $pass!=''){
			
			$showError = "<span style='color:red;text-align: center;display: block;'>Email can not be empty!</span>";
			return $showError;
		}

		// $email= mysqli_real_escape_string($this->db->link,$email);

		// $pass= mysqli_real_escape_string($this->db->link,$pass);
		// $pass = md5($pass);

		if ($type=='Student') {
			$query = "SELECT * FROM tbl_student WHERE email='$email' AND password='$pass' AND status=1";
		} elseif ($type=='Teacher') {
			$query = "SELECT * FROM tbl_teacher WHERE email='$email' AND password='$pass' AND status=1";
		}
		else {
			$showError = "<span style='color:red;text-align: center;display: block;'>Some Error Occured!</span>";
			return $showError;
		}
		

		$result = $this->db->select($query);

		if ($result!=false) {
				// getting values from db and if the result is not false set the sessions
			$value = $result->fetch_assoc();
			// redireting the Admin user to dashboard
			Session::set('Ulogin','true');
			Session::set('Uemail',$value['email']);
			Session::set('Uuser',$value['name']);
			Session::set('Uimage',$value['image']);
			Session::set('Uname',$value['username']);
			Session::set('Utype',$type);
			Session::set('Uid',$value['id']);

			// if (!empty($remember) && !isset($_COOKIE["email"])) {
			// 	setcookie("email", $value['adminEmail'], time()+600);
			// }

			if ($type=='Student') {
				return "<script>window.location.href = 'profile.php';</script>";
			} elseif ($type=='Teacher') {
				return "<script>window.location.href = 'profile.php';</script>";
			}
			

		}
		else {

			$showError = "<span style='color:red;text-align: center;display: block;'>User Permission Denied!</span>";

			return $showError;
		}


	}


	public function insertDataIntoDB($post,$files,$type){


		$name = $this->fm->validator($post['name']);
		$name= mysqli_real_escape_string($this->db->link,$name);

		$username = $this->fm->validator($post['username']);
		$username= mysqli_real_escape_string($this->db->link,$username);

		$department = $this->fm->validator($post['department']);
		$department= mysqli_real_escape_string($this->db->link,$department);

		$validationdate = $this->fm->validator($post['validationdate']);
		$validationdate= mysqli_real_escape_string($this->db->link,$validationdate);

		$address = $this->fm->validator($post['address']);
		$address= mysqli_real_escape_string($this->db->link,$address);

		$phone = $this->fm->validator($post['phone']);
		$phone= mysqli_real_escape_string($this->db->link,$phone);

		$email = $this->fm->validator($post['email']);
		$email= mysqli_real_escape_string($this->db->link,$email);

		$password = $this->fm->validator($post['password']);
		$password= mysqli_real_escape_string($this->db->link,$password);
		// $password = md5($password);

		if (empty($name) || empty($username) || empty($department) || empty($validationdate) || empty($address) || empty($phone) || empty($email) || empty($password)) {

			$fieldError = "<span style='color:red;text-align: center;display: block;'>Fields Must Not Be Empty!!</span>";

			return $fieldError;
		}


		//handeling the attached file with randomly added number to rename the file and moving it to a directory
		$uploadDirectory = "./uploads/";
		$fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
		$fileName = $files['idcard']['name'];
		$fileSize = $files['idcard']['size'];
		$fileTmpName = $files['idcard']['tmp_name'];
		$uploadPath = $uploadDirectory . rand(0,990).basename($fileName);
		$fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

		//handeling the attached pdf file with randomly added number to rename the file and moving it to a directory
		
		$Fextentions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
		$Fname = $files['image']['name'];
		$Fsize = $files['image']['size'];
		$FtempName = $files['image']['tmp_name'];
		$uploadPath2 = $uploadDirectory.rand(0,990).basename($Fname);
		$FfileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

		if ($fileName =='' || $Fname=='') {
			$fieldError = "<span style='color:red;text-align: center;display: block;'>Files Must be added!!</span>";

			return $fieldError;
		}

		if (!in_array($FfileType, $Fextentions) && $Fsize > 200000) {

			$fieldError = "<span style='color:red;text-align: center;display: block;'>This file size or type is not allowed!!</span>";
			return $fieldError;

		} else {
			if ($type=='Teacher') {
				
				$designation = $this->fm->validator($post['designation']);
				$designation= mysqli_real_escape_string($this->db->link,$designation);

				$query = "INSERT INTO tbl_teacher(name, username, department, designation, cardImage, validDate, address, phone, email, image, password, status) VALUES ('$name', '$username', '$department', '$designation', '$uploadPath', '$validationdate', '$address', '$phone', '$email', '$uploadPath2', '$password', 0)";

			} elseif ($type=='Student') {
				
				$batchno = $this->fm->validator($post['batchno']);
				$batchno= mysqli_real_escape_string($this->db->link,$batchno);

				$semester = $this->fm->validator($post['semester']);
				$semester= mysqli_real_escape_string($this->db->link,$semester);

				$examno = $this->fm->validator($post['examno']);
				$examno= mysqli_real_escape_string($this->db->link,$examno);

				$registrationid = $this->fm->validator($post['registrationid']);
				$registrationid= mysqli_real_escape_string($this->db->link,$registrationid);

				if (empty($batchno) || empty($semester) || empty($examno) || empty($registrationid)) {

					$fieldError = "<span style='color:red;text-align: center;display: block;'>Fields Must Not Be Empty!!</span>";
		
					return $fieldError;
				}

				$query = "INSERT INTO tbl_student(name, username, department, batch, semester, roll, registerNo, cardImage, validDate, address, phone, email, image, password, status) VALUES ('$name', '$username', '$department', '$batchno', '$semester', '$examno', '$registrationid', '$uploadPath', '$validationdate', '$address', '$phone', '$email', '$uploadPath2', '$password', 0);";
			}else {
				
				$fieldError = "<span style='color:red;text-align: center;display: block;'>Something Went Wrong!!</span>";
		
				return $fieldError;
			}
			
			$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
			$didUpload2 = move_uploaded_file($FtempName, $uploadPath2);			

			$result = $this->db->insert($query);
			if ($result && $didUpload && $result != false) {
				$successNote = "<span style='color:green;text-align: center;display: block;'>User inserted successfully. Now <a href='login.php?type=".$type."'>Login</a> </span>";

				return $successNote;
			}
			else{

				$fieldError = "<span style='color:red;text-align: center;display: block;'>User couldn't be inserted!!</span>";

				return $fieldError;

			}
		}
	}

	public function userProfile($id,$type){

		$id = $this->fm->validator($id);
		$id= mysqli_real_escape_string($this->db->link,$id);

		$type = $this->fm->validator($type);
		$type= mysqli_real_escape_string($this->db->link,$type);

		if ($type=='Student') {
			$query = "SELECT * FROM tbl_student WHERE email='$email' AND password='$pass' AND status=1";
		} elseif ($type=='Teacher') {
			$query = "SELECT * FROM tbl_teacher WHERE email='$email' AND password='$pass' AND status=1";
		}
		else {
			$showError = "<span style='color:red;text-align: center;display: block;'>Some Error Occured!</span>";
			return $showError;
		}

		$result = $this->db->select($query);
		
		if ($result!=false) {
			return $result;
		}else{
			$showError = "<span style='color:red;text-align: center;display: block;'>Some Error Occured!</span>";
			return $showError;
		}
	}

}

?>