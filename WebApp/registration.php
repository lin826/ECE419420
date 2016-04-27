<?php include_once "common/header.php"; ?>
<?php
 require($_SERVER['DOCUMENT_ROOT'].'/WebApp/common/DBConnection/connection.php');
 //require_once "Mail.php";

 // If form submitted, insert values into the database.
 if(isset($_SESSION['error']))
 {
  echo '<p>'.$_SESSION['error']['username'].'</p>';
  echo '<p>'.$_SESSION['error']['email'].'</p>';
  echo '<p>'.$_SESSION['error']['password'].'</p>';
  unset($_SESSION['error']);
 }
 
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 //make sure username is the right length
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($link,$username);
 
 //make sure email isn't already used
 $email = stripslashes($email);
 $email = mysqli_real_escape_string($link, $email);
 
 //make sure password fits correct format
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($link,$password);
 
 $conf_code = md5(uniqid(rand()));
 
 $query = "INSERT into `ACCOUNTS` (UserName, Password, Email) VALUES ('$username', '$password', '$email')";
 $result = mysqli_query($link,$query);
 if($result){
	echo "<div class='form'><h3>You are registered successfully.</h3><br/></div>";
 }
 else{
	  echo "<div class='form'><h3>There was an error with your registration.</h3><br/>Click here to <a href='registration.php'>register</a></div>";
		throw new Exception(mysqli_error($link)."[ $result]");
 }}
 else{
	 
?>
<div class="form">
<h1>Registration</h1>
<p>
<form name="registration" action="" method="post"></p>
<br>
<input type="text" name="username" placeholder="Username" required /></br>
<br>
<input type="email" name="email" placeholder="Email" required /></br>
<br>
<input type="password" name="password" placeholder="Password" required /></br>
<br>
<input type="submit" name="submit" value="Register" /></br>
</form>
</div>
<?php } ?>
</body>
</html>