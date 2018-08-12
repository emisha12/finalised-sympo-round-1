<?php
require_once 'config.php';
$uname=trim($_POST['usrnm']);
$ph=trim($_POST['phone']);
$college=trim($_POST['clg']);
$year=trim($_POST['yr']);
$dept=trim($_POST['dept']);
$set=trim($_POST['set']);

$sql="insert into candidates(NAME,PHONE_NO,COLLEGE,YEAR,DEPARTMENT,SET_TYPE) values('$uname','$ph','$college','$year','$dept','$set')" or die($sql);

             if(mysqli_query($conn,$sql)){
                // Redirect to login page
                header("location: instructions.html");
                $_SESSION['SET']=$set;
                $_SESSION['NAME']=$uname;
                $_SESSION['id'] = mysql_insert_id();
                } else{
                echo "Something went wrong. Please try again later.";
            }
 
       
 ?>


