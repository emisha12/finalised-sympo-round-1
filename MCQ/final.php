<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php 
require 'config.php';
if(!empty($_SESSION['NAME'])){
    
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   
   
    $response="select id,answer from questions";
   $respo=$conn->query($response);
   while($result=$respo->fetch_assoc()){
            if($result['answer']==$_POST[$result['id']]){
                     $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
       
   }
   $name=$_SESSION['NAME'];  
$summary="update candidates set MARKS='$right_answer' where NAME='$name'";
$sum=$conn->query($summary);
?>
<html>
    <head>
        <title>Completed test</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .ins_border{
            border-style: ridge;
            border-radius: 5px;
            border-color: black;
            background-color: #ffe6e6;
            opacity:0.8;
            padding: 20px;
            margin: auto;
            width: 50%;
            font-size: 20px;
        }
        
        body{
            height: 100%;
            background-image: url('./pictures/jason-leung-479251-unsplash.jpg');
            background-position: 5% 5%; 
            background-size: cover;
            background-repeat: no-repeat;
  
        }
        
        </style>
    </head>
    <body><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br>
        <div class='ins_border' >
            <center>Thank you for taking the test!!!<br><br><br>Results will be shared shortly.</center>
        </div>
   
    </body>
</html>
<?php } ?>