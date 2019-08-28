<?php
  $dbhost = 'localhost';
  $dbuser ='root';
  $dbpass ='';
  $dbname = 'userdb';

  $connection = mysqli_connect('localhost','root','','userdb');

  //checking the connection
  If(mysqli_connect_errno()){
  	die('Database connection failed'.mysqli_connect_error());
  }

?>
