<?php session_start();?>
<?php
require_once('inc/connection.php');
?>
<?php 
$errors =array();
$name= '';
$email= '';
$password ='';
$id= '';

if(isset($_POST['submit'])){

	$name= $_POST['name'];
	$email= $_POST['email'];
	$password =$_POST['password'];

	$req_fields = array('name','email','password','repassword');
	foreach($req_fields as $field){
		if(empty(trim($_POST[$field]))){
			$errors[]=$field.' is required';
		}
	}

	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$query = "SELECT*FROM members WHERE email= '{$email}' LIMIT 1";

	$result_set = mysqli_query($connection ,$query);
	if($result_set){
		if(mysqli_num_rows($result_set)==1){
			$errors[]='Email address is already exists';
		}
	}

	if(empty($errors)){
		$name = mysqli_real_escape_string($connection,$_POST['name']);

		$email = mysqli_real_escape_string($connection,$_POST['email']);

		$password = mysqli_real_escape_string($connection,$_POST['password']);

		$hashed_password = sha1($password);

		$query1 = "SELECT*FROM members";
		$result_set = mysqli_query($connection,$query1);
		if($result_set){
			$id='M'.mysqli_num_rows($result_set);
		}


		$query ="INSERT INTO members (mem_id,first_name,email,password,marks) VALUES('{$id}','{$name}','{$email}','{$hashed_password}',0)";

		$result = mysqli_query($connection, $query);

		if($result){
			$_SESSION['first_name']=$name;
			$_SESSION['marks']=0;
			$_SESSION['user_id']=$id;
			header('Location:quiz.php?user_added=true');
		}else{
			$errors[]='Failed to add the new record.';
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New User</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="body">
	<div class="container bg-dark text-light" >
		<h3 style="text-align: center;">Sign Up</h3>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<?php 
			if(!empty($errors)){
				echo'<b>There were error(s) on your form.</b>';
				foreach($errors as $error){
					echo $error.'<br>';
				}
			} 
			?>
			<form action="add_user.php" method="post">
				<div class="form-group">
					<label >Name</label>
					<input class="form-control" name="name" placeholder="Name"<?php echo 'value="'.$name.'"'; ?> >
				</div>
				<div class="form-group">
					<label >Email address</label>
					<input type="email" class="form-control" name="email"  placeholder="Enter email" <?php echo 'value="'.$email.'"'; ?>>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label >Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" <?php echo 'value="'.$password.'"'; ?> >
				</div>
				<div class="form-group">
					<label >Re-Password</label>
					<input type="password" class="form-control" name="repassword" placeholder="Password">
				</div>
				<center><button type="submit" class="btn btn-dark" name="submit">Submit</button></center>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>



</body>
</html>