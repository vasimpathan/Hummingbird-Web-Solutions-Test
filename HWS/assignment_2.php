<?php
	$output=$nameErr='';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$input_str = $_POST['text_str']; // store textbox value i.e user value
		$input_to_lower =strtolower($_POST['text_str']); //convert uppercase to lower case 
		$input = str_split($input_to_lower); // split string into array to find charcter number
		if (empty($input_str) || is_numeric($input_str)) 
		{
			$nameErr = "Plaese Enter String";
		}
		else
		{
			$name = '';
			$output = '
			<table>
			<tr>
				<th>Enter String :<th>
				<td>'.$input_str.'</td>
			</tr>
			<tr>
				<th>Encode String :<th>
				<td>'.CustomEncode ($input).'</td>
			</tr>';
		}
	}
	
	if(isset($_POST['reset']))
	{
		$output='';
	}
	
	function CustomEncode  ($input) 
	{
		$allowedChars = array("1"=>"a",
							  "2"=>"b",
							  "3"=>"c", 
							  "4"=>"d",
							  "5"=>"e",
							  "6"=>"f",
							  "7"=>"g",
							  "8"=>"h",
							  "9"=>"i",
							  "10"=>"j",
							  "11"=>"k",
							  "12"=>"l",
							  "13"=>"m",
							  "14"=>"n",
							  "15"=>"o",
							  "16"=>"p",
							  "17"=>"q",
							  "18"=>"r",
							  "19"=>"s",
							  "20"=>"t",
							  "21"=>"u",
							  "22"=>"v",
							  "23"=>"w",
							  "24"=>"x",
							  "25"=>"y",
							  "26"=>"z"
							  );//array for search particular number of character from array
							  
		$outputstring='';//define outputstring
					  
		foreach($input as $letter) 
		{
			if (in_array($letter, $allowedChars)) 
			{
				$outputstring .=$letter.'='.array_search($letter, $allowedChars).' ';
			}
		}
		return $outputstring; // return output value to function
	} 

?>
<html>
<body>
<style>
.error
{
	color:red;
	font-size:12px;
}
</style>
<center>
	<form method="post" action="">
	<h2 align="center">Encode a string</h2><hr>
	Please Enter String : 
	<input type="text" name="text_str" id="text_str">
	<span class="error">* <?php echo $nameErr;?></span><br><br>
	<input type="submit" name="save" id="save" value="Submit">
	<input type="submit" name="reset" id="reset" value="Reset"><hr>
	<p id="output"><?php echo $output;?></p>
	</form>
</center>
</body>
</html>