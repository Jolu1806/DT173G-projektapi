<?php
class Project {
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

    //Read/show/view project
   function viewProjects(){
        $sql = "SELECT * FROM projects ORDER BY created DESC";

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    function viewProjectId($id){
        $sql = "SELECT * FROM projects where id = $id";

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    //Create project
    function createProject($image, $title, $description, $url){
        $sql = "INSERT INTO projects (image, title, description, url)
        VALUES('$image', '$title', '$description', '$url')";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;
    }



    //Update project
    function updateProject($id, $image, $title, $description, $url){
        $sql = "UPDATE projects SET image = '$image', title = '$title',
        description = '$description', url = '$url'
        WHERE ID = $id";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;

    }


    //Delete project

    function deleteProject($id){
        $sql = "DELETE FROM projects WHERE id = $id";
        return $this->db->query($sql);


    }


}
