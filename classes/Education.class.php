
<?php
class Education {
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

    //Read/show/view education
   function viewEducation(){
        $sql = "SELECT * FROM education ORDER BY created DESC";

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    function viewEducationId($id){
        $sql = "SELECT * FROM education where id = $id";

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    //Create education
    function createEducation($dates, $school, $program){
        $sql = "INSERT INTO education (dates, school, program)
        VALUES('$dates', '$school', '$program')";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;
    }



    //Update education
    function updateEducation($id, $dates, $school, $program){
        $sql = "UPDATE education SET dates = '$dates', school = '$school',
        program = '$program'
        WHERE ID = $id";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;

    }


    //Delete education

    function deleteEducation($id){
        $sql = "DELETE FROM education WHERE id = $id";
        return $this->db->query($sql);


    }


}
