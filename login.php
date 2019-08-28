<?php session_start();?>
<?php
require_once('inc/connection.php');
?>
<?php
      //check for form submission
if(isset($_POST['submit'])){
  $errors=array();
      //check if the username and password has been entered
  if(!isset($_POST['email'])||strlen(trim($_POST['email']))<1){
    $errors[]='Username is Missing/Invalid';

  }
  if(!isset($_POST['password'])||strlen(trim($_POST['password']))<1){
    $errors[]='Password is Missing/Invalid';

  }
     //check if there are any errors in the form
  if(empty($errors)){
              //Save username and password into variables
    $email =mysqli_real_escape_string($connection,$_POST['email']);
    $password =mysqli_real_escape_string($connection,$_POST['password']);
    $hashed_password=sha1($password);
              //prepare database query
    $query="SELECT*FROM members
    WHERE email ='{$email}'
    AND password= '{$hashed_password}'
    LIMIT 1";

    $result_set = mysqli_query($connection,$query);
    if($result_set){
              	//query succesful

     if(mysqli_num_rows($result_set)==1){
              		//valid user found
      $user = mysqli_fetch_assoc($result_set);
      $_SESSION['user_id']=$user['mem_id'];
      $_SESSION['first_name']=$user['first_name'];
      $_SESSION['marks']=$user['marks'];
              		//redirect to quiz.php
      header('Location:quiz.php');
    }else{
              		//user name and password invalid
      $errors[]='Invalid Username/Password';
    }
  }else{
   $errors[]='Database query failed';
 }

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="body">

<!--login body-->
<div class="row login" >
 <div class="col-md-6">
 	<img src="qmark.png">
 </div>
 <div class="col-md-6">
 	<div class="login">

 		<form action="login.php" method="post">

 			<fieldset>
 				<legend><h1>Login</h1></legend>
        <hr/>
        <?php
        if(isset($errors) && !empty($errors)) {
          echo'<p class="error">Invalid Username/password</p>';
        }
        ?>
        <?php
        if(isset($_GET['logout'])){
          echo'<p class="info bg-success text-light">You have successfuly logout!</p>';

        }
        ?>
        <table>
          <tr>
           <td>
            <label for="">Username:</label>
          </td>
          <td>
            <input type="text" name="email" id="" placeholder="Email Address">
          </td>

        </tr>

        <tr>
         <td>
          <label for"">Password:</label>
        </td>
        <td>
          <input type="password" name="password" placeholder="password">
        </td>
        <tr>
         <td>
          <button class="btn btn-dark" type="submit" name="submit">Login</button>
          <button class="btn btn-dark" type="submit" name="submit2">Sign In</button>
          <?php
            if (isset($_POST['submit2'])){
              header('Location:add_user.php');
            }

          ?>
        </td>
      </tr>
    </table>
  </fieldset>
</form>
</div>
</div>

</div>

</body>
</html>
<?php mysqli_close($connection); ?>