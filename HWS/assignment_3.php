<?php
	$output=$ip_error='';
	if($_SERVER["REQUEST_METHOD"]=='POST')
	{
		$ip_address = $_POST['ip_addr'];
		$enter_string = $ip_address;
		if(empty($ip_address) || filter_var($ip_address, FILTER_VALIDATE_IP) === false)
		{
			$ip_error = "Ip  Address Not Valid";
		}
		else
		{
			$output = '
			<table>
			<tr>
				<th align="left">Enter Ip Address :<th>
				<td>'.$ip_address.'</td>
			</tr>
			<tr>
				<th align="left">Status :<th>
				<td>'.checkIPBan($ip_address).'</td>
			</tr>';
		}

	}
	
	if(isset($_POST['reset']))
	{
		$output='';
	}
	
	function checkIPBan($InputIP) // $InputIP stroe current or given IP address by user
	{
		$good_ip = array("127.0.0.1", "123.248.196.15", "39.170.223.48", "184.171.213.49", "139.172.123.44", "39.179.233.40");  // Ip Address which is good
		if (in_array ($InputIP, $good_ip)) 
		{
		   return $status= "Good IP";
		} 
		else
		{
			return $status= "Banned IP";
		}
	} 

?>
<html>
<body>
<style>
.error{color:red;font-size:12px;}
</style>
<center>
<form method="post" action="">
	<h2 align="center">IP Address Ban</h2><hr>
	Enter Ip Address: 
	<input type="text" name="ip_addr" id="ip_addr">
	<span class="error">*<?php echo $ip_error;?></span><br><br>
	<input type="submit" name="save" id="save" value="Submit">
	<input type="submit" name="reset" id="reset" value="Reset"><hr>
	<p id="output"><?php echo $output;?></p>
</form>
</center>
</body>
</html>