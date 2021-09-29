<?php

class UserListClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function userList($type){

            $type = $this->fm->validator($type);
            $type= mysqli_real_escape_string($this->db->link,$type);
    
            if ($type=='Student') {
                $query = "SELECT * FROM tbl_student";
            } elseif ($type=='Teacher') {
                $query = "SELECT * FROM tbl_teacher";
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

		public function pendingUserList($type){

            $type = $this->fm->validator($type);
            $type= mysqli_real_escape_string($this->db->link,$type);
    
            if ($type=='Student') {
                $query = "SELECT * FROM tbl_student WHERE status=0";
            } elseif ($type=='Teacher') {
                $query = "SELECT * FROM tbl_teacher WHERE status=0";
            }
    
            $result = $this->db->select($query);
            
            if ($result) {
                return $result;
            }else{
                return false;
            }
        }

        public function userStatusUpdate($id,$action,$type){

            $id = $this->fm->validator($id);
            $id= mysqli_real_escape_string($this->db->link,$id);

            $action = $this->fm->validator($action);
            $action= mysqli_real_escape_string($this->db->link,$action);

            $type = $this->fm->validator($type);
            $type= mysqli_real_escape_string($this->db->link,$type);

            if ($type=='Student') {
                
                if ($action=='active') {
                    $query = "UPDATE tbl_student SET status =1 WHERE id='$id'";
                } elseif ($action=='block') {
                    $query = "UPDATE tbl_student SET status =0 WHERE id='$id'";
                }

            } elseif ($type=='Teacher') {
                if ($action=='active') {
                    $query = "UPDATE tbl_teacher SET status =1 WHERE id='$id'";
                } elseif ($action=='block') {
                    $query = "UPDATE tbl_teacher SET status =0 WHERE id='$id'";
                }
            }


            $result = $this->db->update($query);
            
            if ($result!=false) {
                if ($type=='Student') {
                    echo "<script>window.location.href = 'studentlist.php';</script>";
                } elseif ($type=='Teacher') {
                    echo "<script>window.location.href = 'teacherlist.php';</script>";
                }
            }else{
                $showError = "<span style='color:red;text-align: center;display: block;'>Some Error Occured!</span>";
                return $showError;
            }


            
        }
    }
?>