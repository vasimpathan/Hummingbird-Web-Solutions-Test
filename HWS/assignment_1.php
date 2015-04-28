<?php
	$output=$err_str='';	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$str 		  = $_POST['text_str'];
		$enter_string = $str;
		if(empty($str) || is_numeric($str))
		{
			$err_str = "Please Enter String";
		}
		else
		{
			$output = '
			<table>
			<tr>
				<th>Enter String :<th>
				<td>'.$enter_string.'</td>
			</tr>
			<tr>
				<th>Reverse String :<th>
				<td>'.Custom_STR_Reverse($str).'</td>
			</tr>';
		}

	}
	
	if(isset($_POST['reset']))
	{
		$output='';
	}
	
	function Custom_STR_Reverse ($str) 
	{
		$len=strlen($str);
		$revstr='';
		for ($z=$len-1; $z >=0; $z--) 
		{
			$v = $str[$z];
			$revstr .= $v;
		}
		return $revstr;

	} 

?>
<html>
<body>
<style>
.error{color:red;font-size:13px;}
</style>
<center>
<form method="post" action="">
	<h2 align="center">Reverse a String</h2><hr>
	Please Enter String for Reverse : 
	<input type="text" name="text_str" id="text_str">
	<span class="error">* <?php echo $err_str;?></span><br><br>
	<input type="submit" name="save" id="save" value="Submit">
	<input type="submit" name="reset" id="reset" value="Reset"><hr>
	<p id="output"><?php echo $output;?></p>
</form>
</center>
</body>
</html>