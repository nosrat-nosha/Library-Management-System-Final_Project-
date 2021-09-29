<?php

class UserProfile{

    private $db;
    private $fm;
    
    function __construct()
    {
        # connecting db and formats with a constructor
        $this->db = new Database();
        $this->fm = new Format();
    }
	
	public function userProfile($id,$type){

		$id = $this->fm->validator($id);
		$id= mysqli_real_escape_string($this->db->link,$id);

		$type = $this->fm->validator($type);
		$type= mysqli_real_escape_string($this->db->link,$type);

        if ($type=='Student') {
            $query = "SELECT * FROM tbl_student WHERE id='$id'";
        } elseif ($type=='Teacher') {
            $query = "SELECT * FROM tbl_teacher WHERE id='$id'";
        }

        $result = $this->db->select($query);

		if ($result!=false) {
				
            return $result;

        }
        else {

            $showError = "Username or password is wrong!";

            return $showError;
        }
	}
}

?>