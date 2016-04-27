<?php include_once "common/header.php"; ?>
<?php
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($link,$username);
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($link,$password);
 //Checking is user existing in the database or not
 $query = "SELECT * FROM `ACCOUNTS` WHERE UserName='$username' and Password='$password'";
 $result = mysqli_query($link,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result); 
	 
 if($rows>0){	
	 //check to see if is an admin or not
	 /*if ($check_allowed['admin']==1){
	 $_SESSION['admin']=true;
	 }
	 else */
	 // assume all of them are not admin
	 $_SESSION['admin'] = false;
	
   $_SESSION['username'] = $username;
   header("Location: index.php"); // Redirect user to index.php
 }
 else{
   echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>