

<?php
                                $servername ="localhost";
                                $username = "root";
                                $password = "";
                                $database = "student_info";

                                //mao ni pag connection sa database
                                $connection = new mysqli($servername, $username, $password, $database);

                                $id ="";
                                $name ="";
                                $email ="";
                                $age ="";
                                $phone ="";
                                $address= "";
                                $created_at ="";
                                $status = "";   

                                $errorMessage = "";
                                $successMessage ="";

                                if($_SERVER ['REQUEST_METHOD'] == 'GET'){

                                    if( !isset($_GET["id"])){
                                        header("location: /sims/index.php");
                                        exit;


                                    }
                                    $id = $_GET["id"];


                                    $sql = "SELECT * FROM students WHERE id=$id";
                                    $result = $connection->query($sql);
                                    $row = $result->fetch_assoc();

                                    if(!$row){
                                        header("location: /sims/index.php");
                                        exit;

                                    }
                                    $id = $row["id"];
                                    $name = $row["s_name"];
                                $email = $row["s_email"];
                                $age = $row["s_age"];
                                $phone =$row["s_phone"];
                                $address= $row["s_address"];
                                $created_at = $row["s_created_at"];
                                $status = $row["s_status"];

                                  
                                    /* $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $address = $_POST['address']; */

                                     
                                 

                                 } else{  
                                    
                                    $id = $_POST['id'];
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $age = $_POST['age'];
                                $phone =$_POST['phone'];
                                $address= $_POST['address'];
                                $created_at = $_POST['created_at'];
                                $status = $_POST['status'];   


                    do{
                        if( empty($name) || empty($email) || empty($age) || empty($phone) || empty($address) || empty($created_at) || empty($status) ){
                            $errorMessage = "All the field are required";
                            
                            break;

                        } 
                        $sql = "UPDATE students 
                        SET s_name='$name', s_email='$email', s_age='$age',
                        s_phone='$phone', s_address='$address' , s_created_at='$created_at', 
                        s_status='$status'
                        WHERE id=" . $id; 
                       
                        $result = $connection->query($sql);

                        if(!$result) {
                            $errorMessage = "Invalid query: " .$connection->error;
                            break;
                        }
                        

                        $successMessage = "update successfully successfully!";

                        header("location: /sims/index.php");
                        exit;
                    }while(true);
                }
                ?>
                
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
                    <title>ENROLL</title>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
                <script sca = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                    
                </head>
                <body>
                    <div class="container">
                        <h2>Enrolling student</h2>

                        <?php
                        if( !empty($errorMessage)){
                            echo"
                            
                            <div class = 'alert alert-warning alert-dismissible fade show' role ='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class = 'btn-close' data-bs-dismiss ='alert' aria-label = 'Close' ></button>
                        </div> 
                            ";
                        }
                    
                        ?>
                        
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text"class="form-control"name="name"value="<?php echo $name; ?> ">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-6">

                                <input type="email"class="form-control"name="email"value=" <?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Age</label>
                            <div class="col-sm-6">

                                <input type="text"class="form-control"name="age"value=" <?php echo $age; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-6">
                                <input type="text"class="form-control"name="phone"value="<?php echo $phone; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-6">
                                <input type="text"class="form-control"name="address"value="<?php echo $address; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Created</label>
                            <div class="col-sm-6">
                                <input type="text"class="form-control"name="created_at"value="<?php echo $created_at; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">status</label>
                            <div class="col-sm-6">
                                <input type="text"class="form-control"name="status"value="<?php echo $status; ?>">
                            </div>
                        </div>

                        <?php

                        if( !empty($successMessage)){

                            echo"
                            <div class = 'row mb3' >
                            <div class='offset-sm-3 col-sm-6'>
                            <div class = 'alert alert-success alert-dismissible fade show' role ='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close' ></button>
                        </div> 
                        </div>
                            ";
                        }
                        ?>
                        <div class="row mb-3">
                            <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                            <div class="col-sm-3 d-grid">
                        <a  class="btn btn-outline-primary" href="/sims/index.php" role="button">Cancel</a>
                            </div>
                            </div>

                        
                        
                        </form>
                    </div>
                </body>
                </html>