<?php session_start();?>
<?php
require_once('inc/connection.php');
?>
<?php
    if(!isset($_SESSION['user_id'])){
    	header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="body">
  <div class="container bg-dark text-light">
  	<div class="row">
  		<div class="col-md-6">
  			<h3>Welcome!</h3>
  			<h5 class="loggedin" ><?php echo $_SESSION['first_name'];?></h5>
  		</div>
  		<div class="col-md-3">
       <?php $query ="SELECT marks FROM members WHERE mem_id ='{$_SESSION['user_id']}'";

       $result = mysqli_query($connection, $query);
       $a = mysqli_fetch_assoc($result);
       $answer =$a['marks']; ?>


       <h5 class="marks ">Your marks: <?php print_r($answer[0]);?></h5>
     </div>
     <div class="col-md-3">
      <h6><a class="text-light" href="logout.php">Log Out</a></h6>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <form>
      <?php 
      $query1 = "SELECT Question FROM quiz WHERE id=1";
      $quiz1 = mysqli_query($connection ,$query1);
      $a = mysqli_fetch_assoc($quiz1);
      $answer1 = $a['Question'];
      

      $query2 = "SELECT Question FROM quiz WHERE id=2";
      $quiz2 = mysqli_query($connection ,$query2);
      $b = mysqli_fetch_assoc($quiz2);
      $answer2 = $b['Question'];

      

      $query3 = "SELECT Question FROM quiz WHERE id=3";
      $quiz3 = mysqli_query($connection ,$query3);
      $c = mysqli_fetch_assoc($quiz3);
      $answer3 = $c['Question'];

      $query4 = "SELECT Question FROM quiz WHERE id=4";
      $quiz4 = mysqli_query($connection ,$query4);
      $d = mysqli_fetch_assoc($quiz4);
      $answer4 = $d['Question'];

      $query5 = "SELECT Question FROM quiz WHERE id=5";
      $quiz5 = mysqli_query($connection ,$query5);
      $e = mysqli_fetch_assoc($quiz5);
      $answer5 = $e['Question'];
      
      $array = array
      (   
        "a"=> $answer1,  
        "b"=>$answer2,  
        "c"=>$answer3,  
        "d"=>$answer4,
        "e"=>$answer5
      ); 

      shuffle($array); 


      ?>
      <div style="background-color: rgba(94, 98, 105,0.2); margin: 10px; padding: 15px;">
        <p ><?php 
        print_r($array[0]); 


        $que1= "SELECT id FROM quiz WHERE Question='". $array[0] ."'";
        $qui1 =mysqli_query($connection,$que1);
        $a1 =mysqli_fetch_assoc($qui1);
        $id=$a1['id'];


        $querya1 = "SELECT Answer,A,B,C,D FROM quiz WHERE id='". $id[0] ."'";
        $quiza1 = mysqli_query($connection ,$querya1);
        $aa = mysqli_fetch_assoc($quiza1);
     //$answera1[] = $aa('Answer','A','B','C','D');
        shuffle($aa);

        
        ?></p>
        <div>
          <div class="row">

            <div class="col-md-2"><input  value="<?php print_r($aa[0]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit1"><?php print_r($aa[0]);?></div>
            <div class="col-md-2"><input  value="<?php print_r($aa[1]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit1"><?php print_r($aa[1]); ?></div>
            <div class="col-md-2"><input  value="<?php print_r($aa[2]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit1"><?php print_r($aa[2]); ?></div>
            <div class="col-md-2"><input  value="<?php print_r($aa[3]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit1"><?php print_r($aa[3]); ?></div>
            <div class="col-md-2"><input  value="<?php print_r($aa[4]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit1"><?php print_r($aa[4]); ?></div>


          </div>
        </div>
      </div>
      <div style="background-color: rgba(94, 98, 105,0.2); margin: 10px; padding: 15px;">
       <p><?php 
       print_r($array[1]); 

       $que1= "SELECT id FROM quiz WHERE Question='". $array[1] ."'";
       $qui1 =mysqli_query($connection,$que1);
       $a1 =mysqli_fetch_assoc($qui1);
       $id=$a1['id'];
       

       $querya1 = "SELECT Answer,A,B,C,D FROM quiz WHERE id='". $id[0] ."'";
       $quiza1 = mysqli_query($connection ,$querya1);
       $aa = mysqli_fetch_assoc($quiza1);
     //$answera1[] = $aa('Answer','A','B','C','D');
       shuffle($aa);


       ?></p>
       <div>
        <div class="row">
          <div class="col-md-2"><input value="<?php print_r($aa[0]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit2"><?php print_r($aa[0]);?></div>
          <div class="col-md-2"><input value="<?php print_r($aa[1]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit2"><?php print_r($aa[1]);?></div>
          <div class="col-md-2"><input value="<?php print_r($aa[2]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit2"><?php print_r($aa[2]);?></div>
          <div class="col-md-2"><input value="<?php print_r($aa[3]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit2"><?php print_r($aa[3]);?></div>
          <div class="col-md-2"><input value="<?php print_r($aa[4]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit2"><?php print_r($aa[4]);?></div>
        </div>
      </div>
    </div>
    <div style="background-color: rgba(94, 98, 105,0.2); margin: 10px; padding: 15px;">

     <p><?php 
     print_r($array[2]); 

     $que1= "SELECT id FROM quiz WHERE Question='". $array[2] ."'";
     $qui1 =mysqli_query($connection,$que1);
     $a1 =mysqli_fetch_assoc($qui1);
     $id=$a1['id'];


     $querya1 = "SELECT Answer,A,B,C,D FROM quiz WHERE id='". $id[0] ."'";
     $quiza1 = mysqli_query($connection ,$querya1);
     $aa = mysqli_fetch_assoc($quiza1);
   
     shuffle($aa);

     ?></p>
     <div>
      <div class="row">
        <div class="col-md-2"><input value="<?php print_r($aa[0]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit3"><?php print_r($aa[0]);?></div>
        <div class="col-md-2"><input value="<?php print_r($aa[1]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit3"><?php print_r($aa[1]);?></div>
        <div class="col-md-2"><input value="<?php print_r($aa[2]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit3"><?php print_r($aa[2]);?></div>
        <div class="col-md-2"><input value="<?php print_r($aa[3]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit3"><?php print_r($aa[3]);?></div>
        <div class="col-md-2"><input value="<?php print_r($aa[4]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit3"><?php print_r($aa[4]);?></div>
      </div>
    </div>
  </div>
  <div style="background-color: rgba(94, 98, 105,0.2); margin: 10px; padding: 15px;">
   <p><?php 
   print_r($array[3]); 

   $que1= "SELECT id FROM quiz WHERE Question='". $array[3] ."'";
   $qui1 =mysqli_query($connection,$que1);
   $a1 =mysqli_fetch_assoc($qui1);
   $id=$a1['id'];


   $querya1 = "SELECT Answer,A,B,C,D FROM quiz WHERE id='". $id[0] ."'";
   $quiza1 = mysqli_query($connection ,$querya1);
   $aa = mysqli_fetch_assoc($quiza1);
    
   shuffle($aa);

   ?></p>
   <div>
    <div class="row">
      <div class="col-md-2"><input value="<?php print_r($aa[0]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit4"><?php print_r($aa[0]);?></div>
      <div class="col-md-2"><input value="<?php print_r($aa[1]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit4"><?php print_r($aa[1]);?></div>
      <div class="col-md-2"><input value="<?php print_r($aa[2]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit4"><?php print_r($aa[2]);?></div>
      <div class="col-md-2"><input value="<?php print_r($aa[3]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit4"><?php print_r($aa[3]);?></div>
      <div class="col-md-2"><input value="<?php print_r($aa[4]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit4"><?php print_r($aa[4]);?></div>
    </div>
  </div>
</div>
<div style="background-color: rgba(94, 98, 105,0.2); margin: 10px; padding: 15px;">
 <p><?php 
 print_r($array[4]); 

 $que1= "SELECT id FROM quiz WHERE Question='". $array[4] ."'";
 $qui1 =mysqli_query($connection,$que1);
 $a1 =mysqli_fetch_assoc($qui1);
 $id=$a1['id'];

 $querya1 = "SELECT Answer,A,B,C,D FROM quiz WHERE id='". $id[0] ."'";
 $quiza1 = mysqli_query($connection ,$querya1);
 $aa = mysqli_fetch_assoc($quiza1);


 shuffle($aa);

 ?></p>
 <div>
  <div class="row">
    <div class="col-md-2"><input value="<?php print_r($aa[0]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit5"><?php print_r($aa[0]);?></div>
    <div class="col-md-2"><input value="<?php print_r($aa[1]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit5"><?php print_r($aa[1]);?></div>
    <div class="col-md-2"><input value="<?php print_r($aa[2]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit5"><?php print_r($aa[2]);?></div>
    <div class="col-md-2"><input value="<?php print_r($aa[3]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit5"><?php print_r($aa[3]);?></div>
    <div class="col-md-2"><input value="<?php print_r($aa[4]);?>-<?php print_r($id[0]); ?>" type="radio" name="submit5"><?php print_r($aa[4]);?></div>
  </div>
</div>
</div>
<center><button class="btn btn-dark "  type="submit" name="submit">Submit</button></center>

<?php

$errors =array();
if (isset($_GET['submit']))
{
  $mark=0;
  
  $req_fields = array('submit1','submit2','submit3','submit4','submit5');
  foreach($req_fields as $field){
    if(isset($_GET[$field])){
      $errors[]=$field.' is required';
    }
  }
//if(empty($errors)){
  $option1 = $_GET['submit1'] ;
  $option1 = explode ("-",$option1);

  $option2 = $_GET['submit2'] ;
  $option2 = explode ("-",$option2);

  $option3 = $_GET['submit3'] ;
  $option3 = explode ("-",$option3);

  $option4 = $_GET['submit4'] ;
  $option4 = explode ("-",$option4);

  $option5 = $_GET['submit5'] ;
  $option5 = explode ("-",$option5);



  $que1= "SELECT Answer FROM quiz WHERE id='$option1[1]'";
  $qui1 =mysqli_query($connection,$que1);
  $a1 =mysqli_fetch_assoc($qui1);
  $answer1=$a1['Answer'];

  $que2= "SELECT Answer FROM quiz WHERE id='$option2[1]'";
  $qui2 =mysqli_query($connection,$que2);
  $a2 =mysqli_fetch_assoc($qui2);
  $answer2=$a2['Answer'];

  $que3= "SELECT Answer FROM quiz WHERE id='$option3[1]'";
  $qui3 =mysqli_query($connection,$que3);
  $a3 =mysqli_fetch_assoc($qui3);
  $answer3=$a3['Answer'];

  $que4= "SELECT Answer FROM quiz WHERE id='$option4[1]'";
  $qui4 =mysqli_query($connection,$que4);
  $a4 =mysqli_fetch_assoc($qui4);
  $answer4=$a4['Answer'];

  $que5= "SELECT Answer FROM quiz WHERE id='$option5[1]'";
  $qui5 =mysqli_query($connection,$que5);
  $a5 =mysqli_fetch_assoc($qui5);
  $answer5=$a5['Answer'];

  

  if($option1[0] == $answer1){
    $mark= $mark+1;
  }
  if($option2[0] == $answer2){
    $mark= $mark+1;
  }
  if($option3[0] == $answer3){
    $mark= $mark+1;
  }
  if($option4[0] == $answer4){
    $mark= $mark+1;
  }
  if($option5[0] == $answer5){
    $mark= $mark+1;
  }

  $query ="UPDATE members SET marks='$mark' WHERE mem_id ='{$_SESSION['user_id']}'";

  $result = mysqli_query($connection, $query);



echo '<meta http-equiv=Refresh content="0;url=quiz.php?reload=1">';
 //}
}
?>

</form>
</div>
<div class="col-md-1"></div>
</div>
</body>
</html>