<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>

<div class="form">

<h2>Hello <?php echo $_SESSION['username']?>!</h2>

<?php 
$query = "select FriendAccountName from `FRIENDSLISTS` where 
PlayerUserName='".$_SESSION['username']."'";
$result = $link->query($query);

if($result->num_rows > 0){
	echo "<UL><h4>These are your friends:</h4>";
	while($nametag = mysqli_fetch_assoc($result)){
		$name = $nametag['FriendAccountName'];
		echo "<LI>".$name."<br>";
	}
	echo "</UL>";
} else
	echo "<p>You don’t have any friends yet.</p>";
?>


</div>


<?php include_once "common/sidebar.php"; ?>
<?php include_once "common/footer.php"; ?> 