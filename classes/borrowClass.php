<?php

class BorrowClass{

    private $db;
    private $fm;
    
    function __construct()
    {
        # connecting db and formats with a constructor
        $this->db = new Database();
        $this->fm = new Format();
    }
	
	public function borrowBook($bookId,$userId,$bookName,$type){

        $bookId = $this->fm->validator($bookId);
		echo $bookId= mysqli_real_escape_string($this->db->link,$bookId);

        $userId = $this->fm->validator($userId);
		echo $userId= mysqli_real_escape_string($this->db->link,$userId);

        $bookName = $this->fm->validator($bookName);
		echo $bookName= mysqli_real_escape_string($this->db->link,$bookName);

        $date = date("Y/m/d");

        $query = "SELECT * FROM tbl_borrow WHERE bookId='$bookId' AND userId='$userId' AND status=0";
        $check = $this->db->select($query);

        if ($check && $check!=null) {
            return false;
        }else{
            $query = "INSERT INTO tbl_borrow(bookId,userId,userType,bookName,borrowDate,forDays,status) VALUES('$bookId','$userId','$type','$bookName','$date',0,0)";

            $result = $this->db->insert($query);
            if ($result && $result != false) {
                return true;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Request Failed!!</span>";

                return $fieldError;

            }
        }

        
    }


    public function borrowedRequest()
    {
        $query = "SELECT * FROM tbl_borrow WHERE forDays=0 AND status=0";
        $result = $this->db->select($query);

        if (!$result) {
            return 0;
        } else {
            $c = mysqli_num_rows($result);
            return $c;
        }
        

    }

    public function borrowedRequestAccepted()
    {
        $query = "SELECT * FROM tbl_borrow WHERE forDays>0 AND status=1";
        $result = $this->db->select($query);

        if (!$result) {
            return 0;
        } else {
            $c = mysqli_num_rows($result);
            return $c;
        }
        

    }

    public function returnRequest()
    {
        $query = "SELECT * FROM tbl_borrow WHERE forDays>0 AND status=2";
        $result = $this->db->select($query);

        if (!$result) {
            return 0;
        } else {
            $c = mysqli_num_rows($result);
            return $c;
        }
        

    }

    public function returnRequestAccepted()
    {
        $query = "SELECT * FROM tbl_borrow WHERE forDays>0 AND status=3";
        $result = $this->db->select($query);

        if (!$result) {
            return 0;
        } else {
            $c = mysqli_num_rows($result);
            return $c;
        }
        

    }


}
?>