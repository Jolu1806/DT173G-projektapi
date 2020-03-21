<?php

class Work {
    //Database
    private $db;


    //Constructor
    function __construct(){
        //Connect
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0){
            die("Fel vid anslutning: " . $this->db->connect_error);
        }

    }

    //Read/show/view work
   function viewWork(){
        $sql = "SELECT * FROM work ORDER BY created DESC";

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    function viewWorkId($id){
        $sql = "SELECT * FROM work where id = $id";

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    //Create work
    function createWork($dates, $company, $title){
        $sql = "INSERT INTO work (dates, company, title)
        VALUES('$dates', '$company', '$title')";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;
    }



    //Update work
    function updateWork($id, $date, $company, $title){
        $sql = "UPDATE work SET dates = '$date', company = '$company',
        title = '$title'
        WHERE ID = $id";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;

    }


    //Delete work

    function deleteWork($id){
        $sql = "DELETE FROM work WHERE id = $id";
        return $this->db->query($sql);


    }


}
