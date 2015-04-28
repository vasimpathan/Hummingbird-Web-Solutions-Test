<?php
	$match=$error=$username='';
	
	if($_SERVER["REQUEST_METHOD"]=='POST')
	{		
		$con 	  = mysql_connect("localhost","root","");
		$db       = mysql_select_db("test",$con);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$encrpt_password = md5($_POST['password']);
		
		if(empty($username) || empty($password))
		{
			$error ="Please enter * required fields";
			$username = $username;
		}
		
		else{
			$match='<b>Validate Status : </b> '.isUserValid($username,$encrpt_password);
			$username = '';
		}
	}
	
	
	if(isset($_POST['reset']))
	{
		$match='';
	}
	
	 function isUserValid ($User, $Password)
	{
		$query 			  = "select *from userdata where Username='".$User."' and Password='".$Password."'";
		$result_query 	  = mysql_query($query);
		$num_result_num   = mysql_fetch_array($result_query);
		if($num_result_num > 0)
		{
			return $match="true";
		}	
		else 
		{
			return $match="false ";
		}
	} 

?>
<html>
<body>
	<style>
	.error{color:red;font-size:13px;}
	</style>
<center>
<form method="post" action="">
	<h2 align="center">Validate User</h2><hr>
	<span class="error"><?php echo $error;?></span><br><br>
	Username : 
	<input type="text" name="username" id="username" value="<?php echo $username;?>">*
	<br><br>
	Password : 
	<input type="password" name="password" id="password" value="">*
	<br><br>
	<input type="submit" name="save" id="save" value="Submit">
	<input type="submit" name="reset" id="reset" value="Reset"><hr>
	<p id="output"><?php echo $match;?></p>
</form>
</center>
</body>
</html>