<?php
session_start();
include "./db_con.php";
if (isset($_POST['name']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	
    }
    $name = validate($_POST['name']);
    $password = validate($_POST['password']);

    if (empty($name)){
        header("Location: ../html/login.php?error=User Name is required");
        exit();
    }
    else if (empty($password)){
        header("Location: ../html/login.php?error=password is required");
        exit();
    }
    else{
       $sql = "SELECT * FROM register where name='$name' and password='$password'";
       
       $result = mysqli_query($link, $sql);
        
        if(mysqli_num_rows($result) === 1){

          $rows = mysqli_fetch_assoc($result);

          //print_r($row);
          if ($rows['name'] === $name && $rows['password'] === $password){
              header("Location: ../../datcho/datcho/html/datcho.html");
              //header("Location: ../../trangchu/html/index.html");
              exit();
          }else{
            header("Location: ../html/login.php?error=Incorrect User name or password");
            exit();
          }
          
        }
        else{
            header("Location: ../html/login.php?error=Incorrect User name or password");
            exit();
        }
    }
}
else {
    header("Location: ../html/login.php");
    exit();
}
?>
       
    
    