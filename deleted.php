<?php 
     
     if( isset($_GET["id"]) ){
        $id = $_GET["id"];


                              $servername ="localhost";
                                $username = "root";
                                $password = "";
                                $database = "student_info";

                                //mao ni pag connection sa database
                                $connection = new mysqli($servername, $username, $password, $database);


        $sql = "DELETE FROM students WHERE id =$id";
        $connection->query($sql);
     }

     header("location: /sims/index.php");
     exit;

?>