
<?php 
require 'config.php';
if(!empty($_SESSION['NAME'])){

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Quiz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link href="./css/style.css" rel="stylesheet" media="screen">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="./js/jquery-1.10.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/jquery.validate.min.js"></script>
		<script src="./js/countdown.js"></script>
		<style>
			.container {
				margin-top: 50px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
                        
                        @font-face{
                            font-family: "beyond";
                            src:url('./fonts/Beyond Wonderland.ttf');
    
                            }
                            
                            h2{
                                font-family: beyond;
                                font-size: 30 px;
                            }
                            
                           
                            #panell{
                                background-image: url('./pictures/hash.png') ;
                              background-position:center;
                              background-repeat: no-repeat;
                          
                            }
                             .q{
                                 font-family: "Times new roman";
                                 font-size: 23px;
                             }
                             
                             input[type=radio]{
                                 display:inline;   
                                 transform: scale(1.5);
                             }
		</style>
	</head>
        <body onkeydown="="return showKeyCode(event)">
          
	    <div class='header container-fluid'>
     <div class="navbar navbar-inverse">
         <div class="navbar-header nav-justified" >
             <h2 class="navbar-text" >
                Welcome : <?php if(!empty($_SESSION['NAME'])){echo $_SESSION['NAME'];}?>
            </h2>
         </div>
     </div>
            </div>
        <div id='timer'>
            <script type="application/javascript">
            var myCountdownTest = new Countdown({
                                    time: 1800, 
                                    width:200, 
                                    height:80, 
                                    rangeHi:"minute"
                                    });
           </script>
            
        </div>
         <div class="panel panel-default"id='panell' >
                <div class="panel-body">
		<div class="container question">
			<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
                            <form class="form-horizontal" role="form" id='login' method="post" action="final.php">
					<?php 
                                        if($_SESSION['SET']==1){
                                            $res ="select * from set1 ORDER BY RAND()";
                                        }else if($_SESSION['SET']==2){
                                            $res ="select * from set2 ORDER BY RAND()";
                                        }else{
                                            $res ="select * from set3 ORDER BY RAND()";
                                        }
                                         $result=$conn->query($res);
                                        $row_count = $result->num_rows;
                                        
                                        if($row_count>0){
					$i=1;
                                        
                while($rows=$result->fetch_assoc()){
                  ?>
                    
                    <?php if($i==1){?>
                                     <p id='ques_no<?php echo $i;?>' class='q qn' >
			Question : <?php echo $i; ?> / <?php echo $row_count; ?>
                                     </p><hr id='hr_<?php echo $i;?>' class='h'>
              
                    <div id='question<?php echo $i;?>' class='cont'>
                        <b><p  class='questions' style="font-size:23px;font-family: 'Times new roman'" id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $rows['question_name'];?></p></b>
                     <div class="radio">
                         <input  type="radio" value="<?php echo $rows['answer1'];?>" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer1'];?></label>
                     </div><br/><div class="radio">
                   <input  type="radio" class="btn" value="<?php echo $rows['answer2'];?>" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer2'];?></label>
                     </div><br/><div class="radio">
                    <input  type="radio" value="<?php echo $rows['answer3'];?>" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer3'];?></label>
                    </div><br/><div class="radio">
                    <input  type="radio" value="<?php echo $rows['answer4'];?>" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer4'];?></label>
                    </div><br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='next btn btn-primary' type='button' name="Next" style="float:right">Next</button>
                    </div>     
                      
                     <?php }else if($i==$row_count){?>
                    
                      <p id='ques_no<?php echo $i;?>' class='q qn'>
			Question : <?php echo $i; ?> / <?php echo $row_count; ?>
                          </p><hr id='hr_<?php echo $i;?>' class='h'>
                       <div id='question<?php echo $i;?>' class='cont'>
                           <b><p class='questions' style="font-size:23px; font-family: 'Times new roman'" id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $rows['question_name'];?></p></b>
                    <div class="radio">
                    <input type="radio" value="<?php echo $rows['answer1'];?>"  id=' radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer1'];?></label>
                    </div><br/><div class="radio">
                    <input type="radio" value="<?php echo $rows['answer2'];?>" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer2'];?></label>
                    </div><br/><div class="radio">
                    <input type="radio" value="<?php echo $rows['answer3'];?>" id=' radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer3'];?></label>
                    </div><br/><div class="radio">
                    <input type="radio" value="<?php echo $rows['answer4'];?>" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer4'];?></label>
                    </div><br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='previous btn btn-primary' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class=' btn btn-primary' type='submit' style="float :right">Finish</button>
                    </div>
                    
                   <?php }else{?>
                    <p id='ques_no<?php echo $i;?>' class='q qn'>
			Question : <?php echo $i; ?> / <?php echo $row_count; ?>
                        </p><hr id='hr_<?php echo $i;?>' class='h'>
                    <div id='question<?php echo $i;?>' class='cont'>
                        <b><p class='questions' style="font-size:23px; font-family: 'Times new roman'" id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $rows['question_name'];?></p></b>
                    <div class="radio">
                    <input type="radio" value="<?php echo $rows['answer1'];?>" id='<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer1'];?></label>
                    </div><br/><div class="radio">
                    <input type="radio" value="<?php echo $rows['answer2'];?>" id='<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer2'];?></label>
                    </div><br/><div class="radio">
                    <input type="radio" value="<?php echo $rows['answer3'];?>" id='<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer3'];?></label>
                    </div><br/><div class="radio">
                    <input type="radio" value="<?php echo $rows['answer4'];?>" id='<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/><label  style=' font-size: 23px;font-family: "Times new roman";'><?php echo $rows['answer4'];?></label>
                    </div><br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='<?php echo $rows['id'];?>' name='<?php echo $rows['id'];?>'/>                                                                      
                    <br/>
                    
                    <button id='<?php echo $i;?>' class='previous btn btn-primary' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-primary' type='button' name="Next" style="float:right;margin-left: 20px">Next</button>
                    </div>
                                        <?php } $i++;}} ?>
					
				</form>
                     
			</div>
		</div>
       <div class='container-fluid'>
        <div class=" navbar-fixed-bottom navbar-inverse">
            <p class="text-center " id="foot" style="color: white;">
            &copy;Hashtagg 2k18.
            </p>
        </div>
        </div>
         </div>
         </div>
          

		
		
		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');
                 $('.qn').addClass('hide');
                 $('#ques_no'+1).removeClass('hide');
		 $('.h').addClass('hide');
                 $('#hr_'+1).removeClass('hide'); 
                 
		 $(document).on('click','.next',function(){
		     last=parseInt($(this).attr('id'));     
		     nex=last+1;
		     $('#question'+last).addClass('hide');
		     
		     $('#question'+nex).removeClass('hide');
                     $('#ques_no'+last).addClass('hide');
                     
                     $('#ques_no'+nex).removeClass('hide');
                     $('#hr_'+last).addClass('hide');
                     $('#hr_'+nex).removeClass('hide');
		 });
		 
		 $(document).on('click','.previous',function(){
             last=parseInt($(this).attr('id'));     
             pre=last-1;
             $('#question'+last).addClass('hide');
             
             $('#question'+pre).removeClass('hide');
             
             $('#ques_no'+last).addClass('hide');
                     
             $('#ques_no'+pre).removeClass('hide');
              $('#hr_'+last).addClass('hide');
              $('#hr_'+pre).removeClass('hide');
               
         });
            
         setTimeout(function() {
             $("form").submit();
          }, 1800000);
    $(window).focus(function() {
  $("form").submit();//do something
});


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
<?php }else{
    
 header( 'Location:index.php' ) ;
                                       // }
}
?>

