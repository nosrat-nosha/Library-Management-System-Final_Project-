<?php

class LogoClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertLogoIntoDB($post,$files){
			
			$company = $this->fm->validator($post['company']);
			$company= mysqli_real_escape_string($this->db->link,$company);
			
			$altText = $this->fm->validator($post['altText']);
			$altText= mysqli_real_escape_string($this->db->link,$altText);



			$uploadDirectory = "../uploads/";
            $errors = []; // Store all foreseen and unforseen errors here
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
            $fileName = $files['logoImage']['name'];
            $fileSize = $files['logoImage']['size'];
            $fileTmpName = $files['logoImage']['tmp_name'];
            $fileType = $files['logoImage']['type'];
            $uploadPath = $uploadDirectory . rand(0,990).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

			if (empty($altText)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {
                    return "This file size or extension is not allowed.";
                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                    
                    $query = "INSERT INTO tbl_logo(company,image,altTag) VALUES('$company','$uploadPath','$altText')";
                    $result = $this->db->insert($query);
                    if ($result && $didUpload && $result != false) {
                        $successNote = "<span style='color:green'>Logo inserted successfully </span>";

						return $successNote;
					}
					else{

						$fieldError = "<span style='color:red'>Logo couldn't be inserted!!</span>";

						return $fieldError;

					}
                }

			}
		}

		public function getLogo(){
			$query = "SELECT * FROM tbl_logo ORDER BY logoId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}

		public function deleteDataFromDB($id){
			$id = $this->fm->validator($id);
	        $id = mysqli_real_escape_string($this->db->link, $id);

	        $query = "SELECT * FROM tbl_logo WHERE logoId='$id'";
	        $result = $this->db->select($query);

		    if (isset($result) && $result!=false) {

		    	$imgs = mysqli_fetch_assoc($result);
		        	
	        	$img = $imgs['image'];
                $imgName = chop($img, '../uploads/');
                $unLink = unlink($imgName);
                $query1 = "DELETE FROM tbl_logo WHERE logoId='$id'";
                $res = $this->db->delete($query1);

                if ($res && $res != false) {

					 return "<script>window.location.href = 'logoOption.php';</script>";

				}else{

					$fieldError = "<span style='color:red'>Logo couldn't be Deleted!!</span>";

					return $fieldError;
				}
	        }else{

				$fieldError = "<span style='color:red'>Logo couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}


	}
?>