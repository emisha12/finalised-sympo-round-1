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
    if($_SESSION['SET']==1){
         $response="select id,answer from set1";
    }else if($_SESSION['SET']==2){
         $response="select id,answer from set2";
    }else{
         $response="select id,answer from set3";
    }
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
        <script>
             (function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

      
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();
		
        // disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')||(e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };          
    }

})(window);

		</script>
    </body>
</html>
<?php } ?>