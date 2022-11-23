<?php
	$conn = mysqli_connect("127.0.0.1","root","","secure_development");
	date_default_timezone_set("Asia/Shanghai"); //设置时间为中国时区
	mysqli_set_charset($conn, 'utf8'); //设置MYSQL为UTF-8
	error_reporting(E_ALL^E_NOTICE^E_WARNING);

	function PurifyData($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data,ENT_QUOTES);	
		//$data = filter_var($data,FILTER_SANITIZE_STRING);
		//$data = filter_var($data,FILTER_SANITIZE_MAGIC_QUOTES);
		return strip_tags($data);
	}

	function GetFlag($url)
	{
		$flag = PurifyData($_POST["Flag"]);
		$salt = "edbd92baa6a824f0d89a0a817d5dc5dd";
		if ($flag == md5($url.$salt))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
		Free($flag,$salt,$url,$_POST["Flag"]);
		die();
	}

	function FlagShow()
	{
		$flag = md5($_SERVER['PHP_SELF'].'edbd92baa6a824f0d89a0a817d5dc5dd');
		echo "<br>flag：$flag";
		Free($flag);
		die();
	}

	if (isset($_POST["Flag"]))
	{
		GetFlag($_POST["url"]);
		Free($_POST["url"]);
	}

	function Free(...$var)
	{
		foreach($var as $var)
		{
			if(isset($var))
			{				
				$var = null;
				unset($var);
			}
		}
	}
?>
