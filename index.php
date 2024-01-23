<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sims </title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container my-5">
        <h2>list of student enroll</h2>
        <a class="btn btn-primary" href="/sims/create.php" role="button">new student</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>    
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername ="localhost";
                $username = "root";
                $password = "";
                $database = "student_info";

                //mao ni pag connection sa database
                $connection = new mysqli($servername, $username, $password, $database);

                //mo check sa connection sa database if okay nabah?
                if ($connection->connect_error){    
                    die("Connection failed: ". $connection->connect_error);
                }
                //mo
                $sql = "SELECT * FROM students";
                $result = $connection->query($sql);
                
                //dapat naa ni "!"kay para ma display ang data gikan sa database na table
                if(!$result){
                    die("Invalid query:" .$connection->error);

                }
                    //mo read sa row sa table from table database, nya kanang naa $row kay variable na sa table from db base
                while($row = $result->fetch_assoc()){
                    echo"

                    <tr>
                        <td>$row[id]</td>
                        <td>$row[s_name]</td>
                        <td>$row[s_email]</td>
                        <td>$row[s_age]</td>
                        <td>$row[s_phone]</td>
                        <td>$row[s_address]</td>
                        <td>$row[s_created_at]</td>
                        <td>$row[s_status]</td>
                        <td>
                       <a class='btn btn-primary btn-sm' href='/sims/edited.php?id=$row[id]'>EDIT</a>
                        <a class='btn btn-danger btn-sm' href='/sims/deleted.php?id=$row[id]'>delete</a>
                        </td> 
                   </tr>                                 
                    ";
                }
                ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>